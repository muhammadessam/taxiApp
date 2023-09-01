<?php

namespace App\Models;

use App\Models\Admin\VehicleType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Plan extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'price_per_km',
        'days',
        'vehicle_type_id',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('plan.logo')->singleFile()->useDisk('plans');
    }

    public function vehicle_type(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class);
    }
}
