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
	
	public function showProfile($user_id){
		$user = User::find($user_id);
		if ($user)
			return View::make('profile')->with('user', $user)->with('profile', $user->profile);
		else{
			return Redirect::to('/');
		}
	}
}
