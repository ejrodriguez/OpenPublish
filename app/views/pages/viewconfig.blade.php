<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/tables/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="css/tables/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-switch.css">
<!-- <script type="text/javascript" language="javascript" src="plugins/bootstrapvalidator/bootstrapValidator.min.js"></script>
<script type="text/javascript" language="javascript" src="plugins/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon.min.js"></script> -->
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
							<li><a data-toggle="tooltip" data-placement="bottom" title="Usuario" href="#tabs-5"><i class="fa fa-user txt-success"></i> Usuario</a></li>
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
												<label class="col-sm-2 control-label">Api Key</label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="modal_nombre" id="ykey" value='{{ $items[0]["YouTubeKey"] }}' />
												</div>
												<div class="col-sm-3">
													<button  data-loading-text="Loading..." id="guardary" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-save"></i></span> Guardar</button>
												</div>	

											</div>
											<div id="errory"></div>	
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
												<label class="col-sm-3 control-label">client_id</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="modal_nombre" id="idv" value='{{ $items[0]["VimeoClientId"] }}' /><br>
												</div>

											</div>	
											<div class="form group">
												<label class="col-sm-3 control-label">client_secret</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="modal_nombre" id="secv" value='{{ $items[0]["VimeoClientSecret"] }}' /><br>
												</div>

											</div>
											<div class="form-group" >
												<label class="col-sm-3 control-label">access_token</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="modal_nombre" id="tokenv" value='{{ $items[0]["VimeAccessToken"] }}' /><br>
												</div>

											</div>
											<div class="form-group" >
												<div class="col-sm-9"></div>
												<div class="col-sm-3">
													<button  data-loading-text="Loading..." id="guardarv" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-save"></i></span> Guardar</button>
												</div>													

											</div>
											<div id="errorv"></div>												
											
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
												<label class="col-sm-3 control-label">app_id</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="modal_nombre" id="idf" value='{{ $items[0]["AppIdFacebook"] }}' /><br>
												</div>

											</div>	
											<div class="form group">
												<label class="col-sm-3 control-label">app_secret</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="modal_nombre" id="secf" value='{{ $items[0]["AppSecretFacebook"] }}' /><br>
												</div>

											</div>
											<div class="form-group" >
												<div class="col-sm-9"></div>
												<div class="col-sm-3">
													<button  data-loading-text="Loading..." id="guardarf" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-save"></i></span> Guardar</button>
												</div>													

											</div>
											<div id="errorf"></div>
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
													<label class="col-sm-3 control-label">consumer_key</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="modal_nombre" id="keyt" value='{{ $items[0]["ConsumerKeyTw"] }}' /><br>
													</div>

												</div>	
												<div class="form group">
													<label class="col-sm-3 control-label">consumer_secret</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="modal_nombre" id="sect" value='{{ $items[0]["ConsumerSecretTw"] }}' /><br>
													</div>

												</div>
												<div class="form-group" >
													<div class="col-sm-9"></div>
													<div class="col-sm-3">
														<button  data-loading-text="Loading..." id="guardart" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-save"></i></span> Guardar</button>
													</div>													

												</div>
												<div id="errort"></div>
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
						<div id="tabs-5">

									<div class="bg-success" role="alert">
									  <i class="fa fa-user" ></i> 
									  Usuario
									</div>
									<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default">
			 								<div class="panel panel-success">
			 									<div id="impression"></div>

												<div class="form-group" >
													<div id="" class="box-content">
					 									<div class="form-group" >
					 										<!-- <center> -->
						 										<div class="col-sm-4"></div>
																<label class="col-sm-2 control-label">Actual</label>
																<div class="col-sm-2">
																	<input type="text" class="form-control" name="modal_nombre" disabled id="keyu" value='{{ $items[0]["UserJoomla"] }}' /><br>
																</div>
															<!-- </center> -->
														</div>
													    <div id="cargar"></div>
													</div>
													<div class="col-sm-9"></div>
													
													<div class="col-sm-3">
														<button  data-loading-text="Loading..." id="guardaru" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-save"></i></span> Guardar</button>
													</div>													

												</div>
												<div id="erroru">
													
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



$('#guardaru').click(function(e) {
	e.preventDefault();
	$('#errory').html("<center><label class='col-sm-12 txt-danger'></label></center>");
	var sel = $('#datatable-1').DataTable();
	if (sel.row('.selected').node()!=null) {
		// console.log(sel.row('.selected').data());
		$.ajax({
			url: "{{URL::route('idsave')}}",
			type: 'POST',
			data: {idu: sel.row('.selected').data()},
			beforeSend: function(){
	            $('#guardaru').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
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
			if(data.success=='true'){
				$('#keyu').val(data.actual);
				$('#erroru').html("<center><label class='col-sm-12 alert alert-success'>"+data.list+"</label></center>");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			$('#guardaru').html('<span><i class="fa fa-save"></i></span> Guardar');
		});
		
		
	}
	else{
		$('#erroru').html("<center><label class='col-sm-12 txt-danger'>Seleccione un Usuario</label></center>");
	};
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

function VerTablaVacia(){
	$('#cargar').html('<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></thead><tbody></tbody></table>');
	$('#datatable-1').DataTable({
		
		"lengthMenu": [ 10, 20, 30, 40, 50, 100 ],
		"language": {
						"info": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)",
						"paginate": {
					       				 	"next": "Siguiente",
					       				 	"previous": "Anterior",
					       				 	"sFirst": "Primero",
                                            "sLast": "Ultimo",

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


function VerTablaUsuarios(datos){
	
	$('#cargar').html(datos.list);
	$('#datatable-1').DataTable({
		
		"lengthMenu": [ 15, 25, 35, 40, 50, 100 ],
		"language": {
						"info": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)",
						"paginate": {
					       				 	"next": "<i class='fa fa-forward'></i>",
					       				 	"previous": "<i class='fa fa-backward'>",

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


function Users(){
	$.ajax({
		url: "{{URL::route('saveuserjoomla')}}",
		type: 'POST',
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
			// console.log(data);
			VerTablaUsuarios(data);
			CambiarColorTabla();
			// SeleccionClick();
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
		console.log("complete");
	});
	
}
jQuery(document).ready(function($) {
	// Create jQuery-UI tabs
	$("#tabs").tabs();
	// Sortable for elements
	$(".sort").sortable({
		items: "div.col-sm-2",
		appendTo: 'div.box-content'
	});

	Users();

});


$('#guardary').click(function(e) {
	e.preventDefault();
	$('#errory').html("<center><label class='col-sm-12 txt-danger'></label></center>");
	if ($('#ykey').val()!='') {
		$.ajax({
			url: "{{URL::route('saveyoutube')}}",
			type: 'POST',
			data: {ykey: $('#ykey').val()},
			beforeSend: function(){
	            $('#guardary').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
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
			if(data.success=='true'){
				$('#errory').html("<center><label class='col-sm-12 alert alert-success'>"+data.list+"</label></center>");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			$('#guardary').html('<span><i class="fa fa-save"></i></span> Guardar');
		});
		
	}
	else{
		$('#errory').html("<center><label class='col-sm-12 txt-danger'>Ingrese un valor de Api Key</label></center>");
	}
});

$('#guardarv').click(function(e) {
	e.preventDefault();
	$('#errorv').html("<center><label class='col-sm-12 txt-danger'></label></center>");
	if ($('#idv').val()!='') {
		if($('#secv').val()!=''){
			if($('#tokenv').val()!=''){
				$.ajax({
					url: "{{URL::route('savevimeo')}}",
					type: 'POST',
					data: {id: $('#idv').val() ,secret: $('#secv').val() ,token: $('#tokenv').val()},
					beforeSend: function(){
			            $('#guardarv').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
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
					if(data.success=='true'){
						$('#errorv').html("<center><label class='col-sm-12 alert alert-success'>"+data.list+"</label></center>");
					}
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					$('#guardarv').html('<span><i class="fa fa-save"></i></span> Guardar');
				});
				
			}
			else{
				$('#errorv').html("<center><label class='col-sm-12 txt-danger'>Ingrese un valor de Token Id</label></center>");
			}
			
		}
		else{
			$('#errorv').html("<center><label class='col-sm-12 txt-danger'>Ingrese un valor de Secret Id</label></center>");
		}
		
	}
	else{
		$('#errorv').html("<center><label class='col-sm-12 txt-danger'>Ingrese un valor de Client Id</label></center>");
	}
});


$('#guardarf').click(function(e) {
	e.preventDefault();
	$('#errorf').html("<center><label class='col-sm-12 txt-danger'></label></center>");
	if ($('#idf').val()!='') {
		if($('#secf').val()!=''){
			$.ajax({
				url: "{{URL::route('savefacebook')}}",
				type: 'POST',
				data: {id: $('#idf').val() , secret: $('#secf').val()},
				beforeSend: function(){
		            $('#guardary').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
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
					if(data.success=='true'){
						$('#errorf').html("<center><label class='col-sm-12 alert alert-success'>"+data.list+"</label></center>");
					}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				$('#guardarf').html('<span><i class="fa fa-save"></i></span> Guardar');
			});
			
			
		}
		else{
			$('#errorf').html("<center><label class='col-sm-12 txt-danger'>Ingrese un valor de App Secret </label></center>");
		}
		
	}
	else{
		$('#errorf').html("<center><label class='col-sm-12 txt-danger'>Ingrese un valor de App Id</label></center>");
	}
});

$('#guardart').click(function(e) {
	e.preventDefault();
	$('#errort').html("<center><label class='col-sm-12 txt-danger'></label></center>");
	if ($('#keyt').val()!='') {
		if($('#sect').val()!=''){
			$.ajax({
				url: "{{URL::route('savetwitter')}}",
				type: 'POST',
				data: {key: $('#keyt').val() , secret: $('#sect').val()},
			})
			.done(function(data) {
					if(data.success=='true'){
						$('#errort').html("<center><label class='col-sm-12 alert alert-success'>"+data.list+"</label></center>");
					}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				$('#guardart').html('<span><i class="fa fa-save"></i></span> Guardar');
			});
			
			
		}
		else{
			$('#errort').html("<center><label class='col-sm-12 txt-danger'>Ingrese un valor de Consumer Secret</label></center>");
		}
		
	}
	else{
		$('#errort').html("<center><label class='col-sm-12 txt-danger'>Ingrese un valor de Consumer Key</label></center>");
	}
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


</script>

</body>