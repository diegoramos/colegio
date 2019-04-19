<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PAGOS</title>
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
	<div class="container"> 
        <div class="row">
            <div class="col-sm-12" align="center">
              <h1 style="color: white"><strong>Registro de Pagos</strong> </h1>
              <div class="mydescription">
              </div>
            </div>
        </div>
            <div class="row">
	<div class="col-sm-6 col-sm-offset-3 myform-cont" >
	    <div class="myform-bottom">
	      <form role="form" action="<?php echo base_url();?>pagos/save_pago" method="post" class="">
	        <div class="form-group">
	            <input type="hidden" name="id_persona" id="id_persona" value="<?=isset($info->id_persona)?$info->id_persona:''?>">
	            <input type="text" REQUIRED name="fecha" placeholder="FECHA..." readonly="" class="form-control" id="fecha" value="<?=isset($info->fecha)?$info->fecha:date('Y-m-d H:i:s')?>">
	        </div>
	        <div class="form-group">
	            <input type="number" max="99999999" REQUIRED name="monto" placeholder="MONTO..." class="form-control" id="monto" value="<?=isset($info->monto)?$info->monto:''?>">
	        </div>
	         <div class="form-group">
	            <input type="email" REQUIRED name="concepto" placeholder="CONCEPTO..." class="form-control" id="concepto" value="<?=isset($info->concepto)?$info->concepto:''?>">
	        </div>
	        <button type="button" class="btn btn-primary">Guardar</button>
	        <input name="action" type="hidden" value="<?php echo isset($_GET['action']) ? $_GET['action']:$action; ?>" /> 
	     </form>
	    </div>
	</div>
	</div>
	</div>
	<div id="main-container">
		<input type="text" id="myInputsecre" onkeyup="myFunction()" placeholder="Busca un nombre.." title="Type in a name">
		<table id="myTablesecre" border='1' B bordercolor='' >
			<thead>
				<tr>
					<th>Fecha</th>
				 	<th>Monto</th>
				 	<th>Concepto</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($pagos as $key => $val) { ?>
			    <tr>
			    	<td><?=$val->fecha?></td>
			    	<td><?=$val->monto?></td>
			    	<td><?=$val->concepto?></td>
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
