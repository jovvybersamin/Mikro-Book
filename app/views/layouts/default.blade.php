<!DOCTYPE html>
<html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Demo project">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link 
			rel="stylesheet" 
			href="http://blog.app:8000/bower_components/bootstrap/dist/css/bootstrap.min.css"
		/>

		<link 
			rel="stylesheet" 
			href="/css/main.css"
		/>

	</head>
	<body>
		
		@include('layouts.partials.nav')

		<div class="container">

            @include('flash::message')
			@yield('content')

        </div>
	    <script
            type="text/javascript"
            src="//blog.app:8000/bower_components/jquery/jquery.min.js">
	    </script>

		<script 
			type="text/javascript" 
			src="//blog.app:8000/bower_components/bootstrap/dist/js/bootstrap.min.js">
		</script>
	</body>

</html>