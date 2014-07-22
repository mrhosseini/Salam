<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('UserProfileTableSeeder');
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
			'live_in' => 'اصفهان'
			));
	} 
}