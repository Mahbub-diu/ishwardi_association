@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add New Career</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('core-teams') }}"> Careers</a></li>
												<li class="breadcrumb-item active">Add Career</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::open(array('route' => 'careers.store', 'method'=>'POST',  'enctype' => 'multipart/form-data' )) !!}
										@php 
											$job_title = '';
											$circular_file = '';
											$short_details = '';
										@endphp
										
										@error('job_title')
										  @php $job_title = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('circular_file')
										  @php $circular_file = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('short_details')
										  @php $short_details = 'is-invalid border-red'; @endphp
										@enderror
										
										
									<div class="row">
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Job Title</label>
												{!! Form::text('job_title', null, array('placeholder' => 'Enter job title','class' => 'form-control '.$job_title)) !!}
												@error('job_title')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Circular File <span style="color:red">(File Type: PDF)</span></label>
												{!! Form::file('circular_file', array('placeholder' => 'Enter circular file','class' => 'form-control '.$circular_file)) !!}
												@error('circular_file')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label> Short Details<span style="color:red">*</span></label>
												{!! Form::textarea('short_details', null, array('placeholder' => 'Enter short details about circular','class' => 'form-control '.$short_details)) !!}
												@error('short_details')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
						
										
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Submit</button>
											<a href="{{ url('careers') }}" class="btn btn-cancel">Cancel</a>
										</div>
									</div>
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					@endsection