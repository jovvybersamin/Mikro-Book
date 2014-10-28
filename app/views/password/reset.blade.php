@extends('layouts.default')



@section('content')

    <div class="row">
        <div class="col-md-6">

            <h2>Reset your password.</h2>

            {{ Form::open() }}

                {{ Form::hidden('token',$token) }}

                <div class="form-group">
                    {{ Form::label('email','Email:',['class' => 'form-label']) }}
                    {{ Form::email('email',null,['class' => 'form-control','required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password','Password:',['class' => 'form-label']) }}
                    {{ Form::password('password',['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password_confirmation','Password Confrmation:',['class' => 'form-label']) }}
                    {{ Form::password('password_confirmation',['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Reset',['class' => 'btn btn-primary']) }}
                </div>

            {{ Form::close() }}
        </div>
    </div>


@stop