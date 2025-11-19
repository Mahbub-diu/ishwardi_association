
@php $sno =  ($data->perPage() * ($data->currentPage() - 1)) + 1; @endphp

@if( !empty($data) )
	@foreach($data as $key => $value)
		@if( $value->email != 'sys_admin@iptm.com.bd')
		<tr>
			<!--<td>
				<label class="checkboxs">
					<input type="checkbox">
					<span class="checkmarks"></span>
				</label>
			</td>-->
			<td>{{ $sno++ }}</td>
			<td>{{ $value->name }}</td>
			
			
			<td>{{ $value->email }}</td>
			<td>  
				@if(!empty($value->getRoleNames()))

					@foreach($value->getRoleNames() as $v)
					
					   {{ $v }}

					@endforeach

				@endif
			</td>
			
			<td>
				<a class="action-set " href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true"> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
				</a>
				
				<ul class="dropdown-menu">
					<li>
						<a href="{{ route('users.show', $value->id) }}" class="dropdown-item"><img src="{{ asset('public/mine/assets/img/icons/eye1.svg') }}" class="me-2" alt="img">More</a>
					</li>
					
					@can('user-edit')
					<li>
						<a href="{{ route('users.edit', [$value->id, 'page='.app('request')->input('page')]) }}" class="dropdown-item"><img src="{{ asset('public/mine/assets/img/icons/edit.svg') }}" class="me-2" alt="img">Edit</a>
					</li>
					@endcan
					
					@can('user-delete')
					<li>
						<a href="javascript:void(0);" class="dropdown-item confirm-text"  id="delete-user"  data-url="{{ route('users.delete', $value->id) }}" ><img src="{{ asset('public/mine/assets/img/icons/delete1.svg') }}" class="me-2" alt="img">Delete</a>
					</li>
					@endcan
					
				</ul>
			</td>
		</tr>
		@endif
	@endforeach
@else
	<div class="col-12">
		<p class="text-danger"><b>User not found !</b></p>
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
   