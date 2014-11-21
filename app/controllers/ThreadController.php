<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/

class ThreadController extends Controller {

	public function showThreadPosts($thread_id){
		$thread=Thread::find($thread_id);
		$posts = $thread->posts()->orderBy('created_at')->get();
		
		/*
		 * save current thread id in session
		 */
		Session::put('thread', $thread_id);
		return View::make('thread')->with('thread', $thread)
					   ->with('posts', $posts);
	}
	
	public function newThread(){
		if (Input::has('post') && Input::has('title') && Input::has('category')) {
			$post_body = Input::get('post');
			$title = Input::get('title');
			$category = Input::get('category');
			$thread_id = $this->createThread($title, $category);
			$postCtl = new PostController;
			$postCtl->newPost($thread_id, $post_body);
			return Response::json(array('status' => 1));
		}
	}
	
	private function createThread($title, $category){
		/*
		 * purify title for security and clean up
		 */
		$title = Purifier::clean($title);
		$title = strip_tags($title);
		
		/*
		 * replace ی and ک and
		 */
		 $title = Helpers::replaceKafYeh($title);
		
		/*
		 * save the Thread.
		 * TODO: save thread category
		 */
		$new_thread = new Thread;
		$new_thread->title = $title;
		$new_thread->save();
		return $new_thread->id;
	}

}
