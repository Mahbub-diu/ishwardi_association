

@php $sno =  ($data->perPage() * ($data->currentPage() - 1)) + 1; @endphp

@if( !empty($data) )
	@foreach($data as $key => $value)
		 <div class="col-md-2col-md-2 col-md-2">
			<div class="team-grid">
				<div class="team-info">
					
						<img src="{{ asset('storage/app/public/client_logo/' . $value->client_logo) }}"
							alt="Client Logo" class="img-fluid">
					
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


