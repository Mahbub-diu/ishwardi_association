<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use Auth;

class ContactUsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:contact-us-list|contact-us-create|contact-us-edit|contact-us-delete', ['only' => ['index','store']]);
         $this->middleware('permission:contact-us-list', ['only' => ['index']]);
         $this->middleware('permission:contact-us-create', ['only' => ['create','store']]);
         $this->middleware('permission:contact-us-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:contact-us-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = ContactUs::orderBy('id','DESC')->first();
		
		return view('backend.contact-us.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('backend.contact-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
     {
        $this->validate($request, [
				'office_hour' => 'required',
				'mobile_no' => 'required',
				'email' => 'required|email',
				'address' => 'required',
			]);
    
        $input = $request->all();
		
		
        ContactUs::create($input);
		
        return redirect()->route('contact-us.index')
                        ->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs, $id)
    {
		$contactUs = ContactUs::find($id);
		return view('backend.contact-us.edit',compact('contactUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
				'office_hour' => 'required',
				'mobile_no' => 'required',
				'email' => 'required|email',
				'address' => 'required',
			]);
    
        $input = $request->all();
		$input['modified_user_id'] = !empty(Auth::user()->id) ? Auth::user()->id : 0;
        $input['updated_at'] = date("Y-m-d h:i:sa");;

		$data = ContactUs::find( $id );
        
        if( $data->update($input) ) {
            $responseStatus = 'success';
            $responseMessage = 'Data Updated successfully.';

        }else{
            $responseStatus = 'error';
            $responseMessage = 'Something went wrong, please try again.';
       
        }

        //$add = CompanyBrand::create(['name' => $request->input('name')]);
    
        return redirect()->route('contact-us.index')
                        ->with($responseStatus, $responseMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ContactUs::find($id)->delete();

        return response()->json(['success'=>'Data Deleted Successfully!']);
    }
}
