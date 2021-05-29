<!DOCTYPE html>
<html>
<head>
	<title>Mensajes</title>
	
	<?php
		$this->load->view("parts/head.php");
	?>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("content/css/paginas/welcome/style.css") ?> >
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("content/css/paginas/welcome/media.css") ?> >

	<style type="text/css">
		.btnRecargar{
			padding-top: 2%;
			padding-bottom:2%;
			margin-bottom: 2%;
		}
		.container-btn{
			width: 80%;
			margin: 0 auto;
		}
		.mjs{
			width: 80%;
			margin: 0 auto;
			background: #e7e7e7;
			/*color:white;*/
			margin-top: 2%;
			margin-bottom: 1%;
			border-radius: 15px;
			padding: 2%;
			min-height: 300px;
		}
		.titulo{
			font-size: 2em;
			padding-left: 2%;
		}
		.texto{
			font-size: 1.8em;
			width: 90%;
			margin:0 auto;
		}
		.imgIcon{
			width: 10%;
			margin: 0 auto;
		}
	</style>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on("click",".btnRecargar",function(){
				location.reload();
			})

			let y = setInterval(function() {
				
				$.ajax({
				   url:"getMessages",
				   method:"POST",
				   data:{},
				   success:function(data)
				   {
				   		let currentID = $(".txtHdIdMessage").val();
				   		let obj = jQuery.parseJSON(data);
				   		console.log("current ID",currentID);
				   		//if(currentI)
				   		console.log("current data",data);
				   		if(currentID != obj.message._id){
				   			location.reload();
				   		}
				   }
				  });
			}, 5000);
			// Set the date we're counting down to
			var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();
			console.log(Date.now());
			var t = new Date();
			console.log("original date",t);
			t.setSeconds(t.getSeconds() + 600);
			console.log("other", t);
			countDownDate = t;
			// Update the count down every 1 second
			var x = setInterval(function() {

			  // Get today's date and time
			  var now = new Date().getTime();
			    
			  // Find the distance between now and the count down date
			  var distance = countDownDate - now;
			    
			  // Time calculations for days, hours, minutes and seconds
			  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			  // Output the result in an element with id="demo"
			  //document.getElementById("demo").innerHTML = days + "d " + hours + "h "
			  //+ minutes + "m " + seconds + "s ";
			    

			    /*console.log(minutes,seconds);
			    $(".spMinutes").empty().append(minutes);
			    $(".spSec").empty().append(seconds);*/
			    
			  // If the count down is over, write some text 
			  if (distance < 0) {
			    clearInterval(x);
			    console.log()
			    //document.getElementById("demo").innerHTML = "EXPIRED";
			  }
			}, 1000);
		})
	</script>
</head>
<body>

	<?php 
		$this->load->view("url/live/partial/message_live.php");
	?>
	<!-- <div class="container mjs">
		<div class="col-lg-4">
			<h3> Alerta de corte </h3>
			<h4>
				<span class="spTimer">
					<span class="spMinutes"></span>
					<span class="spSec"></span>
				</span>	
			</h4>
			
		</div>
	</div> -->

	<div class="container container-btn">
		<button class="btn-primary btn btn-block btnRecargar">
			Recargar
		</button>
	</div>
</body>
</html>