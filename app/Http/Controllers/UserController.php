<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login(Request $request){
        $inputs = $request->validate([
            'logemail' => ['required'],
            'logpassword' => ['required'],
        ]);

        if(auth()->attempt(['email'=>$inputs['logemail'],'password'=>$inputs['logpassword']])){
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required',Rule::unique('users','name')],
            'email' => ['required',Rule::unique('users','email')],
            'password' => ['required','max:200'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user=User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
}
