@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
							<div class="content">
								<div class="page-header">
									<div class="page-title">
										<h4> Page Top Configuration List</h4>
										<h6>Manage Page Top Configuration</h6>
									</div>
									
									@can('service-create')
									<!--<div class="page-btn">
										<a href="{{ url('service-cover-areas/create') }}" class="btn btn-added"><img src="{{ asset('public/mine/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add Featured Service</a>
									</div>-->
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
														<th>Page Name  </th>	
														<th>Page Heading  </th>	
														<th>Short Description  </th>
														<th>Banner Image  </th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody   id="pagination_data">
												
													@include("backend.page-top-configurations.index-pagination",["data"=>$data])
												
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
				var product_top_cat_id = searchParams.get('product_top_cat_id');
			  
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