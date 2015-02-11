$(document).on('click', '#viewlogin',function (e) {
  	e.preventDefault();
  	// alert("llamar login");
  	$("#contentjs").load('{{URL::route('login')}}');

    });