<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutInfoLandingPage extends Model
{
    use HasFactory;
	
	protected $fillable = [

        'service_id', 'bullet_points', 'banner_image', 'feature_image', 
		'about_text', 'approved_by', 'published_by', 'status'

    ];
}
