<?php

class ConfigController extends BaseController {

	
	public function ViewConfig()
	{
		$config = ConfigApp::First()->get();
		return View::make('pages.viewconfig')->with('items', $config);	
	}

	public function SaveYoutube()
	{
		$id=1;
		$config=ConfigApp::find( $id );
		$config->YouTubeKey = Input::get('ykey');
		$config->save();
		return Response::json(array(
			'success' => 'true',
			'list' => 'Se Actualizo Correctamente'	
	    )); 
	}

	public function SaveVimeo()
	{
		$id=1;
		$config=ConfigApp::find( $id );
		$config->VimeoClientId = Input::get('id');
		$config->VimeoClientSecret = Input::get('secret');
		$config->VimeAccessToken = Input::get('token');
		$config->save();
		return Response::json(array(
			'success' => 'true',
			'list' => 'Se Actualizo Correctamente'	
	    )); 
	}

	public function SaveFacebook()
	{
		$id=1;
		$config=ConfigApp::find( $id );
		$config->AppIdFacebook = Input::get('id');
		$config->AppSecretFacebook = Input::get('secret');
		$config->save();
		return Response::json(array(
			'success' => 'true',
			'list' => 'Se Actualizo Correctamente'	
	    )); 
	}

	public function SaveTwitter()
	{
		$id=1;
		$config=ConfigApp::find( $id );
		$config->ConsumerKeyTw = Input::get('key');
		$config->ConsumerSecretTw = Input::get('secret');
		$config->save();
		return Response::json(array(
			'success' => 'true',
			'list' => 'Se Actualizo Correctamente'	
	    )); 
	}

	public function SaveUserJoomla()
	{
		echo 'a';
	// 	// $items_per_page = Input::get('can');
	// 	// $ordenar_items = Input::get('orde');
	// 	// $forma_orden = Input::get('por');
	// 	$items_per_page = 10;
	// 	$ordenar_items = 'user_id';
	// 	$forma_orden = 'ASC';

	// 	$campos = array('user_id');
	// 	$var = array( );


 //        $items = UserUserGroupJoomla::where('group_id', '>=', 6)->where('group_id', '<=', 8)->groupBy('user_id')->select($campos)->paginate($items_per_page);
 //        foreach ($items as $value) {
 //        	$datuser=UserJoomla::find($value->user_id);
 //        	array_push($var,array('id' => $datuser->id , 'name' => $datuser->name , 'username' => $datuser->username));

 //        }
 //        // print_r($var);
 //        echo '<br>';
 //        var_dump($items);
 //  //       $var1 = array('a','b','c' );
 //  //       // $var->paginate($items_per_page);
 //  //       // var_dump( json_encode($var));
	// 	// // $page = ;
	// 	//     $perPage=12;
	// 	//     $pages = array_chunk($var, $perPage);
	// 	//     print_r($pages);
	// 	//     $paginator = Paginator::make($pages[$page - 1], count($var1), $perPage);
	// 	// $paginator=Paginator::make($var1, count($var1), $items_per_page);
	// 	// var_dump($var1);
 //        if ($items->isEmpty()) {
	// 	   echo '<div class="box-content"><legend id="uniq" class="alert alert-info">No hay usuarios para visualizar</legend></div>';
	// 	   exit;
	// 	}
	// 	else
	// 	{
	// 		$view = View::make('pages.itemsuser')->with('items', $items);
	// 	    echo $view;

	// 	    exit;
	// 	} 
	// 	
	
		// $campos = array('id', 'title', 'videourl','rate','times_viewed','thumburl');
		// $tabla2= [];
		// $ind = 0; 
	 //    $tabla = Datatable::collection( Video::where('published', '=', 1)->where('memberid', '=', 539)->where('filepath', '!=', 'File')->get($campos) )
	    
	 //    ->showColumns('id', 'title', 'videourl','rate','times_viewed','thumburl')
	 //    ->searchColumns('title')
	 //    ->orderColumns('id', 'title')
	 //    ->orderColumns('id','title')
	 //    ->make();

	 //    //modifcar el objeto para presentar en la tabla con el formato requerido 
	 //    //para la integraión de la imagen y el boton para presentar el modal.
	 //    for ($i=0; $i < count($tabla['aaData']) ; $i++) { 

		// 		$market = VideoOpenpub::where('VideoUrl', '=', $tabla['aaData'][$i][2])->count();
		// 		$alavista = Video::where('videourl', '=', $tabla['aaData'][$i][2])->count();
		// 		$enmark='';$enav='';

		// 		if ($market>0) {$enmark='<center><i class="fa fa-check txt-success"></i></center>';} else{$enmark='<center><i class="fa fa-times txt-danger"></i></center>';}
		// 		if ($alavista>0) {$enav='<center><i class="fa fa-check txt-success"></i></center>';} else{$enav='<center><i class="fa fa-times txt-danger"></i></center>';}
				
		// 		$tabla2['aaData'][$ind][0] =  '';
	 //    		$tabla2['aaData'][$ind][1] = '<input class="ajoomla" type="checkbox" name="elemento'.$tabla['aaData'][$i][0].'" id="' . $tabla['aaData'][$i][0]. '" value="' . $tabla['aaData'][$i][0] . '"/>';
	 //    		$tabla2['aaData'][$ind][2] =  $enmark;
	 //    		$tabla2['aaData'][$ind][3] =  $enav;
	 //    		// $tabla2['aaData'][$ind][4] ='<a class="fancybox-media" href="'.$tabla['aaData'][$i][2].'" title="'.$tabla['aaData'][$i][1].'"><img src="'.$tabla['aaData'][$i][5].'" width="240px" height="137px" alt="" /></a>';
	 //    		$tabla2['aaData'][$ind][4] =  '<img src="'.$tabla['aaData'][$i][5]. '" width="160" height="100">';
	 //    		$tabla2['aaData'][$ind][5] =  $tabla['aaData'][$i][1];
	 //    		// $tabla2['aaData'][$ind][6] =  '<a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-danger btn-large"><span class="fa fa-trash-o" aria-hidden="true"></span></a>';
	 //    		$tabla2['aaData'][$ind][6] =  '<center><b>'.$tabla['aaData'][$i][4].'</b></center>';
	 //    		$tabla2['aaData'][$ind][7] =  '<center><b>'.$tabla['aaData'][$i][3].'</b></center>';

		// 		$ind += 1; 
	 //    }
	 //    if (count($tabla['aaData']) == 0 )
	 //    	$tabla2['aaData'] = [];
	 //    $tabla2['iTotalDisplayRecords'] = $tabla['iTotalDisplayRecords'];
	 //    $tabla2['iTotalRecords'] = $tabla['iTotalRecords'];
	 //    $tabla2['sEcho'] = $tabla['sEcho'];

	 //    return $tabla2;




	}

}