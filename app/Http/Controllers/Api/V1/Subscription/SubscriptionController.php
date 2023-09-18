<?php

namespace App\Http\Controllers\Api\V1\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Admin\ZoneType;
use App\Models\Plan;
use App\Models\Request\RequestPlace;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'driver_id' => 'required|exists:drivers,id',
            'service_location_id' => 'required|exists:service_locations,id',
            'dates' => 'required|array',
            'pick_up_lat' => 'required',
            'pick_up_lng' => 'required',
            'delivery_lat' => 'required',
            'delivery_lng' => 'required',
            'pickup_time' => 'required',
        ]);
        $plan = Plan::find($request['plan_id']);
        $request->merge([
            'user_id' => auth()->id(),
            'started_at' => now()->toDate(),
            'ended_at' => now()->addDays($plan->days)->toDate(),
            'vehicle_type_id' => $plan->vehicle_type_id,
        ]);
        $subscription = Subscription::create($request->except('dates'));


        foreach ($request['dates'] as $date) {
            $f = \App\Models\Request\Request::create([
                'subscription_id' => $subscription->id,
                'driver_id' => $request['driver_id'],
                'user_id' => auth()->id(),
                'attempt_for_schedule' => true,
                'is_later' => true,
                'is_cancelled' => false,
                'is_completed' => false,
                'trip_start_time' => Carbon::createFromFormat('d-m-Y H:i', $date . ' ' . $request['pickup_time'])->timestamp,
                'is_trip_start' => false,
                'payment_opt' => 1, // cash payment for now,
                'service_location_id' => $request['service_location_id'],
            ]);
            RequestPlace::create([
                'pick_lat' => $request['pick_up_lat'],
                'pick_lng' => $request['pick_up_lng'],
                'drop_lat' => $request['delivery_lat'],
                'drop_lng' => $request['delivery_lng'],
                'request_id' => $f->id,
            ]);
        }

        return $this->respondSuccess($subscription);
    }
}
