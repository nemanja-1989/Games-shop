<?php

	//DBConnection
	defined("DB_HOST") ? "" : define("DB_HOST", "localhost");
	defined("DB_USER") ? "" : define("DB_USER", "root");
	defined("DB_PASS") ? "" : define("DB_PASS", "");
	defined("DB_NAME") ? "" : define("DB_NAME", "project14");
	
	//user status
	defined("USER_STATUS_VERIFICATION") ? "" : define("USER_STATUS_VERIFICATION", "1");
	defined("USER_STATUS_ACTIVE") ? "" : define("USER_STATUS_ACTIVE", "2");
	defined("USER_STATUS_NOT_ACTIVE") ? "" : define("USER_STATUS_NOT_ACTIVE", "3");
	defined("USER_STATUS_BLOCKED") ? "" : define("USER_STATUS_BLOCKED", "4");
	defined("USER_STATUS_DEACTIVATED") ? "" : define("USER_STATUS_DEACTIVATED", "5");
	
	//email vercode status
	defined("EMAIL_VERCODE_GENERATED") ? "" : define("EMAIL_VERCODE_GENERATED", "1");
	defined("EMAIL_VERCODE_SENT") ? "" : define("EMAIL_VERCODE_SENT", "2");
	defined("EMAIL_VERCODE_REGENERATED") ? "" : define("EMAIL_VERCODE_REGENERATED", "3");
	defined("EMAIL_VERCODE_EXPIRED") ? "" : define("EMAIL_VERCODE_EXPIRED", "4");
	defined("EMAIL_VERCODE_VERIFIED") ? "" : define("EMAIL_VERCODE_VERIFIED", "5");
	
	//email vercode valid period
	defined("EMAIL_VERCODE_VALID_PERIOD") ? "" : define("EMAIL_VERCODE_VALID_PERIOD", "2");
	
	//passwordHash
	defined("PASSWORD_SALT") ? "" : define("PASSWORD_SALT", "PASSWORD_SALT12341234");
	function passwordHash($password){
		$password = $password . PASSWORD_SALT;
		$password = sha1($password);
		return $password;
	}