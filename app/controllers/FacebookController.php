<?php

class FacebookController extends \BaseController {

	private $fb;
	private $session;

	public function __construct(FacebookHelper $fb)
	{
		$this->fb = $fb; 
	}

	public function login()
	{
		return Redirect::to($this->fb->getUrlLogin());
	}	

	public function callback()
	{
		$this->session = $this->fb->generateSessionFromRedirect();

		if(!($this->session))
		{
			return Redirect::to('welcome');	
		}
		else
		{
			//guardar sesion de facebook iniciada. 
			//Session::put('session',$this->session);
			
			//obtener la información del usuario.
			$user_fb=$this->fb->getGraph();

			if(!$user_fb)
			{
				return Redirect::to('welcome');	
				//return Redirect::to('/')->with('message','Objeto getGraph vacio');
			}
			else
			{
				$account = Account::where('id_account','=',$user_fb->getProperty('id'))->get();
				
				if(count($account)==0)
				{
					$account = new Account;
					$account->name = $user_fb->getProperty('name');
					$account->id_account = $user_fb->getProperty('id');
					$account->access_token_fb = $this->fb->getTokenLong($this->session);
					$account->usuario_id =User::find(Auth::user()->get()->id)->id;
					$account->save();
				}
				return Redirect::to('welcome');	
			}
		}	
			
	} 

	//publicar  facebook
	public function share()
		{
			$msg="";
			$token="";
			if (Request::ajax()) {
				if (Input::get('ids')!=null)
				{	
					//ides, lista de los ID de cada grupo, evento, perfil, para publicar
					$ides = Input::get('ids');
					$idcuenta = Input::get('idcuenta');
					$mensaje =Input::get('mensaje');
					$link = Input::get('link');
					$descripcion =Input::get('descripcion');
					//-- obtener session
					$idcuenta = Account::where('id', '=',$idcuenta)->get(array('access_token_fb'));
					//recorre una sola ver ya que se obtiene una sola cuenta. 
					foreach ($idcuenta as $identificador) {
						$token = $identificador->access_token_fb;
					}
					//obtener la sessión fb. 
					$sessionfb = $this->fb->generateSessionFromToken($token);
					//--------------------
					foreach ($ides as $id) {
						$msg =$msg.$this->fb->postaccount($id,$link,$mensaje,$descripcion,$sessionfb)."</br>";
					}				
						return Response::json(array(
				                    'success'         =>   'true',
				                    'msg'         =>  $msg
				                    ));
				}
					else
					{
						return Response::json(array(
				                    'success'         =>     'false',
				                    'msg'         =>     'ID de cuentas no obtenidas'
				                    ));
					}

			}
			
		}

//listar cuentas
	public function Listaccounts()
	{ 
		$accounts = Account::all();

		$contador =0;
		$encontrados='<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
		
		if (count($accounts) == 0)
		{
			$encontrados = $encontrados.'<h4>No existe cuentas de facebook registradas, agregue las cuentas en Adminsitración de Facebook</h4></div>';
		}
		else
		{
			foreach ($accounts as $account) 
			{
				//comprobar si el usuario autenticado es el adm presentar todas las cuentas. 
				//con el rol si es igual a 1 es adm.
				if(Auth::user()->get()->RolId  != 1 )
				{
					//si no es adm listar solo sus cuentas. 
					if($account->usuario_id == Auth::user()->get()->id)
					{				
						$grp="";
						$pgs="";
						$evts="";
						//obtener token de la base de datos
						$token= $account->access_token_fb;
						//generateSessionFromToken
						$session=$this->fb->generateSessionFromToken($token);
						//identificador de la cuenta para publicar en el perfil. 
						$id = $account->id_account;

						//obtener grupos.
						$groups = $this->fb->getGraphGroups($session);

						//verificar si se pudo iniciar sesion retornara un array
						//caso contrario retornara un string con un mensaje de error.
						//is_string($var) determina si la variable es un string. 
						if (is_string($groups) == 1 )
						{
							$encontrados = $encontrados.'<p class="alert alert-danger">
							Cuenta de '.
							$account->name.'  obtubo un error: '.  $groups.'<p>'; 
						} 
						else
						{
								$groups = $groups->getProperty('data');
								if($groups != NULL)
									{
										$groups = $groups->asArray();
										foreach ($groups as $group) {
											$grp.='<option value='.$group->id.'>'.$group->name.'</option>';
										}
									}
								//obtener paginas
								$pages = $this->fb->getGraphPages($session);
								if (is_string($pages) != 1 )
								{
									$pages = $pages->getProperty('data');
									if($pages !=NULL)
										{
											$pages = $pages->asArray();		
											foreach ($pages as $page) {
												$pgs.='<option value='.$page->id.'>'.$page->name.'</option>';
											}
										}
								}
								//obtener eventos
								$events = $this->fb->getGraphEvents($session);
								if(is_string($events) !=1 )
								{
									$events = $events->getProperty('data');
									if($events != NULL)
										{
											$events = $events->asArray();
											foreach ($events as $event) {
												$evts.='<option value='.$event->id.'>'.$event->name.'</option>';
											}
										}
								}
								//variables para enviar que imput llenar automaticamente. 
								$contador +=1;
								$allg = "'".'groups'.$contador."'";
								$checkg = "'".'checkg'.$contador."'"; 
								$allp = "'".'pages'.$contador."'";
								$checkp = "'".'checkp'.$contador."'"; 
								$alle = "'".'events'.$contador."'";
								$checke = "'".'checke'.$contador."'"; 
								$encontrados= $encontrados.'
											<div  class="panel panel-default">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$contador.'" aria-expanded="false" aria-controls="collapse'.$contador.'">
											    <div  class="panel-heading" role="tab" id="heading'.$contador.'">
												    <h4 class="panel-title">									       
													     '.$account->name.' <a tabindex="0" data-toggle="popover" data-trigger="focus" id="info1" class="" ></a>
													</h4>	
												</div>
											</a>

											<div id="collapse'.$contador.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$contador.'">
											    <div class="panel-body">
											    <p id="id'.$contador.'"> ID Cuenta: '.$id.'</p>
												<div class="checkbox">
													<p>&nbsp;&nbsp;Seleccionar perfil
													<label>
													<input id="checkm'.$contador.'" name="check"  type="checkbox"/><i class="fa fa-square-o"></i>
													</label>
													</p>
												</div>
											    <input type="text" id="'.$contador.'" value="'.$id.'" style="display:none"/>
											    <input type="text" id="idcuenta'.$contador.'" value="'.$account->id.'" style="display:none"/>
											    <h5>Grupos</h5>
											    <select id="groups'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
												'.$grp.'						
												</select>
												<div class="checkbox">
													<p>&nbsp;&nbsp;Seleccionar todos
													<label>
													<input id="checkg'.$contador.'" onclick="checkTodos('.$allg.','.$checkg.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
												   </label>
													</p>
												</div>
											    <h5>Páginas</h5>
											    <select id="pages'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
												'.$pgs.'						
												</select>
												<div class="checkbox">
													<p>&nbsp;&nbsp;Seleccionar todos
													<label>
													<input id="checkp'.$contador.'" onclick="checkTodos('.$allp.','.$checkp.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
											     	</label>
													</p>
												</div>
											    <h5>Eventos</h5>
											    <select id="events'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
												'.$evts.'						
												</select>
												<div class="checkbox">
													<p>&nbsp;&nbsp;Seleccionar todos
													<label>
													<input id="checke'.$contador.'" onclick="checkTodos('.$alle.','.$checke.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
													</label>
													</p>
												</div>
												<br><br>
												 <button onclick="Share('.$contador.')" type="button" class="btn btn-default" aria-label="Left Align">
					               				 <span class="fa fa-share-square " aria-hidden="true">Publicar</span>
											</div>
											<div id="resultshare'.$contador.'"></div>
											</div>
											</div>';
						}
					}	
				}
				else
				{

						$grp="";
						$pgs="";
						$evts="";
						//obtener token de la base de datos
						$token= $account->access_token_fb;
						//generateSessionFromToken
						$session=$this->fb->generateSessionFromToken($token);
						//identificador de la cuenta para publicar en el perfil. 
						$id=$account->id_account;

						//obtener grupos
						$groups = $this->fb->getGraphGroups($session);
						//verificar si se pudo iniciar sesion retornara un array
						//caso contrario retornara un string con un mensaje de error.
						if (is_string($groups) == 1 )
						{
							$encontrados = $encontrados.'<p class="alert alert-danger">
							Cuenta de '.
							$account->name.'  obtubo un error: '.  $groups.'<p>'; 
						} 
						else
						{
							$groups = $groups->getProperty('data');

							if($groups != NULL)
								{
									$groups = $groups->asArray();
									foreach ($groups as $group) {
										$grp.='<option value='.$group->id.'>'.$group->name.'</option>';
									}
								}

							//obtener paginas
							$pages = $this->fb->getGraphPages($session);
							if(is_string($pages) != 1 )
							{
								$pages = $pages->getProperty('data');
								if($pages !=NULL)
									{
										$pages = $pages->asArray();		
										foreach ($pages as $page) {
											$pgs.='<option value='.$page->id.'>'.$page->name.'</option>';
										}
									}
							}
							//obtener eventos
							$events = $this->fb->getGraphEvents($session);
							if(is_string($events) != 1)
							{
							$events = $events->getProperty('data');
							if($events != NULL)
								{
									$events = $events->asArray();
									foreach ($events as $event) {
										$evts.='<option value='.$event->id.'>'.$event->name.'</option>';
									}
								}
							}
							//variables para enviar que imput llenar automaticamente. 
							$contador +=1;
							$allg = "'".'groups'.$contador."'";
							$checkg = "'".'checkg'.$contador."'"; 
							$allp = "'".'pages'.$contador."'";
							$checkp = "'".'checkp'.$contador."'"; 
							$alle = "'".'events'.$contador."'";
							$checke = "'".'checke'.$contador."'"; 
							$encontrados= $encontrados.'
										<div  class="panel panel-default">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$contador.'" aria-expanded="false" aria-controls="collapse'.$contador.'">
										    <div  class="panel-heading" role="tab" id="heading'.$contador.'">
											    <h4 class="panel-title">									       
												     '.$account->name.' <a tabindex="0" data-toggle="popover" data-trigger="focus" id="info1" class="" ></a>
												</h4>	
											</div>
										</a>

										<div id="collapse'.$contador.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$contador.'">
										    <div class="panel-body">
										    <p id="id'.$contador.'"> ID Cuenta: '.$id.'</p>
											<div class="checkbox">
												<p>&nbsp;&nbsp;Seleccionar perfil
												<label>
												<input id="checkm'.$contador.'" name="check"  type="checkbox"/><i class="fa fa-square-o"></i>
												</label>
												</p>
											</div>
										    <input type="text" id="'.$contador.'" value="'.$id.'" style="display:none"/>
										    <input type="text" id="idcuenta'.$contador.'" value="'.$account->id.'" style="display:none"/>
										    <h5>Grupos</h5>
										    <select id="groups'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
											'.$grp.'						
											</select>
											<div class="checkbox">
												<p>&nbsp;&nbsp;Seleccionar todos
												<label>
												<input id="checkg'.$contador.'" onclick="checkTodos('.$allg.','.$checkg.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
											   </label>
												</p>
											</div>
										    <h5>Páginas</h5>
										    <select id="pages'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
											'.$pgs.'						
											</select>
											<div class="checkbox">
												<p>&nbsp;&nbsp;Seleccionar todos
												<label>
												<input id="checkp'.$contador.'" onclick="checkTodos('.$allp.','.$checkp.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
										     	</label>
												</p>
											</div>
										    <h5>Eventos</h5>
										    <select id="events'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
											'.$evts.'						
											</select>
											<div class="checkbox">
												<p>&nbsp;&nbsp;Seleccionar todos
												<label>
												<input id="checke'.$contador.'" onclick="checkTodos('.$alle.','.$checke.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
												</label>
												</p>
											</div>
											<br><br>
											 <button onclick="Share('.$contador.')" type="button" class="btn btn-default" aria-label="Left Align">
				               				 <span class="fa fa-share-square " aria-hidden="true">Publicar</span>
										</div>
										<div id="resultshare'.$contador.'"></div>
										</div>
										</div>';
						}
				}			
			}	
		}		
		return Response::json(array(
			'success' => true,
			'list' => $encontrados
            )); 
	}
//-----------------------Listar cuentas para publicar paginas.
//listar cuentas
	public function Listaccounts2()
	{ 
		$accounts = Account::all();

		$contador =0;
		$encontrados='<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">';
		
		if (count($accounts) == 0)
		{
			$encontrados = $encontrados.'<h4>No existe cuentas de facebook registradas, agregue las cuentas en Adminsitración de Facebook</h4></div>';
		}
		else
		{
			foreach ($accounts as $account) 
			{
				//comprobar si el usuario autenticado es el adm presentar todas las cuentas. 
				//con el rol si es igual a 1 es adm.
				if(Auth::user()->get()->RolId  != 1 )
				{
					//si no es adm listar solo sus cuentas. 
					if($account->usuario_id == Auth::user()->get()->id)
					{				
						$grp="";
						$pgs="";
						$evts="";
						//obtener token de la base de datos
						$token= $account->access_token_fb;
						//generateSessionFromToken
						$session=$this->fb->generateSessionFromToken($token);
						//identificador de la cuenta para publicar en el perfil. 
						$id = $account->id_account;

						//obtener grupos.
						$groups = $this->fb->getGraphGroups($session);

						//verificar si se pudo iniciar sesion retornara un array
						//caso contrario retornara un string con un mensaje de error.
						//is_string($var) determina si la variable es un string. 
						if (is_string($groups) == 1 )
						{
							$encontrados = $encontrados.'<p class="alert alert-danger">
							Cuenta de '.
							$account->name.'  obtubo un error: '.  $groups.'<p>'; 
						} 
						else
						{
								$groups = $groups->getProperty('data');
								if($groups != NULL)
									{
										$groups = $groups->asArray();
										foreach ($groups as $group) {
											$grp.='<option value='.$group->id.'>'.$group->name.'</option>';
										}
									}
								//obtener paginas
								$pages = $this->fb->getGraphPages($session);
								if (is_string($pages) != 1 )
								{
									$pages = $pages->getProperty('data');
									if($pages !=NULL)
										{
											$pages = $pages->asArray();		
											foreach ($pages as $page) {
												$pgs.='<option value='.$page->id.'>'.$page->name.'</option>';
											}
										}
								}
								//obtener eventos
								$events = $this->fb->getGraphEvents($session);
								if(is_string($events) !=1 )
								{
									$events = $events->getProperty('data');
									if($events != NULL)
										{
											$events = $events->asArray();
											foreach ($events as $event) {
												$evts.='<option value='.$event->id.'>'.$event->name.'</option>';
											}
										}
								}
								//variables para enviar que imput llenar automaticamente. 
								$contador +=1;
								$allg = "'".'groups2'.$contador."'";
								$checkg = "'".'checkg2'.$contador."'"; 
								$allp = "'".'pages2'.$contador."'";
								$checkp = "'".'checkp2'.$contador."'"; 
								$alle = "'".'events2'.$contador."'";
								$checke = "'".'checke2'.$contador."'"; 
								$encontrados= $encontrados.'
											<div  class="panel panel-default">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2'.$contador.'" aria-expanded="false" aria-controls="collapse'.$contador.'">
											    <div  class="panel-heading" role="tab" id="heading2'.$contador.'">
												    <h4 class="panel-title">									       
													     '.$account->name.' <a tabindex="0" data-toggle="popover" data-trigger="focus" id="info1" class="" ></a>
													</h4>	
												</div>
											</a>

											<div id="collapse2'.$contador.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$contador.'">
											    <div class="panel-body">
											    <p id="id'.$contador.'"> ID Cuenta: '.$id.'</p>
												<div class="checkbox">
													<p>&nbsp;&nbsp;Seleccionar perfil
													<label>
													<input id="checkm2'.$contador.'" name="check"  type="checkbox"/><i class="fa fa-square-o"></i>
													</label>
													</p>
												</div>
											    <input type="text" id="'.$contador.'" value="'.$id.'" style="display:none"/>
											    <input type="text" id="idcuenta'.$contador.'" value="'.$account->id.'" style="display:none"/>
											    <h5>Grupos</h5>
											    <select id="groups2'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
												'.$grp.'						
												</select>
												<div class="checkbox">
													<p>&nbsp;&nbsp;Seleccionar todos
													<label>
													<input id="checkg2'.$contador.'" onclick="checkTodos('.$allg.','.$checkg.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
												   </label>
													</p>
												</div>
											    <h5>Páginas</h5>
											    <select id="pages2'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
												'.$pgs.'						
												</select>
												<div class="checkbox">
													<p>&nbsp;&nbsp;Seleccionar todos
													<label>
													<input id="checkp2'.$contador.'" onclick="checkTodos('.$allp.','.$checkp.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
											     	</label>
													</p>
												</div>
											    <h5>Eventos</h5>
											    <select id="events2'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
												'.$evts.'						
												</select>
												<div class="checkbox">
													<p>&nbsp;&nbsp;Seleccionar todos
													<label>
													<input id="checke2'.$contador.'" onclick="checkTodos('.$alle.','.$checke.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
													</label>
													</p>
												</div>
												<br><br>
												 <button onclick="Share2('.$contador.')" type="button" class="btn btn-default" aria-label="Left Align">
					               				 <span class="fa fa-share-square " aria-hidden="true">Publicar</span>
											</div>
											<div id="resultshare2'.$contador.'"></div>
											</div>
											</div>';
						}
					}	
				}
				else
				{

						$grp="";
						$pgs="";
						$evts="";
						//obtener token de la base de datos
						$token= $account->access_token_fb;
						//generateSessionFromToken
						$session=$this->fb->generateSessionFromToken($token);
						//identificador de la cuenta para publicar en el perfil. 
						$id=$account->id_account;

						//obtener grupos
						$groups = $this->fb->getGraphGroups($session);
						//verificar si se pudo iniciar sesion retornara un array
						//caso contrario retornara un string con un mensaje de error.
						if (is_string($groups) == 1 )
						{
							$encontrados = $encontrados.'<p class="alert alert-danger">
							Cuenta de '.
							$account->name.'  obtubo un error: '.  $groups.'<p>'; 
						} 
						else
						{
							$groups = $groups->getProperty('data');

							if($groups != NULL)
								{
									$groups = $groups->asArray();
									foreach ($groups as $group) {
										$grp.='<option value='.$group->id.'>'.$group->name.'</option>';
									}
								}

							//obtener paginas
							$pages = $this->fb->getGraphPages($session);
							if(is_string($pages) != 1 )
							{
								$pages = $pages->getProperty('data');
								if($pages !=NULL)
									{
										$pages = $pages->asArray();		
										foreach ($pages as $page) {
											$pgs.='<option value='.$page->id.'>'.$page->name.'</option>';
										}
									}
							}
							//obtener eventos
							$events = $this->fb->getGraphEvents($session);
							if(is_string($events) != 1)
							{
							$events = $events->getProperty('data');
							if($events != NULL)
								{
									$events = $events->asArray();
									foreach ($events as $event) {
										$evts.='<option value='.$event->id.'>'.$event->name.'</option>';
									}
								}
							}
							//variables para enviar que imput llenar automaticamente. 
							$contador +=1;
							$allg = "'".'groups2'.$contador."'";
							$checkg = "'".'checkg2'.$contador."'"; 
							$allp = "'".'pages2'.$contador."'";
							$checkp = "'".'checkp2'.$contador."'"; 
							$alle = "'".'events2'.$contador."'";
							$checke = "'".'checke2'.$contador."'"; 
							$encontrados= $encontrados.'
										<div  class="panel panel-default">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse2'.$contador.'" aria-expanded="false" aria-controls="collapse'.$contador.'">
										    <div  class="panel-heading" role="tab" id="heading2'.$contador.'">
											    <h4 class="panel-title">									       
												     '.$account->name.' <a tabindex="0" data-toggle="popover" data-trigger="focus" id="info1" class="" ></a>
												</h4>	
											</div>
										</a>

										<div id="collapse2'.$contador.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$contador.'">
										    <div class="panel-body">
										    <p id="id'.$contador.'"> ID Cuenta: '.$id.'</p>
											<div class="checkbox">
												<p>&nbsp;&nbsp;Seleccionar perfil
												<label>
												<input id="checkm2'.$contador.'" name="check"  type="checkbox"/><i class="fa fa-square-o"></i>
												</label>
												</p>
											</div>
										    <input type="text" id="'.$contador.'" value="'.$id.'" style="display:none"/>
										    <input type="text" id="idcuenta'.$contador.'" value="'.$account->id.'" style="display:none"/>
										    <h5>Grupos</h5>
										    <select id="groups2'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
											'.$grp.'						
											</select>
											<div class="checkbox">
												<p>&nbsp;&nbsp;Seleccionar todos
												<label>
												<input id="checkg2'.$contador.'" onclick="checkTodos('.$allg.','.$checkg.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
											   </label>
												</p>
											</div>
										    <h5>Páginas</h5>
										    <select id="pages2'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
											'.$pgs.'						
											</select>
											<div class="checkbox">
												<p>&nbsp;&nbsp;Seleccionar todos
												<label>
												<input id="checkp2'.$contador.'" onclick="checkTodos('.$allp.','.$checkp.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
										     	</label>
												</p>
											</div>
										    <h5>Eventos</h5>
										    <select id="events2'.$contador.'" name="modal_menu" multiple="multiple" class="populate placeholder" >
											'.$evts.'						
											</select>
											<div class="checkbox">
												<p>&nbsp;&nbsp;Seleccionar todos
												<label>
												<input id="checke2'.$contador.'" onclick="checkTodos('.$alle.','.$checke.')" name="checkAll" type="checkbox" /><i class="fa fa-square-o"></i>
												</label>
												</p>
											</div>
											<br><br>
											 <button onclick="Share2('.$contador.')" type="button" class="btn btn-default" aria-label="Left Align">
				               				 <span class="fa fa-share-square " aria-hidden="true">Publicar</span>
										</div>
										<div id="resultshare2'.$contador.'"></div>
										</div>
										</div>';
						}
				}			
			}	
		}		
		return Response::json(array(
			'success' => true,
			'list' => $encontrados
            )); 
	}

//-----------------------fin---------------------------------
	//cargar cuentas facebook
	public function AdmFacebook(){

		return View::make('pages.admfacebook');
	}


//listar cuentas para la administración
	public function ListAccount(){
		
		$Accounts = Account::all();

		$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Id</th><th>Id Facebook</th><th>Nombre</th><th>Actualización</th><th>Actualizar</th><th>Eliminar</th></tr></thead><tbody>';
				foreach ($Accounts as $account) 
				{
					//$DataUser = User::join('fbaccounts','fbaccounts.usuario_id','=','user.id')->where('user.id','=',  Auth::user()->get()->id) ->get(['user.RolId']);
					////verificar si el usuario autenticado es administrador. 
					if( Auth::user()->get()->RolId != 1 )
					{
						//si no lo es presentar solamente sus cuantas. 
						if($account->usuario_id == Auth::user()->get()->id)
						{

							$token = "'".$account->access_token_fb."'";
							$name = "'".$account->name."'";
							$create = "'".$account->created_at."'";
							$update = "'".$account->updated_at."'";
							$encontrados=$encontrados.'<tr><td id="id">'.$account->id.'</td><td id="id_account">'.$account->id_account.'</td><td id="id_name">'.$account->name.'</td><td id="id_fecha">'.$account->updated_at.'</td>
							<td>
							<button id="'.$account->id.'" onclick="Actualizar('.$account->id.','.$token.')" type="button" class="btn btn-default" aria-label="Left Align">
			                <span class="fa  fa-download " aria-hidden="true">Obtener</span>
			                </td>
							<td>
							<span onclick="ShowDelet('.$account->id.','.$account->id_account.','.$name.','.$token.','.$update.','.$create.')" class="dtr-data"><a id="callmodaldel" data-toggle="modal" href="#modaldatadel" class="btn btn-danger btn-large">
							<span class="fa fa-trash-o" aria-hidden="true"></span> Eliminar</a></span>
							</td>
			                </tr>';
						}
					}
					else
						{

							$token = "'".$account->access_token_fb."'";
							$name = "'".$account->name."'";
							$create = "'".$account->created_at."'";
							$update = "'".$account->updated_at."'";
							$encontrados=$encontrados.'<tr><td id="id">'.$account->id.'</td><td id="id_account">'.$account->id_account.'</td><td id="id_name">'.$account->name.'</td><td id="id_fecha">'.$account->updated_at.'</td>
							<td>
							<button id="'.$account->id.'" onclick="Actualizar('.$account->id.','.$token.')" type="button" class="btn btn-default" aria-label="Left Align">
			                <span class="fa  fa-download " aria-hidden="true">Obtener</span>
			                </td>
							<td>
							<span onclick="ShowDelet('.$account->id.','.$account->id_account.','.$name.','.$token.','.$update.','.$create.')" class="dtr-data"><a id="callmodaldel" data-toggle="modal" href="#modaldatadel" class="btn btn-danger btn-large">
							<span class="fa fa-trash-o" aria-hidden="true"></span> Eliminar</a></span>
							</td>
			                </tr>';	
						}
				}
				$encontrados=$encontrados.'</tbody><tfoot><tr><th>Id</th><th>Id Facebook</th><th>Nombre</th><th>Actualización</th><th>Actualizar</th><th>Eliminar</th></tr></tfoot></table>
											<br>
										   	<fieldset>
										   	<h4 id="result" class="col-xs-12"></h4>
											</fieldset>
											<legend></legend>
										    <fieldset>
				                				<span onclick="NewAccount()" class="dtr-data"><a id="callmodalnew" data-toggle="modal" class="btn btn-default btn-large">
												<span class="fa fa-facebook" aria-hidden="true"></span> Nueva Cuenta</a></span>
										    </fieldset>';

			return Response::json(array(
			'success' => true,
			'list' => $encontrados	
            )); 
	}


	//Actualizar Token
	public function GetToken()
		{
			
			if (Request::ajax())
			{
					
					$id = Input::get('id');
					$token = Input::get('token');
					//-- obtener  token
					$session = $this->fb->generateSessionFromToken($token);
					$newToken = $this->fb->getTokenLong($session);
					try {
						  $AccountEdit=Account::find($id);
						  $AccountEdit->access_token_fb=$newToken;
						  $AccountEdit->save();	
						
					} catch (Exception $e) {
						return Response::json(array(
	                    'success'         =>   'false',
	                    'msg'         =>  $e
	                    ));

					}
					switch ($newToken) 
					{
						
						case '1':
						case '2':
									return Response::json(array(
				                    'success'         =>   'false_fb',
				                    'msg'         =>  'Problema del servidor, es posible el tiempo de inactividad.'
				                    ));
						break;
						case '190':
						case '102':
						case '100':
									return Response::json(array(
				                    'success'         =>   'false_fb',
				                    'msg'         =>  'Token caducado o invalido, Elimine la cuenta y vuelva a registrarla.'
				                    ));
							break;
						
						default:
									return Response::json(array(
				                   	 'success'         =>   'true',
				                    'msg'         =>  substr($newToken, 0,10).'..........'
				                    ));
							break;	
					}	
			}
		}

	public function destroy()
	{
		if (Request::ajax())
		{
			DB::beginTransaction();
			try {

				$UserDel = Account::find(Input::get('id'));
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
                    'msg'         =>     'La cuenta se ha eliminado correctamente'
                    ));
		}
	}

}
