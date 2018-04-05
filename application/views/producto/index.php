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
		 <i class="ace-icon fa fa-circle"></i> Inventario de Medicamentos</li>
		</div>
																
			<div class="col-sm-2 col-md-2">				
					<a href="<?= base_url().'index.php/producto/create'?>" class="btn btn-app btn-success">
						<i class="ace-icon fa fa-fire bigger-230"></i>
						Nuevo&nbsp;
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
					<th class="text-center">Nombre</th>
					<th class="text-center">Descripción</th>
					<th class="text-center">estatus</th>
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
						  <?php echo $row->nombre; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->descripcion; ?>
						</td>
						<td class="hidden-480">
						  <?php if ($row->activo == 1){echo "Activo";}else {echo "Desactivado";} ?>
						</td>
						<td class="hidden-480">
							<a href="<?= base_url().'index.php/producto/editar/'.$row->id;?>" class="" title='Editar Medicamento' data-tool='tooltip'>
							<img id="imagen_login" width="30" height="30" alt="imagen" src="<?php echo base_url()?>assets/galerias/iconos/editar2.png"/>
							</a>

						  <?php 	
						  $label = '<img src="'.base_url().'assets/galerias/iconos/eliminar2.png" alt="Administrador" height="30" title="Eliminar Titular" data-tool="tooltip" />';
                          echo anchor(site_url('/producto/destroy/' . $row->id), $label, 'onclick="javasciprt: return confirm(\'Esta seguro de eliminar el Medicamento?\')"');

                          ?>
							
						</td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>

