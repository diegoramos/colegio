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
              <div class="mydescription" style="color: white">
              </div>
            </div>
        </div>
            <div class="row">
	<div class="col-sm-6 col-sm-offset-3 myform-cont" >
	    <div class="myform-bottom">
	      <form role="form" id="form" action="<?php echo base_url();?>economia/save_pago" method="post" class="">
	        <div class="form-group">
	        	<input type="hidden" name="pago_id" id="pago_id" value="">
	            <input type="text" REQUIRED name="fecha" placeholder="FECHA..." readonly="" class="form-control" id="fecha" value="<?=isset($info->fecha)?$info->fecha:date('Y-m-d H:i:s')?>">
	        </div>
	        <div class="form-group">
	            <input type="number" max="99999999" REQUIRED name="monto" placeholder="S/. 00" class="form-control" id="monto" value="<?=isset($info->monto)?$info->monto:''?>">
	        </div>
	         <div class="form-group">
	            <textarea REQUIRED name="concepto" placeholder="CONCEPTO..." class="form-control" id="concepto" value="<?=isset($info->concepto)?$info->concepto:''?>"></textarea>
	        </div>
	        <div class="form-group">
	            <select name="tipo_pago" id="tipo_pago" REQUIRED class="form-control">
	            	<option value="">Elejir tipo</option>
	            	<option value="1">Escolares</option>
	            	<option value="2">Secretaria</option>
	            	<option value="3">Profesores</option>
	            </select>
	        </div>
	        <button type="submit" id="btnsave" class="btn btn-primary">Guardar</button>
	        <input name="action" type="hidden" value="<?php echo isset($_GET['action']) ? $_GET['action']:$action;; ?>" /> 
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
				 	<td>Tipo</td>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($pagos as $key => $val) { ?>
			    <tr class="row<?=$val->pago_id?>">
			    	<td><?=$val->fecha?></td>
			    	<td><?=$val->monto?></td>
			    	<td><?=$val->concepto?></td>
			    	<td><?php if($val->tipo_pago=='1'){ echo "Escolares";}else if($val->tipo_pago=='2'){ echo "Secretaria";}else if($val->tipo_pago=='3'){ echo "Profesores"; }else{ } ?></td>
			    	<td><button type="button" class="btn btn-primary" onclick="editar('<?=$val->pago_id?>');">Edit</button><button type="button" class="btn btn-danger" onclick="eliminar('<?=$val->pago_id?>');" >Delete</button></td>
			    </tr>
			<?php } ?> 
			</tbody>
		</table>
</div>
<script>
	var base_url = "<?php echo base_url(); ?>";

	function editar(id){
		$.ajax({
			url: base_url+'economia/edit/'+id,
			type: 'POST',
			dataType: 'json',
			data: {},
		})
		.done(function(data) {
			if (data!=null) {
				$('input[name="pago_id"]').val(data.pago_id);
				$('input[name="fecha"]').val(data.fecha);
				$('input[name="monto"]').val(data.monto);
				$('select[name="tipo_pago"]').val(data.tipo_pago);
				$('textarea[name="concepto"]').val(data.concepto);
				$('input[name="action"]').val('update');
				$("#btnsave").text('Actualizar');
			}else{
				alert("Error al traer datos");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
	function eliminar(id){
		$.ajax({
			url: base_url+'economia/delete_pago/'+id,
			type: 'POST',
			dataType: 'json',
			data: {},
		})
		.done(function(data) {
			if (data) {
				$(".row"+id).remove();
			}else{
				alert("Error al traer datos");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	/*
	Filtrado de datos
	**/
	function myFunction() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInputsecre");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTablesecre");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[2];
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
