<?php

namespace App\Http\Controllers\Lawyers;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use Auth;
use Cookie;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LawyerAuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:lawyers,email',
            'phone' => 'required|unique:lawyers,phone',
            'password' => 'required|string'
        ]);

        $lawyer = Lawyer::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'password' => Hash::make($fields['password']), //$fields['password'],

        ]);

        $token = $lawyer->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24 * 30); // 1 month

        return response([
            'message' => 'customer registration successful',
            'customer' => $lawyer,
            'token' => $token
        ], Response::HTTP_CREATED)->withCookie($cookie);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'phone' => 'required',
            'password' => 'required|string'
        ]);

        //check phone number and password
        $lawyer = Lawyer::where('phone', $fields['phone'])->first();

        if (!$lawyer || !Hash::check($fields['password'], $lawyer->password)) {
            return new JsonResponse([
                'message' => 'Invalid phone number or password',
            ]);
        }

        $token = $lawyer->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24 * 30); // 1 month

        return response([
            'message' => 'Success',
            'customer' => $lawyer,
            'token' => $token
        ], Response::HTTP_ACCEPTED)->withCookie($cookie);
    }

    public function lawyer()
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
