@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add New Role</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('roles') }}">Roles</a></li>
												<li class="breadcrumb-item active">Add Role</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
										@php 
											$name = '';
										@endphp
										@error('name')
											  @php $name = 'is-invalid'; @endphp
										@enderror
										
									<div class="row">
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label> Name</label>
												{!! Form::text('name', null, array('placeholder' => 'Name', 'readonly' => 'readonly', 'class' => 'form-control'.$name)) !!}@error('name')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
									
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="table-responsive">
												<table class="table">
												<tr>
													<td align="center"><strong>Module</strong></td>
													<td><strong>Permission <span style="margin-left:30px">{{ Form::checkbox('', 1, false, array('id' => 'checkAll')) }} Select All</span></strong></td>
												</tr>
												
														@foreach( $reArrangePermission as $key => $value )
												
													<tr>
														<td align="center"> <strong>{{ $key }}</strong></td>
														<td align="left">
															@php
																$count =1;
															@endphp
															@foreach($value as $keySub => $valueSub )
																
																<label style="margin:5px">
																	{{ Form::checkbox('permission[]', $keySub, in_array($keySub, $rolePermissions) ? true : false, array('class' => 'name')) }}

																	{{ $valueSub }}
																</label>
																@if( $count++ == 2 )
																	<br/>
																@elseif( $count++ ==4 )
																	@php $count =1; @endphp
																	<br/>
																@endif
															@endforeach

														</td>
														
													</tr>
												@endforeach
														
														
														@error('permission')
															<tr>
																<th> </th>
																<th> 
																	<span class="invalid-feedback" >
																		{{ $message }}
																	</span>
																</th>
															</tr>			
														@enderror
												</table>
											</div>
										</div>
										

						
										<br/>
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Update</button>
											<a href="{{ url('roles') }}" class="btn btn-cancel">Cancel</a>
										</div>
									</div>
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					
					
					<script>
							$("#checkAll").click(function(){
								$('input:checkbox').not(this).prop('checked', this.checked);
							});
					</script>
					@endsection