<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/tables/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="css/tables/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-switch.css">

<!-- <script type="text/javascript" language="javascript" src="js/jsfunctions/dataTables.tableTools.js"></script> 
<link rel="stylesheet" type="text/css" href="css/tables/dataTables.tableTools.css">
 -->
<script type="text/javascript" language="javascript" src="js/jsfunctions/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="js/jsfunctions/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="js/jsfunctions/dataTables.responsive.js"></script>
<script type="text/javascript" language="javascript" src="js/jsfunctions/bootstrap-switch.js"></script>
</head>
<body>
<br>
<div class="row">
	
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-video-camera"></i>
					<span>Eliminar Videos</span>
				</div>
				<div class="box-icons pull-right">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<!-- <a class="close-link">
						<i class="fa fa-times"></i>
					</a> -->
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div id="ver"></div>
					{{ Datatable::table() 
							    ->addColumn('', 'Market', 'Alavista','Imagen','Titulo','Eliminar')  
							    ->setUrl(route('datatabledel'))
							    ->render() 
							    }}

			</div>
		</div>
	</div>
</div>

 <!-- 
 * [interfaz de edicion de videos]
 * @type {html}
 -->

<!-- 
 * [fin interfaz de edicion de videos]
 * @type {html}
 -->


<script type="text/javascript">
/**
 * Inicio
 * [Funciones  para vimeo ]
 * @type {[js]}
 */


/**
 * Fin de funciones js para youtube
 */

</script>

</body>