<?php

if (!function_exists('randomCode')) {
    function randomCode($length)
    {
    	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$charactersLength = strlen($characters);
		$random = '';
		for ($i = 0; $i < $length; $i++) {
        	$random .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $random;
    }
}

if (!function_exists('firstChar')) {
    function firstChar($string)
    {
    	$temp = explode(" ", $string);
    	$temp1 = end($temp);
		$length = strlen($temp1);
		$char = "";
		for ($i = 0; $i < $length; $i++) {
			if($i==0){
				$char = $temp1[$i];
				return $char;
			}
	    }
    }
}

if (! function_exists('utf8convert')) {
		function utf8convert($str) {
		    if(!$str) return false;

		    $utf8 = array(

		    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

		    'd'=>'đ|Đ',

		    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

		    'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

		    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

		    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

		    'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		    );

		    foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);

			return $str;
		}
}

if (! function_exists('utf8tourl')) {
	function utf8tourl($text){
        $text = strtolower(utf8convert($text));
        $text = str_replace( "ß", "ss", $text);
        $text = str_replace( "%", "", $text);
        $text = preg_replace("/[^_a-zA-Z0-9 -] /", "",$text);
        $text = str_replace(array('%20', ' '), '-', $text);
        $text = str_replace("----","-",$text);
        $text = str_replace("---","-",$text);
        $text = str_replace("--","-",$text);
        $text = str_replace(",","-",$text);
        $text = str_replace("(","",$text);
        $text = str_replace(")","",$text);
        $text = str_replace("/","",$text);
		return $text;
	}
}

if (! function_exists('reconvertUTF8')) {
	function reconvertUTF8($text){
        $text = strtolower(utf8convert($text));
        $text = str_replace("-"," ",$text);
		return $text;
	}
}

?>