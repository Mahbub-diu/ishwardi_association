<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurClient extends Model
{
    use HasFactory;
	
	protected $fillable = [

        'client_name', 'web_url', 'client_logo'

    ];
	
	
	protected function getList()
    {   
        $data = OurClient::orderBy('client_name')->pluck('client_name', 'id')->toArray();

        return $data;
    }
	
	protected function clientWithOtherInfoList()
	{
		$clientList = OurClient::get()->toArray(); 
		
		$reArrangeClientList = [];
		foreach($clientList as $c)
		{
			$reArrangeClientList[$c['id']]['client_name'] =  $c['client_name'];
			$reArrangeClientList[$c['id']]['web_url'] =  $c['web_url'];
			$reArrangeClientList[$c['id']]['client_logo'] =  $c['client_logo'];
		}
		
		return $reArrangeClientList ;
	}
	
	
	
}
