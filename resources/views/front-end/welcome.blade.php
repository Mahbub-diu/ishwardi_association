@extends('layouts.app-frontend')




@section('content')
    <!-- home slider start from here  -->
    <section class="home-slider-main">
        <div class="swiper home-slider">

            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-bg" data-background="{{ asset('public/front-end/img/new-home/banner.webp') }}">
                        <div class="slider-content-box">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="contant-wrapper">
                                            <div class="content-inner-box">
                                                <h2> <span>Ishwardi</span> together, moving forward.</h2>

                                                <p>
                                                    Uniting the Ishwardi community through collaboration and shared vision.
                                                    <br>
                                                    Together, we create opportunities, empower residents, and build a
                                                    brighter future.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="swiper-slide video-slide" data-swiper-autoplay="">

                    <video autoplay muted loop class="swiper-video">
                        <source src="{{ asset('public/front-end/img/new-home/home-slider-video.mp4') }}" type="video/mp4">
                    </video>

                    <div class="slider-content-box">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="contant-wrapper">
                                        <div class="content-inner-box">
                                            <h2>Uniting <span>Ishwardi</span>, inspiring change.</h2>

                                            <p>
                                                Ishwardi Association connects people, ideas, and resources to drive
                                                positive change. <br>
                                                Our mission is to strengthen the community and support growth for all.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>



    <!-- home slider ends here  -->


    @if (!$singleUpdate->isEmpty())
        <Section>
            <div class="container mt-3">
                <div class="news position-relative flex-items-center">
                    <div class="position-absolute top-50 translate-middle-y p-2 py-3 ps-3 news-title-dynamic z-index-50">
                        Latest News
                    </div>
                    <div class="scrolling-list mx-5">
                        <ul class='flex-items-center py-2 mb-0'>
                            @foreach ($singleUpdate as $sUpdate)
                                <li class='pr-8'>
                                    <a class="news-link"
                                        href="{{ url('news-event-details/' . $sUpdate->id) }}">{{ $sUpdate->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="scrolling-list">
                        <!-- <ul class="flex-items-center py-2 mb-0">
                                                                                                                <li class="pr-12">Your list item content here</li>
                                                                                                            </ul> -->
                    </div>
                </div>
            </div>
        </Section>
    @endif

    <div class="space" id="about-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  col-xl-6">
                    <div class="img-box1">
                        <img class="w-100"
                            src="{{ asset('storage/app/public/about-info-landing-pages/' . $aboutLandingData[0]['feature_image']) }}"
                            alt="">
                        @if ($serviceName == 'Institute of Professional Training & Management (IPTM)')
                            <a href="https://sqccertification.com/cert/Verify" class="counter-box text-center"
                                target="_blank">
                                <img class="" style="" src="{{ asset('public/front-end/img/iso-logo.png') }}"
                                    alt="">
                                {{-- <span style="color: #a24943; display: block;" class="counter-text">Number: BDQ155I155</span> --}}
                            </a>
                        @endif

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  col-xl-6 hero-content">
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

                        @if (!empty($aboutTextPara2))
                            <br /><br />

                            {{ $aboutTextPara2 }}
                        @endif

                        @if (!empty($aboutTextPara3))
                            <br /><br />

                            {{ $aboutTextPara3 }}
                        @endif
                        <!--<a href="#">Read more...</a>-->
                    </p>
                    </p>

                    @if (!empty($aboutLandingDataBulletPoint))
                        <!--<div class="checklist mb-45">
                                                                                                                                    <ul>
                                                                                                                                        @if (!empty($aboutLandingDataBulletPoint[0]))
    <li>{{ $aboutLandingDataBulletPoint[0] }}</li>
    @endif

                                                                                                                                        @if (!empty($aboutLandingDataBulletPoint[1]))
    <li>{{ $aboutLandingDataBulletPoint[1] }}</li>
    @endif

                                                                                                                                        @if (!empty($aboutLandingDataBulletPoint[2]))
    <li>{{ $aboutLandingDataBulletPoint[2] }}</li>
    @endif

                                                                                                                                        @if (!empty($aboutLandingDataBulletPoint[3]))
    <li>{{ $aboutLandingDataBulletPoint[3] }}</li>
    @endif
                                                                                                                                    </ul>
                                                                                                                                </div>-->
                    @endif
                    <!--<a href="" class="as-btn">Get More Info</a>-->
                </div>
            </div>
        </div>
        {{-- <div class="shape-mockup jump z-index3 d-none d-sm-block" data-top="30%" data-left="11%"><img
                src="{{ asset('public/front-end/img/shape/circle_1.png') }}" alt=""></div> --}}
        {{-- <div class="shape-mockup jump-reverse d-none d-xl-block" data-bottom="30%" data-left="4%"><img
                src="{{ asset('public/front-end/img/shape/circle_2.png') }}" alt=""></div> --}}
        <div class="shape-mockup" data-bottom="-9.5%" data-right="0">
            <img src="{{ asset('public/front-end/img/shape/line_1.png') }}" alt="">
        </div>
    </div>


    @if ($serviceName == 'Institute of Professional Training & Management (IPTM)' || $totalServiceCoverArea > 0)
        <div class="space-bottom practice-area-main" data-bg-src="{{ asset('public/front-end/img/bg/why_bg_1.png') }}">
            <div class="container">

                <div class="title-area text-center mb-45">
                    <!--<h2 class="sec-title fw-semibold">Our Practice Area</h2>-->
                    @if ($serviceName == 'Institute of Professional Training & Management (IPTM)')
                        <h2 class="sec-title fw-semibold" style="color:#f89939">Core Service Area</h2>
                    @else
                        <h2 class="sec-title fw-semibold" style="color:#f89939">Delivered Services </h2>
                    @endif
                </div>
                <div class="row align-items-center ">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 order-lg-1 order-2">
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="">

                                <div class="title-area mb-25">
                                    <h3 class="sec-title fw-semibold" id="title-practice-area">

                                    </h3>
                                </div>

                                <p class="mt-n2 mb-25" id="description-practice-area">

                                </p>

                                <div class="checklist mb-30">



                                    <div class="" id="results-practice-area" style="padding:5px;">

                                        <div class="ajax-loading-service-area" style="text-align: center;">
                                            <img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />
                                        </div>

                                    </div>

                                    <div class="accordion" id="myAccordion">

                                        <div class="ajax-loading-service-cover-area" style="text-align: center;">
                                            <img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />
                                        </div>
                                    </div>



                                </div>

                                <div class="nextprev-button-sets" style="margin-top: -25px;">
                                    <span style="font-size:12px;float:left">Showing <span id="start-pagination">1</span>
                                        to <span id="end-pagination">8</span> of <span id="total-data">55</span> results
                                    </span>

                                    <span style="float:right">
                                        <button type="button" class="btn btn-warning me-3 prv-practice-area"
                                            id="prv-practice-area">
                                            <i class="ri-arrow-left-s-line"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning lod-practice-area"
                                            id="lod-practice-area">
                                            <i class="ri-arrow-right-s-line"></i>
                                        </button>
                                    </span>

                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 order-lg-2 order-1">

                        @if ($serviceName == 'Institute of Professional Training & Management (IPTM)')


                            <div class="custom-tabs four-tabs">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    @if (!empty($commonData['service_list']))
                                        @foreach ($commonData['service_list'] as $service)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="box{{ $service['id'] }}"
                                                    onclick="findPracticeAreaBesedOnServices({{ $service['id'] }})">

                                                    <div class="card">
                                                        <img src="{{ asset('storage/app/public/services/' . $service['icon']) }}"
                                                            alt="" class="card-img-top">
                                                        {{-- <div class="card-body">
													<h3 class="card-title">{{ $service['name'] }}</h3>
												</div> --}}
                                                    </div>

                                                </button>
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        @else
                            <div class="custom-tabs six-tabs ">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    @foreach ($serviceCoverArea as $serAreaName)
                                        @php $areaIcon = !empty($serviceCoverAreaList[$serAreaName['id']]['area_icon']) ? $serviceCoverAreaList[$serAreaName['id']]['area_icon'] : ''; @endphp

                                        <li class="nav-item" role="presentation" style="margin-bottom:25px">
                                            <button class="nav-link active-custom"
                                                id="box{{ !empty($serAreaName['id']) ? $serAreaName['id'] : '' }}"
                                                onclick="practiceServiceTab({{ !empty($serAreaName['id']) ? $serAreaName['id'] : 0 }},1)">
                                                <div class="feature-card-wrap">
                                                    <div class="feature-card">
                                                        <div class="feature-card_icon"><img
                                                                src="{{ asset('storage/app/public/service-cover-areas/' . $areaIcon) }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </li>
                                    @endforeach

                                </ul>


                            </div>




                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if ($totalOngoingActivities > 0)
        <section class="_space-top space-extra-bottom ongoing-activities">
            <div class="container">
                <div class="title-area text-center">
                    <h2 class="sec-title fw-semibold" style="color:#f89939">Ongoing Projects</h2>
                </div>


                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 order-lg-1 order-2">
                        <div class="slider-for">
                            <div class="wrapper-ongoing-single">

                                <ul id="results-ongoing-single"></ul>
                                <div class="ajax-loading-ongoing-single" style="text-align: center;">
                                    <img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 order-lg-2 order-1">

                        <div class="right-loader">
                            <span id="results-ongoing-list"></span>
                            <div class="ajax-loading-ongoing" style="text-align: center;">
                                <img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />
                            </div>

                            <span id="page-counting-text-ongoing">
                                <span style="font-size:12px;float:left">Showing <span
                                        id="start-pagination-ongoing">1</span> to <span
                                        id="end-pagination-ongoing"></span> of <span
                                        id="total-data-ongoing">{{ $totalOngoingActivities }}</span> results </span>
                            </span>

                            <button type="button" id="lod-ongoing-activity"
                                class="btn btn-warning lod-ongoing-activity">
                                <i class="ri-arrow-down-s-line"></i>
                            </button>

                            <button type="button" id="prv-ongoing-activity"
                                class="btn btn-warning prv-ongoing-activity">
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
                                <h2 class="counter-card_number"><span class="counter-number"
                                        style="font-size:35px">{{ $totalCompletedProject + $totalOngoingActivities }}</span>
                                </h2>
                                <span class="counter-card_text"><strong>Total Projects</strong></span>
                            </div>
                        </div>

                        <div class="counter-card-wrap">
                            <div class="counter-card">
                                <h2 class="counter-card_number"><span class="counter-number"
                                        style="font-size:35px">{{ $totalCompletedProject }}</span></h2>
                                <span class="counter-card_text"><strong>Completed Projects</strong></span>
                            </div>
                        </div>


                        <div class="counter-card-wrap">
                            <div class="counter-card">
                                <h2 class="counter-card_number"><span class="counter-number"
                                        style="font-size:35px">{{ $totalOngoingActivities }}</span>
                                </h2>
                                <span class="counter-card_text"><strong>Ongoing Projects</strong></span>
                            </div>
                        </div>

                        <div class="counter-card-wrap">
                            <div class="counter-card">
                                <h2 class="counter-card_number"><span class="counter-number"
                                        style="font-size:35px">{{ $totalourClient }}</span></h2>
                                <span class="counter-card_text"><strong>Total Clients & Partners</strong></span>
                            </div>
                        </div>


                        <div class="counter-card-wrap">
                            <div class="counter-card">
                                <h2 class="counter-card_number"><span class="counter-number"
                                        style="font-size:35px">{{ $totalourParticipates }}</span></h2>
                                <span class="counter-card_text"><strong>Total Participates</strong></span>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>


    @if ($totalCompletedProject > 0)
        <section class="_space-top space-extra-bottom ongoing-activities myp-30">
            <div class="container">
                <div class="title-area text-center">
                    <h2 class="sec-title fw-semibold" style="color:#f89939">Completed Projects</h2>
                </div>


                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 order-lg-1 order-2">
                        <div class="slider-for">
                            <div class="wrapper-completed-single">

                                <ul id="results-completed-single"></ul>
                                <div class="ajax-loading-completed-single" style="text-align: center;">
                                    <img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 order-lg-2 order-1">

                        <div class="right-loader">
                            <span id="results-completed-project-list"></span>
                            <div class="ajax-loading-completed-project" style="text-align: center;">
                                <img src="{{ asset('public/front-end/img/loader.gif') }}" width="70" />
                            </div>

                            <span id="page-counting-text-completed">
                                <span style="font-size:12px;float:left">Showing <span
                                        id="start-pagination-completed">1</span> to <span
                                        id="end-pagination-completed"></span> of <span
                                        id="total-data-completed">{{ $totalCompletedProject }}</span> results </span>
                            </span>

                            <button type="button" id="lod-completed-project"
                                class="btn btn-warning lod-completed-project">
                                <i class="ri-arrow-down-s-line"></i>
                            </button>

                            <button type="button" id="prv-completed-project"
                                class="btn btn-warning prv-completed-project">
                                <i class="ri-arrow-up-s-line"></i>
                            </button>
                        </div>

                    </div>


                </div>
            </div>
        </section>
    @endif



    @if ($totalSingle > 0)
        {{-- <section class="space _bg-smoke events-slider-main">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title fw-medium" style="color:#f89939">Every Single Updates</h2>
            </div>

            <div class="row">


					@foreach ($singleUpdate as $sValue)
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<div class="blog-card">
								<div class="blog-img"><img src="{{ asset('storage/app/public/single-updates/' . $sValue->feature_image) }}"
										alt=""></div>
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

    </section> --}}
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

                                    <img src="{{ asset('storage/app/public/client_logo/' . $client->client_logo) }}"
                                        alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            @if ($totalourClient > 6)
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


    @if ($totalAppreciations > 0)
        <section class="overflow-hidden bg-white space appreciations-slider-main">
            <div class="container">
                <div class="title-area text-center">
                    <h2 class="sec-title fw-medium">Appreciations</h2>
                </div>
                <div class="row appreciations-slider">


                    @foreach ($appreciations as $ap)
                        <div class="col-lg-6">
                            <div class="testi-box">

                                <div class="testi-box_content">
                                    <div class="testi-box_img"><img
                                            src="{{ asset('storage/app/public/appreciations/' . $ap->photo) }}"
                                            alt="">
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
                                            class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i>
                                    </div>
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
                        <a href="{{ url('contact') }}" class="as-btn">contact us<i
                                class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        {{-- dd($serviceAreaIdForPracticeLeftConten) --}}
        var site_url = "{{ url('/') }}";
        var site_route_name = "{{ Request::path() }}";

        if (site_route_name == '/' || site_route_name == 'dev') {
            //alert('response');
            // start practice/service tab
            var defaultServiceId =
                "{{ !empty($commonData['service_list'][0]['id']) ? $commonData['service_list'][0]['id'] : 1 }}";
            findPracticeAreaBesedOnServices(defaultServiceId);

            function findPracticeAreaBesedOnServices(serviceId) {
                //alert(serviceId);
                //var className = $(this).attr('class');

                $(".nextprev-button-sets").css('display', 'none');
                $("button").removeClass("active-custom");
                $("#box" + serviceId).addClass("active-custom");


                $("#myAccordion").html('');

                $('#lod-practice-area').prop('disabled', false);

                if (pagePractice > 1) {

                    $('.prv-practice-area').prop('disabled', false);

                } else {

                    $('.prv-practice-area').prop('disabled', true);
                }

                $.ajax({
                        url: site_url + "/get-practice-area-based-on-services/" + serviceId,
                        type: "get",
                        datatype: "html",
                        beforeSend: function() {
                            $('.ajax-loading-service-area').show();
                        }
                    })
                    .done(function(data) {

                        //$('#lod-practice-area').prop('disabled', true);

                        //alert(data.total_count);

                        $('.ajax-loading-service-area').hide();
                        $("#title-practice-area").html(data.other_info.service_name);
                        $("#description-practice-area").html(data.other_info.service_description);
                        $("#myAccordion").append(data.area_list).hide().fadeIn(1000);;


                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        $('.ajax-practice-area').html("No response from server");
                    });
            }
        } else {

            var defaultServiceAreaId = '<?= $serviceAreaIdForPracticeLeftConten ?>';;
            //alert(defaultServiceAreaId);
            var gServiceAreaId = 0;
            var gPageNumber = 0;

            var pagePractice = 1;
            practiceServiceTab(defaultServiceAreaId, pagePractice);



            function practiceServiceTab(serviceAreaId, pagePractice) {

                gServiceAreaId = serviceAreaId;
                gPageNumber = pagePractice;
                //alert(defaultServiceAreaId);
                //serviceId = 2;
                //var className = $(this).attr('class');

                $("button").removeClass("active-custom");

                if (serviceAreaId == 0) {
                    $("#box" + serviceAreaId).addClass("active-custom");

                } else {
                    $("#box" + serviceAreaId).addClass("active-custom");
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
                        url: site_url + "/portal-practice-area/" + serviceAreaId + "?page=" + pagePractice,
                        type: "get",
                        datatype: "html",
                        beforeSend: function() {
                            $('.ajax-loading-service-cover-area').show();
                        }
                    })
                    .done(function(data) {


                        var paginateLimitValue = 8;


                        if (data.total_count > paginateLimitValue + 1) {

                            if (pagePractice == 1) {

                                $('#start-pagination').html(1);
                            } else if (pagePractice > 1) {

                                var startPagi = (pagePractice * paginateLimitValue);
                                var startPagi = (startPagi - paginateLimitValue) + 1;

                                $('#start-pagination').html(startPagi);
                            }
                            $('#end-pagination').html(((pagePractice - 1) * paginateLimitValue) + data.info.length);
                            $('#total-data').html(data.total_count);

                            $('.nextprev-button-sets').css('display', 'block');


                        } else {

                            $('.nextprev-button-sets').css('display', 'none');

                        }


                        //alert(data.total_count);
                        var maxPage = data.total_count / paginateLimitValue;
                        if (pagePractice >= maxPage) {

                            $('#lod-practice-area').prop('disabled', true);

                        }

                        //alert(data.total_count);

                        $('.ajax-loading-service-area').hide();
                        $('.ajax-loading-service-cover-area').hide();
                        $("#title-practice-area").html(data.service_cover_name);
                        $("#description-practice-area").html(data.service_cover_description);
                        $("#results-practice-area").append(data.info).hide().fadeIn(1000);;


                    })

                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        $('.ajax-practice-area').html("No response from server");
                    });
            }


            $("#prv-practice-area").click(function() {
                $("#results-practice-area").html('');
                gPageNumber--;
                //alert(pagePractice);
                practiceServiceTab(gServiceAreaId, gPageNumber);
            });

            $("#lod-practice-area").click(function() {
                $("#results-practice-area").html('');
                gPageNumber++;
                practiceServiceTab(gServiceAreaId, gPageNumber);
            });
            // end practice/service tab
        }



        load_clients();
        // start left  single ongoing activity
        var id = 0;
        ongoing_single(id);

        function ongoing_single(id) {

            $("#results-ongoing-single").html('');

            $(".single-slide").removeClass('active-custom-ongoing');
            $("#ongoing-" + id).addClass('active-custom-ongoing');

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


                    $("#results-ongoing-single").html(data.info).hide().fadeIn(1000);

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


        //var defaultLastOngoingId = "{{ !empty($commonData['service_list'][0]['id']) ? $commonData['service_list'][0]['id'] : 1 }}";


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

                    var paginateLimitValueOngoing = 4;


                    if (data.total_count > paginateLimitValueOngoing) {

                        if (page == 1) {

                            $('#start-pagination-ongoing').html(1);
                        } else if (page > 1) {

                            var startPagi = (page * paginateLimitValueOngoing);
                            var startPagi = (startPagi - paginateLimitValueOngoing) + 1;

                            $('#start-pagination-ongoing').html(startPagi);
                        }
                        $('#end-pagination-ongoing').html(((page - 1) * paginateLimitValueOngoing) + data.info.length);
                        //$('#total-data-ongoing').html(data.total_count);

                        $('#page-counting-text-ongoing').css('display', 'block');


                    } else {

                        $('#page-counting-text-ongoing').css('display', 'none');

                    }

                    /*if (data.length == 0) {
                            $('.ajax-loading-ongoing').html("No more records!");
                            $('#lod-ongoing-activity').prop('disabled', true);
                            return;
                        }*/



                    if (data.total_count < paginateLimitValueOngoing + 1) {

                        $('.prv-ongoing-activity').css('display', 'none');
                        $('.lod-ongoing-activity').css('display', 'none');
                    }


                    var maxPage = data.total_count / paginateLimitValueOngoing;
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
            $(".single-slide").removeClass('active-custom-completed');
            $("#completed-" + idCompleted).addClass('active-custom-completed');

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
        // end left  single completed activity


        // start right completed activity
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

                    var paginateLimitValueCompleted = 4;


                    if (data.total_count > paginateLimitValueCompleted) {

                        if (page_com == 1) {

                            $('#start-pagination-completed').html(1);
                        } else if (page_com > 1) {

                            var startPagi = (page_com * paginateLimitValueCompleted);
                            var startPagi = (startPagi - paginateLimitValueCompleted) + 1;

                            $('#start-pagination-completed').html(startPagi);
                        }
                        $('#end-pagination-completed').html(((page_com - 1) * paginateLimitValueCompleted) + data.info
                            .length);
                        //$('#total-data-completed').html(data.total_count);

                        $('#page-counting-text-completed').css('display', 'block');


                    } else {

                        $('#page-counting-text-completed').css('display', 'none');

                    }




                    /*if (data.length == 0) {
                            $('.ajax-loading-completed-project').html("No more records!");
                            $('#lod-completed-project').prop('disabled', true);
                            return;
                        }*/

                    if (data.total_count < paginateLimitValueCompleted + 1) {


                        $('.prv-completed-project').css('display', 'none');
                        $('.lod-completed-project').css('display', 'none');
                    }


                    var maxPage = data.total_count / paginateLimitValueCompleted;
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
@endpush
