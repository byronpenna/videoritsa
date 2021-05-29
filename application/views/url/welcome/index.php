<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php
		$this->load->view("parts/head.php");
	?>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("content/css/paginas/welcome/style.css") ?> >
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("content/css/paginas/welcome/media.css") ?> >
</head>
<body>
	<style type="text/css">
		.imgLogo{
			width: 80%;
			margin: 0 auto;
		}
		.divImgLogin{
			text-align: center;
		}
	</style>
	<div class = "container">
		<div class="wrapper">
			<form action=<?php echo site_url("welcome/login") ?> method="post" name="Login_Form" class="form-signin">       
			    <!-- <h3 class="form-signin-heading">Movimiento libertad</h3> -->
			       <div class="divImgLogin">
			       	<img class="imgLogo" src=<?php echo "'".base_url("content/img/logo.png")."'"  ?> >
			       </div>
			    	
				  <hr class="colorgraph"><br>
				  
				  <input type="text" class="form-control" name="Username" placeholder="Username" required="" autofocus="" />
				  <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>     		  
				 
				  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  			
			</form>			
		</div>
	</div>
	<?php
		$this->load->view("parts/scripts.php");
	?>
</body>

</html>