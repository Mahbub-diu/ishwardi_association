<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OngoingActivityServiceCoverArea extends Model
{
    use HasFactory;
	
	protected $fillable = [

        'ongoing_activity_id', 'service_id', 'service_cover_area_id'

    ];
	
	public function ongoingActivity()
    {
        return $this->belongsTo('App\Models\OngoingActivity', 'ongoing_activity_id');
    }
}
