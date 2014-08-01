<?php
//بسم الله الرحمن الرحیم

class 

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('DeleterSeeder');
		$this->call('UserTableSeeder');
		$this->call('UserProfileTableSeeder');
		$this->call('ThreadTableSeeder');
	}

}

/**
 * deletes all table in data base
 */
class DeleterSeeder extends Seeder {
	public function run(){
		DB::table('posts')->delete();
		DB::table('threads')->delete();
		DB::table('userprofiles')->delete();
		DB::table('users')->delete();
	}

}

class UserTableSeeder extends Seeder {
	
	public function run(){
		DB::table('users')->delete();
		User::create(array('email' => 'mrhosseini1367@gmail.com', 'active' => true, 'root' => true, 'password' => Hash::make('salam')));
	}
}


class UserProfileTableSeeder extends Seeder {
	
	public function run(){
		DB::table('userprofiles')->delete();
		$user = User::where('email', 'mrhosseini1367@gmail.com')->first();
		UserProfile::create(array(
			'user_id' => $user->id,
			'firstname' => 'محمد رضا',
			'lastname' => 'حسینی',
			'phone' => '09131944875',
			'degree' => 'دکترا',
			'field' => 'مهندسی کامپیوتر ',
			'university' => 'دانشگاه صنعتی اصفهان',
			'job' => 'برنامه نویس',
			'workplace' => 'مجمع فرهنگی شهید اژه‌ای; اصفهان',
			'live_in' => 'اصفهان',
			'img' => '../app/storage/userimages/avatar.png'
			));
	} 
}


class ThreadTableSeeder extends Seeder {

	public function run(){
		DB::table('threads')->delete();
		
		Thread::create(array(
			'title' => 'کمک برای مراسم محرم'
			));
		
		Thread::create(array(
			'title' => 'وظیفه ای به دور از توجیه و تضعیف (نگاهی به مشی سیاسی مرحوم علی صفایی حایری)'
			));
		
		Thread::create(array(
			'title' => 'کمک برای مراسم محرم2'
			));
	} 	
	
}


class PostTableSeeder extends Seeder {

}
