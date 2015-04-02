<?php

class TwitterController extends \BaseController {

/*
	|--------------------------------------------------------------------------
	| Facebook Controller
	|--------------------------------------------------------------------------
	|Controlador de la API de Twittter.
	|
	*/

	public function __construct(TwitterHelper $tw)
	{
		$this->tw = $tw; 
	}

	//cargar cuentas de twitter
	public function AdmTwitter(){

		return View::make('pages.admtwitter');
	}

	public function login()
	{
		try {
				return Redirect::to($this->tw->getUrlLogin());	
		} catch (Exception $e) {
				return Redirect::to('welcome');	
		}
	}

	public function Callback()
	{
		//obtener el outh_verifier desde la respuesta de la pagina de twitter. 
		$oauth_verifier = Input::get('oauth_verifier');
		//nueva conexión. 

		try {
				$twitter= $this->tw->generateSessionFromRedirect($oauth_verifier);
				$account = Account::where('id_account','=',$twitter["user_id"])->get();
		
				if(count($account)==0)
				{
					$account = new Accounttw;
					$account->name = $twitter["screen_name"];
					$account->id_account = $twitter["user_id"];
					$account->oauth_token = $twitter["oauth_token"];
					$account->oauth_token_secret = $twitter["oauth_token_secret"];
					$account->usuario_ide =User::find(Auth::user()->get()->id)->id;
					$account->save();
				}
				return Redirect::to('welcome');	
					
		} catch (Exception $e) {
				return Redirect::to('welcome');	
		}

		
	}

	public function PostTweet()
	{
		$restul = $this->tw->PostTweet();
		var_dump($restul);
	}

	//listar cuentas para la administración
	public function ListAccount(){
		$Accounts = Accounttw::all();

		$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Id</th><th>Id Twitter</th><th>Nombre</th><th>Actualización</th><th>Eliminar</th></tr></thead><tbody>';
				foreach ($Accounts as $account) {
					$oauth_token = "'".$account->oauth_token."'";
					$oauth_token_secret = "'".$account->oauth_token_secret."'";
					$name = "'".$account->name."'";
					$create = "'".$account->created_at."'";
					$update = "'".$account->updated_at."'";
					$encontrados=$encontrados.'<tr><td id="id">'.$account->idtw.'</td><td id="id_account">'.$account->id_account.'</td><td id="id_name">'.$account->name.'</td><td id="id_fecha">'.$account->updated_at.'</td>
	                <td>
					<span onclick="ShowDelet('.$account->idtw.','.$account->id_account.','.$name.','.$oauth_token.','.$update.','.$create.')" class="dtr-data"><a id="callmodaldel" data-toggle="modal" href="#modaldatadel" class="btn btn-danger btn-large">
					<span class="fa fa-trash-o" aria-hidden="true"></span> Eliminar</a></span>
					</td>
	                </tr>';
				}
		$encontrados=$encontrados.'</tbody><tfoot><tr><th>Id</th><th>Id Facebook</th><th>Nombre</th><th>Actualización</th><th>Eliminar</th></tr></tfoot></table>
									<br>
								   	<fieldset>
								   	<h4 id="result"></h4>
									</fieldset>
									<legend></legend>
								    <fieldset>
								    
									   <div><button  onclick="NewAccount()" type="button" class="btn btn-default" aria-label="Left Align">
		                				<i class="fa fa-twitter txt-primary" aria-hidden="true"></i>      Registrar nueva cuenta.</div>
								    </fieldset>
								    ';
		return Response::json(array(
			'success' => true,
			'list' => $encontrados	
            )); 
	}

	public function destroy()
	{
		if (Request::ajax())
		{
			DB::beginTransaction();
			try {

				$UserDel = Accounttw::find(Input::get('id'));
				$UserDel->delete();
			} 
				catch (Exception $e) {
				DB::rollback();
				return Response::json(array(
			                    'success'         =>     'falserollb',
			                    'list'         =>      $e->getErrors()
			                    ));
			}

			DB::commit();

			return Response::json(array(
                    'success'         =>     'true',
                    'msg'         =>     'Se ha eliminado correctamente'
                    ));
		}
	}

}
