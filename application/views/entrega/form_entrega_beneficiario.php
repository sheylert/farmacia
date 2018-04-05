<?php 
 $ruta_controller = base_url() . "index.php/entrega/store_entregado_bene";?>

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
								<h4 class="widget-title">Datos de Entrega Titular</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">

								 	<div>
										<label for="form-field-select-1"><?php echo "N° Entrega: ".$entrega->id?></label> 
								     </div>

									<div>
										<label for="form-field-select-1"><?php echo "Cédula: ".$entrega->cedula?></label> 
								     </div>

								     <div>
										<label for="form-field-select-1"><?php echo "Nombre: ".$entrega->nombre. " ".$entrega->apellido?></label>	
								     </div>
								      <div>
										<label for="form-field-select-1"><?php 

											$fechaaux =  date('d/m/Y', strtotime( $entrega->fecha));

										  echo "Fecha Entrega: ".$fechaaux;?></label>	
								     </div>	
							     </div>
							  </div>
						    </div>



						     <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Datos de Entrega Beneficiario</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">

									<div>
										<label for="form-field-select-1"><?php echo "Cédula: ".$entrega->cedulab?></label> 
								     </div>

								     <div>
										<label for="form-field-select-1"><?php echo "Nombre: ".$entrega->nombreb. " ".$entrega->apellidob?></label>	
								     </div>
			
							     </div>
							  </div>
					    </div>




					     <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Medicamentos <span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>	
							</div>	

							 <div class="widget-body">
								 <div class="widget-main">
									<div>
									<select class="form-control" id="producto_id" name="producto_id">
										<?php foreach ($producto as $row) 
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
								<h4 class="widget-title">Cantidad <span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
							</div>	

							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<input type="text" class="form-control" placeholder="Cantidad" name="cantidad" 
										id="cantidad" required="true" onKeyPress="return ValidaSoloNumeros(event)" value = 1>	
								     </div>	
							     </div>
							  </div>
					    </div>
		  
					 </div>



				      <div class="col-xs-12 col-sm-8">

					   		<table class="table table-bordered table-responsive" id="tabla">
			<thead>
				<tr>
					<th class="text-center">Medicamento</th>
					<th class="text-center">Descripción</th>
					<th class="text-center">cantidad</th>
						<th class="text-center">Eliminar</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<? foreach ($entrega_pro as $row) 
				{ ?>
					<tr>
						<td class="hidden-480">
						  <?php echo $row->producto; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->descripcion; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->cantidad; ?>

						<td class="hidden-480">

						<?php 	
						  $label = '<img src="'.base_url().'assets/galerias/iconos/eliminar.png" alt="Administrador" height="30" title="Eliminar Titular" data-tool="tooltip" />';
                          echo anchor(site_url('/entrega/destroy_bene/'.$entrega->id.'/'.$row->id), $label, 'onclick="javasciprt: return confirm(\'Esta seguro de eliminar el Titular?\')"');

                          ?>
							
						</td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>


					   </div>
		
				   <div class="col-xs-12 text-center">

				   	    <input type="hidden" id="entrega_id" name="entrega_id" value="<?=$entrega->id?>" >
			
				   	    
				   	    <a class="btn btn-info radius-4" href="<?= base_url().'index.php/entrega/listado'; ?>">listado</a>

				   	<a class="btn btn-default radius-4" href="<?= base_url().'index.php/entrega'; ?>">Volver listado</a>

	   					<button class="btn btn-rose btn-md radius-4">
								<i class="ace-icon fa fa-floppy-o bigger-160"></i>
								Guardar Cambios
						</button>

				   </div>
				   
</form>




			
