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
use App\Models\VisitorHistory;
use App\Models\PageTopConfiguration;
use App\Mail\DemoMail;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
		$serviceID = !empty( $servicePageName ) ? key($servicePageName) : '';
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
		
		
		$totalProjectServWise[1] = OngoingActivity::completedServiceValue( 1 );
		$totalProjectServWise[2] = OngoingActivity::completedServiceValue( 2 );
		$totalProjectServWise[3] = OngoingActivity::completedServiceValue( 3 );
		$totalProjectServWise[4] = OngoingActivity::completedServiceValue( 4 );
		//dd($$totalProjectServWise);
		
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
			->whereIn('id', array_values($removeDuplication))->where('service_id', $serviceID)->orderBy('sort_order', 'asc')->get()->toArray();
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
		
		
		
		$singleUpdate = SingleUpdate::where('feature_showing',1)->where('status', 6)->get();
		//dd($singleUpdate);
		$totalSingle = SingleUpdate::where('feature_showing',1)->count();
		//dd($totalSingle);
		
		$appreciations = Appreciation::orderBy('id', 'DESC')->get();
		$totalAppreciations = Appreciation::orderBy('id', 'DESC')->count();
		
		
		$aboutOtherInfo	= AboutInfo::select('district_covered', 'country_covered', 'resource_pool')->first()->toArray();
		//dd($aboutOtherInfo);
		
		
		
	// start visitor 
		//$userIP = $this->getIPAddress(); // local host not showing real ip 
        //$visitorData = $this->getVisitorData( $userIP );
       // dd($visitorData);
	// end visitor 
	
	
	
		return view('front-end/welcome', compact('aboutOtherInfo', 'commonData', 'totalAppreciations', 'totalSingle', 'totalProjectServWise', 'singleUpdate', 'appreciations', 'serviceCoverAreaList', 'serviceCoverAreaForTopBannerLeft', 'serviceIDForPracticeLeftContent', 'serviceAreaIdForPracticeLeftConten', 'serviceCoverArea', 'totalServiceCoverArea', 'services', 'aboutLandingDataBulletPoint', 'totalourParticipates', 'totalCompletedProject', 'aboutLandingData', 'serviceName', 'clients', 'totalOngoingActivities', 'totalourClient', 'bannerContent' ));

    }
	
	
	
	
	
	public function ajaxfindPracticeAreaBesedOnServices(Request $request, $serviceId)
	{
		//dd($serviceId);
		
		
		$serviceInfo = Service::select('id', 'name', 'route', 'short_description')->where('id', $serviceId)->first();
		
		$serviceCoverArea = ServiceCoverArea::select('id', 'service_id', 'parent_id', 'area_name', 'area_icon')
		->where('service_id', $serviceId)
		->orderBy('sort_order', 'asc')
		->get();
			
		//dd($serviceInfo);
		
		if ( $request->ajax() )
		{
			
			
			// start find practice area ID
			$reArrangeParentChild = [];
			foreach( $serviceCoverArea as $d )
			{
				if( !empty($d->area_name) )
				{
					if( $d->parent_id > 0 )
					{
						$reArrangeParentChild['has_child'][$d->parent_id][$d->id][] = $d->area_name;
					
					}else{
						
						$reArrangeParentChild['has_no_child'][$d->id]['id'] = $d->id;
						$reArrangeParentChild['has_no_child'][$d->id]['name'] = $d->area_name;
						$reArrangeParentChild['has_no_child'][$d->id]['icon'] = $d->area_icon;
					}
					//dd($d->ongoing_activity->title);
					
					/*$existsVerification = OngoingActivity::select('service_cover_area_ids')
										->WhereJsonContains('service_cover_area_ids', (string)$d->id)->where('status', 6)->where('completed_status', 1)->count();     
					if( $existsVerification > 1 )
					{*/
						//$data['area_list'][] = '<li><a href="ongoing-com-news-details/'.$d->id.'">'.$d->area_name.'</a></li>';
					
					//}
					//$reArrangeParentChild[$d->id][$d->parent_id][$d->id][] = $d->area_name;
					
				}
			}
			//dd($reArrangeParentChild);
			
			$data = [];
			
			$parentStore = [];
			
			if( !empty( $reArrangeParentChild ) )
			{
				
				if( !empty($reArrangeParentChild['has_child']) )
				{
					foreach( $reArrangeParentChild['has_child'] as $key => $val )
					{
						$serviceCoverAreaData = ServiceCoverArea::keyWiseAllDataList();
						//dd($serviceCoverAreaData);
						$parentName = !empty($serviceCoverAreaData[$key]['area_name']) ? $serviceCoverAreaData[$key]['area_name'] : '';
						
						$d1 = '<div class="accordion-item"><h2 class="accordion-header" id="headingOne"><button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#'.$key.'">'.$parentName.'</button></h2><div id="'.$key.'" class="accordion-collapse collapse" data-bs-parent="#myAccordion"><div class="card-body"><ul>';
						$d2 = [];
						
						//dd($val);
						if( !empty($val) )
						{
							
							
							foreach($val as $keyC=> $ch)
							{
								//dd($ch);
								$areaChildIcon = !empty($serviceCoverAreaData[$keyC]['area_icon']) ? $serviceCoverAreaData[$keyC]['area_icon'] : '';
							
								$d2[] = '<li><a href="'.$serviceInfo['route'].'">'.$ch[0].'</a></li>';
								//$data['area_list'][] = '<li><a href="ongoing-com-news-details/'.$serviceInfo['id'].'">'.$ch.'</a></li>';
								
							}
						}
						//dd($d2);
						
						$d2 = (implode("&nbsp;",$d2));
						$d3 ='</ul></div></div></div>';
						
						$data['area_list'][] = mb_convert_encoding( $d1.$d2.$d3, 'UTF-8', 'UTF-8') ;
						
						$parentStore[] = $key;
					}
				}
				
				//dd($parentStore);
				
				if( !empty($reArrangeParentChild['has_no_child']) )
				{
					foreach( $reArrangeParentChild['has_no_child'] as $key2 => $val2 )
					{
						if ( in_array($key2, $parentStore) == false )
						{
							
							$data['area_list'][] = '<div class="accordion-item"><h2 class="accordion-header" id="headingThree"><a href="'.$serviceInfo['route'].'" class="accordion-button no-child"  ><img src="storage/app/public/service-cover-areas/'.$val2['icon'].'" width="14"> &nbsp;&nbsp;'.$val2['name'].'</a></h2></div>';
						
						}
					}
				}
				$data['other_info']['service_name'] = !empty($serviceInfo['name']) ?  mb_convert_encoding($serviceInfo['name'], 'UTF-8', 'UTF-8')  : '';
				//$data['other_info']['service_description'] = !empty($serviceInfo['short_description']) ?  mb_convert_encoding($serviceInfo['short_description'], 'UTF-8', 'UTF-8') : '';
				$data['other_info']['service_description'] = [];
				
				$shortDescription = json_decode($serviceInfo['short_description']);
				
				if( !empty($shortDescription) )
				{
					foreach( $shortDescription as $sD )
					{
						$data['other_info']['service_description'][] = $sD .'<br/>';
					}
				}					
				 
			}
			
			//dd($data);
			   
			
			
			return $data;
		}
		//dd($data);
		
	}
	
	
	
	public function ajaxPracticeAreaTab(Request $request, $serviceAreaId)
	{
		//dd($serviceAreaId);
		
		$serviceAreaId = (string)$serviceAreaId; 
		
		$serviceCoverArea = ServiceCoverArea::where('id', $serviceAreaId)->first();
		$practiceAreaTitle = $serviceCoverArea['area_name'];
		$practiceAreaDescription = $serviceCoverArea['short_description'];
		
		$ongoingActSeCorAr = OngoingActivity::whereJsonContains('service_cover_area_ids', $serviceAreaId)
		->where('status', 6)
		->orderBy('client_id', 'asc')
		->paginate(8);
		
		
		$ongoingActSeCorArTotal  = OngoingActivity::whereJsonContains('service_cover_area_ids', $serviceAreaId)
		->where('status', 6)
		->count();
		
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
					if( strlen($d->title ) > 155 ){
					
						$text150 = (string)substr($d->title, 0, 155).'...';
						$text150 =  mb_convert_encoding($text150, 'UTF-8', 'UTF-8'); 
					
					}else{
						$text150 = $d->title;
						$text150 =  mb_convert_encoding($text150, 'UTF-8', 'UTF-8'); 
					}
					
					//$data['info'][] = '<ul><li style="text-align:"><a href="ongoing-com-news-details/'.$d->id.'">'.$text205.'</a></li></ul>';
					$data['info'][] = '<div class="accordion-item"><h2 class="accordion-header" id="headingThree"><a href="ongoing-com-news-details/'.$d->id.'" class="accordion-button no-child"  style="text-align: justify;font-size:15px;font-weight:normal;line-height:22px;margin-top:5px">'.$text150.'</a></h2></div>';
						
				}
			}
			//dd($data);
			$data =  mb_convert_encoding($data, 'UTF-8', 'UTF-8');
			
			return $data;
		}
		
		
	}
	
	
	
	
	public function ongoingActivity(Request $request)
	{
		$servicePageName = session()->get('current_service');
		$serviceID = key($servicePageName);
		$serviceName = $servicePageName[$serviceID];
		
		if( $serviceID == 5){
			
			$services = OngoingActivity::select('id', 'title', 'feature_image', 'activity_short_details',  'status', 'completed_status', 'feature_showing', 'published_date_time')
			->where('status', 6)
			->where('completed_status', 0)
			->where('feature_showing', 1)
			->orderBy('published_date_time', 'DESC')
			->paginate(4);  
			
			$totalOngoingActivity = OngoingActivity::where('status', 6)
			->where('completed_status', 0)
			->where('feature_showing', 1)
			->count(); 
		
		}else{
			$serviceID = (string)$serviceID; 
			$services = OngoingActivity::select('id', 'title', 'feature_image', 'activity_short_details', 'service_ids', 'status', 'completed_status', 'feature_showing', 'published_date_time')
			->whereJsonContains('service_ids', $serviceID)
			->where('completed_status', 0)
			->where('status', 6)
			->where('feature_showing', 1)
			->orderBy('published_date_time', 'DESC')
			->paginate(4);
			
			$totalOngoingActivity = OngoingActivity::whereJsonContains('service_ids', $serviceID)
			->where('completed_status', 0)
			->where('status', 6)
			->where('feature_showing', 1)
			->count(); 
		}
		
		
		$data = [];
		
		if ($request->ajax()) {
			$data['total_count'] = $totalOngoingActivity;
			foreach ($services as $onAc) {
				
				$text205 = '';
				
				if( strlen($onAc->activity_short_details ) > 205 ){
					
					$text205 = (string)substr($onAc->activity_short_details, 0, 205).'...';
					$text205 =  mb_convert_encoding($text205, 'UTF-8', 'UTF-8'); 
					
				}else{
					$text205 = $onAc->activity_short_details;
					$text205 =  mb_convert_encoding($onAc->activity_short_details, 'UTF-8', 'UTF-8'); 
				}
				
				if( !empty($onAc->feature_image) )
				{
				$data['info'][]='
				<div class="single-slide"  id="ongoing-'.$onAc->id.'">
					<div class="row align-items-center"  >
						<div class="col-4">
							
							<div class="content">
							<a href="javascript:void(0);" onclick="ongoing_single('.$onAc->id.')">
							  <div class="content-overlay"></div>
							 
							  <img class="content-image"  src="storage/app/public/ongoing-activities/'.$onAc->feature_image.'" alt="">
							  <div class="content-details fadeIn-bottom">
								<h4 class="content-title" style="font-size:14px;text-align:center">'.$onAc->title.'</h4>
								 
							  </div>
							</a>
						  </div>
						</div>
						
						<div class="col-8" >
							<div class="single-short-desc-parent s3">
								<a class="single-short-desc" href="javascript:void(0);" onclick="ongoing_single('.$onAc->id.')" >'.$text205.'</a>
							</div>
						</div>
					</div>
				</div>';
				}else{
					
					$data['info'][]='
					<div class="single-slide" id="ongoing-'.$onAc->id.'">
						<div class="row align-items-center"  >
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								
								<div class="content">
									<a href="javascript:void(0);" onclick="ongoing_single('.$onAc->id.')">
									  
									 
										<h4 class="content-title" style="font-size:14px;padding:5px;text-align:center">'.$onAc->title.'</h4>
										 
									</a>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
								<div class="single-short-desc-parent">
									<a class="single-short-desc" href="javascript:void(0);" onclick="ongoing_single('.$onAc->id.')" >'.$text205.'</a>
								</div>
							</div>
						</div>
					</div>';
				
				}
				
			}
			
			$data =  mb_convert_encoding($data, 'UTF-8', 'UTF-8');
			
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
				
				$singleOngoing = OngoingActivity::where('status', 6)
				->where('completed_status', 0)
				->orderBy('published_date_time', 'DESC')->first();  
			
			}else{
				$serviceID = (string)$serviceID; 
				$singleOngoing = OngoingActivity::whereJsonContains('service_ids', $serviceID)
				->where('status', 6)->where('completed_status', 0)
				->orderBy('published_date_time', 'DESC')->first();  
			}
		}else{
			
			$singleOngoing = OngoingActivity::where('id', $id)->first();  
		}
		
		
				
		
		//dd($singleOngoing->feature_image);
		$text410 = '';
				
		if( strlen($singleOngoing->activity_short_details ) > 410 ){
			
			$text410 = substr($singleOngoing->activity_short_details, 0, 410).'<a href="ongoing-com-news-details/'.$singleOngoing['id'].'" > Read Details...</a>';
			$text410 =  mb_convert_encoding($text410, 'UTF-8', 'UTF-8'); 
		
		}else{
			
			$text410 = $singleOngoing->activity_short_details.'<a href="ongoing-com-news-details/'.$singleOngoing['id'].'" > Read Details...</a>';
			$text410 =  mb_convert_encoding($text410, 'UTF-8', 'UTF-8'); 
		}
				
		
		//dd($singleOngoing->feature_image);
		$data = [];
		
		if ($request->ajax()) {
			
			$data['last_id'] = $singleOngoing->id;
			
			if( !empty( $singleOngoing->feature_image ) )
			{
				$data['info'][] ='
				<div class="single-slider">
					<div class="blog-box style-big">
						<div class="blog-img">
						<figure class="figure">
							<img src="storage/app/public/ongoing-activities/'.$singleOngoing->feature_image.'" class="figure-img img-fluid rounded" alt="">
							<figcaption class="figure-caption">'.$singleOngoing->title.'</figcaption>
						</figure>
							 
						</div>
						<div class="blog-content" style="text-align:justify">
						'.$text410.'  
						 
						</div>
					</div>
				</div>';
				
			}else{
				
				$data['info'][] ='
				<div class="single-slider">
					<div class="blog-box style-big">
						<div class="blog-img">
						<figure class="figure">
							<h4 class="content-title" style="font-size:30px;padding:5px;text-align:justify">'.$singleOngoing->title.'</h4>
										
						</figure>
							 
						</div>
						<div class="blog-content" style="text-align:justify">
						'.$text410.'  
						 
						</div>
					</div>
				</div>';
				
			}
			
			$data =  mb_convert_encoding($data, 'UTF-8', 'UTF-8');
			
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
		
		$serviceCoverArea = [];
		
		if( !empty($dataDetails->service_cover_area_ids ) )
		{
			$serviceCoverArea = ServiceCoverArea::whereIn('id', json_decode( $dataDetails->service_cover_area_ids ))->pluck('area_name', 'id')->toArray();
		
		}//dd($serviceCoverArea);
		
		return view('front-end/ongoing-completed-news-details', compact('commonData', 'services', 'serviceCoverArea', 'clientName', 'dataDetails', 'otherImages'));

	}
	
	
	public function completedProject(Request $request)
	{
		$servicePageName = session()->get('current_service');
		$serviceID = key($servicePageName);
		$serviceName = $servicePageName[$serviceID];
		
		if( $serviceID == 5){
			
			$ongoingActivity = OngoingActivity::select('id', 'title', 'feature_image', 'activity_short_details', 'status', 'completed_status', 'feature_showing', 'published_date_time')
			->where('status', 6)
			->where('completed_status', 1)
			->where('feature_showing', 1)
			->orderBy('published_date_time', 'DESC')
			->paginate(4);        
			
			$totalOngoingActivity = OngoingActivity::where('status', 6)
			->where('completed_status', 1)
			->where('feature_showing', 1)
			->count(); 
		
		}else{
			
			$serviceID = (string)$serviceID; 

			$ongoingActivity = OngoingActivity::select('id', 'title', 'feature_image', 'activity_short_details', 'service_ids', 'status', 'completed_status', 'feature_showing', 'published_date_time')
			->whereJsonContains('service_ids', $serviceID)
			->where('status', 6)
			->where('completed_status', 1)
			->where('feature_showing', 1)
			->orderBy('published_date_time', 'DESC')
			->paginate(4);
			
			$totalOngoingActivity = OngoingActivity::whereJsonContains('service_ids', $serviceID)
			->where('status', 6)
			->where('completed_status', 1)
			->where('feature_showing', 1)
			->count(); 
		
		}
		
		
		$data = [];
		
		if ($request->ajax()) {
			$data['total_count'] = $totalOngoingActivity;
			
			foreach ($ongoingActivity as $onAc) {
				
				$text205 = '';
				
				if( strlen($onAc->activity_short_details ) > 205 ){
					
					$text205 = (string)substr($onAc->activity_short_details, 0, 205).'...';
					$text205 =  mb_convert_encoding($text205, 'UTF-8', 'UTF-8'); ;
					
				}else{
					$text205 = $onAc->activity_short_details;
					$text205 =  mb_convert_encoding($onAc->activity_short_details, 'UTF-8', 'UTF-8'); ;
				}
				
				if( !empty($onAc->feature_image) )
				{
				$data['info'][]='
				<div class="single-slide" id="completed-'.$onAc->id.'">
					<div class="row align-items-center"  >
						<div class="col-4">
							
							<div class="content">
							<a href="javascript:void(0);" onclick="completed_single('.$onAc->id.')">
							  <div class="content-overlay"></div>
							 
							  <img class="content-image"  src="storage/app/public/ongoing-activities/'.$onAc->feature_image.'" alt="">
							  <div class="content-details fadeIn-bottom">
								<h4 class="content-title" style="font-size:14px;text-align:center">'.$onAc->title.'</h4>
								 
							  </div>
							</a>
						  </div>
						</div>
						
						<div class="col-8" >
							<div class="single-short-desc-parent ">
								<a class="single-short-desc" href="javascript:void(0);" onclick="completed_single('.$onAc->id.')" >'.$text205.'</a>
							</div>
						</div>
					</div>
				</div>';
				
				}else{
					
					$data['info'][]='
					<div class="single-slide" id="completed-'.$onAc->id.'">
						<div class="row align-items-center"  >
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								
								<div class="content">
									<a href="javascript:void(0);" onclick="completed_single('.$onAc->id.')">
									  
									 
										<h4 class="content-title" style="font-size:14px;padding:5px;text-align:center">'.$onAc->title.'</h4>
										 
									</a>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
								<div class="single-short-desc-parent">
									<a class="single-short-desc" href="javascript:void(0);" onclick="completed_single('.$onAc->id.')" >'.$text205.'</a>
								</div>
							</div>
						</div>
					</div>';
				
				}
				
			}
			
			//dd($data);
			$data =  mb_convert_encoding($data, 'UTF-8', 'UTF-8');
			
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
				
				$singleOngoing = OngoingActivity::where('status', 6)
				->where('completed_status', 1)
				->where('feature_showing', 1)
				->orderBy('published_date_time', 'DESC')->first();  
			
			}else{
				$serviceID = (string)$serviceID; 
				$singleOngoing = OngoingActivity::whereJsonContains('service_ids', $serviceID)
				->where('status', 6)
				->where('completed_status', 1)
				->where('feature_showing', 1)
				->orderBy('published_date_time', 'DESC')->first();  
			
			}
			
		}else{
			
			$singleOngoing = OngoingActivity::where('id', $id)->first();  
		}
		
		$text410 = '';
				
		if( strlen($singleOngoing->activity_short_details ) > 410 ){
			
			$text410 = substr($singleOngoing->activity_short_details, 0, 410).'<a href="ongoing-com-news-details/'.$singleOngoing['id'].'" > Read Details...</a>';
			$text410 =  mb_convert_encoding($text410, 'UTF-8', 'UTF-8'); 
		}else{
			
			$text410 = $singleOngoing->activity_short_details.'<a href="ongoing-com-news-details/'.$singleOngoing['id'].'" > Read Details...</a>';
			$text410 =  mb_convert_encoding($text410, 'UTF-8', 'UTF-8'); 
		}
				
		
		//dd($singleOngoing->feature_image);
		$data = '';
		
		if ($request->ajax()) {
			
			if( !empty( $singleOngoing->feature_image ) )
			{
				$data ='
				<div class="single-slider">
					<div class="blog-box style-big">
						<div class="blog-img" >
						<figure class="figure">
							<img src="storage/app/public/ongoing-activities/'.$singleOngoing->feature_image.'" class="figure-img img-fluid rounded" alt="">
							<figcaption class="figure-caption">'.$singleOngoing->title.'</figcaption>
						</figure>
							 
						</div>
						<div class="blog-content" style="text-align:justify">
						'.$text410.'  
						 
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
						<div class="blog-content" style="text-align:justify">
						'.$text410.'  
						 
						</div>
					</div>
				</div>';
				
			}
				
			
			$data =  mb_convert_encoding($data, 'UTF-8', 'UTF-8');
			
			return $data;
		}

	}
	
	
	
	
	function singleUpdateDetails($id)
	{
		$commonData = $this->commonData() ;
		 
		//$dataDetails = SingleUpdate::where('id', $id)->where('status', 6)->first(); 
		$dataDetails = SingleUpdate::where('id', $id)->first(); 
		//dd($dataDetails->images);
		if( empty($dataDetails) ){
			
			//return redirect('/');

		}
		
		
		$otherImages = json_decode($dataDetails->images);
		
		//dd($otherImages);
		 
		
		return view('front-end/single-update-details', compact('commonData', 'dataDetails', 'otherImages'));

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
		
		
		//dd($serviceId);
		
		
			
		$data = SingleUpdate::where('status', 6)->latest()->paginate(20);
		
		
		$pageTopData 	= PageTopConfiguration::select('page_name', 'page_heading', 'top_banner_short_paragraph', 'top_banner_image')->where('page_name', 'News & Events')->first()->toArray();
		
		
		if($request->ajax()){
			
			return view('front-end.news-event-pagination',['pageTopData' => $pageTopData, 'commonData' => $commonData, 'data'=>$data])
			

            ->with('i', (request()->input('page', 1) - 1) * 20); 
       
        }
		
		
		
        return view('front-end/news-event',compact('pageTopData', 'commonData',  'data'))

            ->with('i', (request()->input('page', 1) - 1) * 20);

	}
	
	
	public function completedProjectInnerList(Request $request, $serviceId)
	{
		$commonData = $this->commonData() ;
		
		
		//dd($serviceId);
		
		
		$serviceId = (string)$serviceId; 
			
		//$data = OngoingActivity::where('completed_status', 1)->where('status', 6)->WhereJsonContains('service_ids', $serviceId)->latest()->paginate(20);
		$data = OngoingActivity::where('completed_status', 1)
		->where('status', 6)->WhereJsonContains('service_ids', $serviceId)
		->orderBy('published_date_time', 'DESC')
		->paginate(20);
		
		$pageTopData 	= PageTopConfiguration::select('page_name', 'page_heading', 'top_banner_short_paragraph', 'top_banner_image')->where('page_name', 'Completed Projects')->first()->toArray();
		
		if($request->ajax()){
			
			return view('front-end.completed-project-pagination',['pageTopData' => $pageTopData, 'commonData' => $commonData, 'data'=>$data])
			

            ->with('i', (request()->input('page', 1) - 1) * 20); 
       
        }
		
		$serviceName =  Service::select('id', 'name')->where('id',  $serviceId)->first(); 
		
		$serviceName = $serviceName->name;
		
        return view('front-end/completed-project',compact('pageTopData', 'commonData', 'serviceName', 'data'))

            ->with('i', (request()->input('page', 1) - 1) * 20);

	}
	
	public function ongoingProjectInnerList(Request $request, $serviceId)
	{
		$commonData = $this->commonData() ;
		
		
		//dd($serviceId);
		
		
		$serviceId = (string)$serviceId; 
			
		$data = OngoingActivity::where('completed_status', 0)->where('status', 6)
		->WhereJsonContains('service_ids', $serviceId)
		->orderBy('published_date_time', 'DESC')
		->paginate(20);
		
		
		$pageTopData 	= PageTopConfiguration::select('page_name', 'page_heading', 'top_banner_short_paragraph', 'top_banner_image')->where('page_name', 'Ongoing Projects')->first()->toArray();
		
		if($request->ajax()){
			
			return view('front-end.completed-project-pagination',['pageTopData' => $pageTopData, 'commonData' => $commonData, 'data'=>$data])

            ->with('i', (request()->input('page', 1) - 1) * 20); 
       
        }
		
		$serviceName =  Service::select('id', 'name')->where('id',  $serviceId)->first(); 
		
		$serviceName = $serviceName->name;
		
        return view('front-end/ongoing-project',compact('pageTopData', 'data', 'serviceName', 'commonData') )

            ->with('i', (request()->input('page', 1) - 1) * 20);

	}
	
	
	public function careerList(Request $request)
	{
		$commonData = $this->commonData() ;
		
		$data = Career::latest()->paginate(15);
		
		if($request->ajax()){
			
			return view('front-end.career-pagination',['commonData'=>$commonData, 'data'=>$data]); 
       
        }
		
		
		// start visitor 
		//$userIP = $this->getIPAddress(); // local host not showing real ip 
       // $visitorData = $this->getVisitorData( $userIP );
        //dd($visitorData);
	// end visitor 
		$pageTopData 	= PageTopConfiguration::select('page_name', 'page_heading', 'top_banner_short_paragraph', 'top_banner_image')
		->where('page_name', 'Career')->first()->toArray();
		
		
        return view('front-end/career',compact('pageTopData', 'data', 'commonData'))

            ->with('i', (request()->input('page', 1) - 1) * 15);

	}
	
	
	public function careerDetails(Request $request, $id)
	{
		$commonData = $this->commonData() ;
		
		$data = Career::find($id)->get()->first();
		//dd($data);
		
		if($request->ajax()){
			
			return view('front-end.career-pagination',['commonData'=>$commonData, 'data'=>$data]); 
       
        }
		
        return view('front-end/career-apply',compact('data', 'commonData'))

            ->with('i', (request()->input('page', 1) - 1) * 15);

	}
	
	public function ourClientInnerList(Request $request)
	{
		$commonData = $this->commonData() ;
		
		$servicePageName = $this->portalServiceWiseIdentify();
		$serviceID = !empty( $servicePageName ) ? key($servicePageName) : '';
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
		
		
		
		$data = OurClient::select('client_logo', 'web_url',)->whereIn('id', $reArrangeUsedClientList)->orderBy('id', 'DESC')->paginate(30);        
		
		
		$pageTopData 	= PageTopConfiguration::select('page_name', 'page_heading', 'top_banner_short_paragraph', 'top_banner_image')->where('page_name', 'Clients')->first()->toArray();
		
		if($request->ajax()){
			
			return view('front-end.clients-pagination',['pageTopData' =>$pageTopData, 'commonData' => $commonData, 'data' => $data]); 
       
        }
		
        return view('front-end/clients',compact('pageTopData', 'data', 'commonData') )

            ->with('i', (request()->input('page', 1) - 1) * 18);

	}
	
	
	
	
	public function aboutUs()
    {
        return view('front-end/about-us');
		
    }
	
	
	public function galleryCategory()
	{
		$commonData = $this->commonData() ;
		//dd($commonData);
		$galleryCategory = [];
		
		$newsGalleryData = $this->galleryNewsEvent(0);	
		$totalNewstData = sizeof($newsGalleryData);
		
		$newstLastImageName = '';
		if( !empty($newsGalleryData) )
		{
			
			$newstLastImageName = $newsGalleryData[0];
		}
		
		
		$eventGalleryData = $this->galleryNewsEvent(1);	
		$totalEventData = sizeof($eventGalleryData);
		
		$eventLastImageName = '';
		if( !empty($eventGalleryData) )
		{
			
			$eventLastImageName = $eventGalleryData[0];
		}
		//dd($eventLastImageName);
		
		$servicesFirstData = $this->serviceGalllery(1); 
		$totalServicesFirstData = sizeof($servicesFirstData);
		$servicesFirstData = !empty($servicesFirstData[1]) ? $servicesFirstData[1] : ''; 
		
		$servicesSecondData = $this->serviceGalllery(2); 
		$totalServicesSecondData = sizeof($servicesSecondData);
		$servicesSecondData = !empty($servicesSecondData[1]) ? $servicesSecondData[1] : ''; 
		
		$servicesThirdData = $this->serviceGalllery(3); 
		$totalServicesThirdData = sizeof($servicesThirdData);
		$servicesThirdData = !empty($servicesThirdData[1]) ? $servicesThirdData[1] : ''; 
		
		$servicesFourData = $this->serviceGalllery(4); 
		$totalServicesFourData = sizeof($servicesFourData);
		$servicesFourData = !empty($servicesFourData[1]) ? $servicesFourData[1] : ''; 
		
		
		//dd($servicesFourData);
		
		$pageTopData 	= PageTopConfiguration::select('page_name', 'page_heading', 'top_banner_short_paragraph', 'top_banner_image')->where('page_name', 'Gallery Category')->first()->toArray();
		
		
        return view('front-end/gallery-category',compact('totalNewstData', 'totalEventData', 'totalServicesFirstData', 'totalServicesSecondData', 'totalServicesThirdData', 'totalServicesFourData', 'pageTopData', 'servicesFirstData', 'servicesSecondData', 'servicesThirdData', 'servicesFourData', 'newstLastImageName', 'eventLastImageName', 'commonData'));
       // return view('front-end/gallery',compact('commonData', 'data'));
	}
	
	
	
	public function gallery(Request $request, $galleryCategory)
	{

		$commonData = $this->commonData() ;
		
		$servicePageName = $this->portalServiceWiseIdentify();
		$serviceID = !empty( $servicePageName ) ? key($servicePageName) : '';
		//dd($serviceID);
		
		$data = [];
		
		$imageFolderName = '';
		$galleryName = '';
		
		if ( $galleryCategory == 'news' ){
			
			$galleryName = 'News';
			$imageFolderName = 'single-updates';
			$data = $this->galleryNewsEvent(0);	
			
		}
		else if( $galleryCategory == 'event' ){
			
			$galleryName = 'Event';
			$imageFolderName = 'single-updates';
			$data = $this->galleryNewsEvent(1);	
		}
		
		else{
			
			//$galleryName = 'Event';
			
			$galleryName = Service::getList();
			$galleryName = !empty($galleryName[$galleryCategory]) ? $galleryName[$galleryCategory] : '';
			//dd($galleryName );
			$imageFolderName = 'ongoing-activities';
			
			$data = $this->serviceGalllery($galleryCategory); 
		
			
			
		}
		
		
		//dd($data);
		$data = $this->paginate($data, 20);
		$data->setPath('');
		//$data = $this->paginate($data);
		
		if($request->ajax()){
			
			return view('front-end.gallery-pagination',['galleryName' => $galleryName, 'imageFolderName' => $imageFolderName, 'commonData' => $commonData, 'data'=>$data]); 
       
        }
		
		$pageTopData 	= PageTopConfiguration::select('page_name', 'page_heading', 'top_banner_short_paragraph', 'top_banner_image')->where('page_name', 'Gallery Category')->first()->toArray();
		
		
        return view('front-end/gallery',compact('pageTopData', 'galleryName', 'imageFolderName', 'commonData', 'data'))->with('i', (request()->input('page', 1) - 1) * 20);
       // return view('front-end/gallery',compact('commonData', 'data'));
	}
	
	
	function galleryNewsEvent( $newsEventStatus = 0)
	{
		
		$query = SingleUpdate::select('id', 'title', 'feature_image', 'images', 'news_event_status', 'status')
			->where('feature_image', '!=', '')
			->where('news_event_status', $newsEventStatus)
			->where('status', 6)
			->orderBy('published_date_time', 'desc')
			->get()->toArray();
		
		$reArrange = [];
			
		foreach( $query as $d )
		{
				$reArrange[$d['id']]['title']= $d['title'];
				$reArrange[$d['id']]['all_images'] = json_decode($d['images']);
				$reArrange[$d['id']]['all_images'][2] = $d['feature_image'];
			
		}
		
		$data = [];
		foreach($reArrange as $keyId => $v)
			{
				//dd($keyId);
				$count = 1;
				foreach($v['all_images'] as $v3 )
				{
					
					if( !empty($v3) && $count < 4 ) //$count < 4  mean for taken total 3 images. Before we have taken in DB total 4 images.
					{
						
						$data[][$v['title']] = $v3;
						$count++;
					}
				}
			}
			
		return $data;
	}
	
	
	function serviceGalllery( $galleryCategory )
	{
		$serviceID = (string)$galleryCategory; 
		
		//$data = OngoingActivity::where('feature_image', '!=', '')->where('status', 6)->latest()->paginate(16);
			$query = OngoingActivity::select('id', 'title', 'feature_image', 'images', 'status')
			->whereJsonContains('service_ids', $serviceID)
			->where('feature_image', '!=', '')
			->where('status', 6)
			->orderBy('published_date_time', 'desc')
			->get()->toArray();
			
			$reArrange = [];
			
			foreach( $query as $d )
			{
					$reArrange[$d['id']]['title']= $d['title'];
					$reArrange[$d['id']]['all_images'] = json_decode($d['images']);
					$reArrange[$d['id']]['all_images'][2] = $d['feature_image'];
				
			}
			//dd($reArrange);
			
			
			$data = [];
			foreach($reArrange as $keyId => $v)
			{
				//dd($keyId);
				$count = 1;
				foreach($v['all_images'] as $v3 )
				{
					
					if( !empty($v3) && $count < 4 ) //$count < 4  mean for taken total 3 images. Before we have taken in DB total 4 images.
					{
						
						$data[][$v['title']] = $v3;
						$count++;
					}
				}
			}
		
		return $data;
	}
	
	
	
	
	public function paginate($items, $perPage = 0, $page = null, $options = [])

    {
		
        $page = $page  ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

    }
	
	
	public function contact()
	{
		$commonData = $this->commonData() ;
		
		$pageTopData 	= PageTopConfiguration::select('page_name', 'page_heading', 'top_banner_short_paragraph', 'top_banner_image')
		->where('page_name', 'Contact Us')->first()->toArray();
		

		return view('front-end/contact-us', compact('pageTopData', 'commonData'));
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
		
		
		$pageTopData 	= PageTopConfiguration::select('page_name', 'page_heading', 'top_banner_short_paragraph', 'top_banner_image')->where('page_name', 'Who We Are')->first()->toArray();
		//dd($pageTopData);
		
		$aboutCoreInfo 	= AboutInfoLandingPage::where('service_id', 5)->first()->toArray();
		
		$aboutOtherInfo	= AboutInfo::first()->toArray();
		
		$topManagements	= CoreTeam::where('member_type', 1)->orderBy('order', 'asc')->get()->toArray();
		$advisorsPanel  = CoreTeam::where('member_type', 2)->orderBy('order', 'asc')->get()->toArray();
		$coreTeamMembers= CoreTeam::where('member_type', 3)->orderBy('order', 'asc')->get()->toArray();
		//dd($topManagements);
		
		return view('front-end/about',compact('pageTopData', 'commonData', 'aboutCoreInfo', 'aboutOtherInfo', 'topManagements', 'coreTeamMembers', 'advisorsPanel' ));
	}
	
	
	function commonData()
	{
		$services = Service::select('id', 'name', 'route', 'short_description', 'icon')->where('route', '!=', '/')->orderBy('order','asc')->get()->toArray(); 
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
	
	
	
	public function jobApply(Request $request)
    {
      //dd('Response');
	  
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
	
	
	
	
	 public function visitorManagement() 
    {  
		$data = [];
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
		
		//$checkTodayRepeatVisitor = VisitorHistory::where('ip', $ip)
		//->where('created_at','LIKE','%'. date('Y-m-d').'%')->count();
		
		//if( $checkTodayRepeatVisitor == 0 )
		//{
			$insertData['ip'] = $ip;
			VisitorHistory::create($insertData);
		//}
		
		
		$totalVisitor = VisitorHistory::count();
		$todayVisitor = VisitorHistory::where('created_at','LIKE','%'. date('Y-m-d').'%')->count();
		//dd( date('Y-m-d'));
		$data['totalVisitor'] = $totalVisitor;
		$data['todayVisitor'] = $todayVisitor;
		
       return $data;
    }


   
  
	
	
}