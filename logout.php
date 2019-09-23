<?php

	require_once "session/session.php";
	Session::logoutSession("username");
	Session::logoutSession("email");
	Session::redirectSession("Location:loginForm.php");