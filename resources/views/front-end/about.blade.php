@extends('layouts.app-frontend')


@section('content')
    </div>
    <section class="contact-banner-main"
        style="background: url('{{ url('storage/app/public/page-top-configurations/'.$pageTopData['top_banner_image'])}}') !important;background-size: cover;background-repeat: no-repeat;background-position: center center;">
       <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="about-content-box">
					{{-- dd( $pageTopData['top_banner_image'] ) --}}
                        <p>{{ !empty($pageTopData['top_banner_short_paragraph']) ? $pageTopData['top_banner_short_paragraph'] : ''}}</p>
                    </div>
                    <div class="banner-breadcrumb-main d-none">
                        <div class="breadcrumb-area ">
                            <div class="breadcrumbs-inner">
                                <span class="not-last">
                                    <a href="#">Home</a>
                                </span>
                                <span>
                                    <span class="currnet-link">{{ !empty($pageTopData['page_heading']) ? $pageTopData['page_heading'] : ''}}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<section class="h-0" id="start"></section>
	<section class="risk-mangement-main" >
        <div class="container">
            <div class="row d-none">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <div class="common-title-box">
                        <p>our policies</p>
                        <h2>Value & Risk Managemnet </h2>

                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="risk-img">
                        <img src="{{ asset('storage/app/public/about-info-landing-pages/' . $aboutCoreInfo['feature_image']) }}" alt="" class="img-fluid">
                     
                        <!--<div class="about-counter">
                            <div class="count-number">
                                <span class="counter">25</span>
                                <span class="prefix">+</span>
                            </div>
                            <span class="title">Years Experience</span>
                        </div>-->
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <div class="common-title-box text-start">
                       <!-- <p>our policies</p> -->
                        <h2>About IPTM </h2>

                    </div>
                    <div class="risk-description">
                        @php 
							$aboutFullText = json_decode($aboutCoreInfo['about_text']);
							$aboutTextPara1 = !empty($aboutFullText[0]) ? $aboutFullText[0] : ''; 
							$aboutTextPara2 = !empty($aboutFullText[1]) ? $aboutFullText[1] : ''; 
							$aboutTextPara3 = !empty($aboutFullText[2]) ? $aboutFullText[2] : ''; 
						@endphp
						
						<p class="py-0">
						
							{{ !empty($aboutTextPara1) ? $aboutTextPara1 : '' }}
							
							@if (!empty($aboutTextPara2) )
								<span class="d-block py-2">
                            
							{{ $aboutTextPara2 }} 
							
							@endif
							
							@if (!empty($aboutTextPara3)) 
								</span>
                            
							{{ $aboutTextPara3 }} 
							
							@endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
	

    <section class="h-0" id="mission-vision"></section>
    <section class="mission-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="common-title-box">
                        <!--<p>our statement</p>-->
                        <h2 class="pb-10">Mission & Vission </h2>

                    </div>
                </div>
            </div>
            <div class="row row-25">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="mission-box">
                        <div class="icon-box">
                            <img src="{{ asset('storage/app/public/about-us/' . $aboutOtherInfo['mission_icon']) }}" alt="">
                        </div>
                        <div class="content-box">
                            <h5>MISSION </h5>
                            <p>  {{ !empty($aboutOtherInfo['mission_statement']) ? $aboutOtherInfo['mission_statement'] : '' }}
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="mission-box">
                        <div class="icon-box">
                            <img src="{{ asset('storage/app/public/about-us/' . $aboutOtherInfo['vision_icon']) }}" alt="">
                        </div>
                        <div class="content-box">
                            <h5>VISION </h5>
                            <p>  {{ !empty($aboutOtherInfo['vision_statement']) ? $aboutOtherInfo['vision_statement'] : '' }}
							</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
	
	@if( !empty($aboutOtherInfo['value_risk_policy']) )
    <section class="h-0" id="our-policies"></section>
    <section class="risk-mangement-main" >
        <div class="container">
            <div class="row d-none">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <div class="common-title-box">
                       <!-- <p>our policies</p>-->
                        <h2>Value & Risk Managemnet </h2>

                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="risk-img">
                        <img src="{{ asset('storage/app/public/about-us/' . $aboutOtherInfo['value_risk_icon']) }}" alt="" class="img-fluid">
                        <div class="rocket-wrap">
                            <!--<img src="{{ asset('public/front-end/img/mahbub/business-success.png') }}" alt=""
                                class="spinner">
                            <div class="icon-part">
                                <img src="{{ asset('public/front-end/img/mahbub/rocket.png') }}" alt=""
                                    class="">
                            </div>-->
                        </div>
						{{-- <div class="about-counter">
                            <div class="count-number">
                                <span class="counter">{{ !empty($aboutOtherInfo['total_experience_year']) ? $aboutOtherInfo['total_experience_year'] : '' }}</span>
                                <span class="prefix">+</span>
                            </div>
                            <span class="title">Years Experience</span>
                        </div>--}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 pl-110">
                    <div class="common-title-box text-start">
                        <!--<p>our policies</p>-->
                        <h2 class="pb-10">Value & Risk Managemnet </h2>

                    </div>
                    <div class="risk-description">
                        <p class="my-0">
                            {{ !empty($aboutOtherInfo['value_risk_policy']) ? $aboutOtherInfo['value_risk_policy'] : '' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
	@endif
	
	@if( !empty($aboutOtherInfo['organogram']) )
	<section class="management-main" id="organogram">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                    <div class="common-title-box text-start">
					{{--<p>our managements</p>--}}
                        <h2> Organogram</h2>

                    </div>
                </div>
            </div>
            <div class="row row justify-content-center" >
				
				
				
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-8 " >
                        <div class="management-image">
                           <img src="{{ asset('storage/app/public/about-us/' . $aboutOtherInfo['organogram']) }}" alt="" class="img-fluid">
                        
                        </div>
                </div>
				
            </div>
        </div>
    </section>
	@endif
	
	

	@if( !empty($topManagements) )

    <section class="h-0" id="managements-profile"></section>
    <section class="management-main" >
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                    <div class="common-title-box text-start">
					{{--<p>our managements</p>--}}
                        <h2 class="pb-4"> Our Management</h2>

                    </div>
                </div>
            </div>
            <div class="row row justify-content-center" >
				
				
				@foreach( $topManagements as $topMan)
				
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 " >
                    <div class="management-inner" >
                        <div class="management-image">
                            <img src="{{ asset('storage/app/public/core-teams/' . $topMan['photo']) }}" alt=""
                                class="img-fluid">
                            <a href="#" class="management-details-link"></a>
                        </div>
                        <div class="management-details">
                            <div class="social-icons">

                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#" target="_blank">
                                    <i class="fab fa-behance">
                                    </i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>

                            </div>
                            <h5 class="name" > {{ !empty($topMan['name']) ? $topMan['name'] : '' }}</h5>
                            <div class="designation">{{ !empty($topMan['designation']) ? $topMan['designation'] : '' }}</div>
                            <div class="management-divider divider1"></div>
                            <div class="management-divider divider2"></div>
                        </div>
                        @if( !empty($topMan['other_info']) ) 
						<div class="management-overlay">
							{{ $topMan['other_info']  }}
                        </div>
						@endif
                    </div>
                </div>
				@endforeach
				
            </div>
        </div>
    </section>
	@endif
	
	@if( !empty($advisorsPanel) )
    <section class="h-0" id="advisors-panel"></section>
    <section class="management-main" >
        <div class="container">
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                    <div class="common-title-box text-start">
					{{--<p>our advisors</p>--}}
                        <h2> advisors panel</h2>

                    </div>
                </div>
            </div>
			
           <div class="row row justify-content-center" >
			
                 @foreach( $advisorsPanel as $adP)
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="management-inner">
                        <div class="management-image">
                            <img src="{{ asset('storage/app/public/core-teams/' . $adP['photo']) }}" alt=""
                                class="img-fluid">
                            <a href="#" class="management-details-link"></a>
                        </div>
                        <div class="management-details">
                            <div class="social-icons">

                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#" target="_blank">
                                    <i class="fab fa-behance">
                                    </i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>

                            </div>
                            <h5 class="name" > {{ !empty($adP['name']) ? $adP['name'] : '' }}</h5>
                            <div class="designation">{{ !empty($adP['designation']) ? $adP['designation'] : '' }}</div>
                            <div class="management-divider divider1"></div>
                            <div class="management-divider divider2"></div>
                        </div>
                        @if( !empty($adP['other_info']) ) 
						<div class="management-overlay">
							{{ $adP['other_info']  }}
                        </div>
						@endif
                    </div>
                </div>
				@endforeach
				
            </div>
        </div>
    </section>
	@endif
	
	
	@if( !empty($coreTeamMembers) )
    <section class="h-0" id="core-team"></section>
    <section class="management-main footer-space" >
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="text-align:center">
                    <div class="common-title-box text-start">
					{{--<p>our team</p>--}}
                        <h2 class="pb-4">Meet Our Team </h2>

                    </div>
                </div>
            </div>
            <div class="row">

                @foreach( $coreTeamMembers as $coreT)
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="management-inner">
                        <div class="management-image">
                            <img src="{{ asset('storage/app/public/core-teams/' . $coreT['photo']) }}" alt=""
                                class="img-fluid">
                            <a href="#" class="management-details-link"></a>
                        </div>
                        <div class="management-details">
                            <div class="social-icons">

                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#" target="_blank">
                                    <i class="fab fa-behance">
                                    </i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>

                            </div>
                            <h5 class="name" > {{ !empty($coreT['name']) ? $coreT['name'] : '' }}</h5>
                            <div class="designation">{{ !empty($coreT['designation']) ? $coreT['designation'] : '' }}</div>
                            <div class="management-divider divider1"></div>
                            <div class="management-divider divider2"></div>
                        </div>
                        @if( !empty($coreT['other_info']) ) 
						<div class="management-overlay">
							{{ $coreT['other_info']  }}
                        </div>
						@endif
                    </div>
                </div>
				@endforeach
				
            </div>
			
			
        </div>
    </section>
	@endif
	
	
@endsection
