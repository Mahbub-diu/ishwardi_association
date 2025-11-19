<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleUpdate extends Model
{
    use HasFactory;
	
	
	protected $fillable = [

        'title', 'project_name', 'client_id', 'service_id', 'service_ids', 'service_cover_area_ids', 'feature_image', 'images', 'total_participate', 'activity_short_details', 'activity_full_details', 'approved_by',
		'published_by', 'feature_showing', 'news_event_status', 'status', 'created_user_id', 'modified_rejected_user_id', 'approved_rejected_user_id', 'published_rejected_user_id',
		'deleted_user_id', 'published_date_time', 'created_at', 'updated_at', 'deleted_at'

    ];
}
