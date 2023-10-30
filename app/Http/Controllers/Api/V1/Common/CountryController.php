<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Models\Country;
use App\Http\Controllers\ApiController;
use App\Models\Request\Request;
use App\Transformers\CountryTransformer;

/**
 * @group Countries
 *
 * Get countries
 */
class CountryController extends ApiController
{
    /**
     * Get all the countries.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $countriesQuery = Country::active();

        $countries = filter($countriesQuery, new CountryTransformer)->defaultSort('name')->get();

        return $this->respondOk($countries);
    }

    public function defaultLatLng(Request $request)
    {
        return $this->respondSuccess([
            'lat' => get_settings('default_latitude'),
            'lng' => get_settings('default_longitude'),
        ]);
    }
}
