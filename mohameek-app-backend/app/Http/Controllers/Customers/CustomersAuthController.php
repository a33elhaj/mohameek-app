<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Auth;
use Cookie;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomersAuthController extends Controller
{
    public function register(Request $request)
    {
        // return $request;
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:customers,email',
            'phone' => 'required|unique:customers,phone',
            'password' => 'required|string'
        ]);

        $customer = Customer::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'password' => $fields['password']  //Hash::make($fields['password']),
        ]);

        $token = $customer->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24 * 30); // 1 month

        return response([
            'message' => 'customer registration successful',
            'customer' => $customer,
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
        $customer = Customer::where('phone', $fields['phone'])->first();

        if (!$customer || !Hash::check($fields['password'], $customer->password)) {
            return new JsonResponse([
                'message' => 'Invalid phone number or password',
            ]);
        }

        $token = $customer->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24 * 30); // 1 month

        return response([
            'message' => 'Success',
            'customer' => $customer,
            'token' => $token
        ], Response::HTTP_ACCEPTED)->withCookie($cookie);
    }

    public function customer()
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
