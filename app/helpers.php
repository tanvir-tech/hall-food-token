<?php
	function avatarLetter($str) {
	    $ret = '';
	    foreach (explode(' ', $str) as $word)
	        $ret .= strtoupper($word[0]);
	    return $ret;
	}

	function generateRandomString($length = 3) {
	    return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}