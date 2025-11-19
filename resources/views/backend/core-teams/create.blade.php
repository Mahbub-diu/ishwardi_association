@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add New Team Memeber</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('core-teams') }}">Our Core Team</a></li>
												<li class="breadcrumb-item active">Add Team Memeber</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::open(array('route' => 'core-teams.store', 'method'=>'POST',  'enctype' => 'multipart/form-data' )) !!}
										@php 
											$name = '';
											$designation = '';
											$order = '';
											$photo = '';
											$member_type = '';
											$other_info = '';
										@endphp
										
										@error('name')
										  @php $name = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('designation')
										  @php $designation = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('order')
										  @php $order = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('photo')
										  @php $photo = 'is-invalid border-red'; @endphp
										@enderror
										
										
										
										@error('member_type')
										  @php $member_type = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('other_info')
										  @php $other_info = 'is-invalid border-red'; @endphp
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
												<label>Designation</label>
												{!! Form::text('designation', null, array('placeholder' => 'Enter designation','class' => 'form-control '.$designation)) !!}
												@error('designation')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Order</label>
												{!! Form::text('order', null, array('placeholder' => 'Enter showing order','class' => 'form-control '.$order)) !!}
												@error('order')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
									
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Photo<span style="color:red">(Image Size: 400 x 400) *</span></label>
												{!! Form::file('photo', array('onchange' => 'previewFile(this)', 'id' => 'photo', 'class' => 'form-control '.$photo)) !!}
												
												
												<img id="previewImg" src="/examples/images/transparent.png" alt="" width="100">
													
												@error('photo')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Member Type <span style="color:red">*</span></label>
												{!! Form::select('member_type', [''=>'Select One']+$memberType,[], array('id' => '', 'class' => 'form-control form-small select select2-hidden-accessible '.$member_type,  'tabindex' => '-1', 'aria-hidden' => 'true', 'single' => 'single')) !!} 
												
												@error('member_type')
													<span class="invalid-feedback">
														The member type field is required. 
													</span>
												@enderror
											</div>
										</div>
										
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Other Info </label>
												{!! Form::textarea('other_info', null, array('placeholder' => 'Enter other info', 'class' => 'form-control '.$other_info)) !!}
												@error('other_info')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
						
										
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Submit</button>
											<a href="{{ url('core-teams') }}" class="btn btn-cancel">Cancel</a>
										</div>
									</div>
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					
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
					@endsection