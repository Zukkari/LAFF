<!DOCTYPE html>
<html>
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
                <li><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></li>
                <li class="active"><a href="{{url('/meist')}}"><span class="glyphicon glyphicon-info-sign"></span><?php echo __('homePageMessages.us') ?></a></li>
                @if(auth()->check())
                    <li><a href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a></li>
                    <li><a href="{{route('logout')}}"><?php echo __('auth.logout')?></a></li>
                @else
                    <li><a href='{{ route('login') }}'><?php echo __('auth.login')?></a></li>
                    <li><a href='{{route('register')}}'><?php echo __('auth.register')?></a></li>
                @endif
                <li><form class="navbar-search navbar-form" method="get">
                        <input class="form-control" placeholder="<?php echo __('adPageMessages.search') ?>" name="s" type="text">
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



<div class="container">
    <div class="jumbotron" style="background-color: white">
        <div class="container-fluid">
                    <h2 style="color:black" >Kes me oleme ja miks me seda teeme?</h2><br>
                    <p style="color:black">Antud veebileht on loodud projekti tegemise raames Tartu Ülikooli informaatikateaduskonna aines "Veebirakenduste
                    loomine". Projekti raames õppime looma veebirakendusi kasutades erinevaid võtteid, lahendusi ja keeli. Antud veebileht valmis kasutades raamistiku
                    Laravel. Selliseid keeli nagu PHP, CSS, HTML, Javascript. Kujunduses aitas kaasa ka Bootstrap<br><br>
                    Me ise oleme kolm täitsa tavalist Tartu Ülikooli teise aasta tudengit, kelle põhiülesandeks on mitte ülikoolist välja kukkuda ja
                    lisaks veel kindlustada endale nuudliterohke tulevik!<br>
                    <h2 style="color:black">Meie kontaktandmed</h2><br>
                    <p>Stanislav Mõškovski - <a href="mailto:stanislav.myshkovski@gmail.com" target="_top">saada kiri</a></p>
                    <img src="/../public/pictures/meist/Stanislav.jpg" class="img-circle" alt="Stanislav">
                    <p>Mari-Liis Pihlapuu - <a href="mailto:mariliis.pihlapuu@gmail.com" target="_top">saada kiri</a></p>
                    <img src="/../public/pictures/meist/Mari.png" alt="Mari-Liis" class="img-circle">
                    <p>Edgar Pašenkov (projektijuht) - <a href="mailto:edgarpasenkov@gmail.com" target="_top">saada kuri kiri</a></p>
                    <img src="/../public/pictures/meist/edgar.png" alt="Edgar" class="img-circle">
                    <h2 style="color:black">Kust meid leida saab?</h2><br>
                    <div id="map" style="width: 100%;height:400px;">

                        <script>
                            function asukoht() {
                                var myLatLng = {lat: 58.378202, lng: 26.714864};

                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 17,
                                    center: myLatLng
                                });

                                var marker = new google.maps.Marker({
                                    position: myLatLng,
                                    animation: google.maps.Animation.BOUNCE,
                                    map: map,
                                    icon:{
                                        url: "/../public/pictures/meist/marker.png",
                                        scaledSize: new google.maps.Size(40, 45)
                                    },
                                    title: 'Siin me veedamegi enamuse enda ajast!'
                                });
                            }

                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3Tscsbc43oo3gHqtxPAVnQ04SQtiWF1Q&callback=asukoht" type="text/javascript"></script>
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