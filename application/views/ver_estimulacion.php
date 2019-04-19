<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>USUARIOS_SECRETARIA</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/tabla.css">
</head>

<body bgcolor="#222733">
<!DOCTYPE html> 

<html> 
<body> 
	<div id="main-container">
		<table border='1' B bordercolor='' >
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
				 	<th>Apellido</th>
					<th>Ceular</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($info as $key => $val) {  ?>
					<tr>
						<td><?=$val->codigo?></td>
						<td><?=$val->nombre?></td>
						<td><?=$val->apellido?></td>
						<td><?=$val->telefono?></td>
						<td><a class="btn btn-success" href="<?php echo base_url();?>inicial/edit/<?=$val->alumno_id?>" title="">Edit</a><a class="btn btn-danger" href="<?php echo base_url();?>inicial/delete/<?=$val->alumno_id?>" title="">Delete</a><a class="btn btn-primary" href="<?php echo base_url();?>inicial/pagar/<?=$val->alumno_id?>" title="">Pagar</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
</div>
</body>
</html>
