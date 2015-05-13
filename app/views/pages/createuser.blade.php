<!-- <h1>hola</h1> -->
<br>
<div class="col-md-8 col-md-offset-2">
	<div class="box">
	<div class="box-header">
		<div class="box-name">
			<i class="fa fa-user"></i>
			<span>Crear un Nuevo Usuario</span>
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

	<div class="box-content">
			<form id="DataPersonalForm" method="POST"  action="{{URL::route('createuser')}}" class="form-horizontal">

				<fieldset>
					<legend >Datos Personales</legend>
					<div class="form-group" >
						<label class="col-sm-1 control-label">Nombre</label>

						<div class="col-sm-11">
							<input type="text" class="form-control" name="nombre" id="nombre"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">Email</label>
						<div class="col-sm-11">
							<input type="text" class="form-control" name="email" id="email" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">Clave</label>
						<div class="col-sm-5">
							<input type="password" class="form-control" name="clave" id="clave" />
						</div>
					<!-- </div> -->
					<!-- <div class="form-group " > -->
						<label class="col-sm-1 control-label">Repetir</label>
						<div class="col-md-5">
							<input type="password" class="form-control" name="reclave" id="reclave" />
						</div>
					</div>
				</fieldset>

				<fieldset>
					<legend >Estado</legend>
					<div class="form-group">
							<label class="col-sm-1 control-label">Estado</label>
							<div class="col-sm-11">
								<select class="populate placeholder" name="estado" id="sestado">
									<option selected value="">-- Seleccione un estado --</option>
									
								</select>
							</div>
					</div>

					
				</fieldset>
				<fieldset>
					<legend >Rol</legend>
					<div class="form-group">
							<label class="col-sm-1 control-label">Rol</label>
							<div class="col-sm-11">
								<select class="populate placeholder" name="rol" id="srol">
									<option selected value="">-- Seleccione un Rol --</option>
									
								</select>
							</div>
					</div>
					
				</fieldset>
				<fieldset>
					<legend >Funciones</legend>
					<div class="form-group">
						<label class="col-sm-1 control-label">Menus</label>
						<div class="col-sm-11">
							<select id="smenu" name="menu" multiple="multiple" class="populate placeholder">
								
							</select>
						</div>
					</div>	
				</fieldset>
				<div class="form-group">
					<div class="col-sm-8 "></div>
					<div class="col-sm-4 ">
						<button id="save" type="submit" class="btn btn-primary btn-label-left btn-lg"><span><i class="fa fa-save"></i></span> Guardar</button>
					</div>
					<div  id='uniq'></div>
					<!-- <legend id='uniq' class="alert alert-danger"></legend> -->
					<div id='cargar bg-success'></div>
				</div>
			</form>
			<div class=".log"></div>
			   
		</div>

		</div>

	</div>

</div>

<!-- modal -->

<div id="example" class="modal fade">
<div class="modal-dialog">   
  <div class="modal-content"> 
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
        </button>
        <h3>Cabecera de la ventana</h3>
     </div>
     <div class="modal-body">
        <h4>Texto de la ventana</h4>
        <p>Mas texto en la ventana.</p>                
     </div>
     <div class="modal-footer">
        <a href="#" class="btn btn-success">Guardar</a>
        <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
     </div>
	</div>
</div>



<script type="text/javascript">

// Run Select2 plugin on elements
function DemoSelect2(){
	$('#sestado').select2();
	$('#srol').select2();
	$('#joomla').select2();
	$('#smenu').select2({placeholder: "Seleccione Menu"});
}
// Run timepicker
function DemoTimePicker(){
	$('#input_time').timepicker({setDate: new Date()});
}
$(document).ready(function() {
	// // Load selects
	LoadSelect2Script(DemoSelect2);
	// // Load example of form validation
	LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();


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
										   	$("#sestado").append('<option value='+data.list[id].StatusId+'><b>'+data.list[id].StatusDescrip+':</b> '+data.list[id].StatusComent+'</option>');
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

	// load select rol
	$.ajax({
		url: "{{URL::route('listrols')}}",
		type: 'POST',
		data: {value: true},
	})
	.done(function(data) {
		console.log(data.success);
		if(data.success==true){
			$.each(data.list ,function(id)
										   {
										   	$("#srol").append('<option value='+data.list[id].RolId+'><b>'+data.list[id].RolDescrip+'</option>');
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
	
	// load select menu
	$("#srol").change(function(event) {
		// alert($("#smenu option:selected").html());
		// $('#seleccion').append($("#smenu").val());
		$("#smenu").empty();
		// $('#seleccion').html($("#smenu").val());
		if($("#srol").val()!=''){
			$.ajax({
				url: "{{URL::route('listmenus')}}",
				type: 'POST',
				data: {idrol: $("#srol").val()},
			})
			.done(function(data) {
				console.log(data.list);
				if(data.success==true){
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
				$("#smenu").find("option:contains(abc)").prop('selected',true).parent().focus();
				$("#smenu").change();
			})

			
			.fail(function() {
				console.log("error");
			});
			
		}
		
	});



});

</script>

<script type="text/javascript">
// enviar datos para crear un usuario
	$('#DataPersonalForm').submit(function(e) {
		e.preventDefault();

			$.ajax({
				url: $('#DataPersonalForm').attr('action'),
				type: $('#DataPersonalForm').attr('method'),
				data: {nombre: $("#nombre").val() ,email: $("#email").val() , clave: $("#clave").val() , reclave: $("#reclave").val() , estado: $("#sestado").val() , rol: $("#srol").val(), menu: $("#smenu").val() },
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
				if(data.success==true){
					// alert(data.list)
					
					$('#uniq').html('<legend id="uniq" class="alert alert-success">Se ha guardado correctamente</legend>');
				}
				if(data.success=='falseser'){

					alert(data.msg);
					$('#uniq').html('<label></label>');
				}

				if(data.success=='falserollb'){

					alert('Internal Server Error [500]');
					$('#uniq').html('<label></label>');
				}
				if(data.success=='falsevalidar')
				{
					$('#uniq').html('<label></label>');
					$('#uniq').append('<legend id="uniq" class="alert alert-danger">El Email ya se encuentra registrado</legend>');
					// console.log("El email ya se encuentra registrado");									   						  
				}
				if(data.success=='falseclaves')
				{
					console.log(data.list);
					$('#uniq').html('<label></label>');
				}
				if(data.success=='falseempty')
				{
					console.log(data.list);
					$('#uniq').html('<label></label>');
				}
			})

			.fail(function(data) {
				// alert('fail'+data.msg);
				$('#uniq').html('<label></label>');
			});
		
	});


	$(document).ready(function() {
		$('#email').change(function(event) {
			$('#uniq').html('<label></label>');
		});
	});


	
</script>