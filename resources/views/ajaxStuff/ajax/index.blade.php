@foreach($postitus as $post)
    <div class="col-md-12 col-lg-12 container">
        <div class="row">
            <a href={{'postitus/'.$post->id}}><h2 class="postPealkiri" id="{{$post->id}}"><?php echo $post->pealkiri ?> </h2></a>
            @if(auth()->check())
                @if(auth()->user()->kasutajanimi == $post->kasutaja)
                    <a class="edit" id="{{$post->id}}" onclick="editPost('{{$post->id}}', '{{$post->pealkiri}}', '{{$post->kirjeldus}}')"><?php echo __('profile.edit')?></a>
                    <a href="{{ route('ad.delete', ['ad_id' => $post->id]) }}">Delete</a>
                @endif
            @endif
            <div>
                <script type="text/javascript">
                    window.setTimeout(initButtons, 750);
                </script>
                <h3 style="display: inline"><?php echo __('adPageMessages.rating')?><label class="postRating" id={{$post->id}}>{{$post->reiting}}</label>
                    @if (auth()->check())

                        <span id="<?php echo $post->id ?>" class="upvoteBtn glyphicon glyphicon-menu-up" onClick="upvote(<?php echo $post->id ?>)"></span>
                        <span id="<?php echo $post->id ?>" class="downvoteBtn glyphicon glyphicon-menu-down" onClick="downvote(<?php echo $post->id ?>)"></span>
                    @endif
                </h3>
            </div>
            <a href="{{url('/profile/'.$post->kasutaja)}}"><h5><span class="glyphicon glyphicon-time"></span><?php echo __('adPageMessages.user');?> {{$post->kasutaja}}<?php echo ", " ?>; {{$post->date }} <?php echo ", "?> {{$post->email}}</h5></a>
            <h5><i class="glyphicon glyphicon-envelope"></i><a href="mailto:{{$post->email}}" target="_top"><?php echo __('adPageMessages.mailto')?></a></h5>
            <h5><?php echo __('adPageMessages.tags')?><span class="label label-danger">{{$post->peatag}}</span> <span class="label label-primary">kaotatud</span></h5><br>
            <div>
                <img class="kuulutusePilt" src="{{$post->pildilink}}" alt="image">
                <p class="kirjeldus" id="{{$post->id}}">{{$post->kirjeldus}}</p>
            </div>
        </div>
        <hr>
        <br><br>
    </div>
@endforeach