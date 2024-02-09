<?php


namespace App\Repositories;


use App\Exceptions\GeneralJsonException;
use App\Models\Province;
use Illuminate\Support\Facades\DB;

class ProvinceRepository extends BaseRepository
{

    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $created = Province::query()->create([
                'name'  => data_get($attributes, 'name'),
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
    public function update($province, array $attributes)
    {
        return DB::transaction(function () use ($province, $attributes) {
            $updated = $province->update([
                'name'  => data_get($attributes, 'name'),
            ]);
            throw_if(!$updated, GeneralJsonException::class, 'Failed to update province.');
            // event(new UserUpdated($user));

            return $province;
        });
    }

    /**
     * @param Lawyer $lawyer
     * @return mixed
     */
    public function forceDelete($province)
    {
        return DB::transaction(function () use ($province) {
            $deleted = $province->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Cannot delete province.');
            // event(new UserDeleted($user));
            return $deleted;
        });
    }
}
