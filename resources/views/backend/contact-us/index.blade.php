@extends('layouts.app')
@if(Session::has('success'))

@endif
@section('content')
					<div class="page-wrapper">
							<div class="content">
								<div class="page-header">
									<div class="page-title">
										<h4>Contact Us</h4>
										<h6>Manage Your Contact Us</h6>
									</div>
									@can('contact-us-create')
										@if( empty($data) )
										<div class="page-btn">
											<a href="{{ url('contact-us/create') }}" class="btn btn-added"><img src="{{ asset('public/mine/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add Contact Info</a>
										</div>
										@endif
									@endcan
								</div>
								<div class="card">
									<div class="card-body">
										
										
										<div class="table-responsive">
											<table class="table ">
												<thead>
													<tr>
														<!--<th>
															<label class="checkboxs">
																<input type="checkbox" id="select-all">
																<span class="checkmarks"></span>
															</label>
														</th>-->
														<th>Mobile No.</th>
														<th>Email </th>
														<th>Social Media </th>
														<th>Address </th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody  class="" id="pagination_data">
													
													@if( !empty($data) )
														<tr>
															<td>{{ $data->mobile_no }}</td>
															<td>{{ $data->email }}</td>
															
															<td>
																<a href="{{ $data->facebook }}" target="_blank"><i class="fab fa-facebook"></i></a> 
																<a href="{{ $data->twiter }}" target="_blank"><i class="fab fa-twiter"></i></a> 
																<a href="{{ $data->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a> 
																<a href="{{ $data->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a> 
																<a href="{{ $data->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a> 
															</td>
															
															
															<td>{{ $data->address }}</td>
															
															<td>
																<a class="action-set " href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true"> 
																	<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
																	<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
																	<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
																</a>
																
																<ul class="dropdown-menu">
																	@can('contact-us-edit')
																	<li>
																		<a href="{{ route('contact-us.edit', $data->id) }}" class="dropdown-item"><img src="{{ asset('public/mine/assets/img/icons/edit.svg') }}" class="me-2" alt="img">Edit</a>
																	</li>
																	@endcan
																	
																	@can('contact-us-delete')
																	<!--<li>
																		<a href="javascript:void(0);" class="dropdown-item confirm-text"  id="delete-contact-us"  data-url="{{ route('contact-us.delete', $data->id) }}" ><img src="{{ asset('public/mine/assets/img/icons/delete1.svg') }}" class="me-2" alt="img">Delete</a>
																	</li>-->
																	@endcan
																</ul>
															</td>
														</tr>
														@endif
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
					</div>
			<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalert2.all.js') }}"></script>
			<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalerts.js') }}"></script>
   			
	
@endsection