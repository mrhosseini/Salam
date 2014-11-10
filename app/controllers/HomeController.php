<?php

class HomeController extends BaseController {

	/**
	 * Default home controller. Shows threads list page by page
	 */
	public function showHome($pageNumber = 1){
		
		/*
		 * forget current thread
		 */
		Session::forget('thread');
		
		if ($pageNumber < 1)
			$pageNumber = 1;
			
		$isLastPage = false;
			
	
		/*
		 * Fetch threads in this page
		 */
		$threads = Thread::orderBy('permanent', 'DESC')
				 ->orderBy('updated_at', 'DESC')
				 ->skip(Constants::$threads_per_page * ($pageNumber -1))
				 ->take(Constants::$threads_per_page)
				 ->get();
		
		/*
		 * if there is no threads in this page redirect to first page
		 */
		if ($threads->isEmpty()){
			return Redirect::to("/");
		}
			
		/*
		 * Fetch threads in next page to see if current page is the last page
		 */		 
		$nextPagethreads = Thread::orderBy('permanent', 'DESC')
				 ->orderBy('updated_at', 'DESC')
				 ->skip(Constants::$threads_per_page * ($pageNumber))
				 ->take(Constants::$threads_per_page)
				 ->get();
		
		if ($nextPagethreads->isEmpty()){
			$isLastPage = true;
		}
				 
		/*
		 * calculate post counts and make the athor list of each thread
		 * First in list: author of first post
		 * Last in list: author of last post
		 * other: authors with most posts in descending order
		 */
		foreach ($threads as $thread){
			$posts = Post::select('user_id')->where('thread_id', '=', $thread->id)->orderBy('created_at')->get();
			$thread_post_count["$thread->id"] = $posts->count();

 			$count_authors = $posts->count();
 			
 			/*
 			 * save first and last authors. first author must be always the first in list
 			 */
 			$first = $posts->first()->user_id;
 			$author_list["$thread->id"][0] = User::find($first);
			$last = $posts->last()->user_id;
			
			/*
			 * get post count for each author and sort descending
			 */
			$post_authors = Post::select('user_id', DB::raw('count(*) as count'))
						->where('thread_id', '=', $thread->id)
						->orderBy('count', 'desc')
						->orderBy('created_at')
						->groupBy('user_id')
						->get();
			$count_unique = $post_authors->count();
			
			$max_index = Constants::$author_list_capacity - 1;
			$current_index = 1;
			
 			if ($count_unique <= Constants::$author_list_capacity){
				/*
				 * if unique authors less than Constants::$author_list_capacity all must be in list
				 */
				$max_index = $count_unique - 1;
 			}

			if ($first != $last){ 
				/*
				 * if first and last authors are different then put the last author in its place
				 */
				$author_list["$thread->id"][$max_index] = User::find($last);
				$max_index--;
			}
			
 			foreach ($post_authors as $post){
				if ($post->user_id != $first && $post->user_id != $last){
					$author_list["$thread->id"][$current_index] = User::find($post->user_id);
					$current_index++;
					if ($current_index >  $max_index)
						break;
				}
			}
		}
		 
		return View::make('home')->with('threads', $threads)
					 ->with('author_list', $author_list)
					 ->with('post_count', $thread_post_count)
					 ->with('pageNumber', $pageNumber)
					 ->with('isLastPage', $isLastPage);
	}
}
