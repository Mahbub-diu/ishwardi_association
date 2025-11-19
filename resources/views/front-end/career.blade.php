@extends('layouts.app-frontend')


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
	
    <section class="carrer-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                    <div class="common-title-box">
						@if ( $data->isEmpty() ) 
							 <div class="common-see-all">
									<a href="#" class="as-btn" id="no-job">Job Vacancy (0)</a>
									
									<p style="margin-top:50px" id="show-text"></p>
								</div>
						
						@else
							
							<h2> {{ !empty($pageTopData['page_heading']) ? $pageTopData['page_heading'] : ''}} </h2>
						@endif
					   

                    </div>
                </div>
            </div>

            <div class="row jobs-row" id="pagination_data">
			
			
					@include("front-end.career-pagination",["data"=>$data])
				
				
            </div>
                
                
            </div>

           
        </div>
    </section>
	
	<script>
	
			
		$(function() {

			
			$(document).on("click","#no-job",function(){
				
				$("#show-text").html("We are currently not hiring for any full time position.");
			});
			
			
			
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
