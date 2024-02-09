<?php

namespace App\Http\Controllers;

use App\Events\Users\UserCreated;
use App\Models\User;
use Auth;
use Cookie;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24 * 30); // 1 month

        return response([
            'message' => 'user registration successful',
            'user' => $user,
            'token' => $token
        ], Response::HTTP_CREATED)->withCookie($cookie);

    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user(); //User::where('email', $request['email'])->firstOrFail();
        // $token = $user->createToken('auth_token')->plainTextToken;
        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24 * 30); // 1 month

        return response([
            'message' => 'Success',
            'user' => $user,
            'token' => $token
        ], Response::HTTP_ACCEPTED)->withCookie($cookie);
    }

    public function user()
    {
        return Auth::user();
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }
}
