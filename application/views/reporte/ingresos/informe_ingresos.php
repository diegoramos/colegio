<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>INFORME DE INGRESOS</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/tabla.css">
</head>

<body bgcolor="#222733">

	<div id="main-container">

		<table border='1' B bordercolor=''>
			<thead>
				<tr>
					<th>GRADO / IDENTIFICACION</th>
					<th>MONTO TOTAL</th>
				</tr>
			</thead>
			<tbody>

				<tr>
					<td>Estimulación</td>
					<td>S/. <?=$estimulacion->total!=null?$estimulacion->total:0?></td>
				</tr>
				<tr>
					<td>3 años</td>
					<td>S/. <?=$tres->total!=null?$tres->total:0?></td>
				</tr>
				<tr>
					<td>4 años</td>
					<td>S/. <?=$cuatro->total!=null?$cuatro->total:0?></td>
				</tr>
				<tr>
					<td>5 año</td>
					<td>S/. <?=$cinco->total!=null?$cinco->total:0?></td>
				</tr>
			</tbody>
		</table>

	</div>
</body>

</html>