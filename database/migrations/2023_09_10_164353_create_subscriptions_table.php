<?php

use App\Models\Admin\Driver;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Plan::class, 'plan_id')->nullable()->default(null)->references('id')->on('plans')->nullOnDelete();
            $table->date('started_at')->nullable()->default(null);
            $table->date('ended_at')->nullable()->default(null);
            $table->foreignIdFor(User::class, 'user_id')->nullable()->default(null);
            $table->foreignIdFor(Driver::class, 'driver_id')->nullable()->default(null);
            $table->string('pick_up_lat')->nullable()->default(null);
            $table->string('pick_up_lng')->nullable()->default(null);
            $table->string('delivery_lat')->nullable()->default(null);
            $table->string('delivery_lng')->nullable()->default(null);
            $table->time('pickup_time')->nullable()->default(null);
            $table->decimal('price_per_km')->nullable()->default(null);
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
