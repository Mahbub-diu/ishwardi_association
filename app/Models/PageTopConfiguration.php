<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTopConfiguration extends Model
{
    use HasFactory;
	
	protected $fillable = [

        'page_name', 'page_heading', 'top_banner_short_paragraph', 'top_banner_image'

    ];
}
