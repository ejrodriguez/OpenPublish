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
<!--delete -->
	<div id="modaldatadel" class="modal fade">
	<div class="modal-dialog">   
	  <div class="modal-content"> 
	     <div class="modal-header alert alert-danger">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        ×
	        </button>
	        <h3>¿Esta seguro que desea eliminar al usuario?</h3>
	     </div>
	     <div class="modal-body">

	        	<form id="DelDataPersonalForm" method="POST"  action="" class="form-horizontal">
	        		<fieldset>
		        		<div class="list-group">
						  <a href="#" class="list-group-item active">
						    <h4 class="list-group-item-heading">Datos de Usuario</h4>
						  </a>
						  <a class="list-group-item">Id: <label id="useriddel"></label></a>
						  <a  class="list-group-item">Nombre: <label id="usernombredel"></label></a>
						  <a  class="list-group-item">Email: <label id="useremaildel"></label></a>
						  <a  class="list-group-item">Estado: <label id="userestadodel"></label></a>
						  <a  class="list-group-item">Rol: <label id="userroldel"></label></a>
						  <a  class="list-group-item">Ultima Actualización: <label id="useractualdel"></label></a>
						</div>
					</fieldset>

				</form>

	     </div>
	     <div id="uniqdel"></div>
	     <div class="modal-footer">
	        <!-- <a href="#" class="btn btn-primary">Guardar</a> -->
	        <button id="erase" type="submit" class="btn btn-danger btn-label-left btn-lg"><span><i class="fa fa-trash-o"></i></span> Si</button>
	        <a id="close" href="#" data-dismiss="modal" class="btn btn-info btn-label-left btn-lg"><span><i class="fa fa-arrows-alt"></i></span>No</a>
	        <div id='cargardel'></div>
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
//funcion para publicar
function share(a)
{
	//window.location.href = '#modaldatadel';
	 //window.location.assign("#modaldatadel");
	 $('#modaldatadel').modal('show');
	alert(a);
}
</script>

</body>