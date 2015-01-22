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
			<div class="col-md-3 col-sm-4 col-xs-12">
			</div>
			<div class="col-md-6 col-sm-6">
				<div id="msgDiv" class="row text-center" style="padding:10px; display: none;">
						<div class="alert alert-warning" id="msg"></div>
				</div>
			</div>
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
						<input id="txtFirstname" class="user-info-input form-control" type="text" value="{{{ $user->firstname }}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-6"><lable class="control-label">{{ trans('messages.lastname') }}:</label></div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p class="user-info">{{{ $user->lastname }}}</p>
						<input id="txtLastname" class="user-info-input form-control" type="text" value="{{{ $user->lastname }}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-6"><lable class="control-label">{{ trans('messages.email2') }}:</label></div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p class="user-info"><a href="mailto:{{{ $user->email }}}">{{{ $user->email }}}</a></p>
						<input id="txtEmail" class="user-info-input form-control" type="text" value="{{{ $user->email }}}">
					</div>
				</div>
				<div class="row">
					<br>
				</div>
				<div class="row">
					<strong>{{ trans('messages.other_info') }}</strong>
				</div>
				<div id="otherInfo">
				@foreach ($profile_fields as $pf)
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-6"><lable class="control-label">{{{ $pf['display_name'] }}}:</label></div>
						<div class="col-md-6 col-sm-6 col-xs-6">
						@if ($pf['type'] == 'boolean')
							@if ($pf['pivot']['value'] == true)
								<span class="glyphicon glyphicon-ok user-info"></span>
								<input data-id="{{ $pf['id'] }}" data-type="{{ $pf['type'] }}" class="user-info-input form-control" type="checkbox" checked="checked">
							@else
								<span class="glyphicon glyphicon-remove user-info"></span>
								<input data-id="{{ $pf['id'] }}" data-type="{{ $pf['type'] }}" class="user-info-input form-control" type="checkbox">
							@endif
						@elseif ($pf['type'] == 'string')
							<p class="user-info">{{{ $pf['pivot']['value'] }}}</p>
							<input data-id="{{ $pf['id'] }}" data-type="{{ $pf['type'] }}" class="user-info-input form-control" type="text" value="{{{ $pf['pivot']['value'] }}}">
						@elseif ($pf['type'] == 'text')
							<p class="user-info">{{{ $pf['pivot']['value'] }}}</p>
							<textarea data-id="{{ $pf['id'] }}" data-type="{{ $pf['type'] }}" class="user-info-input form-control">{{{ $pf['pivot']['value'] }}}</textarea>
						@endif						
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</div>
	</div><!-- /.container -->
	
	<div class="modal fade" id="pwdModal" tabindex="-1" role="dialog" aria-labelledby="pwdModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="pwdModalLabel">{{ trans('messages.authentication') }}</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="txtPwdcheck" class="control-label">{{ trans('messages.password') }}</label>
							<input type="password" class="form-control" id="txtPwdcheck" value="" dir="ltr">
							<input type="hidden" name="_token" id="_token" value="{{  csrf_token(); }}"/>
<!-- 							<input type="hidden" name="email" id="pwdEmail" value="{{ Auth::user()->email }}"/>-->
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<div style="display:inline;"><button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('messages.cancel') }}</button></div>
					<div style="display:inline;"><button id="btnPwdModalOk" type="button" class="btn btn-primary">{{ trans('messages.ok') }}</button></div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	@if (Auth::user()->id == $user->id)
	<script>
		$(document).ready(function(){
			/*
			 * btnEdit click
			 */
			$( "#btnEdit" ).click(function() {
				$(".user-info").hide();
				$("#btnEdit").hide();
				$("#btnPwd").hide();
				$(".user-info-input").show();
				$("#btnCancel").show();
				$("#btnSave").show();
			});
			
			/*
			 * btnCancel click
			 */
			$( "#btnCancel" ).click(function() {
				location.reload();
			});
			
			/*
			 * btnSave click
			 */
			$( "#btnSave" ).click(function() {
				/*
				* show the recheck password modal dialog
				*/
				$('#pwdModal').modal('show');
			});
			
			/*
			 * recheck modal ok click
			 * send data using ajax and get the answer
			 */
			$("#btnPwdModalOk").click(function() {
				url = '{{ URL::to("user/$user->id/edit") }}';
				// Send the data using post
				var postData = {};
				postData["firstname"] = $( "#txtFirstname" ).val();
				postData["lastname"] = $( "#txtLastname" ).val();
				postData["email"] = $( "#txtEmail" ).val();
				postData["password"] = $( "#txtPwdcheck" ).val();
				postData["_token"] = $( "#_token" ).val();
				
				$('input', $('#otherInfo')).each(function () {
					if ($(this).data('type') == 'string') {
						postData[$(this).data('id')] = $(this).val();
					} else if ($(this).data('type') == 'boolean') {
						if ($(this).prop('checked')) 
							postData[$(this).data('id')] = '1';
						else	
							postData[$(this).data('id')] = '0';
					}
				});
				
				$('textarea', $('#otherInfo')).each(function () {
					if ($(this).data('type') == 'text') {
						postData[$(this).data('id')] = $(this).val();
					}
				});
				
				/// @todo : password check
// 				var r = checkPassword();
// 				alert(r);
// 				return;
				
				var posting = $.post(url, postData);
				// Put the results in a div;
				posting.done(function(data) {
					if (data.status == 0){
						$( "#msg" ).html(data.msg);
						$( "#msgDiv" ).show('fade');
						$('#pwdModal').modal('hide');
					}
					else{
						location.reload();
					}
				});
			});
			
			/*
			 * btnPwd (change password) click
			 */
			$( "#btnPwd" ).click(function() {
				alert('salam');
				return false;
			});
		});
	</script>
	@endif
@stop
