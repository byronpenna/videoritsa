<form action="<?php echo site_url("url/saveAnnotation") ?>" method='post'>
	
	<label>Agregar nota</label>
	<textarea class="form-control" name="txtAreaNota"></textarea>
	<input type="hidden" name="txtVideoId" value="<?php echo $videoAnnotation->_video->_id;  ?>">
	<input type="hidden" name="txtVideoURL" value="<?php echo $videoAnnotation->_video->_baseUrl; ?>">
	<button class="btn btn-block btn-success">
		Agregar
	</button>
</form>
<table class="table">
	<thead>
		<tr>
			<th>Mis notas</th>
			<th></th>
		</tr>	
	</thead>
	<tbody>

		<?php 
			/*echo "<pre>";
			print_r($videoAnnotation->annotations);
			echo "</pre>";*/
			if(count($videoAnnotation->annotations) > 0){
				foreach ($videoAnnotation->annotations as $key => $annotation) {
		?>
			<tr>
				<td>
					<?php echo $annotation->_message; ?>
				</td>
				<td>
					<a href="<?php echo site_url("url/deleteAnnotation/".$annotation->_id."/".$videoAnnotation->_video->_baseUrl) ?>">
					Borrar	
					</a>
				</td>
			</tr>
		<?php 
				}
			}else{
				?>
			<tr>
				<td>No information</td>
			</tr>
				<?php 
			}
		?>
	</tbody>
</table>