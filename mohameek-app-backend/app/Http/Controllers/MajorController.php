<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Http\Resources\MajorResource;
use App\Models\City;
use App\Repositories\MajorRepository;
use Illuminate\Http\JsonResponse;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::query()->get();

        return new JsonResponse([
            'data' => $majors
        ]);
        // return ProvinceResource::collection($provinces);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMajorRequest $request, MajorRepository $repository)
    {
        $created = $repository->create($request->only([
            'name',
        ]));

        return new MajorResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return new MajorResource($major);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMajorRequest $request, Major $major, MajorRepository $repository)
    {
        $updated = $repository->update($major, $request->only([
            'name',
        ]));

        return new MajorResource($updated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major, MajorRepository $repository)
    {
        $deleted = $repository->forceDelete($major);
        return new JsonResponse([
            'data' => 'success',
        ]);
    }
}
