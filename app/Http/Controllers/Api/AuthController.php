<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\{LoginRequest, UserRequest};
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create User
     * @param UserRequest $request
     * @return User 
     */
    public function signUp(UserRequest $request)
    {
        try {
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->error($th->getMessage());
        }
    }

    /**
     * Login The User
     * @param LoginRequest $request
     * @return User
     */
    public function login(LoginRequest $request)
    {
        try {

            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::attempt($credentials)) {
                $token = Auth::user()->createToken('myapptoken')->plainTextToken;
                session()->put('token', $token);
                return response()->json($token);

                return response()->json([
                    'status'  => true,
                    'message' => 'User Logged In Successfully',
                    'token'   => $token
                ], 200);
            }

            return response()->json([
                'status'  => false,
                'message' => 'Email & Password does not match with our record.',
            ], 422);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'user logged out'
        ];
    }
}
