@extends('layouts.app-frontend')


@section('content')
    <section class="contact-banner-main"
        style="background: url('{{ asset('public/front-end/img/mahbub/carrer.png') }}');background-size: cover;background-repeat: no-repeat;background-position: center center;">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="about-content-box">

                        <p class=""> Job Apply.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="apply-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="job-title">Post: {{ !empty($data->job_title) ? $data->job_title : '' }}
                    </div>
                    <div class="job-description">
                        <p>{{ !empty($data->short_details) ? $data->short_details : '' }}

                        </p>
                    </div>
                    <div class="job-pdf">

                        <iframe src="{{ asset('storage/app/public/careers/'.$data->circular_file) }}" width="" height="">
                        </iframe>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="common-fieldset-main">
                        <!--<fieldset class="common-fieldset">
                            <legend class="rounded">Job apply</legend>
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="validationCustom01" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="validationCustom01" value="Mark"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="mobileno" class="form-label">Mobile No.</label>
                                    <input type="text" class="form-control" id="mobileno" value="01743455666" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email"
                                        aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Please enter correct email.
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="uploadcv" class="form-label">Upload CV</label>
                                    <input type="file" class="form-control" id="uploadcv" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid file.
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Cover Letter</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                    <div class="invalid-feedback">
                                        Please write a cover letter.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                            required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
								
                                <div class="col-12">
                                    <button class="btn submit-btn" type="submit">apply</button>
                                </div>
                            </form>
                        </fieldset>-->
						
						
						
						
						<fieldset class="common-fieldset">
                                <legend class="rounded">Job apply</legend>
                                <form action="" class=" " id="contact-form">

                                    <div class="form-group">
                                        <label for="name" class="form-label">Your Name <sup class="text-danger">*</sup>
                                        </label>

                                        <input type="text" id="name" class="form-control"
                                            placeholder="Please enter your name">
                                        <span class="text-danger" id="validate-name" ></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="form-label">your email <sup
                                                class="text-danger">*</sup></label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Please enter your email address">
                                        <span class="text-danger" id="validate-email" ></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="subject" class="form-label"> Upload CV <sup class="text-danger">*</sup>
                                        </label>
                                        <input type="file" class="form-control"
                                            placeholder="Please enter your subject " id="subject">
                                        <span class="text-danger" id="validate-subject" ></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="message" class="form-label">Cover Letter <sup
                                                class="text-danger">*</sup> </label>
                                        <textarea class="form-control" id="message" rows="3" placeholder="Enter cover letter"></textarea>
                                        <span class="text-danger" id="validate-message" ></span>
                                    </div>

                                    <div class="form-group" style="height:30px">
                                        <label for="message" class="form-label"><span class="loader2"></span></label>

                                    </div>



                                    <div class="form-group">
                                        <button class="btn submit-btn " id="btn-submit" type="submit">Submit </button>


                                    </div>
                                </form>
                            </fieldset>
						
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        /*(() => {
            'use strict'

            // Fetch all the forms we want to apply custom  validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })() */
		
		
		 $(document).on('click', '#btn-submit', function() {

            //alert('pp');
            var name = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var message = $("#message").val();

            // alert(message);

            //$(".loader2").css('display', 'block');


            $.ajax({
                url: "{{ url('job-apply') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    email: email,
                    subject: subject,
                    message: message,
                },

                cache: false,
                beforeSend: function() {
                    //alert('rrr');
                    // setting a timeout
                    $("#btn-submit").prop('disabled', true);
                    $(".loader2").css('display', 'block');

                },
                success: function(dataResult) {
                    //console.log(dataResult);
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {

                        $("#name").val('');
                        $("#email").val('');
                        $("#subject").val('');
                        $("#message").val('');

                        //$(".loader").css('display', 'none');
                        $("#send-btn").prop('disabled', false);

                        $(".sent-message").css('display', 'block');
                        $(".sent-message").text(dataResult.message);


                        $("#validate-name").css('display', 'none');
                        $("#validate-email").css('display', 'none');
                        $("#validate-subject").css('display', 'none');
                        $("#validate-message").css('display', 'none');

                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success("Your query has been sent sucessfully.");

                        /*setTimeout(function() {
                                          $(".sent-message").hide();
                                      }, 5000);*/

                    } else {

                        //  $(".loader").css('display', 'none');
                        $("#send-btn").prop('disabled', false);

                        if (dataResult.statusCode == 196) {

                            $("#validate-name").css('display', 'block');
                            $("#validate-name").text(dataResult.message);

                            $("#validate-email").css('display', 'none');
                            $("#validate-subject").css('display', 'none');
                            $("#validate-message").css('display', 'none');

                        } else if (dataResult.statusCode == 197) {

                            $("#validate-email").css('display', 'block');
                            $("#validate-email").text(dataResult.message);


                            $("#validate-name").css('display', 'none');
                            $("#validate-subject").css('display', 'none');
                            $("#validate-message").css('display', 'none');

                        } else if (dataResult.statusCode == 198) {

                            $("#validate-subject").css('display', 'block');
                            $("#validate-subject").text(dataResult.message);

                            $("#validate-name").css('display', 'none');
                            $("#validate-email").css('display', 'none');
                            $("#validate-message").css('display', 'none');

                        } else if (dataResult.statusCode == 199) {

                            $("#validate-message").css('display', 'block');
                            $("#validate-message").text(dataResult.message);

                            $("#validate-name").css('display', 'none');
                            $("#validate-email").css('display', 'none');
                            $("#validate-subject").css('display', 'none');
                        }


                    }

                },
                complete: function() {

                    $("#btn-submit").prop('disabled', false);
                    $(".loader2").css('display', 'none');
                }



            });

        });
    </script>
@endpush
