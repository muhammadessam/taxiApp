<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price_per_km');
            $table->unsignedInteger('days');
            $table->foreignIdFor(\App\Models\Admin\VehicleType::class, 'vehicle_type_id')->nullable()->default(null)
                ->constrained('vehicle_types', 'id')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
