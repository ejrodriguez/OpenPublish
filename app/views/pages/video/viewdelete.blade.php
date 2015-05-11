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
<!-- <script type="text/javascript" language="javascript" src="js/jsfunctions/jquery.dataTables.min.js"></script> -->
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
			<div id="" class="box-content">
				<!-- <div id="ver"></div> -->
					{{ Datatable::table() 
							    ->addColumn('','', 'OP', 'AV','Imagen','Titulo','Vistas','Calificacion')  
							    ->setUrl(route('datatabledel'))
							    ->render() 
							    }}
				<div id="mostrar" class="form-group" >
						
						<label class="col-sm-2 control-label" id="catall">Seleccionar: </label>
						<div class="col-sm-8">
							<input type="checkbox" data-label-text="Todos" id="checkall" name="checkall" data-on-color="success" data-off-color="warning" data-size="small" data-on-text="Si" data-off-text="No">
							
						</div>
						<button id="eliminar" type="submit" class="btn btn-danger btn-app"><i class="fa fa-trash-o"></i></button>
						<!-- <button id="enviaralavista" type="submit" class="btn btn-danger btn-label-left btn-lg"><span><i class="fa fa-trash-o"></i></span> Eliminar</button> -->
											
				</div>
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
<!--
 * [interfaz de mensajes de openpublish]
 * @type {html}
 -->
<div id="modalerrores" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="largeModal ">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	     <div class="modal-header alert alert-danger">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        ×
	        </button>
	        <h4>Informacion</h4>
	     </div>
	     <div class="modal-body">

	        	<form id="ShareProfileForm" method="POST"  action="" class="form-horizontal">
	        		<fieldset>
	        			<div id='modalerror' class="form-group">

						</div>

					</fieldset>

				</form>
	     </div>
	     <div id="resultshare"></div>
	     <div class="modal-footer">
	        <a id="cerraralavista" href="#" data-dismiss="modal" class="btn btn-primary btn-label-left btn-lg"><span><i class="fa fa-arrows-alt"></i></span>Cerrar</a>
	     </div>
		</div>

	</div>
</div>
<!--
 * [fin interfaz de mensajes de error de openpublish]
 -->

 <!--
 * [interfaz de mensajes de informacion al guardar los videos en alavista]
 * @type {html}
 -->
<div id="modalmessage" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="largeModal ">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	     <div class="modal-header alert alert-info">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        ×
	        </button>
	        <h4>Informacion</h4>
	     </div>
	     <div class="modal-body">

	        	<form id="ShareProfileForm" method="POST"  action="" class="form-horizontal">
	        		<fieldset>
	        			<div id='modalnotice' class="form-group">

						</div>

					</fieldset>

				</form>
	     </div>
	     <div id="resultshare"></div>
	     <div class="modal-footer">
	        <a id="cerraralavista" href="#" data-dismiss="modal" class="btn btn-primary btn-label-left btn-lg"><span><i class="fa fa-arrows-alt"></i></span>Cerrar</a>
	     </div>
		</div>

	</div>
</div>
<!--
 * [fin interfaz de mensajes de informacion al guardar los videos en alavista]
 -->

<script type="text/javascript">
/**
 * Inicio
 * [Funciones  para eliminar ]
 * @type {[js]}
 */
var cambia;

var viav = [];

function Pagina(){
	var table = $('#datatable-1').DataTable();
	var info = table.page.info();
	var a =info.page;
	return a;
}

function Recargar(pag){
	$.ajax({
	    	
	    	url: "{{URL::route('delvideo')}}",
	    	type: 'GET',
	    	beforeSend: function(){
	    			
                    $('#jscontent').append('<center><img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/></center>');
                },
             error: function(jqXHR, exception) {
		        if (jqXHR.status === 0) {
		            alert('Error de conexión, verifica tu instalación.');
		        } else if (jqXHR.status == 404) {
		            alert('La página no ha sido encontrada. [404]');
		        } else if (jqXHR.status == 500) {
		            var msg=jQuery.parseJSON(jqXHR.responseText);
		           	VerError(msg);
		        } else if (exception === 'parsererror') {
		            alert('Error parse JSON.');
		        } else if (exception === 'timeout') {
		            alert('Exceso tiempo.');
		        } else if (exception === 'abort') {
		            alert('Petición ajax abortada.');
		        } else {
		            alert('Error desconocido: ' + jqXHR.responseText);
		        }
		    },
	    })
	    .done(function() {
	    	$("#jscontent").load('{{URL::route('delvideo')}}');
	    	var oTable = $('#datatable-1').dataTable();
	    		// alert(pag);
	    	oTable.fnPageChange(2);

	    })
	    .fail(function() {
	    	// console.log('no vale');
	    })
}



/**
 * [name Seleccionar todos los datos de la pagina actual]
 * @type {String}
 */
$("[name='checkall']").bootstrapSwitch();


$('input[name="checkall"]').on('switchChange.bootstrapSwitch', function(event, state) {
  console.log(state); // true | false
  if (state==true)
  { 

  	var table = $('#datatable-1').DataTable();
	var info = table.page.info();
	var a =info.page;

  	var oTable = $('#datatable-1').dataTable();

		$("input:checkbox").each( function(){
			var b=$(this).val();
		   	$("#"+b).prop("checked", "checked");
		});

  }
  else
  { 
  		var table = $('#datatable-1').DataTable();
		var info = table.page.info();
		var a =info.page;

	  	var oTable = $('#datatable-1').dataTable();

	  		$("input:checkbox").each(function() {
			    	var b=$(this).val();
			    	$("#"+b).prop("checked", "");
			    	
			    });
	
  }		 	
});

// function SetearSelecAlls()
// {
// 	var table = $('#datatable-1').DataTable();
// 	// var info = table.page.info();
// 	// var a =info.page;
// 	var filas=table.rows().data().length;
// 	var contsi;
// 	// var contno;
// 	$("input:checkbox:checked").each(   
// 	    function() {
// 	        contsi++;
// 	    }
// 	);
// 	if (contsi==filas) {
// 		$('input[name="checkall"]').bootstrapSwitch('state', true, true);
// 	}else{
// 		$('input[name="checkall"]').bootstrapSwitch('state', false, false);
// 	}
// }

// $('.paginate_button').on( 'click', function () {
// 			alert('a');
// 		    // table.page( 'next' ).draw( false );
// 		    SetearSelecAlls();
// 	} );

$("#eliminar").click(function(e) {
	viav=[];
	e.preventDefault();
	var oTable = $('#datatable-1').dataTable();
	var di=oTable.fnGetData().length;
	$("input[type=checkbox]:checked").each(function(){
		//cada elemento seleccionado
		// alert($(this).val());
		if ($(this).val()!='on') {
			viav[viav.length]=$(this).val();
		};

	});
	
	// console.log(viav);
	var pagi=Pagina();
	$.ajax({
		url: "{{URL::route('eliminarvideo')}}",
		type: 'POST',
		data: {videose: viav},
		beforeSend: function(){
            $('#eliminar').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
        },
        error: function(jqXHR, exception) {
	        if (jqXHR.status === 0) {
	            alert('Error de conexión, verifica tu instalación.');
	        } else if (jqXHR.status == 404) {
	            alert('La página no ha sido encontrada. [404]');
	        } else if (jqXHR.status == 500) {
	            var msg=jQuery.parseJSON(jqXHR.responseText);
	           	VerError(msg);
	        } else if (exception === 'parsererror') {
	            alert('Error parse JSON.');
	        } else if (exception === 'timeout') {
	            alert('Exceso tiempo.');
	        } else if (exception === 'abort') {
	            alert('Petición ajax abortada.');
	        } else {
	            alert('Error desconocido: ' + jqXHR.responseText);
	        }
	    },
	})
	.done(function(data) {
		console.log("success");
		if(data.success=='true'){
			if (data.list=='Seleccione al menos un Video') {
				$('#modalnotice').html("<center><button type='button' class='btn btn-primary btn-app-sm btn-circle'><i class='fa fa-archive'></i></button><legend class='col-sm-12 '>"+data.list+"</legend></center>");

				$('#modalmessage').modal({
					show: true
				});

			}else{
				Recargar(pagi);
			}
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
		$('#eliminar').html('<span><i class="fa fa-search"></i></span> Buscar');
	});
	
	



	
});

$(document).ready(function() {
	cambia=0;

});


function VerError(data){
	if('Invalid argument supplied for foreach()'==data.error.message)
	{
		$('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>No se han encontrados datos en la Busqueda Realizada </p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");
	}
	else if('Curl Error : Failed to connect to www.googleapis.com port 443: Host unreachable'==data.error.message){
		$('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>Error: No se pudo conectar con www.googleapis.com puerto 443: host inalcanzable</p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");
	}
	else if('Curl Error : Could not resolve host: www.googleapis.com'==data.error.message){
		$('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>Error: No se pudo resolver el host: www.googleapis.com</p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");
	}
	else if('Error 400 Bad Request : videoChartNotFound'==data.error.message){
		$('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>Error: La categoria solicitada no se encuentra habilitada en el pais seleccionado </p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");
	}
	else if('Undefined index: data'==data.error.message){
		$('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>Error: No se han encontrados datos en la Busqueda Realizada  </p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");
	}

	else{
		$('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>Error: "+data.error.message+"</p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");
		console.log(data.error.message);
	}

	$('#modalerrores').modal({
								show: true
							});
}



/**
 * Fin de funciones js para eliminar
 */

</script>

</body>