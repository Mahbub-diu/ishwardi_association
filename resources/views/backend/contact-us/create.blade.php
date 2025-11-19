@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add  Contact</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('contact-us') }}">Our Clients</a></li>
												<li class="breadcrumb-item active">Add Contact</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::open(array('route' => 'contact-us.store', 'method'=>'POST',  'enctype' => 'multipart/form-data' )) !!}
										@php 
											$office_hour = '';
											$mobile_no = '';
											$email = '';
											$facebook = '';
											$twiter = '';
											$linkedin = '';
											$instagram = '';
											$youtube = '';
											$google_map = '';
											$address = '';
										@endphp
										
										@error('office_hour')
										  @php $office_hour = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('mobile_no')
										  @php $mobile_no = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('email')
										  @php $email = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('facebook')
										  @php $facebook = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('twiter')
										  @php $twiter = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('linkedin')
										  @php $linkedin = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('instagram')
										  @php $instagram = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('youtube')
										  @php $youtube = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('google_map')
										  @php $google_map = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('address')
										  @php $address = 'is-invalid border-red'; @endphp
										@enderror
										
										
									<div class="row">
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Office Hour <span style="color:red">*</span></label>
												{!! Form::text('office_hour', null, array('placeholder' => 'Enter office hour','class' => 'form-control '.$office_hour)) !!}
												@error('office_hour')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Mobile No.<span style="color:red">*</span></label>
												{!! Form::text('mobile_no', null, array('placeholder' => 'Enter mobile no.','class' => 'form-control '.$mobile_no)) !!}
												@error('mobile_no')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Email <span style="color:red">*</span></label>
												{!! Form::text('email', null, array('placeholder' => 'Enter email','class' => 'form-control '.$email)) !!}
												@error('email')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Facebook </label>
												{!! Form::text('facebook', null, array('placeholder' => 'Enter Facebook page URL','class' => 'form-control '.$facebook)) !!}
												@error('facebook')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Linkedin</label>
												{!! Form::text('linkedin', null, array('placeholder' => 'Enter Linkedin page URL','class' => 'form-control '.$linkedin)) !!}
												@error('linkedin')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Twiter</label>
												{!! Form::text('twiter', null, array('placeholder' => 'Enter Twiter page URL', 'class' => 'form-control '.$twiter)) !!}
												@error('twiter')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Youtube</label>
												{!! Form::text('youtube', null, array('placeholder' => 'Enter Youtube channel URL','class' => 'form-control '.$youtube)) !!}
												@error('youtube')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Google Map</label>
												{!! Form::text('google_map', null, array('placeholder' => 'Enter Google map URL','class' => 'form-control '.$google_map)) !!}
												@error('google_map')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Office Address</label>
												{!! Form::text('address', null, array('placeholder' => 'Enter office address','class' => 'form-control '.$address)) !!}
												@error('address')
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
					@endsection