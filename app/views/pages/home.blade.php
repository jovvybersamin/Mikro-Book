@extends('layouts.default')


@section('content')

	<div class="jumbotron">
		<div class="container">
			<h1>Welcome to Larabook!</h1>
			<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>

        @if (! $currentUser)
            <p>
                {{ link_to_route('register_path','Sign Up',null,['class'=>'btn btn-lg btn-primary']) }}
            </p>
        @endif

		</div>
	</div>

@stop