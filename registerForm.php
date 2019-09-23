<?php
	$token = md5(time().microtime().uniqid());
	session_start();
	$_SESSION["token"] = $token;
?> 
<html>
	<head>
	<style>	
		
	</style>	
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/registerForm.css">
	</head>
	<body>
		<div id="wrapper">
			<?php require_once "inc/headerForm.php"; ?>
			<?php require_once "inc/mainFormRegister.php"; ?>
			<?php require_once "inc/footerForm.php"; ?>
		</div><!--end wrapper-->
	</body>
</html>