@extends('layouts.app')

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>-->

			
@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">News & Events Deatils </h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('single-updates') }}">News & Events</a></li>
												<li class="breadcrumb-item active">Deatils News & Events</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									
									<div class="row">
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label><strong>Title</strong> </label>
												
												{{ $singleUpdate->title }}
												
											</div>
										</div>
										
									
									{{--<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label><strong>Client</strong> </label>
												
												{{ !empty($clients[$singleUpdate->client_id]) ? $clients[$singleUpdate->client_id] : '' }}
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label><strong>Service</strong></label>
												
												@if ( !empty( $services ) )
												
													@foreach($services as  $ser)
														{{  $ser }}
														<br/>
													@endforeach
												@endif
											
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
											<label><strong>Featured Services</strong></label>
											@if ( !empty( $serviceCoverArea ) )
												
												@foreach($serviceCoverArea as $sV)
													{{ $sV }}
													<br/>
												@endforeach
											@endif
											
											</div>
									</div>--}}
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label><strong>Featured Image</strong></label>
												
												
												<img src="{{ asset('storage/app/public/single-updates/'.$singleUpdate->feature_image)}}" alt="" width="100">
												
											</div>
										</div>
										
										<div class="">
										  <table class="table table-bordered" id="dynamic_field">
											<div class="card-header">
											  <h3 class="card-title">Images</h3>
											</div>
											<tr>
											  <td>
											  @if ( !empty($images) )
													@foreach( $images as $val)
														<img  src="{{ asset( !empty($images[0]) ? 'storage/app/public/single-updates/'.$val : '' ) }}" alt="" width="100">
													@endforeach
												@endif
											  </td>
											</tr>
										  </table>
										</div>
									
										
										
										
										
										<!--<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label><strong>Image 3</strong></label>
												
												<img src="{{ asset( !empty($images[2]) ? 'storage/app/public/ongoing-activities/'.$images[2] : '' ) }}" alt="" width="100">
																								</div>
										</div>-->
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label><strong>Featured Showing</strong></label>
												{{ !empty($singleUpdate->feature_showing == 1) ? 'Yes' : 'No' }}
											
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label><strong>Type</strong></label>
												{{ !empty($singleUpdate->news_event_status == 1) ? 'Event' : 'News' }}
											</div>
										</div>
										
										
										{{--<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label><strong>Total Participants/Beneficiary</strong></label>
												{{ !empty($singleUpdate->total_participate) ? $singleUpdate->total_participate : 'No' }}
											</div>
										</div>--}}
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label><strong>Activity Short Details</strong></label>
												{!!  $singleUpdate->activity_short_details  !!}
											</div>
										</div>
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label><strong>Activity Full Details</strong></label>
												{!!  $singleUpdate->activity_full_details  !!}
											</div>
										</div>
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label><strong>Status</strong></label>
												@if( $singleUpdate->status == 0 )
													Save
												
												@elseif( $singleUpdate->status == 1 )
													Waiting for Editor Submit 
												
												@elseif( $singleUpdate->status == 2 )
													Waiting for Admin Approve
												
												@elseif( $singleUpdate->status == 3 )
													 Rejected by Editor
												
												@elseif( $singleUpdate->status == 4 )
													Wating for Super Admin Publish
												
												@elseif( $singleUpdate->status == 5 )
													Rejected by Admin
												
												@elseif( $singleUpdate->status == 6 )
													<p class="text-success">Published by Super Admin</p>
												
												@else
													Rejected by Super Admin 
												@endif
											</div>
										</div>
										
										
						
										
										<div class="col-lg-12" style="margin-bottom:30px">
											
											<!-- start get edit/cancel button -->
											@if( ($currentRoleName == 'Data Creator' && ($singleUpdate->status == 0  || $singleUpdate->status == 3)) || ($currentRoleName == 'Data Editor' && ($singleUpdate->status == 1 || $singleUpdate->status == 5) ) || ($currentRoleName == 'Admin' && ($singleUpdate->status == 2 || $singleUpdate->status == 7) ) || ( $currentRoleName == 'Super Admin' && ($singleUpdate->status == 4 || $singleUpdate->status == 6 )) ||  $currentRoleName == 'System Admin' )
											
												@can('news-event-edit')
														
														<a href="{{ route('single-updates.edit', [$singleUpdate->id, 'page='.app('request')->input('page'), 'old_data='.app('request')->input('old_data')])  }}" class="btn btn-submit me-2"> Edit </a>
											
														<a href="{{ url('single-updates') }}" class="btn btn-cancel me-2"> Cancel </a>
													
												@endcan	
											
											@endif
											<!-- start get edit/cancel button -->
											
											<!-- start get submit button -->
											@if( ($currentRoleName == 'Data Creator' && ($singleUpdate->status == 0 || $singleUpdate->status == 3))  ||  $currentRoleName == 'System Admin' )
											
													@can( 'news-event-submit' )
														
														<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-approve me-2"  id="delete-user"  key-message="submit"  base-route="{{ url('/') }}" redirect-url="single-updates"  data-url="{{ route('single-updates.submit-approve-publish', $singleUpdate->id) }}" style="background: #198754">Submit</a>
													
													@endcan
													
											@elseif( ($currentRoleName == 'Data Editor' && ($singleUpdate->status == 1 || $singleUpdate->status == 5))   ||  $currentRoleName == 'System Admin' )
												
													@can( 'news-event-submit-reject' )
													
														<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-approve me-2"  id="delete-user"  key-message="submit"   base-route="{{ url('/') }}" redirect-url="single-updates"  data-url="{{ route('single-updates.submit-approve-publish', $singleUpdate->id) }}" style="background: #198754">Submit</a>
												
													@endcan
													
											@endif
											<!-- end get submit button -->
											
											<!-- start get approve button -->
											@if( $currentRoleName == 'Admin' && ($singleUpdate->status == 2 || $singleUpdate->status == 7) ||  $currentRoleName == 'System Admin' )
												
												@can('news-event-approve-reject')
													
													<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-approve me-2"  id="delete-user" key-message="approve"   base-route="{{ url('/') }}"  redirect-url="single-updates" data-url="{{ route('single-updates.submit-approve-publish', $singleUpdate->id) }}" style="background: #198754">Approve</a>
												
												@endcan	
											@endif
											<!-- end get approve button -->
											
											<!-- start get reject button -->
											@if( ($currentRoleName == 'Data Editor' && $singleUpdate->status == 1) ||  $currentRoleName == 'System Admin' )
												
												@can('news-event-submit-reject')
													
													<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-cancel me-2"  id="delete-user" key-message="reject"   base-route="{{ url('/') }}"  redirect-url="single-updates"  data-url="{{ route('single-updates.reject-unpublish', $singleUpdate->id) }}" style="background: #dc3545">Reject</a>
												
												@endcan	
												
											@elseif( ($currentRoleName == 'Admin' && $singleUpdate->status == 2) ||  $currentRoleName == 'System Admin' )
												
												@can('news-event-approve-reject')
													
													<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-cancel me-2"  id="delete-user" key-message="reject"  base-route="{{ url('/') }}"  redirect-url="single-updates" data-url="{{ route('single-updates.reject-unpublish', $singleUpdate->id) }}" style="background: #dc3545">Reject</a>
												
												@endcan	
												
											@endif
											<!-- end get reject button -->
											
											<!-- start get publish button -->
											{{--@if( ($currentRoleName == 'Super Admin' && ($singleUpdate->status == 4 || $singleUpdate->status == 7)  ) ||  $currentRoleName == 'System Admin' )
											--}}
											@if( ($currentRoleName == 'Super Admin' && $singleUpdate->status == 4 ) ||  ($currentRoleName == 'System Admin'  && $singleUpdate->status == 4  ) )
												
												@can('news-event-publish-unpublish')
													
													<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-approve me-2"  id="delete-user" key-message="publish" base-route="{{ url('/') }}"  redirect-url="single-updates"  base-route="{{ url('/') }}"  redirect-url="single-updates"   data-url="{{ route('single-updates.submit-approve-publish', $singleUpdate->id) }}" style="background: #198754">Publish</a>
												
												@endcan	
											@endif
											<!-- end get publish button -->
											
											<!-- start get unpublish button -->
											@if( ($currentRoleName == 'Super Admin'  && ($singleUpdate->status == 4 || $singleUpdate->status == 6 ) ) ||  ($currentRoleName == 'System Admin' && ($singleUpdate->status == 4 || $singleUpdate->status == 6 )) )
												
												@can('news-event-approve-reject')
												
													<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-cancel me-2"  id="delete-user" key-message="unpublish"   base-route="{{ url('/') }}"  redirect-url="single-updates"  data-url="{{ route('single-updates.reject-unpublish', $singleUpdate->id) }}" style="background: #dc3545">Unpublish </a>
												
												@endcan	
												
											@endif
											<!-- end get unpublish button -->
											
											
											
										</div>
										
									</div>
									
								</div>
							</div>
						</div>
					</div>
					
					<script>
							
							
							
							function previewFile(input){
								var file = $("#image1").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg1").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
							
							function previewFile2(input){
								var file = $("#image2").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg2").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
							
							function previewFile3(input){
								var file = $("#image3").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg3").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
							
							function previewFile4(input){
								var file = $("#image4").get(0).files[0];
						 
								if(file){
									var reader = new FileReader();
						 
									reader.onload = function(){
										$("#previewImg4").attr("src", reader.result);
									}
						 
									reader.readAsDataURL(file);
								}
							}
							

						/*CKEDITOR.replace('activity_full_details');  
					  
						function getData() {  
							//Get data written in first Editor   
							var editor_data = CKEDITOR.instances['activity_full_details'].getData();  
							//Set data in Second Editor which is written in first Editor   
						} */
						
						
						tinymce.init({
						selector: '#activity_full_details',
						plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
						toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
						});
						
						
						
						$(document).on('change', '#service', function() {   
						
							var value = [];
							value = $(this).val();
							//alert(value);
							route = {!! json_encode(url('/')) !!}+'/get-service-cover-area/'+ value;

							emptyFieldClass = ['cover-area'];
							
							targetShowClass = 'cover-area';

							getAutoDropdownRolePermission(targetShowClass, route, emptyFieldClass);

							//alert('Response');

						});	
					</script>
					
					<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalert2.all.js') }}"></script>
					<script src="{{ asset('public/mine/assets/plugins/sweetalert/sweetalerts.js') }}"></script>
   
   
					@endsection