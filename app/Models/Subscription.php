<?php

namespace App\Models;

use App\Models\Admin\Driver;
use App\Models\Admin\VehicleType;
use App\Models\Request\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'vehicle_type_id',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function requests(): HasMany
    {
        return $this->hasMany(Request::class, 'subscription_id');
    }

    public function vehicleType(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class);
    }
}
