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
        Schema::create('single_updates', function (Blueprint $table) {
            $table->id();
			
            $table->string('title')->nullable(0);
            $table->integer('client_id')->default(0);
            $table->string('project_name')->nullable();
            $table->integer('service_id')->default(0);
            $table->string('service_ids')->nullable()->comment('Json Data');
            $table->string('service_cover_area_ids')->nullable()->comment('Json Data');
            $table->text('feature_image')->nullable();
            $table->text('images')->nullable()->comment('Json Data');
			
			$table->integer('total_participate')->nullable();
			$table->text('activity_short_details')->nullable();
			$table->longText('activity_full_details')->nullable();
			
            $table->tinyInteger('feature_showing')->default(0)->comment('0= None, 1= Feature');
			$table->tinyInteger('news_event_status')->default(0)->comment('0=News, 1= Event');
			$table->tinyInteger('status')->default(0)->comment('0= Save for Review, 1= Creator Submitted to Editor, 2= Editor Submitted to Admin, 3= Editor Rejected, 4 = Admin Approved, 5 = Admin Rejected, 6= Superadmin Published, 7= Superadmin Rejected');
            
			$table->integer('created_user_id')->default(0);
            $table->integer('modified_rejected_user_id')->default(0);
            $table->integer('approved_rejected_user_id')->default(0);
            $table->integer('published_rejected_user_id')->default(0);
            $table->dateTime('published_date_time')->useCurrent('CURRENT_TIMESTAMP')->nullable();
            $table->timestamps();
			
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('single_updates');
    }
};
