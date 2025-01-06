<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class CountryFields
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validator = Validator::make(
            $request->all(),
            [
              'Code' => 'required|string|size:3',
              'Name' => 'required|string|max:52',
              'Continent' => 'required|in:Asia,Europe,North America,Africa,Oceania,Antarctica,South America',
              'Region' => 'required|string|max:26',
              'SurfaceArea' => 'required|numeric|min:0|max:99999999.99|regex:/^\d+(\.\d{1,2})?$/',
              'IndepYear' => 'nullable|integer|min:0|max:999999',
              'Population' => 'required|integer|min:0|max:999999999',
              'LifeExpectancy' => 'nullable|numeric|min:0|max:99.9|regex:/^\d+(\.\d{1})?$/',
              'GNP' => 'nullable|numeric|min:0|max:99999999.99|regex:/^\d+(\.\d{1,2})?$/',
              'GNPOld' => 'nullable|numeric|min:0|max:99999999.99|regex:/^\d+(\.\d{1,2})?$/',
              'LocalName' => 'required|string|max:45',
              'GovernmentForm' => 'required|string|max:45',
              'HeadOfState' => 'nullable|string|max:60',
              'Capital' => 'nullable|int|min:0|max:999999999',
              'Code2' => 'required|string|max:2',
            ]
        );

        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors(),
                'body' => $request->all(),
            ], 400);
        }
          return $next($request);
    }
}
