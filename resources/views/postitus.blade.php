<!DOCTYPE html>
<html lang="en">
<head>

  <title>Lost &amp; Found Foundation</title>
  <meta charset="utf-8">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/../public/css/postitus.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>
</head>
<body>
<div class="w3-container" style="margin-top: 50px">
    <div class="col-sm-7">
        <div class="container">
            <div class="row">
                <button class="button button-primary" type="button"><a href={{url('/')}}><?php echo __('homePageMessages.home')?></a></button>
                <button class="button button-neutral" type="button"><a href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a></button>
                <button class="button button-neutral"><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></button>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="span6">
            <form id="custom-search-form" class="form-search form-horizontal pull-right">
                <div class="input-append span12">
                    <input type="text" class="search-query" placeholder="Search">
                    <button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="btn-group">
            <button class="btn btn-primary" type="button">Vali keel</button> <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
                <li>@foreach (config('app.locales') as $lang => $language)
                        <a href="{{ route('lang.switch', $lang) }}"><img src={{asset('/icons/'.$lang.'.png')}}> {{$language}}</a>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-9 col-md-offset-1">
      <div class="col-sm-10">
        <ul class="nav nav-pills">
          <li class="active">
            <a href="#">Uuemad</a>
          </li>
          <li>
            <a href="#">Esiletoodud</a>
          </li>
          <li>
            <a href="#">Viimati leitud</a>
          </li>
        </ul>
          <?php foreach ($postitusi as $postitusi) {?>
        <p>Andmebaasis on <?php echo $postitusi->arv  ?> postitust</p><?php } ?>
          <?php
          foreach ($postitus as $postitus) {?>
        <div class="col-md-12 col-lg-12 container">
            <div class="row">
              <h2><?php echo $postitus->pealkiri ?></h2>
              <h5><span class="glyphicon glyphicon-time"></span><?php echo "Kasutaja: "; echo $postitus->kasutaja; echo ", " ; echo $postitus->date; echo ", "; echo $postitus->email ?></h5>
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
    <div class="col-sm-2 sidenav">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#">Logimine</a>
        </li>
        <li>
          <a href="#">Registreerimine</a>
        </li>
      </ul>
      <hr>
      <div class="col">
        <form>
          <div class="form-group">
            <label for="email">E-mail aadress:</label> <input class="form-control" id="email" type="email">
          </div>
          <div class="form-group">
            <label for="pwd">Parool:</label> <input class="form-control" id="pwd" type="password">
          </div>
          <div class="checkbox">
            <label><input type="checkbox">Jäta mind meelde</label>
          </div><button class="btn btn-default" type="submit">Sisene</button>
        </form>
        <hr>
        <p>Sisene Gmaili või Facebooki kaudu</p><input class="btn btn-lg btn-facebook btn-block" type="submit" value="Facebook"> <input class="btn btn-lg btn-gmail btn-block" type="submit" value="Gmail">
      </div>
    </div>
  </div>
</div>
</body>
</html>

