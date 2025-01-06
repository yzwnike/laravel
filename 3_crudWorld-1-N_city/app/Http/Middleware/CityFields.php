<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class CityFields
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
              'ID' => 'integer|min:0|max:999999999',
              'Name' => 'required|string|max:35',
              'CountryCode' => 'required|string|size:3',
              'District' => 'required|string|max:20',
              'Population' => 'required|integer|min:0|max:999999999',
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
