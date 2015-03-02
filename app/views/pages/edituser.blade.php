<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/tables/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="css/tables/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="js/jsfunctions/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jsfunctions/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="js/jsfunctions/dataTables.responsive.js"></script>
</head>
<body>
<br>
<div class="panel panel-primary">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-list"></i>
						<span>Lista de Usuarios</span>
					</div>
					<div class="box-icons">
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
				<br>
				<br>
				<div  >
					<table style="overflow:scroll;" id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Estado</th>
								<th>Rol</th>
								<th>Actualizado en</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
						<!-- Start: list_row -->
							@foreach($usuarios as $usuario)
							<tr>
								<td id="user_id">{{$usuario->id}}</td>
								<td id="user_name">{{$usuario->UserName}}</td>
								<td id="user_email">{{$usuario->email}}</td>
								<td id="user_stat">{{$usuario->StatusDescrip}}</td>
								<td id="user_rol">{{$usuario->RolDescrip}}</td>
								<td id="user_upd">
									{{$usuario->updated_at}}
								</td>
								<td>
									<a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span> Editar</a>					
								</td>
								<td>
									<a id="callmodaldel" data-toggle="modal" href="#modaldatadel" class="btn btn-danger btn-large"><span class="fa fa-trash-o" aria-hidden="true"></span> Eliminar</a>
								</td>
							</tr>
							@endforeach
						<!-- End: list_row -->
						</tbody>
						<tfoot>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Estado</th>
								<th>Rol</th>
								<th>Actualizado en</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>



	<div id="modaldataedit" class="modal fade">
	<div class="modal-dialog">   
	  <div class="modal-content"> 
	     <div class="modal-header alert alert-info">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        ×
	        </button>
	        <h3>Editar Datos de Usuario</h3>
	     </div>
	     <div class="modal-body">

	        	<form id="EditDataPersonalForm" method="POST"  action="{{URL::route('useredit')}}" class="form-horizontal">
	        		<fieldset>
	        		<legend>Datos Personales</legend>
	        		<div class="form-group">
						<label class="col-sm-2 control-label">Id</label>
						<div class="col-sm-8">
							<input type="text" readonly="readonly" class="form-control" name="modal_id" id="modal_id" />
						</div>
					</div>
					<div class="form-group" >
						<label class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="modal_nombre" id="modal_nombre"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="modal_email" id="modal_email" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Clave</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="modal_clave" id="modal_clave" />
						</div>
					</div>
					<div class="form-group " >
						<label class="col-sm-2 control-label">Repetir clave</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="modal_reclave" id="modal_reclave" />
						</div>
					</div>
					</fieldset>
					<fieldset>
					<legend>Estado</legend>
					<div class="form-group">
							<label class="col-sm-2 control-label">Estado</label>
							<div class="col-sm-8">
								<select class="populate placeholder" name="modal_estado" id="sestado">
									<option value="">-- Seleccione un estado --</option>
									
								</select>
							</div>
					</div>		
					</fieldset>

					<fieldset>
					<legend>Rol</legend>
					<div class="form-group">
							<label class="col-sm-2 control-label">Rol</label>
							<div class="col-sm-8">
								<select class="populate placeholder" name="modal_rol" id="srol">
									<option value="">-- Seleccione un Rol --</option>
									
								</select>
							</div>
					</div>	
					</fieldset>

					<fieldset>
					<legend>Funciones</legend>
					<div class="form-group">
						<label class="col-sm-2 control-label">Menus</label>
						<div class="col-sm-8">
							<select id="smenu" name="modal_menu" multiple="multiple" class="populate placeholder">

							</select>
						</div>
					</div>
					</fieldset>
				</form>

	     </div>
	     <div id="uniqedit"></div>
	     <div class="modal-footer">
	        <!-- <a href="#" class="btn btn-primary">Guardar</a> -->
	        <button id="save" type="submit" class="btn btn-primary btn-label-left btn-lg"><span><i class="fa fa-save"></i></span> Guardar</button>
	        <a id="close" href="#" data-dismiss="modal" class="btn btn-default btn-label-left btn-lg"><span><i class="fa fa-arrows-alt"></i></span>Cerrar</a>
	        
	        <div id='cargar'></div>

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

	
</div>




<script type="text/javascript">
// Run Select2 plugin on elements
function DemoSelect2(){
	$('#sestado').select2();
	$('#srol').select2();
	$('#smenu').select2({placeholder: "Seleccione Menu"});
}


// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Buscar ...');
	});
}
$(document).ready(function() {
	// // Load selects
	LoadSelect2Script(DemoSelect2);
	// // Load example of form validation
	LoadBootstrapValidatorScript(DemoFormValidator);
	// Load Datatables and run plugin on tables 
	// LoadDataTablesScripts(AllTables);
	$('#datatable-1').DataTable({
			
	});
	// Add Drag-n-Drop feature
	WinMove();

});

//seleccion de una fila
 $('table tbody tr').click(function(){
 	// console.log($(this).text());
 	var ID = $(this).find("td[id='user_id']").text();
 	var NAME = $(this).find("td[id='user_name']").text();
 	var EMAIL = $(this).find("td[id='user_email']").text();
 	var STADO = $(this).find("td[id='user_stat']").text();
 	var ROL = $(this).find("td[id='user_rol']").text();
 	var UPDAT = $(this).find("td[id='user_upd']").text();

    //load values modal elimiar
 	$('#useriddel').text(ID);
 	$('#usernombredel').text(NAME); 
 	$('#useremaildel').text(EMAIL);
 	$('#userestadodel').text(STADO);
 	$('#userroldel').text(ROL);
 	$('#useractualdel').text(UPDAT);


 	//load values modal editar
 	$('#modal_nombre').val(NAME);
 	$('#modal_email').val(EMAIL);
 	$('#modal_id').val(ID);


 	//load select estado
	$.ajax({
		url: "{{URL::route('liststatus')}}",
		type: 'POST',
		data: {value: true},
	})
	.done(function(data) {
		if(data.success==true){
			$.each(data.list ,function(id)
										   {
										   	$("#sestado").append('<option value='+data.list[id].StatusId+'><b>'+data.list[id].StatusDescrip+'</option>');
										   		// console.log(data.list[id].StatusId+' '+data.list[id].StatusDescrip+': '+data.list[id].StatusComent);									   		

										   });
			$("#sestado").find("option:contains("+STADO+")").prop('selected',true).parent().focus();
			$("#sestado").change();
		}
		else
		{
			alert(data.list);
		}
		
	})
	.fail(function() {
		console.log("error");
	});


	// load select rol
	$.ajax({
		url: "{{URL::route('listrols')}}",
		type: 'POST',
		data: {value: true},
	})
	.done(function(data) {
		console.log(data.success);
		var vecroles=[];
		if(data.success==true){
			$.each(data.list ,function(id)
										   {
										   	$("#srol").append('<option value='+data.list[id].RolId+'><b>'+data.list[id].RolDescrip+'</option>');
										   	 // vecroles.push(data.list[id].RolDescrip);				   		
										   });
			
			

		}
		else
		{
			alert(data.list);
		}

		$("#srol").find("option:contains("+ROL+")").prop('selected',true).parent().focus();
		$("#srol").change();

	})
	.fail(function() {
		console.log("error");
	});



	// load select menu
	$("#srol").change(function(event) {

		$("#smenu").empty();

		if($("#srol").val()!=''){
			$.ajax({
				url: "{{URL::route('listmenus')}}",
				type: 'POST',
				data: {idrol: $("#srol").val()},
			})
			.done(function(data) {
				console.log(data.list);
				if(data.success==true){
					//borrar seleccion para q no se repita
					$("#smenu").empty();
					$.each(data.list ,function(id)
												   {
												   	$("#smenu").append('<option value='+data.list[id].MenuId+'><b>'+data.list[id].MenuDescrip+'</option>');
												   		// console.log(data.list[id].StatusId+' '+data.list[id].StatusDescrip+': '+data.list[id].StatusComent);									   		
												   });
				}
				else
				{
					alert(data.list);
				}

				$("#smenu").find("option:contains("+ROL+")").prop('selected',true).parent().focus();
				$("#smenu").change();
			})
			.fail(function() {
				console.log("error");
			});
			
		}
		
	});




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

//limpiar datos de edicion
$("#close").click(function(e) {
	/* Act on the event */
	e.preventDefault();
	$('#modal_nombre').val("");
 	$('#modal_email').val("");
 	$('#modal_clave').val("");
 	$('#modal_reclave').val("");
 	$("#smenu").empty();
 	$("#sestado").empty();
 	$("#srol").empty();
});

$("#callmodal").click(function(e) {
	/* Act on the event */
	// e.preventDefault();
	$("#smenu").empty();
 	$("#sestado").empty();
 	$("#srol").empty();

});

//guardar editado
$("#save").click(function(e) {
	/* Act on the event */
	e.preventDefault();
	// alert($('#modal_nombre').val());
	$.ajax({
		url: "{{URL::route('useredit')}}",
		type: 'POST',
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {id:$('#modal_id').val(), nombre: $('#modal_nombre').val(),email:$('#modal_email').val() , clave: $('#modal_clave').val(), reclave:$('#modal_reclave').val(), estado:$("#sestado").val(), rol:$("#srol").val(), menu:$("#smenu").val()},
		beforeSend: function(){
	    			
                    $('#cargar').html('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
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
		$('#cargar').html('<label></label>');
		// console.log("success");
		if(data.success=='true'){

					// alert(data.msg);
					$('#uniqedit').html('<legend id="uniq" class="alert alert-success">'+data.msg+'</legend>');
				}
		if(data.success=='falseval'){

					// alert(data.msg);
					$('#uniqedit').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
					
				}
	 	if(data.success=='falsecla'){

					// alert(data.msg);
					$('#uniqedit').html('<legend id="uniq" class="alert alert-danger">'+data.msg+'</legend>');
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
	
});







//modal eliminar
$("#erase").click(function(e) {
	/* Act on the event */
	e.preventDefault();
	// alert($('#useriddel').text());
	$.ajax({
		url: "{{URL::route('userdel')}}",
		type: $('#DelDataPersonalForm').attr('method'),
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {id: $('#useriddel').text()},
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

					// alert(data.msg);
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
	
});
</script>

</body>






