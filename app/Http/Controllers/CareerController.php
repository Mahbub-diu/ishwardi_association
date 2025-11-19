<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use Illuminate\Http\Request;
use Auth;

class CareerController extends Controller
{
    
	function __construct()
    {
         $this->middleware('permission:career-list|career-create|career-edit|career-delete', ['only' => ['index','store']]);
         $this->middleware('permission:career-list', ['only' => ['index']]);
         $this->middleware('permission:career-create', ['only' => ['create','store']]);
         $this->middleware('permission:career-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:career-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Career::orderBy('id','DESC')->paginate(10);
		
		
		if ( !empty($request->job_title) ){
			
			$data = Career::where('job_title', $request->job_title)->orderBy('id','DESC')->paginate(10);
		
		}else{
			
			$data = Career::orderBy('id','DESC')->paginate(10);
			
		}
        if($request->ajax()){
			
			return view('backend.careers.index-pagination',['data'=>$data]); 
       
        }
			
		
        return view('backend.careers.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'job_title' => 'required',
            'circular_file' => 'required|mimes:pdf|max:2048',
            'short_details' => 'required',
			]);
    
        $input = $request->all();
		
		if ( !empty($input['circular_file']) ) {
            
            $imagePath = $input['circular_file'];
			
            $imageName = 'career_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['circular_file']->storeAs('careers', $imageName, 'public');
         
            $input['circular_file'] = $imageName;
      
         
        }
        Career::create($input);
		
        return redirect()->route('careers.index')
                        ->with('success','Data added successfully');
						
	}

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        return view('backend.careers.edit',compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Career $career, Request $request)
    {
        $input = $request->all();
        
        $this->validate($request, [
            'job_title' => 'required',
            'circular_file' => 'mimes:pdf|max:2048',
            'short_details' => 'required',
			]);

       
        $input = $request->all();
        $input['modified_user_id'] = !empty(Auth::user()->id) ? Auth::user()->id : 0;
        $input['updated_at'] = date("Y-m-d h:i:sa");;

		if ( !empty($input['circular_file']) ) {
            
            $imagePath = $input['circular_file'];
			
            $imageName = 'career_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['circular_file']->storeAs('careers', $imageName, 'public');
         
            $input['circular_file'] = $imageName;
      
        
      
			if( !empty($career->circular_file) ){


                if( file_exists('storage/app/public/careers/'.$career->circular_file) ){
                
                    unlink('storage/app/public/careers/'.$career->circular_file);
                
                }
           }
        }
		
       

        $data = Career::find( $career->id );
        
        if( $data->update($input) ) {
            $responseStatus = 'success';
            $responseMessage = 'Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
    
  
		return redirect('/careers?page='.$input['page'])
                        ->with($responseStatus, $responseMessage);
						

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
     {
		//dd($career->circular_file);
		
		if( !empty($career->circular_file) ){
                
			unlink('storage/app/public/careers/'.$career->circular_file);
		
		}
		
        Career::find($career->id)->delete();
		
		
        return response()->json(['success'=>'Data Deleted Successfully!']);
    }
	
	
}
