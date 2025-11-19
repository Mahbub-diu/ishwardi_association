@extends('layouts.app')

@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add New Gallery</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('galleries') }}">Galleries</a></li>
												<li class="breadcrumb-item active">Add Galleries</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::open(array('route' => 'galleries.store', 'method'=>'POST',  'enctype' => 'multipart/form-data' )) !!}
										@php 
											$gallery_category_id = '';
											$title = '';
											$image = '';
										@endphp
										
										@error('gallery_category_id')
										  @php $gallery_category_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('title')
										  @php $title = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('image')
										  @php $image = 'is-invalid border-red'; @endphp
										@enderror
										
										
									<div class="row">
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Gallery Category</label>
												{!! Form::select('gallery_category_id', [''=>'Select One']+$galleryCategory,[], array('id' => '', 'class' => 'form-control form-small select select2-hidden-accessible '.$gallery_category_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'single' => 'single')) !!} 
												
												@error('gallery_category_id')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Title</label>
												{!! Form::text('title', null, array('placeholder' => 'Enter designation','class' => 'form-control '.$title)) !!}
												@error('title')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
                                               
												<div class="form-group">
													<label>Image</label>
													{!! Form::file('image', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile(this)', 'id' => 'image', 'class' => 'form-control '.$image)) !!}
													
													<img id="previewImg" src="/examples/images/transparent.png" alt="" width="100">
														
													@error('image')
														<span class="invalid-feedback" style="display:block">
															{{ $message }}
														</span>
													@enderror
												</div>
										</div>
										
						
										
										<div class="col-lg-12">
											<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Submit</button>
											<a href="{{ url('galleries') }}" class="btn btn-cancel">Cancel</a>
										</div>
									</div>
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					
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
					@endsection