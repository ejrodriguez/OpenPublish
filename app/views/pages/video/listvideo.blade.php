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
		//$('#cuentas').html('<p>Error al conectar con servidor de facebook</p>');
		$('#cuentas').html('<p class="alert alert-danger">Problemas de conexión con la API de Facebook, Seleccione nuevamente la opcion del menu Redes Sociales, Facebook para obtener las cuentas de facebook.</p>');
	    })
	///////////////////////////

});	
//funcion para publicar perfil
function showModal(seoname,seocategoria,title,image,descripcion)
{
	
	link = 'http://localhost/joomla/index.php/player/'+seocategoria+'/'+seoname;
	$('#titlevideo').text(title);
	document.getElementById("mensaje").value = "";
	document.getElementById("descripcion").value=descripcion;
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
	//lista de id de las cuentas donde se publicara. 
	var ids = [cuenta];
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

</script>
</body>