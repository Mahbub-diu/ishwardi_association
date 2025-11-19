<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ongoing_activity_service_cover_areas', function (Blueprint $table) {
			$table->id();
			$table->integer('ongoing_activity_id')->default(0);
			$table->integer('service_id')->default(0);
			$table->integer('service_cover_area_id')->default(0);
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ongoing_activity_service_cover_areas');
    }
};
