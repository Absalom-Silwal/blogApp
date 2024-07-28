<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\User;
use App\Interfaces\CrudInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthService 
{
    public function register($data){
       //register logic here
       $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json($user, 201);

    }

    public function login($data){
        //login logic here

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token = Auth::user()->createToken('API Token')->plainTextToken;
        return response()->json(['token' => Auth::user()->createToken('API Token')->plainTextToken]);
    }

}
