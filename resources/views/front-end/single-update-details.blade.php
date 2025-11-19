@extends('layouts.app-frontend')

<link rel="stylesheet" href="{{ asset('public/gallery/css/viewer.css') }}">
	<link rel="stylesheet" href="{ asset('public/gallery/css/main.css') }}">
	
    <style>

.image-container {
    position: relative;
    overflow: hidden;
    border-radius: 4px;
  }

  .image-container button {
    border: none;
    width: 100%;
    height: 100%;
    padding: 0;
  }

  .image-container img {
    width: 100%;
    height: 100% !important;
    object-fit: cover;
    object-position: center center;
    border-radius: inherit;
  }
    </style>

@section('content')
    <section class="contact-banner-main"
        style="background: url('{{ asset('public/front-end/img/mahbub/inner_02.jpg') }}');background-size: cover;background-repeat: no-repeat;background-position: center center;">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="about-content-box">
                        <h3>News & Event details</h3>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="blog-main">
        <div class="container">
            <div class="row">
				 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center;">
						<div class="news-post-title">
                                <h4 class="news-title">{{ $dataDetails->title }}</h4>
                        </div>
				 </div>
			</div>
			
             <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <div class="gallerynew row gy-4 docs-pictures clearfix justify-content-center">
							@if( !empty( $dataDetails->feature_image ) )
									
								<!-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">
                                    <div class="consultancy">
                                        <button style="border:none;border-radius:9px">
                                            <img src="{{ asset('storage/app/public/single-updates/'.$dataDetails->feature_image) }}" data-original="{{ asset('storage/app/public/single-updates/'.$dataDetails->feature_image) }}" alt=""> 
                                        </button>
                                    </div>
								</div> -->
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="consultancy">
                                        <div class="image-container">
                                        <button>
                                            <img src="{{ asset('storage/app/public/single-updates/'.$dataDetails->feature_image) }}" data-original="{{ asset('storage/app/public/single-updates/'.$dataDetails->feature_image) }}" alt="">
                                        </button>
                                        </div>
                                    </div>
                                </div>

        
							 @endif
							
							
						
					

							 
							 @if( !empty( $otherImages ) )

								@foreach( $otherImages as $img)
									
									@if( !empty($img) )
										<!-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">
											<div class="consultancy">
												<button style="border:none;border-radius:9px">
													<img src="{{ asset('storage/app/public/single-updates/'.$img) }}" data-original="{{ asset('storage/app/public/single-updates/'.$img) }}" alt=""> 
												</button>
											</div>
										</div> -->

                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                            <div class="consultancy">
                                                <div class="image-container">
                                                <button>
                                                    <img src="{{ asset('storage/app/public/single-updates/'.$img) }}" data-original="{{ asset('storage/app/public/single-updates/'.$img) }}" alt="">
                                                </button>
                                                </div>
                                            </div>
                                        </div>

                            
									@endif
								@endforeach

							 @endif

               
					</div>
				</div>
            </div>

            @if( !empty( $dataDetails->feature_image ) )
				<div class="row">
					<div class="news-post-text">
						<p>
							{!! $dataDetails->activity_full_details !!}
						</p>
					</div>
				</div>
			@endif

           
            </div>
			
			
            
        </div>
    </section>

    <script src="https://unpkg.com/jquery@3/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
	  <script src="{{ asset('public/gallery/js/viewer.js') }}"></script>
	  <script src="{{ asset('public/gallery/js/main.js') }}"></script>

@endsection

