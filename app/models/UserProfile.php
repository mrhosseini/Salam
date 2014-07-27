<?php
//بسم الله الرحمن الرحیم

class UserProfile extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'userprofiles';

	/**
	 * Get the user of this profile. Each #UserProfile belongs to a #User
	 *
	 * @return the #User object 
	 */
	public function user(){
		return $this->belongsTo('User');
	}

}
