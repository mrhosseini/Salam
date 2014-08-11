<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/

?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"> FIXME-->
	{{ HTML::style('css/bootstrap.min.css'); }}
	{{ HTML::style('css/bootstrap-theme.min.css'); }}
<!-- 	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cerulean/bootstrap.min.css" rel="stylesheet"> -->
	{{ HTML::style('css/bootstrap-rtl.min.css'); }}
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	@section('style')
		{{ HTML::style('css/home.css'); }}
	@show
	
	@yield('header_scripts')
	
	<title>@yield('title')</title>

</head>
<body>
	@yield('body')
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- 	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script> FIXME-->
	<!-- Latest compiled and minified JavaScript -->
<!-- 	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> FIXME -->
	{{ HTML::script('js/jquery.js'); }}
	{{ HTML::script('js/bootstrap.min.js'); }}
	@yield('scripts')
</body>
</html>
