@extends('layouts.app')

@section('content')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="po1 dash-widget">
                            <div class="dash-widgetimg"> <span><img src="{{ asset('public/mine/assets/img/icons/dash1.svg') }}" alt="img"></span> </div>
                            <div class="dash-widgetcontent">
                                <h5>+<span class="counters" data-count="{{ $totalOngoingActivities + $totalCompletedProject }}.00">{{ $totalOngoingActivities + $totalCompletedProject }}</span></h5>
                                <h6>Total Project </h6> </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="po2 dash-widget dash1">
                            <div class="dash-widgetimg"> <span><img src="{{ asset('public/mine/assets/img/icons/dash2.svg') }}" alt="img"></span> </div>
                            <div class="dash-widgetcontent">
                                <h5>+<span class="counters" data-count="{{ $totalCompletedProject }}.00">{{ $totalCompletedProject }}</span></h5>
                                <h6>Completed Project</h6> </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="po3 dash-widget dash2">
                            <div class="dash-widgetimg"> <span><img src="{{ asset('public/mine/assets/img/icons/dash3.svg') }}" alt="img"></span> </div>
                            <div class="dash-widgetcontent">
                                <h5>+<span class="counters" data-count="{{ $totalOngoingActivities }}.00">{{ $totalOngoingActivities }}</span></h5>
                                <h6>Ongoing Project</h6> </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="po4 dash-widget dash3">
                            <div class="dash-widgetimg"> <span><img src="{{ asset('public/mine/assets/img/icons/dash4.svg') }}" alt="img"></span> </div>
                            <div class="dash-widgetcontent">
                                 <h5>+<span class="counters" data-count="{{ $totalourClient }}.00">{{ $totalourClient }}</span></h5>
                                <h6>Total Clients & Partner</h6> </div>
                        </div>
                    </div>
					
                    
                    
                </div>
                
				
               
            </div>
        </div>
         @endsection
        