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
        Schema::create('core_teams', function (Blueprint $table) {
            $table->id();
			$table->string('name')->nullable();
			$table->string('designation')->nullable();
			$table->integer('order')->default(1);
            $table->text('photo')->nullable();
            $table->tinyInteger('member_type')->default(0)->comment('1=Top Managements , 2= Advisors Panel, 3 = Core Team Members');
			$table->text('other_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_teams');
    }
};
