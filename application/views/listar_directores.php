<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>USUARIOS_DIRECTORES</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/tabla.css">
	<!--====== Scripts -->

	<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
</head>
<body> 
	<div id="main-container">
		<table border='1' B bordercolor='' >
			<thead>
				<tr>
					<th>Nombre</th>
				 	<th>Apellido</th>
					<th>Usuario</th>
					<th>Contraseña</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($directores as $key => $val) { ?>
			    <tr>
			    	<td><?=$val->nombres?></td>
			    	<td><?=$val->appaterno?></td>
			    	<td><?=$val->usuario?></td>
			    	<td></td><!--<?=$val->password?>-->
			    	<td><a class="btn btn-primary" href="<?php echo base_url(); ?>administration/editar_director/<?=$val->id_persona?>" title="">Edit</a><a class="btn btn-danger" href="<?php echo base_url(); ?>administration/delete_usuario/<?=$val->id_persona?>" title="">Delete</a></td>
			    </tr>
			<?php } ?>
			</tbody>
		</table>
</div>
<script>
		var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" >
	
</script>
</body>
</html>
