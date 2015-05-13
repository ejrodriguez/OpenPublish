@extends('layouts.LayoutUnAuth')

@section('menu')
{{MenuGen::render('top')}}
@stop

<?php
	//Obtener imagen que identifique el rol del usuario
	$Rol = Rol::find(Auth::user()->get()->RolId);
?>
@section('account')
<div class="col-xs-4 col-sm-8 top-panel-right">
	<ul class="nav navbar-nav pull-right panel-menu">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
				<div class="avatar">
					<img src="img/{{$Rol->RolImage}}" class="img-rounded" alt="avatar" />
				</div>
				<i class="fa fa-angle-down pull-right"></i>
				<div class="user-mini pull-right">
					<span class="welcome">Bienvenido,</span>
					<span>{{Auth::user()->get()->UserName}}</span>
				</div>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#">
						<i class="fa fa-user"></i>
						<span>Perfil</span>
					</a>
				</li>
				<li>
					<a href="{{URL::route('makelogout')}}">
						<i class="fa fa-power-off"></i>
						<span>Salir</span>
					</a>
				</li>
			</ul>
		</li>
	</ul>
</div>
@stop

@section('content')
<div id='jscontent'></div>
<!--modal errores -->
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
<!--FIN-->
@stop


@section('jsfunctions')
  <script>

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
	else{
		$('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>Error: "+data.error.message+"</p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");

	}

	$('#modalerrores').modal({
								show: true
							});
}

  

	$(document).on('click', '#createuser',function (e) {
	e.preventDefault();
	$.ajax({
	    	
	    	url: "{{URL::route('createuser')}}",
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
	    	$("#jscontent").load('{{URL::route('createuser')}}');

	    })
	    .fail(function() {

	    })
	});



	$(document).on('click', '#edituser',function (e) {
	e.preventDefault();
	$.ajax({
	    	
	    	url: "{{URL::route('edituser')}}",
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
		           	// alert(jqXHR.responseText);
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
	    	$("#jscontent").load('{{URL::route('edituser')}}');

	    })
	    .fail(function() {

	    })
	});


	$(document).on('click', '#downloadxml',function (e) {
	e.preventDefault();
	$.ajax({
	    	
	    	url: "{{URL::route('downloadxml')}}",
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
	    	$("#jscontent").load('{{URL::route('downloadxml')}}');

	    })
	    .fail(function() {

	    })
	});

//listar videos para facebook
	$(document).on('click', '#sharefb',function (e) {
	e.preventDefault();
	
	$.ajax({
	    	
	    	url: "{{URL::route('sharefb')}}",
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
	    	$("#jscontent").load('{{URL::route('sharefb')}}');

	    })
	    .fail(function() {

	    })
	});
//listar videos para twitter
	$(document).on('click', '#sharetw',function (e) {
	e.preventDefault();
	
	$.ajax({
	    	
	    	url: "{{URL::route('sharetw')}}",
	    	type: 'GET',
	    	beforeSend: function(){
	    			
                    $('#jscontent').append('<center><img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/></center>');
                },
	    })
	    .done(function() {
	    	$("#jscontent").load('{{URL::route('sharetw')}}');

	    })
	    .fail(function() {

	    })
	});
//listar cuentas facebook 
$(document).on('click', '#AdmFb',function (e) {
	e.preventDefault();
	
	$.ajax({
	    	
	    	url: "{{URL::route('AdmFb')}}",
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
	    	$("#jscontent").load('{{URL::route('AdmFb')}}');

	    })
	    .fail(function() {

	    })
	});

//listar cuentas de twitter
$(document).on('click', '#AdmTw',function (e) {
	e.preventDefault();
	
	$.ajax({
	    	
	    	url: "{{URL::route('AdmTw')}}",
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
	    	$("#jscontent").load('{{URL::route('AdmTw')}}');

	    })
	    .fail(function() {

	    })
	});

$(document).on('click', '#viewgalery',function (e) {
	e.preventDefault();
	
	$.ajax({
	    	
	    	url: "{{URL::route('viewgalery')}}",
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
	    	$("#jscontent").load('{{URL::route('viewgalery')}}');

	    })
	    .fail(function() {
	    	// console.log('no vale');
	    })
	});

$(document).on('click', '#delvideo',function (e) {
	e.preventDefault();
	
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

	    })
	    .fail(function() {
	    	// console.log('no vale');
	    })
	});

$(document).on('click', '#config',function (e) {
	e.preventDefault();
	
	$.ajax({
	    	
	    	url: "{{URL::route('config')}}",
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
	    	$("#jscontent").load('{{URL::route('config')}}');

	    })
	    .fail(function() {
	    	// console.log('no vale');
	    })
	});
	
if (window.location.hash == '#_=_')
{ // Check if the browser supports history.replaceState.
	if (history.replaceState) 
	{ // Keep the exact URL up to the hash. 
		var cleanHref = window.location.href.split('#')[0]; // Replace the URL in the address bar without messing with the back button.
		history.replaceState(null, null, cleanHref); } else { // Well, you're on an old browser, we can get rid of the _=_ but not the #.
		window.location.hash = ''; 
	} 
	alert("Acción efectuada, observe las cuentas registradas para observar los cambios");
}
		
  </script>


@stop
