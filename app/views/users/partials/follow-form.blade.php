{{ Form::open(['route' => 'follows_path']) }}
    {{ Form::hidden('userId',$user->id,['id' => $user->id]) }}
    <button type="submit" class="btn btn-primary">Folllow {{ $user->username }}</button>
{{ Form::close() }}

