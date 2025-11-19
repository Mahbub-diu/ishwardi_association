@extends('layouts.app-frontend')


@section('content')
    <section class="contact-banner-main">
        <div class="container">
			
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="about-content-box">
                        <h2>gallary</h2>
                        <p class="">Stay informed with the latest news and updates from IPTM right at your fingertips.
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
                     <a href="{{ url('gallery') }}" style="float:left"> 
					 <i class="fa fa-arrow-left" aria-hidden="true"></i> Back  </a>
					<div class="common-title-box">
                       
						<h2> gallary - {{$galleryName}}</h2>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div id="projects">

                        <!-- <ul id="gallery">-->
                        <div class="gallerynew row">
							 @include('front-end.gallery-pagination', ['data' => $data])

                        </div>
                    </div>

					{{--<div id="pagination">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>--}}

                    <!-- modal gallery -->
                    {{--<div class="gallery">
                        <div class="custom-popup">
                            <a class="close" href="#">
                                <i>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </i>
                            </a>
                            <img src="">
                        </div>
                    </div> --}}


                </div>
            </div>



        </div>
    </div>
@endsection



@push('script')
    <script>
        $(document).ready(function() {
			
			$('nav.gallary-category a').on('click', function(event) {
                event.preventDefault();

                $('nav li.current').removeClass('current');
                $(this).parent().addClass('current');


                $('h1.heading').text($(this).text());


                var category = $(this).text().toLowerCase().replace(' ', '-');

                if (category == 'all-projects') {
                    $('ul#gallery li:hidden').fadeIn('slow').removeClass('hidden');
                } else {
                    $('ul#gallery li').each(function() {
                        if (!$(this).hasClass(category)) {
                            $(this).hide().addClass('hidden');
                        } else {
                            $(this).fadeIn('slow').removeClass('hidden');
                        }
                    });
                }
                return false;
            });

            $('ul#gallery a').on('click', function(event) {
                event.preventDefault();
                var link = $(this).find('img').attr('src');
                $('.gallery img').attr('src', '');
                $('.gallery img').attr('src', link);
                $('.gallery').fadeIn('slow');
            });

            $('.gallery').on('click', function(event) {
                event.preventDefault();
                $('.gallery').fadeOut('slow');
            });
        	
			
            $('.consultancy').magnificPopup({
				
                delegate: 'a', // Selector for the items that open the lightbox
                type: 'image',
				
			   gallery: {
                    enabled: true
                }
            });
			
			//$('.gallerynew').magnificPopup('close');
        });



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


    <script>
        $(document).ready(function() {
            $('.pagination .page-item').click(function() {

                $('.pagination .page-item').removeClass('active');


                $(this).addClass('active');
            });
        });
    </script>
@endpush
