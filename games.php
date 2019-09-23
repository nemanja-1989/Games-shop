<?php
	require_once "session/session.php";
	Session::checkSession("username", "Location:loginForm.php");
	Session::checkSession("email", "Location:loginForm.php");
	
?>
<html>
	<head>
	<style>
		body{
			margin: 0;
			padding: 0;
		}
		#games1{
			width: 700px;
			text-align: center;
			border-top: 3px solid red;
			font-family: sans-serif;
			margin-top: 100px;
			margin-left: 400px;
		}
		#wrapper{
			width: 1540px;
			margin: 0 auto;
			display: grid;
			grid-template-columns: 1540px;
			grid-template-rows: auto auto auto;
			grid-template-areas: 
				"header"
				"main"
				"footer"
		}
		#header{grid-area: header;}
		#main{grid-area: main;}
		#footer{grid-area: footer;}
		#main{
			
		}
		#footer{
			background: grey;
			height: 400px;
		}
		header{
			display: flex;
			justify-content: space-between;
			align-items: center;
			height: 60px;
			background: lightyellow;
		}
		#menu ul{
			margin: 0;
			padding: 0;
			list-style: none;
		}
		#menu ul li{
			float: left;
		}
		#menu ul li a{
			text-decoration: none;
			text-transform: uppercase;
			text-shadow: 0 1px 0 rgba(0,0,0, .2);
			display: block;
			height: 30px;
			padding: 15px 0;
			margin-right: 30px;
			font-weight: bold;
		}
		#logo{
			margin-left: 30px;
			margin-right: auto;
		}
		#nav ul{
			margin: 0;
			padding: 0;
			list-style: none;
		}
		#nav ul li{
			float: left;
		}
		#nav ul li a{
			text-decoration: none;
			text-transform: uppercase;
			text-shadow: 0 1px 0 rgba(0,0,0, .2);
			display: block;
			height: 30px;
			padding: 15px 0;
			margin-right: 30px;
		}
	</style>
		<title></title>
		
	</head>
	<body>	
		<div id="wrapper">
			<?php require_once "inc/headerForm.php"; ?>
		<div id="main">
			<div id="games">
				<?php require_once "game/createGame.php"; Games::openGames(); ?>
			</div>
		</div><!--end main-->
		<?php require_once "inc/footerForm.php"; ?>
		</div><!--end wrapper-->
	</body>
</html>