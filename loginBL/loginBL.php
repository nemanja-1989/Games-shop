<?php
	require_once "loginBL/classes/loginCredentials.class.php";
	require_once "DB/db.class.php";
	require_once "DB/config.php";
	require_once "loginDAL/loginDAL.php";
	class loginBL{
		public function loginUserBL(){
			if(isset($_POST["username"], $_POST["email"], $_POST["password"], $_POST["role"], $_POST["submit"]))
			{
				$username = htmlentities(htmlspecialchars(trim($_POST["username"])));
				$email = htmlentities(htmlspecialchars(trim($_POST["email"])));
				$password = htmlentities(htmlspecialchars(trim($_POST["password"])));
				$role = $_POST["role"];
				
				DB::openConnection();
				$username = mysqli_real_escape_string(DB::$mysqli, $_POST["username"]);
				$email = mysqli_real_escape_string(DB::$mysqli, $_POST["email"]);
				$password = passwordHash(mysqli_real_escape_string(DB::$mysqli, $_POST["password"]));
				
				$lc = new loginCredentials($username, $email, $password, $role);
				$this->validateUserBL($lc);
				$loginDAL = new loginDAL();
				$loginDAL->checkUserDB($lc);
			}
		}
		public function validateUserBL($lc){
			$errors = array();
			if($lc->getUsername() == ""){
				$errors["username"] = "<p>Please check your Username field!</p>";
			}else if(!preg_match("/^[a-zA-Z0-9]{1,20}$/", $lc->getUsername())){
				$errors["username"] = "<p>Please enter valid Username!</p>";
			}else if($lc->getEmail() == ""){
				$errors["email"] = "<p>Please check your Email field!</p>";
			}else if(!preg_match("/^[a-zA-Z0-9\ \/\.\_\-]+\@[a-zA-Z0-9\ \/\.\_\-]+\.[a-z]{1,3}$/", $lc->getEmail())){
				$errors["email"] = "<p>Please enter valid Email address!</p>";
			}else if($lc->getPassword() == ""){
				$errors["password"] = "<p>Please check your password field!</p>";
			}else if(!preg_match("/^[a-zA-Z0-9]{1,45}$/", $lc->getPassword())){
				$errors["password"] = "<p>Please enter valid password!</p>";
			}else if($lc->getRole() == -1){
				$errors["role"] = "<p>Please choose your role!</p>";
			}
			
			if(isset($errors)){
				foreach($errors as $error){
					echo "<p>" . $error . "</p>";
					exit();
				}
			}
			if(!$errors){
				//echo "<p>Logged in.</p>";
			}
		}
	}