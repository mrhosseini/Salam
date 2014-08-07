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
		<div class="row" >
			<div class="col-xs-12 col-md-9 col-sm-10">
				<div>
					<h3>{{ $thread->title }}</h3>
					@foreach ($posts as $post)
						<div class="row">
							<div class="col-md-1">
								<a  href="{{ URL::to('/user/'.$post->user_id) }}">
									<img src="{{ URL::to(Constants::$profile_pics_path.$post->user->profile->img) }}" style="width: 45px;" class="img-thumbnail">
								</a>
							</div>
							<div class="col-md-11">
								<div class="row">{{ $post->created_at }}</div>
								<div class="row">{{ $post->body }}</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			
		</div>
	</div><!-- /.container -->
@stop

@section('scripts')
	<script>

	</script>
@stop
