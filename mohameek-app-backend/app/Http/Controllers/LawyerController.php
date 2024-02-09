<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Http\Requests\StoreLawyerRequest;
use App\Http\Requests\UpdateLawyerRequest;
use App\Http\Resources\LawyerResource;
use App\Repositories\LawyerRepository;
use Illuminate\Http\JsonResponse;
use Request;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lawyers = Lawyer::query()->paginate($request->page_size ?? 20);

        return new JsonResponse([
            'data' => $lawyers
        ]);
        // return LawyerResource::collection($lawyers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLawyerRequest $request, LawyerRepository $repository)
    {
        $created = $repository->create($request->only([
            'name',
            'email',
            'phone',
            'password',
            'majors',
        ]));

        return new LawyerResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lawyer $lawyer)
    {
        return new LawyerResource($lawyer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLawyerRequest $request, Lawyer $lawyer, LawyerRepository $repository)
    {
        $updated = $repository->update($lawyer, $request->only([
            'name',
            'email',
            // 'phone',
            'majors',
        ]));

        return new LawyerResource($updated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lawyer $lawyer, LawyerRepository $repository)
    {
        $deleted = $repository->forceDelete($lawyer);
        return new JsonResponse([
            'data' => 'success',
        ]);
    }

    public function getLawyersByMajor($major)
    {
        $majors = Lawyer::query()->where("major_id", $major)->get();

        return new JsonResponse([
            'data' => $majors,
        ]);
    }
}
