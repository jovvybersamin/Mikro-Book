<article class="comments__comment media status-media">
    <div class="pull-left">
        @include('layouts.partials.avatar',['user' => $comment->owner , 'class' => 'status-media-object'])
    </div>

    <div class="media-body">
        <h4 class="media-heading">{{ $comment->owner->username }}</h4>
        <p>{{ $comment->presents()->timeSinceCommented() }}</p>
        {{ $comment->body }}
    </div>

</article>