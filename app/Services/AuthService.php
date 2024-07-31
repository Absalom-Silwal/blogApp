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
       try {
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
        return response()->json(['message'=>'User created sucessfully'],200);
       } catch (\Throwable $th) {
           return response()->json(['message'=>$th->getMessage],500);
       }
       

    }

    public function login($request){
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
            //dd($request->all());
            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            
            return response()->json(['token'=>$token],200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage],500);
        }
      
    }

}
