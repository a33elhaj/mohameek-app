<?php


namespace App\Repositories;


use App\Exceptions\GeneralJsonException;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class CityRepository extends BaseRepository
{

    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $created = City::query()->create([
                'name'  => data_get($attributes, 'name'),
                'ar_name' => data_get($attributes, 'ar_name'),
                'province_id' => data_get($attributes, 'province_id'),
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Failed to create model.');
            // event(new UserCreated($created));
            return $created;
        });
    }

    /**
     * @param City $city
     * @param array $attributes
     * @return mixed
     */
    public function update($city, array $attributes)
    {
        return DB::transaction(function () use ($city, $attributes) {
            $updated = $city->update([
                'name'  => data_get($attributes, 'name'),
                'ar_name' => data_get($attributes, 'ar_name'),
                'province_id' => data_get($attributes, 'province_id'),
            ]);
            throw_if(!$updated, GeneralJsonException::class, 'Failed to update city.');
            // event(new UserUpdated($user));

            return $city;
        });
    }

    /**
     * @param City $city
     * @return mixed
     */
    public function forceDelete($city)
    {
        return DB::transaction(function () use ($city) {
            $deleted = $city->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Cannot delete city.');
            // event(new UserDeleted($user));
            return $deleted;
        });
    }
}
