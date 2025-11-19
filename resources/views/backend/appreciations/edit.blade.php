@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add Appreciation</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('appreciations') }}">Appreciation</a></li>
												<li class="breadcrumb-item active">Add Appreciation</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::model($appreciation, ['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'route' => ['appreciations.update', $appreciation->id]]) !!}
									
										@php 
											$name = '';
											$company_name = '';
											$designation = '';
											$details = '';
											$photo = '';
										@endphp
										
										@error('name')
										  @php $name = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('company_name')
										  @php $company_name = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('designation')
										  @php $designation = 'is-invalid border-red'; @endphp
										@enderror
										
										
										@error('details')
										  @php $details = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('photo')
										  @php $photo = 'is-invalid border-red'; @endphp
										@enderror
										
										
									<div class="row">
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Name</label>
												{!! Form::text('name', null, array('placeholder' => 'Enter name','class' => 'form-control '.$name)) !!}
												@error('name')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Company Name</label>
												{!! Form::text('company_name', null, array('placeholder' => 'Enter company name ','class' => 'form-control '.$company_name)) !!}
												@error('company_name')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Designation</label>
												{!! Form::text('designation', null, array('placeholder' => 'Enter designation','class' => 'form-control '.$designation)) !!}
												@error('designation')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Photo<span style="color:red">(Image Size: 400 x 400) *</span></label>
												{!! Form::file('photo', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile(this)', 'id' => 'photo', 'class' => 'form-control '.$photo)) !!}
												
												
												<img id="previewImg" src="{{ asset('storage/app/public/appreciations/'.$appreciation->photo)}}" alt="" width="100">
													
												@error('photo')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Message Details</label>
												{!! Form::textarea('details', null, array('placeholder' => 'Enter message','class' => 'form-control '.$details)) !!}
												@error('details')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
						
										
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Update</button>
											<a href="{{ url('appreciations') }}" class="btn btn-cancel">Cancel</a>
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
								var file = $("#photo").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
					</script>