<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ParseCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:cities {areas}';  // Добавляем аргумент areas

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing cities with the HH API and saving to the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $regionKey = $this->argument('areas');

        $response = Http::get("https://api.hh.ru/areas")
            ->collect()
            ->firstWhere('id', config("country.regions.$regionKey"))['areas'];

        foreach ($response as $city) {
            $slug = Str::slug($city['name']);

            City::query()->updateOrInsert(
                ['slug' => $slug],
                ['name' => $city['name']]
            );
        }

        $this->info('Cities parsed and saved successfully!');
    }
}
