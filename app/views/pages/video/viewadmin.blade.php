<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/tables/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="css/tables/jquery.dataTables.css">

<script type="text/javascript" language="javascript" src="js/jsfunctions/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="js/jsfunctions/dataTables.responsive.js"></script>
</head>
<body>
<br>
<div class="row">
	
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-video-camera"></i>
					<span>Administrar Videos</span>
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
				<!-- <div class="panel panel-default"> -->
					<div id="tabs">
						<ul  class="list-inline">
							<!-- <li><a class="btn btn-default btn-app-sm " data-toggle="tooltip" data-placement="bottom" title="YouTube"  href="#tabs-1"><i class="fa fa-youtube txt-danger" ></i></a></li>
							<li><a class="btn btn-default btn-app-sm " data-toggle="tooltip" data-placement="bottom" title="Vimeo" href="#tabs-2"><i class="fa fa-vimeo-square txt-info"></i></a></li> -->
							<li><a  data-toggle="tooltip" data-placement="bottom" title="YouTube"  href="#tabs-1"><i class="fa fa-youtube txt-danger" ></i> YouTube</a></li>
							<li><a data-toggle="tooltip" data-placement="bottom" title="Vimeo" href="#tabs-2"><i class="fa fa-vimeo-square txt-info"></i> Vimeo</a></li>
						</ul>
						<div id="tabs-1">
							<div class="panel panel-danger">
								<div class="alert alert-danger" role="alert">
								  <i class="fa fa-youtube-square" ></i> 
								  YouTube
								</div>
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div  class="panel panel-default">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										    <div  class="panel-heading" role="tab" id="headingOne">
										      <h4 class="panel-title">
										       
										         Obtener Video <a tabindex="0" data-toggle="popover" data-trigger="focus" id="info1" class="" ><i class="fa fa-info-circle" ></i></a>
										        
										      </h4>
										    </div>
										</a>
									    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									      <div class="panel-body">
									        <!-- <label id="info_criterio" class="col-sm-12 text-center"><span  class="label label-info "><i class="fa fa-info-circle" ></i> Obtener datos de un video mediante su Id </span></label> -->
											<form id="DelDataPersonalForm" method="POST"  action="" class="form-horizontal">
								        		<fieldset>
								        		<div class="form-group" >
									        		<label class="col-sm-2 control-label" >Criterio: </label>
												  	<div class="col-sm-3">
														<select class="populate placeholder" name="criterio" id="criterio" disabled>
														<option  value="">-- Seleccione un Criterio --</option>
														<option  selected value="0">getVideoInfo</option>

														</select>
													</div>
													
													
												</div>

												<div class="form-group" >
													<label class="col-sm-2 control-label">Video Id: </label>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="idvideo" id="idvideo" />
													</div>
												</div>

												<div class="form-group" >

													<div class="col-sm-4 ">
													
													</div>
													<div class="col-sm-4">
															<button  data-loading-text="Loading..." id="buscar1" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Buscar</button>
													</div>
												</div>
												</fieldset>
																							
											</form>

									      </div>
									    </div>
									</div>
									<div class="panel panel-default">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									    <div class="panel-heading" role="tab" id="headingTwo">
									      <h4 class="panel-title">
									        	Videos Populares en un pais 	<a tabindex="0" data-toggle="popover" data-trigger="focus" id="info2" class="" ><i class="fa fa-info-circle" ></i></a>
									        	
									      </h4>
									    </div>
									    </a>
									    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									      <div class="panel-body">
									       		<form id="" method="POST"  action="" class="form-horizontal">
									        		<fieldset>
									        		<div class="form-group" >
										        		<label class="col-sm-2 control-label" >Criterio: </label>
													  	<div class="col-sm-3">
															<select class="populate placeholder" name="criterio2" id="criterio2" disabled>
															<option  value="">-- Seleccione un Criterio --</option>
															<option  selected value="0">getPopularVideos</option>

															</select>
														</div>
														
														
													</div>

													<div class="form-group" >
														<label class="col-sm-2 control-label">Codigo de Region: </label>
														<div class="col-sm-3">
															<select class="populate placeholder" name="region" id="region" >
															<option  value="">-- Seleccione un codigo --</option>
															<option  value="au">Australia</option>
															<option  value="br">Brasil</option>
															<option  value="ca">Canada</option>
															<option  value="fr">Francia</option>
															<option  value="de">Alemania</option>
															<option  value="gb">Gran Bretaña</option>
															<option  value="hk">Hong Kong</option>
															<option  value="ie">Irlanda</option>
															<option  value="it">Italia</option>
															<option  value="jp">Japon</option>
															<option  value="mx">Mexico</option>
															<option  value="nz">Nueva Zelanda</option>
															<option  value="ru">Rusia</option>
															<option  value="kr">Korea del Sur</option>
															<option  value="es">España</option>
															<option  value="tw">Taiwan</option>
															<option  value="us">USA</option>
															</select>
														</div>
													</div>

													<div class="form-group" >
														<label class="col-sm-2 control-label">Categoria: </label>
														<div class="col-sm-3" id="listarcategorias">
															
														</div>
													<!-- </div> -->

													<!-- <div class="form-group" > -->
														
														<!-- <div class="form-group" > -->
															<label  class="col-sm-2 control-label">Max Result: </label>
															<div class="col-sm-1">
																<input type="text" class="form-control" name="maxregion" id="maxregion" value="10" />
															</div>
															<div  id='uniq'></div>
															<div class="col-sm-2">
																<button  data-loading-text="Loading..." id="buscar2" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Buscar</button>
															</div>
														</div>	
														
													<!-- </div> -->
													</fieldset>
																								
												</form>

									      </div>
									    </div>
									</div>

									<div class="panel panel-default">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									    <div class="panel-heading" role="tab" id="headingThree">
									      <h4 class="panel-title">
									        
									          Videos Mas Vistos <a tabindex="0" data-toggle="popover" data-trigger="focus" id="info3" class="" ><i class="fa fa-info-circle" ></i></a>
									        
									      </h4>
									    </div>
									    </a>
									    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									    <div class="panel-body">
												    <div class="form-group" >
														<label class="col-sm-2 control-label">Ordenar por: </label>
														<div class="col-sm-2">
															<select class="populate placeholder" name="ordenarmasv" id="ordenarmasv" >
															<!-- <option  value="">-- Seleccione un codigo --</option> -->
															<option  value="date">Fecha</option>
															<option  value="rating">Calificacion</option>
															<option  value="relevance">Relevancia</option>
															<option  value="title">Titulo</option>
															<option  value="videoCount">Videos Subidos</option>
															<option  value="viewCount">Reproducciones</option>
															</select>
														</div>
														<label  class="col-sm-2 control-label">Max Result: </label>
														<div class="col-sm-2">
																<input type="text" class="form-control" name="maxmas" id="maxmas" value="10" />
														</div>
														<div class="col-sm-2">
																<button  data-loading-text="Loading..." id="buscar3" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Buscar</button>
														</div>
													</div>
									    					
														    
									    </div>
									    </div>
									</div>
									<div class="panel panel-default">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									    <div class="panel-heading" role="tab" id="headingFour">
									      <h4 class="panel-title">
									        
									          Busqueda Avanzada <a tabindex="0" data-toggle="popover" data-trigger="focus" id="info3" class="" ><i class="fa fa-info-circle" ></i></a>
									        
									      </h4>
									    </div>
									    </a>
									    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
									    <div class="panel-body">
												    <div class="form-group" >
														
														<label  class="col-sm-2 control-label">Buscar: </label>
														<div class="col-sm-9">
																<input type="text" class="form-control" name="buscarq" id="buscarq" />
														</div>
													</div>
													<br>
													<div class="form-group" >
														<label  class="col-sm-2 control-label">Max Result: </label>
														<div class="col-sm-2">
																<input type="text" class="form-control" name="maxq" id="maxq" value="10" />
														</div>
														<div class="col-sm-2"></div>												
														
														<label class="col-sm-2 control-label">Evento: </label>
														<div class="col-sm-3">
															<select class="populate placeholder" name="eventoq" id="eventoq" >
															<option  value="">-- Seleccione un evento --</option>
															<option  value="completed">Transmisiones Finalizadas</option>
															<option  value="live">Transmisiones en Vivo</option>
															<option  value="upcoming">Proximas Transmisiones</option>
															</select>
														</div>
														
														
													</div>
													<br>
													<div class="form-group" >
														<label class="col-sm-3 control-label">Restriccion de Contenido : </label>
														<div class="col-sm-8">
															<select class="populate placeholder" name="contenidoq" id="contenidoq" >
															<option  value="">-- Seleccione una restriccion --</option>
															<option  value="none">No Filtrar Resultados</option>
															<option  value="moderate">Filtrar el contenido que está restringido para la configuración regional</option>
															<option  value="strict">Excluir del conjunto de resultados de búsqueda todo el contenido restringido</option>
															
															</select>
														</div>
														<br>
														
									    			</div>	
									    			<div class="form-group" >
									    				<label class="col-sm-2 control-label">Subtitulos : </label>
														<div class="col-sm-3">
															<select class="populate placeholder" name="subq" id="subq" >
															<option  value="">-- Seleccione una opcion --</option>
															<option  value="any">No Filtrar Resultados</option>
															<option  value="closedCaption">Videos que tengan subtítulos</option>
															<option  value="none">Videos que no tengan subtítulos</option>
															
															</select>
														</div>
														<div class="col-sm-1"></div>
														<label class="col-sm-2 control-label">Categoria: </label>
														<div class="col-sm-3" id="listarcategoriasq">
															
														</div>
													</div>
													<br>	
													<div class="form-group" >
														<label class="col-sm-2 control-label">Definicion : </label>
														<div class="col-sm-3">
															<select class="populate placeholder" name="definicionq" id="definicionq" >
															<option  value="">-- Seleccione una Definicion --</option>
															<option  value="any">Mostrar todos los videos</option>
															<option  value="high">Videos de Alta Definición</option>
															<option  value="standard">Videos de Definición Estándar</option>
															
															</select>
														</div>
														<div class="col-sm-1"></div>
														<label class="col-sm-2 control-label">Dimension : </label>
														<div class="col-sm-3">
															<select class="populate placeholder" name="dimensionq" id="dimensionq" >
															<option  value="">-- Seleccione una Dimension --</option>
															<option  value="any">Videos en 3D y que no sean 3D</option>
															<option  value="2d">Excluir los videos en 3D</option>
															<option  value="3d">Incluir solo videos en 3D</option>
															
															</select>
														</div>
														<!-- <br> -->

														<!-- <div class="col-sm-2">
																<button  data-loading-text="Loading..." id="buscar4" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Buscar</button>
														</div> -->
									    			</div>	
									    			<br>

									    			<div class="form-group" >
										    			<label class="col-sm-2 control-label">Duracion : </label>
														<div class="col-sm-3">
															<select class="populate placeholder" name="duracionq" id="duracionq" >
															<option  value="">-- Seleccione una Duracion --</option>
															<option  value="any">No filtrar</option>
															<option  value="long">Largo (> 20 minutos)</option>
															<option  value="medium">Entre 4 y 20 minutos</option>
															<option  value="short">Corto (< 4 minutos)</option>
															</select>
														</div>
														<div class="col-sm-1"></div>
														<label class="col-sm-2 control-label">Embeddable : </label>
														<div class="col-sm-3">
															<select class="populate placeholder" name="embedq" id="embedq" >
															<option  value="">-- Seleccione una opcion --</option>
															<option  value="any">Mostrar todos los videos</option>
															<option  value="true">Solo los videos que se puedan insertar</option>
															</select>
														</div>
														<!-- <br> -->
													</div>
													<br>

													<div class="form-group" >
										    			<label class="col-sm-2 control-label">Licencia: </label>
														<div class="col-sm-3">
															<select class="populate placeholder" name="licenciaq" id="licenciaq" >
															<option  value="">-- Seleccione una Licencia --</option>
															<option  value="any">Independiente de licencia que posea</option>
															<option  value="creativeCommon">Licencia de Creative Commons</option>
															<option  value="youTube">Licencia estándar de YouTube</option>
															</select>
														</div>
														<div class="col-sm-1"></div>
														<label class="col-sm-2 control-label">Syndicated : </label>
														<div class="col-sm-3">
															<select class="populate placeholder" name="synq" id="synq" >
															<option  value="">-- Seleccione una opcion --</option>
															<option  value="any">Mostrar todos los videos</option>
															<option  value="true">Mostrar videos distribuidos</option>
															</select>
														</div>
													</div>
													<br>
													<div class="form-group" >
										    			<label class="col-sm-2 control-label">Tipo: </label>
														<div class="col-sm-3">
															<select class="populate placeholder" name="tipoq" id="tipoq" >
															<option  value="">-- Seleccione un Tipo --</option>
															<option  value="any">Mostrar todos los videos</option>
															<option  value="episode">Recuperar solo episodios de programas</option>
															<option  value="movie">Recuperar solo películas</option>
															</select>
														</div>
														<div class="col-sm-1"></div>
														<label class="col-sm-2 control-label">Ordenar: </label>
														<div class="col-sm-3 ">
															<select class="populate placeholder" name="orderq" id="orderq" >
															<option  value="">-- Seleccione una opcion --</option>
															<option  value="date">Fecha</option>
															<option  value="rating">Calificacion</option>
															<option  value="relevance">Relevancia</option>
															<option  value="title">Titulo</option>
															<option  value="viewCount">Reproducciones</option>
															</select>
														</div>
														<!-- <div class="col-sm-4">
																<button  data-loading-text="Loading..." id="buscar4" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Buscar</button>
														</div> -->
													</div>
													<br>
													<div class="form-group" >
										    			<label for="datetime_despuesq" class="col-sm-2 control-label">Despues de: </label>
														<div class="col-sm-3">
															<input type="text" class="form-control" name="despuesq" id="datetime_despuesq"  placeholder="aaaa-mm-dd hh:mm"  />
														</div>
														<div class="col-sm-1"></div>
														<label for="datetime_antesq" class="col-sm-2 control-label">Antes de: </label>
														<div class="col-sm-3 ">
															<input type="text" class="form-control" name="antesq" id="datetime_antesq" placeholder="aaaa-mm-dd hh:mm"  />
														</div>
														<!-- <div class="col-sm-4">
																<button  data-loading-text="Loading..." id="buscar4" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Buscar</button>
														</div> -->
													</div>
													<br>
													<div class="form-group" >
										    			
														<div class="col-sm-9"></div>
														
														<div class="col-sm-3">
																<button  data-loading-text="Loading..." id="buscar4" type="submit" class="btn btn-primary btn-label-left"><span><i class="fa fa-search"></i></span> Buscar</button>
														</div>
													</div>
														    
									    </div>
									    </div>
									</div>
								</div>

							</div>
						</div>
						<div id="tabs-2">
							<div class="panel panel-info">
								<div class="alert alert-info" role="alert">
								  <i class="fa fa-vimeo-square" ></i> 
								  Vimeo
								</div>
							</div>
						</div>
						
					</div>
				
			</div>
		</div>
	</div>
</div>

<!-- <a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span> Editar</a> -->
<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-table"></i>
					<span>Videos Encontrados</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					
				</div>
				<div class="no-move"></div>
			</div>
				<div class="box-content">
					
						<div style="overflow:scroll;" >
							<div id="listresult">
								
							</div>
	
					</div>
				</div>

		</div>
	</div>
	<center><button id="enviaralavista" type="submit" class="btn btn-primary btn-label-left btn-lg"><span><i class="fa fa-save"></i></span> Guardar</button></center>
	<!--edit -->

	<div id="modaldataedit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal">
		<div class="modal-dialog modal-lg">   
		  <div class="modal-content"> 
		     <div class="modal-header alert alert-info">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		        ×
		        </button>
		        <h3>Editar Datos de Video</h3>
		     </div>
		     <div class="modal-body">

		        	<form id="EditDataVideoForm" method="POST"  action="{{URL::route('useredit')}}" class="form-horizontal">
		        		<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles">Titulo:</label>
							<div class="col-sm-8">
									<input type="text" class="form-control" placeholder="Titulo" data-toggle="tooltip" data-placement="bottom" title="Titulo del video" id="tituloalavista">
							</div>
						</div>
						<label class=" control-label" for="form-styles">Descripcion:</label>
						<div class="form-group">
							
							<div class="col-sm-12">
									<textarea class="form-control" rows="10" id="wysiwig_full"></textarea>
							</div>
						</div>
						<div class="form-group" >
			        		<label class="col-sm-2 control-label" >Categoria: </label>
						  	<div id='dcatalavista' class="col-sm-4">
								
							</div>
							
						  	<!-- <div class="col-sm-4">
								<select class="populate placeholder" name="nivelalavista" id="nivelalavista" >
								<option  selected value="">-- Seleccione un Nivel --</option>
								<option  value="niv1">-- n1 --</option>
								<option  value="niv2">-- n2 --</option>
								</select>
							</div> -->
							
						</div>
						<div class="form-group" >
							<label class="col-sm-2 control-label" >Id Video: </label>
							<label id="idalavista" class="col-sm-2 control-label" > </label>
							
						  	<!-- <div class="col-sm-4">
								<select class="populate placeholder" name="estadoalavista" id="estadoalavista" >
								<option  selectedvalue="">-- Seleccione un Estado --</option>
								</select>
							</div> -->
						</div>
					</form>

		     </div>
		     <div id="uniqedit"></div>
		     <div class="modal-footer">
		        <!-- <a href="#" class="btn btn-primary">Guardar</a> -->
		        <button id="guardaralavista" type="submit" class="btn btn-primary btn-label-left btn-lg"><span><i class="fa fa-save"></i></span> Guardar</button>
		        <a id="cerraralavista" href="#" data-dismiss="modal" class="btn btn-default btn-label-left btn-lg"><span><i class="fa fa-arrows-alt"></i></span>Cerrar</a>
		        
		        <div id='cargar'></div>

		     </div>
		     
			</div>

		</div>
	</div>


<script type="text/javascript">


$('#enviaralavista').click(function(event) {
	/* Act on the event */
	event.preventDefault();
	$.each(datas.items, function(n) {
				 /* iterate through array or object */
				 
				 	datas.items[n].sel=false;
				 
			
			});

	$("input:checkbox:checked").each(   
	    function() {
	    	var a=$(this).val();
	        // alert("El checkbox con valor " + a + " está seleccionado");
	        $.each(datas.items, function(n) {
				 /* iterate through array or object */
				 if(datas.items[n].ide ==a){
				 	// datas.items.push(item);
				 	datas.items[n].sel=true;
				 }
				 
				 // console.log(datas.items[n].ide+' '+datas.items[n].sel);
			});
	    }
	);


	// console.log(datas);
	
	$.ajax({
		url: "{{URL::route('savealavista')}}",
		type: 'POST',
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {videos: datas},
	})
	.done(function(data) {
		console.log("success22");
		if(data.success==true){
			console.log((data.list));
		}
		if(!data.success){
			console.log((data.list));
		}
		
	})
	.fail(function(data) {
		console.log("error");
	})
	.always(function(data) {
		console.log("complete");
	});
});




//add object
var datas = {items: 
	[
	    // {ide: "ide", titulo: "titulo", descr: "descripcion", emb: "emb" , act: "cat"},
	]};
		


// $("#guardaralavista").click(function(e) {
// 	/* Act on the event */
// 	e.preventDefault();

 	
//  	console.log(getFormJson($("#categoriaalavista").val(),$("#nivelalavista").val(),$("#tituloalavista").val()));
// });

function getFormJson(a,b,c,d,e,f){

	var item = { ide: a, titulo: b, descr: c ,emb: d, cat:e , sel: f};
		
		datas.items.push(item);

		return datas;
};
//add object




$(document).ready(function() {

	//cargar categorias de alavista
		$.ajax({
		url: "{{URL::route('categoryalavista')}}",
		type: 'POST',
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		// data: {param1: 'value1'},
		})
		.done(function(data) {
			console.log("success");
			if(data.success){
				$('#dcatalavista').html(data.list);
				function DemoSelect2(){
						$('#categoriaalavista').select2();
					};
					LoadSelect2Script(DemoSelect2);
					$('#wysiwig_full').html('text1');
							$('#tituloalavista').val('text2');
			}
			

		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
		});





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
	// Run beauty tables plugin on every table with class .beauty-table
	// $('.beauty-table').each(function(){
	// 	// Run keyboard navigation in table
	// 	$(this).beautyTables();
	// 	// Nice CSS-hover row and col for current cell
	// 	$(this).beautyHover();
	// });
	//load select categorias para region
	$.ajax({
		url: "{{URL::route('categoriesvideos')}}",
		type: 'POST',
	})
	.done(function(data) {
		if(data.success==true){
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
	})
	.done(function(data) {
		if(data.success==true){
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
};
//informacion al seleccionar un criterio
// $("#criterio").change(function(e) {
// 	// alert($("#criterio").val());
// 	if($("#criterio").val() != '')
// 	{
// 		var array = ['Obtenga informacion de un video', "Obtenga videos populares en un país","Buscar listas de reproducción, canales y vídeos","Buscar sólo Videos","Buscar sólo Videos en un canal determinado","Obtenga informacion de un canal","Buscar con argumentos para mostrar datos de página como página de fichas"];
// 		$("#info_criterio").html('<span  class="label label-info"><i class="fa fa-info-circle" ></i> '+array[$("#criterio").val()]+'</span>');	
// 	}
// 	else{
// 		$("#info_criterio").html('<span  class="label label-info"><i class="fa fa-info-circle" ></i></span>');	
// 	}
// });
// acordion eventos
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
	e.preventDefault();
	$('#info1').popover({
        title: 'Informacion',
        content: 'Obtenga informacion de un video, mediante el ID',
        placement: 'right',
        animation: 'true'
    });
});
$('#info2').mouseenter(function(e) {
	e.preventDefault();
	$('#info2').popover({
        title: 'Informacion',
        content: 'Obtenga informacion videos, mediante el Codigo Region',
        placement: 'right',
        animation: 'true'
    });
});
$('#info3').mouseenter(function(e) {
	e.preventDefault();
	$('#info3').popover({
        title: 'Informacion',
        content: 'Obtenga informacion de los videos mas vistos, ordenados deacuerdo a un criterio',
        placement: 'right',
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
		            alert('Internal Server Error [500].');
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
//buscar por codigo de region
$("#buscar2").click(function(e) {
	/* Act on the event */
	e.preventDefault();
	
	$.ajax({
		url: "{{URL::route('getpopularvideos')}}",
		type: 'POST',
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {cod: $('#region').val(),categ: $('#rcategoria').val(), max : $('#maxregion').val()},
		beforeSend: function(){
	    			// alert("message");
                    $('#buscar2').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
                },
        error: function(jqXHR, exception) {
		        if (jqXHR.status === 0) {
		            alert('Error de conexión, verifica tu instalación.');
		        } else if (jqXHR.status == 404) {
		            alert('La página no ha sido encontrada. [404]');
		        } else if (jqXHR.status == 500) {
		            alert('Internal Server Error [500].');
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
					$('#uniq').html('<label></label>');
					// alert(data.msg);
					$('#buscar2').html('<span><i class="fa fa-search"></i></span> Buscar');
					$('#listresult').html(data.resultobt);
									
						$('#datatable-1').DataTable({
			
						});
						//cambiar de color al pasar el puntero
						$("#datatable-1 tr").mouseenter(function(){
						        $(this).css('background-color','#369');
						        $(this).css('color','white');
						    });
						    $("#datatable-1 tr").mouseleave(function(){
						        $(this).css('background-color','#F4F4F4');
						        $(this).css('color','#333');
						    });
					// });
				}
		if(data.success=='false'){
					$('#buscar2').html('<span><i class="fa fa-search"></i></span> Buscar');
					$('#uniq').html('<label></label>');
					$('#uniq').append('<legend id="uniq" class="alert alert-danger">'+data.resultobt+'</legend>');
					// alert(data.resultobt);
					// alert('Internal Server Error [500].');
				}
	})
	.fail(function() {
		console.log("error");
		$('#buscar2').html('<span><i class="fa fa-search"></i></span> Buscar');
	})
	.always(function() {
		console.log("complete");
	});
});
$("#buscar3").click(function(e) {
	/* Act on the event */
	e.preventDefault();
	
	$.ajax({
		url: "{{URL::route('videosmasvistos')}}",
		type: 'POST',
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {order : $('#ordenarmasv').val() , max : $('#maxmas').val()},
		beforeSend: function(){
					datas = {items: 
					[
					    // {ide: "ide", titulo: "titulo", descr: "descripcion", emb: "emb" , act: "cat"},
					]};
	    			// alert("message");
                    $('#buscar3').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
                },
        error: function(jqXHR, exception) {
		        if (jqXHR.status === 0) {
		            alert('Error de conexión, verifica tu instalación.');
		        } else if (jqXHR.status == 404) {
		            alert('La página no ha sido encontrada. [404]');
		        } else if (jqXHR.status == 500) {
		            alert('Internal Server Error [500].');
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
		if(data.success==true){
					// alert(data.msg);
					$('#buscar3').html('<span><i class="fa fa-search"></i></span> Buscar');
					// $('#listresult').html(data.resultobt);
					$('#listresult').html(data.list);
					$('#datatable-1').DataTable({
						// "bPaginate": false
						"language": {
						"info": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)"
						}
						});
						//cambiar de color al pasar el puntero
						$("#datatable-1 tr").mouseenter(function(){
						        $(this).css('background-color','#369');
						        $(this).css('color','white');
						    });
						    $("#datatable-1 tr").mouseleave(function(){
						        $(this).css('background-color','#F4F4F4');
						        $(this).css('color','#333');
						    });


					// var yea=document.getElementById("datatable-1").rows.length;
					// // alert(yea);
					// oTable = $('#datatable-1').dataTable();
					// if(yea != 0){
					// 	var aData = oTable.fnGetData( aPos[0] );
					// }
					
					var oTable = $('#datatable-1').dataTable();
					// alert(oTable.fnGetData().length);
					var di=oTable.fnGetData().length;
					// alert('dim'+di);
					// oTable.rows().data().length
					if(di > 0){

						for (var i = 0 ; i < di; i++) {
							var aData = oTable.fnGetData( i );
							// console.log('vale'+aData);
							getFormJson(aData[3],aData[4],aData[5],aData[2],'','')
						};
						

						

						// alert('pasa'+di);
					}
					console.log(datas);
						    // tabla obj




						$('#datatable-1 tbody td').click( function () {
							//  oTable = $('#datatable-1').dataTable();
							//  var aPos = oTable.fnGetPosition( this );
							//  var aData = oTable.fnGetData( aPos[0] );

							// $('#wysiwig_full').val(aData[4]);
							// $('#tituloalavista').val(aData[3]);
							// $('#idalavista').text(aData[2]);


							

					         // Get the position of the current data from the node
					         

					         oTable = $('#datatable-1').dataTable();
					         var aPos = oTable.fnGetPosition( this );
					 		// alert(aPos);
					         // // Get the data array for this row
					         var aData = oTable.fnGetData( aPos[0] );
					          // JSON.parse(aData);
					         var dim= aData.length;
					         $('#wysiwig_full').val(aData[5]);
							 $('#tituloalavista').val(aData[4]);
							 $('#idalavista').text(aData[3]);

					         console.log(aData[3]+' '+aData[4]+' '+aData[5]);
					 		// alert(aData);
					         // // Update the data array and return the value
					         // aData[ aPos[1] ] = 'clicked';
					         // this.innerHTML = 'clicked';


					       } );
									
				}
		if(data.success=='falserollb'){
					// alert('Internal Server Error [500].');
				}
	})
	.fail(function() {
		console.log("error");
		$('#buscar3').html('<span><i class="fa fa-search"></i></span> Buscar');
	})
	.always(function() {
		console.log("complete");
	});
});
$("#buscar4").click(function(e) {
	/* Act on the event */
	e.preventDefault();
	
	$.ajax({
		url: "{{URL::route('busquedaavanzada')}}",
		type: 'POST',
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {q : $('#buscarq').val() , max:$('#maxq').val() , evento: $('#eventoq').val(), restri:$('#contenidoq').val() , sub:$('#subq').val() , cat:$('#qcategoria').val() , def:$('#definicionq').val() , dim:$('#dimensionq').val() , dur:$('#duracionq').val() , emb:$('#embedq').val() , lic:$('#licenciaq').val() , syn:$('#synq').val() , tipo:$('#tipoq').val() , order:$('#orderq').val() , despues:$('#datetime_despuesq').val() , antes:$('#datetime_antesq').val() },
		beforeSend: function(){
	    			// alert("message");
                    $('#buscar4').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
                },
        error: function(jqXHR, exception) {
		        if (jqXHR.status === 0) {
		            alert('Error de conexión, verifica tu instalación.');
		        } else if (jqXHR.status == 404) {
		            alert('La página no ha sido encontrada. [404]');
		        } else if (jqXHR.status == 500) {
		            alert('Internal Server Error [500].');
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
		if(data.success==true){
					// alert(data.msg);
					$('#buscar4').html('<span><i class="fa fa-search"></i></span> Buscar');
					// $('#listresult').html(data.resultobt);
					$('#listresult').html(data.list);
					$('#datatable-1').DataTable({
			
						});
						//cambiar de color al pasar el puntero
						$("#datatable-1 tr").mouseenter(function(){
						        $(this).css('background-color','#369');
						        $(this).css('color','white');
						    });
						    $("#datatable-1 tr").mouseleave(function(){
						        $(this).css('background-color','#F4F4F4');
						        $(this).css('color','#333');
						    });
									
				}
		if(data.success=='falserollb'){
					// alert('Internal Server Error [500].');
				}
	})
	.fail(function() {
		console.log("error");
		$('#buscar4').html('<span><i class="fa fa-search"></i></span> Buscar');
	})
	.always(function() {
		console.log("complete");
	});
});



//borrar datos de modal
$('#modaldataedit').on('hidden.bs.modal', function (){
  // keyboard: false
  // alert('Modal is successfully shown!');
  	$('#mtituloalavista').val("");
 	$('#descripcionalavista').val("");
 	$('#idalavista').text("");  
});


$('#guardaralavista').click(function(et) {
	/* Act on the event */
	et.preventDefault();
	console.log(datas.items[0].ide);
	// JSON.parse(datas);
	// console.log(datas);
	$.each(datas.items, function(n) {
		 /* iterate through array or object */
		 if(datas.items[n].ide ==$('#idalavista').text()){
		 	// datas.items.push(item);
		 	datas.items[n].ide=$('#idalavista').text();
		 	datas.items[n].titulo=$('#tituloalavista').val();
		 	datas.items[n].descr=$('#wysiwig_full').val();
		 	datas.items[n].cat=$('#categoriaalavista').val();
		 }
		 console.log(datas.items[n].ide+' '+datas.items[n].titulo+': '+datas.items[n].descr+': '+datas.items[n].emb+': '+datas.items[n].cat);
	});


	
	// console.log(datas);
});



</script>




</body>