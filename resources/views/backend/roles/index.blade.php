@extends('layouts.app')
@if(Session::has('success'))

@endif
@section('content')
					<div class="page-wrapper">
							<div class="content">
								<div class="page-header">
									<div class="page-title">
										<h4>Role List</h4>
										<h6>Manage Your Roles</h6>
									</div>
									
									@can('role-create')
										<div class="page-btn">
											<a href="{{ url('roles/create') }}" class="btn btn-added"><img src="{{ asset('public/mine/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Role</a>
										</div>
									@endcan
									
								</div>
								<div class="card">
									<div class="card-body">
										<!--<div class="table-top">
											<div class="search-set">
												<div class="search-path">
													<a class="btn btn-filter" id="filter_search">
														<img src="{{ asset('public/mine/assets/img/icons/filter.svg') }}" alt="img">
														<span><img src="{{ asset('public/mine/assets/img/icons/closes.svg') }}" alt="img"></span>
													</a>
												</div>
												<div class="search-input">
													<a class="btn btn-searchset"><img src="{{ asset('public/mine/assets/img/icons/search-white.svg') }}" alt="img"></a>
												</div>
											</div>
											<div class="wordset">
												<ul>
													<li>
														<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{ asset('public/mine/assets/img/icons/pdf.svg') }}" alt="img"></a>
													</li>
													<li>
														<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{ asset('public/mine/assets/img/icons/excel.svg') }}" alt="img"></a>
													</li>
													<li>
														<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ asset('public/mine/assets/img/icons/printer.svg') }}" alt="img"></a>
													</li>
												</ul>
											</div>
										</div>
										<div class="card mb-0" id="filter_inputs">
											<div class="card-body pb-0">
											{!! Form::open(array('url' => 'pos/create', 'method' => 'post', 'id'=>'searchform', 'name'  => 'searchform')) !!}
								
												<div class="row">
													<div class="col-lg-12 col-sm-12">
														<div class="row">
															<div class="col-lg col-sm-6 col-12">
																<div class="form-group">
																	{!! Form::text('name', null, array('placeholder' => 'Enter name','class' => 'form-control')) !!}
																</div>
															</div>
															
															
															
															<div class="col-lg-1 col-sm-6 col-12">
																<div class="form-group">
																	<a id="search_btn" href="{{ url('roles/') }}" class="btn btn-filters ms-auto"><img src="{{ asset('public/mine/assets/img/icons/search-whites.svg') }}" alt="img"></a>
																</div>
															</div>

														</div>
													</div>
												</div>
												{!! Form::close() !!}
											</div>
										</div>-->
										
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
														<th>Action</th>
													</tr>
												</thead>
												<tbody  class="" id="pagination_data">
												
													@include("backend.roles.index-pagination",["data"=>$data])
												
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
					</div>
						
	<script>
	
			
		$(function() {

			
			$(document).on("click","#btn-category a, #pagination a,#search_btn",function(){
				
				var searchParams = new URLSearchParams(window.location.search);
			  
				//get url and make final url for ajax 
				var url=$(this).attr("href");
				//alert(url);
				var append=url.indexOf("?")==-1?"?":"&";
			  
				var finalURL=url+append+$("#searchform").serialize();
			
				//set to current url
				window.history.pushState({},null, finalURL);
			

				$.get(finalURL,function(data){
					  //console.log(data);
					$("#pagination_data").html(data);
				});
			  
				return false;
			})
		   
		  });
	</script>
@endsection