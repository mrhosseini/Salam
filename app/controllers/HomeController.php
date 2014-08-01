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
		 * Fetch latest 50 threads
		 */
		$threads = Thread::orderBy('updated_at')->take(50)->get();
		foreach ($threads as $thread){
			$posts = $thread->posts();
// 			$posts->lists('
			foreach ($posts as $post){
				$writer_images[] = $post->user->profile->img;
				
			}
		}
		 
		return View::make('home')->with('threads', $threads);
	}

}
