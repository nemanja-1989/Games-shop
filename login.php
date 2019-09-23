<?php
	
	//var_dump($_SERVER);
	require_once "referer/referer.php";
	require_once "session/session.php";
	require_once "loginBL/loginBL.php";
	Referer::checkReferer('http://localhost/project14/loginForm.php', "Location:loginForm.php");
	Session::startSession();
	if(!isset($_SESSION["token"]) or !$_POST["token"] or $_SESSION["token"] != $_POST["token"]){
		header("Location:loginForm.php");
	}
	$loginBL = new loginBL();
	$loginBL->loginUserBL();