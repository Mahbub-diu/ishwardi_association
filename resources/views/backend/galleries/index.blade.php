@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
							<div class="content">
								<div class="page-header">
									<div class="page-title">
										<h4> Gallery  List</h4>
										<h6>Manage Galleries</h6>
									</div>
									@can('gallery-create')
									<div class="page-btn">
										<a href="{{ url('galleries/create') }}" class="btn btn-added"><img src="{{ asset('public/mine/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add Gallery</a>
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
														<th>Category  </th>
														<th>Title </th>
														<th>Image </th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody  class="" id="pagination_data">
												
													@include("backend.galleries.index-pagination",["data"=>$data])
												
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
					</div>
						

@endsection