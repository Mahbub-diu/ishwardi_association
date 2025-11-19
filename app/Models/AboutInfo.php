<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutInfo extends Model
{
    use HasFactory;
	
	protected $fillable = [

        'district_covered', 'country_covered', 'resource_pool', 'about_primary_info', 'mission_icon', 'mission_statement', 'vision_icon', 'vision_statement', 'value_risk_icon', 'value_risk_spinner_icon', 'organogram', 'value_risk_policy', 'total_experience_year'
		
		];
}
