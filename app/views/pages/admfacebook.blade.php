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
					<span>Cuentas</span>
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
							<div id="listresult" >
							</div>
	
					</div>
				</div>

		</div>
	</div>



	<!--delete -->
	<div id="modaldatadel" class="modal fade">
	<div class="modal-dialog">   
	  <div class="modal-content"> 
	     <div class="modal-header alert alert-danger">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        ×
	        </button>
	        <h3>¿Esta seguro que desea eliminar la cuenta?</h3>
	     </div>
	     <div class="modal-body">

	        	<form id="DelDataPersonalForm" method="POST"  action="" class="form-horizontal">
	        		<fieldset>
		        		<div class="list-group">
						  <a href="#" class="list-group-item active">
						    <h4 class="list-group-item-heading">Datos de la cuenta</h4>
						  </a>
						  <a class="list-group-item">Id: <label id="ide"></label></a>
						  <a  class="list-group-item">Id Cuenta: <label id="account"></label></a>
						  <a  class="list-group-item">Nombre: <label id="name"></label></a>
						  <a  class="list-group-item">Fecha de Creación: <label id="create"></label></a>
						  <a  class="list-group-item">Ultima Actualización: <label id="update"></label></a>
						</div>
					</fieldset>

				</form>

	     </div>
	     <div id="uniqdel"></div>
	     <div class="modal-footer">
	        <!-- <a href="#" class="btn btn-primary">Guardar</a> -->
	        <button id="erase" onclick="DeleteAccount()" type="submit" class="btn btn-danger btn-label-left btn-lg"><span><i class="fa fa-trash-o"></i></span> Si</button>
	        <a id="close" href="#" data-dismiss="modal" class="btn btn-info btn-label-left btn-lg"><span><i class="fa fa-arrows-alt"></i></span>No</a>
	        <div id='cargardel'></div>
	     </div>
		</div>

	</div>


	</div>
<script type="text/javascript">
	$(document).ready(function() 
	{
		// Sortable for elements
		$(".sort").sortable({
			items: "div.col-sm-2",
			appendTo: 'div.box-content'
		});
		//cargar cuentas
		$.ajax({
				url: "{{URL::route('listaccount')}}",
				type: 'POST',
			})
			.done(function(data) {
				if(data.success==true){
					$('#listresult').html(data.list);	
						$('#datatable-1').DataTable({							
							"lengthMenu": [ 10, 20,  100 ],
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
//funcion para actualizar token
	function Actualizar(id,token)
	{
		$.ajax({
			url: "{{URL::route('gettoken')}}",
			type: 'POST',
			data: {id:id,token:token},
			beforeSend: function(){
		    			
	                    $('#result').html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
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
			//$('#resultshare').html('<label></label>');
			// console.log("success");
			if(data.success=='true'){
						// alert(data.msg);
						$('#result').html('<legend id="uniq" class="alert alert-success">'+data.msg+'</legend>');
					}
			if(data.success=='false'){
						// alert(data.msg);
						$('#result').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
						
					}
			if(data.success=='false_fb'){
				// alert(data.msg);
				$('#result').html('<legend id="uniq" class="alert alert-warning">'+data.msg+'</legend>');
				
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	function NewAccount()
	{
		 location.href="{{URL::route('loginfb')}}";
	}
	function ShowDelet(id,account,name,token,update,create)
	{
	 	$('#ide').text(id);
	 	$('#account').text(account); 
	 	$('#name').text(name);
	 	$('#token').text(token);
	 	$('#update').text(update);
	 	$('#create').text(create);
		$('#modaldatadel').modal('show'); 
	}
	function DeleteAccount()
	{
		$.ajax({
			url: "{{URL::route('accountdel')}}",
			type: $('#DelDataPersonalForm').attr('method'),
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {id: $('#ide').text()},
			beforeSend: function(){
		    			
	                    $('#cargardel').html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
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
			$('#cargardel').html('<label></label>');
			// console.log("success");
			if(data.success=='true'){
						refresh();
						$('#uniqdel').html('<legend id="uniq" class="alert alert-success">'+data.msg+'</legend>');
						
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

	function refresh()
	{
		$.ajax({
			url: "{{URL::route('listaccount')}}",
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
	}
</script>
</body>