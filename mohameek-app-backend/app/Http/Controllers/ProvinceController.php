<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Http\Requests\StoreProvinceRequest;
use App\Http\Requests\UpdateProvinceRequest;
use App\Http\Resources\ProvinceResource;
use App\Models\City;
use App\Repositories\ProvinceRepository;
use Illuminate\Http\JsonResponse;
use Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Province::query()->get();

        return new JsonResponse([
            'data' => $provinces
        ]);
        // return ProvinceResource::collection($provinces);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProvinceRequest $request, ProvinceRepository $repository)
    {
        $created = $repository->create($request->only([
            'name',
        ]));

        return new ProvinceResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Province $province)
    {
        return new ProvinceResource($province);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Province $province, ProvinceRepository $repository)
    {
        $updated = $repository->update($province, $request->only([
            'name',
        ]));

        return new ProvinceResource($updated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Province $province, ProvinceRepository $repository)
    {
        $deleted = $repository->forceDelete($province);
        return new JsonResponse([
            'data' => 'success',
        ]);
    }

    public function cities($province)
    {
        $cities = City::query()->where("province_id", $province)->get();

        return new JsonResponse([
            'data' => $cities,
        ]);
    }
}
