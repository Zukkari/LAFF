<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>

  <title>Lostaf Ads</title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <!-- Styles -->
    <link href="/../public/css/postitus.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./dist/js/bootstrap.min.js"></script>

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
                <li title="<?php echo __('userHelp.home')?>"><a href='{{url('/')}}'><span class="glyphicon glyphicon-home"></span><?php echo __('homePageMessages.home')?></a></li>
                <li title="<?php echo __('userHelp.seeAds')?>" class="active"><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></li>
                <li title="<?php echo __('userHelp.aboutUs')?>"><a href="{{url('/meist')}}"><span class="glyphicon glyphicon-info-sign"></span><?php echo __('homePageMessages.us') ?></a></li>
                @if(auth()->check())
                    <li><a title="<?php echo __('userHelp.addAd')?>" href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a></li>
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
<br/>
<div class="container">
    <div class="jumbotron" style="background-color: white">
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm col-md-offset-2">
                    <div class="col-sm-10">
                        <ul class="nav nav-pills">
                            <li class="active">
                                <a href="#" title="<?php echo __('userHelp.newAds')?>"><?php echo __('adPageMessages.new') ?></a>
                            </li>
                            <li>
                                <a href="#" title="<?php echo __('userHelp.topAds')?>"><?php echo __('adPageMessages.top') ?></a>
                            </li>
                            <li>
                                <a href="#" title="<?php echo __('userHelp.recentlyAds')?>"><?php echo __('adPageMessages.found') ?></a>
                            </li>
                        </ul>
                        <?php foreach ($postitusi as $postitusi) {?>
                        <p><?php echo $postitusi->arv; echo __('adPageMessages.totalAds') ?></p><?php } ?>
                        <div class="posts endless-pagination" data-next-page="{{$postitus->nextPageUrl()}}">
                            @foreach($postitus as $post)
                                <div class="col-md-12 col-lg-12 container">
                                    <div class="row" id="kuulutus">
                                        <h2><?php echo $post->pealkiri ?></h2>
                                        <h5><span class="glyphicon glyphicon-time"></span><?php echo __('adPageMessages.user'); echo $post->kasutaja; echo ", " ; echo $post->date; echo ", "; echo $post->email?></h5>
                                        <h5><span class="label label-danger"><?php echo $post->peatag ?></span> <span class="label label-primary">kaotatud</span></h5><br>
                                        <div>
                                            <p><img class="kuulutusePilt" id="pilt" src="<?php echo $post->pildilink ?>" alt="image"></p>
                                            <p><?php echo $post->kirjeldus ?></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="loading" style="text-align: center">
                            <img src="/../public/pictures/waiting.gif" style="width:100px; height: 100px" alt="loadingGIF">
                        </div>


                        <div id="connectionerror" class="alert alert-danger alert-dismissable">
                            <?php echo __('warnings.noconnection') ?>
                        </div>

                        <div id="connectionestab" class="alert alert-success alert-dismissable">
                            <?php echo __('warnings.connection') ?>
                        </div>

                        <script>
                            /*See skript siin AJAXI abiga laeb postitusi juurde lehele, esialgu on lehel 3 postitust ja kui kasutaja scollib alla, tulevad
                             uued postitused nähtavale. Osa, mis laetakse juurde asub view/ajaxStuff/ajax/index.blade.php's.
                             */
                            $('.loading').hide(); //eespool defineeritud loading gif, koguaeg me seda ei näita
                            $(document).ready(function () {
                                $(window).scroll(fetchPost);
                                function fetchPost() { //fetchimine siin
                                    if (navigator.onLine) {
                                        var page = $('.endless-pagination').data('next-page');
                                        if (page !== null) { //Kui meil veel midagi fetchida, juurde laadida, näitame laadimise ajal loading gifi ja laeme ajaxi abil juurde
                                            $('.loading').show();
                                            clearTimeout($.data(this, "scrollCheck"));
                                            $.data(this, "scrollCheck", setTimeout(function () {
                                                var scroll_position_for_post_load = $(window).height() + $(window).scrollTop() + 100;
                                                if (scroll_position_for_post_load >= $(document).height()) {
                                                    $.get(page, function (data) {
                                                        $('.posts').append(data.postitus);
                                                        $('.endless-pagination').data('next-page', data.next_page);

                                                    });
                                                    $('.loading').hide(); //Kui info laetud kaotame loading gifi
                                                }
                                            }, 350))
                                        } else { //Kui jõumae lõppu
                                            $('.loading').hide();
                                        }
                                    }
                                }
                            })
                        </script>

                        <script type="text/javascript">
                            document.getElementById('connectionerror').style.display = 'none';
                            document.getElementById('connectionestab').style.display = 'none';
                            window.setInterval(checkConnection, 5000);

                            var last = false;
                            function checkConnection() {
                                var current = navigator.onLine;

                                if (current) {
                                    document.getElementById('connectionerror').style.display = 'none';
                                    if (last) {
                                        document.getElementById('connectionestab').style.display = 'block';
                                        last = false;
                                    } else {
                                        document.getElementById('connectionestab').style.display = 'none';
                                    }
                                } else {
                                    document.getElementById('connectionerror').style.display = 'block';
                                    last = true;
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <p class="navbar-text pull-left">© 2017 - Created by Stanislav Mõškovski, Mari-Liis Pihlapuu, Edgar Pašenkov
            </p>
        </div>
    </div>
</footer>
</body>
</html>

