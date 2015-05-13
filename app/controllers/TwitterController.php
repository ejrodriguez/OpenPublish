<?php

class TwitterController extends \BaseController {

/*
	|--------------------------------------------------------------------------
	| Twitter Controller
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
				$account = Accounttw::where('id_account','=',$twitter["user_id"])->get();
		
				if(count($account) == 0)
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

	//listar cuentas para la administración
	public function ListAccount(){
		$Accounts = Accounttw::all();


		$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Id</th><th>Id Twitter</th><th>Nombre</th><th>Actualización</th><th>Eliminar</th></tr></thead><tbody>';
				foreach ($Accounts as $account) {

					if( Auth::user()->get()->RolId != 1 )
					{
						//si no lo es presentar solamente sus cuantas. 
						if($account->usuario_ide == Auth::user()->get()->id)
						{
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
			        }
			        else
			        {
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
				}
		$encontrados=$encontrados.'</tbody><tfoot><tr><th>Id</th><th>Id Twitter</th><th>Nombre</th><th>Actualización</th><th>Eliminar</th></tr></tfoot></table>
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
//listar cuentas para publicar.
 
	public function ListAccounttw(){
		$Accounts = Accounttw::all();
		$accounts =""; 
		if (count($accounts) ==0)
		{
			$encontrados = $encontrados.'<h4>No existe cuentas de twitter registradas, agregue las cuentas en Adminsitración de Twiiter</h4></div>';		
		}
		else
		{
			foreach ($Accounts as $account) {

				if( Auth::user()->get()->RolId != 1 )
					{
						//si no lo es presentar solamente sus cuantas. 
						if($account->usuario_ide == Auth::user()->get()->id)
						{
							$name = $account->name;
							$idaccount = $account->idtw; 
							$accounts.='<option value='.$idaccount.'>'.$name.'</option>';
						}
					}	
					else
					{
						$name = $account->name;
						$idaccount = $account->idtw; 
						$accounts.='<option value='.$idaccount.'>'.$name.'</option>';
					}

			}
			$encontrados = '<select id="account" name="modal_menu" multiple="multiple" class="populate placeholder">
				        		'.$accounts.'					
								</select>';
		}
		
		return Response::json(array(
			'success' => true,
			'list' => $encontrados	
            )); 
	}

	//función para twittear en las cuentas. 
	public function Twittear()
	{ //message:messsage,account:account
		$msg=""; 
		if (Request::ajax()) {
			if (Input::get('accounts')!=null)
			{	
				$idcuenta  = NULL; 
				//ides, lista de los ID de cada grupo, evento, perfil, para publicar
				$accounts = Input::get('accounts');
				$mensaje =Input::get('message');
				//recorre una sola ver ya que se obtiene una sola cuenta. 
				foreach ($accounts as $account) {

					$idcuenta = Accounttw::where('idtw', '=',$account)->get();
					
					if ($idcuenta != NULL)
					{
						$oauth_token = $idcuenta[0]["oauth_token"];
						$oauth_token_secret  = $idcuenta[0]["oauth_token_secret"];
						$session = $this->tw->generateSession($oauth_token,$oauth_token_secret);
						if($session!= NULL){
							$result = $this->tw->PostTweet($session,$mensaje);
							//comprobar si el resultado es un array con mensaje de error o confirmación
							//de la publicación. 
							if (isset($result->errors) == 0 ){

								$msg = $msg.'Publicado en la cuenta  '.$idcuenta[0]["name"]."<br>";
							}
							else
								{
									$msg =$msg.'<p class="alert alert-danger"> Error:  '.$result->errors[0]->message.' en la cuenta: '.$idcuenta[0]["name"].'</p></br>';
								}
						}
						else{
							$msg =$msg.'Error en abrir la sesion: '.$idcuenta[0]["name"].'</br>';
						} 
					}
					else
					{
						$msg =$msg.'<p class="alert alert-danger"> No existen cuentas registradas, primero registre una para realizar un tweet </p></br>';
					}				
				}
				return Response::json(array(
			                    'success'         =>   'true',
			                    'msg'        =>  $msg
			                    ));
			}
			else
			{
				return Response::json(array(
				                    'success'         =>   'false',
				                    'msg'        =>  $msg
				                    ));
			}
		}
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

public function Trending()
	{ 
		$trnd="";
		$encontrados="";
		if (Request::ajax()) 
		{
				$idcuenta  = NULL; 

				if( Auth::user()->get()->RolId == 1 )
				{
					$idcuenta = Accounttw::First()->get();
				}
				else
				{
					$idcuenta = Accounttw::where('usuario_ide', '=', Auth::user()->get()->id)->get();
				}
					$oauth_token = $idcuenta[0]["oauth_token"];
					$oauth_token_secret  = $idcuenta[0]["oauth_token_secret"];
					$session = $this->tw->generateSession($oauth_token,$oauth_token_secret);
					if($session!= NULL)
					{
						$result = $this->tw->Get_trends($session);
						if (isset($result->errors) == 0 ){
								foreach ($result[0]->trends as $value) 
								{
								$trnd.='<span class="fc-button  fc-state-default fc-corner-center">'.$value->name.' '.'</span>'; 		
								}
						}
						else
							{
								$trnd =$trnd.'<p class="alert alert-danger"> Error:  '.$result->errors[0]->message.' en la cuenta: '.$idcuenta[0]["name"].'</p></br>';

							}
					} 	

				$encontrados = '<td id="ClickWordList" class="fc-header-center">
				        		'.$trnd.'					
								</td>';

		}
		return Response::json(array(
			                    'success'         =>   true,
			                    'list'        =>  $encontrados
			                    ));
	}
}