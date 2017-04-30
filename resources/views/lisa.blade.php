<!DOCTYPE html PUBLIC>
<html lang="{{config('app.locale')}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <title><?php echo __('addAdmessages.pageTitle')?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/../public/css/postitus.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/../public/css/postitus.css" rel="stylesheet">


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Head icon -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/2000px-Magnifying_glass_icon.svg.png">

</head>
<body class="body-bottom">
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
                <li title="<?php echo __('userHelp.home')?>" ><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span><?php echo __('homePageMessages.home')?></a></li>
                <li title="<?php echo __('userHelp.seeAds')?>"><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></li>
                @if(auth()->check())
                    <li title="<?php echo __('userHelp.addAd')?>" class="active"><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.addAd')?></a></li>

                @endif
                <li title="<?php echo __('userHelp.aboutUs')?>"><a href="{{url('/meist')}}"><span class="glyphicon glyphicon-info-sign"></span><?php echo __('homePageMessages.us') ?></a></li>
                <li><form class="navbar-form navbar-left">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form></li>
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


<br><br><br>
    <div class="flex-center position-ref full-height">


            <div class="title m-b-md">
                <h1><?php echo __('addAdmessages.addAd')?></h1>
            </div>


        @if(Session::has('msg'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo __('warnings.success')?></strong><br><?php echo __('warnings.success_msg')?>

            </div>
        @elseif (Session::has('msg_error'))
            <div class="alert alert-warning alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo __('warnings.fail')?></strong><br><?php echo __('warnings.fail_msg')?>
            </div>


        @endif

            {!! Form::open(array('action'=>'lisaController@store','class' => 'form', 'files' => 'true')) !!}

                <div class="form-group">
                    {!! Form::label('teema', __('addAdmessages.adTopic')) !!}
                    {!! Form::text('teema', null, array('required','maxlength=50', 'class' => 'form-control', 'placeholder' => __('addAdmessages.adTopicPH'))) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('tekst' , __('addAdmessages.adText')) !!}
                    {!! Form::textarea('tekst', null, array('required', 'class' => 'form-control', 'placeholder' =>  __('addAdmessages.adTextPH'))) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('tekst' , __('addAdmessages.adTags')) !!}
                    {!! Form::text('tagid', null, array('required', 'maxlength=50', 'class' => 'form-control', 'placeholder' =>  __('addAdmessages.adTagsPH'))) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('pilt', __('addAdmessages.adPic')) !!}
                    {!! Form::file('kuulutusePilt') !!}
                </div>

                <div class="form-group">
                    {!! Form::submit(__('addAdmessages.adSubmit', ['onClick'=>'getMessage()'])) !!}
                </div>


            {!! Form::close() !!}
    </div>




<br><br><br><br>
<footer class="row">
    @include('footer')
</footer>
</body>
</html>

