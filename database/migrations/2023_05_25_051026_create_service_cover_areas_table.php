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
        Schema::create('service_cover_areas', function (Blueprint $table) {
            $table->id();
			$table->integer('service_id')->default(0);
			$table->integer('parent_id')->default(0)->comment('two step category');
			$table->string('area_name')->nullable();
			$table->text('area_icon')->nullable();
			$table->text('short_description')->nullable();
			$table->tinyInteger('sort_order')->default(0);
			$table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_cover_areas');
    }
};
