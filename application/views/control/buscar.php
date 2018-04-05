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
		 <i class="ace-icon fa fa-circle"></i> Buscar</li>
		</div>													
		<div class="col-md-2 col-sm-2">
	   </div>		
    </div>
		<br/>


  <div class="row no-gutters">
	<div class="col-xs-12">

	<?php  $ruta_controller = base_url() . "index.php/control/buscar/0"?>

 <form action="<?php echo $ruta_controller;?>" method="post" enctype="multipart/form-data">	


 	 <div class="col-xs-12 col-sm-4">
					 <div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">Medicamentos
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
					<th class="text-center">Medicamento</th>
					<th class="text-center">C.I. Titular</th>
					<th class="text-center">Titular</th>
					<th class="text-center">C.I. Beneficiario</th>
					<th class="text-center">Beneficiario</th>
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
						  <?php echo $row->cedulatitular;?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->nombretitular.' '.$row->apellidotitular;?>
						</td>
						<td class="hidden-480">
						  <?php echo $row->cedulabene;?>
						</td>
						<td class="hidden-480">
						   <?php echo $row->nombrebene.' '.$row->apellidobene;?>
						</td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>
<?php }?>

