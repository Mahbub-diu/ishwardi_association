<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse ;
use App\Models\OngoingActivity;
use App\Models\Service;
use App\Models\ServiceCoverArea;
use App\Models\User;
use App\Models\OngoingActivityServiceCoverArea;
use App\Models\OurClient;
use App\Http\Requests\StoreOngoingActivityRequest;
use App\Http\Requests\UpdateOngoingActivityRequest;
use Validator;
use Auth;
use File;

class OngoingActivityController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ongoing-activities-list', ['only' => ['index']]);
         $this->middleware('permission:ongoing-activities-create', ['only' => ['create','store']]);
         $this->middleware('permission:ongoing-activities-edit|ongoing-activities-submit', ['only' => ['edit','update']]);
         $this->middleware('permission:ongoing-activities-submit-reject|ongoing-activities-approve-reject|ongoing-activities-publish-unpublish', ['only' => ['approve', 'reject']]);
	}
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
		
        $clients = OurClient::getList();
        $service = Service::getList();
		
		$currentRoleName = User::find(Auth::user()->id)->getRoleNames()->first();
		
		$currendUserID = Auth::user()->id;
		
		$conditions = [];
		$conditionsInValue = [];
		
		$oldData = 0;
		if ( !empty($request->old_data) ){
			
			$oldData = 1;
		}
		
		if( $currentRoleName == 'Data Creator' ){
			
			
			if ( $oldData == 0 ) 
			{	
				$conditions['created_user_id'] = $currendUserID ;
				$conditionsInValue = [0,3] ;
			}else{
				
				$conditions['created_user_id'] = $currendUserID ;
				$conditionsInValue = [1,2,4,5,6,7] ;
			}
			
		} 
		else if( $currentRoleName == 'Data Editor' ){
			
			
			if ( $oldData == 0 ) 
			{	
				$conditionsInValue = [1,5] ; 
				
			}else{
				
				$conditions['modified_rejected_user_id'] = $currendUserID ;
				$conditionsInValue = [2,4,6,7] ;  // not show selft reject data
				
			}
			
		}
		else if( $currentRoleName == 'Admin' ){
			
			if ( $oldData == 0 ) 
			{	
				$conditionsInValue = [2,7] ;
				
			}else{
				
				$conditions['approved_rejected_user_id'] = $currendUserID ;
				$conditionsInValue = [4,6,7] ; // not show selft reject data
				
			}
			
		}
		
		else if( $currentRoleName == 'Super Admin' ){
			
			if ( $oldData == 0 ) 
			{	
				//$conditionsInValue = [4,7] ;
				$conditionsInValue = [4] ;
				
			}else{
				
				$conditions['published_rejected_user_id'] = $currendUserID ;
				$conditionsInValue = [6] ; // not show selft reject data
			}
			
		}
		
		$searchConditions = [];
		if ( !empty($request->client_id) ){
			
			$searchConditions['client_id'] = $request->client_id;
			
		}
		
		$serviceId = [];
		if ( !empty($request->service_id) ){
			
			$serviceId = $request->service_id;
			
		}
		
		$serviceCoverAreaId = '';
		if ( !empty($request->service_cover_area_id) ){
			
			$serviceCoverAreaId = $request->service_cover_area_id;
			
		}
		
		//dd($serviceId);
		unset($searchConditions['old_data']);
		
		if( $currentRoleName != 'System Admin' )
		{
			//dd($conditions);
			$data = OngoingActivity::whereIn('status', $conditionsInValue)
			->where($conditions)
			->where($searchConditions)
			->WhereJsonContains('service_ids', $serviceId)
			->orderBy('published_date_time','DESC')
			->orderBy('client_id','asc')
			->paginate(10);
        
		
		}else{
			
			if ( $oldData == 0 ) 
			{	
				$conditionsInValue = [0,1,2,3,4,5,7] ;
				
			}else{
				$conditionsInValue = [6] ;
			}
			
			//whereJsonContains('images', 'ongoing-activity_120231003053541_yy.jpg')
			
			$data = OngoingActivity::whereIn('status', $conditionsInValue)
			->where($searchConditions)
			->WhereJsonContains('service_ids', $serviceId)
			->WhereJsonContains('service_cover_area_ids', $serviceCoverAreaId)
			->orderBy('published_date_time','DESC')
			->orderBy('client_id','asc')
			->paginate(10);
			
		}
		
		if($request->ajax()){
			
			return view('backend.ongoing-activities.index-pagination',['data'=>$data, 'currendUserID' => $currendUserID, 'currentRoleName' => $currentRoleName, 'clients' => $clients, 'service' => $service ]); 
       
        }
		
		
        return view('backend.ongoing-activities.index',compact('currendUserID', 'currentRoleName', 'data', 'clients', 'service'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$clients = OurClient::getList();
		$services = Service::getList();
		$serviceCoverArea = ServiceCoverArea::nameListOnly();
		
		$currentRoleName = User::find(Auth::user()->id)->getRoleNames()->first();
		//dd($currentRoleName);
		
        return view('backend.ongoing-activities.create', compact('currentRoleName', 'services', 'clients', 'serviceCoverArea' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
			$validator = Validator::make($request->all(), [
				'title' => 'required|max:250',
				'client_id' => 'required',
				//'project_name' => 'required',
				//'service_id' => 'required',
				'service_ids' => 'required|array',
				//'service_cover_area_id' => 'required|array',
				'service_cover_area_ids' => 'required|array',
				//'feature_image' => 'required|mimes:jpeg,png,jpg,webp',
				//'feature_image' => 'mimes:jpeg,png,jpg,webp|dimensions:width=600,height=420|max:1024',
				//'image1' => 'mimes:jpeg,png,jpg,webp|dimensions:width=600,height=420|max:1024',
				//'image2' => 'mimes:jpeg,png,jpg,webp|dimensions:width=600,height=420|max:1024',
				'total_participate' => 'integer',
				'sample_size' => 'integer',
				'activity_short_details' => 'required',
				'activity_full_details' => 'required',
			], 
            [
               'service_id.required' => 'Service is required',
               'service_cover_area_id.required' => 'Service cover area is required',
            ])->validate();
    
        $input = $request->all();
		
		//dd($input['image']);
		
		if ( !empty($input['feature_image']) ) 
		{
            
            $imagePath = $input['feature_image'];
			
            $imageName = 'ongoingActivity_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['feature_image']->storeAs('ongoing-activities', $imageName, 'public');
         
            $input['feature_image'] = $imageName;
      
        }
		
		$images = [];
		
		if( !empty($input['image1']) )
		{
			$imagePath = $input['image1'];
			
			$imageName = 'ongoing-activity_1'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
			$path = $imagePath->storeAs('ongoing-activities', $imageName, 'public');
         
			$image1  = $imageName;
			
			$images[] = $image1;
			
		}
		
		if( !empty($input['image2']) )
		{
			$imagePath = $input['image2'];
			
			$imageName = 'ongoing-activity_2'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
			$path = $imagePath->storeAs('ongoing-activities', $imageName, 'public');
         
			$image2  = $imageName;
			
			$images[] = $image2;
			
		}
		
		if( !empty($input['image3']) )
		{
			$imagePath = $input['image1'];
			
			$imageName = 'ongoing-activity_3'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
			$path = $imagePath->storeAs('ongoing-activities', $imageName, 'public');
         
			$image3  = $imageName;
			
			$images[] = $image3;
			
		}
		
		//dd($images );
		
		
		
        $input['service_ids'] = json_encode($input['service_ids']);
        $input['service_cover_area_ids'] = !empty($input['service_cover_area_ids']) ? json_encode($input['service_cover_area_ids']) : [""];
        $input['images'] = json_encode($images);
		
		$currentRoleName = User::find(Auth::user()->id)->getRoleNames()->first();
		
		if( $currentRoleName == 'Data Creator' ||  $currentRoleName == 'System Admin' ){
			
			$currendUserID = Auth::user()->id;
			
			$input['created_user_id'] = $currendUserID;
		
			$save = OngoingActivity::create($input);
			
			if( !empty( $input['service_cover_area_id'] ) )
			{
				foreach( $input['service_cover_area_id'] as $value )
				{
					OngoingActivityServiceCoverArea::create(['ongoing_activity_id' => $save->id, 'service_id' => $input['service_id'], 'service_cover_area_id' => $value]);
				}
			} 
			
			return redirect()->route('ongoing-activities.index')
                        ->with('success','Data added successfully');
		}else{
			
			return redirect()->route('ongoing-activities.index')
                        ->with('error','Access Denied');
						
		}
		
		
       
    }

    /**
     * Display the specified resource.
     */
    public function show(OngoingActivity $ongoingActivity)
    {
        $clients = OurClient::getList();
        //dd($services);
		
		$images = json_decode($ongoingActivity->images);
		
		$services = Service::whereIn('id', json_decode( $ongoingActivity->service_ids ))->pluck('name', 'id')->toArray();
		//dd($services);
		//$serviceCoverArea = ServiceCoverArea::nameListOnly();
		
		$serviceCoverArea = [];
		
		if( !empty ($ongoingActivity->service_cover_area_ids) )
		{
			$serviceCoverArea = ServiceCoverArea::whereIn('id', json_decode( $ongoingActivity->service_cover_area_ids ))->pluck('area_name', 'id')->toArray();
		}
		//dd($serviceCoverArea);
		
		$currentRoleName = User::find(Auth::user()->id)->getRoleNames()->first();
		
		return view('backend.ongoing-activities.show',compact('currentRoleName', 'clients', 'services', 'images', 'ongoingActivity', 'serviceCoverArea' ));
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OngoingActivity $ongoingActivity)
    {
		$clients = OurClient::getList();
        $services = Service::getList();
		
		$images = json_decode($ongoingActivity->images);
		
		$serviceIds =  !empty( $ongoingActivity->service_ids ) ? json_decode( $ongoingActivity->service_ids ) : [];
		//dd($images[0]);
		
		//$serviceCoverArea = ServiceCoverArea::nameListOnly();
		$serviceCoverArea = ServiceCoverArea::whereIn('service_id', $serviceIds)->where('parent_id', 0)->pluck('area_name', 'id')->toArray();
		
		//dd($serviceCoverArea);
		
		
        return view('backend.ongoing-activities.edit',compact( 'clients', 'services', 'images', 'ongoingActivity', 'serviceCoverArea' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OngoingActivity $ongoingActivity) : RedirectResponse
    {
		
		$validator = Validator::make($request->all(), [
				'title' => 'required|max:250',
				'client_id' => 'required',
				//'project_name' => 'required',
				//'service_id' => 'required',
				'service_ids' => 'required|array',
				//'service_cover_area_id' => 'required|array',
				'service_cover_area_ids' => 'required|array',
				//'feature_image' => 'mimes:jpeg,png,jpg,webp|dimensions:width=600,height=420|max:1024',
				//'image1' => 'mimes:jpeg,png,jpg,webp|dimensions:width=600,height=420|max:1024',
				//'image2' => 'mimes:jpeg,png,jpg,webp|dimensions:width=600,height=420|max:1024',
				
				'total_participate' => 'integer',
				'sample_size' => 'integer',
				'activity_short_details' => 'required',
				'activity_full_details' => 'required',
			], 
            [
               'service_id.required' => 'Service is required',
               'service_cover_area_id.required' => 'Service cover area is required',
            ])->validate();
    
        $input = $request->all();
		
		if ( empty($input['feature_showing'] ) )
		{
			$input['feature_showing'] = 0;
		}
		
		if ( empty($input['completed_status'] ) )
		{
			$input['completed_status'] = 0;
		}
		//dd($input);
		
		if ( !empty($input['feature_image'])  &&  empty($input['feature_remove_image']) ) 
		{
            
            $imagePath = $input['feature_image'];
			
            $imageName = 'ongoingActivity_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['feature_image']->storeAs('ongoing-activities', $imageName, 'public');
         
            $input['feature_image'] = $imageName;
			
			if( file_exists('storage/app/public/ongoing-activities/'.$ongoingActivity->feature_image)  ){
				
				if( !empty($ongoingActivity->feature_image) ){
					
					unlink('storage/app/public/ongoing-activities/'.$ongoingActivity->feature_image);
			
				}
				
			}
        }
		
		else if( empty($input['feature_image']) && !empty($input['feature_remove_image']) )
		{
			 $input['feature_image'] = '';
			 
			if( file_exists('storage/app/public/ongoing-activities/'.$ongoingActivity->feature_image)  ){
				
				if( !empty($ongoingActivity->feature_image) ){
					
					unlink('storage/app/public/ongoing-activities/'.$ongoingActivity->feature_image);
			
				}
				
			}
		}
		
		$prevImages = json_decode($ongoingActivity->images);
		//dd($prevImages);
		
		$images = [];
		
		
		if ( !empty($input['image1'])   &&  empty($input['remove_image1']) ) 
		{
            
            $imagePath = $input['image1'];
			
            $imageName = 'ongoing-activity_1'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['image1']->storeAs('ongoing-activities', $imageName, 'public');
         
            $images[] = $imageName;
      
			if( !empty($prevImages[0]) ){


                if( file_exists('storage/app/public/ongoing-activities/'.$prevImages[0]) ){
                
                    unlink('storage/app/public/ongoing-activities/'.$prevImages[0]);
                
                }
           }
		   
        }
		else if( empty($input['image1']) && !empty($input['remove_image1']) )
		{
			//$input['feature_image'] = '';
			 
			if( file_exists('storage/app/public/ongoing-activities/'.$prevImages[0])  ){
				
				if( !empty($prevImages[0]) ){
					
					unlink('storage/app/public/ongoing-activities/'.$prevImages[0]);
			
				}
				
			}
			
			$images[] = '' ;
			
		}else{
			
			$images[] = !empty( $prevImages[0] ) ? $prevImages[0] : '' ;
		}
		
		
		if( !empty($input['image2']) &&  empty($input['remove_image2']) )
		{
			$imagePath = $input['image2'];
			
			$imageName = 'ongoing-activity_2'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
			$path = $imagePath->storeAs('ongoing-activities', $imageName, 'public');
         
			$image2  = $imageName;
			
			$images[] = $image2;
			
			if( !empty($prevImages[1]) ){


                if( file_exists('storage/app/public/ongoing-activities/'.$prevImages[1]) ){
                
                    unlink('storage/app/public/ongoing-activities/'.$prevImages[1]);
                
                }
           }
		}
		else if( empty($input['image2']) && !empty($input['remove_image2']) )
		{
			//$input['feature_image'] = '';
			 
			if( file_exists('storage/app/public/ongoing-activities/'.$prevImages[1])  ){
				
				if( !empty($prevImages[1]) ){
					
					unlink('storage/app/public/ongoing-activities/'.$prevImages[1]);
			
				}
				
			}
			
			$images[] = '' ;
			
		}else{
			$images[] = !empty( $prevImages[1] ) ? $prevImages[1] : '' ;
		}
		
		
		if( !empty($input['image3']) )
		{
			$imagePath = $input['image3'];
			
			$imageName = 'ongoing-activity_3'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
			$path = $imagePath->storeAs('ongoing-activities', $imageName, 'public');
         
			$image3  = $imageName;
			
			$images[] = $image3;
			
			if( !empty($prevImages[2]) ){


                if( file_exists('storage/app/public/ongoing-activities/'.$prevImages[2]) ){
                
                    unlink('storage/app/public/ongoing-activities/'.$prevImages[2]);
                
                }
           }
			
		}else{
			$images[] = !empty( $prevImages[2] ) ? $prevImages[2] : '' ;
		}
		
		
		//dd($images );
		
			
		$input['service_ids'] = json_encode($input['service_ids']);
        $input['service_cover_area_ids'] = json_encode($input['service_cover_area_ids']);
        $input['images'] = json_encode($images);
		
		//dd($input['images']);
		
		$data = OngoingActivity::find( $ongoingActivity->id );
        
		
		/*OngoingActivityServiceCoverArea::where('ongoing_activity_id', $ongoingActivity->id)->delete();
		
		if( !empty( $input['service_cover_area_id'] ) )
		{	
			foreach( $input['service_cover_area_id'] as $value )
			{
				OngoingActivityServiceCoverArea::create(['ongoing_activity_id' => $ongoingActivity->id, 'service_id' => $input['service_id'], 'service_cover_area_id' => $value]);
			}
		}*/
		
		
        if( $data->update($input) ) {
            $responseStatus = 'success';
            $responseMessage = 'Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
		
		if( $ongoingActivity->status == 6 ){
		
			return redirect('/ongoing-activities?page='.$input['page'].'&old_data='.$input['old_data'])
                        ->with($responseStatus, $responseMessage);
						
		}else{ // unpublish data redirect to view details page
			
			return redirect()->route('ongoing-activities.show', $ongoingActivity->id)
                        ->with($responseStatus, $responseMessage);
		}
						
        /*return redirect()->route('ongoing-activities.show', $ongoingActivity->id)
                        ->with($responseStatus, $responseMessage);*/
						
						
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OngoingActivity $ongoingActivity)
    {
		if( file_exists('storage/app/public/ongoing-activities/'.$ongoingActivity->image) ){
                
			//unlink('storage/app/public/ongoing-activities/'.$ongoingActivity->image);
		
		}
		
        OngoingActivity::find($ongoingActivity->id)->delete();
		
		
        return response()->json(['success'=>'Data Deleted Successfully!']);
    }
	
	
	public function submitApprovePublish($id)
    {
		$currendUserID = Auth::user()->id;
		
		$statusValue = 0;
		
		$responseStatus = '';
		$responseMessage = '';
		
		
		$currentRoleName = User::find(Auth::user()->id)->getRoleNames()->first();
		//$roleInfo = $user;
		//dd($currentRoleName);
		
		if( $currentRoleName == 'Data Creator' )
		{
			$statusValue = 1;
			
			$responseMessage = 'Data Submitted Successfully!';
			
		}
		else if( $currentRoleName == 'Data Editor' )
		{
			$statusValue = 2;
			$input['modified_rejected_user_id'] = $currendUserID;
			
			$responseMessage = 'Data Submitted Successfully!';
			
		}else if( $currentRoleName == 'Admin' )
		{
			$statusValue = 4;
			$input['approved_rejected_user_id'] = $currendUserID;
			
			$responseMessage = 'Data Approved Successfully!';
			
		}else if( $currentRoleName == 'Super Admin' ||  $currentRoleName == 'System Admin' )
		{
			$statusValue = 6;
			$input['published_rejected_user_id'] = $currendUserID;
			
			$input['published_date_time'] = date('Y-m-d h:i:s');
			
			$responseMessage = 'Data Published Successfully!';
			
		}
	   
		$data = OngoingActivity::find( $id );
		
		$input['status'] = $statusValue;

		if( $data->update($input) ) {
			$responseStatus = 'success';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }
		
		
        return response()->json([$responseStatus=>$responseMessage]);
    }
	
	
	public function rejectUnpublish($id)
    {
		$currendUserID = Auth::user()->id;
		
		$statusValue = 0;
		
		$responseStatus = '';
		$responseMessage = '';
		
		
		$currentRoleName = User::find(Auth::user()->id)->getRoleNames()->first();
		//$roleInfo = $user;
		//dd($currentRoleName);
		
		if( $currentRoleName == 'Data Editor' )
		{
			$statusValue = 3;
			$input['modified_rejected_user_id'] = $currendUserID;
			
			$responseMessage = 'Data Rejected Successfully!';
			
		}else if( $currentRoleName == 'Admin' )
		{
			$statusValue = 5;
			$input['approved_rejected_user_id'] = $currendUserID;
			
			$responseMessage = 'Data Rejected Successfully!';
			
		}else if( $currentRoleName == 'Super Admin' ||  $currentRoleName == 'System Admin' )
		{
			$statusValue = 7;
			$input['published_rejected_user_id'] = $currendUserID;
			
			$responseMessage = 'Data Unpublished Successfully!';
			
		}
	   
		$data = OngoingActivity::find( $id );
		
		$input['status'] = $statusValue;

		if( $data->update($input) ) {
			$responseStatus = 'success';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }
		
		
        return response()->json([$responseStatus=>$responseMessage]);
    }
	
	
	public function ajaxLoadServiceCoverArea( $id )
	{
		$ids = preg_split ("/\,/", $id);  
		//dd($ids);
		$data = ServiceCoverArea::where('parent_id', 0)->whereIn('service_id', $ids)->pluck('area_name', 'id')->toArray();
		
		//dd($data);

        return response()->json($data);
	}
}
