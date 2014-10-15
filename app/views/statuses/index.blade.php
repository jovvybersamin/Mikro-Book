@extends('layouts.default')


@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">

        @include('statuses.partials.publish-status-form')

             <h2>Statuses.</h2>

        @each('statuses.single',$statuses,'status')

    </div>
</div>


@stop