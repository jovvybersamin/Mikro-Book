@extends('layouts.default')

@section('content')

@include('layouts.partials.errors')

<div class="col-md-6">
    <div class="row">
        <h1>Sign In!</h1>



        {{ Form::open(['route' => 'login_path']) }}
            <div class="form-group">
               {{ Form::label('email','Email:') }}
               {{ Form::email('email',null,['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('password','Password:') }}
                {{ Form::password('password',['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Sign In',['class' => 'btn btn-primary']) }}
                {{ link_to('/password/remind','Reset your password?') }}
            </div>
        {{ Form::close() }}

    </div>
</div>




@stop