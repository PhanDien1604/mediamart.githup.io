<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MediaMart</title>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
    @yield('css')
</head>
<body>
    @include('clients.blocks.header')
    <main>
        <aside>
            @section('slidebar')
                @include('clients.blocks.slidebar');
            @show
        </aside>
        <div class="content">
            @yield('content')
        </div>
    </main>
    @include('clients.blocks.footer')

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/custom.js')}}"></script>
    <script>
        $('.carousel-inner .carousel-item:first-child').addClass('active')
        $('.carousel-indicators button:first-child').addClass('active')
        $('.carousel-indicators button:first-child').attr('aria-current','true')

    </script>
    @yield('js')
</body>
</html>
