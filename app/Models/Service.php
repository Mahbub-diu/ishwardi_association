<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
	
	protected $fillable = [

       'order', 'short_description', 'icon'

    ];
	
	protected function getList()
    {   
	
        $data = Service::where('id', '!=', 5)->pluck('name', 'id')->toArray();

        return $data;
    }
	
	
	
}
