<?php

class Post extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
	
	
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
	public function user(){
		return $this->belongsTo('Thread');
	}

}
