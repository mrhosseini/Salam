<?php
/****************
 * بسم الله الرحمن الرحیم
 *
 ****************/
 
class Helpers {
	
	/**
	 * Generates a random persian srting
	 * @param length The length of output string. 
	 * 		  @default 0 for random length between 5 to 30
	 * @return a random string with persian characters
	 */
	public static function randomPersianString($length = 0){
		if ($length == 0){
			$length = rand(5, 30);
		}
		$characters = array ("آ","ا","ب","پ","ت","س",'ج','چ','ه','ه','د','ذ','ر','ز','ژ','س','ش','ص','ض','ط','ض','ع','ق','ف','ق','ک','گ','ل','م','ن','و','ه','ی','ئ','ؤ',' ',' ',' ',' ',' ',' ');
		shuffle($characters);
		$str = '';
		for ($i = 0; $i < $length; $i++){
			$str .= $characters[$i];
		}
		return $str;
	}
	
	/**
	 * Converts english digits to persian digits if locale is set to fa
	 * @param string str string to search for digits
	 * @return converted string
	 */
	public static function digits2Persian($str){
		if (Lang::getLocale() == 'fa'){
			return preg_replace_callback(
				'/(?:&#\d{2,4};)|(\d+[\.\d]*)|(?:[a-z](?:[\x00-\x3B\x3D-\x7F]|<\s*[^>]+>)*)|<\s*[^>]+>/i',
				function($matches){
					$farsi_array = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", "٫");
					$english_array = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", ".");
		
					$out = '';
					if (isset($matches[1])) {
						return str_replace($english_array, $farsi_array, $matches[1]);
					}
					return $matches[0];
				},
				$str);
		}
		else{
			return $str;
		}
	}
}