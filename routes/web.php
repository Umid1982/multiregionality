<?php

use App\Http\Controllers\WEB\CityController;
use App\Http\Controllers\WEB\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Группа маршрутов для страниц с городами
Route::group(['prefix' => session('city', '')], function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/news', [MainController::class, 'news'])->name('news');
});

// Главная страница, показывающая список городов
Route::get('/', [CityController::class, 'index'])->name('index');

// Показ выбранного города по slug
Route::get('/{city}', [CityController::class, 'show'])->name('city.show');

// Установка города через POST-запрос
Route::post('/set-city/{city}', [CityController::class, 'setCity'])->name('city.set');
