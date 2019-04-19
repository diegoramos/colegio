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
				<tr>
				<td>". $row["NOMBRE"]. "</td>
				<td> ". $row["APELLIDO"]. "</td>
				<td> ". $row["USUARIO"]. "</td>
				<td> ". $row["CONTRASENA"]. "</td>
				<td><button type="button" class="btn btn-primary">Editar</button><button type="button" class="btn btn-danger">Eliminar</button><button type="button" class="btn btn-info">Pagar</button></td>
				</tr>
			</tbody>
		</table>
</div>
</body>
</html>
