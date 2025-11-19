@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add New Client</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('our-clients') }}">Our Clients</a></li>
												<li class="breadcrumb-item active">Add Client</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::open(array('route' => 'our-clients.store', 'method'=>'POST',  'enctype' => 'multipart/form-data' )) !!}
										@php 
											$client_name = '';
											$web_url = '';
											$client_logo = '';
										@endphp
										
										@error('client_name')
										  @php $client_name = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('web_url')
										  @php $web_url = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('client_logo')
										  @php $client_logo = 'is-invalid border-red'; @endphp
										@enderror
										
										
									<div class="row">
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Client Name<span style="color:red">*</span></label>
												{!! Form::text('client_name', null, array('placeholder' => 'Enter client name','class' => 'form-control '.$client_name)) !!}
												@error('client_name')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Website URL<span style="color:red">*</span></label>
												{!! Form::text('web_url', null, array('placeholder' => 'Enter website url','class' => 'form-control '.$web_url)) !!}
												@error('web_url')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Company Logo<span style="color:red"> (Image Size: 254 x 250)*</span></label>
												{!! Form::file('client_logo', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile(this)', 'id' => 'image1', 'class' => 'form-control '.$client_logo)) !!}
												
												
												<img id="previewImg1" src="/examples/images/transparent.png" alt="" width="100">
													
												@error('client_logo')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										
						
										
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Submit</button>
											<a href="{{ url('our-clients') }}" class="btn btn-cancel">Cancel</a>
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
					</script>
					@endsection