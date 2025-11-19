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
        Schema::table('ongoing_activities', function (Blueprint $table) {
            
			$table->string('sample_size')->nullable()->after('total_participate');
			 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ongoing_activities', function (Blueprint $table) {
            
			$table->dropColumn('sample_size');
			
        });
    }
};
