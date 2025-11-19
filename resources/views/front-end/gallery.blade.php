@extends('layouts.app-frontend')
	
	<link rel="stylesheet" href="{{ asset('public/gallery/css/viewer.css') }}">
	<link rel="stylesheet" href="{ asset('public/gallery/css/main.css') }}">
	

@section('content')
      <section class="contact-banner-main"
        style="background: url('{{ url('storage/app/public/page-top-configurations/'.$pageTopData['top_banner_image'])}}') !important;background-size: cover;background-repeat: no-repeat;background-position: center center;">
		<div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="about-content-box">
                        {{-- <h2>latest news</h2> --}}
                        <p class="">{{ !empty($pageTopData['top_banner_short_paragraph']) ? $pageTopData['top_banner_short_paragraph'] : ''}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="gallary-main">
        <div class="container">
			
		
			
			
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                     <a href="{{ url('photo-gallery') }}" style="float:left"> 
					 <i class="fa fa-arrow-left" aria-hidden="true"></i> Back  </a>
					<div class="common-title-box">
                       
						<h2> gallary - {{$galleryName}}</h2>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                       <!-- <ul id="gallery">-->
                        <div class="gallerynew row gy-4 docs-pictures clearfix">
							 @include('front-end.gallery-pagination', ['data' => $data])

                        </div>




                </div>
            </div>



        </div>
    </div>
	

@endsection



@push('script')
    <script>
        


        $(function() {

            $(document).on("click", "#btn-category a, #pagination a,#search_btn", function() {

                var searchParams = new URLSearchParams(window.location.search);

                //get url and make final url for ajax 
                var url = $(this).attr("href");
                //alert(url);
                var append = url.indexOf("?") == -1 ? "?" : "&";

                var finalURL = url + append + $("#searchform").serialize();

                //set to current url
                window.history.pushState({}, null, finalURL);


                $.get(finalURL, function(data) {
                    //console.log(data);
                    $(".gallerynew").html(data);
                });
				
                return false;
            })

        });
    </script>
		
	 <!-- Scripts -->
	  <script src="https://unpkg.com/jquery@3/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
	  <script src="{{ asset('public/gallery/js/viewer.js') }}"></script>
	  <script src="{{ asset('public/gallery/js/main.js') }}"></script>
	  

@endpush
