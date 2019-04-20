	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-Notifications-area">
						<i class="zmdi zmdi-notifications-none"></i>
						<span class="badge">7</span>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
				<h1 class="text-titles">EGRESOS</small></h1><a target="_blanck" style="padding: 10px;background-color: rgba(42,174,178,1);color: white;font-weight: bold;border: 1px solid #000;border-radius: 5px;" href="<?php base_url();?>pagar" title="">Registrar pago</a>
			</div>
		</div>
		<div class="full-box text-center" style="padding: 30px 10px;">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					<i class="zmdi zmdi-money zmdi-hc-fw"></i> GASTOS ESCOLARES
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-account"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?=$tipo1?></p>

					<!-- boton -->
					<style>
						.btn {
							border: 3px solid black;
							background-color: white;
							color: black;
							padding: 7px 14px;
							font-size: 12px;
							cursor: pointer;
						}

						/* blue */
						.info {
							border-color: #77D349;
							color: green
						}

						.info:hover {
							background: #2196F3;
							color: white;
						}


						.default:hover {
							background: #e7e7e7;

						}
					</style>
					<button class="btn info"> <a href="<?php echo base_url();?>economia/ver_egresos/1" target="New_Blank">ver_informe</a></button>

					<!-- /boton -->
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					<i class="zmdi zmdi-money zmdi-hc-fw"></i> GASTOS DE SECRETARÍA
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-male-alt"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?=$tipo2?></p>

					<!-- boton -->
					<style>
						.btn {
							border: 3px solid black;
							background-color: white;
							color: black;
							padding: 7px 14px;
							font-size: 12px;
							cursor: pointer;
						}

						/* blue */
						.info {
							border-color: #77D349;
							color: green
						}

						.info:hover {
							background: #2196F3;
							color: white;
						}


						.default:hover {
							background: #e7e7e7;

						}
					</style>
					<button class="btn info"> <a href="<?php echo base_url();?>economia/ver_egresos/2" target="New_Blank">ver_informe</a></button>



					<!-- /boton -->
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					<i class="zmdi zmdi-money zmdi-hc-fw"></i> GASTOS DE PROFESORES
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-male-alt"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?=$tipo3?></p>

					<!-- boton -->
					<style>
						.btn {
							border: 3px solid black;
							background-color: white;
							color: black;
							padding: 7px 14px;
							font-size: 12px;
							cursor: pointer;
						}

						/* blue */
						.info {
							border-color: #77D349;
							color: green
						}

						.info:hover {
							background: #2196F3;
							color: white;
						}


						.default:hover {
							background: #e7e7e7;
						}
					</style>
					<button class="btn info"> <a href="<?php echo base_url();?>economia/ver_egresos/3" target="New_Blank">ver_informe</a></button>

					<!-- /boton -->
				</div>
			</article>
			<div class="full-box text-center" style="padding: 30px 10px;">

	</section>