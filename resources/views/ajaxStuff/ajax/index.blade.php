@foreach($postitus as $post)
    <div class="col-md-12 col-lg-12 container">
        <div class="row">
            <h2><?php echo $post->pealkiri ?></h2> <span class="vote"></span>
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