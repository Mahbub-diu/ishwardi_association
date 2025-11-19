<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SingleUpdate;
Use App\Models\Service;
Use App\Models\User;
Use App\Models\OurClient;
Use App\Models\ServiceCoverArea;
use App\Http\Requests\StoreSingleUpdateRequest;
use App\Http\Requests\UpdateSingleUpdateRequest;
use Validator;
use Auth;
class SingleUpdateController extends Controller
{
      function __construct()
    {
         $this->middleware('permission:news-event-list', ['only' => ['index']]);
         $this->middleware('permission:news-event-create', ['only' => ['create','store']]);
         $this->middleware('permission:news-event-edit|news-event-submit', ['only' => ['edit','update']]);
         $this->middleware('permission:news-event-submit-reject|news-event-approve-reject|news-event-publish-unpublish', ['only' => ['approve', 'reject']]);
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
		/*if ( !empty($request->client_id) ){
			
			$searchConditions['client_id'] = $request->client_id;
			
		}
		
		$serviceId = [];
		if ( !empty($request->service_id) ){
			
			$serviceId = $request->service_id;
			
		}
		
		$serviceCoverAreaId = [];
		if ( !empty($request->service_cover_area_id) ){
			
			$serviceCoverAreaId = $request->service_cover_area_id;
			
		}*/
		
		//dd($serviceId);
		unset($searchConditions['old_data']);
		
		if( $currentRoleName != 'System Admin' )
		{
			//dd($conditions);
			$data = SingleUpdate::whereIn('status', $conditionsInValue)
			->where($conditions)
			->where($searchConditions)
			//->WhereJsonContains('service_ids', $serviceId)
			->orderBy('published_date_time','DESC')
			//->orderBy('client_id','asc')
			->paginate(10);
        
		
		}else{
			
			if ( $oldData == 0 ) 
			{	
				$conditionsInValue = [0,1,2,3,4,5,7] ;
				
			}else{
				$conditionsInValue = [6] ;
			}
			
			
			//whereJsonContains('images', 'ongoing-activity_120231003053541_yy.jpg')
			
			$data = SingleUpdate::whereIn('status', $conditionsInValue)
			->where($searchConditions)
			//->WhereJsonContains('service_ids', $serviceId)
			//->WhereJsonContains('service_cover_area_ids', $serviceCoverAreaId)
			->orderBy('published_date_time','DESC')
			//->orderBy('client_id','asc')
			->paginate(10);
			
		}
		
		if($request->ajax()){
			
			return view('backend.single-updates.index-pagination',['data'=>$data, 'currendUserID' => $currendUserID, 'currentRoleName' => $currentRoleName, 'clients' => $clients, 'service' => $service ]); 
       
        }
		
		
        return view('backend.single-updates.index',compact('currendUserID', 'currentRoleName', 'data', 'clients', 'service'))
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
		
		return view('backend.single-updates.create', compact('currentRoleName', 'services', 'clients', 'serviceCoverArea' ));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
			$validator = Validator::make($request->all(), [
				'title' => 'required|max:250',
				'feature_image' => 'mimes:jpeg,png,jpg,webp|dimensions:width=600,height=420|max:1024',
				//'total_participate' => 'required',
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
           
            $path = $input['feature_image']->storeAs('single-updates', $imageName, 'public');
         
            $input['feature_image'] = $imageName;
      
        }
		
		$images = [];
		
		$i = 1;
		foreach( $input['images'] as $img )
		{
			//if( !empty($input['image1']) )
			//{
				$imagePath = $img;
				
				$imageName = 'single-updates_'.$i++.'_'.date('Ymdhis_').$imagePath->getClientOriginalName();
			   
				$path = $imagePath->storeAs('single-updates', $imageName, 'public');
			 
				
				$images[] = $imageName;
				
			//}
		}
		
	
		
		//dd($images );
		
		
		
       // $input['service_ids'] = json_encode($input['service_ids']);
       // $input['service_cover_area_ids'] = json_encode($input['service_cover_area_ids']);
        $input['images'] = json_encode($images);
		
		$currentRoleName = User::find(Auth::user()->id)->getRoleNames()->first();
		
		if( $currentRoleName == 'Data Creator' ||  $currentRoleName == 'System Admin' ){
			
			$currendUserID = Auth::user()->id;
			
			$input['created_user_id'] = $currendUserID;
		
			$save = SingleUpdate::create($input);
			
			
			return redirect()->route('single-updates.index')
                        ->with('success','Data added successfully');
		}else{
			
			return redirect()->route('single-updates.index')
                        ->with('error','Access Denied');
						
		}
		
		
       
    }

    /**
     * Display the specified resource.
     */
    public function show(SingleUpdate $singleUpdate)
	{
        $clients = OurClient::getList();
        //dd($services);
		
		$images = json_decode($singleUpdate->images);
		
		
		$currentRoleName = User::find(Auth::user()->id)->getRoleNames()->first();
		
		return view('backend.single-updates.show', compact('currentRoleName', 'images', 'singleUpdate') );
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SingleUpdate $singleUpdate)
    {
        $clients = OurClient::getList();
        $services = Service::getList();
		
		$images = json_decode($singleUpdate->images);
		
		//$serviceIds =  !empty( $singleUpdate->service_ids ) ? json_decode( $singleUpdate->service_ids ) : [];
		//dd($images[0]);
		
		//$serviceCoverArea = ServiceCoverArea::nameListOnly();
		//$serviceCoverArea = ServiceCoverArea::whereIn('service_id', $serviceIds)->where('parent_id', 0)->pluck('area_name', 'id')->toArray();
		
		//dd($serviceCoverArea);
		 
		 return view('backend.single-updates.edit',compact( 'clients', 'services', 'images', 'singleUpdate'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SingleUpdate $singleUpdate) 
    {
		
		$validator = Validator::make($request->all(), [
				'title' => 'required|max:250',
				//'client_id' => 'required',
				//'project_name' => 'required',
				//'service_id' => 'required',
				//'service_ids' => 'required|array',
				//'service_cover_area_id' => 'required|array',
				//'service_cover_area_ids' => 'required|array',
				'feature_image' => 'mimes:jpeg,png,jpg,webp|dimensions:width=600,height=420|max:1024',
				//'image1' => 'mimes:jpeg,png,jpg,webp|dimensions:width=600,height=420|max:1024',
				//'image2' => 'mimes:jpeg,png,jpg,webp|dimensions:width=600,height=420|max:1024',
				
				//'total_participate' => 'required',
				'activity_short_details' => 'required',
				'activity_full_details' => 'required',
			], 
            [
               'service_id.required' => 'Service is required',
              // 'service_cover_area_id.required' => 'Service cover area is required',
            ])->validate();
    
        $input = $request->all();
		
		if ( empty($input['feature_showing'] ) )
		{
			$input['feature_showing'] = 0;
		}
		
		if ( empty($input['news_event_status'] ) )
		{
			$input['news_event_status'] = 0;
		}
		
		//dd($input);
		
		if ( !empty($input['feature_image']) ) 
		{
            
            $imagePath = $input['feature_image'];
			
            $imageName = 'single-updates_1'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['feature_image']->storeAs('single-updates', $imageName, 'public');
         
            $input['feature_image'] = $imageName;
			
			if( file_exists('storage/app/public/single-updates/'.$singleUpdate->feature_image)  ){
				
				if( !empty($singleUpdate->feature_image) ){
					
					unlink('storage/app/public/single-updates/'.$singleUpdate->feature_image);
			
				}
				
			}
        }
		
		
		if( !empty( $input['remove_images'] ) )
		{
			foreach( $input['remove_images'] as $valRemoveImg )
			{
				if( $valRemoveImg != null )
				{
					if( file_exists('storage/app/public/single-updates/'.$valRemoveImg)  ){
					
						unlink('storage/app/public/single-updates/'.$valRemoveImg);
					
					}
				}
			}
		}
		
		
		$images = [];
		if( !empty( $input['old_images'] ) )
		{
			$images = array_values($input['old_images']);
		}
		
		$i = !empty($input['old_images']) ? sizeof( $input['old_images'] ) +1 : 1 ;
		
		if ( !empty( $input['new_images'] ) )
		{
		
			foreach( $input['new_images'] as $img )
			{
				//if( !empty($input['image1']) )
				//{
					$imagePath = $img;
					
					$imageName = 'single-updates_'.$i++.'_'.date('Ymdhis_').$imagePath->getClientOriginalName();
				   
					$path = $imagePath->storeAs('single-updates', $imageName, 'public');
				 
					
					$images[] = $imageName;
					
				//}
			}
		}
		
		
		
		
		//dd($images );
		
			
		//$input['service_ids'] = json_encode($input['service_ids']);
        //$input['service_cover_area_ids'] = json_encode($input['service_cover_area_ids']);
        $input['images'] = json_encode($images);
		
		//dd($input['images']);
		
		$data = SingleUpdate::find( $singleUpdate->id );
        
		
		
        if( $data->update($input) ) {
            $responseStatus = 'success';
            $responseMessage = 'Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
		
		if( $singleUpdate->status == 6 ){
		
			return redirect('/single-updates?page='.$input['page'].'&old_data='.$input['old_data'])
                        ->with($responseStatus, $responseMessage);
						
		}else{ // unpublish data redirect to view details page
			
			return redirect()->route('single-updates.show', $singleUpdate->id)
                        ->with($responseStatus, $responseMessage);
		}
						
        /*return redirect()->route('ongoing-activities.show', $singleUpdate->id)
                        ->with($responseStatus, $responseMessage);*/
						
						
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SingleUpdate $singleUpdate)
     {
		if( file_exists('storage/app/public/single-updates/'.$singleUpdate->image) ){
                
			//unlink('storage/app/public/ongoing-activities/'.$singleUpdate->image);
		
		}
		
        SingleUpdate::find($singleUpdate->id)->delete();
		
		
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
	   
		$data = SingleUpdate::find( $id );
		
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
	   
		$data = SingleUpdate::find( $id );
		
		$input['status'] = $statusValue;

		if( $data->update($input) ) {
			$responseStatus = 'success';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }
		
		
        return response()->json([$responseStatus=>$responseMessage]);
    }
	
	
	
}
