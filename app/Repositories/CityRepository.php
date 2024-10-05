<?php

namespace App\Repositories;

use App\DTOs\CityDTO;
use App\Models\City;

class CityRepository
{
    public function create(CityDTO $data)
    {
        return City::create([
            'name' => $data->name,
            'slug' => $data->slug,
        ]);
    }

}
