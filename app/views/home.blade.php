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
					@foreach ($threads as $thread)
						<tr>
							<td>
								<div class="col-md-6"><a href="./t/{{{ $thread->id }}}">{{{ $thread->title }}}</a></div>
								<div class="col-md-1">مجمع</div>
								<div class="col-md-2">
									@foreach ($author_list[$thread->id] as $author)
										<a href="./user/{{ $author->id }}" 
										   title="{{{ $author->profile->firstname }}} {{{ $author->profile->lastname }}}">
											<img src="{{ Constants::$profile_pics_path.$author->profile->img }}" alt="" style="width: 25px; border-radius: 3px;" >
										</a>
									@endforeach
								</div>
								<div class="col-md-1 text-center">
									<span>{{ $post_count[$thread->id] }}</span>
								</div>
								<div class="col-md-2">
									{{ $thread->created_at }}
									{{ $thread->updated_at }}
								</div>
							</td>
						</tr>
						
					@endforeach
			<!--		<tr>
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
							<div class="col-md-6"><a href="#">کمک برای مراسم محرم2</a></div>
							<div class="col-md-1">مجمع</div>
							<div class="col-md-2">2</div>
							<div class="col-md-1">1</div>
							<div class="col-md-2">مرداد ۹۳</div>
						</td>
					</tr>-->
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
