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
        Schema::create('about_info_landing_pages', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id')->default(0);
            $table->text('bullet_points')->nullable()->comment('Json Data');
            $table->text('banner_image')->nullable();
            $table->text('feature_image')->nullable();
            $table->text('about_text')->nullable();
			
            $table->integer('approved_by')->default(0);
            $table->integer('published_by')->default(0);
			$table->tinyInteger('status')->default(0)->comment('0=Pending, 1= Editor Approve, 2= Editor Cancel, 3 = Admin Approve, 4 = Admin Cancel, 5= Superadmin Approve, 6= Superadmin Cancel');
            
			$table->integer('created_user_id')->default(0);
            $table->integer('modified_user_id')->default(0);
            $table->integer('deleted_user_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_info_landing_pages');
    }
};
