<?php

namespace App\Http\Controllers;

use App\Console\Constants\CityResponseEnum;
use App\Http\Requests\City\StoreRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Services\CityService;

class CityController extends Controller
{
    public function __construct(protected readonly CityService $cityService)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $this->cityService->storeCity($request->toDTO());
        return response([
            'data' => CityResource::make($data),
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $this->cityService->deleteCity($city);
        return response(['success' => true]);
    }

}
