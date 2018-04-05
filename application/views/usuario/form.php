<?php 
 $ruta_controller = base_url() . "index.php/usuario/store";?>

<div class="page-header">
	<h1>
		Dashboard
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Configuración
		</small>
	</h1>
</div><!-- /.page-header -->


 <form action="<?php echo $ruta_controller;?>" method="post" enctype="multipart/form-data">

					<div class="col-xs-12 col-sm-4">
						<div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Tipo de Usuario
							</div>	

							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1">Seleccione</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
									<select class="form-control" id="id_permiso" name="id_permiso">
										<?php foreach ($perfil as $row) 
				                        { ?>	 
									<option value=<?php echo $row->id;?>> <?php echo $row->nombre;?> </option>   
										<?php } ?>						
						   		        </select>
								     </div>	
							     </div>
							  </div>
					    </div>

					    <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Login</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1">Requerido</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
										<input type="text" class="form-control" placeholder="Login" name="login" id="login" required="true">
								     </div>	
							     </div>
							  </div>
					    </div>

				     </div>

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


				   <input type="hidden" id="imagen" name="imagen" value="avatar.png">
				   <div class="col-xs-12 text-center">
	   					<button class="btn btn-rose btn-md radius-4">
								<i class="ace-icon fa fa-floppy-o bigger-160"></i>
								Guardar Cambios
						</button>
				   </div>

				   
</form>


<div id="modal_perfil" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Agregar Imagen Perfil</h4>
            </div>
            <form action="<?php echo base_url()?>index.php/perfil/store" class="form-horizontal" id="form_perfil" method="POST">
	           
	            	<div class="form-group">
	            		<div class="modal-body">
					<div class="col-md-12 col-sm-12">
	            		
	            		<?php for ($i = 1; $i <= 11; $i++) { ?>

	            		<img id = "imagen_ciclo" name = "imagen_ciclo" width="50" height="50" alt="50x50" src="<?php echo base_url()?>assets_sistema/images/avatars/avatar<?=$i?>.png" onclick="activate_match(<?=$i?>)"/>
	            	    <?php }?>

	            	</div>
	            </div><!-- fin modal-body -->
	           

	            </div><!-- fin modal-body -->
	            <div class="modal-footer">
	              
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	            </div>
            </form>
        </div><!-- fin modal-content -->
    </div><!-- fin modal-dialog -->
</div> <!-- fin modal -->

			   


			
