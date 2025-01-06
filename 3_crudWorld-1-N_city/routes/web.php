<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LanguageController;

Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');
