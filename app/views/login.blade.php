<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/

?>
<!doctype html>
<html>
<head>
	<title>{{ trans('messages.login_title'); }}</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	{{ HTML::style('css/bootstrap-rtl.min.css'); }}
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container">
		<div class="row" style="height: 100px;"></div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4" style="border: 2px dashed; padding: 15px; border-radius: 5px; border-color: #5af; ">
			<div class="row text-center" style="padding-bottom: 10px;"><h2>{{ trans('messages.login_title'); }}</h2></div>
			<form class="form-horizontal well" method="post" action:"./login">
					<div class="row form-group">
						<label class="col-md-4 control-label" for="email">{{ trans('messages.email'); }}:</label>
						<div class="col-md-8"><input class="form-control" type="text" name="email" id="email" placeholder="{{ trans('messages.email'); }}" /></div>
					</div>			
					<div class="row form-group">
						<label class="col-md-4 control-label" for="password">{{ trans('messages.password'); }}:</label>
						<div class="col-md-8"><input class="form-control" type="password" name="password" id="password" placeholder="{{ trans('messages.password'); }}" /></div>
					</div>
					<div class="row form-group">
						<div class="col-md-8"></div>
						<div class="col-md-4"><input type="submit" class="btn btn-primary btn-block" name="submit" value="{{ trans('messages.login'); }}" /></div>
					</div>
			</form>
			</div>
			<div class="col-sm-4"></div>
		<div>
		<div class="row"></div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	

</body>
</html>