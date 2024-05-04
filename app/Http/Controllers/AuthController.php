<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            // $token = auth()->user()->createToken('token');
            return response()->json([
                'status' => true,
                'message' => 'Login Successful',
                // 'access_token' => $token->plainTextToken,
                'user' => auth()->user(),
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Credentials',
            ], 401);
        }
    }
    public function getAll(Request $request)
    {
        $getAll = User::all();
        return response()->json($getAll);
    }
}
