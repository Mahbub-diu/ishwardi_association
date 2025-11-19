@extends('layouts.app')

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>-->

			
@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Deatils  Activity</h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('ongoing-activities') }}">Ongoing Activities</a></li>
												<li class="breadcrumb-item active">Deatils Activity</li>
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
												
												{{ $ongoingActivity->title }}
												
											</div>
										</div>
										
									
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label><strong>Client</strong> </label>
												
												{{ !empty($clients[$ongoingActivity->client_id]) ? $clients[$ongoingActivity->client_id] : '' }}
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
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label><strong>Featured Image</strong></label>
												
												
												<img src="{{ asset('storage/app/public/ongoing-activities/'.$ongoingActivity->feature_image)}}" alt="" width="100">
												
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label><strong>Image 1</strong></label>
												<img  src="{{ asset( !empty($images[0]) ? 'storage/app/public/ongoing-activities/'.$images[0] : '' ) }}" alt="" width="100">
													
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label><strong>Image 2</strong></label>
												
												<img  src="{{ asset( !empty($images[1]) ? 'storage/app/public/ongoing-activities/'.$images[1] : '' ) }}" alt="" width="100">
													
											</div>
										</div>
										
										
										<!--<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label><strong>Image 3</strong></label>
												
												<img src="{{ asset( !empty($images[2]) ? 'storage/app/public/ongoing-activities/'.$images[2] : '' ) }}" alt="" width="100">
																								</div>
										</div>-->
										
										
										<div class="col-lg-3 col-sm-3 col-3">
											<div class="form-group">
												<label><strong>Featured Showing</strong></label>
												{{ !empty($ongoingActivity->feature_showing == 1) ? 'Yes' : 'No' }}
											
											</div>
										</div>
										
										<div class="col-lg-3 col-sm-3 col-3">
											<div class="form-group">
												<label><strong>Completed Project</strong></label>
												{{ !empty($ongoingActivity->completed_status == 1) ? 'Yes' : 'No' }}
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label><strong>Total Participants/Beneficiary</strong></label>
												{{ !empty($ongoingActivity->total_participate) ? $ongoingActivity->total_participate : 0 }}
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label><strong>Sample Size</strong></label>
												{{ !empty($ongoingActivity->sample_size) ? $ongoingActivity->sample_size : '' }}
											</div>
										</div>
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label><strong>Activity Short Details</strong></label>
												{!!  $ongoingActivity->activity_short_details  !!}
											</div>
										</div>
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label><strong>Activity Full Details</strong></label>
												{!!  $ongoingActivity->activity_full_details  !!}
											</div>
										</div>
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label><strong>Status</strong></label>
												@if( $ongoingActivity->status == 0 )
													Save
												
												@elseif( $ongoingActivity->status == 1 )
													Waiting for Editor Submit 
												
												@elseif( $ongoingActivity->status == 2 )
													Waiting for Admin Approve
												
												@elseif( $ongoingActivity->status == 3 )
													 Rejected by Editor
												
												@elseif( $ongoingActivity->status == 4 )
													Wating for Super Admin Publish
												
												@elseif( $ongoingActivity->status == 5 )
													Rejected by Admin
												
												@elseif( $ongoingActivity->status == 6 )
													<p class="text-success">Published by Super Admin</p>
												
												@else
													Rejected by Super Admin 
												@endif
											</div>
										</div>
										
										
						
										
										<div class="col-lg-12" style="margin-bottom:30px">
											
											<!-- start get edit/cancel button -->
											@if( ($currentRoleName == 'Data Creator' && ($ongoingActivity->status == 0  || $ongoingActivity->status == 3)) || ($currentRoleName == 'Data Editor' && ($ongoingActivity->status == 1 || $ongoingActivity->status == 5) ) || ($currentRoleName == 'Admin' && ($ongoingActivity->status == 2 || $ongoingActivity->status == 7) ) || ( $currentRoleName == 'Super Admin' && ($ongoingActivity->status == 4 || $ongoingActivity->status == 6 )) ||  $currentRoleName == 'System Admin' )
											
												@can('ongoing-activities-edit')
														
														<a href="{{ route('ongoing-activities.edit', [$ongoingActivity->id, 'page='.app('request')->input('page'), 'old_data='.app('request')->input('old_data')])  }}" class="btn btn-submit me-2"> Edit </a>
											
														<a href="{{ url('ongoing-activities') }}" class="btn btn-cancel me-2"> Cancel </a>
													
												@endcan	
											
											@endif
											<!-- start get edit/cancel button -->
											
											<!-- start get submit button -->
											@if( ($currentRoleName == 'Data Creator' && ($ongoingActivity->status == 0 || $ongoingActivity->status == 3))  ||  $currentRoleName == 'System Admin' )
											
													@can( 'ongoing-activities-submit' )
														
														<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-approve me-2"  id="delete-user"  key-message="submit"  base-route="{{ url('/') }}"  redirect-url="ongoing-activities"   data-url="{{ route('ongoing-activities.submit-approve-publish', $ongoingActivity->id) }}" style="background: #198754">Submit</a>
													
													@endcan
													
											@elseif( ($currentRoleName == 'Data Editor' && ($ongoingActivity->status == 1 || $ongoingActivity->status == 5))   ||  $currentRoleName == 'System Admin' )
												
													@can( 'ongoing-activities-submit-reject' )
													
														<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-approve me-2"  id="delete-user"  key-message="submit"  base-route="{{ url('/') }}" redirect-url="ongoing-activities"  data-url="{{ route('ongoing-activities.submit-approve-publish', $ongoingActivity->id) }}" style="background: #198754">Submit</a>
												
													@endcan
													
											@endif
											<!-- end get submit button -->
											
											<!-- start get approve button -->
											@if( $currentRoleName == 'Admin' && ($ongoingActivity->status == 2 || $ongoingActivity->status == 7) ||  $currentRoleName == 'System Admin' )
												
												@can('ongoing-activities-approve-reject')
													
													<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-approve me-2"  id="delete-user" key-message="approve"   base-route="{{ url('/') }}" redirect-url="ongoing-activities" data-url="{{ route('ongoing-activities.submit-approve-publish', $ongoingActivity->id) }}" style="background: #198754">Approve</a>
												
												@endcan	
											@endif
											<!-- end get approve button -->
											
											<!-- start get reject button -->
											@if( ($currentRoleName == 'Data Editor' && $ongoingActivity->status == 1) ||  $currentRoleName == 'System Admin' )
												
												@can('ongoing-activities-submit-reject')
													
													<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-cancel me-2"  id="delete-user" key-message="reject"   base-route="{{ url('/') }}" redirect-url="ongoing-activities" data-url="{{ route('ongoing-activities.reject-unpublish', $ongoingActivity->id) }}" style="background: #dc3545">Reject</a>
												
												@endcan	
												
											@elseif( ($currentRoleName == 'Admin' && $ongoingActivity->status == 2) ||  $currentRoleName == 'System Admin' )
												
												@can('ongoing-activities-approve-reject')
													
													<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-cancel me-2"  id="delete-user" key-message="reject"  base-route="{{ url('/') }}" redirect-url="ongoing-activities" data-url="{{ route('ongoing-activities.reject-unpublish', $ongoingActivity->id) }}" style="background: #dc3545">Reject</a>
												
												@endcan	
												
											@endif
											<!-- end get reject button -->
											
											<!-- start get publish button -->
											{{--@if( ($currentRoleName == 'Super Admin' && ($ongoingActivity->status == 4 || $ongoingActivity->status == 7)  ) ||  $currentRoleName == 'System Admin' )
											--}}
											@if( ($currentRoleName == 'Super Admin' && $ongoingActivity->status == 4 ) ||  ($currentRoleName == 'System Admin'  && $ongoingActivity->status == 4  ) )
												
												@can('ongoing-activities-publish-unpublish')
													
													<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-approve me-2"  id="delete-user" key-message="publish" base-route="{{ url('/') }}"  redirect-url="ongoing-activities"  data-url="{{ route('ongoing-activities.submit-approve-publish', $ongoingActivity->id) }}" style="background: #198754">Publish</a>
												
												@endcan	
											@endif
											<!-- end get publish button -->
											
											<!-- start get unpublish button -->
											@if( ($currentRoleName == 'Super Admin'  && ($ongoingActivity->status == 4 || $ongoingActivity->status == 6 ) ) ||  ($currentRoleName == 'System Admin' && ($ongoingActivity->status == 4 || $ongoingActivity->status == 6 )) )
												
												@can('ongoing-activities-approve-reject')
												
													<a type="submit" href="javascript:void(0);" class="btn btn-submit confirm-text-cancel me-2"  id="delete-user" key-message="unpublish"   base-route="{{ url('/') }}" redirect-url="ongoing-activities" data-url="{{ route('ongoing-activities.reject-unpublish', $ongoingActivity->id) }}" style="background: #dc3545">Unpublish </a>
												
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