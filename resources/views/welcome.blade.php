<!DOCTYPE php>


<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lost & Found Foundation</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/../public/css/default.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    <a href={{url('/')}}><?php echo __('homePageMessages.home')?></a>
                    <a href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a>
                    <a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a>

                    <div class="position-ref right">
                        @foreach (config('app.locales') as $lang => $language)
                            <div class="links"><a href="{{ route('lang.switch', $lang) }}"><img src={{asset('/icons/'.$lang.'.png')}}> {{$language}}</a></div>
                        @endforeach
                    </div>
                </div>

                <div class="content">
                    <div class="title m-b-md">
                        Lost & Found Foundation
                    </div>
                </div>
        </div>
    </body>
</html>
