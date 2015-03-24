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
							<div id="listresult">
							</div>
	
					</div>
				</div>

		</div>
	</div>


<script type="text/javascript">

$(document).ready(function() {
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

//funcion para publicar perfil
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

</script>
</body>