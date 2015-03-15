@extends('layouts.LayoutUnAuth')

@section('menu')
{{MenuGen::render('top')}}
@stop

<?php
	//Obtener imagen que identifique el rol del usuario
	$Rol = Rol::find(Auth::user()->get()->RolId);
?>
@section('account')
<div class="col-xs-4 col-sm-8 top-panel-right">
	<ul class="nav navbar-nav pull-right panel-menu">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
				<div class="avatar">
					<img src="img/{{$Rol->RolImage}}" class="img-rounded" alt="avatar" />
				</div>
				<i class="fa fa-angle-down pull-right"></i>
				<div class="user-mini pull-right">
					<span class="welcome">Bienvenido,</span>
					<span>{{Auth::user()->get()->UserName}}</span>
				</div>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#">
						<i class="fa fa-user"></i>
						<span>Perfil</span>
					</a>
				</li>
				<li>
					<a href="{{URL::route('makelogout')}}">
						<i class="fa fa-power-off"></i>
						<span>Salir</span>
					</a>
				</li>
			</ul>
		</li>
	</ul>
</div>
@stop

@section('content')
<div id='jscontent'></div>
@stop


@section('jsfunctions')
  <script>

	$(document).on('click', '#createuser',function (e) {
	e.preventDefault();
	$.ajax({
	    	
	    	url: "{{URL::route('createuser')}}",
	    	type: 'GET',
	    	beforeSend: function(){
	    			
                    $('#jscontent').append('<center><img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/></center>');
                },
	    })
	    .done(function() {
	    	$("#jscontent").load('{{URL::route('createuser')}}');

	    })
	    .fail(function() {

	    })
	});



	$(document).on('click', '#edituser',function (e) {
	e.preventDefault();
	$.ajax({
	    	
	    	url: "{{URL::route('edituser')}}",
	    	type: 'GET',
	    	beforeSend: function(){
	    			
                    $('#jscontent').append('<center><img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/></center>');
                },
	    })
	    .done(function() {
	    	$("#jscontent").load('{{URL::route('edituser')}}');

	    })
	    .fail(function() {

	    })
	});


	$(document).on('click', '#downloadxml',function (e) {
	e.preventDefault();
	$.ajax({
	    	
	    	url: "{{URL::route('downloadxml')}}",
	    	type: 'GET',
	    	beforeSend: function(){
	    			
                    $('#jscontent').append('<center><img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/></center>');
                },
	    })
	    .done(function() {
	    	$("#jscontent").load('{{URL::route('downloadxml')}}');

	    })
	    .fail(function() {

	    })
	});

	//listar videos

	$(document).on('click', '#sharefb',function (e) {
	e.preventDefault();
	$.ajax({
	    	
	    	url: "{{URL::route('sharefb')}}",
	    	type: 'GET',
	    	beforeSend: function(){
	    			
                    $('#jscontent').append('<center><img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/></center>');
                },
	    })
	    .done(function() {
	    	$("#jscontent").load('{{URL::route('sharefb')}}');

	    })
	    .fail(function() {

	    })
	});

	




	
  </script>


@stop
