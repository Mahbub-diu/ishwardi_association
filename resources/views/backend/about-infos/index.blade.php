@extends('layouts.app')
@if(Session::has('success'))

@endif
@section('content')
					<div class="page-wrapper">
							<div class="content">
								<div class="page-header">
									<div class="page-title">
										<h4>About Text Info</h4>
										<h6>Manage About Text Info</h6>
									</div>
									
									@if( empty($data) )
										@can('about-other-info-create')
										<div class="page-btn">
											<a href="{{ url('about-infos/create') }}" class="btn btn-added"><img src="{{ asset('public/mine/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add About Text Info</a>
										</div>
										@endcan
									@else
										@can('about-other-info-edit')
										<div class="page-btn">
											<a href="{{ route('about-infos.edit', $data->id) }}" class="dropdown-item"><img src="{{ asset('public/mine/assets/img/icons/edit.svg') }}" class="me-2" alt="img">Edit</a>
										</div>
										@endcan
									@endif
								</div>
								<div class="card">
									<div class="card-body">
										
										<!--
										<div class="table-responsive">
											<table class="table ">
												<thead>
													<tr>
														<th>About Us Primary Info</th>
													</tr>
												</thead>
												<tbody  class="" id="pagination_data">
													
														<tr>
															<td>{!! !empty($data->about_primary_info) ? $data->about_primary_info : '' !!}</td>
														</tr>
												</tbody>
											</table>
										</div>
										
										<br/><br/>-->
										
										<div class="table-responsive">
											<table class="table ">
												<thead>
													<tr>
														<th>Mission Icon </th>
														<th>Mission  Statement </th>
													</tr>
												</thead>
												<tbody  class="" id="pagination_data">
													
														<tr>
															<td>
																@if (!empty($data->mission_icon) )
																	<img src="{{ asset('storage/app/public/about-us/'.$data->mission_icon)}}" alt="" width="100">
																@endif
															</td>
															
															<td>{!! !empty($data->mission_statement) ? $data->mission_statement : '' !!}</td>
														</tr>
												</tbody>
											</table>
										</div>
										
										<br/><br/>
										
										<div class="table-responsive">
											<table class="table ">
												<thead>
													<tr>
														<th>Vision Icon</th>
														<th>Vision Statement</th>
													</tr>
												</thead>
												<tbody  class="" id="pagination_data">
													
														<tr>
															<td>
																@if (!empty($data->vision_icon) )
																	<img src="{{ asset('storage/app/public/about-us/'.$data->vision_icon)}}" alt="" width="100">
																@endif
															</td>
															<td>{!! !empty($data->vision_statement) ? $data->vision_statement : '' !!}</td>
														</tr>
												</tbody>
											</table>
										</div>
										
										<br/><br/>
										
										<div class="table-responsive">
											<table class="table ">
												<thead>
													<tr>
														<th>Value & Risk Icon</th>
														<!--<th>Value & Risk Spinner Icon</th>-->
														<th>Value & Risk Policy</th>
													</tr>
												</thead>
												<tbody  class="" id="pagination_data">
													
														<tr>
															<td>
																@if (!empty($data->value_risk_icon) )
																	<img src="{{ asset('storage/app/public/about-us/'.$data->value_risk_icon)}}" alt="" width="100">
																@endif
															</td>
															
															<!--<td>
																@if (!empty($data->value_risk_spinner_icon) )
																	<img src="{{ asset('storage/app/public/about-us/'.$data->value_risk_spinner_icon)}}" alt="" width="100">
																@endif
															</td>-->
															
															<td>{!! !empty($data->value_risk_policy) ? $data->value_risk_policy : '' !!}</td>
														</tr>
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