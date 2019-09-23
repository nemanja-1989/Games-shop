<?php

	//var_dump($_SERVER);
	require_once "referer/referer.php";
	require_once "session/session.php";
	require_once "registerBL/registerBL.php";
	Referer::checkReferer('http://localhost/project14/registerForm.php', "Location:registerForm.php");
	Session::startSession();
	if(!isset($_SESSION["token"]) or !$_POST["token"] or $_SESSION["token"] != $_POST["token"]){
		header("Location:registerForm.php");
		exit();
	}
	$registerBL = new registerBL();
	$registerBL->registerUser();