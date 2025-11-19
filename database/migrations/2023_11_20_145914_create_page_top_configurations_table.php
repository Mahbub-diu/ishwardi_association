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
        Schema::create('page_top_configurations', function (Blueprint $table) {
            $table->id();
			$table->string('page_name')->nullable();
			$table->text('page_heading')->nullable();
			$table->text('top_banner_short_paragraph')->nullable();
			$table->text('top_banner_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_top_configurations');
    }
};
