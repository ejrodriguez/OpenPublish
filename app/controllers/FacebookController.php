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
		if(!($this->session)){
			return Redirect::to('/')->with('message',"Error token");
		}
		//guardar sesion de facebook iniciada. 
		Session::put('session',$this->session);
		
		//obtener la información del usuario.
		$user_fb=$this->fb->getGraph();
		if(!$user_fb){
			return Redirect::to('/')->with('message','Objeto getGraph vacio');
		}
		/*
		$user = User::whereUidFb($user_fb->getProperty('id'))->first();
		if(empty(($user)))
		{
			$user = new User;
			$user->email = $user_fb->getProperty('email');
			$user->name = $user_fb->getProperty('name');
			$user->birthday = date(strtotime($user_fb->getProperty('birthday')));
			$user->photo = 'http://graph.facebook.com/'.$user_fb->getProperty('id').'/picture?type=large';
			$user->uid_fb = $user_fb->getProperty('id');
			$user->save();
		}
		$user->access_token_fb = $this->fb->getToken();
		$user->save();
		
		Auth::login($user);  */
		//echo $user_fb->getProperty('name');
		//return Redirect::to('/#_=_');
		//return URL::to('/welcome');
		//return Redirect::back();
		return Redirect::to('welcome');
		//return View::make('pages.welcome');
	} 

	public function shareProfile()
	{
		if (Request::ajax()) {
			if (Input::get('link')!='')
			{
				$mensaje = $this->fb->postProfile(Input::get('link'),Input::get('mensaje'),Input::get('descripcion'));
					return Response::json(array(
			                    'success'         =>     'true',
			                    'msg'         =>   $mensaje
			                    ));
			}
			else
			{
				return Response::json(array(
		                    'success'         =>     'faldatos',
		                    'msg'         =>     'No se obtubo el link del video, intente nuevamente'
		                    ));
			}

		}
		
	}
	//share groups
	public function shareGroups()
		{
			$mensaje="";
			if (Request::ajax()) {
				if (Input::get('groups')!=null)
				{
					$groups = Input::get('groups');

					foreach ($groups as $group) {
						$mensaje =$mensaje.$this->fb->postGroups($group,Input::get('link'),Input::get('mensaje'),Input::get('descripcion'))."</br>";
					}				
						return Response::json(array(
				                    'success'         =>     'true',
				                    'msg'         =>   $mensaje
				                    ));
				}
				else
				{
					return Response::json(array(
			                    'success'         =>     'falseval',
			                    'msg'         =>     'Seleccione por lo menos un grupo'
			                    ));
				}

			}
			
		}

	//share pages
	public function sharePages()
		{
			$mensaje="";
			if (Request::ajax()) {
				if (Input::get('pages')!=null)
				{
					$pages = Input::get('pages');

					foreach ($pages as $page) {
						$mensaje =$mensaje.$this->fb->postPages($page,Input::get('link'),Input::get('mensaje'),Input::get('descripcion'))."</br>";
					}				
						return Response::json(array(
				                    'success'         =>     'true',
				                    'msg'         =>   $mensaje
				                    ));
				}
				else
				{
					return Response::json(array(
			                    'success'         =>     'falseval',
			                    'msg'         =>     'Seleccione por lo menos una pagina'
			                    ));
				}

			}
			
		}

//share events
	public function shareEvents()
		{
			$mensaje="";
			if (Request::ajax()) {
				if (Input::get('events')!=null)
				{
					$events = Input::get('events');

					foreach ($events as $event) {
						$mensaje =$mensaje.$this->fb->postEvents($event,Input::get('link'),Input::get('mensaje'),Input::get('descripcion'))."</br>";
					}				
						return Response::json(array(
				                    'success'         =>     'true',
				                    'msg'         =>   $mensaje
				                    ));
				}
				else
				{
					return Response::json(array(
			                    'success'         =>     'falseval',
			                    'msg'         =>     'Seleccione por lo menos un evento'
			                    ));
				}

			}
			
		}
		
	public function listgroups()
	{ 
		if(Request::ajax())
		{
			$user_groups=$this->fb->getGraphGroups();
			$groups = $user_groups->getProperty('data');
			$groups = $groups->asArray();
			if($groups)
			{
				
				return Response::json(array(
                    'success'         =>     true,
                    'list'         =>   $groups  
                    ));
			}
			else
			{
				return Response::json(array(
                    'success'         =>     false,
                    'list'         =>     'Error en el servidor no se pudo obtener la lista de grupos, intente nuevamente'
                    ));
			}
		} 
	}
//listar los paginas 
	public function listpages()
	{ 
		if(Request::ajax())
		{
			$user_pages=$this->fb->getGraphPages();
			$pages = $user_pages->getProperty('data');
			$pages = $pages->asArray();
			if($pages)
			{
				
				return Response::json(array(
                    'success'         =>     true,
                    'list'         =>   $pages  
                    ));
			}
			else
			{
				return Response::json(array(
                    'success'         =>     false,
                    'list'         =>     'Error en el servidor no se pudo obtener la lista de páginas, intente nuevamente'
                    ));
			}
		} 
	}

//listar los eventos
	public function listevents()
	{ 
		if(Request::ajax())
		{
			$user_events=$this->fb->getGraphEvents();
			$events = $user_events->getProperty('data');
			$events = $events->asArray();
			if($events)
			{
				
				return Response::json(array(
                    'success'         =>     true,
                    'list'         =>   $events  
                    ));
			}
			else
			{
				return Response::json(array(
                    'success'         =>     false,
                    'list'         =>     'Error en el servidor no se pudo obtener la lista de eventos, intente nuevamente'
                    ));
			}
		} 
	}

}
