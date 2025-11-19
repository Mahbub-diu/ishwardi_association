@extends('layouts.app-frontend')




@section('content')
<div class="as-hero-wrapper hero-3 {{ !empty($serviceName != 'Institute of Professional Training & Management (IPTM)' ) ? 'slider-reverse-main' : '' }}">

    <div class="container z-index-common">

        <div class="hero-style3">
            <h1 class="hero-title" >{{ !empty($serviceName) ? $serviceName : '' }}</h1>
            
			
			
			<div class="tree-view-main">
                <div class="tree-flex-main">
                    <div class="left-box">
						
                        <ul class="nav">
						
							<li class="nav-item">
                                <div class="tree-box">
                                    <div class="tree-icon">
                                        <img class="mx-w-60"
                                            src="{{ asset('public/front-end/img/icon/hero_counter_6.svg') }}"
                                            alt="icon">
                                    </div>
                                    <div class="tree-list">

                                        <h2 class="counter-number">
                                            <span class="counter"  > {{  $totalourClient  }} +</span>
                                        </h2>
                                        <span class="counter-text"> clients </span>
                                    </div>
                                </div>

                            </li>
							
							
                            <li class="nav-item">
                                <div class="tree-box">
                                    <div class="tree-icon">
                                        <img class="mx-w-60"
                                            src="{{ asset('public/front-end/img/icon/hero_counter_5.svg') }}"
                                            alt="icon">
                                    </div>
                                    <div class="tree-list">

                                        <h2 class="counter-number">
                                            <span class="counter"  > {{ ($totalCompletedProjectServ[1]+$totalCompletedProjectServ[2]+$totalCompletedProjectServ[3]+$totalCompletedProjectServ[4])  }} +</span>
                                        </h2>
                                        <span class="counter-text"> projects</span>

                                    </div>
                                </div>
                                <ul class="tree-child">
                                    
									
									@if( !empty($commonData['service_list']) ) 
										@foreach($commonData['service_list']  as  $key => $sName )
											
											<li>
												<div class="icon-box">
													<img class="mx-w-60"
														src="{{ asset('storage/app/public/services/'.$sName['icon']) }}"
														alt="icon">
												</div>
												<div class="child-list">
													{{ $sName['name'] }} ({{ !empty($totalCompletedProjectServ[$key+1]) ? $totalCompletedProjectServ[$key+1] : 0 }})
												</div>
											</li>
										@endforeach
									@endif

                                </ul>
                            </li>
							

                        </ul>
                    </div>
                    <div class="right-box">
                        <ul class="nav">
                            <li class="nav-item">
                                <div class="tree-box">
                                    <div class="tree-icon">
                                        <img class="mx-w-60"
                                            src="{{ asset('public/front-end/img/icon/feature_1_6.png') }}"
                                            alt="icon">
                                    </div>
                                    <div class="tree-list">

                                        <h2 class="counter-number">
                                            <span class="counter"  > {{ $totalourParticipates }} +</span>
                                        </h2>
                                        <span class="counter-text"> Participants  / Beneficiary  </span>
                                    </div>
                                </div>

                            </li>
                            <li class="nav-item">
                                <div class="tree-box">
                                    <div class="tree-icon">
                                        <img class="mx-w-60"
                                            src="{{ asset('public/front-end/img/icon/hero_counter_9.svg') }}"
                                            alt="icon">
                                    </div>
                                    <div class="tree-list">

                                        <h2 class="counter-number">
                                            <span class="counter"  > {{ 5 }} +</span>
                                        </h2>
                                        <span class="counter-text"> district coverd </span>
                                    </div>
                                </div>

                            </li>
                            <li class="nav-item">
                                <div class="tree-box">
                                    <div class="tree-icon">
                                        <img class="mx-w-60"
                                            src="{{ asset('public/front-end/img/icon/hero_counter_9.svg') }}"
                                            alt="icon">
                                    </div>
                                    <div class="tree-list">

                                        <h2 class="counter-number">
                                            <span class="count	er"  > {{ 10 }} +</span>
                                        </h2>
                                        <span class="counter-text"> country covered</span>
                                    </div>
                                </div>

                            </li>


                            
							
						
						@if( $serviceName == 'Institute of Professional Training & Management (IPTM)' )
                            <li class="nav-item">
                                <div class="tree-box">
                                    <div class="tree-icon">
                                        <img class="mx-w-60"
                                            src="{{ asset('public/front-end/img/icon/counter_1_2.svg') }}"
                                            alt="icon">
                                    </div>
                                    <div class="tree-list">

                                        <h2 class="counter-number">
                                            <span class="counter"> {{ 4 }} +</span>
                                        </h2>
                                        <span class="counter-text"> resource pool </span>
                                    </div>
                                </div>
                            </li>
						@endif


                        </ul>
                    </div>
                </div>

            </div>
			
        </div>
    </div>
	
    <div class="hero-img1">
		
		<img src="{{ asset('storage/app/public/about-info-landing-pages/' . $aboutLandingData[0]['banner_image']) }}"
            alt="Hero Image">
			
	</div>
	
    <div class="hero-shape shape1">
		@if( $serviceName == 'Institute of Professional Training & Management (IPTM)' )
			
			<img src="{{ asset('public/front-end/img/hero/shape_3_1.png') }}" alt="shape">
		@else
			<img src="{{ asset('public/front-end/img/rotatebg.png') }}" alt="shape">
		
		@endif
		
	</div>
	
    <div class="hero-shape shape2">
		<img src="{{ asset('public/front-end/img/hero/shape_3_2.png') }}" alt="shape">
	</div>
	
    <div class="hero-shape shape3">
		<img src="{{ asset('public/front-end/img/hero/shape_3_3.png') }}" alt="shape">
	</div>
	
    {{-- <div class="hero-shape shape4"><img src="{{ asset('public/front-end/img/hero/shape_3_4.png') }}" alt="shape"></div> --}}

    <div class="hero-shape shape5">
        <img src="{{ asset('public/front-end/img/hero/IPTMlogo.png') }}" alt="shape">
    </div>

    <div class="hero-shape shape6"><img src="{{ asset('public/front-end/img/hero/shape_3_6.png') }}" alt="shape"></div>
    <div class="hero-shape shape7"><img src="{{ asset('public/front-end/img/hero/shape_3_1.png') }}" alt="shape"></div>
    </div>


	@if(!$singleUpdate->isEmpty())
		<section class="moving-news-main">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="moving-flex">
							<div class="newsticker_title">
								<span>Latest News</span>
							</div>
							<div class="tickerwrapper">
								<ul class='list'>
									@foreach($singleUpdate as $sUpdate)
									<li class='listitem'>
										<a href="{{ url('single-update-details/'.$sUpdate->id) }}">{{ $sUpdate->title }}</a>
									</li>
									@endforeach
								</ul>
							</div>

						</div>

					</div>
				</div>
			</div>
		</section>
	@endif

    <div class="space" id="about-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  col-xl-6">
                    <div class="img-box1">
                        <img class="w-100"
                            src="{{ asset('storage/app/public/about-info-landing-pages/' . $aboutLandingData[0]['feature_image']) }}"
                            alt="About">
                        <a href="#" class="counter-box text-center">
                            <img class="mb-1" src="{{ asset('public/front-end/img/iso-logo.png') }}" width="100"
                                alt="ISO">
                            <span style="color: #a24943; display: block;" class="counter-text">Number: BDQ155I155</span>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  col-xl-6">
                    <div class="mb-25 mb-xl-5">
                        <h3 class="h3" style="color:#f89939">{{ !empty($serviceName) ? $serviceName : '' }}</h3>
                    </div>
                    <p class="mt-n2 mb-35">
						@php 
							$aboutFullText = json_decode($aboutLandingData[0]['about_text']);
							$aboutTextPara1 = !empty($aboutFullText[0]) ? $aboutFullText[0] : ''; 
							$aboutTextPara2 = !empty($aboutFullText[1]) ? $aboutFullText[1] : ''; 
							$aboutTextPara3 = !empty($aboutFullText[2]) ? $aboutFullText[2] : ''; 
						@endphp
                        <p>
                            {{ !empty($aboutTextPara1) ? $aboutTextPara1 : '' }}
							
							@if (!empty($aboutTextPara2) )
								<br/><br/>
                            
							{{ $aboutTextPara2 }} 
							
							@endif
							
							@if (!empty($aboutTextPara3)) 
								<br/><br/>
                            
							{{ $aboutTextPara3 }} 
							
							@endif
                            <!--<a href="#">Read more...</a>-->
                        </p>
                    </p>
                    
                    @if(  !empty( $aboutLandingDataBulletPoint ) )
                        <!--<div class="checklist mb-45">
                            <ul>
                                @if(  !empty( $aboutLandingDataBulletPoint[0] ) )
                                    <li>{{ $aboutLandingDataBulletPoint[0] }}</li>
                                @endif
                                
                                @if(  !empty( $aboutLandingDataBulletPoint[1]) )
                                    <li>{{  $aboutLandingDataBulletPoint[1] }}</li>
                                @endif
                                
                                @if(  !empty( $aboutLandingDataBulletPoint[2]) )
                                    <li>{{  $aboutLandingDataBulletPoint[2] }}</li>
                                @endif
                                
                                @if(  !empty( $aboutLandingDataBulletPoint[3]) )
                                    <li>{{  $aboutLandingDataBulletPoint[3] }}</li>
                                @endif
                            </ul>
                        </div>-->
                    @endif
                    <!--<a href="" class="as-btn">Get More Info</a>-->
                </div>
            </div>
        </div>
        {{-- <div class="shape-mockup jump z-index3 d-none d-sm-block" data-top="30%" data-left="11%"><img
                src="{{ asset('public/front-end/img/shape/circle_1.png') }}" alt="shapes"></div> --}}
        {{-- <div class="shape-mockup jump-reverse d-none d-xl-block" data-bottom="30%" data-left="4%"><img
                src="{{ asset('public/front-end/img/shape/circle_2.png') }}" alt="shapes"></div> --}}
        <div class="shape-mockup" data-bottom="-9.5%" data-right="0">
            <img src="{{ asset('public/front-end/img/shape/line_1.png') }}" alt="shapes">
        </div>
    </div>


	@if( $serviceName == 'Institute of Professional Training & Management (IPTM)' || $totalServiceCoverArea > 0 )
    <div class="space-bottom practice-area-main" data-bg-src="{{ asset('public/front-end/img/bg/why_bg_1.png') }}">
        <div class="container">

            <div class="title-area text-center mb-45">
                <!--<h2 class="sec-title fw-semibold">Our Practice Area</h2>-->
				@if( $serviceName == 'Institute of Professional Training & Management (IPTM)' )
					<h2 class="sec-title fw-semibold" style="color:#f89939">Core Service Area</h2>
				@else
					<h2 class="sec-title fw-semibold" style="color:#f89939">Our Practice Area</h2>
				@endif
            </div>
            <div class="row align-items-center ">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="tab-content" id="myTabContent">
                        
						<div class="tab-pane fade show active" id="" >
                            
							<div class="title-area mb-25">
                                <h3 class="sec-title fw-semibold" id="title-practice-area">
									
                                </h3>
                            </div>
							
                            <p class="mt-n2 mb-25" id="description-practice-area">
								
							</p>
							
                            <div class="checklist mb-30">
                                
								<ul class="accordion" id="results-practice-area"></ul>
								<div class="ajax-loading-practice-area" style="text-align: center;">
									<img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />
								</div>
								
								 <div class="accordion" id="myAccordion">
									
											<div class="ajax-loading-practice-area" style="text-align: center;">
												<img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />
											</div>
                                </div>
								
                            </div>
                            <div class="nextprev-button-sets">
							
                                <button type="button" class="btn btn-warning me-3 prv-practice-area" id="prv-practice-area">
                                    <i class="ri-arrow-left-s-line"></i>
                                </button>
                                <button type="button" class="btn btn-warning lod-practice-area" id="lod-practice-area">
                                    <i class="ri-arrow-right-s-line"></i>
                                </button>
                            </div>

                        </div>


                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					
					@if( $serviceName == 'Institute of Professional Training & Management (IPTM)' )
					
					
					<div class="custom-tabs four-tabs">
						<ul class="nav nav-tabs" id="myTab" role="tablist">

							@if (!empty($commonData['service_list']))
								
								@foreach ($commonData['service_list'] as $service)
								
									<li class="nav-item" role="presentation">
										<button class="nav-link" id="box{{ $service['id'] }}" onclick="findPracticeAreaBesedOnServices({{ $service['id'] }})">

											<div class="card">
												<img src="{{ asset('storage/app/public/services/'.$service['icon']) }}"
													alt="icon" class="card-img-top">
													{{--<div class="card-body">
													<h3 class="card-title">{{ $service['name'] }}</h3>
												</div>--}}
											</div>

										</button>
									</li>
								@endforeach
							@endif

						</ul>
					</div>
							
					@else
						@if( $totalServiceCoverArea == 1 )
							 {{-- this is for single tabs start from here   --}}

							<div class="custom-tabs single-tabs ">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									
									@foreach( $serviceCoverArea  as $serAreaName)	
										@php $areaIcon = !empty($serviceCoverAreaList[$serAreaName['id']]['area_icon']) ? $serviceCoverAreaList[$serAreaName['id']]['area_icon'] : ''; @endphp
										
										<li class="nav-item" role="presentation">
											<button class="nav-link active-custom"  id="box{{ !empty($serAreaName['id']) ? $serAreaName['id'] : '' }}" onclick="practiceServiceTab({{ !empty($serAreaName['id']) ? $serAreaName['id'] : 0 }},1)">
												<div class="feature-card-wrap">
													<div class="feature-card">
														<div class="feature-card_icon"><img
																src="{{ asset('storage/app/public/service-cover-areas/'.$areaIcon) }}"
																alt="icon">
														</div>
													</div>
												</div>
											</button>
										</li>
									@endforeach

								</ul>
							</div>
							{{--  single tabs end here   --}}
						
						
						@elseif( $totalServiceCoverArea == 2 )
							{{-- this is for 2 tabs start from here   --}}
							<div class="custom-tabs four-tabs ">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									
									@foreach( $serviceCoverArea  as $serAreaName)	
									@php $areaIcon = !empty($serviceCoverAreaList[$serAreaName['id']]['area_icon']) ? $serviceCoverAreaList[$serAreaName['id']]['area_icon'] : ''; @endphp
										
									<li class="nav-item" role="presentation">
										<button  id="box{{ !empty($serAreaName['id']) ? $serAreaName['id'] : '' }}" class="nav-link" onclick="practiceServiceTab({{ !empty($serAreaName['id']) ? $serAreaName['id'] : 0 }},1)" >
											<div class="feature-card-wrap">
												<div class="feature-card">
													<div class="feature-card_icon"><img
															src="{{ asset('storage/app/public/service-cover-areas/'.$areaIcon) }}"
															alt="icon">
													</div>
												</div>
											</div>
										</button>
									</li>
									@endforeach

								</ul>
							</div>
							
							
							
							
							
							{{--  2 tabs end here   --}}
						
						@elseif( $totalServiceCoverArea == 3 )
							
							{{-- this is for 3 tabs start from here   --}}
									<div class="custom-tabs three-tabs ">
										<ul class="nav nav-tabs" id="myTab" role="tablist">
										
										@foreach( $serviceCoverArea  as $serAreaName)
										
										
											@php $areaIcon = !empty($serviceCoverAreaList[$serAreaName['id']]['area_icon']) ? $serviceCoverAreaList[$serAreaName['id']]['area_icon'] : ''; @endphp
											
											<li class="nav-item" role="presentation">
												<button class="nav-link active-custom"  id="box{{ !empty($serAreaName['id']) ? $serAreaName['id'] : '' }}" onclick="practiceServiceTab({{ !empty($serAreaName['id']) ? $serAreaName['id'] : 0 }},1)">
													
													<div class="card">
															<img src="{{ asset('storage/app/public/service-cover-areas/'.$areaIcon) }}"
																alt="icon" class="card-img-top">
													</div>
												</button>
											</li>
										@endforeach

										</ul>
									</div>
								{{--  3 tabs end here   --}}
						
						@elseif( $totalServiceCoverArea == 4 )
								
								<div class="custom-tabs four-tabs ">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										
										@foreach( $serviceCoverArea  as $serAreaName)	
												@php $areaIcon = !empty($serviceCoverAreaList[$serAreaName['id']]['area_icon']) ? $serviceCoverAreaList[$serAreaName['id']]['area_icon'] : ''; @endphp
												
												<li class="nav-item" role="presentation">
													<button class="nav-link active-custom"  id="box{{ !empty($serAreaName['service_id']) ? $serAreaName['service_id'] : 0 }}" onclick="practiceServiceTab({{ !empty($serAreaName['service_cover_area_id']) ? $serAreaName['service_cover_area_id'] : 0 }},1)">
											
														<div class="card">
															<img src="{{ asset('storage/app/public/service-cover-areas/'.$areaIcon) }}"
																alt="icon" class="card-img-top">
															<div class="card-body">
																<h3 class="card-title">{{ !empty($serviceCoverAreaList[$serAreaName['id']]['area_name']) ? $serviceCoverAreaList[$serAreaName['id']]['area_name'] : '' }}</h3>
															</div>
														</div>
													</button>
												</li>
										@endforeach
										
									</ul>
								</div>
					
						@elseif( $totalServiceCoverArea == 5 )
						{{-- this is for 5 tabs start from here   --}}
						<div class="custom-tabs five-tabs ">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								
								@foreach( $serviceCoverArea  as $serAreaName)	
									
									@php $areaIcon = !empty($serviceCoverAreaList[$serAreaName['id']]['area_icon']) ? $serviceCoverAreaList[$serAreaName['id']]['area_icon'] : ''; @endphp
										
										<li class="nav-item" role="presentation">
										<button class="nav-link "  id="box{{$serAreaName['service_id']}}" onclick="practiceServiceTab({{ !empty($serAreaName['id']) ? $serAreaName['id'] : 0 }},1)">
											
											<div class="card">
												<img src="{{ asset('storage/app/public/service-cover-areas/'.$areaIcon) }}"
													alt="icon" class="card-img-top">
												<div class="card-body">
													<h3 class="card-title">
														{{ !empty($serviceCoverAreaList[$serAreaName['id']]['area_name']) ? $serviceCoverAreaList[$serAreaName['id']]['area_name'] : '' }}
													</h3>
												</div>
											</div>
										</button>
									</li>
								@endforeach
								
							</ul>
						</div>
						{{--  5 tabs end here   --}}
						
						@elseif( $totalServiceCoverArea == 6 )
						
							{{-- this is for 6 tabs start from here   --}}
							<div class="custom-tabs six-tabs ">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									
									@foreach( $serviceCoverArea  as $serAreaName)	
										
										@php $areaIcon = !empty($serviceCoverAreaList[$serAreaName['id']]['area_icon']) ? $serviceCoverAreaList[$serAreaName['id']]['area_icon'] : ''; @endphp
												
									<li class="nav-item" role="presentation">
										<button class="nav-link active-custom" id="box{{$serAreaName['service_id']}}" onclick="practiceServiceTab({{ !empty($serAreaName['id']) ? $serAreaName['id'] : 0 }},1)">
											<div class="feature-card-wrap">
												<div class="feature-card">
													<div class="feature-card_icon"><img
															src="{{ asset('storage/app/public/service-cover-areas/'.$areaIcon) }}" alt="icon">
													</div>
													<h3 class="feature-card_title">{{ !empty($serviceCoverAreaList[$serAreaName['id']]['area_name']) ? $serviceCoverAreaList[$serAreaName['id']]['area_name'] : '' }}
													</h3>
												</div>
											</div>
										</button>
									</li>
									@endforeach

								</ul>
							</div>
							{{--  6 tabs end here   --}}
					
						@endif
					@endif
					
                   
                    
					
                </div>
            </div>
        </div>
    </div>
	@endif

	
	@if( $totalOngoingActivities > 0 )
		
		<section class="_space-top space-extra-bottom ongoing-activities">
			<div class="container">
				<div class="title-area text-center">
					<h2 class="sec-title fw-semibold" style="color:#f89939">Ongoing Projects</h2>
				</div>


				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="slider-for">
							<div class="wrapper-ongoing-single">

								<ul id="results-ongoing-single"></ul>
								<div class="ajax-loading-ongoing-single" style="text-align: center;">
									<img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />

								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

						<div class="right-loader">
							<span id="results-ongoing-list"></span>
							<div class="ajax-loading-ongoing" style="text-align: center;">
								<img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />
							</div>
							<button type="button" id="lod-ongoing-activity" class="btn btn-warning lod-ongoing-activity">
								<i class="ri-arrow-down-s-line"></i>
							</button>
							<button type="button" id="prv-ongoing-activity" class="btn btn-warning prv-ongoing-activity">
								<i class="ri-arrow-up-s-line"></i>
							</button>
						</div>
					   
					</div>


				</div>
			</div>
		</section>
		
	@endif



    <section style="background-color: #BD5E29  !important;line-height:0 !important" class="bg-theme home-counter-main"
        data-bg-src="{{ asset('public/front-end/img/bg/bg_overlay_2.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="counter-flex">
                        <div class="counter-card-wrap">
                            <div class="counter-card">
                                <h2 class="counter-card_number"><span class="counter-number">{{ $totalCompletedProject + $totalOngoingActivities }}</span></h2>
                                <span class="counter-card_text"><strong>Total Projects</strong></span>
                            </div>
                        </div>
                        <div class="counter-card-wrap">
                            <div class="counter-card">
                                <h2 class="counter-card_number"><span class="counter-number">{{ $totalCompletedProject }}</span></h2>
                                <span class="counter-card_text"><strong>Completed Projects</strong></span>
                            </div>
                        </div>
                        <div class="counter-card-wrap">
                            <div class="counter-card">
                                <h2 class="counter-card_number"><span
                                        class="counter-number">{{ $totalOngoingActivities }}</span>
                                </h2>
                                <span class="counter-card_text"><strong>Ongoing Projects</strong></span>
                            </div>
                        </div>
                        <div class="counter-card-wrap">
                            <div class="counter-card">
                                <h2 class="counter-card_number"><span
                                        class="counter-number">{{ $totalourClient }}</span></h2>
                                <span class="counter-card_text"><strong>Total Clients & Partners</strong></span>
                            </div>
                        </div>
                        <div class="counter-card-wrap">
                            <div class="counter-card">
                                <h2 class="counter-card_number"><span class="counter-number">{{ $totalourParticipates }}</span></h2>
                                <span class="counter-card_text"><strong>Total Participates</strong></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    
    @if( $totalCompletedProject > 0 )
		
		<section class="_space-top space-extra-bottom ongoing-activities myp-30">
			<div class="container">
				<div class="title-area text-center">
					<h2 class="sec-title fw-semibold" style="color:#f89939">Completed Projects</h2>
				</div>


				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="slider-for">
							<div class="wrapper-completed-single">

								<ul id="results-completed-single"></ul>
								<div class="ajax-loading-completed-single" style="text-align: center;">
									<img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />

								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

						<div class="right-loader">
							<span id="results-completed-project-list"></span>
							<div class="ajax-loading-completed-project" style="text-align: center;">
								<img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />
							</div>
							<button type="button" id="lod-completed-project" class="btn btn-warning lod-completed-project">
								<i class="ri-arrow-down-s-line"></i>
							</button>
							<button type="button" id="prv-completed-project" class="btn btn-warning prv-completed-project">
								<i class="ri-arrow-up-s-line"></i>
							</button>
						</div>
					   
					</div>


				</div>
			</div>
		</section>
	@endif
    
    
    
	@if($totalSingle > 0 )
    <section class="space _bg-smoke events-slider-main">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title fw-medium" style="color:#f89939">Every Single Updates</h2>
            </div>

            <div class="row">
				
				
					@foreach($singleUpdate as $sValue)
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<div class="blog-card">
								<div class="blog-img"><img src="{{ asset('storage/app/public/single-updates/' . $sValue->feature_image) }}"
										alt="blog image"></div>
								<div class="blog-content">
									<div class="blog-meta style2">
										<a href="#">
											<i class="far fa-clock"></i>
											{{ date("d M Y", strtotime($sValue->created_at)) }}
										</a> 
									</div>
									<h3 class="po-color blog-title"><a href="#">{{ $sValue->title }}</a>
									</h3>
									<a href="{{ url('single-update-details/'.$sValue->id) }}" class="link-btn">Read Details<i class="fas fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
					@endforeach
				
                
            </div>

        </div>

    </section>
	
	@endif

    <section class="space home-clients-main" data-bg-src="{{ asset('public/front-end/img/bg/clients.jpg') }}">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title fw-semibold" style="color:#f89939">Clients</h2>
            </div>
            <div class="row clients-slider">

                <!--<span id="results-client"></span>-->



                @if (!empty($clients))
                    @foreach ($clients as $client)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="team-grid">
                                <div class="team-info">
                                    <a href="{{ $client->web_url }}" target="_blank">
                                        <img src="{{ asset('storage/app/public/client_logo/' . $client->client_logo) }}"
                                            alt="Client Logo" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
			
			@if( $totalourClient > 6 )
            <div class="row">
                <div class="col-12">
                    <div class="common-see-all">
                        <a href="{{ url('our-client') }}" class="as-btn">see all clients</a>
                    </div>
                </div>
            </div>
			@endif
        </div>
    </section>

	
	@if( $totalAppreciations > 0 )
    <section class="overflow-hidden bg-white space appreciations-slider-main">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title fw-medium">Appreciations</h2>
            </div>
            <div class="row appreciations-slider">
                
				
				@foreach( $appreciations as $ap )
					<div class="col-lg-6">
						<div class="testi-box">
							
							<div class="testi-box_content">
								<div class="testi-box_img"><img
										src="{{ asset('storage/app/public/appreciations/'.$ap->photo) }}" alt="Avater">
								</div>
								<p class="testi-box_text">{{ $ap->details }}</p>
							</div>
							
							<div class="testi-box_bottom">
								<div>
									<h3 class="testi-box_name">{{ $ap->name }}</h3>
									<span class="testi-box_desig">{{ $ap->designation }}</span>
									<span class="institute">{{ $ap->company_name }}</span>
								</div>
								<div class="testi-box_review"><i class="fa-solid fa-star-sharp"></i><i
										class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
										class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
							</div>
							
						</div>
					</div>
				@endforeach
					
            </div>
        </div>
    </section>
	@endif


    <div data-pos-for=".footer-wrapper" data-sec-pos="bottom-half" style="margin-bottom: -50px;">
        <div class="container">
            <div class="susbcribe-bg background-image"
                data-bg-src="{{ asset('public/front-end/img/bg/subscribe_bg_1.jpg') }}">
                <div class="row align-items-center">
                    <div class="col-xl-8 mb-35 mb-xl-0">
                        <h3 class="text-white fw-semibold mt-n2 mb-0">Interested in Our Service?</h3>
                        <form action="#" class="newsletter-form style2 d-none">
                            <div class="form-group"><input type="text" class="form-control style2"
                                    placeholder="Enter Your Email"> <i class="fa-thin fa-envelope"></i></div>
                            <button type="submit" class="as-btn">Subscribe Now<i
                                    class="fas fa-arrow-right ms-2"></i></button>
                        </form>
                    </div>
                    <div class="col-xl-4 d-none">
                        <div class="ps-xl-5">
                            <h3 class="text-white fw-semibold mt-n2 mb-20">Get In Touch!</h3>
                            <div class="as-social style2">
                                <a href="https://www.facebook.com/">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://www.twitter.com/">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://www.youtube.com/">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 text-center">
                        <a href="{{ url('contact') }}" class="as-btn">contact us<i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	
    <script>
	{{-- dd($serviceAreaIdForPracticeLeftConten) --}}
        var site_url = "{{ url('/') }}";
        var site_route_name = "{{ Request::path() }}";
		
		if ( site_route_name == '/' ||  site_route_name == 'dev' )
		{
			//alert('response');
		// start practice/service tab 
			var defaultServiceId = "{{ !empty($commonData['service_list'][0	]['id']) ? $commonData['service_list'][0]['id'] : 1 }}";;
			findPracticeAreaBesedOnServices(defaultServiceId);
			
			function findPracticeAreaBesedOnServices(serviceId)
			{
				//alert(serviceId);
				//var className = $(this).attr('class'); 
				
				$(".nextprev-button-sets").css('display', 'none');
				$("button").removeClass("active-custom");
				$("#box"+serviceId).addClass("active-custom");
				
				
				$("#myAccordion").html('');
				  
				$('#lod-practice-area').prop('disabled', false);

				if (pagePractice > 1) {
					
					$('.prv-practice-area').prop('disabled', false);
					
				} else {
					
					$('.prv-practice-area').prop('disabled', true);
				}

				$.ajax({
                    url: site_url + "/get-practice-area-based-on-services/"+serviceId,
                    type: "get",
                    datatype: "html",
                    beforeSend: function() {
                        $('.ajax-loading-practice-area').show();
                    }
                })
                .done(function(data) {

                    //$('#lod-practice-area').prop('disabled', true);

					//alert(data.total_count);

                    $('.ajax-loading-practice-area').hide();
                    $("#title-practice-area").html(data.other_info.service_name);
                    $("#description-practice-area").html(data.other_info.service_description);
                    $("#myAccordion").append(data.area_list).hide().fadeIn(1000);;


                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    $('.ajax-practice-area').html("No response from server");
                });
			}
		}
		else{	
			
			var defaultServiceAreaId = '<?=$serviceAreaIdForPracticeLeftConten?>';;
			//alert(defaultServiceAreaId);
			var pagePractice = 1;
			practiceServiceTab(defaultServiceAreaId,pagePractice);
			
			$("#prv-practice-area").click(function() {
				$("#results-practice-area").html('');
				pagePractice--;
				//alert(pagePractice);
				practiceServiceTab(defaultServiceAreaId,pagePractice);
			});

			$("#lod-practice-area").click(function() {
				$("#results-practice-area").html('');
				pagePractice++;
				practiceServiceTab(defaultServiceAreaId,pagePractice);
			});
			
			function practiceServiceTab(defaultServiceAreaId,pagePractice)
			{
				//alert(defaultServiceAreaId);
				//serviceId = 2;
				//var className = $(this).attr('class'); 
				
				$("button").removeClass("active-custom");
				
				if( defaultServiceAreaId == 0 )
				{
					$("#box"+defaultServiceAreaId).addClass("active-custom");
					
				}else{
					$("#box"+defaultServiceAreaId).addClass("active-custom");
				}
				/*// $(".nav-link active").replaceWith("nav-link");
				 //;
				 var val = $("#box"+serviceId).attr("class");
				 $("."+val).removeClass("nav-link")
				 alert(val);
				//alert(classname);*/
				
				$("#results-practice-area").html('');
				  
				$('#lod-practice-area').prop('disabled', false);

				if (pagePractice > 1) {
					$('.prv-practice-area').prop('disabled', false);
				} else {
					$('.prv-practice-area').prop('disabled', true);
				}

				$.ajax({
                    url: site_url + "/portal-practice-area/"+defaultServiceAreaId+"?page=" + pagePractice,
                    type: "get",
                    datatype: "html",
                    beforeSend: function() {
                        $('.ajax-loading-practice-area').show();
                    }
                })
                .done(function(data) {

                    if (data.length == 0) {
                        $('.ajax-loading-practice-area').html("No more records!");
                        $('#lod-practice-area').prop('disabled', true);
                        return;
                    }

					
					if (data.total_count > 10) {
						
						$('.nextprev-button-sets').css('display', 'block');
						
					}else{
						
						$('.nextprev-button-sets').css('display', 'none');
						
					}
					
					
					//alert(data.total_count);
                    var maxPage = data.total_count / 10;
                    if (pagePractice >= maxPage) {

                        $('#lod-practice-area').prop('disabled', true);
				
                    }
					
					//alert(data.total_count);

                    $('.ajax-loading-practice-area').hide();
                    $("#title-practice-area").html(data.service_cover_name);
                    $("#description-practice-area").html(data.service_cover_description);
                    $("#results-practice-area").append(data.info).hide().fadeIn(1000);;


                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    $('.ajax-practice-area').html("No response from server");
                });
			}
		// end practice/service tab
		}
		
		
		
        load_clients();
        // start left  single ongoing activity
        var id = 0;
        ongoing_single(id);

        function ongoing_single(id) {
            $("#results-ongoing-single").html('');
            //alert(id);

            $.ajax({
                    url: site_url + "/portal-ongoing-act-single/" + id,
                    type: "get",
                    datatype: "html",
                    beforeSend: function() {
                        $('.ajax-loading-ongoing-single').show();
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {
                        $('.ajax-loading-ongoing-single').html("No more records!");

                        return;
                    }
                    $('.ajax-loading-ongoing-single').hide();
                    $("#results-ongoing-single").html(data).hide().fadeIn(1000);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    $('.ajax-loading-ongoing-single').html("No more records!");
                });
        }
        // end left  single ongoing activity


        // start right   ongoing activity
        var page = 1;
        $('.prv-ongoing-activity').prop('disabled', true);
        load_more(page);

        /*$(window).scroll(function() {
                      if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                      page++;
                      $("#results").html('');
                      load_more(page);
                      }
                    });*/

        $("#prv-ongoing-activity").click(function() {
            $("#results-ongoing-list").html('');
            page--;
            //alert(page);
            load_more(page);
        });

        $("#lod-ongoing-activity").click(function() {
            $("#results-ongoing-list").html('');
            page++;
            load_more(page);
        });

        function load_more(page) {
		
            $('#lod-ongoing-activity').prop('disabled', false);

            if (page > 1) {
                $('.prv-ongoing-activity').prop('disabled', false);
            } else {
                $('.prv-ongoing-activity').prop('disabled', true);
            }

            $.ajax({
                    url: site_url + "/portal-ongoing-act?page=" + page,
                    type: "get",
                    datatype: "html",
                    beforeSend: function() {
                        $('.ajax-loading-ongoing').show();
                    }
                })
                .done(function(data) {

                    if (data.length == 0) {
                        $('.ajax-loading-ongoing').html("No more records!");
                        $('#lod-ongoing-activity').prop('disabled', true);
                        return;
                    }

					
					
					if (data.total_count < 5) {

                        $('.prv-ongoing-activity').css('display', 'none');
                        $('.lod-ongoing-activity').css('display', 'none');
                    }
					

                    var maxPage = data.total_count / 4;
                    if (page >= maxPage) {

                        $('#lod-ongoing-activity').prop('disabled', true);

                    }


                    $('.ajax-loading-ongoing').hide();
                    $("#results-ongoing-list").append(data.info).hide().fadeIn(1000);;


                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    $('.ajax-loading-ongoing').html("No response from server");
                });
        }
        // end right ongoing activity

        
        

        // start left  single completed project
		var idCompleted = 0;
        completed_single(idCompleted);

        function completed_single(idCompleted) {
            $("#results-completed-single").html('');
           
            $.ajax({
                    url: site_url + "/portal-completed-project-single/" + idCompleted,
                    type: "get",
                    datatype: "html",
                    beforeSend: function() {
                        $('.ajax-loading-completed-single').show();
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {
                        $('.ajax-loading-completed-single').html("No more records!");

                        return;
                    }
                    $('.ajax-loading-completed-single').hide();
                    $("#results-completed-single").html(data).hide().fadeIn(1000);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    $('.ajax-loading-completed-single').html("No response from server");
                });
        }
        // end left  single ongoing activity


        // start right ongoing activity
        var page_com = 1;
        $('.prv-completed-project').prop('disabled', true);
        load_more_completed(page_com);


        $("#prv-completed-project").click(function() {
            $("#results-completed-project-list").html('');
            page_com--;
            //alert(page_com);
            load_more_completed(page_com);
        });

        $("#lod-completed-project").click(function() {
            $("#results-completed-project-list").html('');
            page_com++;
            load_more_completed(page_com);
        });

        function load_more_completed(page_com) {
            $('#lod-completed-project').prop('disabled', false);

            if (page_com > 1) {
                $('.prv-completed-project').prop('disabled', false);
            } else {
                $('.prv-completed-project').prop('disabled', true);
            }

            $.ajax({
                    url: site_url + "/portal-completed-project-list?page=" + page_com,
                    type: "get",
                    datatype: "html",
                    beforeSend: function() {
                        $('.ajax-loading-completed-project').show();
                    }
                })
                .done(function(data) {

                    if (data.length == 0) {
                        $('.ajax-loading-completed-project').html("No more records!");
                        $('#lod-completed-project').prop('disabled', true);
                        return;
                    }
					
					if (data.total_count < 5) {

                        $('.prv-completed-project').css('display', 'none');
                        $('.lod-completed-project').css('display', 'none');
                    }
		

                    var maxPage = data.total_count / 4;
                    if (page_com >= maxPage) {

                        $('#lod-completed-project').prop('disabled', true);

                    }


                    $('.ajax-loading-completed-project').hide();
                    $("#results-completed-project-list").append(data.info).hide().fadeIn(1000);;


                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    $('.ajax-loading-completed-project').html("No response from server");
                });
        }
        // end right ongoing activity
        
        
        // start clients


        function load_clients() {
            //alert('dd');

            $.ajax({
                    url: site_url + "/portal-clients",
                    type: "get",
                    datatype: "html",
                    beforeSend: function() {
                        $('.ajax-loading-client').show();
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {
                        $('.ajax-loading-client').html("No more records!");
                        return;
                    }

                    $('.ajax-loading-client').hide();
                    $("#results-client").append(data);


                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    $('.ajax-loading-client').html("No response from server");
                });
        }
        
    
        
    </script>


@endsection
