<?php
//بسم الله الرحمن الرحیم

class Thread extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'threads';
	
	
	/**
	 * Get all posts in this thread. Each #Thread has many #Posts
	 *
	 * @return array of #Post objects
	 */
	public function posts(){
		return $this->hasMany('Post');
	}
	
	
// 	public function scopeRange($query, $from, $to){
// 		return $query
// 	}
// 	
// 	public function getThreads($query, $from, $to){
// 		Thread::skip($from)
// 	}

}
