<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>USUARIOS_SECRETARIA</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/tabla.css">
	<style>
		#myInputestimula {
		  background-image: url('/css/searchicon.png');
		  background-position: 10px 10px;
		  background-repeat: no-repeat;
		  width: 100%;
		  font-size: 16px;
		  padding: 12px 20px 12px 40px;
		  border: 1px solid #ddd;
		  margin-bottom: 12px;
		}
	</style>
</head>

<body bgcolor="#222733">
<!DOCTYPE html> 

<html> 
<body> 
	<div id="main-container">
		<input type="text" id="myInputestimula" onkeyup="myFunction()" placeholder="Busca un nombre.." title="Type in a name">
		<table id="myTableestimula" border='1' B bordercolor='' >
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
				 	<th>Apellido</th>
					<th>Ceular</th>
					<th>Foto</th>
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
						<?php if ($val->filename == ''){ ?>
						<td><img src="<?php echo base_url() ?>uploads/people.png"  width="50" height="50"></td>
						<?php }else{?>
						<td><img src="<?php echo base_url() ?>uploads/<?=$val->filename?>"  width="50" height="50"></td>
						<?php } ?>
						<td><a class="btn btn-success" href="<?php echo base_url();?>inicial/edit/<?=$val->alumno_id?>" title="">Edit</a><a class="btn btn-danger" href="<?php echo base_url();?>inicial/delete/<?=$val->alumno_id?>" title="">Delete</a><a class="btn btn-primary" href="<?php echo base_url();?>pagos/pagar/<?=$val->alumno_id?>" title="">Pagar</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
</div>
<script>
	function myFunction() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInputestimula");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTableestimula");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[1];
	    if (td) {
	      txtValue = td.textContent || td.innerText;
	      if (txtValue.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    }       
	  }
	}
</script>
</body>
</html>
