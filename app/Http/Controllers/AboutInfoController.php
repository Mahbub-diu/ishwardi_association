<?php

namespace App\Http\Controllers;

use App\Models\AboutInfo;
use App\Http\Requests\StoreAboutInfoRequest;
use App\Http\Requests\UpdateAboutInfoRequest;
use Illuminate\Http\Request;
use Auth;

class AboutInfoController extends Controller
{
    
	function __construct()
    {
         $this->middleware('permission:about-other-info-list|about-other-info-create|about-other-info-edit|about-other-info-delete', ['only' => ['index','store']]);
         $this->middleware('permission:about-other-info-create', ['only' => ['create','store']]);
         $this->middleware('permission:about-other-info-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:about-other-info-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = AboutInfo::orderBy('id','DESC')->first();
		
		return view('backend.about-infos.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about-infos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
     {
        $this->validate($request, [
				//'about_primary_info' => 'required',
				'mission_icon' => 'required|mimes:jpeg,png,jpg,gif,webp|dimensions:width=150,height=150|max:1024',
				'vision_icon' => 'required|mimes:jpeg,png,jpg,gif,webp|dimensions:width=150,height=150|max:1024',
				'value_risk_icon' => 'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
				'organogram' => 'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
				'mission_statement' => 'required',
				'vision_statement' => 'required',
				'value_risk_policy' => 'required',
				
			]);
    
        $input = $request->all();
		
		if ( !empty($input['mission_icon']) ) 
		{
            
            $imagePath = $input['mission_icon'];
			
            $imageName = 'aboutUs_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['mission_icon']->storeAs('about-us', $imageName, 'public');
         
            $input['mission_icon'] = $imageName;
      
        }
		
		if ( !empty($input['organogram']) ) 
		{
            
            $imagePath = $input['organogram'];
			
            $imageName = 'organogram_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['organogram']->storeAs('about-us', $imageName, 'public');
         
            $input['organogram'] = $imageName;
      
        }
		
		if ( !empty($input['value_risk_icon']) ) 
		{
            
            $imagePath = $input['value_risk_icon'];
			
            $imageName = 'valueRiskIcon_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['value_risk_icon']->storeAs('about-us', $imageName, 'public');
         
            $input['value_risk_icon'] = $imageName;
      
        }
		
		if ( !empty($input['value_risk_icon']) ) 
		{
            
            $imagePath = $input['value_risk_icon'];
			
            $imageName = 'valueRiskIcon_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['value_risk_icon']->storeAs('about-us', $imageName, 'public');
         
            $input['value_risk_icon'] = $imageName;
      
        }
		
		if ( !empty($input['value_risk_spinner_icon']) ) 
		{
            
            $imagePath = $input['value_risk_spinner_icon'];
			
            $imageName = 'valueRiskSpinnerIcon_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['value_risk_spinner_icon']->storeAs('about-us', $imageName, 'public');
         
            $input['value_risk_spinner_icon'] = $imageName;
      
        }
		
        AboutInfo::create($input);
		
        return redirect()->route('about-infos.index')
                        ->with('success','Data added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(AboutInfo $aboutInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutInfo $aboutInfo)
    {
		
		$aboutInfo = AboutInfo::find($aboutInfo->id);
		return view('backend.about-infos.edit',compact('aboutInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutInfo $aboutInfo)
    {
        $this->validate($request, [
				//'about_primary_info' => 'required',
				'mission_icon' => 'mimes:jpeg,png,jpg,gif,webp|dimensions:width=150,height=150|max:1024',
				'vision_icon' => 'mimes:jpeg,png,jpg,gif,webp|dimensions:width=150,height=150|max:1024',
				'value_risk_icon' => 'mimes:jpeg,png,jpg,gif,webp|max:1024',
				
				'mission_statement' => 'required',
				'value_risk_spinner_icon' => 'mimes:jpeg,png,jpg,webp',
				'organogram' => 'mimes:jpeg,png,jpg,gif,webp|max:1024',
				'vision_statement' => 'required',
				//'total_experience_year' => 'required',
				'district_covered' => 'required',
				'country_covered' => 'required|integer',
				'resource_pool' => 'required|integer',
				'value_risk_policy' => 'required',
			]);
    
        $input = $request->all();
		
		if ( !empty($input['mission_icon']) ) 
		{
            
            $imagePath = $input['mission_icon'];
			
            $imageName = 'aboutInfo_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['mission_icon']->storeAs('about-us', $imageName, 'public');
         
            $input['mission_icon'] = $imageName;
			
			if( file_exists('storage/app/public/about-us/'.$aboutInfo->mission_icon)  ){
				
				if( !empty($aboutInfo->mission_icon) ){
					
					unlink('storage/app/public/about-us/'.$aboutInfo->mission_icon);
			
				}
				
			}
        }
		
		if ( !empty($input['vision_icon']) ) 
		{
            
            $imagePath = $input['vision_icon'];
			
            $imageName = 'aboutInfo_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['vision_icon']->storeAs('about-us', $imageName, 'public');
         
            $input['vision_icon'] = $imageName;
			
			if( file_exists('storage/app/public/about-us/'.$aboutInfo->vision_icon)  ){
				
				if( !empty($aboutInfo->vision_icon) ){
					
					unlink('storage/app/public/about-us/'.$aboutInfo->vision_icon);
			
				}
				
			}
        }
		
		if ( !empty($input['value_risk_icon']) ) 
		{
            
            $imagePath = $input['value_risk_icon'];
			
            $imageName = 'aboutInfo_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['value_risk_icon']->storeAs('about-us', $imageName, 'public');
         
            $input['value_risk_icon'] = $imageName;
			
			if( file_exists('storage/app/public/about-us/'.$aboutInfo->value_risk_icon)  ){
				
				if( !empty($aboutInfo->value_risk_icon) ){
					
					unlink('storage/app/public/about-us/'.$aboutInfo->value_risk_icon);
			
				}
				
			}
        }
		
		if ( !empty($input['organogram']) &&  empty($input['organogram_remove_image']) ) 
		{
            $imagePath = $input['organogram'];
			
            $imageName = 'organogram_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['organogram']->storeAs('about-us', $imageName, 'public');
         
            $input['organogram'] = $imageName;
			
			if( file_exists('storage/app/public/about-us/'.$aboutInfo->organogram)  ){
				
				if( !empty($aboutInfo->organogram) ){
					
					unlink('storage/app/public/about-us/'.$aboutInfo->organogram);
			
				}
				
			}
        }
		
		else if( empty($input['organogram']) && !empty($input['organogram_remove_image']) )
		{
			 $input['organogram'] = '';
			 
			if( file_exists('storage/app/public/about-us/'.$aboutInfo->organogram)  ){
				
				if( !empty($aboutInfo->organogram) ){
					
					unlink('storage/app/public/about-us/'.$aboutInfo->organogram);
			
				}
				
			}
		}
		
		
		if ( !empty($input['value_risk_spinner_icon']) ) 
		{
            
            $imagePath = $input['value_risk_spinner_icon'];
			
            $imageName = 'aboutInfo_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['value_risk_spinner_icon']->storeAs('about-us', $imageName, 'public');
         
            $input['value_risk_spinner_icon'] = $imageName;
			
			if( file_exists('storage/app/public/about-us/'.$aboutInfo->value_risk_spinner_icon)  ){
				
				if( !empty($aboutInfo->value_risk_spinner_icon) ){
					
					unlink('storage/app/public/about-us/'.$aboutInfo->value_risk_spinner_icon);
			
				}
				
			}
        }
		
		$input['modified_user_id'] = !empty(Auth::user()->id) ? Auth::user()->id : 0;
        $input['updated_at'] = date("Y-m-d h:i:sa");;

		$data = AboutInfo::find( $aboutInfo->id );
		
		
        if( $data->update($input) ) {
            $responseStatus = 'success';
            $responseMessage = 'Data Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
    
        return redirect()->route('about-infos.index')
                        ->with($responseStatus, $responseMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutInfo $aboutInfo)
    {
        //
    }
}
