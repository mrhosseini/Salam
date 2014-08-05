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
		$threads = Thread::orderBy('permanent', 'DESC')->orderBy('updated_at', 'DESC')->take(Constants::$threads_per_page)->get();
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
		
// 		echo $threads->first()->id;
// 		foreach ($author_list[99] as $author){
// 			echo "<br><br><br>".$author->profile->img."<br>";
// 			var_dump($author);
// 			
// 		}
// 		echo "<br>";
// 		print_r($thread_post_count);
		 
		return View::make('home')->with('threads', $threads)
					 ->with('author_list', $author_list)
					 ->with('post_count', $thread_post_count);
					 
	}

}

