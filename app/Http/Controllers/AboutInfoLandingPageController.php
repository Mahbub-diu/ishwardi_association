<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\AboutInfoLandingPage;
use App\Http\Requests\StoreAboutInfoLandingPageRequest;
use App\Http\Requests\UpdateAboutInfoLandingPageRequest;

class AboutInfoLandingPageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:about-core-info-list|about-core-info-create|about-core-info-edit|about-core-info-delete', ['only' => ['index','store']]);
         $this->middleware('permission:about-core-info-create', ['only' => ['create','store']]);
         $this->middleware('permission:about-core-info-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:about-core-info-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $service = Service::getList();
		
		$data = AboutInfoLandingPage::orderBy('id','DESC')->paginate(10);
		
        return view('backend.about-info-landing-pages.index',compact('data', 'service'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::getList();
		
        return view('backend.about-info-landing-pages.create', compact( 'services' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'service_id' => 'required|unique:about_info_landing_pages,service_id',
			'banner_image' => 'required|mimes:jpeg,png,jpg,gif,webp|dimensions:width=916,height=861|max:1024',
			'feature_image' => 'required|mimes:jpeg,png,jpg,gif,webp|dimensions:width=589,height=637|max:1024',
			
			
           // 'bullet_point_1' => 'required',
            //'bullet_point_2' => 'required',
            //'bullet_point_3' => 'required',
            //'bullet_point_4' => 'required',
			
            'about_text' => 'required|array',
			]);
    
        $input = $request->all();
		$input['about_text'] = json_encode($input['about_text']);
		
		//dd($input['image']);
		
		if ( !empty($input['banner_image']) ) 
		{
            
            $imagePath = $input['banner_image'];
			
            $imageName = 'about_info_landing_pages_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['banner_image']->storeAs('about-info-landing-pages', $imageName, 'public');
         
            $input['banner_image'] = $imageName;
      
        }
		
		if ( !empty($input['feature_image']) ) 
		{
            
            $imagePath = $input['feature_image'];
			
            $imageName = 'about_info_landing_pages_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['feature_image']->storeAs('about-info-landing-pages', $imageName, 'public');
         
            $input['feature_image'] = $imageName;
      
        }
		
		
		//dd($images );
		
		/*$bulletPoints[] = !empty($input['bullet_point_1']) ? $input['bullet_point_1'] : '';
		$bulletPoints[] = !empty($input['bullet_point_2']) ? $input['bullet_point_2'] : '';
		$bulletPoints[] = !empty($input['bullet_point_3']) ? $input['bullet_point_3'] : '';
		$bulletPoints[] = !empty($input['bullet_point_4']) ? $input['bullet_point_4'] : '';
		
        $input['bullet_points'] = json_encode($bulletPoints);*/
		
		AboutInfoLandingPage::create($input);
		
		
		
        return redirect()->route('about-info-landing-pages.index')
                        ->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutInfoLandingPage $aboutInfoLandingPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutInfoLandingPage $aboutInfoLandingPage)
    {
		
        $services = Service::getList();
		
		
		$aboutText = json_decode($aboutInfoLandingPage->about_text);
		//dd($aboutText);
		$aboutText1 = !empty($aboutText[0]) ? $aboutText[0] : '';
		$aboutText2 = !empty($aboutText[1]) ? $aboutText[1] : '';
		$aboutText3 = !empty($aboutText[2]) ? $aboutText[2] : '';
		//dd($aboutText1);
		
		$bullets_points = json_decode($aboutInfoLandingPage->bullet_points);
		//dd($bullets_points);
		
        return view('backend.about-info-landing-pages.edit',compact('aboutText1', 'aboutText2', 'aboutText3', 'aboutInfoLandingPage', 'services', 'bullets_points' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutInfoLandingPage $aboutInfoLandingPage)
    {
        $this->validate($request, [
            'service_id' => 'unique:about_info_landing_pages,service_id,'.$aboutInfoLandingPage->id,
			'banner_image' => 'mimes:jpeg,png,jpg,gif,webp|dimensions:width=916,height=861|max:1024',
			'feature_image' => 'mimes:jpeg,png,jpg,gif,webp|max:1024',
			//'feature_image' => 'mimes:jpeg,png,jpg,gif,webp|dimensions:width=589,height=637|max:1024',
			
			//'bullet_point_1' => 'required',
            //'bullet_point_2' => 'required',
            //'bullet_point_3' => 'required',
            //'bullet_point_4' => 'required',
			
            'about_text' => 'required',
			]);
			
			
        $input = $request->all();
		
		//dd($input['image']);
		
		if ( !empty($input['banner_image']) ) 
		{
            
            $imagePath = $input['banner_image'];
			
            $imageName = 'about_info_landing_pages_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['banner_image']->storeAs('about-info-landing-pages', $imageName, 'public');
         
            $input['banner_image'] = $imageName;
			
			if( file_exists('storage/app/public/about-info-landing-pages/'.$aboutInfoLandingPage->banner_image) ){
			
				unlink('storage/app/public/about-info-landing-pages/'.$aboutInfoLandingPage->banner_image);
			
			}
      
        }
		
		if ( !empty($input['feature_image']) ) 
		{
            
            $imagePath = $input['feature_image'];
			
            $imageName = 'about_info_landing_pages_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['feature_image']->storeAs('about-info-landing-pages', $imageName, 'public');
         
            $input['feature_image'] = $imageName;
			
			if( file_exists('storage/app/public/about-info-landing-pages/'.$aboutInfoLandingPage->feature_image) ){
			
				unlink('storage/app/public/about-info-landing-pages/'.$aboutInfoLandingPage->feature_image);
			
			}
      
        }
	
		
        $bulletPoints[] = !empty($input['bullet_point_1']) ? $input['bullet_point_1'] : '';
		$bulletPoints[] = !empty($input['bullet_point_2']) ? $input['bullet_point_2'] : '';
		$bulletPoints[] = !empty($input['bullet_point_3']) ? $input['bullet_point_3'] : '';
		$bulletPoints[] = !empty($input['bullet_point_4']) ? $input['bullet_point_4'] : '';
		
        $input['bullet_points'] = json_encode($bulletPoints);
		
		//dd($input['images']);
		
		$data = AboutInfoLandingPage::find( $aboutInfoLandingPage->id );
       
		
        if( $data->update($input) ) {
            $responseStatus = 'success';
            $responseMessage = 'Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
    
        return redirect()->route('about-info-landing-pages.index')
                        ->with($responseStatus, $responseMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    
	
	public function destroy(AboutInfoLandingPage $aboutInfoLandingPage)
    {
		if( file_exists('storage/app/public/about-info-landing-pages/'.$aboutInfoLandingPage->banner_image) ){
                
			unlink('storage/app/public/about-info-landing-pages/'.$aboutInfoLandingPage->banner_image);
		
		}
		
		if( file_exists('storage/app/public/about-info-landing-pages/'.$aboutInfoLandingPage->feature_image) ){
                
			unlink('storage/app/public/about-info-landing-pages/'.$aboutInfoLandingPage->feature_image);
		
		}
		
        AboutInfoLandingPage::find($aboutInfoLandingPage->id)->delete();
		
        return response()->json(['success'=>'Data Deleted Successfully!']);
    }
}
