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
	        <h4>Publicar en Twitter</h4>
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
					</fieldset>
						<div class="form-group">
						<fieldset>
						<legend>Mensaje:</legend>
							<textarea class="form-control" name="descripcion" id="mensaje"  maxlength="118" rows="5"  onKeyDown="valida_longitud()"></textarea>
							<h5 class="col-sm-8" id="contador" class="control-label"></h5>
						</fieldset>
						</div>
						<fieldset>
						<div class="form-group">
						<legend>Cuentas:</legend>
						<div id="cuentas"></div>
						<br>
						<span onclick="Share()" class="dtr-data"><a id="callmodalshare" data-toggle="modal" class="btn btn-default btn-large">
						<span class="fa  fa-twitter txt-primary" aria-hidden="true"></span>  Twittear</a></span>

						<div id="resultshare"></div>
						</div>
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
	
	//--------------cargar cuentas twitter
		$.ajax({
	    	
	    	url: "{{URL::route('accountstw')}}",
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
					$('#account').select2();
					$('#account').select2({placeholder: "Seleccione las cuentas"});
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
	

});	
//funcion para publicar perfil
function showModal(seoname,seocategoria,title,image)
{
	
	link = 'http://alavista.tv/index.php/es/player/'+seocategoria+'/'+seoname;
	$('#titlevideo').text(title);
	document.getElementById("mensaje").value="";
	document.getElementById("linkvideo").value = link;
	document.getElementById("imgvideo").src = image;
	$('#modalshareprofile').modal('show');
}

function closemodal(){
	$('#modalshareprofile').modal('hide');
}
//funcion para compartir
function Share()
{
	message = document.getElementById("mensaje").value;
	message = message+"  "+document.getElementById("linkvideo").value;
	accounts = $('#account').val();
	alert(message);
	alert(accounts);
	$.ajax({
		url: "{{URL::route('twittear')}}",
		type: 'POST',
		data: {message:message,accounts:accounts},
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
		console.log(data.msg)
		if(data.success=='true'){

					// alert(data.msg);
					$('#resultshare').html('<legend id="uniq" class="alert alert-success">'+data.msg+'</legend>');
				}
		if(data.success=='false'){

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

contenido_textarea = "" 
num_caracteres_permitidos = 140

function valida_longitud(){ 
   cuenta() 
   num_caracteres = document.getElementById("mensaje").value.length;
   if (num_caracteres >= num_caracteres_permitidos){
      document.getElementById("contador").style.color = "#FF0000";
   }
   else
	{
	   	if (num_caracteres >= num_caracteres_permitidos-22)
	   	{ 
	       document.getElementById("contador").style.color = "#FF9900";
	   	}
	   	else{
	   			document.getElementById("contador").style.color = "#000000";
	   		}
   }

} 
function cuenta(){ 
	c= $('#mensaje').val().length;
	$('#contador').text(c);
} 
</script>
</body>