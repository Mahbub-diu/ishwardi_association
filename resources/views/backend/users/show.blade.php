@extends('layouts.app')
@if(Session::has('success'))

@endif
@section('content')
					<div class="page-wrapper">
							<div class="content">
								<div class="page-header">
									<div class="page-title">
										<h4>User List</h4>
										<h6>Manage Your Users</h6>
									</div>
									<div class="page-btn">
										<a href="{{ url('users') }}" class="btn btn-added"> < Back</a>
									</div>
									
									
								</div>
								<div class="card">
									<div class="card-body">
										
										<div class="table-responsive">
											<table class="table ">
												<thead>
													<tr>
														
														<th>Name </th>
														<th>Email</th>
														<th>Role</th>
														<th>Permission</th>
														
														<th>
															<a href="{{ route('users.edit', $user->id) }}" class="">
															<img src="{{ asset('public/mine/assets/img/icons/edit.svg') }}" class="me-2" alt="img">Edit
															</a>
														</th>
													</tr>
												</thead>
												<tbody  class="" id="pagination_data">
														
													<tr>
														<td>{{ $user->name }}</td>
														<td>{{ $user->email }}</td>
														<td>
															@if(!empty($user->getRoleNames()))

																@foreach($user->getRoleNames() as $v)
																
																   {{ $v }}

																@endforeach

															@endif
														</td>
														<td colspan="2">
															<div class="row">
																@if( !empty( $user->getAllPermissions() ) )

																	@foreach($user->getAllPermissions() as $key => $v)

																	  <div class="col-4">
																	
																			{{ $v->name }}

																	  </div>
																  @endforeach
																@endif
															</div>
														</td>
													</tr>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
					</div>
						
	
@endsection