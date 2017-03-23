<!DOCTYPE html>
<html lang="en">
<head>

  <title>Lost &amp; Found Foundation</title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/../public/css/postitus.css" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Head icon -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/2000px-Magnifying_glass_icon.svg.png">


</head>
<body class="body-bottom">
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href={{url('/')}}>Lost & Found Foundation</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href={{url('/')}}><span class="glyphicon glyphicon-home"></span><?php echo __('homePageMessages.home')?></a></li>
                <li class="active"><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></li>
                <li><a href="{{url('/meist')}}"><span class="glyphicon glyphicon-info-sign"></span><?php echo __('homePageMessages.us') ?></a></li>
                @if(auth()->check())
                    <a href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a>
                    <li><a href="{{route('logout')}}"><?php echo __('auth.logout')?></a></li>
                @else
                    <li><a href='{{ route('login') }}'><?php echo __('auth.login')?></a></li>
                    <li><a href='{{route('register')}}'><?php echo __('auth.register')?></a></li>
                @endif
                <li><form class="navbar-search navbar-form" method="get" action="">
                        <input class="form-control" placeholder="<?php echo __('adPageMessages.search') ?>" name="s" type="text">
                    </form>
                </li>
                <li class="menu-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('adPageMessages.lang') ?><b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>@foreach (config('app.locales') as $lang => $language)
                                <a href="{{ route('lang.switch', $lang) }}"><img src={{asset('/icons/'.$lang.'.png')}}> {{$language}}</a>
                            @endforeach
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<br/>
<div class="container">
    <div class="jumbotron" style="background-color: white">
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm col-md-offset-2">
                    <div class="col-sm-10">
                        <ul class="nav nav-pills">
                            <li class="active">
                                <a href="#"><?php echo __('adPageMessages.new') ?></a>
                            </li>
                            <li>
                                <a href="#"><?php echo __('adPageMessages.top') ?></a>
                            </li>
                            <li>
                                <a href="#"><?php echo __('adPageMessages.found') ?></a>
                            </li>
                        </ul>
                        <?php foreach ($postitusi as $postitusi) {?>
                        <p><?php echo $postitusi->arv; echo __('adPageMessages.totalAds') ?></p><?php } ?>
                        <?php
                        foreach ($postitus as $postitus) {?>
                        <div class="col-md-12 col-lg-12 container">
                            <div class="row">
                                <h2><?php echo $postitus->pealkiri ?></h2>
                                <h5><span class="glyphicon glyphicon-time"></span><?php echo __('adPageMessages.user'); echo $postitus->kasutaja; echo ", " ; echo $postitus->date; echo ", "; echo $postitus->email ?></h5>
                                <h5><span class="label label-danger"><?php echo $postitus->peatag ?></span> <span class="label label-primary">kaotatud</span></h5><br>
                                <div>
                                    <p style="float: left;"><img border="1px" height="236" src="<?php echo $postitus->pildilink ?>" width="200"></p>
                                    <p><?php echo $postitus->kirjeldus ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="./dist/js/bootstrap.min.js"></script>
</body>
<footer>
    <div class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <p class="navbar-text pull-left">© 2017 - Created by Stanislav Mõškovski, Mari-Liis Pihlapuu, Edgar Pašenkov
            </p>
        </div>


    </div>
</footer>
</html>

