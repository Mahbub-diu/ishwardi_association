<!doctype html>
<html dir="ltr" class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Institute of Professional Training &amp; Management (IPTM)</title>
    <meta name="author" content="NBT">
    <meta name="description" content="Institute of Professional Training &amp; Management (IPTM)">
    <meta name="keywords" content="Institute of Professional Training &amp; Management (IPTM)">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo.svg')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&amp;family=Jost:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/app.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/fonts/remixicon/remixicon.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/slick/slick.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('public/front-end/scss/lc_lightbox.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/scss/mahbub-style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/scss/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/scss/rony-style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        /*.wrapper>ul#results li {
   margin-bottom: 2px;
   background: #e2e2e2;
   padding: 20px;
   list-style: none;
  }

  .ajax-loading {
   text-align: center;
  }
  */

        .loader2 {

            width: 1em;
            height: 1em;
            border-radius: 50%;
            position: relative;
            text-indent: -9999em;
            animation: mulShdSpin 1.1s infinite ease;
            transform: translateZ(0);
            font-size: 8px;
            margin-left: 20px;
        }

        @keyframes mulShdSpin {

            0%,
            100% {
                box-shadow: 0em -2.6em 0em 0em #ffffff, 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.5), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7);
            }

            12.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.7), 1.8em -1.8em 0 0em #ffffff, 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5);
            }

            25% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.5), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7), 2.5em 0em 0 0em #ffffff, 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }

            37.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5), 2.5em 0em 0 0em rgba(255, 255, 255, 0.7), 1.75em 1.75em 0 0em #ffffff, 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }

            50% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.5), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.7), 0em 2.5em 0 0em #ffffff, -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }

            62.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.5), 0em 2.5em 0 0em rgba(255, 255, 255, 0.7), -1.8em 1.8em 0 0em #ffffff, -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }

            75% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.5), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.7), -2.6em 0em 0 0em #ffffff, -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }

            87.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.5), -2.6em 0em 0 0em rgba(255, 255, 255, 0.7), -1.8em -1.8em 0 0em #ffffff;
            }
        }

        .active-custom {
            border: 1px solid #f89939 !important;
            border-radius: 4px !important;
            box-shadow: 1px 3px 9px 0px !important
        }

        .active-custom-ongoing {
            border: 1px solid #f89939 !important;
            border-radius: 4px !important;
            box-shadow: 1px 3px 9px 0px !important
        }

        .active-custom-completed {
            border: 1px solid #f89939 !important;
            border-radius: 4px !important;
            box-shadow: 1px 3px 9px 0px !important
        }
    </style>

    <!-- start toast -->
    <!-- Not Mandatory for this project<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- end toast -->

</head>

<body>
    <!--<div class="preloader">
        <div class="preloader-inner">
            <span class="loader">

            </span>
        </div>
    </div>-->

    <div class="as-menu-wrapper">
        <div class="as-menu-area text-center">
            <button class="as-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('storage/app/public/services/' . $commonData['default_info']['icon']) }}"
                        width="90" alt="IPTM">
                </a>
            </div>
            <div class="as-mobile-menu">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>

                    <li class="menu-item-has-children"><a href="#">who we are</a>
                        <ul class="sub-menu">
                            <li>
                                <a class="" href="{{ url('about-us-f#') }}">About IPTM</a>
                            </li>
                            <li>
                                <a class=""href="{{ url('about-us-f#mission-vision') }}">Mission
                                    & Vision Statement</a>
                            </li>
                            <li>
                                <a class="" href="{{ url('about-us-f#our-policies') }}">Values
                                    & Risk Management Policy</a>
                            </li>
                            <li>
                                <a class="" href="{{ url('about-us-f#managements-profile') }}">Management
                                    Profile</a>
                            </li>
                            <li>
                                <a class="" href="{{ url('about-us-f#core-team') }}">Core
                                    Team</a>
                            </li>
                            <li>
                                <a class="" href="{{ url('about-us-f#advisors-panel') }}">Advisors</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Services</a>
                        <ul class="sub-menu">
                            @if (!empty($commonData['service_list']))
                                @foreach ($commonData['service_list'] as $sName)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ url($sName['route']) }}">{{ $sName['name'] }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>

                    <li class="menu-item-has-children">
                        <a href="#">projects</a>
                        <ul class="sub-menu">

                            <li>
                                <a href="#"> completed projects</a>
                                <ul>
                                    @if (!empty($commonData['service_list']))
                                        @foreach ($commonData['service_list'] as $sName)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('completed-project') . '/' . $sName['id'] }}">{{ $sName['name'] }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li>
                                <a href="#"> ongoing projects</a>
                                <ul>
                                    @if (!empty($commonData['service_list']))
                                        @foreach ($commonData['service_list'] as $sName)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('ongoing-project') . '/' . $sName['id'] }}">{{ $sName['name'] }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li><a href="{{ url('our-client') }}"> Clients</a></li>
                    <li><a href="{{ url('news-event') }}">News & Events </a></li>
                    {{-- <li><a href="{{ url('events') }}">Events</a></li> --}}
                    <li><a href="{{ url('photo-gallery') }}">Gallery</a></li>
                    <li><a href="{{ url('career') }}">Career</a></li>
                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <header class="as-header header-layout3">
        <div class="header-top border-b-1">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li><i class="fal fa-phone"></i><a href="tel:+256214203215">
                                        {{ !empty($commonData['contant_info'][0]['mobile_no']) ? $commonData['contant_info'][0]['mobile_no'] : '' }}
                                    </a></li>
                                <li class="d-non d-xl-inline-block"><i
                                        class="fa-regular fa-envelope"></i>{{ !empty($commonData['contant_info'][0]['email']) ? $commonData['contant_info'][0]['email'] : '' }}
                                </li>
                                <li><i
                                        class="fal fa-clock"></i>{{ !empty($commonData['contant_info'][0]['office_hour']) ? $commonData['contant_info'][0]['office_hour'] : '' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-links">
                            <ul class="icons">
                                <li>
                                    <div class="header-social ">
                                        @if (!empty($commonData['contant_info'][0]['facebook']))
                                            <a href="{{ $commonData['contant_info'][0]['facebook'] }}"
                                                target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        @endif

                                        @if (!empty($commonData['contant_info'][0]['linkedin']))
                                            <a href="{{ $commonData['contant_info'][0]['linkedin'] }}"
                                                target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        @endif

                                        @if (!empty($commonData['contant_info'][0]['twiter']))
                                            <a href="{{ $commonData['contant_info'][0]['twiter'] }}"
                                                target="_blank"><i class="fab fa-twitter"></i></a>
                                        @endif

                                        @if (!empty($commonData['contant_info'][0]['youtube']))
                                            <a href="{{ $commonData['contant_info'][0]['youtube'] }}"
                                                target="_blank"><i class="fab fa-youtube"></i></a>
                                        @endif
                                    </div>
                                </li>
                                <li class="d-lg-none"><i
                                        class="fal fa-clock"></i>{{ !empty($commonData['contant_info'][0]['office_hour']) ? $commonData['contant_info'][0]['office_hour'] : '' }}
                                </li>
                                <!-- <li><i class="fas fa-user"></i><a href="{{ url('login') }}"
                                        target="_blank">Login</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-top d-lg-none">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-non d-lg-none">
                        <div class="header-links">
                            <ul>
                                <li><i class="fal fa-phone"></i><a href="tel:+256214203215">
                                        {{ !empty($commonData['contant_info'][0]['mobile_no']) ? $commonData['contant_info'][0]['mobile_no'] : '' }}
                                    </a></li>
                                <li class="d-non d-xl-inline-block"><i
                                        class="fa-regular fa-envelope"></i>{{ !empty($commonData['contant_info'][0]['email']) ? $commonData['contant_info'][0]['email'] : '' }}
                                </li>
                                <!-- <li><i
                                        class="fal fa-clock"></i>{{ !empty($commonData['contant_info'][0]['office_hour']) ? $commonData['contant_info'][0]['office_hour'] : '' }}
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-auto">
                        <div class="header-links">
                            <ul>
                                <li>
                                    <div class="header-social">
                                        @if (!empty($commonData['contant_info'][0]['facebook']))
                                            <a href="{{ $commonData['contant_info'][0]['facebook'] }}"
                                                target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        @endif

                                        @if (!empty($commonData['contant_info'][0]['linkedin']))
                                            <a href="{{ $commonData['contant_info'][0]['linkedin'] }}"
                                                target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        @endif

                                        @if (!empty($commonData['contant_info'][0]['twiter']))
                                            <a href="{{ $commonData['contant_info'][0]['twiter'] }}"
                                                target="_blank"><i class="fab fa-twitter"></i></a>
                                        @endif

                                        @if (!empty($commonData['contant_info'][0]['youtube']))
                                            <a href="{{ $commonData['contant_info'][0]['youtube'] }}"
                                                target="_blank"><i class="fab fa-youtube"></i></a>
                                        @endif
                                    </div>
                                </li>
                                <li><i class="fas fa-user"></i><a href="{{ url('login') }}"
                                        target="_blank">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

    </header>
    <div class="new-navbar-main" id="new-navbar-id">
        <nav class="navbar d-non navbar-expand-lg bg-body-tertiary main-menu py-0">
            <div class="container">
                <div class="header-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('storage/app/public/services/' . $commonData['default_info']['icon']) }}"
                            width="90" alt="IPTM">
                    </a>
                </div>

                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
                <button type="button" class="as-menu-toggle d-inline-block d-lg-none"><i
                        class="far fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/') }}">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                who we are
                            </a>
                            <ul class="dropdown-menu sub-menu">

                                <li>
                                    <a class="dropdown-item" href="{{ url('about-us-f') }}#">About IPTM</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('about-us-f') }}#mission-vision">Mission
                                        & Vision Statement</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('about-us-f#our-policies') }}">Values
                                        & Policies</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ url('about-us-f#managements-profile') }}">Management
                                        Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('about-us-f#core-team') }}">Core
                                        Team</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ url('about-us-f#advisors-panel') }}">Advisors</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                service
                            </a>
                            <ul class="dropdown-menu sub-menu no-icon-dropdown">


                                @if (!empty($commonData['service_list']))
                                    @foreach ($commonData['service_list'] as $sName)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url($sName['route']) }}">{{ $sName['name'] }}</a>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Projects
                            </a>
                            <ul class="dropdown-menu sub-menu  no-icon-dropdown">

                                <li>
                                    <a class="dropdown-item" href="#">Completed Projects</a>
                                    <ul class="dropdown-menu dropdown-submenu">

                                        @if (!empty($commonData['service_list']))
                                            @foreach ($commonData['service_list'] as $sName)
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('completed-project') . '/' . $sName['id'] }}">{{ $sName['name'] }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>


                                <li>
                                    <a class="dropdown-item" href="#">Ongoing projects</a>
                                    <ul class="dropdown-menu dropdown-submenu">

                                        @if (!empty($commonData['service_list']))
                                            @foreach ($commonData['service_list'] as $sName)
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('ongoing-project') . '/' . $sName['id'] }}">{{ $sName['name'] }}</a>
                                                </li>
                                            @endforeach
                                        @endif


                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('our-client') }}"> Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('news-event') }}">News & Events </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('events') }}">Events</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('photo-gallery') }}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('career') }}">Career</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href=""></a>
                        </li> --}}
                    </ul>

                    <div class="">
                        <div class="header-button">
                            <a href="{{ url('contact') }}" class="as-btn text-white">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>




    @yield('content')



    <footer class="footer-wrapper footer-layout2 shape-mockup-wrap" style="padding-top: 125px;">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget style2">
                            <div class="as-widget-about">

                                {{-- <div class="about-logo">
                                    <a href="#" class="foot-logo">
                                        <img src="{{ asset('public/front-end/img/iptmlogo.svg') }}" width="90"
                                            alt="IPTM">
                                    </a>
                                </div> --}}

                                <h3 class="widget_title">Contact us</h3>

                                <p class="about-text" style="width:275px;">
                                    @php
                                        $count = 1;
                                        $shortDescription = json_decode($commonData['default_info']['short_description']);

                                    @endphp

                                    @if (!empty($shortDescription))
                                        @foreach ($shortDescription as $sD)
                                      
                                            {{ $sD }}
                                            
                                            @if ($count == 1 )

                                                  <span class="h-5 d-block" style="height: 10px;"></span>
                                            @elseif($count == 2)

                                                <span class="h-5 d-block"></span>
                                            @endif

                                            @php
                                                $count = $count+1;
                                            @endphp

                                        @endforeach
                                    @endif
                                </p>
								
                                <div class="as-social d-none">

                                    @if (!empty($commonData['contant_info'][0]['facebook']))
                                        <a href="{{ $commonData['contant_info'][0]['facebook'] }}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a>
                                    @endif

                                    @if (!empty($commonData['contant_info'][0]['linkedin']))
                                        <a href="{{ $commonData['contant_info'][0]['linkedin'] }}" target="_blank"><i
                                                class="fab fa-twitter"></i></a>
                                    @endif

                                    @if (!empty($commonData['contant_info'][0]['twiter']))
                                        <a href="{{ $commonData['contant_info'][0]['twiter'] }}" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    @endif

                                    @if (!empty($commonData['contant_info'][0]['youtube']))
                                        <a href="{{ $commonData['contant_info'][0]['youtube'] }}" target="_blank"><i
                                                class="fab fa-youtube"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                        <div class="widget widget_nav_menu footer-widget style2">
                            <h3 class="widget_title">Follow us</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    @if (!empty($commonData['contant_info'][0]['facebook']))
                                        <li><a href="{{ $commonData['contant_info'][0]['facebook'] }}"
                                                target="_blank">Facebook</a></li>
                                    @endif

                                    @if (!empty($commonData['contant_info'][0]['linkedin']))
                                        <li><a href="{{ $commonData['contant_info'][0]['linkedin'] }}"
                                                target="_blank">Linkedin</a></li>
                                    @endif

                                    @if (!empty($commonData['contant_info'][0]['twiter']))
                                        <li><a href="{{ $commonData['contant_info'][0]['twiter'] }}"
                                                target="_blank">Twitter</a></li>
                                    @endif

                                    @if (!empty($commonData['contant_info'][0]['youtube']))
                                        <li><a href="{{ $commonData['contant_info'][0]['youtube'] }}"
                                                target="_blank">Youtube</a></li>
                                    @endif





                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-4">
                        <div class="widget widget_nav_menu footer-widget style2">
                            <h3 class="widget_title">services</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    @if (!empty($commonData['service_list']))
                                        @foreach ($commonData['service_list'] as $sName)
                                            <li><a href="{{ url($sName['route']) }}">{{ $sName['name'] }}</a></li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget style2">
                            <h3 class="widget_title">How to Reach US!</h3>
                            <div class="map-fo">
                                <a href="{{ url('contact#map') }}"><img
                                        src="{{ asset('public/front-end/img/widget/map.jpg') }}" alt="map"></a>
                            </div>
                            <div class="visitor-flex">
                                <div class="vistor-info">
                                    <span id="today-visitor"></span>
                                </div>
                                <div class="vistor-info">
                                    <span id="total-visitor"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto d-none">
                        <div class="visitor-flex">
                            <div class="vistor-info">
                                <span>today's Visitor: 10</span>
                            </div>
                            <div class="vistor-info">
                                <span>Total Visitor: 10</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto d-none d-lg-block">
                        <div class="footer-links">
                            <ul>
                                <li><a href="">Terms of Use</a></li>
                                <li><a href="">Privacy Environmental Policy</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2023 IPTM. All Rights
                            Reserved.
                            Developed by <a href="http://northbengaltech.com/" target="_blank">"NBT"</a></p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <a href="#" class="scrollToTop scroll-btn show"><i class="far fa-arrow-up"></i></a> --}}

        <div class="shape-mockup jump d-none d-xl-block" style="top: 10%; left: 0%;">
            <img src="{{ asset('public/front-end/img/shape/footer_shape_4.png') }}" alt="shapes">
        </div>
        <div class="shape-mockup movingX d-none d-xl-block" style="right: 0%; bottom: 15%;">
            <img src="{{ asset('public/front-end/img/shape/footer_shape_5.png') }}" alt="shapes">
        </div>
    </footer>
    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


    <script src="{{ asset('public/front-end/js/vendor/jquery-3.6.0.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script src="{{ asset('public/front-end/slick/slick.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/app.min.js') }}"></script>


    <script src="{{ asset('public/front-end/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
    </script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="{{ asset('public/front-end/js/custom.js') }}"></script>
    @stack('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            window.addEventListener('scroll', function() {

                if (window.scrollY > 45) {
                    document.getElementById('new-navbar-id').classList.add('fixed-top');
                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector('.navbar').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                } else {
                    document.getElementById('new-navbar-id').classList.remove('fixed-top');
                    // remove padding top from body
                    document.body.style.paddingTop = '0';
                }
            });
        });
    </script>
    <script>
        var $tickerWrapper = $(".tickerwrapper");
        var $list = $tickerWrapper.find("ul.list");
        var $clonedList = $list.clone();
        var listWidth = 10;

        $list.find("li").each(function(i) {
            listWidth += $(this, i).outerWidth(true);
        });

        var endPos = $tickerWrapper.width() - listWidth;

        $list.add($clonedList).css({
            "width": listWidth + "px"
        });

        $clonedList.addClass("cloned").appendTo($tickerWrapper);

        //TimelineMax
        var infinite = new TimelineMax({
            repeat: -1,
            paused: true
        });
        var time = 40;

        infinite
            .fromTo($list, time, {
                rotation: 0.01,
                x: 0
            }, {
                force3D: true,
                x: -listWidth,
                ease: Linear.easeNone
            }, 0)
            .fromTo($clonedList, time, {
                rotation: 0.01,
                x: listWidth
            }, {
                force3D: true,
                x: 0,
                ease: Linear.easeNone
            }, 0)
            .set($list, {
                force3D: true,
                rotation: 0.01,
                x: listWidth
            })
            .to($clonedList, time, {
                force3D: true,
                rotation: 0.01,
                x: -listWidth,
                ease: Linear.easeNone
            }, time)
            .to($list, time, {
                force3D: true,
                rotation: 0.01,
                x: 0,
                ease: Linear.easeNone
            }, time)
            .progress(1).progress(0)
            .play();

        //Pause/Play		
        $tickerWrapper.on("mouseenter", function() {
            infinite.pause();
        }).on("mouseleave", function() {
            infinite.play();
        });
    </script>

<!-- <<script>
    $(document).ready(function () {
        // Function to handle link clicks
        function handleLinkClick() {
            // Get the href attribute value and extract the ID
            var href = $(this).attr('href');
            var id = href.substring(href.indexOf("#") + 1);

            // Add the class to the section with the extracted ID
            $('#' + id).addClass('4');

            // Scroll to the section
            $('html, body').animate({
                scrollTop: $('#' + id).offset().top - 60 // Adjust the offset as needed
            }, 500); // Adjust the animation speed as needed
        }

        // Attach click event to all navbar links
        $('.navbar-nav a').on('click', function (e) {
            // Call the function to handle the click
            handleLinkClick.call(this);

            // Prevent the default behavior of the link after scrolling
            e.preventDefault();
        });
    });
</script> -->
<!-- <script>
    $(document).ready(function () {
        // Function to handle link clicks
        function handleLinkClick() {
            // Get the href attribute value and extract the ID
            var href = $(this).attr('href');
            var id = href.substring(href.indexOf("#") + 1);

            // Add the class to the section with the extracted ID
            $('#' + id).addClass('pt-40');

            // Scroll to the section
            $('html, body').animate({
                scrollTop: $('#' + id).offset().top - 60 // Adjust the offset as needed
            }, 500, function () {
                // Update the URL with the section ID
                history.pushState(null, null, '#' + id);
            });
        }

        // Attach click event to all navbar links
        $('.navbar-nav a').on('click', function (e) {
            // Call the function to handle the click
            handleLinkClick.call(this);

            // Prevent the default behavior of the link after scrolling
            e.preventDefault();
        });
    });
</script> -->
<script>
    $(document).ready(function () {
        // Function to handle link clicks
        function handleLinkClick() {
            // Get the href attribute value and extract the ID
            var href = $(this).attr('href');
            var id = href.substring(href.indexOf("#") + 1);

            // Add the class to the section with the extracted ID
            $('#' + id).addClass('pt-60');

            // Scroll to the section
            $('html, body').animate({
                scrollTop: $('#' + id).offset().top - 60 // Adjust the offset as needed
            }, 500, function () {
                // Update the URL with the section ID
                history.pushState(null, null, '#' + id);
            });
        }

        // Function to handle link hover
        function handleLinkHover() {
            // Get the href attribute value and extract the ID
            var href = $(this).attr('href');
            var id = href.substring(href.indexOf("#") + 1);

            // Remove the class from the section with the extracted ID when hovering
            $('#' + id).removeClass('pt-60');
        }

        // Attach click event to all navbar links
        $('.navbar-nav a').on('click', function (e) {
            // Call the function to handle the click
            handleLinkClick.call(this);

            // Prevent the default behavior of the link after scrolling
            e.preventDefault();
        });

        // Attach hover event to all navbar links
        $('.navbar-nav a').hover(
            function () {
                // Call the function to handle the hover
                handleLinkHover.call(this);
            },
            function () {
                // Do something on hover out if needed
            }
        );
    });
</script>
</body>

</html>

<!-- start toast -->
<script>
    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif


    visitorManagement();

    function visitorManagement() {
        //alert('dd');
        var site_url = "{{ url('/') }}";
        $.ajax({
                url: site_url + "/visitor-managemnet",
                type: "get",
                datatype: "html",
                beforeSend: function() {
                    //$('.ajax-loading-client').show();
                }
            })
            .done(function(data) {
                //  alert(data.todayVisitor);

                //$('.ajax-loading-client').hide();
                $('#today-visitor').html('Today Visitor: ' + data.todayVisitor);
                $('#total-visitor').html('Total Visitor: ' + data.totalVisitor);
                // $("#results-client").append(data);


            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                $('.ajax-loading-client').html("No response from server");
            });
    }
</script>
<!-- end toast -->
