<?php
//بسم الله الرحمن الرحیم

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
		$this->call('PostTableSeeder');
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
		
		
		for ($i = 0; $i < 9; $i++){
			User::create(array(
				'email' => substr(str_shuffle(md5(time())), 0, rand(5 ,10)).'@gmail.com',
				'active' => true,
				'root' => false, 
				'password' => Hash::make('salam')));
		}
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
			
		
		for ($i = 2; $i <= 10; $i++){
			UserProfile::create(array(
				'user_id' => $i,
				'firstname' => Helpers::randomPersianString(rand(4,9)),
				'lastname' => Helpers::randomPersianString(rand(4,9)),
				'phone' => '091'.rand(10000000,99999999),
				'degree' => Helpers::randomPersianString(rand(5,10)),
				'field' => Helpers::randomPersianString(rand(7,15)),
				'university' => Helpers::randomPersianString(rand(10,20)),
				'job' => Helpers::randomPersianString(rand(7,15)),
				'workplace' => Helpers::randomPersianString(rand(10,20)),
				'live_in' => Helpers::randomPersianString(rand(3,10)),
				'img' => '../app/storage/userimages/avatar.png',
			));
		}
	} 
}


class ThreadTableSeeder extends Seeder {

	public function run(){
		DB::table('threads')->delete();
		
		for ($i = 0; $i < 100; $i++){
			$title = Helpers::randomPersianString();
// 			echo $title;
			Thread::create(array(
				'title' => $title,
			));
		}
		
		sleep(1);
		Thread::create(array(
			'title' => 'کمک برای مراسم محرم'
			));
		
		sleep(1);
		Thread::create(array(
			'title' => 'وظیفه ای به دور از توجیه و تضعیف (نگاهی به مشی سیاسی مرحوم علی صفایی حایری)'
			));
		
		sleep(1);
		Thread::create(array(
			'title' => 'رهبر انقلاب: کسی گمان نبرد که امام، انتخابات را از فرهنگ غرب اتخاذ و با تفکر اسلامی مخلوط کرد'
			));	
		
		sleep(1);
		Thread::create(array(
			'title' => 'فراخوان شرکت در مدرسه تابستانی کسب و کار'
			));
	} 
	
}


class PostTableSeeder extends Seeder {
	public function run(){
		DB::table('posts')->delete();
		
		for ($j = 0; $j < 10; $j++){
			for ($i = 0; $i < 100; $i++){
				$max = rand(2,5);
				if (rand(1, $max) != $max ){
				
					$body_length = rand(1, 100);
					$body = '';
					for ($k = 0; $k < $body_length; $k++){
						$body = $body.Helpers::randomPersianString(rand(4, 6));
					}
					Post::create(array(
						'thread_id' => ($i + 1),
						'user_id' => rand(1, 10),
						'body' => $body,
					));
				}
			}
			sleep (1);
		}
	} 
}
