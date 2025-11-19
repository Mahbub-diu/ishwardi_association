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
        Schema::create('about_infos', function (Blueprint $table) {
            $table->id();
			$table->integer('district_covered')->default(0);
			$table->integer('country_covered')->default(0);
			$table->integer('resource_pool')->default(0);
			$table->text('about_primary_info')->nullable();
			$table->text('mission_icon')->nullable();
			$table->text('mission_statement')->nullable();
			$table->text('vision_icon')->nullable();
			$table->text('vision_statement')->nullable();
			$table->text('value_risk_icon')->nullable();
			$table->text('value_risk_spinner_icon')->nullable();
			$table->text('organogram')->nullable();
			$table->text('value_risk_policy')->nullable();
			$table->tinyInteger('total_experience_year')->default(0);
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_infos');
    }
};
