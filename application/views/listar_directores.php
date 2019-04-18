<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>USUARIOS_DIRECTORES</title>

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
					<th>Nombre</th>
				 	<th>Apellido</th>
					<th>Usuario</th>
					<th>Contraseña</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				/*while($row = $result->fetch_assoc()) {
					print ("<tr>");
				 	print ("<td>". $row["NOMBRE"]. "</td>");
				 	print ("<td> ". $row["APELLIDO"]. "</td>");
					print ("<td> ". $row["USUARIO"]. "</td>");
					print ("<td> ". $row["CONTRASENA"]. "</td>");
					
					

				 print ("</tr>");
			        //echo "NOMBRE: " . $row["NOMBRE"]. " - APELLIDO: " . $row["APELLIDO"]. " " "<br>";
			    }*/ ?>
			</tbody>
		</table>
		<?php

$sql = "SELECT * FROM usuarios_directores";

?>
</div>
</body>
</html>
