			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="<?php echo base_url();?>home">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
					</a>
				</li>
				<?php foreach ($allowed_modules->result() as $key => $val) {  ?>
					<li>
						<a href="<?php echo $val->module_id != 'economia'? base_url().$val->module_id:'#!';?>" class="btn-sideBar-SubMenu">
							<i class="<?php echo $val->icon; ?>"></i> <?php echo traducir('module_'.$val->module_id); ?> <?php if ($val->module_id == 'economia') { ?> <i class="zmdi zmdi-caret-down pull-right"></i> <?php } ?>
						</a>
						<?php if ($val->module_id == 'economia') { ?>
						<ul class="list-unstyled full-box">
							
								<li>
									<a href="period.html"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> INGRESOS</a>
								</li>
								<li>
									<a href="subject.html"><i class="zmdi zmdi-book zmdi-hc-fw"></i> EGRESOS</a>
								</li>
						</ul>
						<?php } ?>
					</li>

				<?php } ?>
			</ul>
			
		</div>
	</section>