@extends('layouts.default')


@section('content')

    <h1>All Users</h1>

    <div class="row">
        @foreach($users->chunk(4) as $userSet)
            <div class="row">
                @each('users.single',$userSet,'user')
            </div>
        @endforeach
    </div>

    {{ $users->links() }}
@stop