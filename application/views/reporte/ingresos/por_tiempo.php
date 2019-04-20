<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?=$titulo?></title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/tabla.css">
</head>

<body bgcolor="#222733">

	<div id="main-container">
		<div class=""  align="center">
			<h4 style="color: white"><?=$titulo?></h4>
		</div>
		<table border='1' B bordercolor=''>
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Apellido</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($alumno as $key => $val) { ?>
				<tr>
					<td><?=$val->codigo?></td>
					<td><?=$val->nombre?></td>
					<td><?=$val->apellido?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
</body>

</html>