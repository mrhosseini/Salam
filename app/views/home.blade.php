<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/

?>
<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"> FIXME-->
	{{ HTML::style('css/bootstrap.min.css'); }}
	{{ HTML::style('css/bootstrap-theme.min.css'); }}
<!-- 	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cerulean/bootstrap.min.css" rel="stylesheet"> -->
	{{ HTML::style('css/bootstrap-rtl.min.css'); }}
	{{ HTML::style('css/home.css'); }}
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body style="padding-top: 70px;">	
<!--	<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container-">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project name</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>-->
	
	<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topnav">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href=".">{{trans('messages.salam')}}</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="topnav">
				<ul class="nav navbar-nav">
					<li class="active"><a href="./">{{trans('messages.home');}}</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="./img/avatar.png" alt="محمد رضا حسینی" class="img-circle" style="width: 18px;">
										محمد رضا حسینی
							<span>&nbsp;</span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu" style="left: 0;">
							<li><a href="./profile">{{trans('messages.profile');}}</a></li>
							<li><a href="./logout">{{trans('messages.logout');}}</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<div class="input-group input-group-sm">
							<input type="text" class="form-control" placeholder="{{trans('messages.search')}}" />
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>
								
							</span>
						</div>
					</div>
				</form>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	
	<div class="container">
		<div class="row" style="padding-bottom: 10px; border-bottom: 2px solid #bdf;">
			<div class="col-md-10 col-sm-10 col-xs-6">
				<!--<div class="btn-group">
						<button type="button" class="btn btn-danger active">{{trans('messages.categories');}}</button>
						<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#" style="background-color: green; color: white; margin: 5px;" >مجمع</a></li>
							<li><a href="#" style="background-color: blue; color: white; margin: 5px;">عمومی</a></li>
							<li><a href="#" style="background-color: navy; color: white; margin: 5px;">سیاسی</a></li>
							<li><a href="#" style="background-color: orange; color: white; margin: 5px;">زنگ تفریح</a></li>
						</ul>
				</div>-->
				<ul class="nav nav-pills">
					<li class="dropdown active">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color:#810074">
							{{trans('messages.categories');}} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#" style="background-color: green; color: white; margin: 5px;" >مجمع</a></li>
							<li><a href="#" style="background-color: blue; color: white; margin: 5px;">عمومی</a></li>
							<li><a href="#" style="background-color: navy; color: white; margin: 5px;">سیاسی</a></li>
							<li><a href="#" style="background-color: orange; color: white; margin: 5px;">زنگ تفریح</a></li>
						</ul>
					</li>
					<li class="divider"></li>
					<li class="active"><a href="#">{{trans('messages.latest');}}</a></li>
					<li><a href="#">{{trans('messages.unread');}}</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-12">
				<!--<button type="button" class="btn btn-success">
					<span class="glyphicon glyphicon-plus"></span>
					{{trans('messages.new_message');}}
				</button>-->
				<a href="./new" role="button" class="btn btn-success">
					<span class="glyphicon glyphicon-plus"></span>
					{{trans('messages.new_message');}}
				</a>
			</div>
		</div>
	</div><!-- /.container -->
	
	<div class="container">
		<div class="row" id="theadListHeader" style="padding-top: 10px;">
				<button class="col-md-6 btn btn-default active" type="button">عنوان
					<span class="caret"></span>
				</button>
				<button class="col-md-1 btn btn-default" type="button">دسته</button>
				<button class="col-md-2 btn btn-default" type="button">افراد</button>
				<button class="col-md-1 btn btn-default" type="button">مطالب</button>
				<button class="col-md-2 btn btn-default" type="button">تاریخ</button>
		</div>
		<div class="row">
			<table class="table table-striped table-hover">
<!--				<thead>
					<tr>
						<th>
							<a href="#" class="btn btn-default btn-block active" role="button">
							عنوان
								<span style="glyphicon glyphicon-chevron-down"></span>
							</a>
						</th>
						<th><a href="#" class="btn btn-default btn-block" role="button">افراد</a></th>
						<th><a href="#" class="btn btn-default btn-block" role="button">مطالب</a></th>
						<th><a href="#" class="btn btn-default btn-block" role="button">تاریخ</a></th>
						
				</thead>-->
				<tbody>
<!-- 					<tr><td>#</td><td>#</td><td>#</td><td>#</td><td>#</td><td>#</td><td>#</td><td>#</td></tr> -->
					<tr>
						<td>
							<div class="col-md-6"><a href="#">کمک برای مراسم محرم</a></div>
							<div class="col-md-1">مجمع</div>
							<div class="col-md-2">2</div>
							<div class="col-md-1">1</div>
							<div class="col-md-2">مرداد ۹۳</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="col-md-6"><a href="#">کمک برای مراسم محرم</a></div>
							<div class="col-md-1">مجمع</div>
							<div class="col-md-2">2</div>
							<div class="col-md-1">1</div>
							<div class="col-md-2">مرداد ۹۳</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="col-md-6"><a href="#">حذف عبارات "آیت الله" و "آیت الله العظمی" از سایت آقای سیستانی</a></div>
							<div class="col-md-1">مجمع</div>
							<div class="col-md-2">2</div>
							<div class="col-md-1">1</div>
							<div class="col-md-2">مرداد ۹۳</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="col-md-6"><a href="#">وظیفه ای به دور از توجیه و تضعیف (نگاهی به مشی سیاسی مرحوم علی صفایی حایری)</a></div>
							<div class="col-md-1">مجمع</div>
							<div class="col-md-2">2</div>
							<div class="col-md-1">1</div>
							<div class="col-md-2">مرداد ۹۳</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="col-md-6"><a href="#">This is just a long top title, a very very very very very very very very very very very very very long title</a></div>
							<div class="col-md-1">مجمع</div>
							<div class="col-md-2">2</div>
							<div class="col-md-1">1</div>
							<div class="col-md-2">مرداد ۹۳</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="col-md-6"><a href="#">کمک برای مراسم محرم</a></div>
							<div class="col-md-1">مجمع</div>
							<div class="col-md-2">2</div>
							<div class="col-md-1">1</div>
							<div class="col-md-2">مرداد ۹۳</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div><!-- /.container -->
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- 	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script> FIXME-->
	<!-- Latest compiled and minified JavaScript -->
<!-- 	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> FIXME -->
	{{ HTML::script('js/jquery.js'); }}
	{{ HTML::script('js/bootstrap.min.js'); }}
</body>
</html>