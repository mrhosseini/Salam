<?php

class HomeController extends BaseController {

	/**
	 * Default home controller. Shows threads list page by page
	 */
	public function showHome($pageNumber = 1){
		
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
			$posts = $thread->posts()->orderBy('created_at');
			$thread_post_count["$thread->id"] = $posts->count();
			
			
			$unique_authors = $posts->groupby('user_id')->lists('user_id');
			$count_unique = count($unique_authors);
 			
 			$authors = $posts->lists('user_id');
 			$count_authors = count($authors);
 			
 			/*
 			 * first author must be always the first in list
 			 */
 			$first = $authors[0];
 			$author_list["$thread->id"][0] = User::find($authors[0]);
 			
 			/*
 			 * save the last author for later use
 			 */
			$last = $authors[count($authors) - 1];
			
			/*
			 * get post count for each author and sort descending
			 */
			$authors_post_count = array_count_values($authors);
			arsort($authors_post_count);
 			
			
 			if ($count_unique <= Constants::$author_list_capacity){
				/*
				 * if unique authors less than Constants::$author_list_capacity all must be in list
				 */
				$max_index = $count_unique - 1;
				$current_index = 1;
				if ($first != $last){ 
					/*
					 * if first and last authors are different then put the last author in its place
					 */
					$author_list["$thread->id"][$max_index] = User::find($last);
					$max_index--;
				}
				/*
				 * if first and last authors are the same only show the first
				 */
				foreach ($unique_authors as $author){
					if ($author != $first && $author != $last){
						if ($current_index > $max_index)
							break;
						$author_list["$thread->id"][$current_index] = User::find($author);
						$current_index++;
					}
				}
 			}
 			else { /* $count_unique >  Constants::$author_list_capacity*/
				/*
				 * if unique authors are more than  Constants::$author_list_capacity put first and last author
				 * and find authors with the most posts
				 */
				$author_list["$thread->id"][Constants::$author_list_capacity - 1] = User::find($last);
				$current_index = 1;
				foreach ($authors_post_count as $author => $post_count){
					if ($author != $first && $author != $last){
						$author_list["$thread->id"][$current_index] = User::find($author);
						$current_index++;
						if ($current_index >=  Constants::$author_list_capacity - 1)
							break;
					}
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
