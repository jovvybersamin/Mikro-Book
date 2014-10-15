@extends('layouts.default')


@section('content')

    <div class="row">
        <div class="col-md-3">
            <h1>{{ $user->username }}</h1>

            @include('users.partials.follow-form')

        </div>

        <div class="col-md-6">

            @if($user->is($currentUser))
                @include('statuses.partials.publish-status-form')
            @endif

            @if($user->statuses->count())
                @each('statuses.single',$user->statuses,'status')
            @else
                <p>This users hasn't posted any status.</p>
            @endif

        </div>

    </div>

@stop