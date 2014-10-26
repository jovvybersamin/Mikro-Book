@extends('layouts.default')


@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                   @include('layouts.partials.avatar',['size' => 50])
                </div>
            </div>

            <div class="media-body">
                <h1 class="media-heading">
                   {{ $user->username }}
                </h1>

                <ul class="list-inline text-muted">
                    <li>{{ $user->presents()->followerCount() }}</li>
                    <li>{{ $user->presents()->statusCount() }}</li>
                </ul>

                @foreach($user->followers as $follower)
                    @include('layouts.partials.avatar',['size' => 30,'user' => $follower])
                @endforeach
            </div>

        </div>

        <div class="col-md-6">
            @unless($user->is($currentUser))
                @include('users.partials.follow-form')
            @endunless

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