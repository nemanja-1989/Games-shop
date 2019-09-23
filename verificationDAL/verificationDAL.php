<?php
	
	require_once "verificationBL/classes/verificationCredentials.class.php";
	require_once "DB/config.php";
	require_once "DB/db.class.php";
	class verificationDAL{
		public function verificationUserDB($vc){
			//check user email verification confirm
			$query = "
				SELECT 
					`ev`.`id_email_vercode`,
					`ev`.`email`,
					`ev`.`vercode`,
					`ev`.`vercode_time_sent`,
					`ev`.`register_time`,
					`ev`.`id_user`,
					`ev`.`id_email_vercode_status`
						FROM `project14`.`email_vercode` `ev`
				WHERE `ev`.`email` = ?
				AND `ev`.`vercode` = ?
				AND datediff(CURRENT_TIMESTAMP, `ev`.`vercode_time_sent`) <= ?
				AND `ev`.`id_email_vercode_status` = ?";
			DB::openConnection();
			$email = $vc->getEmail();
			$code = $vc->getCode();
			$valid_period = EMAIL_VERCODE_VALID_PERIOD;
			$email_vercode_status = EMAIL_VERCODE_SENT;
			$params[] = "ssii";
			$params[] = &$email;
			$params[] = &$code;
			$params[] = &$valid_period;
			$params[] = &$email_vercode_status;
			$result = DB::select($query, $params);
			//var_dump($result);
			foreach($result as $res){
				$id_email_vercode = $res["id_email_vercode"];
				$id_user = $res["id_user"];
				//echo $id_user;
				//print_r($res);
			}
			
			//update email_vercode status
			$query = "
				UPDATE `project14`.`email_vercode` SET
					`register_time` = CURRENT_TIMESTAMP,
					`id_email_vercode_status` = ?
				WHERE `id_email_vercode` = ?";
			$email_vercode_status = EMAIL_VERCODE_VERIFIED;
			$params1[] = "ii";
			$params1[] = &$email_vercode_status;
			$params1[] = &$id_email_vercode;
			DB::update($query, $params1);
			//var_dump($params1);
			
			//update user status
			$query = "
				UPDATE `project14`.`user` SET	
					`id_user_status` = ?
				WHERE `id_user` = ?";
			$user_status = USER_STATUS_ACTIVE;
			$params2[] = "ii";
			$params2[] = &$user_status;
			$params2[] = &$id_user;
			DB::update($query, $params2);
			//var_dump($params2);
			
			header("Location:loginForm.php");
			exit();
		}
	}