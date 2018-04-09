<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="#">Sistema</a>
		</li>

		<li>
			<a href="#">Reportes</a>
		</li>
		<li class="">Entregas</li>
		
	</ul><!-- /.breadcrumb -->					
</div>
<div class="page-header text-center">
	<li class="bigger-200 purple">
	 	<i class="ace-icon fa fa-circle"></i>
	 	<?php echo "Reportes" ?>
	 	<br>
	</li>

</div><!-- /.page-header -->

<div class="row no-gutters">
	<div class="col-md-12 col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h3 class="widget-title">Creación del Reporte</h3>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="row no-gutters">
						<form action="<?= base_url().'index.php/reportes/show_pdf' ?>" class="form-horizontal" id="form_reporte" method="POST">
					
							<div class="form-group">
								<!-- desde y hasta -->	
								<label for="" class="control-label col-md-2 col-sm-2">Desde</label>
								<div class="col-md-4 col-sm-4">
									<input type="date" name="desde" id="desde" class="form-control">
								</div>
								<label for="" class="control-label col-md-2 col-sm-2">Hasta</label>
								<div class="col-md-4 col-sm-4">
									<input type="date" name="hasta" id="hasta" class="form-control">
								</div>
							</div>
							<br/><br/>
							
							<div class="form-group">
								<div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
									<button class="btn btn-pink btn-block">Generar&nbsp;<i class="fa fa-file-pdf-o"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>