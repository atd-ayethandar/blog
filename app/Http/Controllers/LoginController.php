<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if(! $user) {
            throw ValidationException::withMessages([
                'email' => 'The email is not registerd.'
            ]);
        }

        $credentials = [
            'email' => $user->email,
            'password' => $request->password,
        ];

        throw ValidationException::withMessages([
            'email' => 'The email or password is incorrect.'
        ]);

        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('login');
    }
}
