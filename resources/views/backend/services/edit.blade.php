@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


@section('content')

@php 
	$title = 'Service'; 
	$imageTitle = 'icon'; 
	$imageSize = '(Width=387px, Height=366px)'; 
	$lebelColor = 'red'; 
@endphp

@if ( $service->name == 'Institute of Professional Training & Management (IPTM)' ) 
	
	@php 
		$title = 'Default'; 
		$imageTitle = 'logo'; 
		$imageSize = '(Width=600px, Height=180px)'; 
		$lebelColor = '#f89938'; 
	@endphp
	
@endif
										
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Edit {{ $title }}</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('services') }}"> Default/Services </a></li>
												<li class="breadcrumb-item active">Edit {{ $title }}</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::model($service, ['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'route' => ['services.update', $service->id]]) !!}
									
										@php 
											$name = '';
											$order = '';
											$icon = '';
											$short_description = '';
										@endphp
										
										
										@error('name')
										  @php $area_name = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('order')
										  @php $order = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('icon')
										  @php $area_icon = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('logo')
										  @php $area_icon = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('short_description')
										  @php $short_description = 'is-invalid border-red'; @endphp
										@enderror
										
										
									<div class="row">
										
										
											
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>{{ $title }}<span style="color:red">*</span></label>
												{!! Form::text('name', null, array('placeholder' => 'Enter  name', 'disabled' => 'true', 'class' => 'form-control '.$name)) !!}

												@error('name')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Order<span style="color:red">*</span></label>
												{!! Form::text('order', null, array('placeholder' => 'Enter  order',  'class' => 'form-control '.$order)) !!}

												@error('order')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label style="text-transform: capitalize;">
												{{ $imageTitle }}
												<span style="color:{{ $lebelColor }}"> {{ $imageSize }} *</span>
													
												</label>
												{!! Form::file($imageTitle, array('onchange' => 'previewFile(this)', 'id' => 'image', 'class' => 'form-control '.$icon)) !!}
												
												
												<img id="previewImg" src="{{ asset('storage/app/public/services/'.$service->icon)}}" alt="" width="100">
												@error('icon')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
												
												@error('logo')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
									
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Sort Description   [Paragraph 1] <span style="color:red">*</span></label>
												{!! Form::textarea('short_description[]', $des[1], array('placeholder' => 'Enter short description','class' => 'form-control '.$short_description)) !!}

												@error('short_description')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Sort Description  [Paragraph 2] </label>
												{!! Form::textarea('short_description[]', $des[2], array('placeholder' => 'Enter short description','class' => 'form-control '.$short_description)) !!}

												@error('short_description')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Sort Description  [Paragraph 3] </label>
												{!! Form::textarea('short_description[]', $des[3], array('placeholder' => 'Enter short description','class' => 'form-control '.$short_description)) !!}

												@error('short_description')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
						
										
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Update</button>
											<a href="{{ url('services') }}" class="btn btn-cancel">Cancel</a>
										</div>
									</div>
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					@endsection
					
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