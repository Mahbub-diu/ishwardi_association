
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
			
			<td>{{ !empty($value->title) ? strlen($value->title) > 20 ? substr($value->title,0,20).'.....' : $value->title	 : '' }}</td>
			
			<td>
				@if( $value->status == 0 )
					Save
				
				@elseif( $value->status == 1 )
					Waiting for Editor Submit 
				
				@elseif( $value->status == 2 )
					Waiting for Admin Approve
				
				@elseif( $value->status == 3 )
					 Rejected by Editor
				
				@elseif( $value->status == 4 )
					Wating for Super Admin Publish
				
				@elseif( $value->status == 5 )
					Rejected by Admin
				
				@elseif( $value->status == 6 )
					<p class="text-success">Published by Super Admin</p>
				
				@else
					Rejected by Super Admin 
				@endif
			</td>
			
			<td>{{ ($value->completed_status == 0) ? 'Ongoing' : 'Completed' }}</td>
			<td>{{ ($value->feature_showing == 0) ? 'No' : 'Yes' }}</td>
			
			<td>
				<a class="action-set " href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true"> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
					<i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
				</a>
				
				<ul class="dropdown-menu">
					
					<li>
						<a href="{{ route('single-updates.show', [$value->id, 'page='.app('request')->input('page'), 'old_data='.app('request')->input('old_data')])  }}" class="dropdown-item"><i class="fa fa-eye" style="font-size:18px;margin-right:5px"></i>View </a>
					</li>
					
					
						
					@can('news-event-delete')
						
						@if( ($currentRoleName == 'Data Creator') && ($value->status == 0) )
							
							<li>
								<a href="javascript:void(0);" class="dropdown-item confirm-text"  id="delete-user"  data-url="{{ route('single-updates.delete', $value->id) }}" ><i class="fa fa-trash" style="font-size:18px;margin-right:5px"></i>Delete</a>
							</li>
							
						@elseif( $currentRoleName == 'Super Admin'  || $currentRoleName == 'System Admin')
							<li>
								<a href="javascript:void(0);" class="dropdown-item confirm-text"  id="delete-user"  data-url="{{ route('single-updates.delete', $value->id) }}" ><i class="fa fa-trash" style="font-size:18px;margin-right:5px"></i>Delete</a>
							</li>
						@endif
						
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
   