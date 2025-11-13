<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {

            // Check if user is admin
            if (Auth()->user()->is_admin) {
                flash()->addSuccess('Login Success!');
                return redirect()->route('admin.dashboard');
            }

            // Not a admin ->logout and redirect back
            Auth::logout();
            flash()->addError('You are not authorized!');
            return redirect()->route('admin.login');
        }

        // Invalid Credentials
        flash()->addError('Invalid email or passowrd!');
        return redirect()->route('admin.login');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();

            // clear session data
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            flash()->addSuccess('You have successfully logged out!');
        }

        // Redirect route
        return redirect()->route('admin.login');
    }
}
