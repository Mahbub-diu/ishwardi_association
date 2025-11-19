<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
	
	protected $fillable = [

        'office_hour', 'mobile_no', 'email', 'facebook', 'twiter', 'linkedin', 'instagram', 'youtube', 'google_map', 'address'	

    ];
}
