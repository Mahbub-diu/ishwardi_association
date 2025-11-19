@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add About Text Info</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('about-infos') }}">About Us</a></li>
												<li class="breadcrumb-item"><a href="{{ url('about-infos') }}">About Text Info</a></li>
												<li class="breadcrumb-item active">Add Text Info</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::open(array('route' => 'about-infos.store', 'method'=>'POST',  'enctype' => 'multipart/form-data' )) !!}
										@php 
											$district_covered = '';
											$country_covered = '';
											$resource_pool = '';
											
											$about_primary_info = '';
											$mission_icon = '';
											$mission_statement = '';
											$vision_icon = '';
											$vision_statement = '';
											$value_risk_icon = '';
											$value_risk_spinner_icon = '';
											$value_risk_policy = '';
											$total_experience_year = '';
										@endphp
										
										@error('about_primary_info')
										  @php $about_primary_info = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('mission_icon')
										  @php $mission_icon = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('mission_statement')
										  @php $mission_statement = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('vision_icon')
										  @php $vission_icon = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('value_risk_icon')
										  @php $value_risk_icon = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('value_risk_spinner_icon')
										  @php $value_risk_spinner_icon = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('total_experience_year')
										  @php $total_experience_year = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('vision_statement')
										  @php $vision_statement = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('value_risk_policy')
										  @php $value_risk_policy = 'is-invalid border-red'; @endphp
										@enderror
										
										
										
									<div class="row">
										<!--<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>About Primary Info</label>
												{!! Form::textarea('about_primary_info', null, array('placeholder' => 'Enter primary info','class' => 'form-control '.$about_primary_info)) !!}
												@error('about_primary_info')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>-->
										
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Mission Icon <span style="color:red">(Image Size: 150 x 150) *</span></label>
												{!! Form::file('mission_icon', array('onchange' => 'previewFile1(this)', 'id' => 'image1', 'class' => 'form-control '.$mission_icon)) !!}
												
												@error('mission_icon')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
												
												<img id="previewImg1" src="/examples/images/transparent.png" alt="" width="100">
												
											</div>
										</div>
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Vision Icon <span style="color:red">(Image Size: 150 x 150) *</span></label>
												{!! Form::file('vision_icon', array('onchange' => 'previewFile2(this)', 'id' => 'image2', 'class' => 'form-control '.$vision_icon)) !!}
												
												@error('vision_icon')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
												
												<img id="previewImg2" src="/examples/images/transparent.png" alt="" width="100">
												
											</div>
										</div>
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Mission  Statement</label>
												{!! Form::textarea('mission_statement', null, array('placeholder' => 'Enter mission statement','class' => 'form-control '.$mission_statement)) !!}
												@error('mission_statement')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label> Vision Statement</label>
												{!! Form::textarea('vision_statement', null, array('placeholder' => 'Enter vission statement','class' => 'form-control '.$vision_statement)) !!}
												@error('vision_statement')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Value & Risk Management  Icon<span style="color:red">(Image Size: 597 x 640) *</span></label>
												{!! Form::file('value_risk_icon', array('onchange' => 'previewFile3(this)', 'id' => 'image3', 'class' => 'form-control '.$value_risk_icon)) !!}
												
												@error('value_risk_icon')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
												
												<img id="previewImg3" src="/examples/images/transparent.png" alt="" width="100">
												
											</div>
										</div>
										
										{{--<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Value & Risk Management Spinner  Icon</label>
												{!! Form::file('value_risk_spinner_icon', array('onchange' => 'previewFile4(this)', 'id' => 'image4', 'class' => 'form-control '.$value_risk_spinner_icon)) !!}
												
												@error('value_risk_spinner_icon')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
												
												<img id="previewImg4" src="/examples/images/transparent.png" alt="" width="100">
												
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Total Experience Year</label>
												{!! Form::text('total_experience_year', null, array('placeholder' => 'Example: 10', 'id' => 'image3', 'class' => 'form-control '.$total_experience_year)) !!}
												
												@error('total_experience_year')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
												
											</div>
										</div>--}}
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Value & Risk Management Policy</label>
												{!! Form::textarea('value_risk_policy', null, array('placeholder' => 'Enter value & risk management policy', 'class' => 'form-control '.$value_risk_policy)) !!}
												@error('value_risk_policy')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Submit</button>
											<a href="{{ url('contact-us') }}" class="btn btn-cancel">Cancel</a>
										</div>
									</div>
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					
					<script>
						CKEDITOR.replace('about_primary_info');  
						CKEDITOR.replace('mission_vission_statement');  
						CKEDITOR.replace('value_risk_policy');  
					  
						function getData() {  
							//Get data written in first Editor   
							var editor_data = CKEDITOR.instances['about_primary_info'].getData();  
							//Set data in Second Editor which is written in first Editor  
							CKEDITOR.instances['mission_vission_statement'].setData(editor_data);  
							CKEDITOR.instances['value_risk_policy'].setData(editor_data);  
						} 
						
						function previewFile1(input){
								var file = $("#image1").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg1").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
							
							function previewFile2(input){
								var file = $("#image2").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg2").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
							
							function previewFile3(input){
								var file = $("#image3").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg3").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
							
							function previewFile4(input){
								var file = $("#image4").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg4").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
					</script>
					
					@endsection
					
					