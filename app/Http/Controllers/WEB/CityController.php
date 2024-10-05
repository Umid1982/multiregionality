<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Services\CityService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller
{
    public function __construct(protected readonly CityService $cityService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = $this->cityService->getCities();
        $selectedCity = session('city');

        // Если город выбран, перенаправляем на соответствующую ссылку
        if ($selectedCity) {
            return redirect()->route('city.show', ['city' => $selectedCity]);
        }

        return view('welcome', compact('cities', 'selectedCity'));
    }

    /**
     * Установка города в сессии
     */
    public function setCity($city)
    {
        session(['city' => Str::slug($city->name)]);
        return redirect()->route('index');
    }

    /**
     * Показ списка городов с выделением выбранного
     */
    public function show($slug)
    {
        $cities = $this->cityService->getCities();

        $selectedCity = collect($cities)->first(function ($city) use ($slug) {
            return Str::slug($city['name']) === $slug;
        });

        if (!$selectedCity) {
            abort(404, 'City not found');
        }

        // Сохраняем выбранный город в сессии
        session(['city' => $slug]);

        return view('city', compact('cities', 'slug'));
    }
}
