<!DOCTYPE html>


<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lost & Found Foundation</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/../LAFF/public/css/default.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    <a href=<?php echo e(url('/')); ?>><?php echo __('homePageMessages.home')?></a>
                    <a href="<?php echo e(url('/lisa')); ?>"><?php echo __('homePageMessages.addAd')?></a>

                    <div class="position-ref right">
                        <?php $__currentLoopData = config('app.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="links"><a href="<?php echo e(route('lang.switch', $lang)); ?>"><img src=<?php echo e(asset('/icons/'.$lang.'.png')); ?>> <?php echo e($language); ?></a></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
