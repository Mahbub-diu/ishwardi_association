<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OngoingActivity extends Model
{
    use HasFactory;
	
	protected $fillable = [

        'title', 'project_name', 'client_id', 'service_id', 'service_ids', 'service_cover_area_ids', 'feature_image', 'images', 'total_participate', 'sample_size', 'activity_short_details', 'activity_full_details', 'approved_by',
		'published_by', 'feature_showing', 'completed_status', 'status', 'created_user_id', 'modified_rejected_user_id', 'approved_rejected_user_id', 'published_rejected_user_id',
		'deleted_user_id', 'published_date_time', 'created_at', 'updated_at', 'deleted_at'

    ];
	
	public function ongoingActivityServiceCoverAreas()
    {
        return $this->hasMany('App\Models\OngoingActivityServiceCoverArea');
    }
	
	
	protected function completedServiceValue( $serviceId )
    {   
		$serviceId = (string)$serviceId; 
        $data = OngoingActivity::whereJsonContains('service_ids', $serviceId)->where('status',6)->count();

        return $data;
    }
	
}
