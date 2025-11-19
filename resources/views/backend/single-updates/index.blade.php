@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
							<div class="content">
								<div class="page-header">
									<div class="page-title">
										<h4>News & Events List</h4>
										<h6>Manage News & Events</h6>
									</div>
									@if( $currentRoleName == 'Data Creator' ||  $currentRoleName == 'System Admin' )
											
										@can('news-event-create')
										<div class="page-btn">
											<a href="{{ url('single-updates/create') }}" class="btn btn-added"><img src="{{ asset('public/mine/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add News & Event </a>
										</div>
										@endcan
										
									@endif
								</div>
								<div class="card">
									<div class="card-body">
										
										<div class="table-top">
											
											@php 
												$tabName1 = '';
												$tabName2 = '';
											@endphp	
												
											@if( $currentRoleName == 'Data Creator' )
												
												@php 
													$tabName1 = 'Waiting for Submit';
													$tabName2 = 'Submitted List';
												@endphp	
												
											@elseif( $currentRoleName == 'Data Editor' )
												
												@php 
													$tabName1 = 'Waiting for Edit';
													$tabName2 = 'Submitted List';
												@endphp	
											
											@elseif( $currentRoleName == 'Admin' )
												
												@php 
													$tabName1 = 'Waiting for Approve';
													$tabName2 = 'Approved List';
												@endphp	
												
											@elseif( $currentRoleName == 'Super Admin' )
												
												@php 
													$tabName1 = 'Waiting for Publish';
													$tabName2 = 'Published List';
												@endphp	
											@else
												@php 
													$tabName1 = 'Newest';
													$tabName2 = 'Oldest';
												@endphp
											@endif
											
											<ul class="nav nav-tabs">
											  <li class="nav-item">
												<a class="nav-link {{ app('request')->input('old_data') == 0 ? 'active' : '' }}" aria-current="page" id="old_data" data-value="0" data-bs-toggle="tab" href="{{ url('single-updates')}}">{{ $tabName1 }}</a>
											  </li>
											  <li class="nav-item">
												<a class="nav-link {{ app('request')->input('old_data') == 1 ? 'active' : '' }}" id="old_data"  data-value="1" data-bs-toggle="tab"  href="{{ url('single-updates')}}">{{ $tabName2 }}</a>
											  </li>
											</ul>
											
											
											
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
										</div>
										
										<div class="card mb-0" id="filter_inputs">
											<div class="card-body pb-0">
											{!! Form::open(array('url' => '', 'method' => '', 'id'=>'searchform', 'name'  => 'searchform')) !!}
								
												<div class="row">
													<div class="col-lg-12 col-sm-12">
														<div class="row">
															<div class="col-lg-3 col-sm-3 col-12">
																<div class="form-group">
																	<label>Client </label>
																	
																	{!! Form::select('client_id', [''=>'Select Client']+$clients,[], array('id' => 'client_id', 'class' => 'form-control',  'tabindex' => '-1', 'aria-hidden' => 'true', 'single' => 'single')) !!} 
																	
																	{!! Form::hidden('old_data', 1, array('placeholder' => 'Enter title','class' => 'form-control ', 'id' => 'old_data_value')) !!}
												
																</div>
															</div>
															
															<div class="col-lg-3 col-sm-3 col-12">
																<div class="form-group">
																	<label>Service </label>
																	
																	{!! Form::select('service_id', [''=>'Select Service']+$service,[], array('id' => 'service', 'class' => 'form-control service',  'tabindex' => '-1', 'aria-hidden' => 'true', 'single' => 'single')) !!} 
																	
																</div>
															</div>
															
																<div class="col-lg-3 col-sm-3 col-12">
																	<div class="form-group">
																		<label>Featured Services <span style="color:red">*</span></label>
																		{!! Form::select('service_cover_area_id', [''=>'Select One']+[],[], array('id' => 'cover-area', 'class' => 'form-control cover-area',  'tabindex' => '-1', 'aria-hidden' => 'true', 'single' => 'single')) !!} 
																	
																		@error('service_cover_area_id')
																			<span class="invalid-feedback">
																				{{ $message }} 
																			</span>
																		@enderror
																							
																	</div>
																</div>
															
															
															
															<div class="col-lg-1 col-sm-6 col-12">
																<div class="form-group">
																	<label> &nbsp; </label>
																	<a id="search_btn" href="{{ url('single-updates/') }}" class="btn btn-filters ms-auto"><img src="{{ asset('public/mine/assets/img/icons/search-whites.svg') }}" alt="img"></a>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="table-responsive">
											<table class="table">
												<thead>
														<th>Sno</th>
														<th>Title </th>
														<th>Approve Status </th>
														<th>News & Event Status </th>
														<th>Feature Showing </th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody id="pagination_data">
												
													@include("backend.single-updates.index-pagination",["data"=>$data])
												
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
					</div>
			
			
			<script>
			
				$(function() {
					
					$(document).on('change', '#service', function() {   
						
							var value = [];
							value = $(this).val();
							//alert(value);
							route = {!! json_encode(url('/')) !!}+'/get-service-cover-area/'+ value;

							emptyFieldClass = ['cover-area'];
							
							targetShowClass = 'cover-area';

							getAutoDropdownRolePermission(targetShowClass, route, emptyFieldClass);

							//alert('Response');

						});
						
						
					
					//$('#filter_search').hide();
					
					$(document).on("click","#btn-category a, #pagination a,  #search_btn, #old_data ",function(){
					
						// start empty field data
						$(document).on("click","#old_data",function(){
							$("#client_id").val("");
							$("#service").val("");
							$("#cover-area").val("");
						});
						// end empty field data
						
						/*var url_params =  new URLSearchParams(window.location.search);
						old_value = url_params.get('old_data');*/
						
						
						var oldValueActive = $(this).attr('data-value');
						if( oldValueActive != "undefined" )
						{
							$("#old_data_value").val(oldValueActive);
						
							if( oldValueActive == 0 )
							{
								//alert('rrr');
								/*$('#filter_search').hide();
								$('#filter_search').removeClass("setclose");
								$('#filter_inputs').hide();
								$('#client_id').select2("val", 0);
								$('#service_id').select2("val", 0);*/
								
								
								var url_params =  new URLSearchParams(window.location.search);
								old_value = url_params.get('old_data');
							}
							else{
								
								$('#filter_search').show();
								//$("#client_id").val("");
								//$("#service").val("");
								//$("#cover-area").val("");
								
								var url_params =  new URLSearchParams(window.location.search);
								old_value = url_params.get('old_data');
								if(old_value == 1)
								{
									$("#old_data_value").val(1);
								}
								
							}
							
							
						}
						
						
						//alert(oldValueActive);
						
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