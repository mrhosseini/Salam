<?php
//بسم الله الرحمن الرحیم

class Post extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
	
	/**
	 * touch the thread object to update the timestamps of that thread
	 *
	 * @var string
	 */
	protected $touches = array('thread');
	
	
	/**
	 * Get the user of this post. Each #Post belongs to a #User
	 *
	 * @return the #User object 
	 */
	public function user(){
		return $this->belongsTo('User');
	}
	
	
	/**
	 * Get the thread of this post. Each #Post belongs to a #Thread
	 *
	 * @return the #Thread object 
	 */
	public function thread(){
		return $this->belongsTo('Thread');
	}

}
