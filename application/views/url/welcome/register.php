<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
</head>
<body>
	<form action="<?php echo site_url("") ?>">
		<label>User</label>
		<input type="text" name="txtUserName" class="txtUserName">
		<label>Email</label>
		<input type="Email" name="txtEmail" class="txtEmail" >
		<label>Password</label>
		<input type="password" name="txtPassword">
		<label>Confirm password</label>
		<input type="password" name="txtPassword">
		<button class="btn">
			Register
		</button>
	</form>
</body>
</html>