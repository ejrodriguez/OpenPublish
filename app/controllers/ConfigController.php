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
		$campos = array('user_id');
		$ids=UserUserGroupJoomla::where('group_id', '>=', 6)->where('group_id', '<=', 8)->groupBy('user_id')->get($campos);
		$var = array( );
		foreach ($ids as $value) {
        	$datuser=UserJoomla::find($value->user_id);
        	array_push($var,array('id' => $datuser->id , 'name' => $datuser->name , 'username' => $datuser->username));
        }
        $cant=count($var);

        $tabla='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Id</th><th>User</th></tr></thead><tbody>';
        for ($i=0; $i < $cant; $i++) { 
        	$tabla.='<tr><td>'.$var[$i]['id'].'</td><td>'.$var[$i]['username'].'</td></tr>';
        	 // echo $var[$i]['id'].' '.$var[$i]['name'].' '.$var[$i]['username'].'<br>';
        }
        $tabla.='</tbody><tfoot><tr><th>Id</th><th>User</th></tr></tfoot></table>';
      
       return Response::json(array(
			'success' => 'true',
			'list' => $tabla	
	    )); 
        // echo $tabla;


	}


	public function IdSaveOP(){
		$User = Input::get('idu');
		$id=1;
		$config=ConfigApp::find( $id );
		$config->UserJoomla = $User[0];
		$config->save();

		return Response::json(array(
			'success' => 'true',
			'actual' => $User[0],
			'list' => 'Se Actualizo Correctamente'	
	    )); 


	}

}