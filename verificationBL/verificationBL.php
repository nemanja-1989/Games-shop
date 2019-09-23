<?php
	require_once "DB/db.class.php";
	require_once "DB/config.php";
	require_once "verificationBL/classes/verificationCredentials.class.php";
	require_once "verificationDAL/verificationDAL.php";
	class verificationBL{
		public function verificationUserBL(){
			if(isset($_GET["code"], $_GET["email"]))
			{
				$code = htmlentities(htmlspecialchars(trim($_GET["code"])));
				$email = htmlentities(htmlspecialchars(trim($_GET["email"])));
				
				DB::openConnection();
				$code = mysqli_real_escape_string(DB::$mysqli, $_GET["code"]);
				$email = mysqli_real_escape_string(DB::$mysqli, $_GET["email"]);
				
				$vc = new verificationCredentials($code, $email);
				$verificationDAL = new verificationDAL();
				$verificationDAL->verificationUserDB($vc);
			}
		}
	}