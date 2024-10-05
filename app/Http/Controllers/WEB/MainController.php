<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // Получаем список городов
        $cities = City::all();

        // Получаем выбранный город из сессии
        $selectedCity = session('city');

        // Возвращаем представление с переменными
        return view('index', compact('cities', 'selectedCity'));
    }

    public function about()
    {
        // Получаем выбранный город из сессии
        $selectedCity = session('city');

        // Возвращаем представление о нас с выбранным городом
        return view('about', compact('selectedCity'));
    }

    public function news()
    {
        // Получаем выбранный город из сессии
        $selectedCity = session('city');

        // Возвращаем представление новостей с выбранным городом
        return view('news', compact('selectedCity'));
    }
}
