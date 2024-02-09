<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Repositories\CityRepository;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::query()->get();

        return new JsonResponse([
            'data' => $cities
        ]);
        // return CityResource::collection($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request, CityRepository $repository)
    {
        $created = $repository->create($request->only([
            'name',
            'ar_name',
            'province_id',
        ]));

        return new CityResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return new CityResource($city);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city, CityRepository $repository)
    {
        $updated = $repository->update($city, $request->only([
            'name',
            'ar_name',
            'province_id',
        ]));

        return new CityResource($updated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city, CityRepository $repository)
    {
        $deleted = $repository->forceDelete($city);
        return new JsonResponse([
            'data' => 'success',
        ]);
    }
}
