@extends('layouts.app-frontend')


@section('content')
    <section class="contact-banner-main"
        style="background: url('{{ asset('public/front-end/img/mahbub/inner_02.jpg') }}');background-size: cover;background-repeat: no-repeat;background-position: center center;">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="about-content-box">
                        <h3>Assignment details</h3>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="blog-main">
        <div class="container">
            <div class="row">
				 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center;">
						<div class="news-post-title">
                                <h4 class="news-title">{{ $dataDetails->title }}</h4>
                        </div>
				 </div>
			</div>
			
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                   
					@if( !empty( $dataDetails->feature_image ) )
						<div class="blogdetails-main">
							<div class="single-post">

								<div class="news-post-image">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
											<div class="single-image">
												
												<img class="" src="{{ asset('storage/app/public/ongoing-activities/'.$dataDetails->feature_image) }}"
													class="img-fluid w-100" alt="" >

											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ps-0">
											@if( !empty($otherImages[0]) )
											<div class="triple-image">
												<img class="" src="{{ asset('storage/app/public/ongoing-activities/'.$otherImages[0]) }}"
													class="img-fluid w-100" alt="" style="width:280px;height:188px">
											</div>
											@endif
											
											@if( !empty($otherImages[1]) )
											<div class="triple-image">
												<img class="" src="{{ asset('storage/app/public/ongoing-activities/'.$otherImages[1]) }}"
													class="img-fluid w-100" alt="" style="width:280px;height:188px">
											</div>
											@endif


										</div>
									</div>
								</div>
								
							</div>

						</div>
					@else
						 <p>
							{!! $dataDetails->activity_full_details !!}
						</p>
					
					@endif

                </div>
				
				
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="sidebar-single-box category-block">
                        <div class="title-block" style="text-align: center;"><span>About Assignment</span></div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    
									@if( !empty($clientName->client_logo) )
									<tr> 
                                        <td>Client</td>
                                        <td  style="margin:0;padding:0">:</td>
                                        <td>
                                            <img class="" src="{{ asset('storage/app/public/client_logo/'.$clientName->client_logo) }}"
                                                class="img-fluid" alt="" style="width:300px !important">
                                        </td>
                                    </tr>
									@endif
									
									@if( !empty($dataDetails->project_name) )
									 <tr>
                                        <td>Proejct Name</td>
                                        <td  style="margin:0;padding:0">:</td>
                                        <td>{{ $dataDetails->project_name  }} </td>
                                    </tr>
									@endif
									
									@if( !empty($services) )
                                    <tr>
                                        <td>Service</td>
                                        <td  style="margin:0;padding:0">:</td>
                                        <td>{{ !empty($services) ? implode(", ",$services) : '---' }} </td>
                                    </tr>
									@endif
									
									@if( !empty($serviceCoverArea) )
                                    <tr>
                                        <td>fetaured Service</td>
                                        <td style="margin:0;padding:0">:</td>
                                        <td>{{ !empty($serviceCoverArea) ? implode(", ",$serviceCoverArea) : '---' }}</td>
                                    </tr>
									@endif
									
									@if( !empty( $dataDetails->completed_status) )
                                    <tr>
                                        <td>Assignment status</td>
                                        <td  style="margin:0;padding:0">:</td>
                                        <td>{{ !empty( $dataDetails->completed_status == 1) ? 'Completed' : '---' }} </td>
                                    </tr>
									@endif
									
									
									@if( $dataDetails->total_participate )
                                    <tr>
                                        <td>total participate</td>
                                        <td  style="margin:0;padding:0">:</td>
                                        <td>{{ !empty($dataDetails->total_participate) ? $dataDetails->total_participate : '---' }} </td>
                                    </tr>
									@endif
									
									@if( !empty( $dataDetails->sample_size) )
                                    <tr>
                                        <td>Sample Size</td>
                                        <td  style="margin:0;padding:0">:</td>
                                        <td>{{ !empty( $dataDetails->sample_size) ? $dataDetails->sample_size : '---' }} </td>
                                    </tr>
									@endif
									
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			
			@if( !empty( $dataDetails->feature_image ) )
				<div class="row">
					<div class="news-post-text">
						<p>
							{!! $dataDetails->activity_full_details !!}
						</p>
					</div>
				</div>
			@endif
            
        </div>
    </section>
@endsection

