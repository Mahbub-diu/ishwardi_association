@extends('layouts.app-frontend')
 
@section('content')
   <section class="contact-banner-main"
        style="background: url({{ url('storage/app/public/page-top-configurations/'.$pageTopData['top_banner_image'])}}) !important;background-size: cover;background-repeat: no-repeat;background-position: center center;">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="about-content-box">
                        <p>{{ !empty($pageTopData['top_banner_short_paragraph']) ? $pageTopData['top_banner_short_paragraph'] : ''}}</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="news-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                    <div class="common-title-box">
                        <!--<p>news</p>-->
                        <h2>{{ !empty($pageTopData['page_heading']) ? $pageTopData['page_heading'] : ''}}</h2>

                    </div>
                </div>
            </div>
			
			@if( !empty($newstLastImageName ) || !empty($eventLastImageName)  )
			 <div class="row row justify-content-center" >
					
					@if( !empty($newstLastImageName )  )
						@php
							$newsImageName = array_values($newstLastImageName);
							$newsImageName = $newsImageName[0];
						@endphp
						
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						
							<a href="{{ url('photo-gallery/news') }}">
								<div class="blog-card"  style="max-height:260px">
									<div class="blog-img"  style="height:200px">
											<img src="{{ asset('storage/app/public/single-updates/'.$newsImageName) }}"
											alt="">
										</div>
										
										<div class="blog-content" >
										
										<h4 class="po-color blog-title text-center" style="font-size:16px">
										 <strong>News </strong>
										 <br/> <span style="color:#f89939"> (Total Images: {{$totalNewstData}})  </span>
										</h4>
									</div>
								</div>
							</a>
						</div>
					@endif
					
					@if( !empty($eventLastImageName)   )
						@php
							$eventImageName = array_values($eventLastImageName);
							$eventImageName = $eventImageName[0];
						@endphp
							<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							
								<a href="{{ url('photo-gallery/event') }}">
									<div class="blog-card"  style="max-height:260px">
										<div class="blog-img"  style="height:200px">
												<img src="{{ asset('storage/app/public/single-updates/'.$eventImageName) }}"
													alt="">
											</div>
											
											<div class="blog-content" >
												<h4 class="po-color blog-title text-center" style="font-size:16px">
												 <strong>Event </strong>
												 <br/><span style="color:#f89939"> (Total Images: {{$totalEventData}}) </span>
												</h4>
										
											</div>
									</div>
								</a>

							</div>
					@endif
					
            </div>
			@endif
			
			
			@if( !empty($servicesFirstData ) || !empty($servicesSecondData)  || !empty($servicesThirdData)   || !empty($servicesFourData)   )
            <div class="row row justify-content-center">
			
				@php
					$imageName = '';
				@endphp
				
				@foreach( $commonData['service_list'] as $sName )
					
					@if($sName['id'] == 1)
						@php
							$imageName = array_values($servicesFirstData);
							$imageName = $imageName[0];
							$totalServicesData = $totalServicesFirstData;
							
						@endphp
						
					@elseif($sName['id'] == 2)
						@php
							$imageName = array_values($servicesSecondData);
							$imageName = $imageName[0];
							$totalServicesData = $totalServicesSecondData;
						@endphp
						
					@elseif($sName['id'] == 3)
						@php
							$imageName = array_values($servicesThirdData);
							$imageName = $imageName[0];
							$totalServicesData = $totalServicesThirdData;
						@endphp
						
					@elseif($sName['id'] == 4)
						@php
							$imageName = array_values($servicesFourData);
							$imageName = $imageName[0];
							$totalServicesData = $totalServicesFourData;
						@endphp	
					@endif
					
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							
						<a href="{{ url('photo-gallery/'.$sName['id']) }}">
							<div class="blog-card"  style="max-height:280px">
									<div class="blog-img"  style="height:200px">
										<img src="{{ asset('storage/app/public/ongoing-activities/'. $imageName) }}"
												alt="">
									</div>
									
									<div class="blog-content" >
										<h4 class="po-color blog-title text-center" style="font-size:16px">
										 <strong>{{ $sName['name'] }} </strong><br/> 
										 <span style="color:#f89939">(Total Images: {{$totalServicesData}})</span>
										</h4>
									</div>
							</div>
						</a>
					</div>
				@endforeach
				
            </div>
			@endif
			
			

        </div>
    </section>
	
	
@endsection
