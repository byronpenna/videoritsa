<!DOCTYPE html>
<html>
<head>
	<title>Alertas</title>
	<?php
		$this->load->view("parts/head.php");
	?>
</head>
<body>
	<?php $this->load->view("parts/header.php") ?>
	<pre>
		<?php 
			//print_r($activeAlerts);
			$alertLogID = "-1";
			$endDate 	= "";
			if(count($activeAlerts->alertsLogs) > 0){
				$alert 		= $activeAlerts->alertsLogs[0];
				$alertLogID = $alert->_id;
				$endDate 	= $alert->_end_date;
		
			}
			
		?>
	</pre>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
	<script>
		// Set the date we're counting down to
			var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();
			console.log(Date.now());

			//
			var t = new Date();
			console.log("original date",t);
			t.setSeconds(t.getSeconds() + 600);
			console.log("other", t);
			//countDownDate = t;
			
		let y = setInterval(function() {
			
			$.ajax({
			   url:"getAlerts",
			   method:"POST",
			   data:{},
			   success:function(data)
			   {
			   		let obj = jQuery.parseJSON(data);
				   	console.log("data",obj);
			   		if(obj.status && obj.alertsLogs.length > 0){
			   			if(
			   				obj.alertsLogs[0]._id != $(".txtHdAlertID").val()
			   			){
			   				location.reload();
			   			}
			   		}	
			   }
			  });
		}, 5000);
		$(document).ready(function(){
			// Update the count down every 1 second
			if($('.txtHdEndDate').val() != ""){
				let val = $(".txtHdEndDate").val();
				console.log("val",val);
				let myDate = moment(val);
				console.log(myDate);
					//console.log(moment(myDate).format("YYYY-MM-DD HH:mm:ss"));
				let t = myDate.toDate();
				console.log("DATE T-----",t);
				var x = setInterval(function() {
					makeCountDown(t);
				}, 1000);
							
			}	
		})

		

		function makeCountDown(targetDate){
			countDownDate = targetDate;
			// Get today's date and time
		  //var now = moment($('.txtHdNow').val()).toDate() //
		  var now = new Date().getTime();
		    console.log("DATE now",now);
		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;
		  console.log("distance",distance);
		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		    
		  // Output the result in an element with id="demo"
		  //document.getElementById("demo").innerHTML = days + "d " + hours + "h "
		  //+ minutes + "m " + seconds + "s ";
		    

		    console.log(minutes,seconds);
		    $(".spMinutes").empty().append(minutes);
		    $(".spSec").empty().append(seconds);
		    
		  // If the count down is over, write some text 
		  if (distance < 0) {
		    clearInterval(x);
		    console.log()
		    //document.getElementById("demo").innerHTML = "EXPIRED";
		  }
		}

	</script>
	<?php 
		//date_default_timezone_set('UTC-6');
		$datetime = new DateTime();
		$timezone = new DateTimeZone('America/Guatemala');
		$datetime->setTimezone($timezone);
		$txtDateNow = $datetime->format('Y-m-d H:i:s');
	?>
	<div class="container mjs">
		<input type="text" class="txtHdAlertID" value="<?php echo $alertLogID; ?>" >
		<input type="text" class="txtHdEndDate" value="<?php echo $endDate; ?>">
		<input type="text" class="txtHdNow" value="<?php echo $txtDateNow; ?>" name="">
		<div class="col-lg-4">
			<h3> Alerta de corte </h3>
			<h4>
				<span class="spTimer">
					<span class="spMinutes"></span>
					<span class="spSec"></span>
				</span>	
			</h4>
			
		</div>
	</div>
</body>
</html>