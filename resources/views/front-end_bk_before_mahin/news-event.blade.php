@extends('layouts.app-frontend')
 
@section('content')
   <section class="contact-banner-main"
        style="background: url({{ url('storage/app/public/page-top-configurations/'.$pageTopData['top_banner_image'])}}) !important;background-size: cover;background-repeat: no-repeat;background-position: center center;">
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

    <section class="news-main">
        <div class="container">
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                    <div class="common-title-box">
					
                        @if ( $data->isEmpty() ) 
							 <div class="common-see-all">
									<a href="#" class="as-btn" id="no-job">News (0)</a>
									
									<p style="margin-top:50px" id="show-text"></p>
								</div>
						
						@else
							
							<h2> {{ !empty($pageTopData['page_heading']) ? $pageTopData['page_heading'] : ''}} </h2>
						@endif

                    </div>
                </div>
            </div>
			
            <div class="row" id="pagination_data">
			
			
					@include("front-end.news-event-pagination",["data"=>$data])
				
				
            </div>
			
            <!--<div class="row">
                <div class="common-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>-->
			

        </div>
    </section>
	
	<script>
	
			
		$(function() {

			$(document).on("click","#no-job",function(){
				
				$("#show-text").html("We are currently not showing any news. Thank you.");
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
