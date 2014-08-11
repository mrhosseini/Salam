<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/
?>
@extends('layouts.base')

@section('header_scripts')
	{{ HTML::script('js/tinymce/tinymce.min.js'); }}
	<script>
		tinymce.init({
			selector: "textarea",
			plugins: "directionality link emoticons textcolor image",
			toolbar: "undo redo | ltr rtl | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | link image | fontselect fontsizeselect | forecolor backcolor | emoticons",
			menu: false,
			menubar : false,
			statusbar: false,
			resize: false,
			element_format : "html",
			language : 'fa',
			height: 300,
		});

	</script>
@stop

@section('title')
{{ trans('messages.salam') }}
|
{{ $thread->title }}
@stop

@section('body')
@include('header', array('profile' => Auth::user()->profile))
	<div class="container">
		<div class="row" >
			<div class="col-xs-12 col-md-9 col-sm-10">
				<div class="row" style="background-color: #feffff; padding: 10px 10px 10px 10px;">
					<h3 style="padding-bottom: 15px;">{{ $thread->title }}</h3>
					@foreach ($posts as $post)
						<div class="row" style="padding-bottom: 30px; margin-left:0px;">
							<div class="row" style="background-color: #f3f3f3; padding-top: 2px; padding-bottom: 2px; margin-left:0px; margin-right:0px; border-top: 1px solid #ddd;">
								<div class="col-md-1 col-xs-2">
									<a  href="{{ URL::to('/user/'.$post->user_id) }}">
										<img src="{{ URL::to(Constants::$profile_pics_path.$post->user->profile->img) }}" style="width: 45px;" class="img-thumbnail">
									</a>
								</div>
								<div class="col-md-9 col-xs-7" style="padding-top: 10px; font-family: serif; font-weight: bold;">
									{{ $post->user->profile->firstname }}
									{{ $post->user->profile->lastname }}
								</div>
								<div class="col-md-2 col-xs-3" style="text-align: left; padding-top: 10px; color: #333;">
									<span class="glyphicon glyphicon-time"></span>
									{{ Helpers::digits2Persian(jDate::forge($post->created_at)->shortAgo()) }}
								</div>
							</div>
							<div class ="row" style="margin-left:0px;">
								<div class="col-md-1 col-xs-1"></div>
								<div class="col-md-10 col-xs-10" style="padding-top: 15px; line-height: 2em;">{{ $post->body }}</div>
							</div>
						</div>
					@endforeach
				</div>
				<div>
					<textarea>
					</textarea>
				</div>
			</div>
			
		</div>
	</div><!-- /.container -->
@stop

@section('scripts')
@stop
