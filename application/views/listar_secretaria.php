<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>USUARIOS_SECRETARIA</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/tabla.css">
	<!--====== Scripts -->
	
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
	<style>
		#myInputsecre {
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
<body> 
	<div id="main-container">
		<input type="text" id="myInputsecre" onkeyup="myFunction()" placeholder="Busca un nombre.." title="Type in a name">
		<table id="myTablesecre" border='1' B bordercolor='' >
			<thead>
				<tr>
					<th>Nombre</th>
				 	<th>Apellido</th>
				 	<th>Dni</th>
					<th>Usuario</th>
					<th>Contraseña</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($secretaria as $key => $val) { ?>
			    <tr>
			    	<td><?=$val->nombres?></td>
			    	<td><?=$val->appaterno?></td>
			    	<td><?=$val->dni?></td>
			    	<td><?=$val->usuario?></td>
			    	<td></td><!--<?=$val->password?>-->
			    	<td><a class="btn btn-primary" href="<?php echo base_url(); ?>secretary/editar_secretaria/<?=$val->id_persona?>" title="">Edit</a><a class="btn btn-danger" href="<?php echo base_url(); ?>secretary/delete_secretaria/<?=$val->id_persona?>" title="">Delete</a></td>
			    </tr>
			<?php } ?>
			</tbody>
		</table>
</div>
<script>
		var base_url = "<?php echo base_url(); ?>";
</script>
<script>
	function myFunction() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInputsecre");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTablesecre");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
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
