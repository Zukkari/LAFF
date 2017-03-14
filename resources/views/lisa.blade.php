<!DOCTYPE html PUBLIC>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/../public/css/app.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <title><?php echo __('addAdmessages.pageTitle')?></title>
</head>
<body>
    <div class="col-sm-7">
        <div class="container">
            <div class="row">
                <button class="button button-primary" type="button"><a href={{url('/')}}><?php echo __('homePageMessages.home')?></a></button>
                <button class="button button-neutral" type="button"><a href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a></button>
                <button class="button button-neutral"><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></button>
            </div>
        </div>
    </div>
    
    <div class="flex-center position-ref full-height">

        <div class="content">

            <div class="title m-b-md">
                <h1><?php echo __('addAdmessages.addAd')?></h1>
            </div>

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

