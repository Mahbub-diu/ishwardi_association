	@php $sno =  ($data->perPage() * ($data->currentPage() - 1)) + 1; @endphp

	@if (!empty($data))
		@foreach ($data as $key => $value)
		@php
			$titleName = !empty($value) ? array_keys($value) : '';
			$titleName = ( strlen( $titleName[0] ) > 70 ) ? substr($titleName[0] , 0, 70).'...' : $titleName[0];
			
			$imageName = !empty($value) ? array_values($value) : '';
			
		@endphp
		
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<div class="consultancy">
				<a href="{{ asset('storage/app/public/'.$imageFolderName.'/' . $imageName[0]) }}">
					<img src="{{ asset('storage/app/public/'.$imageFolderName.'/' . $imageName[0]) }}">
				</a>
				<div class="gallry-image-title text-center" style="color:#2dc271">{{ $titleName  }}</div>
			</div>
		</div>
		
		<script>
			$('.consultancy').magnificPopup({
				
                delegate: 'a', // Selector for the items that open the lightbox
                type: 'image',
				
			   gallery: {
                    enabled: true
                }
            });
		</script>
		@endforeach
	@else
		Data not found !
	@endif
	
	 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 <div id="pagination">
			 {{ $data->links('pagination::bootstrap-5') }}
		 </div>
	 </div>
	

