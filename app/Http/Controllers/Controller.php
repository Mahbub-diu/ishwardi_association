<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\Models\User;
use App\Models\Service;
use Session;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
	
	function showUserSesData()
	{
		$userId = !empty(Auth::user()->id) ? Auth::user()->id : '';
		
		$userSess = User::first();
		
		return $userSess;
	}
	
	
	/*function showUserBasedPermission()
	{
		$userId = !empty(Auth::user()->id) ? Auth::user()->id : '';
		
		$userPermission = UserSpeceficPermission::Where('user_id', $userId)->get();
		
		return $userPermission;
	}*/
	
	function portalServiceWiseIdentify()
	{
		$currecntUrlLastSegment = !empty(request()->segment(count(request()->segments()))) ? request()->segment(count(request()->segments())) : '/';
		//dd($currecntUrlLastSegment);
		
		$serviceIdentify = Service::where('route', $currecntUrlLastSegment)->pluck('name', 'id')->toArray();
		
		if( !empty( $serviceIdentify ) )
		{
			//key($serviceIdentify);
			
			session()->put('current_service', $serviceIdentify);
			Session::save();
		}
		
		$currentService = session()->get('current_service');
		
		//dd($currentService);
		
		return $currentService;
		
	}
	
}
