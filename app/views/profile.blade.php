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
{{{ $profile->firstname }}} {{{ $profile->lastname }}}
@stop

@section('body')
@include('header', array('profile' => Auth::user()->profile))
	<div class="container">
		<div class="row info-row" >
			<div class="col-md-3 col-sm-4 col-xs-6">
				<a href="" class="thumbnail">
					<img src="{{ URL::to(Constants::$profile_pics_path.$profile->img) }}" alt="{{{ $profile->firstname }}} {{{ $profile->lastname }}}">
				</a>
			</div>
			@if (Auth::user()->id == $user->id)
				<div><button id="btnEdit" class="btn btn-info">{{ trans('messages.edit') }}</button></div>
			@endif
		</div>
		<div class="row info-row">
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.firstname') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info">{{{ $profile->firstname }}}</p>
						<input class="user-info-input form-control input-lg" type="text" value="{{{ $profile->firstname }}}">
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.lastname') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info">{{{ $profile->lastname }}}</p>
						<input class="user-info-input form-control input-lg" type="text" value="{{{ $profile->lastname }}}">
					</div>
				</div>
			</div>
		</div>
		<div class="row info-row">
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.email2') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info">{{{ $user->email }}}</p>
						<input class="user-info-input form-control input-lg" type="text" value="{{{ $user->email }}}">
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.username') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info"></p>
						<input class="user-info-input form-control input-lg" type="text" value="">
					</div>
				</div>
			</div>
		</div>
		<div class="row info-row">
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.phone') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info">{{{ $profile->phone }}}</p>
						<input class="user-info-input form-control input-lg" type="text" value="{{{ $profile->phone }}}">
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.degree') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info">{{{ $profile->degree }}}</p>
						<input class="user-info-input form-control input-lg" type="text" value="{{{ $profile->degree }}}">
					</div>
				</div>
			</div>
		</div>
		<div class="row info-row">
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.university') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info">{{{ $profile->university }}}</p>
						<input class="user-info-input form-control input-lg" type="text" value="{{{ $profile->university }}}">
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.field_study') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info">{{{ $profile->field }}}</p>
						<input class="user-info-input form-control input-lg" type="text" value="{{{ $profile->field }}}">
					</div>
				</div>
			</div>
		</div>
		<div class="row info-row">
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.live_in') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info">{{{ $profile->live_in }}}</p>
						<input class="user-info-input form-control input-lg" type="text" value="{{{ $profile->live_in }}}">
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.job') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info">{{{ $profile->job }}}</p>
						<input class="user-info-input form-control input-lg" type="text" value="{{{ $profile->job }}}">
					</div>
				</div>
			</div>
		</div>
		<div class="row info-row">
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.workplace') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12"><input class="user-info" type="text" value="{{ $profile->workplace }}"></div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.married') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12"><input class="user-info" type="text" value=""></div>
				</div>
			</div>
		</div>
		<div class="row info-row">
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label">{{ trans('messages.description') }}</label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info" >
							{{{ $profile->description }}}
						</p>
						<textarea class="user-info-input form-control input-lg" row="5">
							{{{ $profile->description }}}
						</textarea>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="row">
					<div class="col-xs-12"><lable class="control-label"></label></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<p class="user-info"></p>
						<input class="user-info" type="text" value="">
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.container -->
@stop

@section('scripts')
	<script>
		$(document).ready(function(){
			$( "#btnEdit" ).click(function(){
				$(".user-info").hide();
				$(".user-info-input").show();
			});
		});
	</script>
@stop
