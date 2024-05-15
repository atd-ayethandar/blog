<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use  App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create() 
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'password' => Hash::make($request->password),
        ]);

        return redirect('login');
    }
}
