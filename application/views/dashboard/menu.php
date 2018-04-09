
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Sistema de control de asignación de medicamentos
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url().'assets_sistema/images/avatars/avatar1.png'?>" alt="foto" />
								<span class="user-info">
									<small><?php echo $this->session->userdata('apellido_usuario')." ". $this->session->userdata('nombre_usuario')  ?></small>
									Usuario
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li class="divider"></li>

								<li>
									    <a href="<?php echo base_url() ?>index.php/login/salir"> 
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
			
	        
		     		<ul class="nav nav-list">
						<li class="active">
							<a href="<?php echo base_url().'index.php/dashboard/';?>">
								<i class="menu-icon fa fa-tachometer"></i>
								<span class="menu-text"> Inicio </span>
							</a>

							<b class="arrow"></b>
						</li>

						<?php if ($this->session->userdata('id_permiso') == 1) { ?>

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-desktop"></i>
									<span class="menu-text">
										Afiliados
									</span>

									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

							    <ul class="submenu">
							     <li class="">
								<a href="<?php echo base_url().'index.php/titular/listado'?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Titulares
								  </a>
								   <b class="arrow"></b>
								   </li>
								
							   </ul> 

							</li>
						<?php } ?>


					<?php if (($this->session->userdata('id_permiso') == 1) or ($this->session->userdata('id_permiso') == 2)){ ?>

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-eye"></i>
									<span class="menu-text">
										Control
									</span>

									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

							    <ul class="submenu">
							     <li class="">
								<a href="<?php echo base_url().'index.php/control/titular';?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Asignar Medicamentos
								  </a>
								   <b class="arrow"></b>
								   </li>
								     <li class="">
								<a href="<?php echo base_url().'index.php/control/buscar';?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Buscar
								  </a>
								   <b class="arrow"></b>
								   </li>
							   </ul> 
							</li>

							<li>
							<a href="<?php echo base_url().'index.php/Reportes/plantilla';?>">
								<i class="menu-icon fa fa-book"></i>
								<span class="menu-text"> Reportes </span>
							</a>

							<b class="arrow"></b>
						</li>

						<?php } ?>


				     <?php if ($this->session->userdata('id_permiso') == 2) { ?>

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-flask"></i>
									<span class="menu-text">
										Medicamentos
									</span>

									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

							    <ul class="submenu">
							     <li class="">
								<a href="<?php echo base_url().'index.php/producto/listado';?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Inventario
								  </a>
								   <b class="arrow"></b>
								   </li>
							   </ul> 

							</li>


							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-desktop"></i>
									<span class="menu-text">
										Entrega
									</span>

									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

							    <ul class="submenu">
							     <li class="">
								 <a href="<?php echo base_url().'index.php/entrega/listado';?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Consultar
								  </a>
								   <b class="arrow"></b>
								   </li>
								     <li class="">
								 <a href="<?php echo base_url().'index.php/entrega';?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Registrar
								  </a>
								   <b class="arrow"></b>
								   </li>
							   </ul> 

							</li>


								<li>
							<a href="<?php echo base_url().'index.php/Reportes/plantilla';?>">
								<i class="menu-icon fa fa-book"></i>
								<span class="menu-text"> Reportes </span>
							</a>

							<b class="arrow"></b>
						</li>

						<?php } ?>		


							<?php if ($this->session->userdata('id_permiso') == 3) { ?>

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-desktop"></i>
									<span class="menu-text">
										Soporte
									</span>

									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

							    <ul class="submenu">
							     <li class="">
								 <a href="<?php echo base_url().'index.php/usuario/listado'?>">
									<i class="menu-icon fa fa-users"></i>
									Usuarios
								  </a>
								   <b class="arrow"></b>
								   </li>
								     <li class="">
								 <a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									Config
								  </a>
								   <b class="arrow"></b>
								   </li>
							   </ul> 

							</li>
						<?php } ?>



					<ul>
		     			
			</div>

            <div class="main-content">
				<div class="main-content-inner">