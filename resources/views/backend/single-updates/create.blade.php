@extends('layouts.app')

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
-->			
@section('content')
					<div class="page-wrapper">
						<div class="content">
							<div class="page-header">
								<div	 class="page-header">
									<div class="row">
										<div class="col-sm-12">
											<h3 class="page-title">Add News & Event </h3>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ url('single-updates') }}">News & Event </a></li>
												<li class="breadcrumb-item active">Add News & Event </li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									{!! Form::open(array('route' => 'single-updates.store', 'method'=>'POST',  'enctype' => 'multipart/form-data' )) !!}
										@php 
											$title = '';
											$client_id = '';
											$project_name = '';
											$service_id = '';
											$service_cover_area_id = '';
											$feature_image = '';
											$image2 = '';
											$image3 = '';
											$image4 = '';
											$total_participate = '';
											$activity_short_details = '';
											$activity_full_details = '';
										@endphp
										
										@error('title')
										  @php $title = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('client_id')
										  @php $client_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('project_name')
										  @php $project_name = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('service_id')
										  @php $service_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('service_id')
										  @php $service_id = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('service_id')
										  @php $service_id = 'is-invalid border-red'; @endphp
										@enderror 
										
										@error('total_participate')
										  @php $total_participate = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('activity_full_details')
										  @php $activity_full_details = 'is-invalid border-red'; @endphp
										@enderror
										
										@error('image_first')
										  @php $image_first = 'is-invalid border-red'; @endphp
										@enderror
										
										
									<div class="row">
									
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Title<span style="color:red">*</span></label>
												{!! Form::text('title', null, array('placeholder' => 'Enter title','class' => 'form-control '.$title)) !!}
												
												@error('title')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										
										{{--<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Client <span style="color:red">*</span></label>
												{!! Form::select('client_id', [''=>'Select One']+$clients,[], array('id' => '', 'class' => 'form-control form-small select select2-hidden-accessible '.$client_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'single' => 'single')) !!} 
												
												@error('client_id')
													<span class="invalid-feedback">
														The client field is required. 
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Project Name</label>
												{!! Form::text('project_name', null, array('placeholder' => 'Enter project name','class' => 'form-control '.$project_name)) !!}
												@error('project_name')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Service<span style="color:red">*</span></label>
												{!! Form::select('service_ids[]', [''=>'Select One']+$services,[], array('id' => 'service', 'class' => 'form-control form-small select select2-hidden-accessible '.$service_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'multiple' => 'multiple')) !!} 
											
												@error('service_id')
													<span class="invalid-feedback">
														{{ $message }} 
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Featured Services <span style="color:red">*</span></label>
												{!! Form::select('service_cover_area_ids[]', [''=>'Select One']+[],[], array('id' => 'cover-area', 'class' => 'form-control form-small select select2-hidden-accessible cover-area '.$service_cover_area_id,  'tabindex' => '-1', 'aria-hidden' => 'true', 'multiple' => 'multiple')) !!} 
											
												@error('service_cover_area_id')
													<span class="invalid-feedback">
														{{ $message }} 
													</span>
												@enderror
											</div>
										</div>--}}
										
										
										
										<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Featured Image <span style="color:red"> (Image Size: 600 x 420)</span> </label>
												{!! Form::file('feature_image', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile(this)', 'id' => 'image1', 'class' => 'form-control '.$feature_image)) !!}
												
												@error('feature_image')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
												
												<img id="previewImg1" src="/examples/images/transparent.png" alt="" width="100">
												
											</div>
										</div>
										
										
										
										
										
										<!--<div class="col-lg-6 col-sm-6 col-6">
											<div class="form-group">
												<label>Image 3</label>
												{!! Form::file('image3', array('placeholder' => 'Enter circular file', 'onchange' => 'previewFile4(this)', 'id' => 'image4', 'class' => 'form-control '.$image4)) !!}
												
												
												<img id="previewImg4" src="/examples/images/transparent.png" alt="" width="100">
													
												@error('image')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>-->
										
										
										<div class="col-lg-3 col-sm-3 col-3">
											<div class="form-group">
												<label>Feature Showing</label>
												{{ Form::checkbox('feature_showing', 1, false, array('class' => 'name')) }}
												
												@error('feature_showing')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										<div class="col-lg-3 col-sm-3 col-3">
											<div class="form-group">
												<label>Is Event</label>
												{{ Form::checkbox('news_event_status', 1, false, array('class' => 'name')) }}
												
												@error('news_event_status')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>

										<!-- *************************************** -->
										<div class="col-lg-12 col-sm-12 col-12 border">
											<div class="">
												  <table class="table table-bordered" id="dynamic_field">
													<div class="card-header">
													  <h3 class="card-title">More Image (Click Add For More Image)</h3>
													</div>
													<tr>
													  <td>
														{!! Form::file('images[]', array('placeholder' => 'Enter circular file', 'onchange' => 'addNewPreview(1)', 'id' => 'addNew1', 'class' => 'form-control name_list')) !!}
												
														<img id="showNewPreview1" src="/examples/images/transparent.png" alt="" width="100">
												
													  </td>
													  <td><button type="button" name="add" id="add" class="btn btn-success">ADD</button></td>
													</tr>
												  </table>
											</div>
										</div>
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Activity Short Details<span style="color:red">*</span></label>
												{!! Form::textarea('activity_short_details', null, array('placeholder' => 'Enter short details about news or event','class' => 'form-control '.$activity_short_details)) !!}
												
												@error('activity_short_details')
													<span class="invalid-feedback" style="display:block">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-12 col-sm-12 col-12">
											<div class="form-group">
												<label>Activity Full Details<span style="color:red">*</span></label>
												{!! Form::textarea('activity_full_details', null, array('placeholder' => 'Enter full details about news or event', 'id' => 'activity_full_details', 'class' => 'form-control '.$activity_full_details)) !!}
												@error('activity_full_details')
													<span class="invalid-feedback">
														{{ $message }}
													</span>
												@enderror
											</div>
										</div>
										
										
										<div class="col-lg-12">
											@if( $currentRoleName == 'Data Creator' ||  $currentRoleName == 'System Admin' )
												@can('ongoing-activities-create')
													<button type="submit" href="javascript:void(0);" class="btn btn-submit me-2">Save</button>
												@endcan
											@endif
												<a href="{{ url('ongoing-activities') }}" class="btn btn-cancel">Cancel</a>
										</div>
									
									
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>

<!-- ***************************************************************** -->
<script>
	function addNewPreview(id){
								
			var file = $("#addNew"+id).get(0).files[0];
	 
			if(file){
				
				var reader = new FileReader();
	 
				reader.onload = function(){
					$("#showNewPreview"+id).attr("src", reader.result);
				}
	 
				reader.readAsDataURL(file);
			}
		}
							
    $(document).ready(function(){
		  var postURL = "<?php echo url('addmore'); ?>";
		  var i = 1;

		  // For Add new img field ===>
		  $('#add').click(function(){
		  i++;
		  $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" id="addNew'+i+'"  onchange="addNewPreview('+i+')" accept="image/*" name="images[]" class="form-control name_list"><img id="showNewPreview'+i+'" src="/examples/images/transparent.png" alt="" width="100"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">x</button></td></tr>');
								
		  })

		// For remove image field ====>
		$(document).on('click', '.btn_remove', function(){
		  var button_id = $(this).attr("id");
		  $('#row'+button_id+'').remove();
		})

    })
   
  </script>
					<!-- <script>
							const dropArea = document.getElementById('drop-area');
							const fileInput = document.getElementById('file-input');
							const imagePreview = document.getElementById('image-preview');
							const chooseFileButton = document.querySelector('.click');

							// Declare a global variable to store the array of images
							var imagesArray = [];

							// Function to handle file selection
							fileInput.addEventListener('change', handleFileSelect);

							// Function to trigger file input click
							chooseFileButton.addEventListener('click', function() {
							fileInput.click();
							});

							async function handleFileSelect(event) {
							const files = event.target.files;
							if (files && files.length > 0) {
								const imageFiles = await validateAndFilterImageFiles(files);
								
								console.log('imageFiles pushed?', imageFiles)
								displayImages(imageFiles);
								// Add the image files to the global array
								imagesArray = imagesArray.concat(imageFiles);

								// Log the array for debugging purposes
								console.log('fileSelect 346',imagesArray);						}
							}

							// Function to handle drag over event
							dropArea.addEventListener('dragover', (event) => {
							event.preventDefault();
							dropArea.classList.add('drag-over');
							});

							// Function to handle drag leave event
							dropArea.addEventListener('dragleave', () => {
							dropArea.classList.remove('drag-over');
							});

							// Function to handle drop event
							dropArea.addEventListener('drop', (event) => {
							alert('ondrop')
							event.preventDefault();
							dropArea.classList.remove('drag-over');
							const files = event.dataTransfer.files;
							if (files && files.length > 0) {
								// Display dropped images
								const imageFiles = validateAndFilterImageFiles(files);
								displayImages(imageFiles);
								// Add the image files to the global array
								imagesArray = imagesArray.concat(imageFiles);
								// Log the array for debugging purposes
								console.log('drop', imagesArray);
							}
							});

							// Validate Image files
							// function validateAndFilterImageFiles(files) {
							// 	const imageFiles = [];

							// 	for (let i = 0; i < files.length; i++) {
							// 		const file = files[i];
							// 		const fileType = file.type;

							// 		if (fileType.startsWith('image/')) {
							// 			// It's an image file, add it to the list
							// 			const image = new Image();
							// 			image.src = URL.createObjectURL(file);

							// 			image.onload = function () {
							// 				const width = image.width;
							// 				const height = image.height;

							// 				// Check if the image has the desired dimensions (600px x 420px)
							// 				if (width === 600 && height === 420) {
							// 					imageFiles.push(file);
							// 				} else {
							// 					// Dimensions are not valid, show an alert
							// 					console.warn(`Skipped file "${file.name}": Dimensions must be 600x420 pixels.`);
							// 					alert(`File "${file.name}" does not have the required dimensions (600px x 420px).`);
							// 				}
							// 			};
							// 		} else {
							// 			// Not an image file, you can handle this case (show an alert, skip the file, etc.)
							// 			console.warn('Skipped non-image file:', file.name);
							// 			alert(`File "${file.name}" is not a valid image.`);
							// 		}
							// 	}

							// 	return imageFiles;
							// }

		
							function validateAndFilterImageFiles(files) {
  // Retrieve existing data from localStorage
  const existingData = JSON.parse(localStorage.getItem('files')) || [];
  const imageFiles = existingData.slice(); // Copy the existing data

  function loadImage(file) {
    return new Promise((resolve, reject) => {
      const image = new Image();
      image.src = URL.createObjectURL(file);

      image.onload = function () {
        const width = image.width;
        const height = image.height;

        // Check if the image has the desired dimensions (480px x 480px)
        if (width === 480 && height === 480) {
          // Save the image data to the array
          const reader = new FileReader();
          reader.onload = function (event) {
            const imageData = event.target.result;
            imageFiles.push({ name: file.name, data: imageData });

            // Store the updated array in localStorage
            localStorage.setItem('files', JSON.stringify(imageFiles));
          };
          reader.readAsDataURL(file);

          // It's an image file with the correct dimensions, resolve the Promise
          resolve(file);
        } else {
          // Dimensions are not valid, reject the Promise
          alert(`File "${file.name}" does not have the required dimensions (480px x 480px).`);
          reject(new Error(`File "${file.name}" does not have the required dimensions (480px x 480px).`));
        }
      };

      image.onerror = function () {
        // Image loading failed, reject the Promise
        reject(new Error(`Failed to load file "${file.name}".`));
      };
    });
  }

  const promises = [];
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const fileType = file.type;

    if (fileType.startsWith('image/')) {
      // It's an image file, add a Promise to the list that resolves to the file or an error
      promises.push(loadImage(file));
    } else {
      // Not an image file, you can handle this case (show an alert, skip the file, etc.)
      console.warn('Skipped non-image file:', file.name);
      alert(`File "${file.name}" is not a valid image.`);
    }
  }

  return Promise.allSettled(promises)
    .then(results => {
      // Filter out the rejected Promises and return the resolved files
      return results.filter(result => result.status === 'fulfilled').map(result => result.value);
    });
}



// 							function validateAndFilterImageFiles(files) {
//   const imageFiles = [];

//   function loadImage(file) {
//     return new Promise((resolve, reject) => {
//       const image = new Image();
//       image.src = URL.createObjectURL(file);

//       image.onload = function () {
//         const width = image.width;
//         const height = image.height;

//         // Check if the image has the desired dimensions (480px x 480px)
//         if (width === 480 && height === 480) {
//           // Save the image data to localStorage
//           const reader = new FileReader();
//           reader.onload = function (event) {
//             const imageData = event.target.result;
// 			imageFiles.push({ name: file.name, data: imageData });
//             localStorage.setItem('files', JSON.stringify(imageFiles));
//           };
//           reader.readAsDataURL(file);

//           // It's an image file with the correct dimensions, resolve the Promise
//           resolve(file);
//         } else {
//           // Dimensions are not valid, reject the Promise
//           alert(`File "${file.name}" does not have the required dimensions (480px x 480px).`);
//           reject(new Error(`File "${file.name}" does not have the required dimensions (480px x 480px).`));
//         }
//       };

//       image.onerror = function () {
//         // Image loading failed, reject the Promise
//         reject(new Error(`Failed to load file "${file.name}".`));
//       };
//     });
//   }

//   const promises = [];
//   for (let i = 0; i < files.length; i++) {
//     const file = files[i];
//     const fileType = file.type;

//     if (fileType.startsWith('image/')) {
//       // It's an image file, add a Promise to the list that resolves to the file or an error
//       promises.push(loadImage(file));
//     } else {
//       // Not an image file, you can handle this case (show an alert, skip the file, etc.)
//       console.warn('Skipped non-image file:', file.name);
//       alert(`File "${file.name}" is not a valid image.`);
//     }
//   }

//   return Promise.allSettled(promises)
//     .then(results => {
//       // Filter out the rejected Promises and return the resolved files
//       return results.filter(result => result.status === 'fulfilled').map(result => result.value);
//     });
// }



// 							function validateAndFilterImageFiles(files) {
//   const imageFiles = [];

//   function loadImage(file) {
//     return new Promise((resolve, reject) => {
//       const image = new Image();
//       image.src = URL.createObjectURL(file);

//       image.onload = function () {
//         const width = image.width;
//         const height = image.height;

//         // Check if the image has the desired dimensions (600px x 420px)
//         if (width === 480 && height === 480) {
//           // It's an image file with the correct dimensions, resolve the Promise
//           resolve(file);
//         } else {
//           // Dimensions are not valid, reject the Promise
// 		  alert(`File "${file.name}" does not have the required dimensions (600px x 420px).`)
//           reject(new Error(`File "${file.name}" does not have the required dimensions (600px x 420px).`));
//         }
//       };

//       image.onerror = function () {
//         // Image loading failed, reject the Promise
//         reject(new Error(`Failed to load file "${file.name}".`));
//       };
//     });
//   }

//   const promises = [];
//   for (let i = 0; i < files.length; i++) {
//     const file = files[i];
//     const fileType = file.type;

//     if (fileType.startsWith('image/')) {
//       // It's an image file, add a Promise to the list that resolves to the file or an error
//       promises.push(loadImage(file));
//     } else {
//       // Not an image file, you can handle this case (show an alert, skip the file, etc.)
//       console.warn('Skipped non-image file:', file.name);
//       alert(`File "${file.name}" is not a valid image.`);
//     }
//   }

//   return Promise.allSettled(promises)
//     .then(results => {
//       // Filter out the rejected Promises and return the resolved files
//       return results.filter(result => result.status === 'fulfilled').map(result => result.value);
//     });
// }

							// function validateAndFilterImageFiles(files) {
							// const imageFiles = [];
							// for (let i = 0; i < files.length; i++) {
							// 	const file = files[i];
							// 	console.log(file)
							// 	const fileType = file.type;

							// 	if (fileType.startsWith('image/')) {
							// 	// It's an image file, add it to the list

							// 	  const image = new Image();
							// 	image.src = URL.createObjectURL(file);

							// 	image.onload = function () {
							// 		const width = image.width;
							// 		const height = image.height;
							// 		console.log(width, height, "width-height")

							// 		// Check if the image has the desired dimensions (600px x 420px)
							// 		if (width === 480 && height === 480) {
							// 			// It's an image file with the correct dimensions, add it to the list
							// 			console.log('validation', file)
							// 			imageFiles.push(file);
							// 			// why it's not pushing the file to the imageFiles ?
							// 		} else {
							// 			// Dimensions are not valid, show an alert
							// 			alert(`File "${file.name}" does not have the required dimensions (600px x 420px).`);
							// 		}}
							// 	// console.log("file", file)
							// 	// imageFiles.push(file);
							// 	// console.log("imageFiles 424", imageFiles)
							// 	} else {
							// 	// Not an image file, you can handle this case (show an alert, skip the file, etc.)
							// 	console.warn('Skipped non-image file:', file.name);
							// 	alert( `File "${file.name}" is not a valid image.` );
							// 	}
							// }
							// console.log('image files' , imageFiles)
							// return imageFiles;
							// } 
							


							// Function to display selected images
							function displayImages(files) {
							for (let i = 0; i < files.length; i++) {
								const file = files[i];
								const reader = new FileReader();
								reader.onload = function (e) {
								const img = document.createElement('img');
								img.src = e.target.result;
								img.className = 'uploaded-image';
								imagePreview.appendChild(img);
								};
								reader.readAsDataURL(file);
							}
							}
						// const dropArea = document.getElementById('drop-area');
						// const fileInput = document.getElementById('file-input');
						// const imagePreview = document.getElementById('image-preview');
						// const chooseFileButton = document.querySelector('.button');

						// // Function to handle file selection
						// fileInput.addEventListener('change', handleFileSelect);

						// // Function to trigger file input click
						// chooseFileButton.addEventListener('click', function() {
						// 	fileInput.click();
						// });

						// function handleFileSelect(event) {
						// 	const files = event.target.files;
						// 	if (files && files.length > 0) {
						// 		const imageFiles = validateAndFilterImageFiles(files);
						// 		displayImages(imageFiles);
						// 	}
						// }

						// // Function to handle drag over event
						// dropArea.addEventListener('dragover', (event) => {
						// 	event.preventDefault();
						// 	dropArea.classList.add('drag-over');
						// });

						// // Function to handle drag leave event
						// dropArea.addEventListener('dragleave', () => {
						// 	dropArea.classList.remove('drag-over');
						// });

						// // Function to handle drop event
						// dropArea.addEventListener('drop', (event) => {
						// 	alert('ondrop')
						// 	event.preventDefault();
						// 	dropArea.classList.remove('drag-over');
						// 	const files = event.dataTransfer.files;
						// 	if (files && files.length > 0) {
						// 		// Display dropped images
						// 		const imageFiles = validateAndFilterImageFiles(files);
						// 		displayImages(imageFiles);
						// 	}
						// });

						// // Validate Image files
						// function validateAndFilterImageFiles(files) {
						// 	const imageFiles = [];
						// 	for (let i = 0; i < files.length; i++) {
						// 		const file = files[i];
						// 		console.log(file)
						// 		const fileType = file.type;

						// 		if (fileType.startsWith('image/')) {
						// 			// It's an image file, add it to the list
						// 			console.log("file", file)
						// 			imageFiles.push(file);
						// 			console.log("imageFiles", imageFiles)
						// 		} else {
						// 			// Not an image file, you can handle this case (show an alert, skip the file, etc.)
						// 			console.warn('Skipped non-image file:', file.name);
						// 			alert( `File "${file.name}" is not a valid image.` );
						// 		}
						// 	}
						// 	return imageFiles;
						// } 

						// // Function to display selected images
						// function displayImages(files) {
						// 	for (let i = 0; i < files.length; i++) {
						// 		const file = files[i];
						// 		const reader = new FileReader();
						// 		reader.onload = function (e) {
						// 			const img = document.createElement('img');
						// 			img.src = e.target.result;
						// 			img.className = 'uploaded-image';
						// 			imagePreview.appendChild(img);
						// 		};
						// 		reader.readAsDataURL(file);
						// 		console.log(file)
						// 	}
						// }
						
						/* Event listener to handle image deletion
						imagePreview.addEventListener('click', (event) => {
							if (event.target.classList.contains('uploaded-image')) {
								event.target.remove();
							}
						}); */

						</script> -->

					<!-- ------------------------------------------------------- -->
					
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
						
					</script>
					
					@endsection