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
											<h3 class="page-title">Edit  News & Events</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('single-updates') }}">News & Events</a></li>
												<li class="breadcrumb-item active">Edit News & Events</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::model($singleUpdate, ['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'route' => ['single-updates.update', $singleUpdate->id]]) !!}
										@php 
											$title = '';
											$client_id = '';
											$project_name = '';
											$service_id = '';
											$feature_image = '';
											$image2 = '';
											$image3 = '';
											$image4 = '';
											$activity_short_details = '';
											$activity_full_details = '';
										@endphp
										
										@error('client_id')
										  @php $client_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('service_id')
										  @php $service_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('project_name')
										  @php $project_name = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('activity_short_details')
										  @php $activity_short_details = 'is-invalid border-red'; @endphp
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
												{!! Form::hidden('page', app('request')->input('page')  , array('placeholder' => '','class' => 'form-control ')) !!}
												{!! Form::hidden('old_data', app('request')->input('old_data')  , array('placeholder' => '','class' => 'form-control ')) !!}
												
												{!! Form::text('title', null, array('placeholder' => 'Enter assignment name','class' => 'form-control '.$title)) !!}
												
												
												@error('title')
													<span class="invalid-feedback"  style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
									
									{{--<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Client <span style="color:red">*</span></label>
												{!! Form::select('client_id', [''=>'Select One']+$clients,$singleUpdate->client_id, array('id' => '', 'class' => 'form-control form-small select select2-hidden-accessible '.$client_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'single' => 'single')) !!} 
												
												@error('client_id')
													<span class="invalid-feedback"  style="display:block">
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
													<span class="invalid-feedback"  style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Service<span style="color:red">*</span></label>
												{!! Form::select('service_ids[]', []+$services,json_decode($singleUpdate->service_ids), array('id' => 'service', 'class' => 'form-control form-small select select2-hidden-accessible '.$service_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'multiple' => 'multiple')) !!} 
												
												@error('service_ids')
													<span class="invalid-feedback"  style="display:block">
														The service field is required. 
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Featured Services<span style="color:red">*</span></label>
												{!! Form::select('service_cover_area_ids[]', []+$serviceCoverArea,json_decode($singleUpdate->service_cover_area_ids), array('id' => 'cover-area', 'class' => 'form-control form-small select select2-hidden-accessible cover-area'.$service_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'multiple' => 'multiple')) !!} 
												
												@error('service_cover_area_ids')
													<span class="invalid-feedback"  style="display:block">
														The featured services field is required. 
													</span>
												@enderror
											</div>
									</div>--}}
										
										
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Featured Image<span style="color:red"> (Image Size: 600 x 420)</span></label>
												{!! Form::file('feature_image', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile(this)', 'id' => 'image1', 'class' => 'form-control '.$feature_image)) !!}
												
												<img id="previewImg1" src="{{ asset('storage/app/public/single-updates/'.$singleUpdate->feature_image)}}" alt="" width="100">
													
												@error('feature_image')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
			
										
										
										<div class="col-lg-3 col-sm-3 col-3">
											<div class="form-group">
												<label>Featured Showing</label>
												{{ Form::checkbox('feature_showing',1,null, array('class'=>'')) }}
												
												@error('feature_showing')
													<span class="invalid-feedback"  style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-3 col-sm-3 col-3">
											<div class="form-group">
												<label>Is Event</label>
												{{ Form::checkbox('news_event_status',1,null, array('class'=>'')) }}
												@error('news_event_status')
													<span class="invalid-feedback"  style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-12 col-sm-12 col-12 border">
											<div class="">
												  <table class="table table-bordered" id="dynamic_field">
													<div class="card-header">
													  <h3 class="card-title">More Image (Click Add For More Image)</h3>
													</div>
													
													@php 
														$i = 1;
													@endphp
													
													@foreach( $images as $img )
														
														<tr id="row-old-{{ $i }}" class="dynamic-added">
														 
														 <td>
															
															<img  src="{{ asset( !empty($img) ? 'storage/app/public/single-updates/'.$img : '' ) }}" alt="" width="100">
															
															{!! Form::hidden('old_images['.$i.']', $img, array('placeholder' => 'Enter project name','class' => 'old_image'.$i)) !!}
												
														  </td>
														  
														  <td>
															<button type="button" name="remove" id="{{ $i }}" class="btn btn-danger old_remove">x</button>
														  
														  </td>
														  
														</tr>
														
														@php 
															$i++;
														@endphp
														
													@endforeach
													
													<tr>
													  <td>
														{!! Form::file('new_images[]', array('placeholder' => 'Enter circular file', 'onchange' => 'addNewPreview(1)', 'id' => 'addNew1', 'class' => 'form-control name_list')) !!}
												
														<img id="showNewPreview1" src="/examples/images/transparent.png" alt="" width="100">
												
													  </td>
													  <td>
													  <button type="button" name="add" id="add" class="btn btn-success">ADD</button>
													  </td>
													</tr>
													
													
												  </table>
											</div>
										</div>
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Activity Short Details<span style="color:red">*</span></label>
												{!! Form::textarea('activity_short_details', null, array('placeholder' => 'Enter short details about activity','class' => 'form-control '.$activity_short_details)) !!}
												@error('activity_short_details')
													<span class="invalid-feedback"  style="display:block">
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
													<span class="invalid-feedback"  style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
						
										
										<div class="col-lg-12" style="margin-bottom:30px">
											
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Update</button>
											<a href="{{ url('single-updates') }}" class="btn btn-cancel me-2"> Cancel </a>
											
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
							
							
							function addNewPreview(id){
								
								var file = $("#addNew"+id).get(0).files[0];
						 
								if(file){
									
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#showNewPreview"+id).attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
							

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
						
						
						
					  $(document).ready(function(){
							  
							  var postURL = "<?php echo url('addmore'); ?>";
							  var i = 1;

							  // For Add new img field ===>
							  $('#add').click(function(){
							  i++;
							  $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" id="addNew'+i+'"  onchange="addNewPreview('+i+')" accept="image/*" name="new_images[]" class="form-control name_list"><img id="showNewPreview'+i+'" src="/examples/images/transparent.png" alt="" width="100"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">x</button></td></tr>');
							
							
							
								
						});
						
						
							
							/*function addNewPreviewy(){
									
									alert('dd');
									
							}*/
							

							// For remove image field ====>
							$(document).on('click', '.btn_remove', function(){
								//alert('response');
							  var button_id = $(this).attr("id");
							  $('#row'+button_id+'').remove();
							});
							
							$(document).on('click', '.old_remove', function(){
								
								var button_id = $(this).attr("id");
							 
							  
								$(".old_image"+button_id).attr('name', 'remove_images[]');
							    
								$(this).attr('class', '');
							
								$('#row-old-'+button_id+'').hide();
							});

						});
   
   
					</script>
					
					<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalert2.all.js') }}"></script>
					<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalerts.js') }}"></script>
   
   
					@endsection