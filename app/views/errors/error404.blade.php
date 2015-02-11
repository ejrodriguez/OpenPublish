@extends('layouts.LayoutUnAuth')
@section('content')
<?php
    $Url=Route::currentRouteName();

      if($Url=='index')
      {
        $Link='index';
      }
      else
      {
        $Link='showwelcome';
      }

?>
<div class="row">
	<div class="col-xs-12 text-center page-404">
		<h1>Error 404</h1>
		<form class="form-inline" role="form">
			<h3>Oops, page not found</h3>
			<div class="input-group">

			</div>
		</form>
		<div class="container-fluid">
		<div class="row">
			<div id="page-500" class="col-xs-12 text-center">
				
				<a href="{{URL::route($Link)}}" class="btn btn-default btn-label-left"><span><i class="fa fa-reply"></i></span> Go to Open Publish Home</a>
			</div>
		</div>
	</div>

	</div>
</div>

@stop
