<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorHistory extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'created_user_id', 'modified_user_id', 'deleted_user_id', 'ip', 'country_code', 'country_name', 'region_code', 'region_name', 'city', 'zip_code', 'time_zone', 'latitude', 'longitude', 'metro_code', 'device_info', 'user_agent', 'status', 'updated_at'
    ];
	
}
