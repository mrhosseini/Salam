<?php
//بسم الله الرحمن الرحیم

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	/**
	 * Get the user's profile. Each #User has many #UserProfile
	 *
	 * @return the #UserProfile object 
	 */
	public function profile(){
		return $this->hasMany('UserProfile');
	}
	
	
	/**
	 * Get all posts by this user. Each #User has many #Posts
	 *
	 * @return array of #Post objects
	 */
	public function posts(){
		return $this->hasMany('Post');
	}
	
	
	/**
	 * Many to Many relation ship between #User and #ProfileField with #userprofiles and the pivot table
	 *
	 * 
	 */
	public function profile_fields(){
		return $this->belongsToMany('ProfileField', 'userprofiles', 'user_id', 'field_id')->withPivot('value');
	}
	
	

}
