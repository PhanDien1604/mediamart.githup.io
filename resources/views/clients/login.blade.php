<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MediaMart</title>
    <link href="{{asset('assets/clients/css/login.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">

</head>
<body class="">
    <!--header start here-->
    <div class="loader">
        <div class="loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
    
    <div class="header">
            <div class="header-main">
                <h1>Login</h1>

                @if (session('fail'))
                    <div class="box-fail">{{session('fail')}}</div>
                @endif
                <div class="header-bottom">
                    <div class="header-right w3agile">
                        
                        <div class="header-left-bottom agileinfo">
                            <form action="{{route('home.postLogin')}}" method="post">
                                @csrf
                                <div class="form-input">
                                    <input type="text" name="account" value="{{old('account')}}" placeholder="Account"/>
                                    @error('account')
                                        <div class="box-error">
                                            <span><i class="fas fa-exclamation"></i>{{$message}}</span>
                                        </div>
                                    @enderror
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
                                
                                <div class="remember">
                                    <span class="checkbox1">
                                        <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Remember me</label>
                                    </span>
                                    <div class="forgot">
                                        <h6><a href="#">Forgot Password?</a></h6>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <input type="submit" value="Login">
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
        <p>Bạn mới biết đến MediaMart?<a href="{{route('home.register')}}">  Đăng ký </a></p>
    </div>
    <!--footer end here-->

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(window).on("load",function() {
        $('.loader').fadeOut(500);
    })
    // $('input').attr('autocomplete','off')
</script>
</body>
</html>