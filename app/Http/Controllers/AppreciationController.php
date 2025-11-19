<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appreciation;
use App\Http\Requests\StoreAppreciationRequest;
use App\Http\Requests\UpdateAppreciationRequest;

class AppreciationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:appreciation-list|appreciation-create|appreciation-edit|appreciation-delete', ['only' => ['index','store']]);
         $this->middleware('permission:appreciation-list', ['only' => ['index']]);
         $this->middleware('permission:appreciation-create', ['only' => ['create','store']]);
         $this->middleware('permission:appreciation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:appreciation-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Appreciation::orderBy('id','DESC')->paginate(10);
		
        return view('backend.appreciations.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.appreciations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'company_name' => 'required',
            'designation' => 'required',
            'details' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,webp|dimensions:width=400,height=400|max:1024',
            
			]);
    
        $input = $request->all();
		
		if ( !empty($input['photo']) ) {
            
            $imagePath = $input['photo'];
			
            $imageName = 'appreciations_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['photo']->storeAs('appreciations', $imageName, 'public');
         
            $input['photo'] = $imageName;
      
         
        }
        Appreciation::create($input);
		
        return redirect()->route('appreciations.index')
                        ->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appreciation $appreciation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appreciation $appreciation)
    {
         return view('backend.appreciations.edit',compact('appreciation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Appreciation $appreciation, Request $request)
    {
        $input = $request->all();
        
        $this->validate($request, [
				'name' => 'required',
				'company_name' => 'required',
				'designation' => 'required',
				'details' => 'required',
				'photo' => 'mimes:jpeg,png,jpg,gif,webp|dimensions:width=400,height=400|max:1024',
            
			]);

       
        $input = $request->all();
        $input['updated_at'] = date("Y-m-d h:i:sa");;

		if ( !empty($input['photo']) ) {
            
            $imagePath = $input['photo'];
			
            $imageName = 'appreciations_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['photo']->storeAs('appreciations', $imageName, 'public');
         
            $input['photo'] = $imageName;
      
			if( !empty($appreciation->photo) ){


                if( file_exists('storage/app/public/appreciations/'.$appreciation->photo) ){
                
                    unlink('storage/app/public/appreciations/'.$appreciation->photo);
                
                }
           }
        }
		
       

        $data = Appreciation::find( $appreciation->id );
        
        if( $data->update($input) ) {
            $responseStatus = 'success';
            $responseMessage = 'Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
    
        return redirect()->route('appreciations.index')
                        ->with($responseStatus, $responseMessage);
						

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appreciation $appreciation)
    {
		if( file_exists('storage/app/public/appreciations/'.$appreciation->photo) ){
                
			unlink('storage/app/public/appreciations/'.$appreciation->photo);
		
		}
		
        Appreciation::find($appreciation->id)->delete();

        return response()->json(['success'=>'Data Deleted Successfully!']);
    }
	
}
