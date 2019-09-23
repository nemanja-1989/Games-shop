<?php
	
	require_once "registerBL/classes/registerCredentials.class.php";
	require_once "DB/db.class.php";
	require_once "DB/config.php";
	class registerDAL{
		public function registerUserDB($rc){
			
			//insert user
			
			$query = "
				INSERT INTO `project14`.`user` (`fname`, `lname`, `username`, `email`, `password`, `role`, `id_user_status`) VALUES
				(?, ?, ?, ?, ?, ?, ?)";
			DB::openConnection();
			$fname = $rc->getFname();
			$lname = $rc->getLname();
			$username = $rc->getUsername();
			$email = $rc->getEmail();
			$password = $rc->getPassword();
			$role = $rc->getRole();
			$user_status = USER_STATUS_VERIFICATION;
			$params[] = "ssssssi";
			$params[] = &$fname;
			$params[] = &$lname;
			$params[] = &$username;
			$params[] = &$email;
			$params[] = &$password;
			$params[] = &$role;
			$params[] = &$user_status;
			DB::insert($query, $params);
			//var_dump($params);
			//insert email vercode
			
			$query = "
				INSERT INTO `project14`.`email_vercode` (`email`, `vercode`, `id_user`, `id_email_vercode_status`) VALUES
				(?, ?, ?, ?)";
			$vercode = mt_rand(100000, 999999);
			$vercode = passwordHash($vercode);
			//echo $vercode;
			$email = $rc->getEmail();
			$userID = DB::lastInsertedID();
			$email_vercode_status = EMAIL_VERCODE_GENERATED;
			$params1[] = "ssii";
			$params1[] = &$email;
			$params1[] = &$vercode;
			$params1[] = &$userID;
			$params1[] = &$email_vercode_status;
			DB::insert($query, $params1);
			//var_dump($params1);
			
			//sent email vercode to user
			$mailContent = sprintf("
				<h1>Just one more step to registrate!</h1>
				<div>Click <a href='http://localhost/project14/verification.php?code=%s&email=%s'>HERE</a> and finish your registration!</div>
			",$vercode,
			$email);
			@mail($email, "Please complete your registration!", $mailContent);
			
			//change email status to sent
			$query = "
				UPDATE `project14`.`email_vercode` SET
					`vercode_time_sent` = CURRENT_TIMESTAMP,
					`id_email_vercode_status` = ?
				WHERE `email` = ?
				AND `id_user` = ?";
			$email_vercode_status = EMAIL_VERCODE_SENT;
			$params2[] = "isi";
			$params2[] = &$email_vercode_status;
			$params2[] = &$email;
			$params2[] = &$userID;
			DB::update($query, $params2);
			
			printf("Email verification code is sent successfully! %s", $mailContent);
			
		} 
	}