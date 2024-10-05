<?php

namespace App\DTOs;

use Illuminate\Support\Str;

class CityDTO
{
    public string $slug;

    public function __construct(public string $name)
    {
        $this->slug = Str::slug($name);
    }

}
