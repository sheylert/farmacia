<?php 
 $ruta_controller = base_url() . "index.php/titular/update_beneficiario/".$id.'/'.$id_titular;?>

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
										<input type="text" class="form-control" placeholder="Cédula" name="cedula" id="cedula" required="true"
										value = "<?=$titular->cedula;?>">
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
										<input type="text" class="form-control" placeholder="Nombre" name="nombres" id="nombres" required="true" 
										value = "<?=$titular->nombres;?>">
								     </div>	
								     <div> <br>
										<input type="text" class="form-control" placeholder="Apellido" name="apellidos" id="apellidos" required="true"
										value = "<?=$titular->apellidos;?>">
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
										 
									    	<?php if ($titular->sexo == "MASCULINO"){?>
									    	 <option value= "MASCULINO" selected="true"> Masculino </option>
									    	 <option value= "FEMENINO"> Femenino </option>   
									    	 <?php }else {?>
									         <option value= "FEMENINO"  selected="true"> Femenino </option> 
									         <option value= "MASCULINO"> Masculino </option> 
									         <?php }?>
															
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
										<label for="form-field-select-1">Requerido </label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
										<input type="date" id="fecha" name="fecha" required="" class="form-control" 
										value=<?php echo $titular->fecha; ?>>
								     </div>	
							     </div>
							  </div>
					    </div>
					 </div>


					   <div class="col-xs-12 col-sm-4">
					 <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Parentesco
							</div>	

							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1">Seleccione</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
									<select class="form-control" id="parentesco_id" name="parentesco_id">
										<?php foreach ($parentesco as $row) 
				                        { 
				                        	if ($titular->parentesco_id ==  $row->id){ ?>

				                        		 <option value=<?php echo $row->id;?> selected="true"> <?php echo $row->nombre;?> </option> 
				                        		
				                        	<?php }else{ ?>

				                        	<option value=<?php echo $row->id;?>> <?php echo $row->nombre;?> </option>   

										<?php } }?>						
						   		        </select>
								     </div>	
							     </div>
							  </div>
					    </div>
					    </div> 

				   <div class="col-xs-12 text-center">

				   		<a class="btn btn-default radius-4" href="<?= base_url().'index.php/titular/beneficiario/'.$id; ?>">Volver listado</a>

	   					<button class="btn btn-rose btn-md radius-4">
								<i class="ace-icon fa fa-floppy-o bigger-160"></i>
								Guardar Cambios
						</button>

				   </div>	   
</form>




			
