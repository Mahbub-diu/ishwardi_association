

@php $sno =  ($data->perPage() * ($data->currentPage() - 1)) + 1; @endphp

@if( !empty($data) )
	@foreach($data as $key => $value)
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			
			<div class="blog-card">
				@if( !empty( $value->feature_image ) )
					
					<div class="blog-img" style="height:200px">
						<img src="{{ asset('storage/app/public/single-updates/' . $value->feature_image) }}"
							alt="">
					</div>
					
					<div class="blog-content">
						<h4 class="po-color blog-title">
								{{ !empty($value->title) ? strlen($value->title) > 70 ? substr($value->title,0,70).'...' : $value->title	 : '' }}<br/>
							
						</h4>
						<a href="{{ url('news-event-details/'.$value->id) }}" class="link-btn">Read Details<i class="fas fa-arrow-right"></i></a>
					</div>
				@else
					<div class="blog-img" style="height:280px">
						<p class="po-color blog-title">
							<a href="#">
								{{ !empty($value->title) ?  $value->title : '' }}<br/>
							</a>
						</p>
					</div>
					
					<div class="blog-content">
						
						<a href="{{ url('ongoing-com-news-details/'.$value->id) }}" class="link-btn">Read Details<i class="fas fa-arrow-right"></i></a>
					</div>
				@endif
			</div>
			
			
		</div>

	@endforeach

@else
	Data not found !
@endif


<div id="pagination">
  {{ $data->links("pagination::bootstrap-5") }}
</div>


