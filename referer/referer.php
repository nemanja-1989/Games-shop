<?php

	class Referer{
		public static function checkReferer($domen, $location, $domen1 = ""){
			if(!isset($_SERVER["HTTP_REFERER"]) or ($_SERVER["HTTP_REFERER"] != $domen && $_SERVER["HTTP_REFERER"] != $domen1)){
				header($location);
				exit();
			}
		}
	}