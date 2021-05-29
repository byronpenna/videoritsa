<input type="hidden" name="txtHdIdMessage" class="txtHdIdMessage" value="<?php echo $message->_id; ?>">
<div class="container mjs">
	<div class="row" style="text-align: center;">
		<img class="imgIcon" src=<?php echo base_url("content/img/bell.svg") ?> >
	</div>
	<div class="row">
		<div class="row titulo">
			<?php 
				echo $message->_title;
			?>
		</div>
		<div class="row texto">

			<?php 
				echo $message->_message;
			?>
			
		</div>
	</div>
</div>