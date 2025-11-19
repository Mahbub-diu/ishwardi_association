<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCoverArea extends Model
{
    use HasFactory;
	
	protected $fillable = [

        'service_id', 'parent_id', 'area_name', 'area_icon', 'sort_order', 'short_description'

    ];
	
	public function ongoingActivityServiceCoverAreas()
    {
        return $this->hasMany('App\Models\OngoingActivityServiceCoverArea', 'service_cover_area_id');
    }
	
	protected function serviceAreaParentListOnly()
	{
		$serviceAreaParentListOnly = ServiceCoverArea::where('parent_id', 0)->pluck('area_name', 'id')
		->toArray();
		
		
		return $serviceAreaParentListOnly;
	}
	
	
	protected function nameListOnly()
	{
		$serviceCoverAreaList = ServiceCoverArea::where('parent_id', 0)->pluck('area_name', 'id')->toArray();
		
		
		return $serviceCoverAreaList;
	}
	
	
	
	protected function keyWiseAllDataList()
	{
		$serviceCoverAreaList = ServiceCoverArea::select('id','service_id','parent_id','area_name','area_icon')->get()->toArray();
		$reArrangeServiceCoverAreaList = [];
		
		foreach( $serviceCoverAreaList as $value)
		{
			$reArrangeServiceCoverAreaList[$value['id']] = $value; 
			
		}
		
		return $reArrangeServiceCoverAreaList;
	}
}
