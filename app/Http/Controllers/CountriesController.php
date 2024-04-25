<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Nette\Utils\Html;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function fetchAndStoreCountries()
    {
        $response = Html::get('https://api.first.org/data/v1/countries');

        $countriesData = $response->json()['data'];

        foreach ($countriesData as $code => $countryData) {
            Country::updateOrCreate(
                // ['code' => $code],
                [
                    'name' => $countryData['country'],
                    // 'currency' => $countryData['currency'],
                ]
            );
        }

        return 'Countries fetched and stored successfully!';
    }


    public function fetchAndStore()
    {

        $countries = Country::orderBy('name')->get();
        return response()->json($countries);
    }
}
