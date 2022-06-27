<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:th="http://www.thymeleaf.org"
  xmlns:layout="http://www.ultraq.net.nz/thymeleaf/layout">

<head>
	<title>MediaMart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords"
		content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<!-- /fonts -->
	<!-- css -->
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
	<link href="{{asset('assets/admin/css/login.css')}}" rel='stylesheet' type='text/css' media="all" />
	<!-- /css -->
</head>

<body>
	<h1 class="w3ls">Official Login Form</h1>
	<div class="content-w3ls">
		<div class="content-agile1">
			<h2 class="agileits1">MediaMart</h2>
			<p class="agileits2">Mediamart</p>
		</div>
		<div class="content-agile2">
			<form action="{{route('admin.checkLogin')}}" method="post">
                @csrf
                @if (session('fail'))
                <span class="msg_error" style="color: red;">
	            	Tài khoản hoặc mật khẩu không chính xác
	        	</span>
                @endif

				<div class="form-control w3layouts">
					<input type="text" name="email" id="email" placeholder="mail@example.com" title="Please enter a valid email" required="">
				</div>

				<div class="form-control agileinfo">
					<input type="password" class="lock" name="password" id="password1" placeholder="Password" required="">
				</div>
				<div class="remember">
	                <span class="checkbox1">
	                    <label class="checkbox"><input type="checkbox" name="" checked=""><i></i>Remember me</label>
	                </span>
	                <div class="forgot">
	                    <h6><a href="#">Forgot Password?</a></h6>
	                </div>
	                <div class="clear"></div>
	            </div>
				<input type="submit" class="login" value="login">
			</form>
		</div>
		<div class="clear"></div>
	</div>
    <script src="{{asset('assets/admin/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
	<script>
		$(document).ready(function(){
	        if($("span").hasClass("msg_error")) {
				console.log("msg")
				$("#email, #password1").css("border-bottom","5px solid red")
			}
        });

	</script>
</body>

</html>
