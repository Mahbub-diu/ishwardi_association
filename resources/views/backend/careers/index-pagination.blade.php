
@php $sno =  ($data->perPage() * ($data->currentPage() - 1)) + 1; @endphp

@if( !empty($data) )
	@foreach($data as $key => $value)
		<tr>
			<!--<td>
				<label class="checkboxs">
					<input type="checkbox">
					<span class="checkmarks"></span>
				</label>
			</td>-->
			<td>{{ $sno++ }}</td>
			<td>{{ $value->job_title }}</td>
			
			<td class="productimgname">
				<span href="javascript:void(0);" class="product-img">
					<a href="{{ asset('storage/app/public/careers/'.$value->circular_file) }}" target="_blank"><i class="fa fa-file-pdf" style="font-size:40px"></i></a>
											
				</span>
			</td>
			
			<td>
				<a class="action-set " href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true"> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
				</a>
				
				<ul class="dropdown-menu">
					@can('career-edit')
					<li>
						<a href="{{ route('careers.edit', [$value->id, 'page='.app('request')->input('page')]) }}" class="dropdown-item"><img src="{{ asset('public/mine/assets/img/icons/edit.svg') }}" class="me-2" alt="img">Edit</a>
					</li>
					@endcan
					
					@can('career-delete')
					<li>
						<a href="javascript:void(0);" class="dropdown-item confirm-text"  id="delete-user"  data-url="{{ route('careers.delete', $value->id) }}" ><img src="{{ asset('public/mine/assets/img/icons/delete1.svg') }}" class="me-2" alt="img">Delete</a>
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
   