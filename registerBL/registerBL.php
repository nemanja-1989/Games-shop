<?php
	require_once "registerBL/classes/registerCredentials.class.php";
	require_once "DB/db.class.php";
	require_once "DB/config.php";
	require_once "registerDAL/registerDAL.php";
	class registerBL{
		public function registerUser(){
			if(isset($_POST["fname"], $_POST["lname"], $_POST["username"], $_POST["email"], $_POST["cemail"], $_POST["password"], $_POST["cpassword"], $_POST["role"], $_POST["submit"]))
			{
				$fname = htmlentities(htmlspecialchars(trim($_POST["fname"])));
				$lname = htmlentities(htmlspecialchars(trim($_POST["lname"])));
				$username = htmlentities(htmlspecialchars(trim($_POST["username"])));
				$email = htmlentities(htmlspecialchars(trim($_POST["email"])));
				$cemail = htmlentities(htmlspecialchars(trim($_POST["cemail"])));
				$password = htmlentities(htmlspecialchars(trim($_POST["password"])));
				$cpassword = htmlentities(htmlspecialchars(trim($_POST["cpassword"])));
				$role = $_POST["role"];
				
				DB::openConnection();
				$fname = mysqli_real_escape_string(DB::$mysqli, $_POST["fname"]);
				$lname = mysqli_real_escape_string(DB::$mysqli, $_POST["lname"]);
				$username = mysqli_real_escape_string(DB::$mysqli, $_POST["username"]);
				$email = mysqli_real_escape_string(DB::$mysqli, $_POST["email"]);
				$password = passwordHash(mysqli_real_escape_string(DB::$mysqli, $_POST["password"]));
				$cpassword = passwordHash(mysqli_real_escape_string(DB::$mysqli, $_POST["cpassword"]));
				
				$rc = new registerCredentials($fname, $lname, $username, $email, $cemail, $password, $cpassword, $role);
				$this->validateRegisterUser($rc);
				$registerDAL = new registerDAL();
				$registerDAL->registerUserDB($rc);
			}
		}
		public function validateRegisterUser($rc){
			$errors = array();
			if($rc->getFname() == ""){
				$errors["fname"] = "<p>Please check First name field!</p>";
			}else if(!preg_match("/^[a-zA-Z]{1,20}$/", $rc->getFname())){
				$errors["fname"] = "<p>Please enter valid First name!</p>";
			}else if($rc->getLname() == ""){
				$errors["lname"] = "<p>Plase check your Last name field!</p>";
			}else if(!preg_match("/^[a-zA-Z]{1,30}$/", $rc->getLname())){
				$errors["lname"] = "<p>Please enter valid Last name!</p>";
			}else if($rc->getUsername() == ""){
				$errors["username"] = "<p>Please check your Username field!</p>";
			}else if(!preg_match("/^[a-zA-Z0-9]{1,20}$/", $rc->getUsername())){
				$errors["username"] = "<p>Please enter valid Username field!</p>";
			}else if($rc->getEmail() == ""){
				$errors["email"] = "<p>Plase check your Email field!</p>";
			}else if(!preg_match("/^[a-zA-Z0-9\ \/\.\_\-]+\@[a-zA-Z0-9\ \/\.\_\-]+\.[a-z]{1,3}$/", $rc->getEmail())){
				$errors["email"] = "Please enter valid Email address!";
			}else if($rc->getPassword() == ""){
				$errors["password"] = "<p>Please check your Password field!</p>";
			}else if(!preg_match("/^[a-zA-Z0-9]{1,45}$/", $rc->getPassword())){
				$errors["password"] = "<p>Please enter valid Password!</p>";
			}else if($rc->getPassword() != $rc->getCpassword()){
				$errors["password"] = "<p>Please check your passwords!</p>";
			}else if($rc->getEmail() != $rc->getCemail()){
				$errors["email"] = "<p>Please check your email fields!</p>";
			}else if($rc->getRole() == -1){
				$errors["role"] = "<p>Please choose your role!</p>";
			}
			
			if(isset($errors)){
				foreach($errors as $error){
					echo "<p>" . $error . "</p>";
					exit();
				}
			}
			if(!$errors){
				//echo "<p>Successfully register!</p>";
			}
		}
	}