<?php

use App\Models\Admin\Driver;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('driver_days', function (Blueprint $table) {
            $table->id();
            $table->string('day_name');
            $table->longText('day_time');
            $table->foreignIdFor(Driver::class, 'driver_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('driver_days');
    }
};
