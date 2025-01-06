<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Middleware\CountryFields;
use App\Http\Controllers\CityController;
use App\Http\Middleware\CityFields;

Route::apiResource('country', CountryController::class);

Route::middleware(CountryFields::class)->group(function () {
    Route::post('/country', [CountryController::class, 'store'])
        ->name('country.store');
    Route::put('/country/{country}', [CountryController::class, 'update'])
        ->name('country.update');
});

Route::post('country/createWithCities', [CountryController::class, 'storeWithCities']);

Route::apiResource('city', CityController::class);

Route::middleware(CityFields::class)->group(function () {
    Route::post('/city', [CityController::class, 'store'])
        ->name('city.store');
    Route::put('/city/{city}', [CityController::class, 'update'])
        ->name('city.update');
});
