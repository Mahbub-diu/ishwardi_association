@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


@section('content')


										
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Edit  Page Top Configuration</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('page-top-configurations') }}"> Default/Services </a></li>
												<li class="breadcrumb-item active">Edit Page Top Configurations</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::model($pageTopConfiguration, ['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'route' => ['page-top-configurations.update', $pageTopConfiguration->id]]) !!}
									
										@php 
											$page_name = '';
											$page_heading = '';
											$top_banner_image = '';
											$top_banner_short_paragraph = '';
										@endphp
										
										
										@error('page_name')
										  @php $page_name = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('page_heading')
										  @php $page_heading = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('top_banner_image')
										  @php $top_banner_image = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('top_banner_short_paragraph')
										  @php $top_banner_short_paragraph = 'is-invalid border-red'; @endphp
										@enderror
										
										
										
										
										
									<div class="row">
										
										
											
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Page Name <span style="color:red">*</span></label>
												{!! Form::text('page_name', null, array('placeholder' => 'Enter  page name', 'disabled' => 'true', 'class' => 'form-control '.$page_name)) !!}

												@error('page_name')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Page Heading<span style="color:red">*</span></label>
												{!! Form::text('page_heading', null, array('placeholder' => 'Enter  page heading', 'class' => 'form-control '.$page_heading)) !!}

												@error('page_heading')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Top Banner Image <span style="color:red">(Image Size: 1920 x 140) *</span></label>
												{!! Form::file('top_banner_image', array('onchange' => 'previewFile(this)', 'id' => 'image', 'class' => 'form-control '.$top_banner_image)) !!}
												
													
												@error('top_banner_image')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
												
												<img id="previewImg" src="{{ asset( !empty($pageTopConfiguration->top_banner_image) ? 'storage/app/public/page-top-configurations/'.$pageTopConfiguration->top_banner_image : '' ) }}" alt="" width="100">
												
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Top Banner Short Paragraph    {{--<span style="color:red">*</span>--}}</label>
												{!! Form::textarea('top_banner_short_paragraph', null, array('placeholder' => 'Enter short description','class' => 'form-control '.$top_banner_short_paragraph)) !!}

												@error('top_banner_short_paragraph')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
						
										
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Update</button>
											<a href="{{ url('page-top-configurations') }}" class="btn btn-cancel">Cancel</a>
										</div>
									</div>
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					@endsection
					
					<script>
							
							function previewFile(input){
								
								var file = $("#image").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
					</script>