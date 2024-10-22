<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        // Validation with correct array syntax
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);

        // Create a new user with correct array syntax
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        // Return a JSON response with correct array syntax
        return response()->json([
            "status" => true,
            "message" => "User created successfully"
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
           "email" => "required|email",
            "password" => "required"
        ]);
        $token=JWTAuth::attempt([
            "email"=>$request->email,
            "password"=>$request->password
        ]);
        if(!empty($token)){
            return response()->json([
                "status" => true,
                "message" => "User login successfully",
                "token" => $token
            ]);  
        }
        return response()->json([
            "status" =>false,
            "message" =>"invalid login token"
        ]);
      
    }

    public function profile()
    {
        $userData=auth()->user();
        return response()->json([
            "status" =>true,
            "message" =>"profile data",
            "user" =>$userData
        ]);
      
    }

    public function refreshToken()
    {
        $newToken = auth()->refresh();
        return response()->json([
            "status" =>true,
            "message" =>"new access token genereted",
            "token" =>$newToken
        ]);

    }

    public function logout()
    {
       auth()->logout();
       return response()->json([
        "status" =>true,
        "message" =>"sucessfully logout"
      
    ]);
    }
}