<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        
        return response()->json(['message' => 'Registration successful']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(["error" => "Desisto men"]);
    }

    public function logout()
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout successful']);
    }

    public function user()
    {
        // Return authenticated user information

        return new UserResource(auth()->user());
    }
    
    public function requestToken(Request $request) : string 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
            $user = Auth::guard('sanctum')->user();
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($user->nome)->plainTextToken;
    }
}
