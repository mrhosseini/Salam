<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/

class PostController extends Controller {

	public function sendReply() 
	{	
		if (Input::has('post') && Session::has('thread')) {
			$post_body = Input::get('post');
			$thread_id = Session::get('thread');
			$this->newPost($thread_id, $post_body);
			$url = URL::to("t/".$thread_id);
			return Response::json(array('status' => 1, 'url' => $post_body));
		}
	}
	
	
	/**
	 * create a new post under the specified thread
	 */
	public function newPost($thread_id, $post_body)
	{
		/*
		 * purify post_body for security and clean up
		 */
		$post_body = Purifier::clean($post_body);
		
		/*
		 * replace ی and ک and
		 */
		 $post_body = Helpers::replaceKafYeh($post_body);
		
		/*
		 * save the post
		 */
		$new_post = new Post;
		$new_post->thread_id = $thread_id;
		$new_post->user_id = Auth::id();
		$new_post->body = $post_body;
		$new_post->save();
	}
}

