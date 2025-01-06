<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        foreach ($countries as $country) {
            $country['cities'] = $country->cities;
        }
        return response()->json($countries, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ['Code' => 'unique:country',]
        );

        if ($validator->fails()) {
            return response([
              'errors' => $validator->errors(),
              'body' => $request->all(),
            ], 400);
        }
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    public function storeWithCities(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ['Code' => 'unique:country',]
        );
        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors(),
                'body' => $request->all(),
            ], 400);
        }

        $country = Country::create($request->all());
        foreach ($request->cities as $value) {
            $city = new City();
            $city->fill($value);
            $city->CountryCode = $country->Code;
            $city->save();
        }
        $country->cities;
        return response()->json($country);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $country->cities;
        $country->languages;
        return response()->json($country, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $input = $request->all();
        $country->fill($input)->save();
        return response()->json($country, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return response()->noContent();
    }
}
