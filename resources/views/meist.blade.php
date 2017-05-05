<!DOCTYPE html>
<html>
<head>
    <title><?php echo __('titles.titleUs')?></title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <!-- Styles -->
    <link rel="preload" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" as="stylesheet">
    <link href="/../public/css/postitus.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                <li title="<?php echo __('userHelp.home')?>"><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span><?php echo __('homePageMessages.home')?></a></li>
                <li title="<?php echo __('userHelp.seeAds')?>"><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></li>
                @if(auth()->check())
                    <li><a title="<?php echo __('userHelp.addAd')?>" href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a></li>
                @endif
                <li title="<?php echo __('userHelp.aboutUs')?>" class="active"><a href="{{url('/meist')}}"><span class="glyphicon glyphicon-info-sign"></span><?php echo __('homePageMessages.us') ?></a></li>
                <li>
                    {!! Form::open(['method'=>'GET','url'=>'search','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                    <div class="input-group">
                        {!! Form::text('search', null, array('class' => 'form-control', 'placeholder' =>  __('titles.titleSearch'))) !!}
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </li>
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



<div class="container">
    <div class="jumbotron">
        <div class="container-fluid">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                    <h2 class="meistH">Kes me oleme ja miks me seda teeme?</h2><br>
                    <p class="meistH">Antud veebileht on loodud projekti tegemise raames Tartu Ülikooli informaatikateaduskonna aines "Veebirakenduste
                    loomine". Projekti raames õppime looma veebirakendusi kasutades erinevaid võtteid, lahendusi ja keeli. Antud veebileht valmis kasutades raamistiku
                    Laravel. Selliseid keeli nagu PHP, CSS, HTML, Javascript. Kujunduses aitas kaasa ka Bootstrap<br><br>
                    Me ise oleme kolm täitsa tavalist Tartu Ülikooli teise aasta tudengit, kelle põhiülesandeks on mitte ülikoolist välja kukkuda ja
                    lisaks veel kindlustada endale nuudliterohke tulevik!<br>

                    <h2 class="meistH">Meie kontaktandmed</h2><br>
			<table>
			<tr>
			<td><img src="/../public/pictures/meist/Stanislav.jpg" class="img-circle" alt="Stanislav"></td>
			<td><p>Stanislav Mõškovski - <a href="mailto:stanislav.myshkovski@gmail.com" target="_top">saada kiri</a></p></td>
			</tr>
			<tr>
			<td><img src="/../public/pictures/meist/Mari.png" alt="Mari-Liis" class="img-circle"></td>
			<td><p>Mari-Liis Pihlapuu - <a href="mailto:mariliis.pihlapuu@gmail.com" target="_top">saada kiri</a></p></td>
			</tr>
			<tr>
			<td><img src="/../public/pictures/meist/edgar.png" alt="Edgar" class="img-circle"></td>
			<td><p>Edgar Pašenkov (projektijuht) - <a href="mailto:edgarpasenkov@gmail.com" target="_top">saada kuri kiri</a></p></td>
			</tr>
			</table>
            <div class="container-fluid"><div class="break"></div></div>

            <?php
            $private_key = openssl_pkey_get_private(
                "-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEAnkQhCOW55dSqZ47zo9SLkSZNcYCnTEeRS6WGvneK07XuJ5qN
exmLWazElZOB/oQXw80stU5p1Uy7z72XOZaouvWBCaNTPjAEupd3PpzUYikfWZDM
G+juxGDS8+lmdWBiEsder5OFT9GknciKTki1j/p6rGR5FqNAZIFyINVCeOfpSNlB
TnhRSyIOs0wr5Mv5dIyJONiTnxA54Ne5e0/LGtqjrbK2w/2PaGhuuduOS3MRgKIo
mEZiWniJa20a41nIY8VAANuj6msYSUR5s+AcnFzJRje2GCrML6aOXSc4vY52nSLA
yB++mMcu01viRbL+sZpfI/TQ8PQopojDMnRkYQIDAQABAoIBADdLVENYh69tsq+F
uUfG7ZAj0rDSIyE6a+ADD+WhvGYlTPSXQdD9ZrtI6lHb/HHg0rC9EV6y67TzHzcA
ZUJgicjwF0o3vtCeVDigzK+aeXVmKqbPORCTPEBuF6XSKNLffsRS1ZkAMHZnp1zd
AL1DF/Qarhtm6wtmtAupUid4esXkq+XNHa2P2U/sSCOHPUNmD2y84Fxo6h8yc9uk
ZZd+qCdhu6XqNPhwPlzhirzUNEiaELw8nNu3F2YWrXNNcJec9eAU4a3vCquNEI4R
4k2Q9xiF5qv8X9g/ZXo1T0YC2as6ryT518F1lJZk8jLv0340kfHTwCf4qEZ5I92x
tJgbYoUCgYEAzVk0cr9FyWfl+Cr7kdPZMiTUDX/NiljEFiRiCJ56wDqKmE0ESiqf
klT8HVvqnT62pnlbeeoxKxKON05kJ7bnozBiKHr8bozghqOav3W2aMFBqFa0bwo1
AiUj3Sv1Z+w+Y3Ifz+KBFCJ84nfSB7K/0/DrcpWuhxMGPYuBocMXJJ8CgYEAxU3l
MKZHfAcVfgKaXKfez+lWX45RvzmRTTQfL0gj0CUEpI3z7Gsn3bDYflSvMvBJ9aE3
cTeUznvqPIkHV1EZvy2cBpNKqFPwsMLOQAM0gbeQLNgW0T/yCSA5tizSVnfukMYK
Xiv8comXzlrHJtX8yq9yRR6gzZr29altc4v21v8CgYEAsS1ApakHK6nrsF5VxRMG
mc9Q73zP+YhxV7F4rHsg6m8YWiRJiTyRhg6xoRtHqPkNW0HmfaBlYAaYknueyu1z
m0gJyWekGjaPG1xaDswf4O6uGfMFp7Ek337wHMrq6QnbIq67aADE4nyHSFed7mp6
PQHoBGvFtGHjxoJyDQJpG30CgYB2umoZfWX015pySoSzDv2AZWxpcg31IWIzcBL3
89RBM5V4pEdNVCoYOIv+cV1ALOKEoe/n/Edafay1osu9GnuA1KRYPJgndOOYqpFM
aeFV0a07nwkUAAPYxACWhKBKEj+H9PRWOOff0LZ+IZhH4WsOWMdNmqGvN/o2WC8Z
4fa25wKBgBqE/S1Fw7ack0aZ9Piu+80DeZtvFnMflVdH5uAqc1GWCgrl7Coc6kO+
zcmMlFX5A0EthapSgZkQFYDEwSzwkeGgb8RrQLBfPJjaXZR68pDs3/MNq+pHY0xO
cHmKJCxrpwBgBhb9SEbnMp43yfXArKaI4u4tAqqsCg+hB8vJIKis
-----END RSA PRIVATE KEY-----");

            $date = date('Y-m-d\TH:i:s\+0300');

            $fields = array(
                "VK_SERVICE" => "1011",
                "VK_VERSION" => "008",
                "VK_SND_ID" => "uid100010",
                "VK_STAMP" => "12345",
                "VK_AMOUNT" => "5",
                "VK_CURR" => "EUR",
                "VK_ACC" => "EE152200221234567897",
                "VK_NAME" => "Lost & Found Foundation",
                "VK_REF" => "1234561",
                "VK_LANG" => "EST",
                "VK_MSG" => "Make Lost & Found Foundation great again!",
                "VK_RETURN" => "http://lostaf.cs.ut.ee/meist",
                "VK_CANCEL" => "http://lostaf.cs.ut.ee/meist", /* Võib midagi muud ka välja mõelda */
                "VK_DATETIME" => "2017-04-06T22:05:55+0300",
                "VK_ENCODING" => "utf-8",
            );

            $data = str_pad(mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
                str_pad(mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
                str_pad(mb_strlen($fields["VK_SND_ID"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
                str_pad(mb_strlen($fields["VK_STAMP"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
                str_pad(mb_strlen($fields["VK_AMOUNT"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 5 */
                str_pad(mb_strlen($fields["VK_CURR"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
                str_pad(mb_strlen($fields["VK_ACC"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE152200221234567897 */
                str_pad(mb_strlen($fields["VK_NAME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* Lost & Found Foundation */
                str_pad(mb_strlen($fields["VK_REF"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
                str_pad(mb_strlen($fields["VK_MSG"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Make Lost & Found Foundation great again! */
                str_pad(mb_strlen($fields["VK_RETURN"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /*  */
                str_pad(mb_strlen($fields["VK_CANCEL"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /*  */
                str_pad(mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2016-04-08T18:51:12+0300 */

            openssl_sign($data, $signature, $private_key, OPENSSL_ALGO_SHA1);
            $fields["VK_MAC"] = base64_encode($signature);

            ?>

            <div class="break"></div>
            <p>Make Lost & Found Foundation great again!</p>

            <form method="post" action="https://localhost:8080/banklink/swedbank-common">

                <?php foreach($fields as $key => $val):?>
                <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
                <?php endforeach; ?>
                <input type="submit" class="donate" value="Please take my money"/>
            </form>
			
                <h2 class="meistH">Kust meid leida saab?</h2><br>
                    <div id="map">

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
<br><br><br><br>
<footer class="row">
    @include('footer')
</footer>
</body>
</html>