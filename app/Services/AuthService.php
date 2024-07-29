<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\User;
use App\Interfaces\CrudInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthService 
{
    public function register($request){
       //register logic here
       $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
       ]);
       $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json($user, 200);

    }

    public function login($request){
        //login logic here
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        //dd($request->all());
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token = Auth::user()->createToken('API Token')->plainTextToken;
        //dd($token);
        return response()->json(['token' => $token]);
    }

}
