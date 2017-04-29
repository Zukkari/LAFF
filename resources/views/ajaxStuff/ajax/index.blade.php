@foreach($postitus as $post)
    <div class="col-md-12 col-lg-12 container">
        <div class="row">
            <a href={{'postitus/'.$post->id}}><h2><?php echo $post->pealkiri ?> </h2></a>
            @if(auth()->check())
                @if(auth()->user()->kasutajanimi == $post->kasutaja)
                    <a href="#" class="edit">Edit</a> |
                    <a href="{{ route('ad.delete', ['ad_id' => $post->id]) }}">Delete</a>
                @endif
            @endif
            <div>
                <script type="text/javascript">
                    $(document).ready(getRating({{$post->id}}));
                    window.setTimeout(initButtons, 750);
                </script>
                <?php echo __('adPageMessages.rating')?><label id={{$post->id}}>0</label>
                @if (auth()->check())
                    <button id="<?php echo $post->id ?>" class="upvoteBtn glyphicon glyphicon-menu-up" onClick="upvote(<?php echo $post->id ?>)">Upvote</button>
                    <button id="<?php echo $post->id ?>" class="downvoteBtn glyphicon glyphicon-menu-down" onClick="downvote(<?php echo $post->id ?>)">Downvote</button>
                @endif
            </div>
            <h5><span class="glyphicon glyphicon-time"></span><?php echo __('adPageMessages.user');?> {{$post->kasutaja}}<?php echo ", " ?>; {{$post->date }} <?php echo ", "?> {{$post->email}}</h5>
            <h5><span class="label label-danger">{{$post->peatag}}</span> <span class="label label-primary">kaotatud</span></h5><br>
            <div>
                <img class="kuulutusePilt" src="{{$post->pildilink}}" alt="image">
                <p class="kirjeldus">{{$post->kirjeldus}}</p>
            </div>
        </div>
        <hr>
        <br><br>
    </div>
@endforeach