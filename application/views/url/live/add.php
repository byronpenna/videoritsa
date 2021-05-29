<!DOCTYPE html>
<html>
<head>
	<title>Agregar mensaje</title>
	<?php
		$this->load->view("parts/head.php");
	?>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<style type="text/css">
		.texto,.titulo{
			padding-left: 2%;
			margin-bottom: 4%;
		}
		.titulo{
			text-align: center;
			font-size: 2em;
		}
	</style>
</head>
<body>
	<?php $this->load->view("parts/header.php") ?>
	

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	

	<div class="container">
	    <h2 class="text-center">Mensaje en vivo</h2>
		<div class="row justify-content-center">
			<div class="col-12 col-md-8 col-lg-6 pb-5">
	                    <!--Form with header-->
	                    <form action="<?php echo site_url("live/save") ?>" method="post">
	                        <div class="card border-primary rounded-0">
	                            <div class="card-header p-0">
	                                <div class="bg-info text-white text-center py-2">
	                                    <h3><i class="fa fa-envelope"></i></h3>
	                                    <p class="m-0"></p>
	                                </div>
	                            </div>
	                            <div class="card-body p-3">

	                                <!--Body-->
	                                <div class="form-group">
	                                    <div class="input-group mb-2">
	                                        <div class="input-group-prepend">
	                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
	                                        </div>
	                                        <input type="text" class="form-control" id="nombre" name="txtTitle" placeholder="Titulo" required>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <div class="input-group mb-2">
	                                        <div class="input-group-prepend">
	                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
	                                        </div>
	                                        <textarea class="form-control" placeholder="Mensaje" name="txtMessage" required></textarea>
	                                    </div>
	                                </div>

	                                <div class="text-center">
	                                    <input type="submit" value="Enviar" class="btn btn-info btn-block rounded-0 py-2">
	                                </div>
	                            </div>

	                        </div>
	                    </form>
	                    <!--Form with header-->


	                </div>
		</div>

		<h2 class="text-center">Preview de mensaje</h2>
		<div class="row justify-content-center">
			<div class="col-12 col-md-8 col-lg-6 pb-5">
	                    <!--Form with header-->
	                    <form action="<?php echo site_url("live/save") ?>" method="post">
	                        <div class="card border-primary rounded-0">
	                            <div class="card-header p-0">
	                                <div class="bg-info text-white text-center py-2">
	                                    <h3><i class="fab fa-facebook"></i></h3>
	                                    <p class="m-0"></p>
	                                </div>
	                            </div>
	                            <div class="card-body p-3">
	                                <div class="row titulo">
										<div class="col-lg-12">
											<?php 
												echo $message->_title;
											?>	
										</div>
										
									</div>
									<div class="row texto">

										<?php 
											echo $message->_message;
										?>
										
									</div>
	                            </div>

	                        </div>
	                    </form>
	                    <!--Form with header-->


	                </div>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Mensaje</th>
					<th>Mensaje</th>
				</tr>	
			</thead>
			<tbody>
				<?php 
					//print_r($todaysMessages);
				?>
				<?php 
					foreach ($todaysMessages->todaysMessages as $key => $message) {
					
				?>
					<tr>
						<td>
							<?php 
								echo $message->_title
							?>
						</td>
						<td>
							<?php 
								echo $message->_message
							?>
						</td>
						<td>
							<?php 
								if(!$message->_active){
								?>
									<a href="<?php echo site_url("live/activateMessage/".$message->_id) ?>">Activate</a>
								<?php 			
								}
							?>	
						</td>
					</tr>
				<?php
					}
				?>
				
			</tbody>
		</table>

	</div>



</body>
</html>