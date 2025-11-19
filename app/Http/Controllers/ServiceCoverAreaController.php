<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCoverArea;
use App\Http\Requests\StoreServiceCoverAreaRequest;
use App\Http\Requests\UpdateServiceCoverAreaRequest;
use App\Rules\ServiceCoverAreaRule;

class ServiceCoverAreaController extends Controller
{
    
	function __construct()
    {
         $this->middleware('permission:featured-service-list|featured-service-create|featured-service-edit|featured-service-delete', ['only' => ['index','store']]);
         $this->middleware('permission:featured-service-create', ['only' => ['create','store']]);
         $this->middleware('permission:featured-service-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:featured-service-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $services = Service::getList();
		
		$searchConditions = [];
		if ( !empty($request->service_id) ){
			
			$searchConditions['service_id'] = $request->service_id;
			
		}
		
		if ( !empty($request->parent_id) ){
			
			$searchConditions['parent_id'] = $request->parent_id;
			
		}
		
		$parentList = ServiceCoverArea::serviceAreaParentListOnly();
		
		$data = ServiceCoverArea::where($searchConditions)->orderBy('id','desc')->paginate(10);
		
		if($request->ajax()){
			
			return view('backend.service-cover-areas.index-pagination',['data'=>$data,'services'=>$services, 'parentList'=>$parentList]); 
       
        }
		
		
			
        return view('backend.service-cover-areas.index',compact('parentList', 'data', 'services'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::getList();
        
		$parentList = ServiceCoverArea::serviceAreaParentListOnly();
		//dd($parentList);
		
        return view( 'backend.service-cover-areas.create', compact('parentList', 'services') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
		$input = $request->all();
		
		$totalLength = 0;
		
		if( !empty( $input['parent_id'] ) && ( $input['parent_id'] > 0 )   ) 
		{
			
			$totalLength = ServiceCoverArea::where('parent_id', $input['parent_id'])->count();
				//dd($totalLength);
		
		}else{
			
			$totalLength = ServiceCoverArea::where('parent_id', 0)->where('service_id', $input['service_id'])->count();
			//dd($totalLength);
		}
		
		//dd($totalLength);
         $this->validate($request, [
				'service_id' => 'required',
				'area_name' => 'required|unique:service_cover_areas,area_name',
				'sort_order' => 'required|numeric|lt:'.$totalLength+2,
				'area_icon' => 'mimes:jpeg,png,jpg,gif,svg,webp|dimensions:width=260,height=200',
				
			]);
    
      
		
		
		
		
		if ( !empty($input['area_icon']) ) {
			
			$imagePath = $input['area_icon'];
			
			$imageName = 'service_area_icon_'.date('Ymdhis_').$imagePath->getClientOriginalName();
		   
			$path = $input['area_icon']->storeAs('service-cover-areas', $imageName, 'public');
		 
			$input['area_icon'] = $imageName;
	  
		}
		
		
		$serviceCoverArea = ServiceCoverArea::create($input);
		
		if( !empty( $input['parent_id'] ) && ( $input['parent_id'] > 0 )   ) 
		{
			$updateOrder = ServiceCoverArea::select('id', 'sort_order')
			->where( 'id', '!=', $serviceCoverArea->id )
			->where('sort_order', '>=', $input['sort_order'])
			->where('parent_id', $input['parent_id'] )
			->get();
		}else{
			
			$updateOrder = ServiceCoverArea::select('id', 'sort_order')
			->where( 'id', '!=', $serviceCoverArea->id )
			->where('sort_order', '>=', $input['sort_order'])
			->where('service_id', $input['service_id'] )
			->get();
		}
			
			//$totalLength = sizeof($updateOrder);
			
			//dd($updateOrder->toArray());
			$updateValue = ($input['sort_order']+1);
			foreach($updateOrder as $v)
			{
				//dd($updateValue);
				
				$orderInpur['sort_order'] = $updateValue++;
				//dd($orderInpur);
				$orderUpdate = ServiceCoverArea::find( $v->id );
				$orderUpdate->update($orderInpur);
				
			}
			
		
        return redirect()->route('service-cover-areas.index')
                        ->with('success','Data added successfully');
		
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCoverArea $serviceCoverArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCoverArea $serviceCoverArea)
    {
        $services = Service::getList();
        $parentList = ServiceCoverArea::serviceAreaParentListOnly();
		
		return view('backend.service-cover-areas.edit',compact('parentList', 'serviceCoverArea', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCoverArea $serviceCoverArea)
    {
        $input = $request->all();
        
		$totalLength = 0;
		
		if( !empty( $input['parent_id'] ) && ( $input['parent_id'] > 0 )   ) 
		{
			
			$totalLength = ServiceCoverArea::where('parent_id', $input['parent_id'])->count();
			
		}else{
			
			$totalLength = ServiceCoverArea::where('parent_id', 0)
			->where('service_id', $input['service_id'])->count();
		}
		
		 
		//dd($totalLength);
        $this->validate($request, [
				'service_id' => 'required',
				'area_name' => 'required|unique:service_cover_areas,area_name,'.$serviceCoverArea->id,
				
				'sort_order' => 'required|numeric|lt:'.$totalLength+2,
				'area_icon' => 'mimes:jpeg,png,jpg,gif,webp|dimensions:width=260,height=200',
				
			]);

      
        $input = $request->all();
        $input['updated_at'] = date("Y-m-d h:i:sa");;

		
		if ( !empty($input['area_icon']) ) {
            
            $imagePath = $input['area_icon'];
			
            $imageName = 'service_area_icon_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['area_icon']->storeAs('service-cover-areas', $imageName, 'public');
         
            $input['area_icon'] = $imageName;
			
			if( !empty($serviceCoverArea->area_icon) ){


                if( file_exists('storage/app/public/service-cover-areas/'.$serviceCoverArea->area_icon) ){
                
                    unlink('storage/app/public/service-cover-areas/'.$serviceCoverArea->area_icon);
                
                }
           }
      
        }
		
    

        $data = ServiceCoverArea::find( $serviceCoverArea->id );
         
        if( $data->update($input) ) {
			
			if( !empty( $input['parent_id'] ) && ( $input['parent_id'] > 0 )   ) 
			{
				$updateOrder = ServiceCoverArea::select('id', 'sort_order')
				->where( 'id', '!=', $serviceCoverArea->id )
				->where('sort_order', '>=', $input['sort_order'])
				->where('parent_id', $input['parent_id'] )
				->get();
			}else{
				
				$updateOrder = ServiceCoverArea::select('id', 'sort_order')
				->where( 'id', '!=', $serviceCoverArea->id )
				->where('sort_order', '>=', $input['sort_order'])
				->where('service_id', $input['service_id'] )
				->get();
			}
			
			$updateValue = ($input['sort_order']+1);
			foreach($updateOrder as $v)
			{
				//dd($updateValue);
				
				$orderInpur['sort_order'] = $updateValue++;
				//dd($orderInpur);
				$orderUpdate = ServiceCoverArea::find( $v->id );
				$orderUpdate->update($orderInpur);
				
			}
			
		
            $responseStatus = 'success';
            $responseMessage = 'Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
    
    
		
		return redirect('/service-cover-areas?page='.$input['page'])
                         ->with($responseStatus, $responseMessage);	
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCoverArea $serviceCoverArea)
	{
		
		if( !empty( $serviceCoverArea->area_icon ) && file_exists('storage/app/public/service-cover-areas/'.$serviceCoverArea->area_icon) ){
                
			unlink('storage/app/public/service-cover-areas/'.$serviceCoverArea->area_icon);
		
		}
		
        ServiceCoverArea::find($serviceCoverArea->id)->delete();

        return response()->json(['success'=>'Data Deleted Successfully!']);
    }
}
