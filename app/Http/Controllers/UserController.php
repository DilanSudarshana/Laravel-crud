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

    public function updateProfile(Request $request, User $user)
    {
        // Check if the authenticated user is authorized to update the profile
        if (auth()->user()->id === $user->id) {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'editName' => 'required',
                'editPassword' => 'required',
            ]);

            // Update the user's name
            $user->name = $validatedData['editName'];

            // Update the user's password (if provided)
            if ($validatedData['editPassword']) {
                $user->password = bcrypt($validatedData['editPassword']);
            }

            // Save the updated user details to the database
            $user->save();

            // Flash a success message to the session
            session()->flash('success_msg', 'Profile Updated Successfully');

            // Redirect back to the edit profile page
            return view('view-profile', compact('user'));
        } else {
            // If the authenticated user is not authorized to update this user's profile
            abort(403, 'Unauthorized action.');
        }
    }
}
