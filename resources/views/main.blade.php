<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CWB - API Test</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        select {
            font-size: 1.6rem;
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
    <div class="container-fluid mx-auto">
        <div class="row">&nbsp;</div>
        <div class="row">
            <h1 class="col">中央氣象局 API - Test</h1>
        </div>
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
    <script>
        window.countys = {!!json_encode($countys) !!};

    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
