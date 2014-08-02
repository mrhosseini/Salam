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
}