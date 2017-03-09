<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/../LAFF/public/css/app.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <title><?php echo __('addAdmessages.pageTitle')?></title>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <a href={{url('/')}}><?php echo __('addAdmessages.home')?></a>
        </div>

        <div class="content">

            <div class="title m-b-md">
                <h1><?php echo __('addAdmessages.addAd')?></h1>
            </div>

            {!! Form::open(array('route' => '/lisatud', 'class' => 'form', 'files' => 'true')) !!}

                <div class="form-group">
                    {!! Form::label('teema', __('addAdmessages.adTopic')) !!}
                    {!! Form::text('teema', null, array('required', 'class' => 'form-control', 'placeholder' => __('addAdmessages.adTopicPH'))) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('tekst' , __('addAdmessages.adText')) !!}
                    {!! Form::textarea('tekst', null, array('required', 'class' => 'form-control', 'placeholder' =>  __('addAdmessages.adTextPH'))) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('pilt', __('addAdmessages.adPic')) !!}
                    {!! Form::file('kuulutusePilt', array('required', 'placeholder' => __('addAdmessages.adPicPH'))) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit(__('addAdmessages.adSubmit')) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</body>
</html>

