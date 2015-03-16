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
<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-table"></i>
					<span>Videos</span>
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


<!--modal share perfil -->
	<div id="modalshareprofile" class="modal fade">
	<div class="modal-dialog">   
	  <div class="modal-content"> 
	     <div class="modal-header alert alert-info">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        ×
	        </button>
	        <h4>Publicar en Facebook</h4>
	     </div>
	     <div class="modal-body">

	        	<form id="ShareProfileForm" method="POST"  action="" class="form-horizontal">
	        		<fieldset>
	        			<div class="form-group">
	        			<!--<label id="linkvideo"  style="display:none" ></label> -->
	        			<input type="text" id="linkvideo" name="linkvideo" style="display:none" />
						<img class="col-sm-3 " src="" id="imgvideo" width="600px"  />
						<div class="col-sm-8">	
						<h4 id="titlevideo" class="control-label"></h4>
						</div>
						</div>
						<div class="form-group" >
						<label class="col-sm-3 control-label">Mensaje</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="mensaje" id="mensaje"/>
						</div>
						</div>
						<div class="form-group" >
						<label class="col-sm-3 control-label">Descripción</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="descripcion" id="descripcion" height="100px"></textarea>
						</div>
						</div>
					</fieldset>

				</form>
	     </div>
	     <div id="resultshare"></div>
	     <div class="modal-footer">
	        <button onclick="ShareProfile()" type="button" class="btn btn-default" aria-label="Left Align">
                <span class="fa fa-facebook-square txt-primary" aria-hidden="true">Publicar</span>
	     </div>
		</div>

	</div>
	</div>
<!--FIN-->

<!--modal share groups -->
	<div id="modalsharegroups" class="modal fade">
	<div class="modal-dialog">   
	  <div class="modal-content"> 
	     <div class="modal-header alert alert-info">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        ×
	        </button>
	        <h4>Publicar en Facebook</h4>
	     </div>
	     <div class="modal-body">

	        	<form id="ShareProfileForm" method="POST"  action="" class="form-horizontal">
	        		<fieldset>
	        			<div class="form-group">
	        			<!--<label id="linkvideo"  style="display:none" ></label> -->
	        			<input type="text" id="linkvideo_g" name="linkvideo" style="display:none" />
						<img class="col-sm-3 " src="" id="imgvideo_g" width="600px"  />
						<div class="col-sm-8">	
						<h4 id="titlevideo_g" class="control-label"></h4>
						</div>
						</div>
						<div class="form-group" >
						<label class="col-sm-3 control-label">Mensaje</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="mensaje" id="mensaje_g"/>
						</div>
						</div>
						<div class="form-group" >
						<label class="col-sm-3 control-label">Descripción</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="descripcion" id="descripcion_g" height="100px"></textarea>
						</div>
						</div>
					</fieldset>
					<fieldset>
					<legend>Grupos</legend>
					<div class="form-group">
						<div class="col-sm-11">
							<select id="groups" name="modal_menu" multiple="multiple" class="populate placeholder" >
							</select>
						</div>
					</div>
					</fieldset>

				</form>
	     </div>
	     <div id="resultshare_g"></div>
	     <div class="modal-footer">
	        <button onclick="ShareGroups()" type="button" class="btn btn-default" aria-label="Left Align">
                <span class="fa fa-facebook-square txt-primary" aria-hidden="true">Publicar</span>
	     </div>
		</div>

	</div>
	</div>
<!--FIN-->


<!--modal share page -->
	<div id="modalsharepage" class="modal fade">
	<div class="modal-dialog">   
	  <div class="modal-content"> 
	     <div class="modal-header alert alert-info">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        ×
	        </button>
	        <h4>Publicar en Facebook</h4>
	     </div>
	     <div class="modal-body">

	        	<form id="SharePageForm" method="POST"  action="" class="form-horizontal">
	        		<fieldset>
	        			<div class="form-group">
	        			<!--<label id="linkvideo"  style="display:none" ></label> -->
	        			<input type="text" id="linkvideo_p" name="linkvideo" style="display:none" />
						<img class="col-sm-3 " src="" id="imgvideo_p" width="600px"  />
						<div class="col-sm-8">	
						<h4 id="titlevideo_p" class="control-label"></h4>
						</div>
						</div>
						<div class="form-group" >
						<label class="col-sm-3 control-label">Mensaje</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="mensaje" id="mensaje_p"/>
						</div>
						</div>
						<div class="form-group" >
						<label class="col-sm-3 control-label">Descripción</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="descripcion" id="descripcion_p" height="100px"></textarea>
						</div>
						</div>
					</fieldset>
					<fieldset>
					<legend>Páginas</legend>
					<div class="form-group">
						<div class="col-sm-11">
							<select id="pages" name="modal_menu" multiple="multiple" class="populate placeholder" >
							</select>
						</div>
					</div>
					</fieldset>

				</form>
	     </div>
	     <div id="resultshare_p"></div>
	     <div class="modal-footer">
	        <button onclick="SharePages()" type="button" class="btn btn-default" aria-label="Left Align">
                <span class="fa fa-facebook-square txt-primary" aria-hidden="true">Publicar</span>
	     </div>
		</div>

	</div>
	</div>
<!--FIN-->


<!--modal share event -->
	<div id="modalshareevent" class="modal fade">
	<div class="modal-dialog">   
	  <div class="modal-content"> 
	     <div class="modal-header alert alert-info">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        ×
	        </button>
	        <h4>Publicar en Facebook</h4>
	     </div>
	     <div class="modal-body">

	        	<form id="ShareEventForm" method="POST"  action="" class="form-horizontal">
	        		<fieldset>
	        			<div class="form-group">
	        			<!--<label id="linkvideo"  style="display:none" ></label> -->
	        			<input type="text" id="linkvideo_e" name="linkvideo" style="display:none" />
						<img class="col-sm-3 " src="" id="imgvideo_e" width="600px"  />
						<div class="col-sm-8">	
						<h4 id="titlevideo_e" class="control-label"></h4>
						</div>
						</div>
						<div class="form-group" >
						<label class="col-sm-3 control-label">Mensaje</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="mensaje" id="mensaje_e"/>
						</div>
						</div>
						<div class="form-group" >
						<label class="col-sm-3 control-label">Descripción</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="descripcion" id="descripcion_e" height="100px"></textarea>
						</div>
						</div>
					</fieldset>
					<fieldset>
					<legend>Eventos</legend>
					<div class="form-group">
						<div class="col-sm-11">
							<select id="events" name="modal_menu" multiple="multiple" class="populate placeholder" >
							</select>
						</div>
					</div>
					</fieldset>
				</form>
	     </div>
	     <div id="resultshare_e"></div>
	     <div class="modal-footer">
	        <button onclick="ShareEvents()" type="button" class="btn btn-default" aria-label="Left Align">
                <span class="fa fa-facebook-square txt-primary" aria-hidden="true">Publicar</span>
	     </div>
		</div>

	</div>
	</div>
<!--FIN-->




<script type="text/javascript">
$(document).ready(function() {
// Sortable for elements
	$(".sort").sortable({
		items: "div.col-sm-2",
		appendTo: 'div.box-content'
	});
	// Create jQuery-UI tabs
//cargar videos
$.ajax({
		url: "{{URL::route('listvideos')}}",
		type: 'POST',
	})
	.done(function(data) {

		if(data.success==true){

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
		else
		{
			alert(data.list);
		}	
	})
	.fail(function() {
		console.log("error");

	});
});
//funcion para publicar perfil
function showModalProfile(rate,ide,title,image)
{

	link = 'http://localhost/joomla/index.php/player/'+rate+'/'+ide;
	$('#titlevideo').text(title);
	document.getElementById("mensaje").value = "";
	document.getElementById("descripcion").value="";
	//document.getElementById("resultshare").value="";
	document.getElementById('resultshare').innerHTML='';
	document.getElementById("linkvideo").value = link;
	document.getElementById("imgvideo").src = image;
	$('#modalshareprofile').modal('show');
}

function DemoSelect2(){
	//$('#sestado').select2();
	$('#srol').select2();
	$("#groups").empty();
	$("#pages").empty();
	$("#events").empty();
	$('#groups').select2({placeholder: "Seleccione los grupos"});
	$('#pages').select2({placeholder: "Seleccione  las paginas"});
	$('#events').select2({placeholder: "Seleccione  los eventos"});
}
//funcion para publicar en grupo
function showModalGroup(rate,ide,title,image)
{
	LoadSelect2Script(DemoSelect2);

	link = 'http://localhost/joomla/index.php/player/'+rate+'/'+ide;
	$('#titlevideo_g').text(title);
	document.getElementById("mensaje_g").value = "";
	document.getElementById("descripcion_g").value=""; 
	document.getElementById('groups').innerHTML = ''; 
	document.getElementById('resultshare_g').innerHTML='';
	document.getElementById("linkvideo_g").value = link;
	document.getElementById("imgvideo_g").src = image;
	
	$.ajax({
				url: "{{URL::route('listgroups')}}",
				type: 'POST',
				data: {vaue:true},
			})
			.done(function(data) {
				console.log(data.list);
				if(data.success==true){
					$.each(data.list ,function(id)
												   {
												   	$("#groups").append('<option value='+data.list[id].id+'><b>'+data.list[id].name+'</option>');
												   		// console.log(data.list[id].StatusId+' '+data.list[id].StatusDescrip+': '+data.list[id].StatusComent);									   		
												   });
				}
				else
				{
					alert(data.list);
				}
			})
			.fail(function() {
				console.log("error");
			}); 
	$('#modalsharegroups').modal('show');
}

function showModalPage(rate,ide,title,image)
{
	LoadSelect2Script(DemoSelect2);

	link = 'http://localhost/joomla/index.php/player/'+rate+'/'+ide;
	$('#titlevideo_p').text(title);
	document.getElementById("mensaje_p").value = "";
	document.getElementById("descripcion_p").value=""; 
	document.getElementById('pages').innerHTML = ''; 
	document.getElementById('resultshare_p').innerHTML='';
	document.getElementById("linkvideo_p").value = link;
	document.getElementById("imgvideo_p").src = image;
	
	$.ajax({
				url: "{{URL::route('listpages')}}",
				type: 'POST',
				data: {vaue:true},
			})
			.done(function(data) {
				console.log(data.list);
				if(data.success==true){
					$.each(data.list ,function(id)
												   {
												   	$("#pages").append('<option value='+data.list[id].id+'><b>'+data.list[id].name+'</option>');
												   		// console.log(data.list[id].StatusId+' '+data.list[id].StatusDescrip+': '+data.list[id].StatusComent);									   		
												   });
				}
				else
				{
					alert(data.list);
				}
			})
			.fail(function() {
				console.log("error");
			}); 
	$('#modalsharepage').modal('show');
}


function showModalEvent(rate,ide,title,image)
{
	LoadSelect2Script(DemoSelect2);

	link = 'http://localhost/joomla/index.php/player/'+rate+'/'+ide;
	$('#titlevideo_p').text(title);
	document.getElementById("mensaje_e").value = "";
	document.getElementById("descripcion_e").value=""; 
	document.getElementById('events').innerHTML = ''; 
	document.getElementById('resultshare_e').innerHTML='';
	document.getElementById("linkvideo_e").value = link;
	document.getElementById("imgvideo_e").src = image;
	
	$.ajax({
				url: "{{URL::route('listevents')}}",
				type: 'POST',
				data: {vaue:true},
			})
			.done(function(data) {
				console.log(data.list);
				if(data.success==true){
					$.each(data.list ,function(id)
												   {
												   	$("#events").append('<option value='+data.list[id].id+'><b>'+data.list[id].name+'</option>');
												   		// console.log(data.list[id].StatusId+' '+data.list[id].StatusDescrip+': '+data.list[id].StatusComent);									   		
												   });
				}
				else
				{
					alert(data.list);
				}
			})
			.fail(function() {
				console.log("error");
			}); 
	$('#modalshareevent').modal('show');
}


//funcion para compartir en el perfil
function ShareProfile()
{
	link = document.getElementById("linkvideo").value;
	mensaje = document.getElementById("mensaje").value;
	descripcion = document.getElementById("descripcion").value; 
	
	$.ajax({
		url: "{{URL::route('shareprofile')}}",
		type: 'POST',
		data: {link:link,mensaje:mensaje,descripcion:descripcion},
		beforeSend: function(){
	    			
                    $('#resultshare').html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
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
		$('#resultshare').html('<label></label>');
		// console.log("success");
		if(data.success=='true'){

					// alert(data.msg);
					$('#resultshare').html('<legend id="uniq" class="alert alert-success">'+data.msg+'</legend>');
				}
		if(data.success=='falseval'){

					// alert(data.msg);
					$('#resultshare').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
					
				}
	 	if(data.success=='falsecla'){

					// alert(data.msg);
					$('#resultshare').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
				}
		if(data.success=='falserollb'){

					alert('Internal Server Error [500].');
				}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	}); 
}
//funcion para compartir en el perfil
function ShareGroups()
{
	link = document.getElementById("linkvideo_g").value;
	mensaje = document.getElementById("mensaje_g").value;
	descripcion = document.getElementById("descripcion_g").value; 
	groups =  $("#groups").val();
	
	$.ajax({
		url: "{{URL::route('sharegroups')}}",
		type: 'POST',
		data: {link:link,mensaje:mensaje,descripcion:descripcion,groups:groups},
		beforeSend: function(){
	    			
                    $('#resultshare_g').html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
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
		$('#resultshare_g').html('<label></label>');
		// console.log("success");
		if(data.success=='true'){

					// alert(data.msg);
					$('#resultshare_g').html('<legend id="uniq" class="alert alert-success">'+data.msg+'</legend>');
				}
		if(data.success=='falseval'){

					// alert(data.msg);
					$('#resultshare_g').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
					
				}
	 	if(data.success=='falsecla'){

					// alert(data.msg);
					$('#resultshare_g').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
				}
		if(data.success=='falserollb'){

					alert('Internal Server Error [500].');
				}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	}); 
}

//publicar fan pages
function SharePages()
{
	link = document.getElementById("linkvideo_p").value;
	mensaje = document.getElementById("mensaje_p").value;
	descripcion = document.getElementById("descripcion_p").value; 
	pages =  $("#pages").val();
	
	$.ajax({
		url: "{{URL::route('sharepages')}}",
		type: 'POST',
		data: {link:link,mensaje:mensaje,descripcion:descripcion,pages:pages},
		beforeSend: function(){
	    			
                    $('#resultshare_p').html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
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
		$('#resultshare_p').html('<label></label>');
		// console.log("success");
		if(data.success=='true'){

					// alert(data.msg);
					$('#resultshare_p').html('<legend id="uniq" class="alert alert-success">'+data.msg+'</legend>');
				}
		if(data.success=='falseval'){

					// alert(data.msg);
					$('#resultshare_p').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
					
				}
	 	if(data.success=='falsecla'){

					// alert(data.msg);
					$('#resultshare_p').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
				}
		if(data.success=='falserollb'){

					alert('Internal Server Error [500].');
				}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	}); 
}

//publicar fan pages
function ShareEvents()
{
	link = document.getElementById("linkvideo_e").value;
	mensaje = document.getElementById("mensaje_e").value;
	descripcion = document.getElementById("descripcion_e").value; 
	events =  $("#events").val();
	
	$.ajax({
		url: "{{URL::route('shareevents')}}",
		type: 'POST',
		data: {link:link,mensaje:mensaje,descripcion:descripcion,events:events},
		beforeSend: function(){
	    			
                    $('#resultshare_e').html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
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
		$('#resultshare_e').html('<label></label>');
		// console.log("success");
		if(data.success=='true'){

					// alert(data.msg);
					$('#resultshare_e').html('<legend id="uniq" class="alert alert-success">'+data.msg+'</legend>');
				}
		if(data.success=='falseval'){

					// alert(data.msg);
					$('#resultshare_e').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
					
				}
	 	if(data.success=='falsecla'){

					// alert(data.msg);
					$('#resultshare_e').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
				}
		if(data.success=='falserollb'){

					alert('Internal Server Error [500].');
				}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	}); 
}


</script>
</body>