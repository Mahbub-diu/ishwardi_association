
@php $sno =  ($data->perPage() * ($data->currentPage() - 1)) + 1; @endphp

@if( !empty($data) )
	@foreach($data as $key => $value)
		<tr style="width:300px">
			<!--<td>
				<label class="checkboxs">
					<input type="checkbox">
					<span class="checkmarks"></span>
				</label>
			</td>-->
			<td>{{ $sno++ }}</td>
			<td>{{ $value->client_name }}</td>
			
			<td class="productimgname">
				<span href="javascript:void(0);" class="product-img">
					<img src="{{ asset('storage/app/public/client_logo/'.$value->client_logo) }}" alt="no-image">
				</span>
			</td>
			
			<td>
				<a class="action-set " href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true"> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
				</a>
				
				<ul class="dropdown-menu">
					@can('clients-edit')
					<li>
						<a href="{{ route('our-clients.edit', [$value->id, 'page='.app('request')->input('page')]) }}" class="dropdown-item"><img src="{{ asset('public/mine/assets/img/icons/edit.svg') }}" class="me-2" alt="img">Edit</a>
					</li>
					@endcan
					
					@can('clients-delete')
					<li>
						<a href="javascript:void(0);" class="dropdown-item confirm-text"  id="delete-user"  data-url="{{ route('our-clients.delete', $value->id) }}" ><img src="{{ asset('public/mine/assets/img/icons/delete1.svg') }}" class="me-2" alt="img">Delete</a>
					</li>
					@endcan
				</ul>
			</td>
		</tr>
	@endforeach

@endif


	<tr>	
		<td colspan="4">
			<div id="pagination">
			  {{ $data->links("pagination::bootstrap-5") }}
			</div>
		</td>
	</tr>
	
	<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalert2.all.js') }}"></script>
	<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalerts.js') }}"></script>
   