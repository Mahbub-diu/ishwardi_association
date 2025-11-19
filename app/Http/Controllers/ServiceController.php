<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
	function __construct()
    {
         $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index','store']]);
         $this->middleware('permission:service-create', ['only' => ['create','store']]);
         $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }
	
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
		$data = Service::orderBy('order','ASC')->paginate(10);
		
		if($request->ajax()){
			
			return view('backend.services.index-pagination',['data'=>$data]); 
       
        }
		
        return view('backend.services.index',compact('data'))
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
    public function store(StoreServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
		$shortDescription = json_decode($service->short_description);
		$des[1] = !empty($shortDescription[0]) ? $shortDescription[0] : '';
		$des[2] = !empty($shortDescription[1]) ? $shortDescription[1] : '';
		$des[3] = !empty($shortDescription[2]) ? $shortDescription[2] : '';
		
		return view('backend.services.edit',compact('service', 'des', 'des'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $input = $request->all();
        
		$totalOrderLimitLength = Service::count(); // this code required for identify what will be the maximum order value 
		
        $this->validate($request, [
				'order' => 'required|numeric|lt:'.$totalOrderLimitLength+1,
				'short_description' => 'required|array',
				'icon' => 'mimes:jpeg,png,jpg,gif,webp|dimensions:width=600,height=180|max:1024',
				'logo' => 'mimes:jpeg,png,jpg,gif,webp|dimensions:width=600,height=180|max:1024'
			]);

       
        $input = $request->all();
        $input['updated_at'] = date("Y-m-d h:i:sa");
		
		$input['short_description'] = json_encode($input['short_description']);
		
		if ( !empty($input['icon']) ) {
          
            $imagePath = $input['icon'];
			
            $imageName = 'service_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['icon']->storeAs('services', $imageName, 'public');
         
            $input['icon'] = $imageName;
			
			if( !empty($service->icon) ){


                if( file_exists('storage/app/public/services/'.$service->icon) ){
                
                    unlink('storage/app/public/services/'.$service->icon);
                
                }
           }
      
        }
		
		if ( !empty($input['logo']) ) {
             //dd('444');
            $imagePath = $input['logo'];
			
            $imageName = 'service_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['logo']->storeAs('services', $imageName, 'public');
         
            $input['icon'] = $imageName;
			
			if( !empty($service->icon) ){


                if( file_exists('storage/app/public/services/'.$service->icon) ){
                
                    unlink('storage/app/public/services/'.$service->icon);
                
                }
           }
      
        }
		
		
		
       //dd($input);

        $data = Service::find( $service->id );
        
        if( $data->update($input) ) {
			
			// start update other row ordering
			$updateOrder = Service::select('id', 'order')
			->where('order', '>=', $input['order'])
			->where( 'id', '!=', $service->id )->get();
			
			$updateValue = ($input['order']+1);
			foreach($updateOrder as $v)
			{
				//dd($updateValue);
				
				$orderInpur['order'] = $updateValue++;
				//dd($orderInpur);
				$orderUpdate = Service::find( $v->id );
				$orderUpdate->update($orderInpur);
				
			}
			
			// end update other row ordering
			
            $responseStatus = 'success';
            $responseMessage = 'Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
    
        return redirect()->route('services.index')
                        ->with($responseStatus, $responseMessage);
			
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
