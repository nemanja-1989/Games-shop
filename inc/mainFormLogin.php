<main id="main">
		<div id="form">
			<form name="login" action="login.php" method="POST">
				<select name="role">
					<option value="-1">Choose your role</option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
				<input type="hidden" name="token" value="<?php echo $token; ?>"> 
				<input type="text" name="username" id="username" placeholder="Username">
				<input type="text" name="email" id="email" placeholder="Email">
				<input type="password" name="password" id="password" placeholder="Password">
				<input type="submit" name="submit" value="Login">
			</form>
		</div>
		</main>