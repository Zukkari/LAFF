@foreach($postitus as $post)
    <div class="col-md-12 col-lg-12 container">
        <div class="row">
            <h2><?php echo $post->pealkiri ?></h2>
            @if(auth()->check())
                @if(auth()->user()->kasutajanimi == $post->kasutaja)
                    <a href="#" class="edit">Edit</a> |
                    <a href="{{ route('ad.delete', ['ad_id' => $post->id]) }}">Delete</a>
                @endif
            @endif
            <div>
                <script type="text/javascript">
                    $(document).ready(getRating({{$post->id}}));
                    window.setTimeout(initButtons, 2000);
                </script>
                <label id={{$post->id}}>0</label>
                @if (auth()->check())
                <button id="<?php echo $post->id ?>" class="upvoteBtn" onClick="upvote(<?php echo $post->id ?>)">Upvote</button>
                <button id="<?php echo $post->id ?>" class="downvoteBtn" onClick="downvote(<?php echo $post->id ?>)">Downvote</button>
                @endif
            </div>
            <h5><span class="glyphicon glyphicon-time"></span><?php echo __('adPageMessages.user'); echo $post->kasutaja; echo ", " ; echo $post->date; echo ", "; echo $post->email?></h5>
            <h5><span class="label label-danger"><?php echo $post->peatag ?></span> <span class="label label-primary">kaotatud</span></h5><br>
            <div>
                <img class="kuulutusePilt" src="<?php echo $post->pildilink ?>" alt="image">
                <p class="kirjeldus"><?php echo $post->kirjeldus ?></p>
            </div>
        </div>
        <hr>
        <br><br>
    </div>
@endforeach