<?php

namespace App\Services;

use App\DTOs\CityDTO;
use App\Models\City;
use App\Repositories\CityRepository;
use Exception;
use Illuminate\Support\Facades\Http;

class CityService
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /** @throws Exception */

    public function getCities()
    {
        $response = Http::get("https://api.hh.ru/areas")
            ->collect()
            ->firstWhere('id', '113')['areas']; // ID России = 113

        return $response;
    }
    public function storeCity(CityDTO $cityDTO)
    {
        return $this->cityRepository->create($cityDTO);
    }

    public function deleteCity(City $city)
    {
        return $city->delete();
    }
}
