

@php $sno =  ($data->perPage() * ($data->currentPage() - 1)) + 1; @endphp

@if( !empty($data) )
	@foreach($data as $key => $value)
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="card">
					<div class="card-body">
						<div class="job-title">
							<h3>{{ $value->job_title }}</h3>
						</div>
						<div class="job-description">
							<p>
							@php
								$text180 = '';
				
								if( strlen($value->short_details ) > 180 ){
									
									$text180 = substr($value->short_details, 0, 180);
									
								}else{
									$text180 = $value->short_details;
								}
							@endphp
							
							{{ $text180 }} <a href="{{ url('storage/app/public/careers/'.$value->circular_file) }}" target="_blank">Read more...</a>
								
								
							</p>
						</div>
						
							<a href="{{ url('career/'.$value->id) }}" class="link-btn">Apply Now<i class="fas fa-arrow-right"></i></a>
						
					</div>
				</div>
			</div>

	@endforeach

@else
	Data not found !
@endif


<div id="pagination">
  {{ $data->links("pagination::bootstrap-5") }}
</div>


