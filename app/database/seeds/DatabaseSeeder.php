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
		$this->call('ProfileFieldTableSeeder');
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
		DB::table('profilefields')->delete();
		DB::table('users')->delete();
	}
}

class UserTableSeeder extends Seeder {
	
	public function run(){
		DB::table('users')->delete();
		User::create(array('email' => 'mrhosseini1367@gmail.com', 'active' => true, 'root' => true, 'password' => Hash::make('salam'),
				'firstname' => 'محمد رضا', 'lastname' => 'حسینی', 'img' => 'avatar.png', 'username' => 'mrhosseini'));
		
		
		for ($i = 0; $i < 9; $i++){
			User::create(array(
				'email' => substr(str_shuffle(md5(time())), 0, rand(5 ,10)).'@gmail.com',
				'active' => true,
				'root' => false, 
				'password' => Hash::make('salam'),
				'firstname' => Helpers::randomPersianString(rand(4,9)),
				'lastname' => Helpers::randomPersianString(rand(4,9)),
				'username' => substr(str_shuffle(md5(time())), 0, rand(5 ,10)),
				'img' => ($i+1).'.jpg'
				));
		}
	}
}

class ProfileFieldTableSeeder extends Seeder {
	public function run(){
		DB::table('profilefields')->delete();
		
		ProfileField::create(array('name' => 'phone', 'type' => 'string', 'display_name' => 'شماره تماس'));
		ProfileField::create(array('name' => 'degree', 'type' => 'string', 'display_name' => 'مدرک (مقطع) تحصیلی'));
		ProfileField::create(array('name' => 'field', 'type' => 'string', 'display_name' => 'رشته تحصیلی'));
		ProfileField::create(array('name' => 'university', 'type' => 'string', 'display_name' => 'دانشگاه محل تحصیل'));
		ProfileField::create(array('name' => 'job', 'type' => 'string', 'display_name' => 'شغل'));
		ProfileField::create(array('name' => 'workplace', 'type' => 'string', 'display_name' => 'محل کار'));
		ProfileField::create(array('name' => 'live_in', 'type' => 'string', 'display_name' => 'شهر محل سکونت'));
		ProfileField::create(array('name' => 'married', 'type' => 'boolean', 'display_name' => 'متأهل'));
		ProfileField::create(array('name' => 'description', 'type' => 'text', 'display_name' => 'سایر توضیحات'));
		ProfileField::create(array('name' => 'majma_job', 'type' => 'string', 'display_name' => 'مسئولیت فعلی در مجمع'));
	}
}

class UserProfileTableSeeder extends Seeder {
	
	public function run(){
		DB::table('userprofiles')->delete();
		$user = User::where('email', 'mrhosseini1367@gmail.com')->first();
		UserProfile::create(array(
			'user_id' => $user->id,
			'field_id' => 1,
			'value' => '09131944857',
		));
		
		UserProfile::create(array(
			'user_id' => $user->id,
			'field_id' => 2,
			'value' => 'دکترا',
		));
		
		UserProfile::create(array(
			'user_id' => $user->id,
			'field_id' => 3,
			'value' => 'مهندسی کامپیوتر',
		));
		
		UserProfile::create(array(
			'user_id' => $user->id,
			'field_id' => 4,
			'value' => 'دانشگاه صنعتی اصفهان',
		));
		
		UserProfile::create(array(
			'user_id' => $user->id,
			'field_id' => 5,
			'value' => 'برنامه نویس',
		));
		
		UserProfile::create(array(
			'user_id' => $user->id,
			'field_id' => 6,
			'value' => 'مجمع فرهنگی شهید اژه‌ای',
		));
		
		UserProfile::create(array(
			'user_id' => $user->id,
			'field_id' => 7,
			'value' => 'اصفهان',
		));
		
		UserProfile::create(array(
			'user_id' => $user->id,
			'field_id' => 8,
			'value' => false,
		));
		
		UserProfile::create(array(
			'user_id' => $user->id,
			'field_id' => 9,
			'value' => 'من متعلق به همه شما هستم!',
		));
		
		UserProfile::create(array(
			'user_id' => $user->id,
			'field_id' => 10,
			'value' => 'رئیس گروپ!',
		));	
		
		for ($j = 2; $j < 11; $j++){
			for ($i = 1; $i < 11; $i++){
				UserProfile::create(array(
					'user_id' => $j,
					'field_id' => $i,
					'value' => ($i == 8)? rand(0,1) :  Helpers::randomPersianString(rand(7,15)),		
				));
			}
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
			for ($i = 0; $i < 104; $i++){
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
