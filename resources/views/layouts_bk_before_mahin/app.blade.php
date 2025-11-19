<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - NBT">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>IPTM Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/front-end/img/logo.svg') }}">
    <link rel="stylesheet" href="{{ asset('public/mine/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/mine/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/mine/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('public/mine/assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/mine/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('public/mine/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/mine/assets/css/style.css') }}"> 
	<script src="{{ asset('public/mine/assets/js/jquery-3.6.0.min.js') }}"></script>
   
	<!-- start toast -->
    <!-- Not Mandatory for this project<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">-->  
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> 
	<!-- end toast -->
   
	
	<!--text editor -->
		
    <!--<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>  -->
	<script src="https://cdn.tiny.cloud/1/7hsc6gz40a0w3esa37qtgg013xpfxbo79hnj8zc9ih8wtqvj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
 

	<!--end text editor -->

	<style>
		.border-red{ border: 1px solid red !important}
		
		
		.loader2 {
  
	  width: 1em;
	  height: 1em;
	  border-radius: 50%;
	  position: relative;
	  text-indent: -9999em;
	  animation: mulShdSpin 1.1s infinite ease;
	  transform: translateZ(0);
	  font-size: 8px;
	  margin-left:20px;
	}
	
	@keyframes mulShdSpin {
	  0%,
	  100% {
		box-shadow: 0em -2.6em 0em 0em #ffffff, 1.8em -1.8em 0 0em rgba(255,255,255, 0.2), 2.5em 0em 0 0em rgba(255,255,255, 0.2), 1.75em 1.75em 0 0em rgba(255,255,255, 0.2), 0em 2.5em 0 0em rgba(255,255,255, 0.2), -1.8em 1.8em 0 0em rgba(255,255,255, 0.2), -2.6em 0em 0 0em rgba(255,255,255, 0.5), -1.8em -1.8em 0 0em rgba(255,255,255, 0.7);
	  }
	  12.5% {
		box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.7), 1.8em -1.8em 0 0em #ffffff, 2.5em 0em 0 0em rgba(255,255,255, 0.2), 1.75em 1.75em 0 0em rgba(255,255,255, 0.2), 0em 2.5em 0 0em rgba(255,255,255, 0.2), -1.8em 1.8em 0 0em rgba(255,255,255, 0.2), -2.6em 0em 0 0em rgba(255,255,255, 0.2), -1.8em -1.8em 0 0em rgba(255,255,255, 0.5);
	  }
	  25% {
		box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.5), 1.8em -1.8em 0 0em rgba(255,255,255, 0.7), 2.5em 0em 0 0em #ffffff, 1.75em 1.75em 0 0em rgba(255,255,255, 0.2), 0em 2.5em 0 0em rgba(255,255,255, 0.2), -1.8em 1.8em 0 0em rgba(255,255,255, 0.2), -2.6em 0em 0 0em rgba(255,255,255, 0.2), -1.8em -1.8em 0 0em rgba(255,255,255, 0.2);
	  }
	  37.5% {
		box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.2), 1.8em -1.8em 0 0em rgba(255,255,255, 0.5), 2.5em 0em 0 0em rgba(255,255,255, 0.7), 1.75em 1.75em 0 0em #ffffff, 0em 2.5em 0 0em rgba(255,255,255, 0.2), -1.8em 1.8em 0 0em rgba(255,255,255, 0.2), -2.6em 0em 0 0em rgba(255,255,255, 0.2), -1.8em -1.8em 0 0em rgba(255,255,255, 0.2);
	  }
	  50% {
		box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.2), 1.8em -1.8em 0 0em rgba(255,255,255, 0.2), 2.5em 0em 0 0em rgba(255,255,255, 0.5), 1.75em 1.75em 0 0em rgba(255,255,255, 0.7), 0em 2.5em 0 0em #ffffff, -1.8em 1.8em 0 0em rgba(255,255,255, 0.2), -2.6em 0em 0 0em rgba(255,255,255, 0.2), -1.8em -1.8em 0 0em rgba(255,255,255, 0.2);
	  }
	  62.5% {
		box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.2), 1.8em -1.8em 0 0em rgba(255,255,255, 0.2), 2.5em 0em 0 0em rgba(255,255,255, 0.2), 1.75em 1.75em 0 0em rgba(255,255,255, 0.5), 0em 2.5em 0 0em rgba(255,255,255, 0.7), -1.8em 1.8em 0 0em #ffffff, -2.6em 0em 0 0em rgba(255,255,255, 0.2), -1.8em -1.8em 0 0em rgba(255,255,255, 0.2);
	  }
	  75% {
		box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.2), 1.8em -1.8em 0 0em rgba(255,255,255, 0.2), 2.5em 0em 0 0em rgba(255,255,255, 0.2), 1.75em 1.75em 0 0em rgba(255,255,255, 0.2), 0em 2.5em 0 0em rgba(255,255,255, 0.5), -1.8em 1.8em 0 0em rgba(255,255,255, 0.7), -2.6em 0em 0 0em #ffffff, -1.8em -1.8em 0 0em rgba(255,255,255, 0.2);
	  }
	  87.5% {
		box-shadow: 0em -2.6em 0em 0em rgba(255,255,255, 0.2), 1.8em -1.8em 0 0em rgba(255,255,255, 0.2), 2.5em 0em 0 0em rgba(255,255,255, 0.2), 1.75em 1.75em 0 0em rgba(255,255,255, 0.2), 0em 2.5em 0 0em rgba(255,255,255, 0.2), -1.8em 1.8em 0 0em rgba(255,255,255, 0.5), -2.6em 0em 0 0em rgba(255,255,255, 0.7), -1.8em -1.8em 0 0em #ffffff;
	  }
	}
	</style>
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head> 
  
<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left active">
                <a href="" class="logo"> <h1>IPTM</h1> </a>
                <a href="" class="logo-small"> <img src="{{ asset('public/mine/assets/img/logo-icon.svg') }}" alt=""> </a>
                <a id="toggle_btn" href="javascript:void(0);"> </a>
            </div>
            <a id="mobile_btn" class="mobile_btn" href="#sidebar"> <span class="bar-icon">
            <span></span> <span></span> <span></span> </span>
            </a>
            <div class="popo-head"><span>Institute of Professional Training & Management (IPTM) Dashboard</span></div>
            <ul class="nav user-menu">
                
				
				 <!--<li class="nav-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"> <img src="{{ asset('public/mine/assets/img/icons/notification-bing.svg') }}" alt="img"> <span class="badge rounded-pill">4</span> </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span> <a href="javascript:void(0)" class="clear-noti"> Clear All </a> </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                               <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex"> <span class="avatar flex-shrink-0">
                                        <img alt="" src="{{ asset('public/mine/assets/img/profiles/avatar-02.jpg') }}">
                                    </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                
								
								
								
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer"> <a href="activities.html">View all Notifications</a> </div>
                    </div>
                </li>-->
				
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown"> <span class="user-img"><img src="{{ asset('public/mine/assets/img/profiles/avator1.jpg') }}" alt="">
                    <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <!--<div class="profileset"> <span class="user-img"><img src="{{ asset('public/mine/assets/img/profiles/avator1.jpg') }}" alt="">
                                <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>{{ !empty($userSeeData['name']) ? $userSeeData['name'] : '' }}</h6>
                                    
								</div>
                            </div>
                            <hr class="m-0">
                            <hr class="m-0">-->
							
                            <a class="dropdown-item logout pb-0" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><img src="{{ asset('public/mine/assets/img/icons/log-out.svg') }}" class="me-2" alt="img">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu"> <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="profile.html">My Profile</a> <a class="dropdown-item" href="generalsettings.html">Settings</a> <a class="dropdown-item" href="signin.html">Logout</a> </div>
            </div>
        </div>
        <!-- header -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="{{ url('home') }}"><img src="{{ asset('public/mine/assets/img/icons/dashboard.svg') }}" alt="img"><span> Dashboard</span> </a>
                        </li>
                       
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('public/mine/assets/img/icons/settings.svg') }}" alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
                            <ul>
								
								
								@can('role-list')
                                 <li><a href="{{ url('roles') }}">Role List</a></li>
								@endcan
								
								@can('user-list')
                                 <li><a href="{{ url('users') }}">User List</a></li>
								@endcan
								
								@can('page-top-configuration-list')
                                 <li><a href="{{ url('page-top-configurations') }}">Page Top Configuration</a></li>
								@endcan
								
								@can('service-list')
                                 <li><a href="{{ url('services') }}">Default/Services </a></li>
								@endcan
								
								@can('featured-service-list')
                                 <li><a href="{{ url('service-cover-areas') }}">Featured Services</a></li>
								@endcan
								
								
								@can('clients-list')
                                 <li><a href="{{ url('our-clients') }}">Clients</a></li>
								@endcan
							</ul>
                        </li>
						
						 <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('public/mine/assets/img/icons/settings.svg') }}" alt="img"><span> About Us</span> <span class="menu-arrow"></span></a>
                            <ul>
								@can('about-core-info-list')
                                 <li><a href="{{ url('about-info-landing-pages') }}">Core  Info  </a></li>
								@endcan
								
								@can('about-other-info-list')
                                 <li><a href="{{ url('about-infos') }}">Other Info</a></li>
								@endcan
								
								@can('core-team-list')
                                 <li><a href="{{ url('core-teams') }}">Team Members</a></li>
								@endcan
								
							
							</ul>
                        </li>
						
						@can('ongoing-activities-list')
						
							<li>
								<a href="{{ url('ongoing-activities') }}">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
										<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
										<polyline points="2 17 12 22 22 17"></polyline>
										<polyline points="2 12 12 17 22 12"></polyline>
									</svg>
									<span> Ongoing/Comp. Act</span> 
								</a>
							</li>
                        </li>
						
						@endcan
						
						@can('news-event-list')
						<li>
                            <a href="{{ url('single-updates ') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
									<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
									<polyline points="2 17 12 22 22 17"></polyline>
									<polyline points="2 12 12 17 22 12"></polyline>
								</svg>
								<span> News & Events</span> 
							</a>
                        </li>
						@endcan
						
						@can('our-clients-list')
						<!--<li>
                            <a href="{{ url('our-clients') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
									<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
									<polyline points="2 17 12 22 22 17"></polyline>
									<polyline points="2 12 12 17 22 12"></polyline>
								</svg>
								<span> Our Clients</span> 
							</a>
                        </li>-->
						@endcan
						
						
						@can('appreciation-list')
						<li>
                            <a href="{{ url('appreciations') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
									<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
									<polyline points="2 17 12 22 22 17"></polyline>
									<polyline points="2 12 12 17 22 12"></polyline>
								</svg>
								<span> Our Appreciations </span> 
							</a>
                        </li>
						@endcan
						
						@can('gallery-list')
						<!--<li>
                            <a href="{{ url('galleries') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
									<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
									<polyline points="2 17 12 22 22 17"></polyline>
									<polyline points="2 12 12 17 22 12"></polyline>
								</svg>
								<span> Gallery</span> 
							</a>
                        </li>-->
						@endcan
						
						
						@can('career-list')
						<li>
                            <a href="{{ url('careers') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
									<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
									<polyline points="2 17 12 22 22 17"></polyline>
									<polyline points="2 12 12 17 22 12"></polyline>
								</svg>
								<span>Career</span> 
							</a>
                        </li>
						@endcan
						
						
						@can('contact-us-list')
						<li>
                            <a href="{{ url('contact-us') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
									<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
									<polyline points="2 17 12 22 22 17"></polyline>
									<polyline points="2 12 12 17 22 12"></polyline>
								</svg>
								<span>Contact Us</span> 
							</a>
                        </li>
						@endcan
						
						
                                 
                    </ul>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="nbt-footer">Copyright © 2023 IPTM.  All Rights Reserved. Developed by <a href="https://northbengaltech.com/" target="_blank">"NBT"</a>.</div>
    </div>
    <script src="{{ asset('public/mine/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('public/mine/assets/js/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('public/mine/assets/plugins/select2/js/select2.min.js') }}"></script>
	<script src="{{ asset('public/mine/assets/plugins/select2/js/custom-select.js') }}"></script>
	<script src="{{ asset('public/mine/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/mine/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/mine/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/mine/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/mine/assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('public/mine/assets/js/script.js') }}"></script>
	<script src="{{ asset('public/mine/assets/plugins/fileupload/fileupload.min.js') }}"></script>
	<script src="{{ asset('public/mine/assets/js/custom.js') }}"></script>

</body>

</html>


 <!-- start toast -->
 <script>

	@if(Session::has('success'))
		toastr.options =
		  {
			"closeButton" : true,
			"progressBar" : true
		  }
		toastr.success("{{ session('success') }}");
		
	@endif

	@if(Session::has('error'))
		toastr.options =
		{
		  "closeButton" : true,
		  "progressBar" : true
		}
		toastr.error("{{ session('error') }}");
	@endif

</script>
<!-- end toast -->






