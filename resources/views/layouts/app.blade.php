<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/../public/css/postitus.min.css" rel="stylesheet">



    <!-- Styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href={{url('/')}}>Lost & Found Foundation</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li title="<?php echo __('userHelp.home')?>"><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span><?php echo __('homePageMessages.home')?></a></li>
                        <li title="<?php echo __('userHelp.seeAds')?>"><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></li>
                        @if(auth()->check())
                            <li><a title="<?php echo __('userHelp.addAd')?>" href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a></li>
                        @endif
                        <li title="<?php echo __('userHelp.aboutUs')?>"><a href="{{url('/meist')}}"><span class="glyphicon glyphicon-info-sign"></span><?php echo __('homePageMessages.us') ?></a></li>
                        <li>{!! Form::open(['method'=>'GET','url'=>'search','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                            <div class="input-group">
                                {!! Form::text('search', null, array('class' => 'form-control', 'placeholder' =>  __('titles.titleSearch'))) !!}
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('adPageMessages.lang') ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>@foreach (config('app.locales') as $lang => $language)
                                        <a href="{{ route('lang.switch', $lang) }}"><img src='{{asset('/icons/'.$lang.'.png')}}' alt="{{$language}}"> {{$language}}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </li>
                        @if (auth()->guest())
                            <li><a title="<?php echo __('userHelp.login')?>" href='{{ route('login') }}'><?php echo __('auth.login')?></a></li>
                            <li><a title="<?php echo __('userHelp.register')?>" href='{{route('register')}}'><?php echo __('auth.register')?></a></li>
                        @endif

                        @if (auth()->check())
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="{{auth()->user()->avatar}}" height="25px"> {{ auth()->user()->kasutajanimi }}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('/lisa')}}"><?php echo __('userHelp.addAd')?></a>
                                        <a href="{{url('/profile/'.auth()->user()->kasutajanimi)}}"><?php echo __('userHelp.profile')?></a>
                                        <a href="{{route('logout')}}"><?php echo __('userHelp.logout')?></a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br><br><br>


        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/../LAFF/public/js/app.js"></script>
</body>
</html>
