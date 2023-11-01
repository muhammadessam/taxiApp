<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Models\Admin\ServiceLocation;
use App\Http\Controllers\ApiController;
use App\Models\Admin\Zone;
use App\Transformers\ServiceLocationTransformer;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;

/**
 * @group ServiceLocations
 *
 * Get ServiceLocatons
 */
class ServiceLocationController extends ApiController
{
    /**
     * Get all the ServiceLocatons.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $servicelocationsQuery = ServiceLocation::active()->companyKey();

        $serviceLocations = filter($servicelocationsQuery, new ServiceLocationTransformer)->get();

        return $this->respondOk($serviceLocations);
    }

    public function checkInside(Request $request)
    {
        $request->validate([
            'lat' => 'required',
            'lng' => 'required',
        ]);
        $point = new Point($request['lat'], $request['lng']);
        return $this->respondOk([
            'data' => (bool)Zone::contains('coordinates', $point)->where('active', 1)->count()
        ]);
    }
}
