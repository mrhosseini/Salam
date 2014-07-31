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
	<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"> FIXME-->
	{{ HTML::style('css/bootstrap.min.css'); }}
	{{ HTML::style('css/bootstrap-theme.min.css'); }}
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
				<div id="msgDiv" class="row alert alert-warning" style="margin-left: 0; margin-right: 0; display: none;">
					<ul id="msg"></ul>
				</div>
				<div class="row text-center" style="padding-bottom: 10px;"><h2>{{ trans('messages.login_title'); }}</h2></div>
				<form id="loginForm" class="form-horizontal well" method="post" action="./login" >
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
						<input type="hidden" name="_token" id="_token" value="{{  csrf_token(); }}"/>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- 	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script> FIXME-->
	<!-- Latest compiled and minified JavaScript -->
<!-- 	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> FIXME -->
	{{ HTML::script('js/jquery.js'); }}
	{{ HTML::script('js/bootstrap.min.js'); }}
	
	<script>
		$(document).ready(function(){
			// Attach a submit handler to the form
			$( "#loginForm" ).submit(function( event ) {
				// Stop form from submitting normally
				event.preventDefault();
				// Get some values from elements on the page:
				url = $( this ).attr( "action" );
				// Send the data using post
				var posting = $.post( url, $( this ).serialize());
				// Put the results in a div
				posting.done(function(data) {
					if (data.status == 0){
						$( "#msg" ).html(data.msg);
						$( "#msgDiv" ).show('zoom');
					}
					else{
						$(document).attr('location', './');
					}
				});
			});
		});
	</script>

</body>
</html>