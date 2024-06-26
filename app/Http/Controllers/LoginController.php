<?php

namespace App\Http\Controllers;

use App\Mail\NewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class loginController extends Controller
{
    public function login(Request $request)
    {
        try {

            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            if(empty($user)){
                return response()->json([
                    'message'=> '404 not found'
                ],404);
            }

            if(!Hash::check($request->password, $user->password)){
                return response()->json([
                    'message'=> 'Invalid Credentials',
                ],404);
            }
            $code = rand(100000, 999999);
            $updateResult = $user->update([
                'otp_code' => $code,
            ]);

            Http::asForm()->post('https://api.semaphore.co/api/v4/messages', [
                'apikey' => env('SEMAPHORE_API_KEY'),
                'number' => '09639623877',
                'message' => 'Your otp code is '. $code,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Valid Data'
            ]);

            if ($updateResult) {
                return response()->json([
                    'status' => true,
                    'message' => 'OTP sent successfully',
                    'code' => $code,
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to send OTP',
                ], 500); 
            }


        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function verifyOTP(Request $request)
    {
        try {
            $validateOTP = Validator::make($request->all(), [
                'otp_code' => 'required|min:6' 
            ]);

            if($validateOTP->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateOTP->errors()
                ], 401);
            }


            $user = User::where('otp_code', $request->otp_code)->first();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid OTP',
                ], 401);
            }


            $user->update(['otp_code' => null]);

            return response()->json([
                'status' => true,
                'message' => 'OTP Verified Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'address' => 'required',

            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $password = $request->input('password');

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'address' => $request->address,

                'password' => Hash::make($request->password),
            ]);

            Mail::to($user->email)->send(new NewUserMail($user, $password));


            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function profile(){
        return view ('profile.index');
    }


public function welcome(){
    return view('welcome');
}
public function users(){

    return view('users.index');

}
public function dashboard(){
        return view('dashboard');
}
}