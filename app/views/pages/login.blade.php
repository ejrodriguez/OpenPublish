
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="box">
				<div class="box-content">

					
					<div class="text-center">
						<h3 class="page-header">OpenPublish Login Page</h3>
						<div class="has-error has-feedback">
				         
		                </div>
						</div>	 

						<form id="LoginForm" method="post"  action="" >
			            <div class="form-group">
			            <label class="control-label">Email:</label>			            
			            	<input id="email" name="email" type="text" class="form-control" placeholder="email" data-toggle="tooltip" data-placement="bottom" title="Email de usuario">			              
				            <!-- <div class="has-error has-feedback">
					            <center><label id="_email" class="control-label"><center>{{$errors->first('email')}}</center></label></center>
			                </div> -->
			            </div> 
			            
			            <div class="form-group">
			            	<label class="control-label">Clave:</label>
				            	<input id="clave" name="clave" type="password" class="form-control" placeholder="P@ssw0rd" data-toggle="tooltip" data-placement="bottom" title="Clave de usuario">
			                <!-- <div class="has-error has-feedback">
					            <center><label id="_clave" class="control-label"><center>{{$errors->first('password')}}</center></label></center>
			                </div> -->
			            </div>
			            
			            <div class="form-group">
			                <label>Recordar sesión:</label>
			                <input id="recordars" checked="checked" name="remember" type="checkbox" value="On">
			                <input id="token" name="_token" type="hidden" value="{{csrf_token()}}">
			            </div>
			            
			            <div class="form-group " >
							<div >
								<button id="enviar" type="submit" class="btn btn-primary">Iniciar sesión</button>
							</div>			            	
			                <!-- <input id="enviar" class="btn btn-primary" type="submit" value="Iniciar sesión"> -->

			                <div id='before'></div>
			                <div  class="has-error has-feedback" id='beforemsg'></div>
			           </div>
			                
			        </form>   
				</div>
			</div>
	    </div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
  

<script>
	$(document).on('click', '#enviar',function (e) {
	    e.preventDefault();

	    //mensaje inicial de campos vacios
	    if($("#email").val()=='' | $("#clave").val()==''){
	    	$('#beforemsg').html('<label class="control-label">Ingrese todos los campos</label>');
	    }

	    //recordar sesion es seleccionado?
	    var a = false;
	    if( $('#recordars').is(':checked') ) 
		    {
			    a = true;
			}

		// peticion al servidor mediante ajax
	    $.ajax({
	    	
	    	url: "{{URL::route('makelogin')}}",
	    	type: 'POST',
	    	
	    	data: {email: $("#email").val() , clave: $("#clave").val() , remenber: a , token: $("#token").val()  },
	    	beforeSend: function(){
	    			
                    $('#before').append('<img src="img/devoops_getdata.gif"  alt="preloader"/>');
                },
	    })
	    .done(function(data) {
	    	// errores de validacion enviados desde el servidor 
	    	if(data.success == false){
	    		console.log(data.errors);
	    								
									   $.each(data.errors ,function(index,value)
									   {
									   	// $('#_'+index).text(value);
									   		console.log(index+' '+value);									   		
									   });
									   $('#before').html("<label></label>");
									}
			// la peticion se cumple correctamente
			if(data.success == true){

									   $('#before').html("");
									   // console.log(data.message);
									   jQuery(location).attr('href', "{{URL::to('/')}}"+"/"+data.message);

									   
									}
			//error de credenciales
			if(data.success == "falselog"){
										$.each(data.errors ,function(index,value)
									   {
									   		$('#_'+index).text(value);
									   		
									   });

									   $('#before').html(" "+data.message+" ");
									   // console.log(data.message);  
									}
	    })
	    .fail(function(data) {
	    	console.log(data.success);
	    	console.log(data.message);
	    })

    });
</script>

<script type="text/javascript">

//validaciones

$(document).ready(function() {
	// Load example of form validation
	LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();
});

//linmpiar mensaje inicial
jQuery(document).ready(function($) {
	$( "#email" ).change(function() {
		$('#beforemsg').hide();
	});
	$( "#clave" ).change(function() {
		$('#beforemsg').hide();
	});

});
</script>

