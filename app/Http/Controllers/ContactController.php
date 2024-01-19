<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function send()
    {
        // Validate the request data
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        // Set the user_id if the user is authenticated
        if (Auth::check()) {
            $data['user_id'] = Auth::user()->id;
        }

        // Create a new Contact using the validated data
        Contact::create($data);

        // Send an email using the ContactMail class
        Mail::to('mohanadsoffo2002@gmail.com')->send(new ContactMail($data));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Message sent successfully');
    }



    public function index(){

        $data=Contact::all();
        return view('admin.message.index',compact('data'));
    }




}
