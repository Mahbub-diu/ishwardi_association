@extends('layouts.app-frontend')


@section('content')
    <section class="contact-banner-main"
        style="background: url('{{ asset('public/front-end/img/mahbub/Shape.webp') }}');background-size: cover;background-repeat: no-repeat;background-position: center center;">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="about-content-box">
                        <h2>contact us</h2>
                        <p class="">Together we can create something all inspirational you need to build.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- <section class="get-touch-main">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="common-title-box">
                                <p>get in touch</p>
                                <h2>Reach out to us in the nearest office. </h2>
                                <div class="contact-description">Come and visit our office or simply send us an email anytime
                                    you want. We are open to all suggestions from our clients.</div>
                            </div>
                        </div>


                    </div>
                    
           <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="single-box">
                                <div class="icon-box">

                                    <img src="{{ asset('public/front-end/img/mahbub/icon/ban.png') }}" alt="">
                                </div>
                                <div class="contact-info2">
                                    <h6>Bangladesh </h6>
                                    <span>House: 1/C (Muna), 3rd & 4th Floor Green Corner, Green Road Dhaka 1205.
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                            <div class="single-box">
                                <div class="icon-box">

                                    <img src="{{ asset('public/front-end/img/mahbub/icon/can.png') }}" alt="">
                                </div>
                                <div class="contact-info2">
                                    <h6>Canada </h6>
                                    <span>390 Dawes Road, Unit-216 Toronto ON M4B 2E5.</span>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="single-box">
                                <div class="icon-box">

                                    <img src="{{ asset('public/front-end/img/mahbub/icon/th.png') }}" alt="">
                                </div>
                                <div class="contact-info2">
                                    <h6>Thailand </h6>
                                    <span>236/58-57, Ladprao Road Soi 132, Klongjun, Bangkapi Bangkok 10240</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="single-box">
                                <div class="icon-box">

                                    <img src="{{ asset('public/front-end/img/mahbub/icon/mal.png') }}" alt="">
                                </div>
                                <div class="contact-info2">
                                    <h6>Malaysia </h6>
                                    <span>Wisma Maran, Ground Floor 28, Medan Pasar, City Centre 50050 Kuala Lumpur Wilayah
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
           
                </div>
            </section>-->

    <section class="get-touch-main">
        <div class="container">


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center">
                    <div class="common-title-box">
                        <h2>Contact Us </h2>

                    </div>
                </div>
            </div>

            <div class="row">

                @if (!empty($commonData['contant_info'][0]['address']))
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 mb-custom">
                        <a href="#map">
                            <div class="single-box">

                                <div class="icon-box">

                                    <img src="{{ asset('public/front-end/img/mahbub/cont-1.png') }}" alt="">
                                </div>
                                <div class="contact-info2">
                                    <h6>location </h6>
                                    <span> {{ $commonData['contant_info'][0]['address'] }} </span>
                                </div>

                            </div>
                        </a>

                    </div>
                @endif

                @if (!empty($commonData['contant_info'][0]['email']))
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 mb-custom">
                        <a href="#map">
                            <div class="single-box">
                                <div class="icon-box">
                                    <img src="{{ asset('public/front-end/img/mahbub/cont-2.png') }}" alt="">
                                </div>
                                <div class="contact-info2">
                                    <h6>email </h6>
                                    <span class="d-block text-center"> {{ $commonData['contant_info'][0]['email'] }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif


                @if (!empty($commonData['contant_info'][0]['mobile_no']))
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 mb-custom">
                        <div class="single-box">
                            <div class="icon-box">
                                <img src="{{ asset('public/front-end/img/mahbub/phone-icon.png') }}" alt="">
                            </div>
                            <div class="contact-info2">
                                <h6>phone no </h6>
                                <span class="d-block text-center">{{ $commonData['contant_info'][0]['mobile_no'] }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($commonData['contant_info'][0]['office_hour']))
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 mb-custom">
                        <div class="single-box">
                            <div class="icon-box">
                                <img src="{{ asset('public/front-end/img/mahbub/clock-9-30.webp') }}" alt="">
                            </div>
                            <div class="contact-info2">
                                <h6>Office Hour</h6>
                                <span
                                    class="d-block text-center">{{ $commonData['contant_info'][0]['office_hour'] }}</span>

                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>



    <section class="contact-form-main" id="map">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-form-flex">
                        <div class="first-box">
                            <!-- <div class="first-bg"></div> -->
                            <div class="iframe-box">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14608.18558065469!2d90.3858478!3d23.7457249!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x739ecac77ea04bc8!2sInstitute+of+Professional+Training+%26+Management+(IPTM!5e0!3m2!1sbn!2sbd!4v1537065345307"
                                    style="border: 0px none; pointer-events: none;" allowfullscreen="" width=""
                                    height="" frameborder="0">
                                </iframe>
                            </div>

                        </div>

                        <div class="third-box">
                            <fieldset class="common-fieldset">
                                <legend class="rounded">write to us</legend>
                                <form action="" class=" " id="contact-form">

                                    <div class="form-group">
                                        <label for="name" class="form-label">Your Name <sup class="text-danger">*</sup>
                                        </label>

                                        <input type="text" id="name" class="form-control"
                                            placeholder="Please enter your name">
                                        <span class="text-danger" id="validate-name" style="margin-top:-25px"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="form-label">your email <sup
                                                class="text-danger">*</sup></label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Please enter your email">
                                        <span class="text-danger" id="validate-email" style="margin-top:-25px"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="subject" class="form-label"> subject<sup class="text-danger">*</sup>
                                        </label>
                                        <input type="text" class="form-control"
                                            placeholder="Please enter your subject " id="subject">
                                        <span class="text-danger" id="validate-subject" style="margin-top:-25px"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="message" class="form-label">your message <sup
                                                class="text-danger">*</sup> </label>
                                        <textarea class="form-control" id="message" rows="3" placeholder="Please enter your message"></textarea>
                                        <span class="text-danger" id="validate-message" style="margin-top:-25px"></span>
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
        </div>
    </section>

    <script type="text/javascript">
        $(document).on('click', '#btn-submit', function() {

            //alert('pp');
            var name = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var message = $("#message").val();

            // alert(message);

            //$(".loader2").css('display', 'block');


            $.ajax({
                url: "{{ url('send-public-query') }}",
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
	
	
	
@endsection
