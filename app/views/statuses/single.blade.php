    <article class="media status-media">
        <div class="pull-left">
            @include('layouts.partials.avatar',['user' => $status->user])
        </div>

        <div class="media-body">
            <h4 class="media-heading">
                {{ link_to_route('profile_path',$status->user->username) }}
            </h4>
            <p>{{ $status->presents()->timeSincePublished() }}</p>

            {{ $status->body }}

        </div>

    </article>

