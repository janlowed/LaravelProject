<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {

            // $request->session()->regenerate();
            // $request->session()->put('user_email', Auth::user()->email);
            // $request->session()->put('user_password', Auth::user()->password);
            $token = auth()->user()->createToken('token');
            return response()->json([
                'status' => true,
                'message' => 'Login Successful',
                // 'access_token' => $token->plainTextToken,
                'user' => auth()->user(),
            ], 200);
        }
        
        } catch (\Throwable $th) {
            return [
                'status' => 500,
                'message' => $th->getMessage()
            ];
        }
        
    }

    public function logout(Request $request)
    {
        try {
            Session::flush();

            return [
                'status' => 200,
                'message' => 'Successfully Log Out'
            ];
        } catch (\Throwable $th) {
            return [
                'status' => 500,
                'message' => '$th->getMessage'
            ];
        }
    }
    public function getAll(Request $request)
    {
        $getAll = User::all();
        return response()->json($getAll);
    }
}
