<?php

	class Session{
		public static function startSession(){
			if(!isset($_SESSION)){
				session_start();
			}
		}
		public static function setSession($key, $value){
			Session::startSession();
			$_SESSION[$key] = $value;
		}
		public static function redirectSession($redirect){
			Session::startSession();
			header($redirect);
			exit();
		}
		public static function checkSession($key, $redirect = ""){
			Session::startSession();
			if(!isset($_SESSION[$key])){
				header($redirect);
			}
		}
		public static function logoutSession($key){
			Session::startSession();
			unset($_SESSION[$key]);
			session_destroy();
		}
	}