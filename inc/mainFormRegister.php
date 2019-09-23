<main id="main">
		
				<div id="form">
					<form name="register" action="register.php" method="POST">
						<input type="hidden" name="token" value="<?php echo $token; ?>">
						<select name="role">
							<option value="-1">Choose your role</option>
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
						<input type="text" name="fname" id="fname" placeholder="First name">
						<input type="text" name="lname" id="lname" placeholder="Last name">
						<input type="text" name="username" id="username" placeholder="Username">
						<input type="text" name="email" id="email" placeholder="Email">
						<input type="text" name="cemail" id="cemail" placeholder="Confirm email">
						<input type="password" name="password" id="password" placeholder="Password">
						<input type="password" name="cpassword" id="cpassword" placeholder="Confirm password">
						<input type="submit" name="submit" value="Register"> 
					</form>
				</div><!--end form-->
			</main>