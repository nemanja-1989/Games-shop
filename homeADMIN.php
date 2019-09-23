<?php

	require_once "session/session.php";
	Session::checkSession("username", "Location:loginForm.php");
	Session::checkSession("email", "Location:loginForm.php");
	