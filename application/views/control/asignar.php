<div class="page-header">
	<h1>
		Dashboard
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Menú
		</small>
	</h1>
</div><!-- /.page-header -->

<?php //print_r ($this->session->userdata('arr_usuarios'));?>
 <div class="row no-gutters">

 		<div class="col-md-1 col-sm-1">
 		</div>	
		
		<div class="col-md-9 col-sm-9">
 		<li class="text-warning bigger-200 orange">
		 <i class="ace-icon fa fa-circle"></i> Asignaciones <?=$nombre_titular; ?> (Titular)</li>
		</div>													
		<div class="col-md-2 col-sm-2">
					<a href="<?= base_url().'index.php/control/titular'?>" class="btn btn-app btn-info">
						<i class="ace-icon fa fa-arrow-circle-left bigger-230"></i>
						Volver
					</a>
	   </div>		
    </div>
		<br/>


  <div class="row no-gutters">
	<div class="col-xs-12">

	<?php  $ruta_controller = base_url() . "index.php/control/store_titular/"?>

 <form action="<?php echo $ruta_controller;?>" method="post" enctype="multipart/form-data">	


 	 <div class="col-xs-12 col-sm-4">
					 <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Asignar Medicamentos
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
	   </div>


	    <div class="col-xs-12 col-sm-1">
					 <div class="widget-box">
							  <button class="">
								<img id="imagen_login" width="50" height="50" alt="imagen" src="<?php echo base_url()?>assets/galerias/iconos/activo.jpeg"/>
						</button>
					    </div>
	   </div>
	
	   	 <input type="hidden" id="titulare_id" name="titulare_id" value="<?=$id_titular?>">
</form>

</div>
</div>


  <div class="row no-gutters">
	<div class="col-xs-12">

		<table class="table table-bordered table-responsive" id="tabla">
			<thead>
				<tr>
					<th class="text-center">Id</th>
					<th class="text-center">Medicamento</th>
					<th class="text-center">Acciones</th>

				</tr>
			</thead>
			<tbody class="text-center">
				<? foreach ($medicamento as $row) 
				{ ?>
					<tr>
						<td class="hidden-480">
						  <?php echo $row->id; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->medicamento; ?>
						</td>
						<td class="hidden-480">
						 <?php 	
						  $label = '<img src="'.base_url().'assets/galerias/iconos/eliminar2.png" alt="Administrador" height="30" title="Eliminar Asignado" data-tool="tooltip" />';
                          echo anchor(site_url('/control/destroy_titular/' .$id_titular.'/'. $row->id), $label, 'onclick="javasciprt: return confirm(\'Esta seguro de eliminar el Medicamento?\')"');

                          ?>
					</td>
					    
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>

