<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/tables/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="css/tables/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="js/jsfunctions/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="js/jsfunctions/dataTables.responsive.js"></script>
<style type="text/css" media="Screen">
  #leftcolumn a{cursor:pointer;}
</style>
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
					
						<div >
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
							<!--el tamaño del mensaje en twitter solo admite 140 caracters, reduciendo la longitud de un link para el video,
							gracias a twitter los link solo ocupan 22 caracteres, mas un espació, el total de texto disponible es 117-->
							<textarea class="form-control" name="descripcion" id="mensaje"  maxlength="116" rows="5"  onKeyDown="valida_longitud()"></textarea>
							<h5 class="col-sm-8" id="contador" class="control-label"></h5>
						</fieldset>
						</div>
						<div class="form-group">
							<fieldset>
								<legend>Tendencia:</legend>
								<div id="leftcolumn" class="col-xs-12"> </div>
							</fieldset>
						</div>
						<fieldset>
						<div class="form-group">
						<legend>Cuentas:</legend>
						<div id="cuentas"></div>
						<br>
						<div class="checkbox">
							<p>&nbsp;&nbsp;Seleccionar todos
							<label>
							<input id="checka" onclick="CheckAll()"  name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
					     	</label>
							</p>
						</div>
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
		$('#cuentas').html('<p class="alert alert-danger">Problemas de conexión con la API de Twitter, Seleccione nuevamente la opcion del menu Redes Sociales, Twitter para obtener las nuevamente las cuentas.</p>');
	    })

//--------------cargar trending
		$.ajax({
	    	
	    	url: "{{URL::route('trending')}}",
	    	type: 'GET',
		    beforeSend: function(){
	                    $('#trending').html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
	                },

	    })
	    .done(function(data) {
	    	if(data.success== true)
	    	{
	    		//alert(data.msg);
				$('#leftcolumn').html(data.list);
				//function SelectCat()
				//{
				//	$('#trending').select2();
				//	$('#trending').select2({placeholder: "Seleccione las cuentas"});
				//}			
				//LoadSelect2Script(SelectCat);
				$('#ClickWordList span').click(function() { 
				    $("#mensaje").insertAtCaret($(this).text());
				    return false
				  });
				  $("#ClickWordList span").draggable({helper: 'clone'});
				  $("#mensaje").droppable({
				    accept: "#ClickWordList span",
				    drop: function(ev, ui) {
				      $(this).insertAtCaret(ui.draggable.text());
				    }
				  });
				//
			}
		else
			{
				alert(data.list);
			}
		})
		.fail(function() {
		console.log("error");
		//$('#cuentas').html('<p>Error al conectar con servidor de facebook</p>');
		$('#trending').html('<p class="alert alert-danger">Problemas de conexión con la API de Twitter, Seleccione nuevamente la opcion del menu Redes Sociales, Twitter para obtener nuevamente las tendencias.</p>');
	    })
});	
//----------función para insertar el trending topic al texto
	$.fn.insertAtCaret = function (myValue) {
	  return this.each(function(){
	      //IE support
	      if (document.selection) {
	          this.focus();
	          sel = document.selection.createRange();
	          sel.text = myValue;
	          this.focus();
	      }
	      //MOZILLA / NETSCAPE support
	      else if (this.selectionStart || this.selectionStart == '0') {
	          var startPos = this.selectionStart;
	          var endPos = this.selectionEnd;
	          var scrollTop = this.scrollTop;
	          this.value = this.value.substring(0, startPos)+ myValue+ this.value.substring(endPos,this.value.length);
	          this.focus();
	          this.selectionStart = startPos + myValue.length;
	          this.selectionEnd = startPos + myValue.length;
	          this.scrollTop = scrollTop;
	      } else {
	          this.value += myValue;
	          this.focus();
	      }
	  });
	};
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
	if(accounts == null)
    {alert("Seleccione por lo menos una cuenta de twitter.")}
	else
	{
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
}

//funciones para contabilizar el maximo de caracters para hacer el tweet
contenido_textarea = "" 
num_permitidos = 140 

function valida_longitud(){ 
   cuenta() 
   num_caracteres = document.getElementById("mensaje").value.length + 24;
   if (num_caracteres >= 135){
   		//rojo
      document.getElementById("contador").style.color = "#FF0000";
   }
   else
	{
	   	if (num_caracteres > 100)
	   	{ 
	   		//naranja
	       document.getElementById("contador").style.color = "#FF9900";
	   	}
	   	else{
	   			//negro
	   			document.getElementById("contador").style.color = "#000000";
	   		}
   }

} 
	//para presentar el contador
	function cuenta(){ 
		c= num_permitidos - ($('#mensaje').val().length +24);

		$('#contador').text('Maximo de caracteres:  '+ c);
	} 

//funcion seleecionar todas las cuentas 
function CheckAll() {

        if($("#checka").is(':checked')) {  
            elem=document.getElementById("account").options;
			for(i=0;i<elem.length;i++)
				{
					elem[i].selected=true; 
					//$("#"+id).find("option:contains("+i+")").prop('selected',true).parent().focus();
					$("#account").change();
				}
        } else {   
            elem=document.getElementById("account").options;
			for(i=0;i<elem.length;i++)
			{
				elem[i].selected=false; 
				//$("#"+id).find("option:contains("+i+")").prop('selected',false).parent().focus();
				$("#account").change();
			}
        }  
   } 

</script>
</body>