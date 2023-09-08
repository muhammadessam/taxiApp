<?php

namespace App\Models;

use App\Models\Admin\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverDay extends Model
{
    protected $fillable = [
        'day_name',
        'day_time',
        'driver_id',
    ];

    protected $casts = ['day_time' => 'array'];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

}
