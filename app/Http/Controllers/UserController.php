<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $inputs = $request->validate([
            'logemail' => ['required'],
            'logpassword' => ['required'],
        ]);

        if (auth()->attempt(['email' => $inputs['logemail'], 'password' => $inputs['logpassword']])) {
            $request->session()->regenerate();
            Session::flash('success_msg', 'Logged in successfully');
        } else {
            Session::flash('error_msg', 'Invalid credentials');
        }

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        Session::flash('success_msg', 'Logged out successfully');
        return redirect('/');
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'max:200'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);

        Session::flash('success_msg', 'Registered and logged in successfully');
        return redirect('/');
    }

    public function viewProfile()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Return the view with the authenticated user's profile
        return view('view-profile', compact('user'));
    }
}
