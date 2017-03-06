<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/../LAFF/public/css/app.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <title>Lisa kuulutus - lostaf.cs.ut.ee</title>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <a href={{url('/')}}>Home</a>
        </div>

        <div class="content">

            <div class="title m-b-md">
                <h1>Lisa oma kuulutus</h1>
            </div>

            {!! Form::open(array('route' => '/lisa', 'class' => 'form', 'files' => 'true')) !!}

                <div class="form-group">
                    {!! Form::label('teema', 'Kuulutuse teema') !!}
                    {!! Form::text('teema', null, array('required', 'class' => 'form-control', 'placeholder' => 'Sistesta oma kuulutse teema..')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('tekst' , 'Kuulutuse tekst') !!}
                    {!! Form::textarea('tekst', null, array('required', 'class' => 'form-control', 'placeholder' => 'Sisesta siia oma kuulutuse tekst...')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('pilt', 'Lisa oma kuulutusele pilt') !!}
                    {!! Form::file('kuulutusePilt', array('required', 'placeholder' => 'Vali oma kuulutuse jaoks pilt')) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Lisa oma kuulutus!') !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</body>
</html>

