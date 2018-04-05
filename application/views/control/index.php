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
		 <i class="ace-icon fa fa-circle"></i> Asignaciones de Medicamentos Titulares</li>
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
							<a href="<?= base_url().'index.php/control/beneficiario/'.$row->id;?>" class="" title='Carga Familiar' data-tool='tooltip'>
							<img id="imagen_login" width="40" height="40" alt="imagen" src="<?php echo base_url()?>assets_sistema/images/avatars/familia.png"/>
							</a>
						</td>

						<td class="hidden-480">
							<a href="<?= base_url().'index.php/control/asignar_titular/'.$row->id;?>" class="" title='Medicamentos Titular' data-tool='tooltip'>
							<img id="imagen_login" width="40" height="40" alt="imagen" src="<?php echo base_url()?>assets/galerias/iconos/medicamentos.png"/>
							</a>
						</td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>

