
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
		 <i class="ace-icon fa fa-circle"></i> Buscar Titular</li>
		</div>													
		<div class="col-md-2 col-sm-2">
	   </div>		
    </div>
		<br/>


  <div class="row no-gutters">
	<div class="col-xs-12">

	<?php  $ruta_controller = base_url() . "index.php/entrega/index/0"?>

 <form action="<?php echo $ruta_controller;?>" method="post" enctype="multipart/form-data">	


 	 <div class="col-xs-12 col-sm-4">
					 <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Cedula Titular
							</div>	

							 <div class="widget-body">
								 <div class="widget-main">
									<div>

										<label for="form-field-select-1">Requerido</label>
										<span class="badge badge-transparent">
											<i class="light-red ace-icon fa fa-asterisk"></i>
										</span>
										<input type="text" class="form-control" placeholder="Cédula" name="cedula" id="cedula" required="true" onKeyPress="return ValidaSoloNumeros(event)">	
								     </div>	
							     </div>
							  </div>
					    </div>
	   </div>


	    <div class="col-xs-12 col-sm-1">
					 <div class="widget-box">
							  <button class="">
								<img id="imagen_login" width="50" height="50" alt="imagen" src="<?php echo base_url()?>assets/galerias/iconos/buscar.png"/>
						</button>
					    </div>
	   </div>
</form>

</div>
</div>


 
  <?php if ($sw <> 1){ ?>	

 <div class="row no-gutters">
	<div class="col-xs-12">

		<table class="table table-bordered table-responsive" id="tabla">
			<thead>
				<tr>
					<th class="text-center">Id</th>
					<th class="text-center">Cédula</th>
					<th class="text-center">Apellido</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Sexo</th>
					<th class="text-center">Fecha Nac.</th>
					<th class="text-center">Beneficiarios</th>
					<th class="text-center">Acciones</th>

				</tr>
			</thead>
			<tbody class="text-center">
				<? foreach ($titular as $row) 
				{ ?>
					<tr>
						<td class="hidden-480">
						  <?php echo $row->id; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->cedula; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->apellidos; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->nombres; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->sexo; ?>
						</td>
						<td class="hidden-480">
						  <?php
						        echo date('d/m/Y', strtotime($row->fecha)); ?>
						</td>
						<td class="hidden-480">
							<a href="<?= base_url().'index.php/entrega/beneficiario/'.$row->id;?>" class="" title='Carga Familiar' data-tool='tooltip'>
							<img id="imagen_login" width="40" height="40" alt="imagen" src="<?php echo base_url()?>assets_sistema/images/avatars/familia.png"/>
							</a>
						</td>

						<td class="hidden-480">
							<a href="<?= base_url().'index.php/entrega/entrega_titular/'.$row->id;?>" class="" title='Entrega Titular' data-tool='tooltip'>
							<img id="imagen_login" width="40" height="40" alt="imagen" src="<?php echo base_url()?>assets/galerias/iconos/nueva.png"/>
							</a>
						</td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>

<?php }?>

