<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/

?>
@extends('layouts/base')

@section('body')
	<div class="container">
		<div class="row"></div>
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
						<div class="col-md-8"><input class="form-control" type="text" name="email" id="email" placeholder="{{ trans('messages.email'); }}" style="direction: ltr" /></div>
					</div>			
					<div class="row form-group">
						<label class="col-md-4 control-label" for="password">{{ trans('messages.password'); }}:</label>
						<div class="col-md-8"><input class="form-control" type="password" name="password" id="password" placeholder="{{ trans('messages.password'); }}" style="direction: ltr" /></div>
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
@stop

@section('scripts')
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
@stop
