<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title><?=TITULO_PRINCIPAL?></title>
   <meta name="author" content="<?=AUTOR?>">
   <link rel="shortcut icon" href="<?=base_url()?>public/template/images/favicon.jpg">
   <link rel="icon" href="<?=base_url()?>public/template/images/favicon.jpg" type="image/x-icon">
   <link rel="stylesheet" href="<?=base_url()?>public/template/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?=base_url()?>public/template/css/typography.css">
   <link rel="stylesheet" href="<?=base_url()?>public/template/css/style.css">
   <link rel="stylesheet" href="<?=base_url()?>public/template/css/responsive.css">
   <link rel="stylesheet" href="<?=base_url()?>public/template/js/table/datatable/datatables.min.css" type="text/css">
   <style>                        
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
			-webkit-appearance: none; 
			margin: 0; 
	    }
	    input[type=number] { -moz-appearance:textfield; }
	    .form-group {display: flex;align-items: center;}
		.modal-lg {max-width: 80% !important;}
		.modal-body {font-size:13px;}
		#message, #cargando{text-align:center}
		.succes{color:#008F39;font-size:1.1rem}
		.warn{color:#FF0000;font-size:1.1rem}
		table.dataTable td {
		  font-size: 0.8rem;
		}
		.actionEdit{background:#52BE80;border-color:#52BE80}
		.actionCargas{background:#2C3E50;border-color:#2C3E50}
		.actionEstud{background:#3498DB;border-color:#3498DB}
		.actionReport{background:red;border-color:red}
		.mod:focus {background-color: #AAAAAA;-webkit-box-shadow: inset 0 0 20px black; -moz-box-shadow: inset 0 0 20px black; box-shadow: inset 0 0 20px black;}
		.mod:hover{box-shadow: 0 0 0 3px rgba(0,0,0,0.5);}
		.cont{width: 20px; height: auto;float: left; margin: 0px 1.8px}
		.cont img{}
	  </style>
</head>
<body>
   <!--<div id="loading">
      <div id="loading-center">
      </div>
   </div>-->
   <div class="wrapper">
      <?php $this->load->view("inc/nav-template"); ?>
      <div id="content-page" class="content-page">
         <?php $this->load->view("inc/nav-top-template"); ?>
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <?php //echo "<pre>"; echo $lista; echo '<br>'.$pacientes;//echo "<pre>"; echo var_dump($lista); ?>
               </div>
            </div>
			
			<div id="ajaxForm" style="display:none"><?if(!$this->uri->segment(1)=="") echo $formNew;?></div>
            
            <div class="row ajaxTable">
               <div class="col-xl-12 col-md-12">
                  <div class="card m-b-30 pb-35">
                     <div class="card-body">
                        <h4 class="mt-0 m-b-15 header-title">Listado General de Canillitas Registrados
							<!--<div class="cont">
								<a class="cont"><img src="<?=base_url()?>public/template/images/icons/txt_edit.png" title="Ejemplo" alt="Ejemplo" class="img-fluid"></a>
								<a class="cont"><img src="<?=base_url()?>public/template/images/icons/family.png" title="Ejemplo" alt="Ejemplo" class="img-fluid"></a>
								<a class="cont"><img src="<?=base_url()?>public/template/images/icons/pdf.png" title="Ejemplo" alt="Ejemplo" class="img-fluid"></a>
								<a class="cont"><img src="<?=base_url()?>public/template/images/icons/graduacion.png" title="Ejemplo" alt="Ejemplo" class="img-fluid"></a>
							<!--</div>-->
						</h4>
                        <br>
                        <div class="table-responsive">
                           <table id="tablaCanillita" class="table table-striped dt-responsive w-100 table-bordered display nowrap table-hover mb-0" style="width:100%">
								
				           </table>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php $this->load->view("inc/footer-template"); ?>
      </div>
   </div>
   <script src="<?=base_url()?>public/template/js/jquery.min.js"></script>
   <script src="<?=base_url()?>public/template/js/jquery-ui.min.js"></script>
   <!--<script src="<?=base_url()?>public/template/js/popper.min.js"></script>-->
   <script src="<?=base_url()?>public/template/js/bootstrap.min.js"></script>
   <!--<script src="<?=base_url()?>public/template/js/jquery.appear.js"></script>
   <script src="<?=base_url()?>public/template/js/countdown.min.js"></script>
   <script src="<?=base_url()?>public/template/js/waypoints.min.js"></script>-->
   <script src="<?=base_url()?>public/template/js/jquery.counterup.min.js"></script>
   <script src="<?=base_url()?>public/template/js/wow.min.js"></script>
   <script src="<?=base_url()?>public/template/js/apexcharts.js"></script>
   <script src="<?=base_url()?>public/template/js/slick.min.js"></script>
   <script src="<?=base_url()?>public/template/js/select2.min.js"></script>
   <!--<script src="<?=base_url()?>public/template/js/owl.carousel.min.js"></script>-->
   <script src="<?=base_url()?>public/template/js/jquery.magnific-popup.min.js"></script>
   <script src="<?=base_url()?>public/template/js/smooth-scrollbar.js"></script>
   <!--<script src="<?=base_url()?>public/template/js/lottie.js"></script>-->
   <script src="<?=base_url()?>public/template/js/chart-custom.js"></script>
   <script src="<?=base_url()?>public/template/js/custom.js"></script>
   <!--<script src="<?=base_url()?>public/template/js/chart.min.js"></script>
   <script src="<?=base_url()?>public/template/js/datatables.min.js"></script>-->
   <script src="<?=base_url()?>public/template/js/jquery.validate.min.js"></script>
   
   <!-- JS DataTable -->
   <script src="<?=base_url()?>public/template/js/table/datatable/datatables.min.js"></script>
   <!--<script src="<?=base_url()?>public/template/js/table/datatable/dataTables.buttons.min.js"></script>-->
   <script src="<?=base_url()?>public/template/js/table/datatable/jszip.min.js"></script>
   <script src="<?=base_url()?>public/template/js/table/datatable/pdfmake.min.js"></script>
   <script src="<?=base_url()?>public/template/js/table/datatable/vfs_fonts.js"></script>
   <!--script src="<?=base_url()?>public/template/js/table/datatable/buttons.html5.min.js"></script>-->
   <!--<script src="<?=base_url()?>public/template/js/table/datatable/buttons.print.min.js"></script>-->
   <script src="<?=base_url()?>public/template/js/table/table.js"></script>
	<script src="<?=base_url()?>public/template/js/canillitas/main.js"></script>
	<script>
      //const URI_MAP = "<?=base_url()?>";
      const canDelete = "1";
      const canEdit = "1";
      const canIdioma = "1";
      const canTracking = "1";
      const canHistory = "1";
      const URI = "<?=base_url()?>";
	  /*console.log(<?=$arch?>);
	  console.log(<?=$crea?>);*/
	  const lista = JSON.parse('<?=$listarCanillita?>');
	  const table = tablePersonalized('#tablaCanillita',lista, URI);
	  //tablePersonalized(table);
	  canillitas(URI,table,'canillita');
      /*const lista = <?= $lista ?>;*/
   </script>
   <script>
   </script>
</body>
</html>