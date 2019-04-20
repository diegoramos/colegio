<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Informe de gastos escolares</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/tabla.css">
</head>
<body bgcolor="#222733">
	
	<div id="main-container">
		<div align="center">
		<h3 style="color: white"><?=$titulo?></h3>
	</div>
		<table border='1' B bordercolor=''>
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Monto</th>
					<th>Concepto</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($info as $key => $val) { ?>
					<tr>
						<td><?=$val->fecha?></td>
						<td><?=$val->monto?></td>
						<td><?=$val->concepto?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>     
	</div>
</body>
</html>
