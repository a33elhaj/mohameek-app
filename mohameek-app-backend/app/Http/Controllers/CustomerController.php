<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Repositories\CustomerRepository;
use DB;
use Hash;
use Illuminate\Http\JsonResponse;
use Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::query()->paginate($request->page_size ?? 20);

        return new JsonResponse([
            'data' => $customers
        ]);
        // return CustomerResource::collection($customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request, CustomerRepository $repository)
    {
        $created = $repository->create($request->only([
            'name',
            'email',
            'phone',
            'password',
        ]));
        return new CustomerResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer, CustomerRepository $repository)
    {
        $updated = $repository->update($customer, $request->only([
            'name',
            'email',
            // 'phone',
        ]));

        return new CustomerResource($updated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, CustomerRepository $repository)
    {
        $deleted = $repository->forceDelete($customer);
        return new JsonResponse([
            'data' => 'success',
        ]);
    }
}
