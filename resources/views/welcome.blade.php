<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Examples</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 5em;
            }

            .links > .link {
                color: #636b6f;
                padding: 0 1.5em;
                font-size: 1em;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }
            .links > .ref {
                color: #636b6f;
                font-size: 0.8em;
                text-decoration: none;
            }

            .links {
                margin-bottom: 1em;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel Examples
                </div>
                <div class="links m-b-md">
                    <a class="link" href="https://laravel.com/docs">Documentation</a>
                    <a class="link" href="https://laravel.tw/docs">中文文件</a>
                    <a class="link" href="https://github.com/lovenery/laravel-examples">GitHub</a>
                </div>
                <div class="links">
                    <a class="link" href="{{ url('instagram') }}">Instagram API</a>
                    <a class="ref" href="http://itsolutionstuff.com/post/laravel-5-instagram-api-tutorial-with-exampleexample.html">itsolutionstuff.com</a>
                </div>
            </div>
        </div>
    </body>
</html>
