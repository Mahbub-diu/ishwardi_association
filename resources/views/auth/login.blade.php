<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="IPTM">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Login - IPTM</title>

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/front-end/img/logo.svg') }}">
<link rel="stylesheet" href="{{ asset('public/mine/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/mine/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/mine/assets/plugins/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/mine/assets/css/style.css') }}">

<style>
	.border-red{ border: 1px solid red !important}
</style>
	
</head>
	<body class="account-page">

		<div class="main-wrapper">
			<div class="account-content">
				<div class="login-wrapper">
					<div class="login-content">
					<div class="login-userset">
					<div class="login-logo">
						<img src="{{ asset('public/front-end/img/logo.svg')}}" alt="img">
					</div>
					<div class="login-userheading">
						<h3>Sign In</h3>
						<h4>Please login to your account</h4>
					</div>
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<div class="form-login">
							<label>Email</label>
							<div class="form-addons">
							<input id="email" type="email" placeholder="Enter your email address" class="form-control @error('email') is-invalid border-red @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
							@error('email')
								<span class="invalid-feedback">
									{{ $message }}
								</span>
							@else
								<img src="{{ asset('public/mine/assets/img/icons/mail.svg') }}" alt="img">
							@enderror
							</div>													
						</div>


						<div class="form-login">
							<label>Password</label>
							<div class="pass-group">
							<input id="password" type="password" placeholder="Enter your password" class="pass-input form-control @error('password') is-invalid border-red  @enderror" name="password"  autocomplete="current-password">
							@error('password')
								<span class="invalid-feedback">
									{{ $message }}
								</span>
							@else
								<span class="fas toggle-password fa-eye-slash"></span>
							@enderror
							</div>
						</div>
						
						<!--<div class="form-login">
							<div class="alreadyuser">
							<h4><a href="forgetpassword.html" class="hover-a">Forgot Password?</a></h4>
							</div>
						</div>-->
						
						<div class="form-login">
							<button type="submit" class="btn btn-login" >Sign In</button>
						</div>
					</form>
					
					<!--<div class="signinform text-center">
						<h4>Don’t have an account? <a href="{{ url('register') }}" class="hover-a">Sign Up</a></h4>
					</div>-->
					
					<!--<div class="form-setlogin">
					<h4>Or sign up with</h4>
					</div>
					<div class="form-sociallink">
					<ul>
					<li>
					<a href="javascript:void(0);">
					<img src="{{ asset('public/mine/assets/img/icons/google.png') }}" class="me-2" alt="google">
					Sign Up using Google
					</a>
					</li>
					<li>
					<a href="javascript:void(0);">
					<img src="{{ asset('public/mine/assets/img/icons/facebook.png') }}" class="me-2" alt="google">
					Sign Up using Facebook
					</a>
					</li>
					</ul>
					</div>-->
					</div>
					</div>
					<div class="login-img">
						<img src="{{ asset('public/mine/assets/img/login.jpg') }}" alt="img">
					</div>
				</div>
			</div>
		</div>


		<script src="{{ asset('public/mine/assets/js/jquery-3.6.0.min.js') }}"></script>

		<script src="{{ asset('public/mine/assets/js/feather.min.js') }}"></script>

		<script src="{{ asset('public/mine/assets/js/bootstrap.bundle.min.js') }}"></script>

		<script src="{{ asset('public/mine/assets/js/script.js') }}"></script>
	</body>
</html>