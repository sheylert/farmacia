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
		
		<div class="col-md-8 col-sm-8">
 		<li class="text-warning bigger-200 orange">
		 <i class="ace-icon fa fa-circle"></i> Beneficiarios de <?=$nombre_titular; ?></li>
		</div>
																
			<div class="col-md-3 col-sm-3">			
					<a href="<?= base_url().'index.php/titular/listado'?>" class="btn btn-app btn-info">
						<i class="ace-icon fa fa-arrow-circle-left bigger-230"></i>
						Volver
					</a>
				<a href="<?= base_url().'index.php/titular/create_beneficiario/'.$id_titular?>" class="btn btn-app btn-success">
						<i class="ace-icon fa fa-fire bigger-230"></i>
						Nuevo
					</a>
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
					<th class="text-center">Parentesco</th>
					<th class="text-center">Acciones</th>

				</tr>
			</thead>
			<tbody class="text-center">
				<? foreach ($beneficiario as $row) 
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
						       <?php echo $row->parentesco; ?>
						</td>
							<td class="hidden-480">
							<a href="<?= base_url().'index.php/titular/editar_beneficiario/'.$id_titular.'/'.$row->id;?>" class="" title='Editar Beneficiario' data-tool='tooltip'>
							<img id="imagen_login" width="30" height="30" alt="imagen" src="<?php echo base_url()?>assets/galerias/iconos/editar.png"/>
							</a>

						  <?php 	
						  $label = '<img src="'.base_url().'assets/galerias/iconos/eliminar.png" alt="Administrador" height="30" title="Eliminar Titular" data-tool="tooltip" />';
                          echo anchor(site_url('/titular/destroy_beneficiario/'.$id_titular.'/'.$row->id), $label, 'onclick="javasciprt: return confirm(\'Esta seguro de eliminar el Titular?\')"');

                          ?>
							
						</td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>

