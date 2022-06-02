<!DOCTYPE HTML>
<html>
<head>
<title>MediaMart</title>
<!-- Custom Theme files -->
<link href="{{asset('assets/clients/css/login.css')}}" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<style>
    .header-main {
        padding-top: 40px;
    }
</style>
</head>
<body>
    <!--header start here-->
    <div class="loader">
        <div class="loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
    <div class="header">
            <div class="header-main">
                <h1>Register</h1>
                
                <div class="header-bottom">
                    <div class="header-right w3agile">
                        
                        <div class="header-left-bottom agileinfo">
                            <form action="{{route('home.postRegister')}}" method="post">
                                @csrf
                                <div class="form-input">
                                    <input type="text" name="username" placeholder="User name" value="{{old('username')}}"/>
                                    @error('username')
                                        <div class="box-error">
                                            <span><i class="fas fa-exclamation"></i>{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-input">
                                    <input type="text" name="account" value="{{old('account')}}" placeholder="Account"/>
                                    @if (!$errors->has('username'))
                                    @error('account')
                                        <div class="box-error">
                                            <span><i class="fas fa-exclamation"></i>{{$message}}</span>
                                        </div>
                                    @enderror
                                    @endif
                                    
                                </div>
                                <div class="form-input">
                                    <input type="password" name="password" value="{{old('password')}}" placeholder="Password"/>
                                    @if (!$errors->has('account'))
                                    @error('password')
                                        <div class="box-error">
                                            <span><i class="fas fa-exclamation"></i>{{$message}}</span>
                                        </div>
                                    @enderror
                                    @endif
                                </div>
                                <div class="form-input">
                                    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Confirm password"/>
                                    @if (!$errors->has('password'))
                                    @error('password_confirmation')
                                        <div class="box-error">
                                            <span><i class="fas fa-exclamation"></i>{{$message}}</span>
                                        </div>
                                    @enderror
                                    @endif
                                </div>
                                <input type="submit" value="Register">
                            </form>	
                            <div class="header-left-top">
                                <div class="sign-up"> <h2>or</h2> </div>
                            </div>
                            <div class="header-social wthree">
                                <a href="#" class="face"><h5>Facebook</h5></a>
                                <a href="#" class="twitt"><h5>Twitter</h5></a>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
    </div>
    <!--header end here-->
    <div class="choose_rl">
        <p>Bạn đã có tài khoản?  <a href="{{route('home.login')}}">  Đăng nhập </a></p>
    </div>
    <!--footer end here-->

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(window).on("load",function() {
            $('.loader').fadeOut(500);
        })
        $('input').attr('autocomplete','off')
    </script>

</body>
</html>