<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'plan_id',
        'started_at',
        'ended_at',
        'user_id',
        'driver_id',
        'pick_up_lat',
        'pick_up_lng',
        'delivery_lat',
        'delivery_lng',
        'pickup_time',
        'payment_id',
        'price_per_km',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];
}
