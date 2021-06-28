<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet"  href=<?php echo base_url("/content/css/universales/style_v2.css") ?> >
</head>
<body>
	<?php
	$this->load->view("parts/header.php");
	?>
	<div class="card bg-light">
		<article class="card-body mx-auto" style="max-width: 400px;">
			<h4 class="card-title mt-3 text-center">Create Account</h4>
<!--			Form-->
			<form action="<?php echo site_url("welcome/") ?>">
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-user"></i> </span>
					</div>
					<input  name="txtUserName" class="txtUserName form-control" placeholder="Nombres" type="text">
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-user"></i> </span>
					</div>
					<input  name="txtUserName" class="txtUserName form-control" placeholder="Apellidos" type="text">
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-user"></i> </span>
					</div>
					<input  name="txtUserName" class="txtUserName form-control" placeholder="Usuario" type="text">
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
					</div>
					<input name="txtEmail" class="txtEmail form-control" placeholder="Correo electronico" type="email">
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
					<input class="txtPassword form-control" placeholder="Create password" type="password">
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
					<input class="form-control" placeholder="Repeat password" type="password">
				</div> <!-- form-group// -->

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block"> Registrarse  </button>
				</div> <!-- form-group// -->
				<p class="text-center">Have an account? <a href="<?php echo site_url("welcome/index") ?>">Log In</a> </p>
			</form>
		</article>
	</div> <!-- card.// -->
</body>
</html>
