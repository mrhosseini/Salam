<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/
?>
@extends('layouts.base')

@section('body')
@include('header', array('profile' => Auth::user()->profile))
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
					<li class="active"><a href="#">{{ trans('messages.latest'); }}</a></li>
					<li><a href="#">{{ trans('messages.unread'); }}</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-12">
				<!--<button type="button" class="btn btn-success">
					<span class="glyphicon glyphicon-plus"></span>
					{{trans('messages.new_message');}}
				</button>-->
				<a href="./new" role="button" class="btn btn-success">
					<span class="glyphicon glyphicon-plus"></span>
					{{ trans('messages.new_message'); }}
				</a>
			</div>
		</div>
	</div><!-- /.container -->
	
	<div class="container">
		<div class="row" id="theadListHeader" style="padding-top: 10px;">
				<button class="col-md-6 btn btn-default" type="button">
					{{ trans('messages.topic'); }}
<!-- 					<span class="glyphicon glyphicon-chevron-down" style="font-size: 0.9em"></span> -->
				</button>
				<button class="col-md-1 btn btn-default" type="button">{{ trans('messages.category') }}</button>
				<button class="col-md-2 btn btn-default" type="button">{{ trans('messages.users') }}</button>
				<button class="col-md-1 btn btn-default" type="button">{{ trans('messages.posts') }}</button>
				<button class="col-md-2 btn btn-default" type="button">{{ trans('messages.activity') }}</button>
		</div>
		<div class="row">
			<table class="table table-striped table-hover">
				<tbody>
					@foreach ($threads as $thread)
						<tr>
							<td>
								<div class="col-md-6">
									@if ($thread->locked)
										<span class="glyphicon glyphicon-lock" style="color: #555; font-size: 0.8em"></span>&nbsp;
									@endif
									@if ($thread->permanent)
										<span class="glyphicon glyphicon-pushpin" style="color: #555; font-size: 0.9em"></span>&nbsp;
									@endif
									<a href="./t/{{{ $thread->id }}}">{{{ $thread->title }}}</a>
								</div>
								<div class="col-md-1 text-center">
									<span class="label" style="background-color: navy;">مجمع</span>
								</div>
								<div class="col-md-2 ">
									@foreach ($author_list[$thread->id] as $author)
										<a href="./user/{{ $author->id }}" 
										   title="{{{ $author->profile->firstname }}} {{{ $author->profile->lastname }}}">
											<img src="{{ Constants::$profile_pics_path.$author->profile->img }}" alt="" style="width: 25px; border-radius: 3px;" >
										</a>
									@endforeach
								</div>
								<div class="col-md-1 text-center">
									<span>{{ Helpers::digits2Persian($post_count[$thread->id]) }}</span>
									<span class="glyphicon glyphicon-comment" style="color: gray"></span>
								</div>
								<div class="col-md-2">
									<div class="row">
									<div class="col-sm-6" style="padding: 0px 15px 0px 0px;">
									<a href="#" class="text-info small" title="{{ trans('messages.first_post') }}: {{ jDate::forge($thread->created_at)->format('%e %B %Y, %H: %M') }}">
										<span class="glyphicon glyphicon-time "></span>
										{{ Helpers::digits2Persian(jDate::forge($thread->created_at)->shortAgo()) }}
									</a>
									</div>
<!-- 									&nbsp;&nbsp; -->
									<div class="col-sm-6" style="padding: 0px 0px 0px 15px;">
									<a href="#" class="text-success small" title="{{ trans('messages.last_post') }}: {{ jDate::forge($thread->updated_at)->format('%e %B %Y, %H: %M') }}">
										<span class="glyphicon glyphicon-time"></span>
										{{ Helpers::digits2Persian(jDate::forge($thread->updated_at)->shortAgo()) }}
									</a>
									</div>
									</div>
								</div>
							</td>
						</tr>
						
					@endforeach
				</tbody>
			</table>
		</div>
	</div><!-- /.container -->
@stop

@section('scripts')
	<script>
		$(document).ready(function(){
			/*
			 * activate the home button on navigation bar
			 */
			 $( "#nav-home" ).addClass("active");
		});
	</script>
@stop
