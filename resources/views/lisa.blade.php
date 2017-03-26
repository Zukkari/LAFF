<!DOCTYPE html PUBLIC>
<html lang="{{config('app.locale')}}">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Head icon -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/2000px-Magnifying_glass_icon.svg.png">


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./dist/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/../public/css/postitus.css" rel="stylesheet" type="text/css">

    <title><?php echo __('addAdmessages.pageTitle')?></title>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href={{url('/')}}>Lost & Found Foundation</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li title="<?php echo __('userHelp.home')?>"><a href='{{url('/')}}'><span class="glyphicon glyphicon-home"></span><?php echo __('homePageMessages.home')?></a></li>
                <li title="<?php echo __('userHelp.seeAds')?>" ><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></li>
                <li title="<?php echo __('userHelp.aboutUs')?>" ><a href="{{url('/meist')}}"><span class="glyphicon glyphicon-info-sign"></span><?php echo __('homePageMessages.us') ?></a></li>
                @if(auth()->check())
                    <li title="<?php echo __('userHelp.addAd')?>" class="active"><a href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a></li>
                    <li title="<?php echo __('userHelp.logout')?>"><a href="{{route('logout')}}"><?php echo __('auth.logout')?></a></li>
                @else
                    <li><a title="<?php echo __('userHelp.login')?>" href='{{ route('login') }}'><?php echo __('auth.login')?></a></li>
                    <li><a title="<?php echo __('userHelp.register')?>" href='{{route('register')}}'><?php echo __('auth.register')?></a></li>
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


<div class="flex-center position-ref full-height">

    <div class="content">

        <div class="title m-b-md">
            <br><br><br>
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
    </div>

    @endif

    {!! Form::open(array('action'=>'lisaController@store','class' => 'form', 'files' => 'true')) !!}

    <div class="form-group">
        {!! Form::label('teema', __('addAdmessages.adTopic')) !!}
        {!! Form::text('teema', null, array('required', 'class' => 'form-control', 'placeholder' => __('addAdmessages.adTopicPH'))) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tekst' , __('addAdmessages.adText')) !!}
        {!! Form::textarea('tekst', null, array('required', 'class' => 'form-control', 'placeholder' =>  __('addAdmessages.adTextPH'))) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tekst' , __('addAdmessages.adTags')) !!}
        {!! Form::text('tagid', null, array('required', 'class' => 'form-control', 'placeholder' =>  __('addAdmessages.adTagsPH'))) !!}
    </div>

    <div class="form-group">
        {!! Form::label('pilt', __('addAdmessages.adPic')) !!}
        {!! Form::file('kuulutusePilt') !!}
    </div>

    <div class="form-group">
        {!! Form::submit(__('addAdmessages.adSubmit')) !!}
    </div>
    {!! Form::close() !!}
</div>
</div>
</body>
</html>

