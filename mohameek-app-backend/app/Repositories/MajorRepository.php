<?php


namespace App\Repositories;


use App\Exceptions\GeneralJsonException;
use App\Models\Major;
use Illuminate\Support\Facades\DB;

class MajorRepository extends BaseRepository
{

    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $created = Major::query()->create([
                'name'  => data_get($attributes, 'name'),
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Failed to create model.');
            // event(new UserCreated($created));
            return $created;
        });
    }

    /**
     * @param Major $major
     * @param array $attributes
     * @return mixed
     */
    public function update($major, array $attributes)
    {
        return DB::transaction(function () use ($major, $attributes) {
            $updated = $major->update([
                'name'  => data_get($attributes, 'name'),
            ]);
            throw_if(!$updated, GeneralJsonException::class, 'Failed to update major.');
            // event(new UserUpdated($user));

            return $major;
        });
    }

    /**
     * @param Major $major
     * @return mixed
     */
    public function forceDelete($major)
    {
        return DB::transaction(function () use ($major) {
            $deleted = $major->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Cannot delete major.');
            // event(new UserDeleted($user));
            return $deleted;
        });
    }
}
