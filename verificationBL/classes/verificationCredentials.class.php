<?php

	class verificationCredentials{
		private $code;
		private $email;
		
		public function __construct($code, $email){
			$this->code = $code;
			$this->email = $email;
		}
		public function getCode(){
			return $this->code;
		}
		public function getEmail(){
			return $this->email;
		}
	}