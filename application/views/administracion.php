
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
			  <h1 class="text-titles"><?php echo $titulo; ?></small></h1>
			</div>
		</div>
		<div class="full-box text-center" style="padding: 30px 10px;">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Directores
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-account"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?=$directores?></p>
					<small><a href="<?php echo base_url();?>administration/registrar_directores" target="_blank" >Registrar</a></small>
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
				<button class="btn info" > <a href="<?php echo base_url();?>administration/listar_directores" target="_blank" >ver</a></button>

				<!-- /boton -->
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Profesores proximo...
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-male-alt"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">0</p>
					<small>registrar</small>
				<!-- /boton -->
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Secretaria
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-male-alt"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?=$secretaria?></p>
					<small><a href="<?php echo base_url() ?>secretary/registrar_secretaria">Registrar</a></small>
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
				<button class="btn info" > <a href="<?php echo base_url() ?>secretary/listar_secretaria"" target="_blank" >ver</a></button>

				<!-- /boton -->
				</div>
			</article>
            <div class="full-box text-center" style="padding: 30px 10px;">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Inicial
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-face"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?=$alumno1?></p>
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
				<button class="btn info"> <a href="<?php echo base_url() ?>inicial" target="_blank" >ver</a></button>

				<!-- /boton -->
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Primaria
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-face"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?=$alumno2?></p>
					
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
				<button class="btn info" > <a href="<?php echo base_url() ?>primaria" target="_blank" >ver</a></button>

				<!-- /boton -->
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Secundaria
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-face"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?=$alumno3?></p>
					
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
				<button class="btn info"> <a href="<?php echo base_url() ?>secundaria" target="New_Blank" >ver</a></button>
				<!-- /boton -->
				</div>
			</article>
	</section>