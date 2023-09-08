<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanDriverController extends Controller
{
    public function setDriverAvailability(Request $request)
    {
        $request->validate([
            'days' => 'required|array|required_array_keys:SATURDAY,SUNDAY,MONDAY,TUESDAY,WEDNESDAY,THURSDAY,FRIDAY'
        ]);
        auth()->user()->driver->driverDays()->delete();
        foreach ($request['days'] as $day => $times) {
            if (count($times)) {
                auth()->user()->driver->driverDays()->create([
                    'day_name' => $day,
                    'day_time' => $times,
                ]);
            }
        }
        return response()->json(['data' => auth()->user()->driver->driverDays], Response::HTTP_OK);
    }

    public function setDriverLocations(Request $request)
    {
        $request->validate([
            'lat' => 'required',
            'lng' => 'required',
        ]);
        auth()->user()->driver()->update([
            'lat' => $request['lat'],
            'lng' => $request['lng']
        ]);
        return response()->json(['data' => auth()->user()], Response::HTTP_OK);
    }
}
