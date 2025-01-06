1. Afegir API
php artisan install:api

2. Afegir Ruta Api Resource a routes/api.php
Route::apiResource('country', CountryController::class);

3. Afegir Controlador Country
php artisan make:controller CountryController --api

Hint: Amb php artisan route:list es poden veure totes les rutes programades de la nostra aplicació.

4. Afegir Model Countries
php artisan make:model Country

Hint es pot fer el pas 3 i 4 en una única comanda:
php artisan make:model Country -c --api

5. Omplir funcions del controller.

6. Afegir Middlewares

-- Sila ruta es un apiResource, es pot aplicar middlewares a rutes específicques així (exemple funcional per country): 
Route::middleware(CountryFields::class)->group(function () {
    Route::post('/country', [CountryController::class, 'store'])
        ->name('country.store');
    Route::put('/country/{country}', [CountryController::class, 'update'])
        ->name('country.update');
});