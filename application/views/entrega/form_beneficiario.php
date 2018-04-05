<?php 
 $ruta_controller = base_url() . "index.php/entrega/store_beneficiario";?>

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
								<h4 class="widget-title">Titular</h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<label for="form-field-select-1"><?php echo "Cédula Titular: ".$titular->cedula?></label> 
								     </div>

								     <div>
										<label for="form-field-select-1"><?php echo "Nombre: ".$titular->nombres." ".$titular->apellidos?></label>	
								     </div>	

								      <br>

								     <div>
										<label for="form-field-select-1"><?php echo "Cédula Beneficiario: ".$beneficiario->cedula?></label> 
								     </div>

								     <div>
										<label for="form-field-select-1"><?php echo "Nombre: ".$beneficiario->nombres. " ".$beneficiario->apellidos?></label>	
								     </div>	
							     </div>
							  </div>
					    </div>
		  
					 </div>



				      <div class="col-xs-12 col-sm-4">
					  <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Fecha de entrega <span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span></h4>
							</div>	
							 <div class="widget-body">
								 <div class="widget-main">
									<div>
										<input type="date" id="fecha" name="fecha" required="" class="form-control" 
										value="<?=date('Y-m-d') ?>">
								     </div>	
							     </div>
							  </div>
					    </div>
					     </div>
		
				   <div class="col-xs-12 text-center">

				   	    <input type="hidden" id="titulare_id" name="titulare_id" value="<?=$titular->id?>" >
				   	    <input type="hidden" id="beneficiario_id" name="beneficiario_id" value= "<?=$beneficiario->id?>" >

				   	<a class="btn btn-default radius-4" href="<?= base_url().'index.php/entrega'; ?>">Volver listado</a>

	   					<button class="btn btn-rose btn-md radius-4">
								<i class="ace-icon fa fa-floppy-o bigger-160"></i>
								Guardar Cambios
						</button>

				   </div>
				   
</form>




			
