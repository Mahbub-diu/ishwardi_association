<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;

class GalleryController extends Controller
{
    
	function __construct()
    {
         $this->middleware('permission:gallery-list|gallery-create|gallery-edit|gallery-delete', ['only' => ['index','store']]);
         $this->middleware('permission:gallery-list', ['only' => ['index']]);
         $this->middleware('permission:gallery-create', ['only' => ['create','store']]);
         $this->middleware('permission:gallery-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:gallery-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $galleryCategory = Service::getList();
		
		$data = Gallery::orderBy('id','DESC')->paginate(10);
		
        return view('backend.galleries.index',compact('data', 'galleryCategory'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$galleryCategory = Service::getList();
		
        return view( 'backend.galleries.create', compact('galleryCategory') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gallery_category_id' => 'required',
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif'
			]);
    
        $input = $request->all();
		
		if ( !empty($input['image']) ) {
            
            $imagePath = $input['image'];
			
            $imageName = 'gallery_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['image']->storeAs('galleries', $imageName, 'public');
         
            $input['image'] = $imageName;
      
         
        }
        Gallery::create($input);
		
        return redirect()->route('galleries.index')
                        ->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
		$galleryCategory = Service::getList();
        
		return view('backend.galleries.edit',compact('gallery', 'galleryCategory'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $input = $request->all();
        
        $this->validate($request, [
				'gallery_category_id' => 'required',
				'title' => 'required',
				'image' => 'mimes:jpeg,png,jpg,gif'
			]);

       
        $input = $request->all();
        $input['updated_at'] = date("Y-m-d h:i:sa");;

		if ( !empty($input['image']) ) {
            
            $imagePath = $input['image'];
			
            $imageName = 'gallery_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['image']->storeAs('galleries', $imageName, 'public');
         
            $input['image'] = $imageName;
      
			if( !empty($gallery->image) ){


                if( file_exists('storage/app/public/galleries/'.$gallery->image) ){
                
                    unlink('storage/app/public/galleries/'.$gallery->image);
                
                }
           }
        }
		
       

        $data = Gallery::find( $gallery->id );
        
        if( $data->update($input) ) {
            $responseStatus = 'success';
            $responseMessage = 'Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
    
        return redirect()->route('backend.galleries.index')
                        ->with($responseStatus, $responseMessage);
						

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
      {
		if( file_exists('storage/app/public/galleries/'.$gallery->image) ){
                
			unlink('storage/app/public/galleries/'.$gallery->image);
		
		}
		
        Gallery::find($gallery->id)->delete();

        return response()->json(['success'=>'Data Deleted Successfully!']);
    }
	
}
