<!DOCTYPE html>
<html>
<head>
<!-- Add jQuery library -->
<script type="text/javascript" src="plugins/fancyapps/lib/jquery-1.10.1.min.js"></script>
</head>
<body>
<br>


<!-- 
 * [interfaz de galeria simple de openpublish]
 * @type {html}
 -->

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-picture-o"></i>
					<span>Galeria Simple</span>
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
				<div class="form-group" >
				<br>
					<div class="col-sm-1">
						<select class="populate placeholder" name="pagi" id="pagi" >
						<option  value="12">12</option>
						<option  value="24">24</option>
						<option  value="36">36</option>
						<option  value="100">100</option>
						</select>
					</div>
					<label class="col-sm-1 control-label">Registros </label>
				</div>
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
	
});
function DemoSelect2(){
	$('#pagi').select2();
};

$(function() {
    // 1.
    var ca=$('#pagi').val();
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
            url: "{{URL::route('itemstype')}}",
            data: { page: pg , can:ca },
            success: function(data) {
                $('#impression').html(data);
            }
        });
    });

    $('#impression').load("{{URL::route('itemstype')}}"+"?page=1&can="+ca);
});

$('#pagi').change(function(e) {
	/* Act on the event */
	e.preventDefault();
	    var ca=$('#pagi').val();
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
            url: "{{URL::route('itemstype')}}",
            data: { page: pg , can:ca },
            success: function(data) {
                $('#impression').html(data);
            }
        });
    });

    $('#impression').load("{{URL::route('itemstype')}}"+"?page=1&can="+ca);
});

</script>

</body>
</html>