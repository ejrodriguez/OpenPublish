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
		<!-- contenedor de pagina -->
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-table"></i>
					<span>Páginas</span>
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
				<div class="box-content" style="display:none">
					<form id="ShareProfileForm" method="POST"  action="" class="form-horizontal">
	        		<fieldset>
						<div class="form-group" >
						<label class="col-sm-3 control-label">Página</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="mensaje2" id="mensaje2"/>
							</div>
						</div>						
					</fieldset>
					<legend>Cuentas:</legend>
					<fieldset>
					<div class="form-group">
					<div id="cuentas2"></div>
					</fieldset>
				</form>
				</div>
		</div>
		<!--  contenedor de videos -->
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
					
						<div>
							<div id="listresult">
							    {{ Datatable::table() 
							    ->addColumn('Video','Titulo','Descripción','Publicar')  
							    ->setUrl(route('datatables'))
							    ->render() 
							    }}
							</div> 
						</div>
				</div>

		</div>
	</div>


<!--modal share perfil -->
	<div id="modalshareprofile" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="largeModal ">
	<div class="modal-dialog modal-lg">   
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
							<img class="col-sm-3 " src="" id="imgvideo" width="100%"  />
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
							<textarea class="form-control" name="descripcion" id="descripcion" height="100%"></textarea>
						</div>
						</div>
						</fieldset>
						<legend>Cuentas:</legend>
						<fieldset>
						<div class="form-group">
						<div id="cuentas"></div>
						</fieldset>

				</form>
	     </div>
	     <div class="modal-footer">
	        <button onclick="closemodal()" type="button" class="btn btn-default" aria-label="Left Align">
                <span class="fa fa-times txt-danger" aria-hidden="true">Cerrar</span>
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
//--------------cargar cuentas Facebook
		$.ajax({
	    	
	    	url: "{{URL::route('accounts')}}",
	    	type: 'GET',
		    beforeSend: function(){
	                    $('#cuentas').html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
	                },
	    })
	    .done(function(data) {
	    	if(data.success== true)
	    	{
				$('#cuentas').html(data.list);
				<?php $accounts = Account::get()->count();
				echo 'cuentas ='.$accounts.';';?>
				
				function SelectCat()
				{
					for (var i = 1; i <= cuentas; i++) 
					{
						$('#groups'+i).select2();
						$('#groups'+i).select2({placeholder: "Seleccione sus grupos"});
						$('#pages'+i).select2();
						$('#pages'+i).select2({placeholder: "Seleccione sus páginas"});
						$('#events'+i).select2();
						$('#events'+i).select2({placeholder: "Seleccione sus eventos"});
					};
				}			
				LoadSelect2Script(SelectCat);
			}
		else
			{
				alert(data.list);
			}
		})
		.fail(function() {
		console.log("error");
		$('#cuentas').html('<p class="alert alert-danger">Problemas de conexión con la API de Facebook, Seleccione nuevamente la opcion del menu Redes Sociales, Facebook para obtener las cuentas de facebook.</p>');
	    })


//--------------cargar cuentas facebook para paginas
		$.ajax({
	    	
	    	url: "{{URL::route('accounts2')}}",
	    	type: 'GET',
		    beforeSend: function(){
	                    $('#cuentas2').html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
	                },
	    })
	    .done(function(data) {
	    	if(data.success== true)
	    	{
				$('#cuentas2').html(data.list);
				//$('#cuentas2').html(data.list);
				<?php $accounts = Account::get()->count();
				echo 'cuentas ='.$accounts.';';?>
				
				function SelectCat()
				{
					for (var i = 1; i <= cuentas; i++) 
					{
						$('#groups2'+i).select2();
						$('#groups2'+i).select2({placeholder: "Seleccione sus grupos"});
						$('#pages2'+i).select2();
						$('#pages2'+i).select2({placeholder: "Seleccione sus páginas"});
						$('#events2'+i).select2();
						$('#events2'+i).select2({placeholder: "Seleccione sus eventos"});
					};
				}			
				LoadSelect2Script(SelectCat);
			}
		else
			{
				alert(data.list);
			}
		})
		.fail(function() {
		console.log("error");
		$('#cuentas2').html('<p class="alert alert-danger">Problemas de conexión con la API de Facebook, Seleccione nuevamente la opcion del menu Redes Sociales, Facebook para obtener las cuentas de facebook.</p>');
	    })   
//--------------fin---------------------------------

});	
//funcion para publicar perfil
	function showModal(seoname,seocategoria,title,image)
	{
		link = 'http://perspectivas.espoch.edu.ec/index.php/es/player/'+seocategoria+'/'+seoname;
		$('#titlevideo').text(title);
		document.getElementById("mensaje").value = "";
		document.getElementById("descripcion").value="";
		document.getElementById("linkvideo").value = link;
		document.getElementById("imgvideo").src = image;
		$('#modalshareprofile').modal('show');
	}

	function closemodal(){
		$('#modalshareprofile').modal('hide');
	}
	//funcion para compartir
	function Share(identificador)
	{
		link = document.getElementById("linkvideo").value;
		mensaje = document.getElementById("mensaje").value;
		descripcion = document.getElementById("descripcion").value; 
		cuenta = document.getElementById(identificador).value;  
		idcuenta = document.getElementById('idcuenta'+identificador).value;  
		grupos = $('#groups'+identificador).val();
		paginas = $('#pages'+identificador).val();
		eventos = $('#events'+identificador).val();
		var ids = [];
		//lista de id de las cuentas donde se publicara. 
		if($("#checkm"+identificador).is(':checked')) {
			ids = [cuenta];
		}
		if (grupos != null){
			for (var i = 0; i <  grupos.length ; i++) {
			 	ids.push(grupos[i]);
			 };
		}

		if (paginas != null){
			for (var i = 0; i <  paginas.length ; i++) {
			 	ids.push(paginas[i]);
			 };
		}
		
		if (eventos != null){
			for (var i = 0; i <  eventos.length ; i++) {
			 	ids.push(eventos[i]);
			 };
		}
		$.ajax({
			url: "{{URL::route('share')}}",
			type: 'POST',
			data: {link:link,mensaje:mensaje,descripcion:descripcion,ids:ids,idcuenta:idcuenta},
			beforeSend: function(){
		    			
	                    $('#resultshare'+identificador).html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
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
			$('#resultshare'+identificador).html('<label></label>');
			// console.log("success");
			if(data.success=='true'){

						// alert(data.msg);
						$('#resultshare'+identificador).html('<legend id="uniq" class="alert alert-success">'+data.msg+'</legend>');
					}
			if(data.success=='false'){

						// alert(data.msg);
						$('#resultshare'+identificador).html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
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
//------------------publicar pagina
//funcion para compartir
	function Share2(identificador)
	{
		link = document.getElementById("mensaje2").value;
		mensaje = "";
		descripcion = "";
		cuenta = document.getElementById(identificador).value;  
		idcuenta = document.getElementById('idcuenta'+identificador).value;  
		grupos = $('#groups2'+identificador).val();
		paginas = $('#pages2'+identificador).val();
		eventos = $('#events2'+identificador).val();
		var ids = [];
		//lista de id de las cuentas donde se publicara. 
		if($("#checkm2"+identificador).is(':checked')) {
			ids = [cuenta];
		}
		if (grupos != null){
			for (var i = 0; i <  grupos.length ; i++) {
			 	ids.push(grupos[i]);
			 };
		}

		if (paginas != null){
			for (var i = 0; i <  paginas.length ; i++) {
			 	ids.push(paginas[i]);
			 };
		}
		
		if (eventos != null){
			for (var i = 0; i <  eventos.length ; i++) {
			 	ids.push(eventos[i]);
			 };
		}
		$.ajax({
			url: "{{URL::route('share')}}",
			type: 'POST',
			data: {link:link,mensaje:mensaje,descripcion:descripcion,ids:ids,idcuenta:idcuenta},
			beforeSend: function(){
		    			
	                    $('#resultshare2'+identificador).html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
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
			$('#resultshare2'+identificador).html('<label></label>');
			// console.log("success");
			if(data.success=='true'){

						// alert(data.msg);
						$('#resultshare2'+identificador).html('<legend id="uniq" class="alert alert-success">'+data.msg+'</legend>');
					}
			if(data.success=='false'){

						// alert(data.msg);
						$('#resultshare2'+identificador).html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
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

//------------------fin-----------
//funcion agregar todos los elementos de un select
	function checkTodos(id,idcheck) {

        if($("#"+idcheck).is(':checked')) {  
            elem=document.getElementById(id).options;
			for(i=0;i<elem.length;i++)
				{
					elem[i].selected=true; 
					//$("#"+id).find("option:contains("+i+")").prop('selected',true).parent().focus();
					$("#"+id).change();
				}
        } else {   
            elem=document.getElementById(id).options;
			for(i=0;i<elem.length;i++)
			{
				elem[i].selected=false; 
				//$("#"+id).find("option:contains("+i+")").prop('selected',false).parent().focus();
				$("#"+id).change();
			}
        }  
   }

</script>
</body>