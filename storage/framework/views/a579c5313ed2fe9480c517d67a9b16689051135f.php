<!DOCTYPE html>


<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo __('titles.titleHome')?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/../LAFF/public/css/postitus.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/../LAFF/public/css/postitus.css" rel="stylesheet">


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
            <a class="navbar-brand" href=<?php echo e(url('/')); ?>>Lost & Found Foundation</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li title="<?php echo __('userHelp.home')?>" class="active"><a href="<?php echo e(url('/')); ?>"><span class="glyphicon glyphicon-home"></span><?php echo __('homePageMessages.home')?></a></li>
                <li title="<?php echo __('userHelp.seeAds')?>"><a href="<?php echo e(url('/postitus')); ?>"><?php echo __('homePageMessages.ads')?></a></li>
                <?php if(auth()->check()): ?>
                    <li><a title="<?php echo __('userHelp.addAd')?>" href="<?php echo e(url('/lisa')); ?>"><?php echo __('homePageMessages.addAd')?></a></li>
                <?php endif; ?>
                    <li title="<?php echo __('userHelp.aboutUs')?>"><a href="<?php echo e(url('/meist')); ?>"><span class="glyphicon glyphicon-info-sign"></span><?php echo __('homePageMessages.us') ?></a></li>
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
                        <li><?php $__currentLoopData = config('app.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('lang.switch', $lang)); ?>"><img src='<?php echo e(asset('/icons/'.$lang.'.png')); ?>' alt="<?php echo e($language); ?>"> <?php echo e($language); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                    </ul>
                </li>
                <?php if(auth()->guest()): ?>
                <li><a title="<?php echo __('userHelp.login')?>" href='<?php echo e(route('login')); ?>'><?php echo __('auth.login')?></a></li>
                <li><a title="<?php echo __('userHelp.register')?>" href='<?php echo e(route('register')); ?>'><?php echo __('auth.register')?></a></li>
                <?php endif; ?>

                <?php if(auth()->check()): ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="/../public/pictures/avatar_placeholder.png" height="25px"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo e(url('/lisa')); ?>"><?php echo __('userHelp.addAd')?></a>
                            <a href="<?php echo e(url('/profile/'.auth()->user()->kasutajanimi)); ?>"><?php echo __('userHelp.profile')?></a>
                            <a href="#"><?php echo __('userHelp.settings')?></a>
                            <a href="<?php echo e(route('logout')); ?>"><?php echo __('userHelp.logout')?></a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>


<br><br><br><br>





<div class="tekst">

    <h1>Lost & Found Foundation <br>
        <?php echo __('homePageMessages.slogan')?></h1>

        <?php if(auth()->check()): ?>
            <div class="title m-b-md">
                <h3>Welcome, <?php echo auth()->user()->kasutajanimi ?></h3>
            </div>
        <?php endif; ?>
        </div>

<br><br><br><br>
<footer class="row">
    <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</footer>
</body>
</html>