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
                                Reserved.</div>

                        </div>
                        <div class="single-box">
                            <div class="logo-box">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('public/front-end/img/new-home/login/logo.png') }}"
                                        width="90" alt="IPTM">
                                </a>
                            </div>


                            <div class="login-step step-1">
                                <h2>log in to your profile</h2>
                                <form id="login-form" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="form-addons">
                                            <input id="email" type="email" placeholder="Enter your email address"
                                                class="form-control" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="pass-group">
                                            <input id="password" type="password" placeholder="Enter your password"
                                                class="form-control" name="password">
                                            <span class="fas toggle-password fa-eye-slash"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" class="btn user-login-btn next-step-btn">Send
                                            otp</button>
                                    </div>
                                    <div class="forget-passowrd">
                                        Forgot your password ? <a href="#">Reset Password</a>
                                    </div>
                                    <div class="dont-account">
                                        Don’t have an account? <a href="{{ url('register') }}">Sign Up</a>
                                    </div>
                                </form>
                            </div>
                            <div class="login-step step-2" style="display: none;">
                                <h2>Enter Your OTP</h2>
                                <form id="otp-form" method="POST" action=" ">
                                    @csrf
                                    <div class="form-group">

                                        <div class="otp-inputs" style="display:flex; ">
                                            <input type="text" maxlength="1" class="otp-digit form-control"
                                                name="otp1">
                                            <input type="text" maxlength="1" class="otp-digit form-control"
                                                name="otp2">
                                            <input type="text" maxlength="1" class="otp-digit form-control"
                                                name="otp3">
                                            <input type="text" maxlength="1" class="otp-digit form-control"
                                                name="otp4">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn user-login-btn">Verify OTP</button>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" class="btn btn-resend" id="resend-otp-btn"
                                            disabled>Resend OTP (<span id="otp-timer">30</span>s)</button>
                                    </div>
                                </form>
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

    {{-- login form validataion start  --}}
    <script>
        $(document).ready(function() {

            let resendTimer = 30;
            let timerInterval;

            // ----------------------------
            // STEP 1: Email + Password Validation
            // ----------------------------
            $(".next-step-btn").on("click", function() {
                let isValid = true;

                $(".invalid-feedback").remove();
                $(".is-invalid, .border-red").removeClass("is-invalid border-red");

                const email = $("#email").val().trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const password = $("#password").val().trim();

                if (email === "") {
                    showError("#email", "Email is required.");
                    isValid = false;
                } else if (!emailRegex.test(email)) {
                    showError("#email", "Enter a valid email address.");
                    isValid = false;
                }

                if (password === "") {
                    showError("#password", "Password is required.");
                    isValid = false;
                }

                if (isValid) {
                    $(".step-1").hide();
                    $(".step-2").show();
                    $(".otp-digit").first().focus();
                    startResendTimer();
                }
            });

            // ----------------------------
            // STEP 2: OTP Input Handling
            // ----------------------------
            $(".otp-digit").on("input", function() {
                let $this = $(this);
                this.value = this.value.replace(/[^0-9]/g, "");

                if ($this.val().length === 1) {
                    $this.next(".otp-digit").focus();
                }
            });

            $(".otp-digit").on("keydown", function(e) {
                if (e.key === "Backspace" && $(this).val() === "") {
                    $(this).prev(".otp-digit").focus();
                }
            });

            // OTP Form validation
            $("#otp-form").on("submit", function(e) {
                let otp = "";
                $(".otp-digit").each(function() {
                    otp += $(this).val();
                });

                $(".invalid-feedback").remove();
                $(".otp-digit").removeClass("is-invalid border-red");

                if (otp.length < 4) {
                    $(".otp-inputs").append(
                        `<span class="invalid-feedback" style="display:block;">Please enter 4-digit OTP.</span>`
                    );
                    $(".otp-digit").addClass("is-invalid border-red");
                    e.preventDefault();
                } else {
                    // Combine into hidden input for backend
                    if ($("#otp-hidden").length === 0) {
                        $("#otp-form").append(
                            `<input type="hidden" name="otp" id="otp-hidden" value="${otp}">`
                        );
                    } else {
                        $("#otp-hidden").val(otp);
                    }
                }
            });

            // ----------------------------
            // Resend OTP Timer
            // ----------------------------
            function startResendTimer() {
                resendTimer = 30;
                $("#resend-otp-btn").prop("disabled", true);
                $("#otp-timer").text(resendTimer);

                timerInterval = setInterval(function() {
                    resendTimer--;
                    $("#otp-timer").text(resendTimer);
                    if (resendTimer <= 0) {
                        clearInterval(timerInterval);
                        $("#resend-otp-btn").prop("disabled", false).text("Resend OTP");
                    }
                }, 1000);
            }

            // Resend OTP click (no AJAX)
            $("#resend-otp-btn").on("click", function() {
                alert("OTP resent (simulated)!");
                startResendTimer(); // restart timer
                $(".otp-digit").val("").first().focus(); // clear inputs
            });

            // ----------------------------
            // Reusable error function
            // ----------------------------
            function showError(input, message) {
                $(input).addClass("is-invalid border-red");
                $(input).closest(".form-group").append(
                    `<span class="invalid-feedback" style="display:block;">${message}</span>`
                );
            }

        });
    </script>

    {{-- login form validataion ends --}}

</body>

</html>
