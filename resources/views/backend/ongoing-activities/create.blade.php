@extends('layouts.app')

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
-->			
@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add New Activity</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('ongoing-activities') }}">Ongoing Activities</a></li>
												<li class="breadcrumb-item active">Add Activity</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::open(array('route' => 'ongoing-activities.store', 'method'=>'POST',  'enctype' => 'multipart/form-data' )) !!}
										@php 
											$title = '';
											$client_id = '';
											$project_name = '';
											$service_id = '';
											$service_cover_area_id = '';
											$feature_image = '';
											$image2 = '';
											$image3 = '';
											$image4 = '';
											$total_participate = '';
											$sample_size = '';
											$activity_short_details = '';
											$activity_full_details = '';
										@endphp
										
										@error('title')
										  @php $title = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('client_id')
										  @php $client_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('project_name')
										  @php $project_name = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('service_id')
										  @php $service_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('service_id')
										  @php $service_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('service_id')
										  @php $service_id = 'is-invalid border-red'; @endphp
										@enderror 
										
										@error('total_participate')
										  @php $total_participate = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('sample_size')
										  @php $sample_size = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('activity_full_details')
										  @php $activity_full_details = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('image_first')
										  @php $image_first = 'is-invalid border-red'; @endphp
										@enderror
										
										
									<div class="row">
									
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Assignment Name<span style="color:red">*</span></label>
												{!! Form::text('title', null, array('placeholder' => 'Enter assignment name','class' => 'form-control '.$title)) !!}
												@error('title')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Client <span style="color:red">*</span></label>
												{!! Form::select('client_id', [''=>'Select One']+$clients,[], array('id' => '', 'class' => 'form-control form-small select select2-hidden-accessible '.$client_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'single' => 'single')) !!} 
												
												@error('client_id')
													<span class="invalid-feedback">
														The client field is required. 
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Project Name</label>
												{!! Form::text('project_name', null, array('placeholder' => 'Enter project name','class' => 'form-control '.$project_name)) !!}
												@error('project_name')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Service<span style="color:red">*</span></label>
												{!! Form::select('service_ids[]', [''=>'Select One']+$services,[], array('id' => 'service', 'class' => 'form-control form-small select select2-hidden-accessible '.$service_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'multiple' => 'multiple')) !!} 
											
												@error('service_id')
													<span class="invalid-feedback">
														{{ $message }} 
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Featured Services <span style="color:red">*</span></label>
												
												{!! Form::select('service_cover_area_ids[]', [''=>'Select One']+[],[], array('id' => 'cover-area', 'class' => 'form-control form-small select select2-hidden-accessible cover-area '.$service_cover_area_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'multiple' => 'multiple')) !!} 
											
												@error('service_cover_area_id')
													<span class="invalid-feedback">
														{{ $message }} 
													</span>
												@enderror
											</div>
										</div>
										
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Featured Image <span style="color:red"> (Image Size: 600 x 420)</span> </label>
												{!! Form::file('feature_image', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile(this)', 'id' => 'image1', 'class' => 'form-control '.$feature_image)) !!}
												
												@error('feature_image')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
												
												<img id="previewImg1" src="/examples/images/transparent.png" alt="" width="100">
												
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Image 1 <span style="color:red"> (Image Size: 600 x 420)</span></label>
												{!! Form::file('image1', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile2(this)', 'id' => 'image2', 'class' => 'form-control '.$image2)) !!}
												
												
												<img id="previewImg2" src="/examples/images/transparent.png" alt="" width="100">
													
												@error('image')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Image 2 <span style="color:red"> (Image Size: 600 x 420)</span></label>
												{!! Form::file('image2', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile3(this)', 'id' => 'image3', 'class' => 'form-control '.$image3)) !!}
												
												
												<img id="previewImg3" src="/examples/images/transparent.png" alt="" width="100">
													
												@error('image')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<!--<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Image 3</label>
												{!! Form::file('image3', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile4(this)', 'id' => 'image4', 'class' => 'form-control '.$image4)) !!}
												
												
												<img id="previewImg4" src="/examples/images/transparent.png" alt="" width="100">
													
												@error('image')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>-->
										
										
										<div class="col-lg-3 col-sm-3 col-3">
											<div class="form-group">
												<label>Feature Showing</label>
												{{ Form::checkbox('feature_showing', 1, false, array('class' => 'name')) }}
												
												@error('feature_showing')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-3 col-sm-3 col-3">
											<div class="form-group">
												<label>Completed Project</label>
												{{ Form::checkbox('completed_status', 1, false, array('class' => 'name')) }}
												
												@error('completed_status')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Total Participants/Beneficiary</label>
												{!! Form::text('total_participate', 0, array('placeholder' => 'Enter total participate','class' => 'form-control '.$total_participate)) !!}
												@error('total_participate')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Sample Size</label>
												{!! Form::text('sample_size', null, array('placeholder' => 'Enter sample size','class' => 'form-control '.$sample_size)) !!}
												
												@error('sample_size')
													<span class="invalid-feedback"  style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Activity Short Details<span style="color:red">*</span></label>
												{!! Form::textarea('activity_short_details', null, array('placeholder' => 'Enter short details about activity','class' => 'form-control '.$activity_short_details)) !!}
												@error('activity_short_details')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Activity Full Details<span style="color:red">*</span></label>
												{!! Form::textarea('activity_full_details', null, array('placeholder' => 'Enter full details about activity', 'id' => 'activity_full_details', 'class' => 'form-control '.$activity_full_details)) !!}
												@error('activity_full_details')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-12">
											@if( $currentRoleName == 'Data Creator' ||  $currentRoleName == 'System Admin' )
												@can('ongoing-activities-create')
													<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Save</button>
												@endcan
											@endif
												<a href="{{ url('ongoing-activities') }}" class="btn btn-cancel">Cancel</a>
										</div>
									</div>
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					
					<script>
							
							
							
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
						
						$(document).on('change', '#service', function() {   
						
							var value = [];
							value = $(this).val();
							//alert(value);
							route = {!! json_encode(url('/')) !!}+'/get-service-cover-area/'+ value;

							emptyFieldClass = ['cover-area'];
							
							targetShowClass = 'cover-area';

							getAutoDropdownRolePermission(targetShowClass, route, emptyFieldClass);

							//alert('Response');

						});

						/*CKEDITOR.replace('activity_full_details');  
					  
						function getData() {  
							//Get data written in first Editor   
							var editor_data = CKEDITOR.instances['activity_full_details'].getData();  
							//Set data in Second Editor which is written in first Editor   
						} */
						
						
						tinymce.init({
						selector: '#activity_full_details',
						plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
						toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
						});
						
					</script>
					
					@endsection