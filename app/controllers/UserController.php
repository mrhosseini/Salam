<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/

class UserController extends BaseController {

	
	/**
	 * authenticate the user
	 *
	 *
	 */
	public function authenticate() {
		$input = Input::all();
		
		$email_field = trans('messages.email');
		$password_field = trans('messages.password');
		
		
		$validator = Validator::make(
			array(
				$email_field => Input::get('email'),
				$password_field => Input::get('password')
			),
			array(
				$email_field => 'required|email|exists:users,email',
				$password_field => 'required'
			)
		);
		
		if ($validator->fails()){
			$messages = $validator->messages();
			$msg = '';
			foreach ($messages->all('<li>:message</li>') as $message){
				$msg.=$message;
			}
			return Response::json(array('status' => 0, 'msg' => $msg));
		}
		
		$email = '';
		$password = '';
		if (Input::has('email') && Input::has('password')){
			$email = Input::get('email');
			$password = Input::get('password');
// 			echo "going for authentication"."<br/>";
			if (Auth::attempt(array('email' => $email, 'password' => $password, 'active' => true))){
				return Response::json(array('status' => 1));
			}
			else{
				$msg = '<li>'.trans('messages.incorrect_password').'</li>';
				return Response::json(array('status' => 0, 'msg' => $msg));
			}
		}
	}
	
	public function showProfile($user_id) {
		$user = User::find($user_id);
		$pf = $user->profile_fields()->get();
		if ($user)
			return View::make('profile')->with('user', $user)
						    ->with('profile_fields', $pf);
		else{
			return Redirect::to('/');
		}
	}
	
	public function editUser($user_id) {
		$input = Input::all();
		
		$email = trans('messages.email2');
		$firstname = trans('messages.firstname');
		$lastname = trans('messages.lastname');
		$password = trans('messages.password');
		
		$validator = Validator::make(
			array(
				$email => Input::get('email'),
				$lastname => Input::get('lastname'),
				$firstname => Input::get('firstname'),
				$password => Input::get('password'),
				
			),
			array(
				$email => 'required|email',
				$firstname => 'required',
				$lastname => 'required',
				$password => 'required',
			)
		);
		
		if ($validator->fails()){
			$messages = $validator->messages();
			$msg = '';
			foreach ($messages->all('<li>:message</li>') as $message){
				$msg.=$message;
			}
			return Response::json(array('status' => 0, 'msg' => $msg));
		}
		
		if (Auth::user()->id != $user_id) { /** @todo what if root wants to change sth? */
			return Response::json(array('status' => 0));
		}
		
		if (!Auth::attempt(array('email' => Auth::user()->email, 'password' =>  $input['password'], 'active' => true))){
			$msg = '<li>'.trans('messages.incorrect_password').'</li>';
			return Response::json(array('status' => 0, 'msg' => $msg));
		}
		
		$user = User::find($user_id);
		$user->firstname = $input['firstname'];
		$user->lastname = $input['lastname'];
		$user->email = $input['email'];
		$user->save();
		
		$keys = array_keys($input);
		foreach ($keys as $key) {
			if (!is_numeric($key))
				continue;
			$user->profile_fields()->updateExistingPivot($key, array('value' => $input[$key]), true);
		}
		
		return Response::json(array('status' => 1));
	}
}
