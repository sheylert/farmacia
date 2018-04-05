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
		 <i class="ace-icon fa fa-circle"></i>Usuarios Todos</li>
		</div>
																
			<div class="col-sm-2 col-md-2">				
					<a href="<?= base_url().'index.php/usuario/create'?>" class="btn btn-app btn-success">
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
					<th class="text-center">Cédula</th>
					<th class="text-center">Apellido</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Usuario</th>
					<th class="text-center">Permiso</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<? foreach ($usuario as $row) 
				{ ?>
					<tr>
						<td class="hidden-480">
						  <?php echo $row->id; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->cedula; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->apellido; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->nombre; ?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->login; ?>
						</td>
						
						<td class="hidden-480">
						  <?php echo $row->permiso; ?>
						</td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>

