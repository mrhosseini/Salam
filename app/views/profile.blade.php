<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/
?>
@extends('layouts.base')

@section('header_scripts')
{{ HTML::style('css/profile.css'); }}
@stop

@section('title')
{{ trans('messages.salam') }}
|
{{{ $user->firstname }}} {{{ $user->lastname }}}
@stop

@section('body')
@include('header', array('user' => Auth::user()))
	<div class="container">
		<div class="row">
			<br><br>
		</div>
		<div class="row info-row pcontent">
			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="row">
					<a href="" class="thumbnail" style="max-width: 200px;">
						<img src="{{ URL::to(Constants::$profile_pics_path . $user->img) }}" 
							alt="{{{ $user->firstname }}} {{{ $user->lastname }}}"
						>
					</a>
				</div>
				<div class="row">
					@if (Auth::user()->id == $user->id)
						<div class="col-md-7 col-sm-7 col-xs-7"><button id="btnEdit" class="btn btn-info btn-block">{{ trans('messages.edit') }}</button></div>
						<div class="col-md-7 col-sm-7 col-xs-7"><button id="btnPwd" class="btn btn-primary btn-block">{{ trans('messages.change_password') }}</button></div>
						<div class="col-md-7 col-sm-7 col-xs-7"><button id="btnCancel" class="btn btn-warning btn-block" style="display: none;">{{ trans('messages.cancel') }}</button></div>
						<div class="col-md-7 col-sm-7 col-xs-7"><button id="btnSave" class="btn btn-success btn-block" style="display: none;">{{ trans('messages.save') }}</button></div>
					@endif
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<strong>{{ trans('messages.user_info') }}</strong>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-6"><lable class="control-label">{{ trans('messages.firstname') }}:</label></div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p class="user-info">{{{ $user->firstname }}}</p>
						<input class="user-info-input form-control" type="text" value="{{{ $user->firstname }}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-6"><lable class="control-label">{{ trans('messages.lastname') }}:</label></div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p class="user-info">{{{ $user->lastname }}}</p>
						<input class="user-info-input form-control" type="text" value="{{{ $user->lastname }}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-6"><lable class="control-label">{{ trans('messages.email2') }}:</label></div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p class="user-info"><a href="mailto:{{{ $user->email }}}">{{{ $user->email }}}</a></p>
						<input class="user-info-input form-control" type="text" value="{{{ $user->email }}}">
					</div>
				</div>
				<div class="row">
					<br>
				</div>
				<div class="row">
					<strong>{{ trans('messages.other_info') }}</strong>
				</div>
				@foreach ($profile_fields as $pf)
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-6"><lable class="control-label">{{{ $pf['display_name'] }}}:</label></div>
						<div class="col-md-6 col-sm-6 col-xs-6">
						@if ($pf['type'] == 'boolean')
							@if ($pf['pivot']['value'] == true)
								<span class="glyphicon glyphicon-ok user-info"></span>
								<input class="user-info-input form-control" type="checkbox" checked="checked">
							@else
								<span class="glyphicon glyphicon-remove user-info"></span>
								<input class="user-info-input form-control" type="checkbox">
							@endif
						@elseif ($pf['type'] == 'string')
							<p class="user-info">{{{ $pf['pivot']['value'] }}}</p>
							<input class="user-info-input form-control" type="text" value="{{{ $pf['pivot']['value'] }}}">
						@elseif ($pf['type'] == 'text')
							<p class="user-info">{{{ $pf['pivot']['value'] }}}</p>
							<textarea class="user-info-input form-control">{{{ $pf['pivot']['value'] }}}</textarea>
						@endif						
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div><!-- /.container -->
@stop

@section('scripts')
	<script>
		$(document).ready(function(){
			$( "#btnEdit" ).click(function() {
				$(".user-info").hide();
				$("#btnEdit").hide();
				$("#btnPwd").hide();
				$(".user-info-input").show();
				$("#btnCancel").show();
				$("#btnSave").show();
			});
			
			$( "#btnCancel" ).click(function() {
				location.reload();
			}); 
		});
	</script>
	<script>
		$(document).ready(function(){
			// Attach a click handler to the button
			$( "#btnPwd" ).click(function() {
				alert('salam');
				return false;
			});
		});
	</script>
@stop
