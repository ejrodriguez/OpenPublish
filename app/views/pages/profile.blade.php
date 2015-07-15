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
<br>
<br>
<br>
<div class="row">
</div>
<div class="row">

	<div class="col-xs-6 col-md-offset-3">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-user"></i>
					<span>Perfil</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
<!-- 					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a> -->
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
			<form id="Profile" method="POST"  action="" class="form-horizontal">
				<div class="card">
					<h4 id="id" class="page-header"></h4>
					<h5 id="username" class="page-header"></h5>
					<h5 id="rol" class="page-header"></h5>
					<p>
						<!-- <span id>Rol</span> <br> -->
						<a id="email" href=""></a>
					</p>
				</div>
				<div class="card address">
					<!-- <h4>Adress:</h4> -->
					<p id="actual">
						<!-- <span>Ultima actualizacion</span> <br>
						<span>Fecha de creacion</span> -->
					</p>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nueva Clave</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" name="clave" id="clave" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Repetir</label>
					<div class="col-md-5">
						<input type="password" class="form-control" name="reclave" id="reclave" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 "></div>
					<div class="col-sm-4 ">
						<button  data-loading-text="Loading..." id="save" type="button" class="btn btn-primary btn-label-left"><span><i class="fa fa-save"></i></span> Guardar</button>
						<!-- <button id="save" type="button" class="btn btn-primary btn-label-left btn-lg"><span><i class="fa fa-save"></i></span> Guardar</button> -->
					</div>					
				</div>
			</form>
			<div  id='uniq'></div>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">

function CargarDatos(){
	$.ajax({
	url: "{{URL::route('dataprofile')}}",
	type: 'POST',
	})
	.done(function(data) {
		console.log("success");
		$('#id').append(+data.cod);
		$('#username').append(data.nombre);
		$('#email').append(data.email);
		$('#rol').append(data.rol);
		$('a#email').attr('href','mailto:'+data.email);
		$('#actual').append('<span>Creado:  '+data.creado+'</span> <br>	<span>Actualizado:  '+data.ultima+'</span>');

	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
};

function GuardarDatos(){
	$('#uniq').html('<label></label>');
	if($('#clave').val() !='' )
	{
		if($('#clave').val().length > 5 && $('#clave').val().length < 30)
		{
			if($('#reclave').val()!='' )
			{
				if ($('#reclave').val().length > 5 && $('#reclave').val().length < 30) {
					if($('#clave').val() == $('#reclave').val())
						{
							$.ajax({
								url: "{{URL::route('editprofile')}}",
								type: 'POST',
								data: {clave: $('#reclave').val()},
								beforeSend: function(){
	    										$('#uniq').html('<label></label>');
							                    $('#save').html('<span><i class="fa fa-spinner fa-spin"></i></span> Loading...');
							                },
							})
							.done(function(data) {
								if(data.success=='true')
								{
									$('#uniq').html('<legend id="uniq" class="alert alert-success">Se ha guardado correctamente</legend>');
								}
								else
								{
									$('#uniq').append('<legend id="uniq" class="alert alert-danger">No se realizo el cambio intente mas tarde</legend>');
								}
								$('#save').html('<span><i class="fa fa-save"></i></span> Loading...');
							})
							.fail(function() {
								console.log("error");
								$('#save').html('<span><i class="fa fa-save"></i></span> Loading...');
							})
							.always(function() {
								console.log("complete");
								$('#save').html('<span><i class="fa fa-save"></i></span> Loading...');
							});
							
						}
						else
						{
							$('#uniq').append('<legend id="uniq" class="alert alert-danger">Las Claves no son iguales</legend>');
						}
				}
				else
				{
					$('#uniq').append('<legend id="uniq" class="alert alert-danger">El campo Repetir permite de entre 6 a 30 caracteres</legend>');
				}
			}
			else
			{
				$('#uniq').append('<legend id="uniq" class="alert alert-danger">El campo Repetir no admite vacios</legend>');
			}
		}
		else
		{
			$('#uniq').append('<legend id="uniq" class="alert alert-danger">La Clave permite de entre 6 a 30 caracteres</legend>');
		}
	}
	else
	{
		$('#uniq').append('<legend id="uniq" class="alert alert-danger">El campo Clave no admite vacios</legend>');
	}

}




$(document).ready(function () {


	CargarDatos();
	
});

$('#save').click(function(e) {
	e.preventDefault();
	GuardarDatos();
});
</script>

</body>

</html>





