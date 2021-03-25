<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			@yield ('page-title')
		</title>

		<link rel="shortcut icon" href="{{ URL::asset('image/favicon.ico') }}" >
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/style.css') }}">

		@stack ('specific-style')

	</head>

	<body>
		@include ('partials.flash')

		@include ('layouts.header')

		@yield ('content')

		<footer id="footer" class="midnight-blue">
	     	@include ('layouts.footer')
		</footer>

		<script src="{{ URL::asset('bootstrap/js/jquery.js') }}"></script>
		<script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>

		@stack ('scripts')
	</body>
</html>
