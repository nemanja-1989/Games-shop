<?php

	class registerCredentials{
		private $fname;
		private $lname;
		private $username;
		private $email;
		private $cemail;
		private $password;
		private $cpassword;
		private $role;
		
		public function __construct($fname, $lname, $username, $email, $cemail, $password, $cpassword, $role){
			$this->fname = $fname;
			$this->lname = $lname;
			$this->username = $username;
			$this->email = $email;
			$this->cemail = $cemail;
			$this->password = $password;
			$this->cpassword = $cpassword;
			$this->role = $role;
		}
		public function getFname(){
			return $this->fname;
		}
		public function getLname(){
			return $this->lname;
		}
		public function getUsername(){
			return $this->username;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getCemail(){
			return $this->cemail;
		}
		public function getPassword(){
			return $this->password;
		}
		public function getCpassword(){
			return $this->cpassword;
		}
		public function getRole(){
			return $this->role;
		}
	}