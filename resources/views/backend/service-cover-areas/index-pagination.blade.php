
@php $sno =  ($data->perPage() * ($data->currentPage() - 1)) + 1; @endphp

@if( !empty($data) )
	@foreach($data as $key => $value)
		<tr>
			
			<td>{{ $sno++ }}</td>
			<td>{{ !empty($services[$value->service_id]) ? $services[$value->service_id] : '' }}</td>
			
			<td >
				@if( $value->parent_id > 0  )
				 {{ !empty($parentList[$value->parent_id]) ? $parentList[$value->parent_id] : ''  }} >>
					<strong>{{ $value->area_name  }}</strong>
				@else
					{{ $value->area_name  }}
				@endif
			</td>
			<td>{{ $value->sort_order }}</td>
			
			<td class="productimgname">
				<span href="javascript:void(0);" class="product-img">
					<img src="{{ asset('storage/app/public/service-cover-areas/'.$value->area_icon) }}" alt="no-image">
				</span>
			</td>
			
			<!--<td>{{ $value->sort_order }}</td>-->
			
			<td>
				<a class="action-set " href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true"> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
				</a>
				
				<ul class="dropdown-menu">
					@can('featured-service-edit')
					<li>
						<a href="{{ route('service-cover-areas.edit', [$value->id, 'page='.app('request')->input('page')]) }}" class="dropdown-item"><img src="{{ asset('public/mine/assets/img/icons/edit.svg') }}" class="me-2" alt="img">Edit</a>
					</li>
					@endcan
					
					@can('featured-service-delete')
					<li>
						<a href="javascript:void(0);" class="dropdown-item confirm-text"  id="delete-user"  data-url="{{ route('service-cover-areas.delete', $value->id) }}" ><img src="{{ asset('public/mine/assets/img/icons/delete1.svg') }}" class="me-2" alt="img">Delete</a>
					</li>
					@endcan
				</ul>
			</td>
		</tr>
	@endforeach
@else
	<div class="col-12">
		<p class="text-danger"><b>Data not found !</b></p>
	</div>
@endif


	<tr>	
		<td colspan="7">
			<div id="pagination">
			  {{ $data->links("pagination::bootstrap-5") }}
			</div>
		</td>
	</tr>
	
	<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalert2.all.js') }}"></script>
	<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalerts.js') }}"></script>
   