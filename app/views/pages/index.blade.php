@extends('layouts.LayoutUnAuth')
@section('menu')

{{MenuGen::render('top')}}


@stop



@section('content')
<div id="contentjs"></div>
@stop

@section('jsfunctions')
  <script>
    // $(document).on('click', '#login',function (e) {
    //     e.preventDefault();
    //     $("#contentjs").load('{{URL::route('login')}}');
    // });

	$(document).on('click', '#login',function (e) {
	e.preventDefault();
	$.ajax({
	    	
	    	url: "{{URL::route('login')}}",
	    	type: 'GET',
	    	beforeSend: function(){
	    			
                    $('#contentjs').append('<center><img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/></center>');
                },
	    })
	    .done(function() {
	    	$("#contentjs").load('{{URL::route('login')}}');

	    })
	    .fail(function() {

	    })
	});
  </script>
@stop