@extends('layouts.app-frontend')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


@section('content')
    <section class="contact-banner-main"
        style="background: url('{{ url('storage/app/public/page-top-configurations/'.$pageTopData['top_banner_image'])}}') !important;background-size: cover;background-repeat: no-repeat;background-position: center center;">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="about-content-box">
                        <p>{{ !empty($pageTopData['top_banner_short_paragraph']) ? $pageTopData['top_banner_short_paragraph'] : ''}}</p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="our-clients-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                    <div class="common-title-box " >
                        <h2 >{{ !empty($pageTopData['page_heading']) ? $pageTopData['page_heading'] : ''}} </h2>

                    </div>
                </div>
            </div>

             <div class="row  " id="pagination_data">
			
			
					@include("front-end.clients-pagination",["data" => $data])
				
				
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 row-prv-lod" style="text-align:center;display:none">
                    <button type="button" id="prv" class="btn btn-warning prv" style="width:50px !important;">
                        <i class="ri-arrow-left-s-line"></i>
                    </button>

                    <button type="button" id="lod" class="btn btn-warning lod" style="width:50px !important;">
                        <i class="ri-arrow-right-s-line"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>
	
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
