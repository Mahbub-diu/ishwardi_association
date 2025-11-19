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
        Schema::create('visitor_histories', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 60)->nullable();

            $table->string('country_code', 60)->nullable(); 
            $table->string('country_name', 60)->nullable(); 
            $table->string('region_code', 60)->nullable(); 
            $table->string('region_name', 60)->nullable(); 
            $table->string('city', 60)->nullable(); 

            $table->string('zip_code', 60)->nullable(); 
            $table->string('time_zone', 60)->nullable(); 
            $table->string('latitude', 60)->nullable(); 
            $table->string('longitude', 60)->nullable(); 
            $table->string('metro_code', 60)->nullable(); 
            $table->text('device_info')->nullable(); 
            $table->text('user_agent')->nullable(); 

            
            $table->integer('status')->default(1)->comment('0= Inactive, 1= Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_histories');
    }
};
