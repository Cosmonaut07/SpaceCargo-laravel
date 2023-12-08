<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'Successfully logged in',
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);
        }
        return response()->json([
            'message' => 'Login failed'
        ]) ;
    }
}
