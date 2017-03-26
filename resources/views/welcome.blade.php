<!DOCTYPE html>


<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lostaf Main</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/../public/css/default.css" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="/../public/css/postitus.css" rel="stylesheet" type="text/css">

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="./dist/js/bootstrap.min.js"></script>

        <!-- Head icon -->
        <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/2000px-Magnifying_glass_icon.svg.png">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href={{url('/')}}>Lost & Found Foundation</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li title="<?php echo __('userHelp.home')?>" class="active"><a href='{{url('/')}}'><span class="glyphicon glyphicon-home"></span><?php echo __('homePageMessages.home')?></a></li>
                            <li title="<?php echo __('userHelp.seeAds')?>" ><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></li>
                            <li title="<?php echo __('userHelp.aboutUs')?>"><a href="{{url('/meist')}}"><span class="glyphicon glyphicon-info-sign"></span><?php echo __('homePageMessages.us') ?></a></li>
                            @if(auth()->check())
                                <a title="<?php echo __('userHelp.addAd')?>" href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a>
                                <li title="<?php echo __('userHelp.logout')?>"><a href="{{route('logout')}}"><?php echo __('auth.logout')?></a></li>
                            @else
                                <li><a title="<?php echo __('userHelp.login')?>" href='{{ route('login') }}'><?php echo __('auth.login')?></a></li>
                                <li><a title="<?php echo __('userHelp.register')?> "href='{{route('register')}}'><?php echo __('auth.register')?></a></li>
                            @endif
                            <li><form class="navbar-search navbar-form" method="get">
                                    <input title="<?php echo __('userHelp.search')?>" class="form-control" placeholder="<?php echo __('adPageMessages.search') ?>" name="s" type="text">
                                </form>
                            </li>
                            <li class="menu-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('adPageMessages.lang') ?><b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>@foreach (config('app.locales') as $lang => $language)
                                            <a href="{{ route('lang.switch', $lang) }}"><img src='{{asset('/icons/'.$lang.'.png')}}' alt="{{$language}}"> {{$language}}</a>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
                <div class="content">
                    <div class="title m-b-md">
                        Lost & Found Foundation <br>
                        <?php echo __('homePageMessages.slogan')?>
                    </div>
                    @if (auth()->check())
                    <div class="title m-b-md">
                        Welcome, <?php echo auth()->user()->kasutajanimi ?>
                    </div>
                    @endif
                </div>
        </div>
    </body>
</html>
