<!DOCTYPE html>
<html>
<head>
	<title>Agregar alerta</title>
	<?php
		$this->load->view("parts/head.php");
	?>
</head>
<body>
	<?php $this->load->view("parts/header.php") ?>
	<table class="table">
		<thead>
			<th>ID</th>
			<th>Mensaje</th>
			<th>Mostrar timer</th>
			<th>Duracion</th>
			<th>Severidad</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			<?php 
				foreach ($alerts as $key => $alert) {
			?>
				<tr>
					<td>
						<?php echo $alert->_id; ?>
					</td>
					<td>
						<?php echo $alert->_alertMjs; ?>
					</td>
					<td>
						<?php echo $alert->_withTimer; ?>
					</td>
					<td>
						<?php echo $alert->_duration ?>
					</td>
					<td>
						<?php echo $alert->_severity ?>
					</td>
					<td>
						<a href="<?php echo site_url('Live/launchAlert/'.$alert->_id) ?>">
							Lanzar
						</a>
					</td>
				</tr>
			<?php 
				}
			?>
		</tbody>
	</table>
</body>
</html>