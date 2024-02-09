<?php


namespace App\Repositories;


use App\Exceptions\GeneralJsonException;
use App\Models\Customer;
use App\Models\Lawyer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LawyerRepository extends BaseRepository
{

    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $created = Lawyer::query()->create([
                'name'  => data_get($attributes, 'name'),
                'email' => data_get($attributes, 'email'),
                'phone' => data_get($attributes, 'phone'),
                'majors' => data_get($attributes, 'majors'),
                'password' => Hash::make(data_get($attributes, 'password')),
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Failed to create model.');
            // event(new UserCreated($created));
            return $created;
        });
    }

    /**
     * @param Lawyer $lawyer
     * @param array $attributes
     * @return mixed
     */
    public function update($lawyer, array $attributes)
    {
        return DB::transaction(function () use ($lawyer, $attributes) {
            $updated = $lawyer->update([
                'name'  => data_get($attributes, 'name'),
                'email' => data_get($attributes, 'email'),
                // 'phone' => data_get($attributes, 'phone'),
                'majors' => data_get($attributes, 'majors'),
            ]);
            throw_if(!$updated, GeneralJsonException::class, 'Failed to update lawyer.');
            // event(new UserUpdated($user));

            return $lawyer;
        });
    }

    /**
     * @param Lawyer $lawyer
     * @return mixed
     */
    public function forceDelete($lawyer)
    {
        return DB::transaction(function () use ($lawyer) {
            $deleted = $lawyer->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Cannot delete lawyer.');
            // event(new UserDeleted($user));
            return $deleted;
        });
    }
}
