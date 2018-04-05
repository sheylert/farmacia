<?php 
 $ruta_controller = base_url() . "index.php/titular/store";?>

<div class="page-header">
	<h1>
		Inicio
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Titulares
		</small>
	</h1>
</div><!-- /.page-header -->


 <form action="<?php echo $ruta_controller;?>" method="post" enctype="multipart/form-data">

				      <div class="col-xs-12 col-sm-4">

				      	 <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Cédula</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1">Requerido</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
										<input type="text" class="form-control" placeholder="Cédula" name="cedula" id="cedula" required="true">
								     </div>	
							     </div>
							  </div>
					    </div>
						
					   
					   <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Nombre y Apellido</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1">Requerido</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
										<input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" required="true">
								     </div>	
								     <div> <br>
										<input type="text" class="form-control" placeholder="Apellido" name="apellido" id="apellido" required="true">
								     </div>	
							     </div>
							  </div>
					    </div>
					 </div>

				    <div class="col-xs-12 col-sm-4">

				      	 <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">sexo</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1">Requerido</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
										<select class="form-control" id="sexo" name="sexo">
										 
									    <option value= "MASCULINO" selected="true"> Masculino </option> 
									     <option value= "FEMENINO"> Femenino </option>  
															
						   		        </select>
								     </div>	
							     </div>
							  </div>
					    </div>
											   
					   <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Fecha de nacimiento</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1">Requerido</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
										<input type="date" id="fecha" name="fecha" required="" class="form-control" 
										value="<?=date('Y-m-d') ?>">
								     </div>	
							     </div>
							  </div>
					    </div>
					 </div>


				   <input type="hidden" id="imagen" name="imagen" value="avatar.png">
				  


				   <div class="col-xs-12 text-center">

				   		<a class="btn btn-default radius-4" href="<?= base_url().'index.php/titular/listado'; ?>">Volver listado</a>

	   					<button class="btn btn-rose btn-md radius-4">
								<i class="ace-icon fa fa-floppy-o bigger-160"></i>
								Guardar Cambios
						</button>


							
						
				   </div>

				   
</form>




			
