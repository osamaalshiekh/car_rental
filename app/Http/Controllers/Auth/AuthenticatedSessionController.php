<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user instanceof \App\Models\User && method_exists($user, 'hasRole')) {
                if ($user->hasRole('Admin') || $user->hasRole('Moderator')) {
                    // Redirect admin and moderator to their respective dashboards
                    return redirect()->route('admin.index');
                } else {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'You do not have permission to log in.');
                }
            }
        }

        return redirect()->route('login')->with('error', 'Email or password is incorrect.');
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
