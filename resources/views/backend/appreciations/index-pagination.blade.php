
@php $sno =  ($data->perPage() * ($data->currentPage() - 1)) + 1; @endphp

@if( !empty($data) )
	@foreach($data as $key => $value)
		<tr>
			
			<td>{{ $sno++ }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->company_name }}</td>
			<td>{{ $value->designation }}</td>
			
			<td class="productimgname">
				<span href="javascript:void(0);" class="product-img">
					<img src="{{ asset('storage/app/public/appreciations/'.$value->photo) }}" alt="no-image">
				</span>
			</td>
			
			<td>
				<a class="action-set " href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true"> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
				</a>
				
				<ul class="dropdown-menu">
					@can('appreciation-edit')
					<li>
						<a href="{{ route('appreciations.edit', $value->id) }}" class="dropdown-item"><img src="{{ asset('public/mine/assets/img/icons/edit.svg') }}" class="me-2" alt="img">Edit</a>
					</li>
					@endcan
					
					@can('appreciation-delete')
					<li>
						<a href="javascript:void(0);" class="dropdown-item confirm-text"  id="delete-user"  data-url="{{ route('appreciations.delete', $value->id) }}" ><img src="{{ asset('public/mine/assets/img/icons/delete1.svg') }}" class="me-2" alt="img">Delete</a>
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
		<td colspan="8">
			<div id="pagination">
			  {{ $data->links("pagination::bootstrap-4") }}
			</div>
		</td>
	</tr>
	
	<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalert2.all.js') }}"></script>
	<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalerts.js') }}"></script>
   