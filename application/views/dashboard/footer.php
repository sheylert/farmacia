 </div>			
			</div><!-- /.main-content -->

<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">S.C.A.M.F.U.P.E.L
						</span>
						&nbsp; &nbsp;
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<script src="<?= base_url('assets_sistema/js/jquery-2.1.4.min.js') ?>"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) 
				document.write("<script src='<?= base_url('assets_sistema/js/jquery.mobile.custom.min.js')?>'>"+"<"+"/script>");
		</script>
		

		<script src="<?= base_url('assets_sistema/js/bootstrap.min.js') ?>"></script>

		<script src="<?= base_url('assets_sistema/js/chosen.jquery.min.js') ?>"></script>

		<!-- page specific plugin scripts -->
		  <script src="<?= base_url('assets_sistema/js/jquery.colorbox.min.js') ?>"></script>

		<!-- ace scripts -->
		<script src="<?= base_url('assets_sistema/js/ace-elements.min.js') ?>"></script>
		<script src="<?= base_url('assets_sistema/js/ace.min.js') ?>"></script>
		<script src="<?= base_url('assets_sistema/js/bootstrap-datepicker.min.js') ?>"></script>
		<!-- ace settings handler -->
		<script src="<?php echo base_url()?>assets_sistema/js/ace-extra.min.js"></script>
		<script src="<?php echo base_url()?>assets_sistema/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url()?>assets_sistema/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?= base_url().'assets_sistema/js/jquery.maskedinput.min.js' ?>"></script>
		<script src="<?php echo base_url()?>assets_sistema/js/toastr.min.js"></script>

		<!-- inline scripts related to this page -->

<!-- page specific plugin scripts -->
      
	
		<!-- inline scripts related to this page -->
		<script type="text/javascript">

			 // ======================= | ValidaSoloNumeros | ============================== //
		  
			 function ValidaSoloNumeros(evt) {

				    evt = (evt) ? evt : window.event

				    var charCode = (evt.which) ? evt.which : evt.keyCode

				    if (charCode > 31 && (charCode < 48 || charCode > 57)) {

				        status = "Solo numeros"

				        return false

				    }

				    status = ""

				    return true

				}

			 // ======================= | ValidaSoloNumeros | ============================== //
		  	

			jQuery(function($) { 
			
			// ======================= | FUNCIONES PARA TODO EL SISTEMA | ============================== //

				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');

				$('#tabla').dataTable({
					"order": [],
					"language": {url: "<?= base_url().'assets_sistema/json/esp.json' ?>"}
				})

    			$('[data-tool="tooltip"]').tooltip()

    			$('.fecha').datepicker({
    				format: 'dd-mm-yyyy',
    				autoClose: true,
    				language: 'es'
    			})

    			let type = '<?= $this->session->flashdata("type") ?>'

    			if(type)
    			{
    				let message = '<?= $this->session->flashdata("message") ?>'

    				
    				switch (type) {
    					case 'success':
    						toastr.success(message, 'Éxito!')
    					break;
    					case 'alert':
    						toastr.alert(message, 'Alerta!')
    					break;
    					case 'danger':
    						toastr.error(message, 'Error!')
    					break;
    				}
    				
    			}

    			// ======================= | FUNCIONES PARA PLANTILLA SISTEMA | ============================== //

    			$('.remove_img_plantilla_img').click(function(e) {
    				
    				const agree = confirm('Esta seguro de querer eliminar esta imagen?')

    				if(agree)
    				{
    					$('#div_image').show()
						$('body').css('opacity',0.5);

    					let id_remove = e.target.dataset.id,
	    					ref       = e.target.dataset.ref,
	    					img       = e.target.dataset.img

	    				$.ajax({
	    					url: '<?= base_url()."index.php/admin/remove_img" ?>',
	    					type: 'POST',
	    					data: {id : id_remove, ref, img},
	    				})
	    				.done(function(data) {
	    					
	    					$('#ref_'+ref).attr('href','')
	    					$('#imagen_'+ref).attr('src','')
	    					$('#div_image').hide()
							$('body').css('opacity',1);	

	    					toastr.success('Imagen removida con éxito','Éxito!')

	    					e.target.style.display = 'none'
	    				})
    				}
    				
    			});

				var $overflow = '';
				var colorbox_params = {
					rel: 'colorbox',
					reposition:true,
					scalePhotos:true,
					scrolling:false,
					previous:'<i class="ace-icon fa fa-arrow-left"></i>',
					next:'<i class="ace-icon fa fa-arrow-right"></i>',
					close:'&times;',
					current:'{current} of {total}',
					maxWidth:'100%',
					maxHeight:'100%',
					onOpen:function(){
						$overflow = document.body.style.overflow;
						document.body.style.overflow = 'hidden';
					},
					onClosed:function(){
						document.body.style.overflow = $overflow;
					},
					onComplete:function(){
						$.colorbox.resize();
					}
				};

				$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
				$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon
	
	
				$(document).one('ajaxloadstart.page', function(e) {
					$('#colorbox, #cboxOverlay').remove();
			   });

    				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
				}
			})
		</script>
	</body>
</html>


	
