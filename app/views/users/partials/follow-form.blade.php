
@if($user->isFollowedBy($currentUser))

    {{ Form::open(['route' => ['follow_path',$user->id],'method' => 'delete']) }}
        {{ Form::hidden('userIdToUnfollow',$user->id,['id' => $user->id]) }}
        <button type="submit" class="btn btn-danger">
            Unfollow
        </button>
    {{ Form::close() }}

@else

    {{ Form::open(['route' => 'follows_path','method' => 'post']) }}
        {{ Form::hidden('userIdToFollow',$user->id,['id' => $user->id]) }}
        {{ Form::submit('Follow',['class' => 'btn btn-primary']) }}
    {{ Form::close() }}

@endif
