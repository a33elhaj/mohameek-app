<?php


namespace App\Repositories;


use App\Exceptions\GeneralJsonException;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerRepository extends BaseRepository
{

    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $created = Customer::query()->create([
                'name'  => data_get($attributes, 'name'),
                'email' => data_get($attributes, 'email'),
                'phone' => data_get($attributes, 'phone'),
                'password' => Hash::make(data_get($attributes, 'password')),
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Failed to create model.');
            // event(new UserCreated($created));
            return $created;
        });
    }

    /**
     * @param Customer $customer
     * @param array $attributes
     * @return mixed
     */
    public function update($customer, array $attributes)
    {
        return DB::transaction(function () use ($customer, $attributes) {
            $updated = $customer->update([
                'name'  => data_get($attributes, 'name'),
                'email' => data_get($attributes, 'email'),
                // 'phone' => data_get($attributes, 'phone'),
            ]);
            throw_if(!$updated, GeneralJsonException::class, 'Failed to update customer.');
            // event(new UserUpdated($user));

            return $customer;
        });
    }

    /**
     * @param Customer $customer
     * @return mixed
     */
    public function forceDelete($customer)
    {
        return DB::transaction(function () use ($customer) {
            $deleted = $customer->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Cannot delete user.');
            // event(new UserDeleted($user));
            return $deleted;
        });
    }
}
