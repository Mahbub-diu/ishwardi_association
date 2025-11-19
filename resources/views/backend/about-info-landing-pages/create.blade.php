@extends('layouts.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

			
@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add Core Info</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('ongoing-activities') }}">Ongoing Activities</a></li>
												<li class="breadcrumb-item active">Add Core Info</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::open(array('route' => 'about-info-landing-pages.store', 'method'=>'POST',  'enctype' => 'multipart/form-data' )) !!}
										@php 
											$service_id = '';
											
											$bullet_point_1 = '';
											$bullet_point_2 = '';
											$bullet_point_3 = '';
											$bullet_point_4 = '';
											
											$banner_image = '';
											$feature_image = '';
											$about_text = '';
										@endphp
										
										
										@error('service_id')
										  @php $service_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('bullet_point_1')
										  @php $bullet_point_1 = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('bullet_point_2')
										  @php $bullet_point_2 = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('bullet_point_3')
										  @php $bullet_point_3 = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('banner_image')
										  @php $banner_image = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('feature_image')
										  @php $feature_image = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('feature_image')
										  @php $feature_image = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('about_text')
										  @php $about_text = 'is-invalid border-red'; @endphp
										@enderror
										
										
									<div class="row">
									
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Service<span style="color:red">*</span></label>
												{!! Form::select('service_id', [''=>'Select One']+$services,[], array('id' => 'service', 'class' => 'form-control form-small select select2-hidden-accessible '.$service_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'single' => 'single')) !!} 
												
												@error('service_id')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Banner Image<span style="color:red">(Image Size: 916 x 861) *</span></label>
												{!! Form::file('banner_image', array('onchange' => 'previewBannerImage(this)', 'id' => 'banner_image', 'class' => 'form-control '.$banner_image)) !!}
												
												<img id="preview_banner_image" src="/examples/images/transparent.png" alt="" width="100">
													
												@error('banner_image')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Feature Image<span style="color:red">(Image Size: 589 x 637) *</span></label>
												{!! Form::file('feature_image', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile(this)', 'id' => 'image1', 'class' => 'form-control '.$feature_image)) !!}
												
												<img id="previewImg1" src="/examples/images/transparent.png" alt="" width="100">
													
												@error('feature_image')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>About Text Info <span style="color:red">*</span></label>
												{!! Form::textarea('about_text', null, array('placeholder' => 'Enter about text','class' => 'form-control '.$about_text)) !!}
												@error('about_text')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<!--<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Key Point 1 <span style="color:red">*</span> </label>
												{!! Form::text('bullet_point_1', null, array('placeholder' => 'Enter key point 1','class' => 'form-control '.$bullet_point_1)) !!}
												@error('bullet_point_1')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Key Point 2 <span style="color:red">*</span> </label>
												{!! Form::text('bullet_point_2', null, array('placeholder' => 'Enter key point 2','class' => 'form-control '.$bullet_point_2)) !!}
												
												@error('bullet_point_2')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Key Point 3 <span style="color:red">*</span> </label>
												{!! Form::text('bullet_point_3', null, array('placeholder' => 'Enter key point 3','class' => 'form-control '.$bullet_point_3)) !!}
												
												@error('bullet_point_3')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Key Point 4 <span style="color:red">*</span> </label>
												{!! Form::text('bullet_point_4', null, array('placeholder' => 'Enter key point 4','class' => 'form-control '.$bullet_point_4)) !!}
												
												@error('bullet_point_4')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>-->
										
										
						
										
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Submit</button>
											<a href="{{ url('about-info-landing-pages') }}" class="btn btn-cancel">Cancel</a>
										</div>
									</div>
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					
					<script>
							
							function previewBannerImage(input){
								var file = $("#banner_image").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#preview_banner_image").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
							
							
							function previewFile(input){
								var file = $("#image1").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg1").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
							
							
							
						/*CKEDITOR.replace('activity_full_details');  
					  
						function getData() {  
							//Get data written in first Editor   
							var editor_data = CKEDITOR.instances['activity_full_details'].getData();  
							//Set data in Second Editor which is written in first Editor   
						}*/ 
						
						
					</script>
					
					@endsection