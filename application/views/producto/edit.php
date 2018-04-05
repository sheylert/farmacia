<?php 
 $ruta_controller = base_url() . "index.php/producto/update/".$id_medicamento;?>

<div class="page-header">
	<h1>
		Inicio
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Medicamentos
		</small>
	</h1>
</div><!-- /.page-header -->

 <form action="<?php echo $ruta_controller;?>" method="post" enctype="multipart/form-data">

				      <div class="col-xs-12 col-sm-4">

				      	 <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Nombre del Medicamento</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1">Requerido</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
										<input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" required="true" value = "<?=$producto->nombre;?>">
								     </div>	
							     </div>
							  </div>
					    </div>
						
					   
					   <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Descripción</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1">Requerido</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
										<input type="text" class="form-control" placeholder="Descripción" 
										name="descripcion" id="descripcion" required="true" value = "<?=$producto->descripcion;?>">
								     </div>	
							     </div>
							  </div>
					    </div>
					 </div>

					  <div class="col-xs-12 col-sm-4">
				      	 <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Estatus</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1">Requerido</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
										<select class="form-control" id="activo" name="activo">	 
									     <?php if ($producto->activo == 1) {?> 	
									     <option value= 1 selected="true"> Activo </option>
									      <option value= 0> Desactivado </option>
									     <?php } else { ?>
									      <option value= 1 > Activo </option>
									      <option value= 0 selected="true"> Desactivado </option>
									     <?php }?> 
													
						   		        </select>
								     </div>	
							     </div>
							  </div>
					    </div>
					   </div> 

				   <div class="col-xs-12 text-center">

				   	<a class="btn btn-default radius-4" href="<?= base_url().'index.php/producto/listado'; ?>">Volver listado</a>

	   					<button class="btn btn-rose btn-md radius-4">
								<i class="ace-icon fa fa-floppy-o bigger-160"></i>
								Guardar Cambios
						</button>

				   </div>
				   
</form>




			
