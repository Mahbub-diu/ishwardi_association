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
        Schema::create('basic_configurations', function (Blueprint $table) {
            $table->id();
			$table->text('portal_main_logo')->nullable();
			$table->text('portal_footer_logo')->nullable();
			
			$table->integer('district_coverd')->default(0);
			$table->integer('country_coverd')->default(0);
			$table->integer('resource_pool')->default(0);
			
			$table->string('mobile_no', 60)->nullable();
			$table->string('office_hour', 100)->nullable();
			$table->string('email', 60)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('linkedin', 100)->nullable();
            $table->string('twiter', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->string('google_map', 100)->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_configurations');
    }
};
