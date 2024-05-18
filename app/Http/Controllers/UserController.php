<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userPanel()
    {
        $messages = Contact::where('user_id', Auth::id())->get();
        $reservation=Reservation::where('user_id', Auth::id())->first();

        return view('home.user_panel', compact('messages','reservation'));
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        Auth::user()->update(['email' => $request->email]);

        return redirect()->back()->with('message', 'Email updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update(['password' => Hash::make($request->password)]);
            return redirect()->back()->with('message', 'Password updated successfully!');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
    }
}
