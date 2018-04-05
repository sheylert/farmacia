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
		 <i class="ace-icon fa fa-circle"></i> Entregas de Medicamentos</li>
		</div>
																
			<div class="col-sm-2 col-md-2">				
					<img id="imagen_login" width="70" height="70" alt="imagen" src="<?php echo base_url()?>assets/galerias/iconos/salud.png"/>
		</div>	
    </div>
		<br/>
  <div class="row no-gutters">
	<div class="col-xs-12">

		<table class="table table-bordered table-responsive" id="tabla">
			<thead>
				<tr>
					<th class="text-center">Nro Entrega</th>
					<th class="text-center">Cédula titula</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Apellido</th>

					<th class="text-center">Cédula Beneficiario</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Apellido</th>
					
					<th class="text-center">Fecha Entrega</th>
					<th class="text-center">Acciones</th>

				</tr>
			</thead>
			<tbody class="text-center">
				<? foreach ($producto as $row) 
				{ ?>
					<tr>
						<td class="hidden-480">
						  <?php echo $row->id; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->cedula; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->nombre; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->apellido; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->cedulab; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->nombreb; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->apellidob; ?>
						</td>
						<td class="hidden-480">
						  <?php 

											$fechaaux =  date('d/m/Y', strtotime( $row->fecha));

										  echo $fechaaux;?>
						</td>
						<?php if ($row->beneficiario_id == 0){ ?>

						<td class="hidden-480">
							<a href="<?= base_url().'index.php/entrega/entrega_producto/'.$row->id;?>" class="" title='Medicamentos Beneficiario' data-tool='tooltip'>
							<img id="imagen_login" width="40" height="40" alt="imagen" src="<?php echo base_url()?>assets/galerias/iconos/buscar.png"/>
							</a>
						</td>
					

						<?php }else { ?>


						<td class="hidden-480">
							<a href="<?= base_url().'index.php/entrega/entrega_producto_beneficiario/'.$row->id;?>" class="" title='Medicamentos Beneficiario' data-tool='tooltip'>
							<img id="imagen_login" width="40" height="40" alt="imagen" src="<?php echo base_url()?>assets/galerias/iconos/buscar.png"/>
							</a>
						</td>

						<?php } ?>
					
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>

