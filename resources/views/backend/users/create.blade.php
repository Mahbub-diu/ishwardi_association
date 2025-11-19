@extends('layouts.app')
			
@section('content')
				<div class="page-wrapper">
					<div class="content">
						<div class="page-header">
							<div	 class="page-header">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">Add New User</h3>
										<ul class="breadcrumb">
											<li class="breadcrumb-item"><a href="{{ url('users') }}">Users</a></li>
											<li class="breadcrumb-item active">Add User</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
									@php 
										$name = '';
										$mobile_no = '';
										$email = '';
										$password = '';
										$confirmPassword = '';
										$roleError = '';
										$set_permission = '';
									@endphp
									
									@error('name')
									  @php $name = 'is-invalid border-red'; @endphp
									@enderror
									
									@error('mobile_no')
									  @php $mobile_no = 'is-invalid border-red'; @endphp
									@enderror
									
									@error('email')
									  @php $email = 'is-invalid border-red'; @endphp
									@enderror
									
									@error('password')
									  @php $password = 'is-invalid border-red'; @endphp
									@enderror
									
									@error('confirm-password')
									  @php $confirmPassword = 'is-invalid border-red'; @endphp
									@enderror
									
									@error('roles')
									  @php $roleError = 'is-invalid border-red'; @endphp
									@enderror 
									
									@error('set_permission')
									  @php $set_permission = 'is-invalid border-red'; @endphp
									@enderror 
									
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-12">
										<div class="form-group">
											<label> Name</label>
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
											<label>Mobile No.</label>
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
											<label>Email Address</label>
											{!! Form::text('email', null, array('placeholder' => 'Enter email','class' => 'form-control '.$email)) !!}
											@error('email')
												<span class="invalid-feedback">
													{{ $message }}
												</span>
											@enderror
										</div>
									</div>
									
									
									<div class="col-lg-6">
										<div class="form-group">
											<label>Password</label>
											<div class="pass-group">
											{!! Form::password('password', array('placeholder' => 'Password','class' => 'pass-input form-control '.$password)) !!}
											@error('password')
												<span class="invalid-feedback">
													{{ $message }}
												</span>
											@else
												<span class="fas toggle-password fa-eye-slash"></span>
											@enderror
											</div>
										</div>
									</div>
									
									<div class="col-lg-6">
										<div class="form-group">
											<label>Confirm Password</label>
											<div class="pass-group">
											{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'pass-input form-control '.$confirmPassword)) !!}
											@error('confirm-password')
												<span class="invalid-feedback">
													{{ $message }}
												</span>
											@else
												<span class="fas toggle-password fa-eye-slash"></span>
											@enderror
											</div>
										</div>
									</div>
									
									<div class="col-lg-6">
										<div class="form-group">
											<label>Role</label>
											<div class="pass-group"> 
											{!! Form::select('roles', [''=>'Select One']+$roles,[], array('id' => 'role', 'class' => 'form-control form-small select select2-hidden-accessible '.$roleError,  'tabindex' => '-1', 'aria-hidden' => 'true', 'single' => 'single')) !!} 
														
											@error('roles')
												<span class="invalid-feedback" style="display:block">
													{{ $message }}
												</span>
											@enderror
											
											@error('set_permission')
												<span class="invalid-feedback">
													{{ $message }}
												</span>
											@enderror
											</div>
										</div>
									</div>
									
									<div class="col-lg-12">
									{{--<div class="form-group">
											<label>Set Permission</label>
											<div class="pass-group"> 
											{!! Form::select('set_permission[]', [''=>'Select Specefic Permission']+[],[], array('id' => '', 'class' => 'form-control form-small select select2-hidden-accessible set-permission '.$set_permission,  'tabindex' => '-1', 'aria-hidden' => 'true', 'multiple' => 'multiple')) !!} 
											
											
											</div>
										</div>--}}
										
											<div class="table-responsive">
												<table class="table data-sh-table">
														<tr>
															<td align="center"><strong>Module</strong></td>
															<td>
															<strong>Permission </strong>
																@error('set_permission')
																	<span class="invalid-feedback">
																		{{ $message }}
																	</span>
																@enderror
															</td>
														</tr>
														
												</table>
											</div>
									</div>
									

									<div class="col-lg-12">
										<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Submit</button>
										<a href="{{ url('users') }}" class="btn btn-cancel">Cancel</a>
									</div>
								</div>
								
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			
				<script>
					
					
					
					$(document).on('change', '#role', function() {   
                
						var value = [];
						value = $(this).val();
						//alert(value);
						route = {!! json_encode(url('/')) !!}+'/get-role-wise-permission-list/'+ value;

						emptyFieldClass = ['set-permission'];
						
						targetShowClass = 'data-sh-table';

						getRoleWiseUserPermissionList(targetShowClass, route, emptyFieldClass);

						//alert('Response');
			
					});	
			</script>
			
				@endsection