<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/

class PostController extends Controller {

	public function sendReply() {
		
		if (Input::has('post') && Session::has('thread'))
		{
			$post_body = Input::get('post');
			$thread_id = Session::get('thread');
			
			//TODO: purify post_body
			$new_post = new Post;
			$new_post->thread_id = $thread_id;
			$new_post->user_id = Auth::id();
			$new_post->body = $post_body;
			$new_post->save();
			
			$url = URL::to("t/".$thread_id);
			return Response::json(array('status' => 1, 'url' => $url));
		}
	}
}
