<?php

	class loginCredentials{
		private $username;
		private $email;
		private $password;
		private $role;
		
		public function __construct($username, $email, $password, $role){
			$this->username = $username;
			$this->email = $email;
			$this->password = $password;
			$this->role = $role;
		}
		public function getUsername(){
			return $this->username;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getPassword(){
			return $this->password;
		}
		public function getRole(){
			return $this->role;
		}
	}