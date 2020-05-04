<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .loading {
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: center;
          justify-content: center;
}
.loading div {
  width: 1rem;
  height: 1rem;
  margin: 2rem 0.3rem;
  background: #979fd0;
  border-radius: 50%;
  -webkit-animation: 0.9s bounce infinite alternate;
          animation: 0.9s bounce infinite alternate;
}
.loading div:nth-child(2) {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}
.loading div:nth-child(3) {
  -webkit-animation-delay: 0.6s;
          animation-delay: 0.6s;
}

@-webkit-keyframes bounce {
  to {
    opacity: 0.3;
    -webkit-transform: translate3d(0, -1rem, 0);
            transform: translate3d(0, -1rem, 0);
  }
}

@keyframes bounce {
  to {
    opacity: 0.3;
    -webkit-transform: translate3d(0, -1rem, 0);
            transform: translate3d(0, -1rem, 0);
  }
}
        </style>
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
                {{-- <div class="title m-b-md">
                    Laravel - v5.8
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> --}}
                {{-- @foreach ($list as $index => $link)
                    {{ $link->title }}<br>
                @endforeach --}}
                <hr>
                <div id="app">
                    <main-component>
                        <div class="loading">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div> on loading...
                    </main-component>
                </div>

            </div>
        </div>
<script>
    window.linkList = {!! $list !!};
</script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
