@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Edit Default/Service</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('galleries') }}"> Default/Services</a></li>
												<li class="breadcrumb-item active">Edit Default/Service</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::open(array('route' => 'services.store', 'method'=>'POST',  'enctype' => 'multipart/form-data' )) !!}
										@php 
											$service_id = '';
											$area_name = '';
											$area_icon = '';
											$order = '';
											$short_description = '';
											$sort_order = '';
										@endphp
										
										@error('service_id')
										  @php $service_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('area_name')
										  @php $area_name = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('area_icon')
										  @php $area_icon = 'is-invalid border-red'; @endphp
										@enderror
										
										
										@error('short_description')
										  @php $short_description = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('sort_order')
										  @php $sort_order = 'is-invalid border-red'; @endphp
										@enderror
										
										
										
									<div class="row">
										
										<div class="col-lg-6 col-sm-6 col-12">
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
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Service Area Name<span style="color:red">*</span></label>
												{!! Form::text('area_name', null, array('placeholder' => 'Enter service area','class' => 'form-control '.$area_name)) !!}

												@error('area_name')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
                                               
												<div class="form-group">
													<label>Area Icon<span style="color:red">(Image Size: 385 x 260) *</span></label>
													{!! Form::file('area_icon', array('onchange' => 'previewFile(this)', 'id' => 'image', 'class' => 'form-control '.$area_icon)) !!}
													
														
													@error('area_icon')
														<span class="invalid-feedback" style="display:block">
															{{ $message }}
														</span>
													@enderror
													
													<img id="previewImg" src="/examples/images/transparent.png" alt="" width="100">
													
												</div>
										</div>
										
										
										<!--<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Sort Order</label>
												{!! Form::text('sort_order', null, array('placeholder' => 'Hints: 1 or 2 or 3','class' => 'form-control '.$sort_order)) !!}

												@error('sort_order')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>-->
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Sort Description</label>
												{!! Form::textarea('short_description', null, array('placeholder' => 'Enter sort order','class' => 'form-control '.$short_description)) !!}

												@error('short_description')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
						
										
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Submit</button>
											<a href="{{ url('service-cover-areas') }}" class="btn btn-cancel">Cancel</a>
										</div>
									</div>
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					
					<script>
							
							function previewFile(input){
								
								var file = $("#image").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
					</script>
					@endsection