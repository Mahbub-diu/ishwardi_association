@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
							<div class="content">
								<div class="page-header">
									<div class="page-title">
										<h4> Appreciations  List</h4>
										<h6>Manage Appreciations</h6>
									</div>
									
									@can('appreciation-create')
									<div class="page-btn">
										<a href="{{ url('appreciations/create') }}" class="btn btn-added"><img src="{{ asset('public/mine/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add Appreciation</a>
									</div>
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
														<th>Sno</th>
														<th>Name </th>
														<th>Company Name </th>
														<th>Designation </th>
														<th>Image </th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody  class="" id="pagination_data">
												
													@include("backend.appreciations.index-pagination",["data"=>$data])
												
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
					</div>
						

@endsection