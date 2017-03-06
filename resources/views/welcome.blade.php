<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lost & Found Foundation</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/../LAFF/public/css/default.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href={{url('/')}}>Home</a>
                <a href="{{url('/lisa')}}">Lisa kuulutus</a>
            </div>

            <div class="content">
                <div class="title m-b-md">
                    Lost & Found Foundation
                </div>

                <div class="links">
                    <a href="{{url('hello')}}">This</a>
                    <a href="https://laracasts.com">is</a>
                    <a href="https://laravel-news.com">a</a>
                    <a href="https://forge.laravel.com">beta</a>
                    <a href="https://github.com/laravel/laravel">Test</a>
                </div>
            </div>
        </div>
    </body>
</html>
