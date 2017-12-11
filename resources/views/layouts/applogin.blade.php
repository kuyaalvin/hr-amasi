<!doctype html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/customlogin.css') }}" rel="stylesheet">
		<title>{{config('app.name', 'LSAPP')}}</title>
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
	</head>
	<body>



	@yield('contentlogin')

    <script src="{{ asset('js/app.js') }}"></script>

	</body>
</html>
