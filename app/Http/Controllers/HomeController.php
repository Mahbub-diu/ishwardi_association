<?php

namespace App\Http\Controllers;

use App\Models\OngoingActivity;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		
		
		$userSeeData = $this->showUserSesData();
		
		$useClientList = OngoingActivity::select('client_id')
		->groupBy('client_id')
		->where('status', 6)
		->get();
		
		$totalourClient = sizeof($useClientList);
		
		$totalOngoingActivities = OngoingActivity::where('completed_status',0)->where('status',6)->count();
		$totalCompletedProject = OngoingActivity::where('completed_status',1)->where('status',6)->count();
		
		
        return view('home', compact('totalOngoingActivities', 'totalCompletedProject', 'totalourClient', 'userSeeData'));
    }
}
