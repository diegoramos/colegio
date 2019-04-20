<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Intranet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/csicomoon.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/complementos/css.face/simplegrid.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/complementos/css.face/animate.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/complementos/css.face/styles.css">

	<link rel="stylesheet" type="text/css" href="css/jquery.fullPage.css" />
</head>
<body>
	<nav class="navbar navbar-fixed-top" role="navigation">
		<ul class="material-navbar">
			<li class="left">
			</li>
			<li class="center"  style="font-size:45px">Colegio Pitagoras</li>
			<li class="right"></li>
		</ul>
		<ul class="material-navbar-collapsed">
			<li class="left"></li>
			<li class="center"><p><img src="<?php echo base_url();?>assets/img/pitagoras.png" width="250" height="600"></p></li>
			<li class="right"></li>
		</ul>
	</nav>
	<div class="padre">
		<div class="main">
			<div class="col-1-3 content animated fadeInLeft section ">
				<div class="texto">
					<img class="icono" src="<?php echo base_url();?>assets/img/profesor.png">
					<h2 class="title">Administrador
						<!--<span>orientation for each student</span>-->
					</h2>
					<p align="left">
							Configuración del sistema
					</p>
					<a href="<?php echo base_url();?>login" class="btn-custom">INGRESAR</a>
				</div>
			</div>
			<div class="col-1-3 content animated fadeInLeft section ">
				<div class="texto">
					<img class="icono" src="<?php echo base_url();?>assets/img/estudiante.png" >
					<h2 class="title">Secretaría
						<!--<span>orientation for each student</span>-->
					</h2>
					<p>
						Cuentas y pagos
					</p>
					<a href="<?php echo base_url();?>login" class="btn-custom">INGRESAR</a>
				</div>
			</div>
			<div class="col-1-3 content animated fadeInLeft section ">
				<div class="texto">
					<img class="icono" src="<?php echo base_url();?>assets/img/director.png" height="500">
					<h2 class="title">Directores
						<!--<span>orientation for each student</span>-->
					</h2>
					<p>
						Administrativo y recursos
					</p>
					
					<a href="<?php echo base_url();?>login" class="btn-custom">INGRESAR</a>
				</div>
			</div>
		</div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var prev = 0;
			var $window = $(window);
			var nav = $('.navbar');

			$window.on('scroll', function(){
				var scrollTop = $window.scrollTop();
				console.log(scrollTop);
				nav.toggleClass('hidden', scrollTop > prev && scrollTop > 73);
				prev = scrollTop;
			});
		});
</script>
</body>
</html>