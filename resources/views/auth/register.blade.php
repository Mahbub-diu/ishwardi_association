 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
     <meta name="description" content="IPTM">
     <meta name="keywords"
         content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
     <meta name="author" content="Dreamguys - Bootstrap Admin Template">
     <meta name="robots" content="noindex, nofollow">
     <title>Login - IPTM</title>

     <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/front-end/img/logo.svg') }}">
     <link rel="stylesheet" href="{{ asset('public/mine/assets/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('public/mine/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
     <link rel="stylesheet" href="{{ asset('public/mine/assets/plugins/fontawesome/css/all.min.css') }}">
     <link rel="stylesheet" href="{{ asset('public/mine/assets/css/style.css') }}">
     <link rel="stylesheet" href="{{ asset('public/front-end/scss/ishwardi-style.css') }}">



 </head>

 <body>

     <section class="login-main">
         <div class="container">
             <div class="row">
                 <div class="col-sm-12 col-md-12 col-lg-12">
                     <div class="login-flex-wrapper">
                         <div class="single-box"
                             data-background="{{ asset('public/front-end/img/new-home/login/login.png') }}">
                             <h1>welcome to <br> <span>ishwardi</span> association </h1>
                             <div class="copyright-text">© <span class="year"></span> Ishwardi Association. All Rights
                                 Reserved.
                             </div>

                         </div>
                         <div class="single-box">
                             <div class="logo-box">
                                 <a href="{{ url('/') }}">
                                     <img src="{{ asset('public/front-end/img/new-home/login/logo.png') }}"
                                         width="90" alt="IPTM">
                                 </a>
                             </div>

                             <form id="member-registration" method="POST" action="{{ route('register') }}">
                                 @csrf
                                 <div class="login-step step-1">
                                     <h2>Member Registration</h2>
                                     <div class="form-group">
                                         <label for="name" class="form-label">{{ __('Name') }}</label>

                                         <input id="name" type="text"
                                             class="form-control @error('name') is-invalid @enderror" name="name"
                                             value="{{ old('name') }}" autocomplete="name" autofocus
                                             placeholder="Enter Your Name">

                                         @error('name')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group">
                                         <label for="mobile" class="form-label">{{ __('mobile') }}</label>


                                         <input id="mobile" type="mobile"
                                             class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                             value="{{ old('mobile') }}" autocomplete="mobile"
                                             placeholder="Enter Your Mobile Number">

                                         @error('mobile')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group">
                                         <button type="button" class="btn user-login-btn next-step-btn">Send
                                             otp</button>
                                     </div>
                                     <div class="dont-account">
                                         already have an account? <a href="{{ url('login') }}">Log In</a>
                                     </div>
                                 </div>
                                 <div class="login-step step-2" style="display:none;">
                                     <h2>Verify OTP</h2>

                                     <div class="form-group otp-group">
                                         <div class="otp-inputs">
                                             <input type="text" maxlength="1" class="otp-field form-control">
                                             <input type="text" maxlength="1" class="otp-field form-control">
                                             <input type="text" maxlength="1" class="otp-field form-control">
                                             <input type="text" maxlength="1" class="otp-field form-control">
                                         </div>

                                         <span class="invalid-feedback otp-error"></span>
                                     </div>


                                     <div class="form-group">
                                         <button type="button" class="btn user-login-btn verify-otp-btn">Verify
                                             OTP</button>
                                     </div>
                                     <div class="form-group">
                                         <button type="button" class="btn btn-resend"
                                             id="register-register-resend-otp-btn" disabled>
                                             Resend OTP (<span id="register-register-otp-timer">30</span>s)
                                         </button>
                                     </div>

                                 </div>


                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         </div>
         </div>
     </section>


     <script src="{{ asset('public/mine/assets/js/jquery-3.6.0.min.js') }}"></script>

     <script src="{{ asset('public/mine/assets/js/feather.min.js') }}"></script>

     <script src="{{ asset('public/mine/assets/js/bootstrap.bundle.min.js') }}"></script>

     <script src="{{ asset('public/mine/assets/js/script.js') }}"></script>
     <script src="{{ asset('public/front-end/js/ishwardi.js') }}"></script>
     <script>
         $(".year").text(new Date().getFullYear());
     </script>

     {{-- form validation script start  --}}
     <script>
         $(document).ready(function() {
             // configuration
             const TIMER_SECONDS = 30;
             let resendRemaining = 0;
             let resendInterval = null;
             let fakeOtp = "1234"; // for testing

             // when step-1 validated and step-2 shown, start timer
             $(".next-step-btn").on("click", function() {
                 // your existing validation (kept minimal here)
                 const name = $("#name").val().trim();
                 const mobile = $("#mobile").val().trim();
                 if (!name || !mobile) return;

                 $(".step-1").hide();
                 $(".step-2").fadeIn();

                 startResendTimer(); // start timer when entering step-2
                 alert("Test OTP: " + fakeOtp);
             });

             // resend button click
             $("#register-register-resend-otp-btn").on("click", function() {
                 // if still disabled, ignore
                 if ($(this).prop("disabled")) return;

                 // simulate sending new OTP (remove/replace when enabling AJAX)
                 fakeOtp = String(Math.floor(1000 + Math.random() * 9000));
                 alert("New Test OTP: " + fakeOtp);

                 // clear otp fields and focus first
                 $(".otp-field").val('');
                 $(".otp-field").first().focus();

                 // restart timer
                 startResendTimer();
             });

             // timer starter
             function startResendTimer() {
                 // clear any previous interval
                 if (resendInterval !== null) {
                     clearInterval(resendInterval);
                     resendInterval = null;
                 }

                 resendRemaining = TIMER_SECONDS;
                 // disable button and update span
                 $("#register-register-resend-otp-btn").prop("disabled", true);
                 $("#register-register-otp-timer").text(resendRemaining);

                 // create fresh interval
                 resendInterval = setInterval(function() {
                     resendRemaining--;
                     // update numeric span only
                     $("#register-register-otp-timer").text(resendRemaining);

                     if (resendRemaining <= 0) {
                         clearInterval(resendInterval);
                         resendInterval = null;
                         $("#register-register-resend-otp-btn").prop("disabled", false);
                         // ensure timer shows 0 (optional)
                         $("#register-register-otp-timer").text(0);
                     }
                 }, 1000);
             }

             // Optional: if user navigates back to step-1 or leaves, stop timer
             // Example if you have a back button:
             // $(".back-to-step1-btn").on("click", function(){
             //     if (resendInterval) { clearInterval(resendInterval); resendInterval = null; }
             //     $("#register-register-otp-timer").text(TIMER_SECONDS);
             //     $("#register-register-resend-otp-btn").prop("disabled", true);
             // });

             // OTP input helpers (auto jump / backspace)
             $(".otp-field").on("input", function() {
                 this.value = this.value.replace(/\D/g, '');
                 if (this.value.length === 1) $(this).next(".otp-field").focus();
             });
             $(".otp-field").on("keydown", function(e) {
                 if (e.key === "Backspace" && !this.value) $(this).prev(".otp-field").focus();
             });

             // verify button (no ajax)
             $(".verify-otp-btn").on("click", function() {
                 let otp = "";
                 $(".otp-field").each(function() {
                     otp += $(this).val();
                 });
                 if (otp.length !== 4) {
                     $(".otp-error").text("Please enter all 4 digits.");
                     return;
                 }
                 if (otp !== fakeOtp) {
                     $(".otp-error").text("Incorrect OTP.");
                     return;
                 }
                 // OTP ok — submit the form
                 $("#member-registration").submit();
             });
         });
     </script>
     {{-- form validation script ends --}}

 </body>

 </html>
