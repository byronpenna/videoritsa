
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Video section</title>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		
		nav > .nav.nav-tabs{

		  border: none;
		    color:#fff;
		    background:#272e38;
		    border-radius:0;

		}
		nav > div a.nav-item.nav-link,
		nav > div a.nav-item.nav-link.active
		{
		  border: none;
		    padding: 18px 25px;
		    color:#fff;
		    background:#272e38;
		    border-radius:0;
		}

		nav > div a.nav-item.nav-link.active:after
		 {
		  content: "";
		  position: relative;
		  bottom: -60px;
		  left: -10%;
		  border: 15px solid transparent;
		  border-top-color: #e74c3c ;
		}
		.tab-content{
		  background: #fdfdfd;
		    line-height: 25px;
		    border: 1px solid #ddd;
		    border-top:5px solid #e74c3c;
		    border-bottom:5px solid #e74c3c;
		    padding:30px 25px;
		}

		nav > div a.nav-item.nav-link:hover,
		nav > div a.nav-item.nav-link:focus
		{
		  border: none;
		    background: #e74c3c;
		    color:#fff;
		    border-radius:0;
		    transition:background 0.20s linear;
		}


		.frmAddNote{
			margin-left:auto; 
			margin-right: auto;
			margin-top: 1%;
			margin-bottom: 3%;
				
		}
		.video-container {
		 position: relative; padding-bottom: 56.25%; padding-top: 30px; height: 0; overflow: hidden;
		 }

		.video-container iframe, .video-container object, .video-container embed { 
			position: absolute; top: 0; left: 0; width: 100%; height: 100%; 
		}
		.video-container {
		    overflow: hidden;
		    position: relative;
		    width:100%;
		}

		.navbarMenu{
			background: #3b9ad7;
			width: 100%;
		}
		.navbarMenu ul{

			padding-top: 1%;
			padding-bottom: 1%;
		}
		.navbarMenu li{
			display: inline-block;
			width: 30%;

		}
		.navbarMenu ul li a{
			color: white;
		}
		
	</style>
</head>
<body>

	<?php 
		$this->load->view("parts/header.php");
	?>
	<pre>
		<?php
			$user = null; 
			if(isset($_SESSION["user"]) and $_SESSION["user"] != null){
				$user = unserialize($_SESSION["user"]);
			}
		?>
	</pre>
	<div class="container">
		<div class="col-lg-12">
			<div class="video-container" style="margin-bottom: 2%;">
				<iframe 
				src="<?php echo $videoAnnotation->_video->getEmbedURL(); ?>" 
				title="YouTube video player" 
				frameborder="0" 
				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
				allowfullscreen>
				</iframe>
			</div>	
		</div>
		
	</div>

	<div class="container">
      <div class="row" style="margin-bottom: 2%">
        <div class="col-lg-12 col-xs-12 ">
          <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Notas</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Preguntas y respuestas</a>
              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Recursos extras</a>
              <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Post complementarios</a>
            </div>
          </nav>
          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
												
							<?php 
								if($user != null){
									$this->load->view("parts/url/annotations.php");	
								}else{
									$this->load->view("parts/url/please_sign_in.php");
								}
							?>
            </div>
            <div class="tab-pane fade text-center" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" >
            		¡Muy pronto!
            </div>
            <div class="tab-pane fade text-center" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            		¡Muy pronto!
            </div>
            <div class="tab-pane fade text-center" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
            		¡Muy pronto!  
            </div>
          </div>
        
        </div>
      </div>
  </div>
	      

</body>
</html>