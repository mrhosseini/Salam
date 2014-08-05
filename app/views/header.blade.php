<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 * @file 
 * @author
 ****************/

?>

{{-- Pass a UserProfile object as input to this template                     --}}
{{-- @input profile  a UserProfle object containing current user profile     --}}
{{-- example: @include('header', array('profile' => Auth::user()->profile )) --}}

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
				<a class="navbar-brand" href="{{ URL::to('/') }}">{{ trans('messages.salam') }}</a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="topnav">
				<ul class="nav navbar-nav">
					<li id="nav-home"><a href="{{ URL::to('/') }}">{{ trans('messages.home'); }}</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{ URL::to(Constants::$profile_pics_path.$profile->img) }}" alt="{{ $profile->firstname }} {{ $profile->lastname }}" class="img-circle" style="width: 18px;">
							&nbsp;
							{{ $profile->firstname }}&nbsp;{{ $profile->lastname }}
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu" style="left: 0;">
							<li><a href="{{ URL::to('/profile') }}">{{ trans('messages.profile'); }}</a></li>
							<li><a href="{{ URL::to('/logout') }}">{{ trans('messages.logout'); }}</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<div class="input-group input-group-sm">
							<input type="text" class="form-control" placeholder="{{ trans('messages.search') }}" />
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
	