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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
    ]);
       try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]);
        return response()->json(['message'=>'User created sucessfully'],200);
       } catch (\Throwable $th) {
           return response()->json(['message'=>$th->getMessage()],500);
       }
       

    }

    public function login($request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        try {
            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            $user->update([
                'remember_token' => $token
            ]);
            return response()->json(['token'=>$token],200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()],500);
        }
      
    }

    public function apiLogout($request){
        try {
            //$user = Auth::user();
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Logged out successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()],500);
        }
      
    }

    public function webLogout($request){
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return response()->json(['message' => 'Logged out successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()],500);
        }
      
    }

}
