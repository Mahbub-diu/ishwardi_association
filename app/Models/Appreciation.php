<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    use HasFactory;
	
	protected $fillable = [

        'created_user_id', 'modified_user_id', 'deleted_user_id', 'name', 
		'company_name', 'designation', 'details', 'photo'

    ];
}
