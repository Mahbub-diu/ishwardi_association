<?php

namespace App\Http\Controllers;

use App\Models\CoreTeam;
use App\Http\Requests\StoreCoreTeamRequest;
use App\Http\Requests\UpdateCoreTeamRequest;
use Illuminate\Http\Request;
use Auth;

Use Image;

class CoreTeamController extends Controller
{
    
	function __construct()
    {
         $this->middleware('permission:acore-team-list|core-team-create|core-team-edit|core-team-delete', ['only' => ['index','store']]);
         $this->middleware('permission:core-team-create', ['only' => ['create','store']]);
         $this->middleware('permission:core-team-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:core-team-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = CoreTeam::orderBy('member_type','ASC')
		->orderBy('order','ASC')
		->paginate(10);
		
		$memberType = ['1' => 'Top Managements', '2' => 'Advisors Panel', '3' => 'Core Team Members'];
        
		if ( !empty($request->name) ){
			
			$data = CoreTeam::where('name', $request->name)
			->orderBy('order','ASC')
			->orderBy('member_type','ASC')->paginate(10);
		
		}else{
			
			$data = CoreTeam::orderBy('member_type','ASC')
			->orderBy('order','ASC')
			->paginate(10);
			
		}
        if($request->ajax()){
			
			return view('backend.core-teams.index-pagination',['data'=>$data, 'memberType' => $memberType]); 
       
        }
			
		
        return view('backend.core-teams.index',compact('data', 'memberType'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$memberType = ['1' => 'Top Managements', '2' => 'Advisors Panel', '3' => 'Core Team Members'];
        //dd($memberType);
		return view('backend.core-teams.create', compact('memberType') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		 $input = $request->all();
		 
		 $totalLength = CoreTeam::where('member_type', $input['member_type'])
		 ->count();
		
        $this->validate($request, [
            
				'name' => 'required',
				'designation' => 'required',
				'order' => 'required|numeric|lt:'.$totalLength+2,
				'photo' => 'required|mimes:jpeg,png,jpg,gif,webp|dimensions:width=400,height=400|max:1024',
				'member_type' => 'required',
			
			]);
    
       
		
		
		
		if ( !empty($input['photo']) ) {
            
            $imagePath = $input['photo'];
			
            $imageName = 'clientLogo_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['photo']->storeAs('core-teams', $imageName, 'public');
			
            $input['photo'] = $imageName;
      
         
        }
        $coreTeam = CoreTeam::create($input);
		
		$updateOrder = CoreTeam::select('id', 'order', 'member_type')
			->where('order', '>=', $input['order'])
			->where( 'id', '!=', $coreTeam->id )
			->where('member_type', $input['member_type'])
			->orderBy('order', 'asc')
			->get();
			
			//$totalLength = sizeof($updateOrder);
			
			//dd($updateOrder->toArray());
			$updateValue = ($input['order']+1);
			foreach($updateOrder as $v)
			{
				//dd($updateValue);
				
				$orderInpur['order'] = $updateValue++;
				//dd($orderInpur);
				$orderUpdate = CoreTeam::find( $v->id );
				$orderUpdate->update($orderInpur);
				
			}
			
        return redirect()->route('core-teams.index')
                        ->with('success','Data added successfully');
						
	}

    /**
     * Display the specified resource.
     */
    public function show(CoreTeam $coreTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CoreTeam $coreTeam)
    {
		$memberType = ['1' => 'Top Managements', '2' => 'Advisors Panel', '3' => 'Core Team Members'];
        
        return view('backend.core-teams.edit',compact('coreTeam', 'memberType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoreTeam $coreTeam, Request $request)
    {
        $input = $request->all();
        
		$totalLength = CoreTeam::where('member_type', $input['member_type'])
		->count(); // this code required for identify what will be the maximum order value 
		//dd($totalLength);
		
		
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'order' => 'required|numeric|lt:'.$totalLength+1,
            'photo' => 'mimes:jpeg,png,jpg,gif,webp|dimensions:width=400,height=400|max:1024',
			'member_type' => 'required',
			]);

       
        $input = $request->all();
        $input['modified_user_id'] = !empty(Auth::user()->id) ? Auth::user()->id : 0;
        $input['updated_at'] = date("Y-m-d h:i:sa");;

		if ( !empty($input['photo']) ) {
            
            $imagePath = $input['photo'];
			
            $imageName = 'clientLogo_'.date('Ymdhis_').$imagePath->getClientOriginalName();
           
            $path = $input['photo']->storeAs('core-teams', $imageName, 'public');
         
            $input['photo'] = $imageName;
      
			if( !empty($coreTeam->photo) ){


                if( file_exists('storage/app/public/core-teams/'.$coreTeam->photo) ){
                
                    unlink('storage/app/public/core-teams/'.$coreTeam->photo);
                
                }
           }
        }
		
       
		
        $data = CoreTeam::find( $coreTeam->id );
        
        if( $data->update($input) ) {
			
			// start update other row ordering
			$updateOrder = CoreTeam::select('id', 'order', 'member_type')
			->where('order', '>=', $input['order'])
			->where('id', '!=', $coreTeam->id )
			->where('member_type', $input['member_type'])
			->orderBy('order', 'asc')->get();
			//dd($updateOrder->toArray());
			
			$updateValue = ($input['order']+1);
			foreach($updateOrder as $v)
			{
				//dd($updateValue);
				
				$orderInpur['order'] = $updateValue++;
				//dd($orderInpur);
				$orderUpdate = CoreTeam::find( $v->id );
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
    
        return redirect('/core-teams?page='.$input['page'])
                        ->with($responseStatus, $responseMessage);
						 
						

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoreTeam $coreTeam)
    {
		//dd($coreTeam->id);
		if( file_exists('storage/app/public/core-teams/'.$coreTeam->photo) ){
                
			unlink('storage/app/public/core-teams/'.$coreTeam->photo);
		
		}
		
       
	// start update other row ordering
		$updateOrder = CoreTeam::select('id', 'order', 'member_type')
		->where('order', '>', $coreTeam->order)
		->where('id', '!=', $coreTeam->id )
		->where('member_type', $coreTeam->member_type)
		->orderBy('order', 'asc')->get();
		//dd($updateOrder->toArray());
		
		
		foreach($updateOrder as $v)
		{
			//dd($updateValue);
			$updateValue = ($v->order-1);
			
			$orderInpur['order'] = $updateValue;
			//dd($orderInpur);
			$orderUpdate = CoreTeam::find( $v->id );
			$orderUpdate->update($orderInpur);
			
		}
		
		CoreTeam::find($coreTeam->id)->delete();
		
        return response()->json(['success'=>'Data Deleted Successfully!']);
    }
}
