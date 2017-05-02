<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>

    <title><?php echo __('titles.titleAds')?></title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/../public/css/postitus.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/../public/js/commentsEditor.js"></script>
    <script type="text/javascript" src="/../public/js/voting.js"></script>




    <!-- Head icon -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/2000px-Magnifying_glass_icon.svg.png">


</head>
<body class="body-bottom">
@if (auth()->check())
    <script type="text/javascript">
        var upvoted = [];
        var downvoted = [];
        getUpvoted({{auth()->user()->id}});
        getDownvoted({{auth()->user()->id}});

        window.setTimeout(initButtons, 750);
    </script>
@else
    <script type="text/javascript">
        var upvoted = [];
        var downvoted = [];
    </script>
@endif
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
                <li title="<?php echo __('userHelp.home')?>" ><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span><?php echo __('homePageMessages.home')?></a></li>
                <li title="<?php echo __('userHelp.seeAds')?>" class="active"><a href="{{url('/postitus')}}"><?php echo __('homePageMessages.ads')?></a></li>
                @if(auth()->check())
                    <li><a title="<?php echo __('userHelp.addAd')?>" href="{{url('/lisa')}}"><?php echo __('homePageMessages.addAd')?></a></li>
                @endif
                <li title="<?php echo __('userHelp.aboutUs')?>"><a href="{{url('/meist')}}"><span class="glyphicon glyphicon-info-sign"></span><?php echo __('homePageMessages.us') ?></a></li>
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
<br>
<div class="container">
    <div class="jumbotron">
        <div class="container-fluid">
            <div class="row content">


                <div class="col-sm col-md-offset-2">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                        <div class="posts endless-pagination">
                            @foreach($postitus as $post)
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    getRating({{$post->id}});
                                });
                            </script>
                            <div class="col-md-12 col-lg-12 container">
                                <div class="row">
                                    <h2>{{$post->pealkiri}}</h2>
                                    <?php echo __('adPageMessages.rating')?><label id={{$post->id}}>0</label>
                                    @if(auth()->check())
                                        @if(auth()->user()->kasutajanimi == $post->kasutaja)
                                            <a href="#" class="edit"><?php echo __('profile.edit')?></a> |
                                            <a href="{{ route('ad.delete', ['ad_id' => $post->id]) }}"><?php echo __('profile.delete')?></a>
                                        @endif
                                            <span id="{{$post->id}}" class="upvoteBtn glyphicon glyphicon-menu-up" onClick="upvote({{$post->id}})"></span>
                                            <span id="{{$post->id}}" class="downvoteBtn glyphicon glyphicon-menu-down" onClick="downvote({{$post->id}})"></span>
                                    @endif


                                    <a href="{{url('/profile/'.$post->kasutaja)}}"><h5><span class="glyphicon glyphicon-time"></span><?php echo __('adPageMessages.user')?> {{$post->kasutaja}} <?php echo ", " ?> {{$post->date}} <?php echo ", "?> {{$post->email}}</h5></a>
                                    <h5><i class="glyphicon glyphicon-envelope"></i><a href="mailto:{{$post->email}}" target="_top"><?php echo __('adPageMessages.mailto')?></a></h5>
                                    <h5><?php echo __('adPageMessages.tags')?><span class="label label-danger">{{$post->peatag}}</span></h5><br>
                                    <div>
                                        <img class="kuulutusePilt" src="<?php echo $post->pildilink ?>" alt="image">
                                        <p class="kirjeldus">{{$post->kirjeldus}}</p>
                                    </div>
                                </div>
                                <br><br>
                                <hr>
                            </div>


                            @endforeach
                                <hr>
                        </div>

                        <div class="kommentaarsisend">
                                @if(auth()->check())
                                        <header><h3><?php echo __('adPageMessages.urcomments')?></h3></header>
                                        {!! Form::open(array('url'=>'/createpost/'.$postitus->first()->id ,'class' => 'form', 'files' => 'true')) !!}
                                        <div class="form-group">
                                            {!! Form::textarea('body', null, array('required','maxlength=100', 'rows=5', 'class' => 'form-control', 'placeholder' => __('adPageMessages.topic'))) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit(__('adPageMessages.submit' ,['onClick'=>'getMessage()'])) !!}
                                        </div>


                                        {!! Form::close() !!}

                                @endif
                        </div>

                                <script>
                                    var editing = [];
                                </script>
                                <div class="kommentaarid">
                                    <h2><?php echo __('adPageMessages.comments')?></h2>
                                    @if (count($kommentaarid)<1)
                                        <h4><?php echo __('adPageMessages.nocomments')?></h4>
                                    @endif
                                    @foreach($kommentaarid as $kommentaar)
                                        <div class="post" data-postid="{{ $kommentaar->id }}" id="{{$kommentaar->id}}">
                                            <p class="commentText" id="{{$kommentaar->id}}">{{ $kommentaar->body }}</p>
                                            <div class="info">
                                                <?php echo __('adPageMessages.posted')?><a href="{{url('/profile/'.$kommentaar->kasutaja_nimi)}}">{{ $kommentaar->kasutaja_nimi }}</a> {{ $kommentaar->date }}
                                            </div>
                                            <div class="interaction">
                                            @if(auth()->check())
                                                @if(auth()->user()->kasutajanimi == $kommentaar->kasutaja_nimi)
                                                        <a onclick="editComment({{$kommentaar->id}})" class="edit"><?php echo __('profile.edit')?></a> |
                                                        <a href="{{ route('post.delete', ['post_id' => $kommentaar->id]) }}"><?php echo __('profile.delete')?></a>
                                                @endif
                                            @endif
                                            </div>

                                        </div>
                                        @endforeach
                                </div>
                    </div>
                <script>

                </script>
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

