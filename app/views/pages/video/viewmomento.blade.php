<!DOCTYPE html>
<html>
<head>

</head>
<body>
<br>


<!-- 
 * [interfaz de populares de openpublish]
 * @type {html}
 -->

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-picture-o"></i>
					<span>Videos Populares</span>
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
			<!-- <div class="box-content"> -->
                <form>
    				<div class="form-group" >
    				<br>
                        <label class="col-sm-1 control-label">Registros </label>                
    					<div class="col-sm-1">
    						<select class="populate placeholder" name="pagi" id="pagi" >
    						<option  value="12">12</option>
    						<option  value="24">24</option>
    						<option  value="36">36</option>
    						<option  value="100">100</option>
    						</select>
    					</div>
                      <!--   <label class="col-sm-1 control-label">Ordenar</label>
                        <div class="col-sm-2">
                            <select class="populate placeholder" name="orden" id="orden" >
                            <option  value="id">Id</option>
                            <option  value="title">Titulo</option>
                            <option  value="rate">Calificacion</option>
                            <option  value="created_date">Fecha</option>
                            </select>
                        </div> -->
                        <!-- <label class="col-sm-1 control-label">Forma</label>
                        <div class="col-sm-2">
                            <select class="populate placeholder" name="por" id="por" >
                            <option  value="ASC">Ascendente</option>
                            <option  value="DESC">Descendente</option>
                            </select>
                        </div> -->
    				</div>
                </form>
				<br>
			<!-- </div> -->
			<div id="impression"></div>
			
			
		</div>
		
	</div>
</div>



<!-- 
 * [fin interfaz de galeria simple de openpublish]
 -->






<script type="text/javascript">

$(document).ready(function() {
	// DemoSelect2();
});
function DemoSelect2(){
	$('#pagi').select2();
    $('#orden').select2();
    $('#por').select2();
};

function VerError(data){
    if('Invalid argument supplied for foreach()'==data.error.message)
    {
        $('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>No se han encontrados datos en la Busqueda Realizada </p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");
    }
    else if('Curl Error : Failed to connect to www.googleapis.com port 443: Host unreachable'==data.error.message){
        $('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>Error: No se pudo conectar con www.googleapis.com puerto 443: host inalcanzable</p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");
    }
    else if('Curl Error : Could not resolve host: www.googleapis.com'==data.error.message){
        $('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>Error: No se pudo resolver el host: www.googleapis.com</p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");
    }
    else if('Error 400 Bad Request : videoChartNotFound'==data.error.message){
        $('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>Error: La categoria solicitada no se encuentra habilitada en el pais seleccionado </p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");
    }
    else{
        $('#modalerror').html("<center><button type='button' class='btn btn-danger btn-app-sm btn-circle'><i class='fa fa-times-circle'></i></button><p><legend class='col-sm-12 '>Error: "+data.error.message+"</p><p>Linea: "+data.error.line+"</p><p>Archivo: "+data.error.file+"</legend></center>");

    }

    $('#modalerrores').modal({
                                show: true
                            });
}

$(function() {
    // 1.
    var ca=$('#pagi').val();
    var ord=$('#orden').val();
    var forma=$('#por').val();
    function getPaginationSelectedPage(url) {
        var chunks = url.split('?');
        // alert(chunks); link de siguiente pag
        var baseUrl = chunks[0];
        // alert(baseUrl); url base
        var querystr = chunks[1].split('&');
        // alert(querystr);pagina
        var pg = 1;
        for (i in querystr) {
            var qs = querystr[i].split('=');
            if (qs[0] == 'page') {
                pg = qs[1];
                // alert(pg); # pagina
                break;
            }
        }
        return pg;
    }

    // 2.
    $('#impression').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));
        
        $.ajax({
            url: "{{URL::route('itemsmomento')}}",
            data: { page: pg , can:ca , orde:ord , por:forma },
            success: function(data) {
                $('#impression').html(data);
            }
        });
    });


    $('#impression').load("{{URL::route('itemsmomento')}}"+"?page=1&can="+ca+"&orde="+ord+"&por="+forma);
});

$('#pagi').change(function(e) {
	/* Act on the event */
	e.preventDefault();
    var ca=$('#pagi').val();
    var ord=$('#orden').val();
    var forma=$('#por').val();
    function getPaginationSelectedPage(url) {
        var chunks = url.split('?');
        // alert(chunks); link de siguiente pag
        var baseUrl = chunks[0];
        // alert(baseUrl); url base
        var querystr = chunks[1].split('&');
        // alert(querystr);pagina
        var pg = 1;
        for (i in querystr) {
            var qs = querystr[i].split('=');
            if (qs[0] == 'page') {
                pg = qs[1];
                // alert(pg); # pagina
                break;
            }
        }
        return pg;
    }

    // 2.
    $('#impression').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));
        
        $.ajax({
            url: "{{URL::route('itemsmomento')}}",
            data: { page: pg , can:ca , orde:ord , por:forma },
            success: function(data) {
                $('#impression').html(data);
            }
        });
    });

    $('#impression').load("{{URL::route('itemsmomento')}}"+"?page=1&can="+ca+"&orde="+ord+"&por="+forma);
});
$('#orden').change(function(e) {
    /* Act on the event */
    e.preventDefault();
    var ca=$('#pagi').val();
    var ord=$('#orden').val();
    var forma=$('#por').val();
    function getPaginationSelectedPage(url) {
        var chunks = url.split('?');
        // alert(chunks); link de siguiente pag
        var baseUrl = chunks[0];
        // alert(baseUrl); url base
        var querystr = chunks[1].split('&');
        // alert(querystr);pagina
        var pg = 1;
        for (i in querystr) {
            var qs = querystr[i].split('=');
            if (qs[0] == 'page') {
                pg = qs[1];
                // alert(pg); # pagina
                break;
            }
        }
        return pg;
    }

    // 2.
    $('#impression').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));
        
        $.ajax({
            url: "{{URL::route('itemsmomento')}}",
            data: { page: pg , can:ca , orde:ord , por:forma },
            success: function(data) {
                $('#impression').html(data);
            }
        });
    });

    $('#impression').load("{{URL::route('itemsmomento')}}"+"?page=1&can="+ca+"&orde="+ord+"&por="+forma);
});
$('#por').change(function(e) {
    /* Act on the event */
    e.preventDefault();
    var ca=$('#pagi').val();
    var ord=$('#orden').val();
    var forma=$('#por').val();
    function getPaginationSelectedPage(url) {
        var chunks = url.split('?');
        // alert(chunks); link de siguiente pag
        var baseUrl = chunks[0];
        // alert(baseUrl); url base
        var querystr = chunks[1].split('&');
        // alert(querystr);pagina
        var pg = 1;
        for (i in querystr) {
            var qs = querystr[i].split('=');
            if (qs[0] == 'page') {
                pg = qs[1];
                // alert(pg); # pagina
                break;
            }
        }
        return pg;
    }

    // 2.
    $('#impression').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));
        
        $.ajax({
            url: "{{URL::route('itemsmomento')}}",
            data: { page: pg , can:ca , orde:ord , por:forma },
            success: function(data) {
                $('#impression').html(data);
            }
        });
    });

    $('#impression').load("{{URL::route('itemsmomento')}}"+"?page=1&can="+ca+"&orde="+ord+"&por="+forma);
});
</script>

</body>
</html>