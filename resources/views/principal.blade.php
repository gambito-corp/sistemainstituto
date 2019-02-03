<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        
        <title>@yield('title')</title>
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        
    </head>
    <body>
        
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="{{url('/layouts/index')}}">Home</a>
                    <a href="{{url('/layouts/quienessomos')}}">Quienes somos</a>
                    <a href="{{url('/layouts/mision')}}">Misión</a>
                    <a href="#">Nova</a>
                    <a href="#">Forge</a>
                    <a href="#">GitHub</a>
                </div>
                <p>@yield('content')</p>
    </div>
    </div>
    </body>
</html>
