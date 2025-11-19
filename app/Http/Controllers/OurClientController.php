<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurClient;
use App\Http\Requests\StoreOurClientRequest;
use App\Http\Requests\UpdateOurClientRequest;
use Auth;
use Redirect;

class OurClientController extends Controller
{
    
	
	function __construct()
    {
         $this->middleware('permission:clients-list|clients-create|clients-edit|clients-delete', ['only' => ['index','store']]);
         $this->middleware('permission:clients-list', ['only' => ['index']]);
         $this->middleware('permission:clients-create', ['only' => ['create','store']]);
         $this->middleware('permission:clients-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:clients-delete', ['only' => ['destroy']]);
    }
	
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = OurClient::orderBy('id','DESC')->paginate(10);
		
		
		if ( !empty($request->name) ){
			
			$data = OurClient::where('client_name', $request->name)->orderBy('id','DESC')->paginate(10);
		
		}else{
			
			$data = OurClient::orderBy('id','DESC')->paginate(10);
			
		}
        if($request->ajax()){
			
			return view('backend.our-clients.index-pagination',['data'=>$data]); 
       
        }
			
		
        return view('backend.our-clients.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.our-clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'required',
            'web_url' => 'required',
            'client_logo' => 'required|mimes:jpeg,png,jpg,webp|dimensions:width=254,height=250|max:1024',
			]);
    
        $input = $request->all();
		
		if ( !empty($input['client_logo']) ) {
            
            $imagePath = $input['client_logo'];
			
            $imageName = 'clientLogo_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['client_logo']->storeAs('client_logo', $imageName, 'public');
         
            $input['client_logo'] = $imageName;
      
         
        }
        OurClient::create($input);
		
        return redirect()->route('our-clients.index')
                        ->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurClient $ourClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (OurClient $ourClient)
    {
       // dd(app('request')->input('page'));
        return view('backend.our-clients.edit',compact('ourClient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurClient $ourClient, Request $request)
    {
        $input = $request->all();
        
        $this->validate($request, [
            'client_name' => 'required',
			'client_logo' => 'mimes:jpeg,png,jpg,webp|dimensions:width=254,height=250|max:1024',
			
		]);

       
        $input = $request->all();
        $input['modified_user_id'] = !empty(Auth::user()->id) ? Auth::user()->id : 0;
        $input['updated_at'] = date("Y-m-d h:i:sa");
        

		if ( !empty($input['client_logo']) ) {
            
            $imagePath = $input['client_logo'];
			
            $imageName = 'clientLogo_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['client_logo']->storeAs('client_logo', $imageName, 'public');
         
            $input['client_logo'] = $imageName;
      
			if( !empty($ourClient->client_logo) ){


                if( file_exists('storage/app/public/client_logo/'.$ourClient->client_logo) ){
                
                    unlink('storage/app/public/client_logo/'.$ourClient->client_logo);
                
                }
           }
        }
		
       

        $data = OurClient::find( $ourClient->id );
        
        if( $data->update($input) ) {
            $responseStatus = 'success';
            $responseMessage = 'Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        return redirect('/our-clients?page='.$input['index_page_no'])
                        ->with($responseStatus, $responseMessage);
						
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurClient $ourClient)
    {
		if( file_exists('storage/app/public/client_logo/'.$ourClient->client_logo) ){
                
			unlink('storage/app/public/client_logo/'.$ourClient->client_logo);
		
		}
		
        OurClient::find($ourClient->id)->delete();

        return response()->json(['success'=>'Data Deleted Successfully!']);
    }
}
