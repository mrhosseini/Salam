<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/

class ThreadController extends Controller {

	public function showThreadPosts($thread_id){
		$thread=Thread::find($thread_id);
		$posts = $thread->posts()->orderBy('created_at')->get();
		
		return View::make('thread')->with('thread', $thread)
					   ->with('posts', $posts);
	}
	

}
