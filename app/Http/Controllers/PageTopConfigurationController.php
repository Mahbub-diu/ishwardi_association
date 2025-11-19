<?php

namespace App\Http\Controllers;

use App\Models\PageTopConfiguration;
use App\Http\Requests\StorePageTopConfigurationRequest;
use App\Http\Requests\UpdatePageTopConfigurationRequest;
use Illuminate\Http\Request;

class PageTopConfigurationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:page-top-configuration-list|page-top-configuration-create|page-top-configuration-edit|page-top-configuration-delete', ['only' => ['index','store']]);
         $this->middleware('permission:page-top-configuration-create', ['only' => ['create','store']]);
         $this->middleware('permission:page-top-configuration-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:page-top-configuration-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
		$data = PageTopConfiguration::paginate(10);
		
		if($request->ajax()){
			
			return view('backend.page-top-configurations.index-pagination',['data'=>$data]); 
       
        }
		
        return view('backend.page-top-configurations.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageTopConfigurationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PageTopConfiguration $pageTopConfiguration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PageTopConfiguration $pageTopConfiguration)
    {
		
       	return view('backend.page-top-configurations.edit',compact('pageTopConfiguration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PageTopConfiguration $pageTopConfiguration)
    {
        $input = $request->all();
        
		
        $this->validate($request, [
				'page_heading' => 'required',
				'top_banner_image' => 'mimes:jpeg,png,jpg,gif,webp|dimensions:width=1920,height=140|max:1024',  // main content must be 1540/140
				//'top_banner_short_paragraph' => 'required',
			]);
		
		
        $input = $request->all();
        $input['updated_at'] = date("Y-m-d h:i:sa");
		
		if ( !empty($input['top_banner_image']) ) {
          
            $imagePath = $input['top_banner_image'];
			
            $imageName = 'top_banner_image_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['top_banner_image']->storeAs('page-top-configurations', $imageName, 'public');
         
            $input['top_banner_image'] = $imageName;
			
			if( !empty($pageTopConfiguration->top_banner_image) ){


                if( file_exists('storage/app/public/page-top-configurations/'.$pageTopConfiguration->top_banner_image) ){
                
                    unlink('storage/app/public/page-top-configurations/'.$pageTopConfiguration->top_banner_image);
                
                }
           }
      
        }
		
		$data = PageTopConfiguration::find( $pageTopConfiguration->id );
        
        if( $data->update($input) ) {
			
			
            $responseStatus = 'success';
            $responseMessage = 'Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
    
        return redirect()->route('page-top-configurations.index')
                        ->with($responseStatus, $responseMessage);
						
		
			
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PageTopConfiguration $pageTopConfiguration)
    {
        //
    }
}
