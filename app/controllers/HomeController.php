<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

// 	public function showWelcome()
// 	{
// 		return View::make('hello');
// 	}

	/**
	 * Fetches the required data and shows the home view
	 * @return home view
	 */
	public function showHome(){
	
		/*
		 * Fetch latest 25 threads
		 */
		$threads = Thread::orderBy('updated_at', 'DESC')->take(25)->get();
		foreach ($threads as $thread){
			$posts = $thread->posts();
			
			$unique_authors = $posts->groupby('user_id')->lists('user_id');
			$count_unique = count($unique_authors);
 			
 			$authors = $posts->lists('user_id');
 			$count_authors = count($authors);
 			
 			/*
 			 * first author must be always the first in list
 			 */
 			$author_list[0] = $authors[0];
 			
 			/*
 			 * save the last author for later use
 			 */
			$last = $authors[count($authors) - 1];
			
			/*
			 * get post count for each author and sort descending
			 */
			$authors_post_count = array_count_values($authors);
			arsort($authors_post_count);
 			
			
 			if ($count_unique <= 5){
				/*
				 * if unique authors less than threshold all must be in list
				 */
				$max_index = $count_unique - 1;
				$current_index = 1;
				if ($author_list[0] != $last){ 
					/*
					 * if first and last authors are different then put the last author in its place
					 */
					$author_list[$max_index] = $last;
					$max_index--;
				}
				/*
				 * if first and last authors are the same only show the first
				 */
				foreach ($unique_authors as $author){
					if ($author != $author_list[0] && $author != $last){
						if ($current_index > $max_index)
							break;
						$author_list[$current_index] = $author;
						$current_index++;
					}
				}
 			}
 			else { /* $count_unique > 5 */
				/*
				 * if unique authors are more than threshold put first and last author
				 * and find authors with the most posts
				 */
				$author_list[4] = $last;
				$current_index = 1;
				foreach ($authors_post_count as $author => $post_count){
					if ($author != $author_list[0] && $author != $author_list[4]){
						$author_list[$current_index] = $author;
						$current_index++;
						if ($current_index >= 4)
							break;
					}
				}
 			}
 			
			echo "<br>";
			foreach ($posts as $post){
				$writer_images[] = $post->user->profile->img;
			}
		}
		 
		return View::make('home')->with('threads', $threads);
	}

}

