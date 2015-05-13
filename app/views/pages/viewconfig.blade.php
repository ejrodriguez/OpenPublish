<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/tables/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="css/tables/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-switch.css">
<!-- <script type="text/javascript" language="javascript" src="plugins/bootstrapvalidator/bootstrapValidator.min.js"></script>
<script type="text/javascript" language="javascript" src="plugins/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon.min.js"></script> -->
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
					<span>Configurar Open Publish</span>
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
					<div id="tabs">
						<ul  class="list-inline">
							<li><a  data-toggle="tooltip" data-placement="bottom" title="YouTube"  href="#tabs-1"><i class="fa fa-youtube-square txt-danger" ></i> YouTube</a></li>
							<li><a data-toggle="tooltip" data-placement="bottom" title="Vimeo" href="#tabs-2"><i class="fa fa-vimeo-square txt-info"></i> Vimeo</a></li>
							<li><a data-toggle="tooltip" data-placement="bottom" title="Facebook" href="#tabs-3"><i class="fa fa-facebook-square txt-primary"></i> Facebook</a></li>
							<li><a data-toggle="tooltip" data-placement="bottom" title="Twitter" href="#tabs-4"><i class="fa fa-twitter-square txt-info"></i> Twitter</a></li>
						</ul>

						<!-- 
						 * [interfaz de funciones de busqueda de youtube]
						 * @type {html}
						-->
						
						<div id="tabs-1">
							
								<div class="bg-danger" role="alert">
								  <i class="fa fa-youtube-square" ></i> 
								  YouTube
								</div>
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
		 								<div class="panel panel-danger">
											<div class="form-group" >
												<label class="col-sm-1 control-label">Api Key</label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="modal_nombre" id="modal_nombre"/>
												</div>
												<div class="col-sm-3">
													<button  data-loading-text="Loading..." id="buscar2" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Buscar</button>
												</div>	

											</div>	
										</div>	
									</div>
								</div>
						</div>
						<!-- 
						 * [fin de interfaz de funciones de busqueda de youtube]
						-->
						
						<!-- 
						 * [interfaz de funciones de busqueda de vimeo]
						 * @type {html}
						 -->
						<div id="tabs-2">
								<div class="bg-info" role="alert">
								  <i class="fa fa-vimeo-square" ></i> 
								  Vimeo
								</div>
								<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
		 								<div class="panel panel-info">
											<div class="form-group" >
												<label class="col-sm-2 control-label">client_id</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="modal_nombre" id="modal_nombre"/><br>
												</div>

											</div>	
											<div class="form group">
												<label class="col-sm-2 control-label">client_secret</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="modal_nombre" id="modal_nombre"/><br>
												</div>

											</div>
											<div class="form-group" >
												<label class="col-sm-2 control-label">access_token</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="modal_nombre" id="modal_nombre"/><br>
												</div>

											</div>
											<div class="form-group" >
												<div class="col-sm-3">
													<button  data-loading-text="Loading..." id="buscar2" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Buscar</button>
												</div>													

											</div>											
											
										</div>	
									</div>

								</div>
						</div>
						<!-- 
						 * [fin de interfaz de funciones de busqueda de vimeo]
						 -->

						 <!-- 
						 * [interfaz de funciones de busqueda de vimeo]
						 * @type {html}
						 -->
						<div id="tabs-3">

								<div class="bg-primary" role="alert">
								  <i class="fa fa-facebook-square" ></i> 
								  Facebook
								</div>
								<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
		 								<div class="panel panel-primary">
											<div class="form-group" >
												<label class="col-sm-1 control-label">Api Key</label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="modal_nombre" id="modal_nombre"/>
												</div>
												<div class="col-sm-3">
													<button  data-loading-text="Loading..." id="buscar2" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Buscar</button>
												</div>	

											</div>	
										</div>	
									</div>

								</div>

						</div>
						<!-- 
						 * [fin de interfaz de funciones de busqueda de vimeo]
						 -->

						 <!-- 
						 * [interfaz de funciones de busqueda de vimeo]
						 * @type {html}
						 -->
						<div id="tabs-4">

									<div class="bg-info" role="alert">
									  <i class="fa fa-twitter-square" ></i> 
									  Twitter
									</div>
									<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default">
			 								<div class="panel panel-primary">
													<div class="form-group" >
														<label class="col-sm-1 control-label">Api Key</label>
														<div class="col-sm-7">
															<input type="text" class="form-control" name="modal_nombre" id="modal_nombre"/>
														</div>
														<div class="col-sm-3">
															<button  data-loading-text="Loading..." id="buscar2" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Guardar</button>
														</div>	

													</div>	
											</div>	
										</div>
									</div>
						</div>
						<!-- 
						 * [fin de interfaz de funciones de busqueda de vimeo]
						 -->						
					</div>
				
			</div>
		</div>
	</div>
</div>




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

<script type="text/javascript">
/**
 * Inicio
 * [Funciones  para vimeo ]
 * @type {[js]}
 */

$("#vfiltro").change(function(event) {
	
	if ($("#vfiltro").val() == 1) {
		$("#vfiltro2n").removeAttr('disabled');
	}
	else
	{	var b='-- Seleccione una Opcion --';
		$("#vfiltro2n").attr('disabled', 'disabled');
		$("#vfiltro2n").find("option:contains("+b+")").prop('selected',true).parent().focus();
		$("#vfiltro2n").change();
	}
});

$("#vorden1").change(function(event) {
	
	if ($("#vorden1").val() != '') {
		$("#vforma1").removeAttr('disabled');
	}
	else
	{	var b='-- Seleccione una Opcion --';
		$("#vforma1").attr('disabled', 'disabled');
		$("#vforma1").find("option:contains("+b+")").prop('selected',true).parent().focus();
		$("#vforma1").change();
	}
});

$("#vorden2").change(function(event) {
	
	if ($("#vorden2").val() != '') {
		$("#vforma2").removeAttr('disabled');
	}
	else
	{	var b='-- Seleccione una Opcion --';
		$("#vforma2").attr('disabled', 'disabled');
		$("#vforma2").find("option:contains("+b+")").prop('selected',true).parent().focus();
		$("#vforma2").change();
	}
});

$("#vorden3").change(function(event) {
	
	if ($("#vorden3").val() != '') {
		$("#vforma3").removeAttr('disabled');
	}
	else
	{	var b='-- Seleccione una Opcion --';
		$("#vforma3").attr('disabled', 'disabled');
		$("#vforma3").find("option:contains("+b+")").prop('selected',true).parent().focus();
		$("#vforma3").change();
	}
});
function CambiarColorTabla(){
	var sel = $('#datatable-1').DataTable();

    $('#datatable-1 tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            sel.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
}

function VerTablaVimeo(datos){
	
	$('#listresult').html(datos.list);
	$('#datatable-1').DataTable({
		
		"lengthMenu": [ 10, 20, 30, 40, 50, 100 ],
		"language": {
						"info": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)",
						"paginate": {
					       				 	"next": "Siguiente",
					       				 	"previous": "Anterior",

										},
							"search": "Buscar:",
							"infoEmpty": "No hay registros que mostrar",
							"infoFiltered": " - filtrados en _MAX_ registros en total",
							"emptyTable": "No hay registros en la tabla",
							"lengthMenu": "Ver _MENU_ registros",
							"loadingRecords": "Espere un momento - cargando...",
							"zeroRecords": "No hay registros coincidentes encontrados",
					},
		
		});
}

function VerTablaVacia(datos){
	$('#listresult').html('<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></thead><tbody></tbody></table>');
	$('#datatable-1').DataTable({
		
		"lengthMenu": [ 10, 20, 30, 40, 50, 100 ],
		"language": {
						"info": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)",
						"paginate": {
					       				 	"next": "Siguiente",
					       				 	"previous": "Anterior",

										},
							"search": "Buscar:",
							"infoEmpty": "No hay registros que mostrar",
							"infoFiltered": " - filtrados en _MAX_ registros en total",
							"emptyTable": "No hay registros en la tabla",
							"lengthMenu": "Ver _MENU_ registros",
							"loadingRecords": "Espere un momento - cargando...",
							"zeroRecords": "No hay registros coincidentes encontrados",
					},
		
		});
}

function MostrarOpcionesAll(){
	$("#mostrar").show();
	$("#enviaralavista").show();
}
function CategoriasVimeo(){
	$.ajax({
		url: "{{URL::route('categoriasvimeo')}}",
		type: 'POST',
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
			// console.log("success");
			if(data.success=='true'){
				 $.each(data.list, function(id) {
				 	data.list[id].iden=data.list[id].iden.replace("/categories/","");
				 	$("#vcategoria").append('<option value='+data.list[id].iden+'><b>'+data.list[id].desc+'</b></option>');
				 });
				 // console.log(data.list);
			}
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
		});
};

function CrearObjeto(){
	var oTable = $('#datatable-1').dataTable();
	var di=oTable.fnGetData().length;
	if(di > 0){

		for (var i = 0 ; i < di; i++) {
			var aData = oTable.fnGetData( i );
			// alert(aData[2]);
			var images = $(aData[2]).attr('src');
			$.ajax({
				url: "{{URL::route('tagsalavista')}}",
				type: 'POST',
				data: {cad: aData[4]},
				async: false,
				error: function(jqXHR, exception) {
			        if (jqXHR.status === 0) {
			            alert('Error de conexión, verifica tu instalación.');
			        } else if (jqXHR.status == 404) {
			            alert('La página no ha sido encontrada. [404]');
			        } else if (jqXHR.status == 500) {
			        	var msg=jQuery.parseJSON(jqXHR.responseText);
			        	 VerError(msg);
			            // alert("Error: "+msg.error.message+" Linea: "+msg.error.line+" File: "+msg.error.file);
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
				var tit=aData[4].replace('"', '');
				tit=tit.replace("'", "");
				console.log("success");
				// getFormJson(aData[3],tit,"AlavistaTV "+aData[5]+" AlavistaTV",images,'22','',data.list,'www.ebetrix.com');
				var viop = [];
				viop[0]=aData[3];viop[1]=tit;viop[2]="AlavistaTV "+aData[5]+" AlavistaTV";viop[3]=images;viop[4]='22';viop[5]='false';viop[6]=data.list;viop[7]='www.ebetrix.com';
				viav[viav.length]=viop;
			})
			.fail(function(data) {
				var tit=aData[4].replace('"', '');
				tit=tit.replace("'", "");
				console.log("error");
				// getFormJson(aData[3],tit,"AlavistaTV "+aData[5]+" AlavistaTV",images,'22','','','www.ebetrix.com');
				var viop = [];
				viop[0]=aData[3];viop[1]=tit;viop[2]="AlavistaTV "+aData[5]+" AlavistaTV";viop[3]=images;viop[4]='22';viop[5]='false';viop[6]='';viop[7]='www.ebetrix.com';
				viav[viav.length]=viop;
			})

		};

	}
}

function SeleccionClick(){
	var table = $('#datatable-1').DataTable();
	$('#datatable-1 tbody').on( 'click', 'tr', function () {
	  var rowData = table.row( this ).data()
	  // ... do something with `rowData`
	  // console.log(table.rows().every());
	  console.log(rowData[3]);
	  $('#idalavista').text(rowData[3]);

	  var seleo;

		$.each(viav, function(n,value) {
			 /* iterate through array or object */
			 // var aux=viav[n];
			 console.log(value[5]);
			 if (value[0]==$('#idalavista').text()) {
			 	$('#tituloalavista').val(value[1]);
			 	$('#wysiwig_full').val((value[2]));

			 	$("#categoriaalavista option").each(function(){
			 		if($(this).attr('value')==value[4]){
			 			$('#cateidit').text($(this).text());
			 			seleo=$(this).text();
			 		}
				});

			 	$('#urltagalavista').val(value[7]);
			 	$('#tagalavista').val(value[6]);

			 	$("#categoriaalavista").find("option:contains("+seleo+")").prop('selected',true).parent().focus();
				$("#categoriaalavista").change();
			 };

		});
	} );
}

function CambioCategoriaEditar(){
	$("#categoriaalavista").change(function(e) {
		/* Act on the event */
		e.preventDefault();
		$.each(viav, function(n,value) {
			if (value[0] ==$('#idalavista').text()) {
				value[4]=$("#categoriaalavista").val();
				$("#categoriaalavista option").each(function(){
			 		if($(this).attr('value')==value[4]){
			 			$('#cateidit').text($(this).text());
			 		}
				});
			};
		})
	});
}

$('#buscarv1').click(function(e) {
	e.preventDefault();
	//
	if (!$('#vcategoria').val()=='') 
	{
		if (Maximo($('#vmaxcat').val())) 
		{
			$.ajax({
				url: "{{URL::route('categoria_videos')}}",
				type: 'POST',
				data: {	max: $('#vmaxcat').val() , 
						buscar: $('#vbuscarq').val() , 
						cat: $('#vcategoria').val() ,
						orden: $('#vorden1').val() ,
						forma: $('#vforma1').val() ,
						filtro: $('#vfiltro').val() ,
						vefa: $('#vfiltro2n').val() 
					   },
				beforeSend: function(){
			    			$('#vinfo1').html("");
		                    $('#buscarv1').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
		                    viav=[];
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
				if (data.success=='true') {
					seleccion = 'vimeo';
					MostrarOpcionesAll();
					VerTablaVimeo(data);
					CambiarColorTabla();
					CrearObjeto();
					SeleccionClick();
					CambioCategoriaEditar();
				}
				else{
					VerTablaVacia();
				}		
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
				$('#buscarv1').html('<span><i class="fa fa-search"></i></span> Buscar');
			});
		}
		else
		{
			$('#vinfo1').html("<center><label class='col-sm-12 bg-danger'>El valor max debe estar entre 1 y 50</label></center>");
		}
	}
	else{
		$('#vinfo1').html("<center><label class='col-sm-12 bg-danger'>Seleccione una Categoria</label></center>");
	};
	
});


$('#buscarv2').click(function(e) {
	e.preventDefault();
	if (!$('#vtag').val()=='') 
	{
		if (Maximo($('#vmaxcat2').val())){
			$.ajax({
				url: "{{URL::route('tag_videos')}}",
				type: 'POST',
				data: {	tag: $('#vtag').val() , 
						max: $('#vmaxcat2').val() , 
						buscar: $('#vbuscarq2').val() , 
						orden: $('#vorden2').val() ,
						forma: $('#vforma2').val() , 
					   },
				beforeSend: function(){
			    			$('#vinfo2').html("");
		                    $('#buscarv2').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
		                    viav=[];
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
				if (data.success=='true') {
					seleccion = 'vimeo';
					MostrarOpcionesAll();
					VerTablaVimeo(data);
					CambiarColorTabla();
					CrearObjeto();
					SeleccionClick();
					CambioCategoriaEditar();
				}
				else{
					VerTablaVacia();
				}		
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
				$('#buscarv2').html('<span><i class="fa fa-search"></i></span> Buscar');
			});
		}
		else{
			$('#vinfo2').html("<center><label class='col-sm-12 bg-danger'>El valor max debe estar entre 1 y 50</label></center>");
		}
	}
	else{
		$('#vinfo2').html("<center><label class='col-sm-12 bg-danger'>Ingrese un Tag</label></center>");
	};
	
});

$('#buscarv3').click(function(e) {
	e.preventDefault();
	if (!$('#vbuscarq3').val()=='') 
	{
		if (Maximo($('#vmaxcat3').val())){
			$.ajax({
				url: "{{URL::route('search_videos')}}",
				type: 'POST',
				data: {	max: $('#vmaxcat3').val() , 
						buscar: $('#vbuscarq3').val() , 
						orden: $('#vorden3').val() ,
						forma: $('#vforma3').val() , 
						filtro: $('#vfiltro3').val() ,
					   },
				beforeSend: function(){
			    			$('#vinfo3').html("");
		                    $('#buscarv3').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
		                    viav=[];
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
				if (data.success=='true') {
					seleccion = 'vimeo';
					MostrarOpcionesAll();
					VerTablaVimeo(data);
					CambiarColorTabla();
					CrearObjeto();
					SeleccionClick();
					CambioCategoriaEditar();
				}
				else{
					VerTablaVacia();
				}	
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
				$('#buscarv3').html('<span><i class="fa fa-search"></i></span> Buscar');
			});
		}
		else{
			$('#vinfo3').html("<center><label class='col-sm-12 bg-danger'>El valor max debe estar entre 1 y 50</label></center>");
		}

	}
	else{
		$('#vinfo3').html("<center><label class='col-sm-12 bg-danger'>Ingrese una cadena de busqueda</label></center>");
	};
	
});



/**
 * Fin Funciones vimeo
 */


/**
 * --------------------------------------------------------------------------------------------------------------------------------------------------------------
 */


/**
 * Inicio
 * [Funciones  para youtube ]
 * @type {[js]}
 */
function VerTablaYoutube(datos){
	
	$('#listresult').html(datos.list);
	$('#datatable-1').DataTable({
		
		"lengthMenu": [ 10, 20, 30, 40, 50, 100 ],
		"language": {
						"info": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)",
						"paginate": {
					       				 	"next": "Siguiente",
					       				 	"previous": "Anterior",

										},
							"search": "Buscar:",
							"infoEmpty": "No hay registros que mostrar",
							"infoFiltered": " - filtrados en _MAX_ registros en total",
							"emptyTable": "No hay registros en la tabla",
							"lengthMenu": "Ver _MENU_ registros",
							"loadingRecords": "Espere un momento - cargando...",
							"zeroRecords": "No hay registros coincidentes encontrados",
					},
		
		});
}

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

function getCat(){
	

	$.ajax({
		url: "{{URL::route('categoryalavista')}}",
		type: 'POST',
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
			if(data.success){
				 $.each(data.list, function(id) {
				 	$("#categoriaalavista").append('<option value='+data.list[id].iden+'><b>'+data.list[id].desc+'</b></option>');
				 });

			}
			

		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
		});
};



function AllCat(){
	

	$.ajax({
		url: "{{URL::route('categoryalavista')}}",
		type: 'POST',
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
			if(data.success){
				 $.each(data.list, function(id) {
				 	$("#categoryall").append('<option value='+data.list[id].iden+'><b>'+data.list[id].desc+'</b></option>');
				 });

			}
			
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
		});
};




$('#enviaralavista').click(function(event) {
	/* Act on the event */
		event.preventDefault();
		$.each(viav, function(n,value) {
			 	value[5]='false';
		});

		var table = $('#datatable-1').DataTable();
		var info = table.page.info();
		var a =info.page;

	  	var oTable = $('#datatable-1').dataTable();
	  	oTable.fnPageChange( 0);
	  	for (var i = 0; i <= info.pages; i++) {
	  		$("input:checkbox:checked").each(function() {
	  				var b=$(this).val();
	  				$.each(viav, function(n,value) {
	  					if(value[0] ==b)
				    	{
						 	value[5]='true';
						}
	  				});  	
			    });
			oTable.fnPageChange( i );


	  	}
	  	oTable.fnPageChange( a );


	if (seleccion == 'vimeo') {
		// alert(seleccion);
			$.ajax({
			url: "{{URL::route('savevimeo_videos')}}",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {videos: viav},
			beforeSend: function(){
		    			// alert("message");
	                    $('#enviaralavista').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
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
			 $('#enviaralavista').html('<span><i class="fa fa-save"></i></span> Guardar');
			// console.log("success22");
			if(data.success=='true'){
				if(data.list!=''){
					$('#modalnotice').html("<center><button type='button' class='btn btn-primary btn-app-sm btn-circle'><i class='fa fa-archive'></i></button><legend class='col-sm-12 '>"+data.list+"</legend></center>");
					
					$('#modalmessage').modal({
						show: true
					});
				}
				else{
					$('#modalnotice').html("<center><button type='button' class='btn btn-primary btn-app-sm btn-circle'><i class='fa fa-check-square-o'></i></button><legend class='col-sm-12 '>"+"Seleccione al Menos un Video"+"</legend></center>");
					$('#modalmessage').modal({
						show: true
					});
					
					
				}
				
			}
			if(!data.success){
				$('#modalnotice').html("<center><button type='button' class='btn btn-primary btn-app-sm btn-circle'><i class='fa fa-minus-square-o'></i></button><legend class='col-sm-12 '>"+data.list+"</legend></center>");
				// alert((data.list));
				$('#modalmessage').modal({
						show: true
					});
			}
			
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete"); $('#enviaralavista').html('<span><i class="fa fa-save"></i></span> Guardar');
		});
	};

	if(seleccion == 'youtube'){console.log('prueba');console.log(viav);
		// alert(seleccion);
			$.ajax({
			url: "{{URL::route('savealavista')}}",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {videos:viav},
			beforeSend: function(){
		    			// alert("message");
	                    $('#enviaralavista').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
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
			 $('#enviaralavista').html('<span><i class="fa fa-save"></i></span> Guardar');
			console.log("success22");
			if(data.success=='true'){
				if(data.list!=''){
					$('#modalnotice').html("<center><button type='button' class='btn btn-primary btn-app-sm btn-circle'><i class='fa fa-archive'></i></button><legend class='col-sm-12 '>"+data.list+"</legend></center>");
					
					$('#modalmessage').modal({
						show: true
					});
				}
				else{
					$('#modalnotice').html("<center><button type='button' class='btn btn-primary btn-app-sm btn-circle'><i class='fa fa-check-square-o'></i></button><legend class='col-sm-12 '>"+"Seleccione al Menos un Video"+"</legend></center>");
					$('#modalmessage').modal({
						show: true
					});
					
					
				}
				
			}
			if(data.success=='false'){
				$('#modalnotice').html("<center><button type='button' class='btn btn-primary btn-app-sm btn-circle'><i class='fa fa-minus-square-o'></i></button><legend class='col-sm-12 '>"+data.list+"</legend></center>");
				// alert((data.list));
				$('#modalmessage').modal({
						show: true
					});
			}
			
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete"); $('#enviaralavista').html('<span><i class="fa fa-save"></i></span> Guardar');
		});
	};
	if(seleccion == 'ninguna'){
		alert('Ningun Video de YouTube o Vimeo valido');

	};
	
	
});




//add object

var viav = [];

		
var seleccion = 'ninguna';
// function getFormJson(a,b,c,d,e,f,g,h){

// 	var item = { ide: a, titulo: b, descr: c ,emb: d, cat:e , sel: f, tag:g, turl:h};
		
// 		datas.items.push(item);

// 		return datas;
// };

function validarFechaMenorMayor(datetime1,datetime2){
	  var date1=datetime1.slice(0,10);
	  var date2=datetime2.slice(0,10);

      var x=new Date();
      var y=new Date();

      var fecha1 = date1.split("-");
      var fecha2 = date2.split("-");




      x.setFullYear(fecha1[2],fecha1[1],fecha1[0]);
      y.setFullYear(fecha2[2],fecha2[1],fecha2[0]);

 
      if (x <= y)
        return false;
      else
        return true;
}




$(document).ready(function() {
	/**
	 * Vimeo
	 */
	CategoriasVimeo();

	/**
	 * YouTube
	 */
	$('#datatable-1').DataTable({
	
	"lengthMenu": [ 10, 20, 30, 40, 50, 100 ],
	"language": {
					"info": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)",
					"paginate": {
				       				 	"next": "Siguiente",
				       				 	"previous": "Anterior",

									},
						"search": "Buscar:",
						"infoEmpty": "No hay registros que mostrar",
						"infoFiltered": " - filtrados en _MAX_ registros en total",
						"emptyTable": "No hay registros en la tabla",
						"lengthMenu": "Ver _MENU_ registros",
						"loadingRecords": "Espere un momento - cargando...",
						"zeroRecords": "No hay registros coincidentes encontrados",
				},
	
	});

	AllCat();

	$("#mostrar").hide();
	
	getCat();

	//area de texto
	// TinyMCEStart('#wysiwig_full', 'extreme');
	// Load spinner plugin and callback  date spinner
	$("#maxregion").spinner({
		max: 50,
		min: 1,
	});
	$("#maxmas").spinner({
		max: 50,
		min: 1,
	});
	$("#maxq").spinner({
		max: 50,
		min: 1,
	});
	$("#vmaxcat").spinner({
		max: 50,
		min: 1,
	});
	$("#vmaxcat2").spinner({
		max: 50,
		min: 1,
	});
	$("#vmaxcat3").spinner({
		max: 50,
		min: 1,
	});	
	// Load TimePicker plugin and callback all time and date pickers
	LoadTimePickerScript(AllTimePickers);

	// Create jQuery-UI tabs
	$("#tabs").tabs();
	// Sortable for elements
	$(".sort").sortable({
		items: "div.col-sm-2",
		appendTo: 'div.box-content'
	});
	// Droppable for example of trash
	$(".drop div.col-sm-2").draggable({containment: '.dropbox' });
	$('#trash').droppable({
		drop: function(event, ui) {
			$(ui.draggable).remove();
		}
	});
	var icons = {
		header: "ui-icon-circle-arrow-e",
		activeHeader: "ui-icon-circle-arrow-s"
	};
	// Make accordion feature of jQuery-UI
	// $("#accordion").accordion({icons: icons });
	// Create UI spinner
	$("#ui-spinner").spinner();
	// Add Drag-n-Drop to boxes
	// WinMove();
	// // Load selects
	LoadSelect2Script(DemoSelect2);
	$("#accordion .panel-heading a").css('style', 'none');

	//load select categorias para region
	$.ajax({
		url: "{{URL::route('categoriesvideos')}}",
		type: 'POST',
		error: function(jqXHR, exception) {
		        if (jqXHR.status === 0) {
		            alert('Error de conexión, verifica tu instalación.');
		        } else if (jqXHR.status == 404) {
		            alert('La página no ha sido encontrada. [404]');
		        } else if (jqXHR.status == 500) {
		            var msg=jQuery.parseJSON(jqXHR.responseText);
		            VerError(msg);
				    // alert("No se pueden listar categorias en Mas Vistos, Error: "+msg.error.message+" Linea: "+msg.error.line+" File: "+msg.error.file);
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
		if(data.success=='true'){
			$('#listarcategorias').html('');
			$('#listarcategorias').html(data.list);
			
			function DemoSelect2(){
				$('#rcategoria').select2();
			};
			LoadSelect2Script(DemoSelect2);
			
			
		}
		else
		{
			alert(data.list);
		}
		
	})
	.fail(function() {
		console.log("error");
	});
	//load select categorias para query
	$.ajax({
		url: "{{URL::route('categoriesvideos')}}",
		type: 'POST',
		error: function(jqXHR, exception) {
		        if (jqXHR.status === 0) {
		            alert('Error de conexión, verifica tu instalación.');
		        } else if (jqXHR.status == 404) {
		            alert('La página no ha sido encontrada. [404]');
		        } else if (jqXHR.status == 500) {
		            var msg=jQuery.parseJSON(jqXHR.responseText);
		            VerError(msg);
				    // alert("No se puede listar categorias en Busqueda Avanzada, Error: "+msg.error.message+" Linea: "+msg.error.line+" File: "+msg.error.file);
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
		if(data.success=='true'){
			$('#listarcategoriasq').html('');
			$('#listarcategoriasq').html(data.listq);
			function DemoSelect2(){
				$('#qcategoria').select2();
			};
			LoadSelect2Script(DemoSelect2);
			
		}
		else
		{
			alert(data.list);
		}
		
	})
	.fail(function() {
		console.log("error");
	});
});
function DemoSelect2(){
	$('#criterio').select2();
	$('#criterio2').select2();
	$('#region').select2();
	$('#ordenarmasv').select2();
	$('#eventoq').select2();
	$('#contenidoq').select2();
	$('#subq').select2();
	$('#categoriaq').select2();
	$('#definicionq').select2();
	$('#dimensionq').select2();
	$('#duracionq').select2();
	$('#embedq').select2();
	$('#licenciaq').select2();
	$('#synq').select2();
	$('#tipoq').select2();
	$('#orderq').select2();
	$('#categoriaalavista').select2();
	$('#nivelalavista').select2();
	$('#estadoalavista').select2();
	$('#categoryall').select2();
	$('#vcategoria').select2();
	$('#vfiltro').select2();
	$('#vfiltro2n').select2();
	$('#vorden1').select2();
	$('#vforma1').select2();
	$('#vorden2').select2();
	$('#vforma2').select2();
	$('#vforma3').select2();
	$('#vorden3').select2();
	$('#vfiltro3').select2();
};

$("#accordion .panel-heading").mouseover(function(e) {
	e.preventDefault();
    $(this).css('backgroundColor','#BDBDBD');
});
$("#accordion .panel-heading").mouseleave(function(e) {
	e.preventDefault();
	$(this).css('backgroundColor','#F2F2F2');
});
//tooltips de informacion
$('#info1').mouseenter(function(e) {
	// e.preventDefault();
	$('#info1').popover({
        title: 'Informacion',
        content: 'Obtenga informacion de un video, mediante el ID',
        placement: 'top',
        animation: 'true'
    });
});
$('#info2').mouseenter(function(e) {
	// e.preventDefault();
	$('#info2').popover({
        title: 'Informacion',
        content: 'Obtenga informacion videos, mediante el Codigo Region',
        placement: 'top',
        animation: 'true'
    });
});
$('#info3').mouseenter(function(e) {
	// e.preventDefault();
	$('#info3').popover({
        title: 'Informacion',
        content: 'Obtenga informacion de los videos mas vistos, ordenados deacuerdo a un criterio',
        placement: 'top',
        animation: 'true'
    });
});
$('#info4').mouseenter(function(e) {
	// e.preventDefault();
	$('#info4').popover({
        title: 'Informacion',
        content: 'Obtenga informacion mediante una busqueda avanzada',
        placement: 'top',
        animation: 'true'
    });
});
//buscar videos youtube
// getvideo by id
$("#buscar1").click(function(e) {
	/* Act on the event */
	e.preventDefault();
	
	$.ajax({
		url: "{{URL::route('getvideoid')}}",
		type: 'POST',
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {id: $('#idvideo').val() },
		beforeSend: function(){
	    			// alert("message");
                    $('#buscar1').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
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
		// $('#cargardel').html('<label></label>');
		// console.log("success");
		if(data.success=='true'){
					// alert(data.msg);
					$('#buscar1').html('<span><i class="fa fa-search"></i></span> Buscar');
					$('#listresult').html(data.resultobt);
									
						
					// });
				}
		if(data.success=='falserollb'){
					// alert('Internal Server Error [500].');
				}
	})
	.fail(function() {
		console.log("error");
		$('#buscar1').html('<span><i class="fa fa-search"></i></span> Buscar');
	})
	.always(function() {
		console.log("complete");
	});
});


//valores maximos de busqueda
function Maximo(max)
{
	if(max>0 && max<51){
		return true;
	}
	else{
		return false;
	}
}
//buscar por codigo de region
$("#buscar2").click(function(e) {
	$('#uniq2').html("");
	/* Act on the event */
	e.preventDefault();
	if(Maximo($("#maxregion").val()))
	{
		$.ajax({
				url: "{{URL::route('getpopularvideos')}}",
				type: 'POST',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {cod: $('#region').val(),categ: $('#rcategoria').val(), max : $('#maxregion').val()},
				beforeSend: function(){

		                    $('#buscar2').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');

							viav=[];
							// $("#categoriaalavista > option[value="+ datas.items[n].cat+"]").attr('selected',false).parent().focus();
						 	// $('#categoriaalavista option').remove();
						 	// $("#categoriaalavista").prop('selectedIndex', 0);
		                },
		        error: function(jqXHR, exception) {
				        if (jqXHR.status === 0) {
				            alert('Error de conexión, verifica tu instalación.');
				        } else if (jqXHR.status == 404) {
				            alert('La página no ha sido encontrada. [404]');
				        } else if (jqXHR.status == 500) {
				        	var msg=jQuery.parseJSON(jqXHR.responseText);
				        	 VerError(msg);
				            // alert("Error: "+msg.error.message+" Linea: "+msg.error.line+" File: "+msg.error.file);
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
				if (data.success=='true') {
					seleccion = 'youtube';
					MostrarOpcionesAll();
					VerTablaYoutube(data);
					CambiarColorTabla();
					CrearObjeto();
					SeleccionClick();
					CambioCategoriaEditar();
					// console.log(viav);
				}
				else
				{
					VerTablaVacia();
				}
			})
			.fail(function() {
				console.log("error");
				// $('#buscar2').html('<span><i class="fa fa-search"></i></span> Buscar');
			})
			.always(function() {
				console.log("complete");
				$('#buscar2').html('<span><i class="fa fa-search"></i></span> Buscar');
			});
	}
	else{
		
		$('#uniq2').html("<center><label class='col-sm-12 bg-danger'>El valor max debe estar entre 1 y 50</label></center>");
	}
	
	
});
$("#buscar3").click(function(e) {
	/* Act on the event */
	$('#uniq3').html("");
	e.preventDefault();
	if(Maximo($("#maxmas").val())){
		$.ajax({
			url: "{{URL::route('videosmasvistos')}}",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {order : $('#ordenarmasv').val() , max : $('#maxmas').val()},
			beforeSend: function(){
						// $("#categoriaalavista").empty();
						viav=[];
		    			// alert("message");
	                    $('#buscar3').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
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
			// console.log("success");
			if (data.success=='true') {
				seleccion = 'youtube';
				MostrarOpcionesAll();
				VerTablaYoutube(data);
				CambiarColorTabla();
				CrearObjeto();
				SeleccionClick();
				CambioCategoriaEditar();
			}
			else
			{
				VerTablaVacia();
			}
		})
		.fail(function() {
			console.log("error");
			// $('#buscar3').html('<span><i class="fa fa-search"></i></span> Buscar');
		})
		.always(function() {
			$('#buscar3').html('<span><i class="fa fa-search"></i></span> Buscar');
		});
	}
	else{
		$('#uniq3').html("<center><label class='col-sm-12 bg-danger'>El valor max debe estar entre 1 y 50</label></center>");
	}
	
});
$("#buscar4").click(function(e) {
	/* Act on the event */
	$('#uniq4').html("");
	$('#uniq41').html("");
	e.preventDefault();
	if(Maximo($("#maxq").val()))
	{
			if($('#buscarq').val()!='')
			{

				if(($('#datetime_antesq').val()!='') && ($('#datetime_despuesq').val()!=''))
				{

					if(validarFechaMenorMayor($('#datetime_antesq').val(),$('#datetime_despuesq').val())){
									$.ajax({
								url: "{{URL::route('busquedaavanzada')}}",
								type: 'POST',
								// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
								data: {q : $('#buscarq').val() , max:$('#maxq').val() , evento: $('#eventoq').val(), restri:$('#contenidoq').val() , sub:$('#subq').val() , cat:$('#qcategoria').val() , def:$('#definicionq').val() , dim:$('#dimensionq').val() , dur:$('#duracionq').val() , emb:$('#embedq').val() , lic:$('#licenciaq').val() , syn:$('#synq').val() , tipo:$('#tipoq').val() , order:$('#orderq').val() , despues:$('#datetime_despuesq').val() , antes:$('#datetime_antesq').val() },
								beforeSend: function(){
						                    $('#buscar4').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
											viav=[];
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
								// console.log("success");
								if (data.success=='true') {
									seleccion = 'youtube';
									MostrarOpcionesAll();
									VerTablaYoutube(data);
									CambiarColorTabla();
									CrearObjeto();
									SeleccionClick();
									CambioCategoriaEditar();
								}
								else
								{
									VerTablaVacia();
								}
							})
							.fail(function() {
								console.log("error");
								// $('#buscar4').html('<span><i class="fa fa-search"></i></span> Buscar');
							})
							.always(function() {
								// console.log("complete");
								$('#buscar4').html('<span><i class="fa fa-search"></i></span> Buscar');
							});		
					}
					else{
						$('#modalnotice').html("<center><button type='button' class='btn btn-primary btn-app-sm btn-circle'><i class='fa  fa-calendar'></i></button><legend class='col-sm-12 '>"+"La fecha 'Despues de' sobrepasa a la fecha 'Antes de'"+"</legend></center>");
						$('#modalmessage').modal({
								show: true
							});

					}
					
				}
				if(($('#datetime_antesq').val()=='') || ($('#datetime_despuesq').val()=='')){
					
					$.ajax({
						url: "{{URL::route('busquedaavanzada')}}",
								type: 'POST',
								// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
								data: {q : $('#buscarq').val() , max:$('#maxq').val() , evento: $('#eventoq').val(), restri:$('#contenidoq').val() , sub:$('#subq').val() , cat:$('#qcategoria').val() , def:$('#definicionq').val() , dim:$('#dimensionq').val() , dur:$('#duracionq').val() , emb:$('#embedq').val() , lic:$('#licenciaq').val() , syn:$('#synq').val() , tipo:$('#tipoq').val() , order:$('#orderq').val() , despues:$('#datetime_despuesq').val() , antes:$('#datetime_antesq').val() },
								beforeSend: function(){
						                    $('#buscar4').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');;
											viav=[];
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
								// console.log("success");
								if (data.success=='true') {
									seleccion = 'youtube';
									MostrarOpcionesAll();
									VerTablaYoutube(data);
									CambiarColorTabla();
									CrearObjeto();
									SeleccionClick();
									CambioCategoriaEditar();
								}
								else
								{
									VerTablaVacia();
								}
							})
							.fail(function() {
								console.log("error");
								
							})
							.always(function() {
								// console.log("complete");
								$('#buscar4').html('<span><i class="bg-info"></i></span> Buscar');
							});
						}

								
					}
					else{
						$('#uniq4').html("<center><label class='col-sm-12 bg-danger'>Ingrese un valor a buscar</label></center>");
					}
			}
	else{
		$('#uniq41').html("<center><label class='col-sm-12 bg-danger'>El valor max debe estar entre 1 y 50</label></center>");
	}
	
	
});



//borrar datos de modal
$('#modaldataedit').on('hidden.bs.modal', function (){
  // keyboard: false
  // alert('Modal is successfully shown!');
  	$('#mtituloalavista').val("");
 	$('#descripcionalavista').val("");
 	$('#idalavista').text(""); 
 	$('#tagalavista').val("");
	$('#urltagalavista').val("");
 	// $("#categoriaalavista").empty();
 	$('#uniqedit').html("");
 	
});



$('#guardaralavista').click(function(et) {
	/* Act on the event */
	$('#uniqedit').html("");
	et.preventDefault();

		$.each(viav, function(n,value) {
			$('#uniqedit').html("<img src='img/devoops_getdata.gif'  alt='preloader'/>");
			 /* iterate through array or object */
			 if(value[0] ==$('#idalavista').text()){
			 	// datas.items.push(item);
			 	value[0]=$('#idalavista').text();
			 	value[1]=$('#tituloalavista').val();
			 	value[2]=$('#wysiwig_full').val();
			 	value[4]=$('#categoriaalavista').val();
			 	value[6]=$('#tagalavista').val();
			 	value[7]=$('#urltagalavista').val();
			 }
			
		});
		console.log(viav);
		$('#uniqedit').html("<center><label class='col-sm-12 bg-info'>Informacion Agregada</label></center>");


});



$('#categoryall').change(function(e) {
	/* Act on the event */
	e.preventDefault();
	$.each(viav, function(n,value) {
		 	value[4]=$('#categoryall').val();
	});
});



$("[name='checkall']").bootstrapSwitch();

$('input[name="checkall"]').on('switchChange.bootstrapSwitch', function(event, state) {
  // console.log(this); // DOM element
  // console.log(event); // jQuery event
  console.log(state); // true | false
  if (state==true)
  {
  	var table = $('#datatable-1').DataTable();
	var info = table.page.info();
	var a =info.page;
  	var oTable = $('#datatable-1').dataTable();
  	oTable.fnPageChange( 0);
	for (var i = 0; i <= info.pages; i++) {

		$("input:checkbox").each( function(){
			var b=$(this).val();
		   	$("#"+b).prop("checked", "checked");
		});

		oTable.fnPageChange( i );

	};
	oTable.fnPageChange( a );

  }
  else
  {
  		var table = $('#datatable-1').DataTable();
		var info = table.page.info();
		var a =info.page;

	  	var oTable = $('#datatable-1').dataTable();
	  	oTable.fnPageChange( 0);
	  	for (var i = 0; i <= info.pages; i++) {
	  		$("input:checkbox").each(function() {
			    	var b=$(this).val();
			    	$("#"+b).prop("checked", "");
			    	
			    });
			oTable.fnPageChange( i );


	  	}
	  	oTable.fnPageChange( a );
  					
  }		
  
  	
});
/**
 * Fin de funciones js para youtube
 */

</script>

</body>