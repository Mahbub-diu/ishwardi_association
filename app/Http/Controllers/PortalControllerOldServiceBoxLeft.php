<?php

    

namespace App\Http\Controllers;

    

use App\Models\OngoingActivity;
use App\Models\OurClient;
use App\Models\Service;
use App\Models\AboutInfoLandingPage;
use App\Models\OngoingActivityServiceCoverArea;
use App\Models\ServiceCoverArea;
use App\Models\SingleUpdate;
use App\Models\Appreciation;
use App\Models\AboutInfo;
use App\Models\CoreTeam;
use App\Models\Career;
use App\Models\ContactUs;
use App\Models\PublicQuery;
use App\Mail\DemoMail;

use Illuminate\Http\Request;

use Session;  
use DB;  
use Mail;

class PortalController extends Controller

{ 

 

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index( Request $request)

    {
		
	    $commonData = $this->commonData() ;
		//dd($commonData);
		
		
		$servicePageName = $this->portalServiceWiseIdentify();
		$serviceID = key($servicePageName);
		$serviceName = $servicePageName[$serviceID];
		
		//dd($serviceID);
		$aboutLandingData = $this->findAboutLanding($serviceID);
		
		$aboutLandingDataBulletPoint =  json_decode( !empty($aboutLandingData[0]['bullet_points']) ) ? $aboutLandingData[0]['bullet_points'] : '' ;
		
		if( $serviceID == 5){
			
			$totalOngoingActivities = OngoingActivity::where('completed_status',0)->where('status',6)->count();
			$totalCompletedProject = OngoingActivity::where('completed_status',1)->where('status',6)->count();
		
		}else{
		
			$serviceID = (string)$serviceID; 
		
			$totalOngoingActivities = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('completed_status',0)->where('status',6)->count();
			$totalCompletedProject = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('completed_status',1)->where('status',6)->count();
		
		}
		
		
		$totalCompletedProjectServ[1] = OngoingActivity::completedServiceValue( 1 );
		$totalCompletedProjectServ[2] = OngoingActivity::completedServiceValue( 2 );
		$totalCompletedProjectServ[3] = OngoingActivity::completedServiceValue( 3 );
		$totalCompletedProjectServ[4] = OngoingActivity::completedServiceValue( 4 );
		//dd($totalCompletedProjectServ);
		
		$useClientList = OngoingActivity::select('client_id')
		->groupBy('client_id')
		->where('status', 6)
		->get();
		
		$totalourClient = sizeof($useClientList);
		
		$reArrangeUsedClientList = [];
		
		foreach($useClientList as $clientId)
		{
			$reArrangeUsedClientList[]	 = $clientId['client_id'];
			
		}
		//dd( $reArrangeUsedClientList );
		
		
		$totalourParticipates = OngoingActivity::where('completed_status', 1)->where('status',6)
		->sum('total_participate');
		//dd($totalourParticipates);
		//dd($totalOngoingActivities);
		//dd($ongoingActivities->toArray());
		
		$clients = OurClient::whereIn('id', $reArrangeUsedClientList)->orderBy('id', 'DESC')->get();        
		$services = Service::where('route', '!=', '/')->get()->toArray();        
		//dd($services);
		
		$bannerContent = [];
		if( $servicePageName == 'cap-buil-kase-dev' )
		{
			
			$bannerContent['title'] = 'Capacity Building & k.a.s.e Development Program';
		}
		else if( $servicePageName == 'foreign-training-study-tour' )
		{
			
			$bannerContent['title'] = 'Foreign Training & Study Tour';
		}
		else if( $servicePageName == 'research' )
		{
			
			$bannerContent['title'] = 'Research';
		}
		else if( $servicePageName == 'local-international-consultancy' )
		{
			
			$bannerContent['title'] = 'Local & International Consultancy';
		}
		else{
			$bannerContent['title'] = 'Institute of Professional Training & Management (IPTM)';
		}
		
		$sCAFTBconditions = [];
		$selectOngoingActivityServiceCoverAreas = ['id', 'service_cover_area_id'];
		
		$serviceCoverAreaForTopBannerLeft = [];
		/*$serviceCoverAreaForTopBannerLeft = ServiceCoverArea::select('id',  'area_name', 'area_icon' )
			->with (['ongoingActivityServiceCoverAreas' => function($mm) 
			use ($selectOngoingActivityServiceCoverAreas){
					return $mm->select($selectOngoingActivityServiceCoverAreas);
			}])->get()->toArray();*/
			
		//dd($serviceCoverAreaForTopBannerLeft);
		
		
		$serviceCoverAreaList = ServiceCoverArea::keyWiseAllDataList(); // for common work
		//dd($serviceCoverAreaList);
		
		/*$serviceCoverArea = ServiceCoverArea::where('service_id', $serviceID)->orderBy('sort_order')->get()->toArray();
		$totalServiceCoverArea = ServiceCoverArea::where('service_id', $serviceID)->count();*/
		
		$serviceID = (string)$serviceID; 
		
		// start find published activity id
		$activityPublishIds = OngoingActivity::select('id', 'service_ids')->whereJsonContains('service_ids',$serviceID)->where('status', 6)->get()->toArray();
		$activityPublishIds = array_column($activityPublishIds, 'id');
		// end find published activity id
		
		//$serviceCoverArea = OngoingActivityServiceCoverArea::select('service_id','service_cover_area_id')->where('ongoing_activity_id', $activityPublishIds)->where('service_id',$serviceID)->groupBy('service_id')->groupBy('service_cover_area_id')->get()->toArray();
		
		
		$ongoingActivityCoverArea = OngoingActivity::select('service_ids', 'service_cover_area_ids')
		->whereJsonContains('service_ids', $serviceID)
		->where('status', 6)
		->get()->toArray();
		
		//dd($ongoingActivityCoverArea);
		
		$removeDuplication = [];
		
		foreach($ongoingActivityCoverArea as $sCA)
		{
			$value = json_decode($sCA['service_cover_area_ids']);
			
			foreach($value as $key=> $v)
			{
				//dd($v);
				$removeDuplication[$v] = $v;
			
			}
			
		}
		//dd(array_values($removeDuplication));
		
		$serviceCoverArea = ServiceCoverArea::select('id','service_id', 'area_name')
			->whereIn('id', array_values($removeDuplication))->where('service_id', $serviceID)->get()->toArray();
		//dd($serviceCoverArea);
		
		$totalServiceCoverArea = sizeof($serviceCoverArea);
		
		
		//$totalServiceCoverArea = 5;
		//dd($serviceCoverArea[0]);
		
		//$landingAboutInfo = $this->findBannerImage($serviceIdOnly);
		
		//dd($landingAboutInfo):
		
		$serviceIDForPracticeLeftContent = 1;
		$serviceAreaIdForPracticeLeftConten = 0;
		if( !empty($serviceCoverArea[0]) ){
			$serviceIDForPracticeLeftContent = $serviceCoverArea[0]['service_id'];
			$serviceAreaIdForPracticeLeftConten = $serviceCoverArea[0]['id'];
		}
		//dd($serviceIDForPracticeLeftContent);
		
		
		
		$singleUpdate = SingleUpdate::where('feature_showing',1)->get();
		//dd($singleUpdate);
		$totalSingle = SingleUpdate::where('feature_showing',1)->count();
		//dd($totalSingle);
		
		$appreciations = Appreciation::orderBy('id', 'DESC')->get();
		$totalAppreciations = Appreciation::orderBy('id', 'DESC')->count();
		
		return view('front-end/welcome', compact('commonData', 'totalAppreciations', 'totalSingle', 'totalCompletedProjectServ', 'singleUpdate', 'appreciations', 'serviceCoverAreaList', 'serviceCoverAreaForTopBannerLeft', 'serviceIDForPracticeLeftContent', 'serviceAreaIdForPracticeLeftConten', 'serviceCoverArea', 'totalServiceCoverArea', 'services', 'aboutLandingDataBulletPoint', 'totalourParticipates', 'totalCompletedProject', 'aboutLandingData', 'serviceName', 'clients', 'totalOngoingActivities', 'totalourClient', 'bannerContent' ));

    }
	
	
	public function ajaxPracticeAreaTab(Request $request, $serviceId, $serviceAreaId)
	{
		//dd($serviceId);
		
		$practiceAreaTitle = [];
		$practiceAreaDescription = [];
		$conditionsOngoingActSerCoAr['service_ids'] = $serviceId;
		
		if( empty($serviceAreaId) )
		{
			$service = Service::where('id', $serviceId)->first();
			$practiceAreaTitle = $service['name'];
			$practiceAreaDescription = $service['short_description'];
			
			$ongoingActSeCorAr = OngoingActivity::whereJsonContains('service_ids', $serviceId)
			->where('status', 6)->paginate(16);
			
		}else{
			
			$serviceCoverArea = ServiceCoverArea::where('id', $serviceAreaId)->first();
			$practiceAreaTitle = $serviceCoverArea['area_name'];
			$practiceAreaDescription = $serviceCoverArea['short_description'];
			//$conditionsOngoingActSerCoAr['service_cover_area_ids'] = $serviceAreaId;
			
			$ongoingActSeCorAr = OngoingActivity::whereJsonContains('service_cover_area_ids', $serviceAreaId)
			->where('status', 6)->paginate(16);
		}
		
		//dd($practiceAreaTitle) ;
		$selectongoingActivity = ['id', 'service_id', 'title'];
		
		
		/*$ongoingActSeCorAr = OngoingActivityServiceCoverArea::select('ongoing_activity_id')
			->where($conditionsOngoingActSerCoAr)
			->groupBy('ongoing_activity_id')
			->with (['ongoingActivity' => function($mm) 
			use ($selectongoingActivity){
					return $mm->select($selectongoingActivity)
					->where('status', 6);
			}])->paginate(16);*/
			
		//whereJsonContains('images', 'ongoing-activity_120231003053541_yy.jpg')
		
		
		//	dd('ii');
		//dd($ongoingActSeCorAr);
		
		/*$ongoingActSeCorArTotal = OngoingActivityServiceCoverArea::select('ongoing_activity_id')
		->where('service_id', $serviceId)
		->groupBy('ongoing_activity_id')->count();*/
		
		$ongoingActSeCorArTotal = OngoingActivity::whereJsonContains('service_ids', $serviceId)
		->where('status', 6)->count();
		
		//dd($ongoingActSeCorArTotal);
		
		$data = [];
		
		if ( $request->ajax() )
		{
			$data['service_cover_name'] = $practiceAreaTitle;
			
			$data['service_cover_description'] = $practiceAreaDescription;
			
			$data['total_count'] = $ongoingActSeCorArTotal;
			
			foreach( $ongoingActSeCorAr as $d )
			{
				if( !empty($d->title) )
				{
					//dd($d->ongoing_activity->title);
					$data['info'][] = '<li><a href="ongoing-com-news-details/'.$d->id.'">'.$d->title.'</a></li>';
				}
			}
			return $data;
		}
		//dd($data);
		
	}
	
	
	public function ongoingActivity(Request $request)
	{
		$servicePageName = session()->get('current_service');
		$serviceID = key($servicePageName);
		$serviceName = $servicePageName[$serviceID];
		
		if( $serviceID == 5){
			
			$services = OngoingActivity::where('status', 6)->where('completed_status', 0)->orderBy('id', 'DESC')->paginate(4);        
			$totalOngoingActivity = OngoingActivity::where('status', 6)->where('completed_status', 0)->count(); 
		
		}else{
			$serviceID = (string)$serviceID; 
			$services = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('status', 6)->where('completed_status', 0)->orderBy('id', 'DESC')->paginate(4);        
			$totalOngoingActivity = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('completed_status', 0)->count(); 
		}
		
		
		$data = [];
		
		if ($request->ajax()) {
			$data['total_count'] = $totalOngoingActivity;
			foreach ($services as $onAc) {
				
				$text180 = '';
				
				if( strlen($onAc->activity_short_details ) > 180 ){
					
					$text180 = substr($onAc->activity_short_details, 0, 180).'<a href="ongoing-com-news-details/'.$onAc->id.'"> Read Details...</a>';
					
				}else{
					$text180 = $onAc->activity_short_details.'<a href="ongoing-com-news-details/'.$onAc->id.'"> Read Details...</a>';
				}
				
				if( !empty($onAc->feature_image) )
				{
					$data['info'][]='
					<div class="single-slide">
						<div class="row align-items-center"  >
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								
								<div class="content">
								<a href="javascript:void(0);" onclick="ongoing_single('.$onAc->id.')">
								  <div class="content-overlay"></div>
								 
								  <img class="content-image"  src="storage/app/public/ongoing-activities/'.$onAc->feature_image.'" alt="">
								  <div class="content-details fadeIn-bottom">
									<h3 class="content-title">'.$onAc->title.'</h3>
									 
								  </div>
								</a>
							  </div>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
								<div class="single-short-desc-parent">
									<a class="single-short-desc" href="javascript:void(0);" onclick="ongoing_single('.$onAc->id.')" >'.$text180.'</a>
								</div>
							</div>
						</div>
					</div>';
					
				}else{
					
					$data['info'][]='
					<div class="single-slide">
						<div class="row align-items-center"  >
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								
								<div class="content">
									<a href="javascript:void(0);" onclick="ongoing_single('.$onAc->id.')">
									  
									 
										<h4 class="content-title" style="font-size:14px;padding:5px">'.$onAc->title.'</h4>
										 
									</a>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
								<div class="single-short-desc-parent">
									<a class="single-short-desc" href="javascript:void(0);" onclick="ongoing_single('.$onAc->id.')" >'.$text180.'</a>
								</div>
							</div>
						</div>
					</div>';
					
				
					
				
				}
			}
			return $data;
		}
	
	}
	
	public function ongoingSingle(Request $request, $id)
	{
		$servicePageName = session()->get('current_service');
		$serviceID = key($servicePageName);
		$serviceName = $servicePageName[$serviceID];
		
		//dd($serviceID);
		if( empty($id) )
		{
			if( $serviceID == 5){
				
				$singleOngoing = OngoingActivity::where('status', 6)->where('completed_status', 0)->orderBy('id', 'DESC')->first();  
			
			}else{
				$serviceID = (string)$serviceID; 
				$singleOngoing = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('status', 6)->where('completed_status', 0)->orderBy('id', 'DESC')->first();  
			}
		}else{
			
			$singleOngoing = OngoingActivity::where('id', $id)->first();  
		}
		
		$text180 = '';
				
		if( strlen($singleOngoing->activity_short_details ) > 350 ){
			
			$text180 = substr($singleOngoing->activity_short_details, 0, 350).'<a href="ongoing-com-news-details/'.$singleOngoing['id'].'" > Read Details...</a>';
			
		}else{
			
			$text180 = $singleOngoing->activity_short_details;
		}
				
		
		//dd($singleOngoing->feature_image);
		$data = '';
		
		if ($request->ajax()) {
			
			if( !empty( $singleOngoing->feature_image ) )
			{
				$data ='
				<div class="single-slider">
					<div class="blog-box style-big">
						<div class="blog-img">
						<figure class="figure">
							<img src="storage/app/public/ongoing-activities/'.$singleOngoing->feature_image.'" class="figure-img img-fluid rounded" alt="">
							<figcaption class="figure-caption">'.$singleOngoing->title.'</figcaption>
						</figure>
							 
						</div>
						<div class="blog-content">
						'.$text180.'  
						 
						</div>
					</div>
				</div>';
				
			}else{
				
				$data ='
				<div class="single-slider">
					<div class="blog-box style-big">
						<div class="blog-img">
						<figure class="figure">
							<h4 class="content-title" style="font-size:30px;padding:5px;text-align:justify">'.$singleOngoing->title.'</h4>
										
						</figure>
							 
						</div>
						<div class="blog-content">
						'.$text180.'  
						 
						</div>
					</div>
				</div>';
				
			}
				//dd($data);
			return $data;
		}

	}
	
	
	
	function ongoingCompletedNewsDetails($id)
	{
		$commonData = $this->commonData() ;
		 
		$dataDetails = OngoingActivity::where('id', $id)->first(); 
		//dd($dataDetails->images);
		
		$otherImages = json_decode($dataDetails->images);
		//dd($otherImages);
		$clientName = OurClient::where('id', $dataDetails->client_id)->first(); 
		
		$services = Service::whereIn('id', json_decode( $dataDetails->service_ids ))->pluck('name', 'id')->toArray();
		//dd($services);
		$serviceCoverArea = ServiceCoverArea::whereIn('id', json_decode( $dataDetails->service_cover_area_ids ))->pluck('area_name', 'id')->toArray();
		//dd($serviceCoverArea);
		
		return view('front-end/ongoing-completed-news-details', compact('commonData', 'services', 'serviceCoverArea', 'clientName', 'dataDetails', 'otherImages'));

	}
	
	
	
	
	function singleUpdateDetails($id)
	{
		$commonData = $this->commonData() ;
		
		$dataDetails = SingleUpdate::where('id', $id)->first(); 
		
		return view('front-end/single-update-details', compact('commonData', 'dataDetails'));

	}
	
	
	
	public function completedProject(Request $request)
	{
		$servicePageName = session()->get('current_service');
		$serviceID = key($servicePageName);
		$serviceName = $servicePageName[$serviceID];
		
		if( $serviceID == 5){
			
			$services = OngoingActivity::where('status', 6)->where('completed_status', 1)->orderBy('id', 'DESC')->paginate(4);        
			$totalOngoingActivity = OngoingActivity::where('status', 6)->where('completed_status', 1)->count(); 
		
		}else{
			
			$serviceID = (string)$serviceID; 
			$services = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('status', 6)->where('completed_status', 1)->orderBy('id', 'DESC')->paginate(4);        
			$totalOngoingActivity = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('status', 6)->where('completed_status', 1)->count(); 
		
		}
		
		
		$data = [];
		
		if ($request->ajax()) {
			$data['total_count'] = $totalOngoingActivity;
			foreach ($services as $onAc) {
				
				$text180 = '';
				
				if( strlen($onAc->activity_short_details ) > 180 ){
					
					$text180 = substr($onAc->activity_short_details, 0, 180).'<a href="ongoing-com-news-details/'.$onAc->id.'" > Read Details...</a>';
					
				}else{
					$text180 = $onAc->activity_short_details.'<a href="ongoing-com-news-details/'.$onAc->id.'"> Read Details...</a>';
				}
				
				if( !empty($onAc->feature_image) )
				{
				$data['info'][]='
				<div class="single-slide">
					<div class="row align-items-center"  >
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							
							<div class="content">
							<a href="javascript:void(0);" onclick="completed_single('.$onAc->id.')">
							  <div class="content-overlay"></div>
							 
							  <img class="content-image"  src="storage/app/public/ongoing-activities/'.$onAc->feature_image.'" alt="">
							  <div class="content-details fadeIn-bottom">
								<h4 class="content-title" style="font-size:14px">'.$onAc->title.'</h4>
								 
							  </div>
							</a>
						  </div>
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
							<div class="single-short-desc-parent">
								<a class="single-short-desc" href="javascript:void(0);" onclick="completed_single('.$onAc->id.')" >'.$text180.'</a>
							</div>
						</div>
					</div>
				</div>';
				}else{
					
					$data['info'][]='
					<div class="single-slide">
						<div class="row align-items-center"  >
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								
								<div class="content">
									<a href="javascript:void(0);" onclick="completed_single('.$onAc->id.')">
									  
									 
										<h4 class="content-title" style="font-size:14px;padding:5px">'.$onAc->title.'</h4>
										 
									</a>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
								<div class="single-short-desc-parent">
									<a class="single-short-desc" href="javascript:void(0);" onclick="completed_single('.$onAc->id.')" >'.$text180.'</a>
								</div>
							</div>
						</div>
					</div>';
				
				}
				
			}
			return $data;
		}
	
	}
	
	public function completedProjectSingle(Request $request, $id)
	{
		$servicePageName = session()->get('current_service');
		$serviceID = key($servicePageName);
		$serviceName = $servicePageName[$serviceID];
		
		$serviceID = (string)$serviceID; 
		
		if( empty($id) )
		{
			if( $serviceID == 5){
				
				$singleOngoing = OngoingActivity::where('status', 6)->where('completed_status', 1)->orderBy('id', 'DESC')->first();  
			
			}else{
				$serviceID = (string)$serviceID; 
				$singleOngoing = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('status', 6)->where('completed_status', 1)->orderBy('id', 'DESC')->first();  
			
			}
			
		}else{
			
			$singleOngoing = OngoingActivity::where('id', $id)->first();  
		}
		
		$text180 = '';
				
		if( strlen($singleOngoing->activity_short_details ) > 350 ){
			
			$text180 = substr($singleOngoing->activity_short_details, 0, 350).'<a href="ongoing-com-news-details/'.$singleOngoing['id'].'" > Read Details...</a>';
			
		}else{
			$text180 = $singleOngoing->activity_short_details;
		}
				
		
		//dd($singleOngoing->feature_image);
		$data = '';
		
		if ($request->ajax()) {
			
			if( !empty( $singleOngoing->feature_image ) )
			{
				$data ='
				<div class="single-slider">
					<div class="blog-box style-big">
						<div class="blog-img">
						<figure class="figure">
							<img src="storage/app/public/ongoing-activities/'.$singleOngoing->feature_image.'" class="figure-img img-fluid rounded" alt="">
							<figcaption class="figure-caption">'.$singleOngoing->title.'</figcaption>
						</figure>
							 
						</div>
						<div class="blog-content">
						'.$text180.'  
						 
						</div>
					</div>
				</div>';
				
			}else{
				
				$data ='
				<div class="single-slider">
					<div class="blog-box style-big">
						<div class="blog-img">
						<figure class="figure">
							<h4 class="content-title" style="font-size:30px;padding:5px;text-align:justify">'.$singleOngoing->title.'</h4>
										
						</figure>
							 
						</div>
						<div class="blog-content">
						'.$text180.'  
						 
						</div>
					</div>
				</div>';
				
			}
				
			
				//dd($data);
			return $data;
		}

	}
	
	public function ourClient(Request $request)
	{
		
		$clients = OurClient::orderBy('id', 'DESC')->get();        
		
		$data = '';
		
		if ($request->ajax()) {
			foreach ($clients as $client) {
				
				$data.='<div class="col-md-6 col-lg-4 col-xl-3">
							<div class="team-grid">
								<div class="team-info">
									<a href="#" target="_blank">
										<img src="storage/app/public/client_logo/'.$client->client_logo.'" width="245" alt="Team"></a>
								</div>
							</div>
						</div>';
			}
			
			return $data;
		}
	}
	
	
	
	
	
	public function ongoingProjectInner(Request $request)
	{
		
		$servicePageName = session()->get('current_service');
		$serviceID = key($servicePageName);
		$serviceName = $servicePageName[$serviceID];
		
		if( $serviceID == 5){
			
			$dataRetrive = OngoingActivity::where('completed_status', 0)->where('status', 6)->orderBy('id', 'DESC')->get();        
		
			$totalourData = OngoingActivity::where('completed_status', 0)->where('status', 6)->count(); 
		
		}
		else{
			$serviceID = (string)$serviceID; 
			
			$dataRetrive = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('completed_status', 0)->where('status', 6)->orderBy('id', 'DESC')->get();        
		
			$totalourData = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('completed_status', 0)->where('status', 6)->count(); 
		
		}
		
	
		$data = [];
		
		if ($request->ajax()) {
			
			$data['total_count'] = $totalourData;
			
			foreach ($dataRetrive as $d) {
				
				
				
				
				$data['info'][]='<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 ">
                    <div class="blog-card">
                        <div class="blog-img">

                            <img src="storage/app/public/ongoing-activities/'.$d->feature_image.'" alt="blog image">
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta style2"><a href="#"><i class="far fa-clock"></i>March 15, 2022</a>
                                <!--<a href="#"><i class="far fa-folder"></i>Marketing</a>-->
                            </div>
                            <h3 class="po-color blog-title"><a href="#">Designing Better Link Web Site and Emailsite
                                    Valued</a>
                            </h3>
                            <a href="ongoing-com-news-details/'.$d->id.'" class="link-btn">Read Details<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>';
				
			}
			return $data;
			
		}
		
		

	}
	
	
	
	
	public function completedProjectInner(Request $request)
	{
		
		$servicePageName = session()->get('current_service');
		$serviceID = key($servicePageName);
		$serviceName = $servicePageName[$serviceID];
		
		if( $serviceID == 5){
			$dataRetrive = OngoingActivity::where('completed_status', 1)->where('status', 6)->orderBy('id', 'DESC')->get();        
		
		
			$totalourData = OngoingActivity::where('completed_status', 1)->where('status', 6)->count(); 
		
		}else{
			$serviceID = (string)$serviceID; 
			
			$dataRetrive = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('completed_status', 1)->where('status', 6)->orderBy('id', 'DESC')->get();        
		
		
			$totalourData = OngoingActivity::whereJsonContains('service_ids', $serviceID)->where('completed_status', 1)->where('status', 6)->count(); 
		
			
		}
		
		
		$data = [];
		
		if ($request->ajax()) {
			
			$data['total_count'] = $totalourData;
			
			foreach ($dataRetrive as $d) {
				
				
				
				
				$data['info'][]='<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 ">
                    <div class="blog-card">
                        <div class="blog-img">

                            <img src="storage/app/public/ongoing-activities/'.$d->feature_image.'" alt="blog image">
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta style2"><a href="#"><i class="far fa-clock"></i>March 15, 2022</a>
                                <!--<a href="#"><i class="far fa-folder"></i>Marketing</a>-->
                            </div>
                            <h3 class="po-color blog-title"><a href="#">Designing Better Link Web Site and Emailsite
                                    Valued</a>
                            </h3>
                            <a href="ongoing-com-news-details/'.$d->id.'" class="link-btn">Read Details<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>';
				
			}
			return $data;
			
		}
		
		

	}
	
	
	
	public function newsInnerList(Request $request)
	{
		$commonData = $this->commonData() ;
		
		$servicePageName = $this->portalServiceWiseIdentify();
		$serviceID = key($servicePageName);
		//dd($serviceID);
		
		$servieIds = [];
		if( $serviceID == 5 ){
			$servieIds = [1,2,3,4];
			
		}else{
			$servieIds = [$serviceID];
			
		}
		
		$data = SingleUpdate::where('status', 6)->WhereIn('service_id', $servieIds)->latest()->paginate(4);
		
		if($request->ajax()){
			
			return view('front-end.news-pagination',['data'=>$data]); 
       
        }
		
        return view('front-end/news',compact('commonData', 'data'))

            ->with('i', (request()->input('page', 1) - 1) * 4);

	}
	
	
	public function completedProjectInnerList(Request $request)
	{
		$commonData = $this->commonData() ;
		
		$servicePageName = $this->portalServiceWiseIdentify();
		$serviceID = key($servicePageName);
		//dd($serviceID);
		
		$servieIds = [];
		if( $serviceID == 5 ){
			
			$data = OngoingActivity::where('completed_status', 1)->where('status', 6)->latest()->paginate(15);
		
		}else{
			$serviceID = (string)$serviceID; 
			
			$data = OngoingActivity::where('completed_status', 1)->where('status', 6)->WhereJsonContains('service_ids', $serviceID)->latest()->paginate(15);
		//dd('dd');
		}
		
		
		if($request->ajax()){
			
			return view('front-end.completed-project-pagination',['commonData' => $commonData, 'data'=>$data]); 
       
        }
		
        return view('front-end/completed-project',compact('commonData', 'data'))

            ->with('i', (request()->input('page', 1) - 1) * 15);

	}
	
	public function ongoingProjectInnerList(Request $request)
	{
		$commonData = $this->commonData() ;
		
		$servicePageName = $this->portalServiceWiseIdentify();
		$serviceID = key($servicePageName);
		//dd($serviceID);
		
		$servieIds = [];
		if( $serviceID == 5 ){
			$data = OngoingActivity::where('completed_status', 0)->where('status', 6)->latest()->paginate(15);
		
		}else{
			
			$serviceID = (string)$serviceID; 
			
			$data = OngoingActivity::where('completed_status', 0)->where('status', 6)->WhereJsonContains('service_ids', $serviceID)->latest()->paginate(15);
		
		}
		
		
		if($request->ajax()){
			
			return view('front-end.ongoing-project-pagination',['commonData' => $commonData, 'data' => $data]); 
       
        }
		
        return view('front-end/ongoing-project',compact('data', 'commonData') )

            ->with('i', (request()->input('page', 1) - 1) * 15);

	}
	
	
	public function careerList(Request $request)
	{
		$commonData = $this->commonData() ;
		
		$data = Career::latest()->paginate(15);
		
		if($request->ajax()){
			
			return view('front-end.career-pagination',['commonData'=>$commonData, 'data'=>$data]); 
       
        }
		
        return view('front-end/career',compact('data', 'commonData'))

            ->with('i', (request()->input('page', 1) - 1) * 15);

	}
	
	
	public function careerDetails(Request $request, $id)
	{
		$commonData = $this->commonData() ;
		
		$data = Career::latest()->paginate(15);
		
		if($request->ajax()){
			
			return view('front-end.career-pagination',['commonData'=>$commonData, 'data'=>$data]); 
       
        }
		
        return view('front-end/job-apply',compact('data', 'commonData'))

            ->with('i', (request()->input('page', 1) - 1) * 15);

	}
	
	public function ourClientInnerList(Request $request)
	{
		$commonData = $this->commonData() ;
		
		$servicePageName = $this->portalServiceWiseIdentify();
		$serviceID = key($servicePageName);
		//dd($serviceID);
		
		$useClientList = OngoingActivity::select('client_id')
		->groupBy('client_id')
		->where('status', 6)
		->get();
		
		$totalourClient = sizeof($useClientList);
		
		$reArrangeUsedClientList = [];
		
		foreach($useClientList as $clientId)
		{
			$reArrangeUsedClientList[]	 = $clientId['client_id'];
			
		}
		//dd( $reArrangeUsedClientList );
		
		
		
		$data = OurClient::select('client_logo', 'web_url',)->whereIn('id', $reArrangeUsedClientList)->orderBy('id', 'DESC')->paginate(18);        
		
		
		
		if($request->ajax()){
			
			return view('front-end.clients-pagination',['commonData' => $commonData, 'data' => $data]); 
       
        }
		
        return view('front-end/clients',compact('data', 'commonData') )

            ->with('i', (request()->input('page', 1) - 1) * 18);

	}
	
	
	
	
	public function aboutUs()
    {
        return view('front-end/about-us');
		
    }
	
	
	public function gallery(Request $request)
	{
		$commonData = $this->commonData() ;
		
		$servicePageName = $this->portalServiceWiseIdentify();
		$serviceID = key($servicePageName);
		//dd($serviceID);
		
		if( $serviceID == 5 ){
			
			$data = OngoingActivity::where('feature_image', '!=', '')->where('status', 6)->latest()->paginate(16);
		
		}else{
			$serviceID = (string)$serviceID; 
				
			$data = OngoingActivity::where('feature_image', '!=', '')->where('status', 6)->whereJsonContains('service_ids', $serviceID)->latest()->paginate(16);
		
		}
		
		
		if($request->ajax()){
			
			return view('front-end.gallery-pagination',['commonData' => $commonData, 'data'=>$data]); 
       
        }
		
        return view('front-end/gallery',compact('commonData', 'data'))

            ->with('i', (request()->input('page', 1) - 1) * 16);
	}
	
	
	public function contact()
	{
		$commonData = $this->commonData() ;
		
		$servicePageName = $this->portalServiceWiseIdentify();
		return view('front-end/contact-us', compact('commonData'));
	}
	
	function findAboutLanding( $serviceId )
	{
		
		$data = AboutInfoLandingPage::where('service_id', $serviceId)->get()->toArray();
		//dd($data);
		
		return $data;
	}
	
	
	
	function aboutInner( Request $request )
	{
		$commonData = $this->commonData() ;
		
		$servicePageName= $this->portalServiceWiseIdentify();
		$serviceID 		= key($servicePageName);
		
		$aboutCoreInfo 	= AboutInfoLandingPage::where('service_id', $serviceID)->first()->toArray();
		
		$aboutOtherInfo	= AboutInfo::first()->toArray();
		
		$topManagements	= CoreTeam::where('member_type', 1)->orderBy('order', 'asc')->get()->toArray();
		$coreTeamMembers= CoreTeam::where('member_type', 2)->orderBy('order', 'asc')->get()->toArray();
		$advisorsPanel  = CoreTeam::where('member_type', 3)->orderBy('order', 'asc')->get()->toArray();
		//dd($topManagements);
		
		return view('front-end/about',compact('commonData', 'aboutCoreInfo', 'aboutOtherInfo', 'topManagements', 'coreTeamMembers', 'advisorsPanel' ));
	}
	
	
	function commonData()
	{
		$services = Service::select('id', 'name', 'route', 'short_description', 'icon')->where('route', '!=', '/')->get()->toArray(); 
		$default = Service::select('id', 'name', 'route', 'short_description', 'icon')->where('route',  '/')->first()->toArray(); 
		
		$contact = ContactUs::select('id', 'office_hour', 'mobile_no', 'email', 'facebook', 'twiter', 'linkedin', 'instagram', 'youtube', 'google_map', 'address')->get()->toArray(); 
		
		$commonData['service_list'] = $services;
		$commonData['default_info'] = $default;
		$commonData['contant_info'] = $contact;
		
		return $commonData;
	}
	
	
	 public function sendPublicContactQuery(Request $request)
    {
      
        $input = $request->all();
        unset($input['_token']);
        //dd($input);

        //dd($input);

        if( empty($input['name']) ){
            
            return json_encode(array(
                    "statusCode" => 196,
                    "message" => "Name can not be left blank."
            ));

        }else if( empty($input['email']) ){
            
            return json_encode(array(
                    "statusCode" => 197,
                    "message" => "Email can not be left blank."
            ));

        }else if ( !filter_var($input['email'], FILTER_VALIDATE_EMAIL) ) {
				
				return json_encode(array(
                    "statusCode" => 197,
                    "message" => "Email addres must be a valid."
            ));
			
		}else if( empty($input['subject']) ){

            return json_encode(array(
                    "statusCode" => 198,
                    "message" => "Subject can not be left blank."
            ));

        }else if( empty($input['message']) ){

            return json_encode(array(
                    "statusCode" => 199,
                    "message" => "Message can not be left blank."
            ));

        }else{
			
            $mailData = [
				'title' => 'IPTM',
				'name' => 'Dear '.$input['name'].',',
			];
		
			Mail::to($input['email'])->send(new DemoMail($mailData));

           

        //dd("Email is sent successfully.");
		
            PublicQuery::create($input);
            return json_encode(array(
                    "statusCode" => 200,
                    "message" => "Your message has been sent. Thank you!"
            ));
        }

        return json_encode(array(
                    "statusCode" => 201,
                    "message" => "Something went wrong, please try again."
            ));
    }
	
	
}