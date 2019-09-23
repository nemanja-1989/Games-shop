<?php
	require_once "session/session.php";
	require_once "loginBl/classes/loginCredentials.class.php";
	require_once "DB/db.class.php";
	require_once "DB/config.php";
	class loginDAL{
		public function checkUserDB($lc){
			$query = "
				SELECT
					`u`.`fname`,
					`u`.`lname`,
					`u`.`username`,
					`u`.`email`,
					`u`.`password`,
					`u`.`role`,
					`u`.`id_user_status`
						FROM `project14`.`user` `u`
				WHERE `u`.`username` = ? 
				AND `u`.`email` = ?
				AND `u`.`password` = ?";
			DB::openConnection();
			$role = $lc->getRole();
			$username = $lc->getUsername();
			$email = $lc->getEmail();
			$password = $lc->getPassword();
			$params[] = "sss";
			$params[] = &$username;
			$params[] = &$email;
			$params[] = &$password;
			$result = DB::select($query, $params);
			//var_dump($result);
			//echo $role;
			foreach($result as $res){
				$id_user_status = $res["id_user_status"];
					switch($id_user_status){
						case USER_STATUS_VERIFICATION:
							header("Location:registerForm.php");
							exit();
						break;
					case USER_STATUS_ACTIVE:
						printf("You are logged in! Enjoy.");
						Session::setSession("username", $username);
						Session::setSession("email", $email);
						if($role === "admin"){
							Session::redirectSession("Location:homeADMIN.php");
						}else if($role === "user"){
							Session::redirectSession("Location:homeUSER.php");
						}
					break;
					case USER_STATUS_NOT_ACTIVE:
					case USER_STATUS_BLOCKED:
					case USER_STATUS_DEACTIVATED:
							header("Location:registerForm.php");
							exit();
					break;
				}
			}
		}
	}