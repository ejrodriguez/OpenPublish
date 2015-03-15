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

	public function listgroups()
	{ 
		if(Request::ajax())
		{
			$user_groups=$this->fb->getGraphGroups();
			$groups = $user_groups->getProperty('data');
			$groups = $groups->asArray();
			if(Input::get('share')==1)
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
                    'list'         =>     'Error en el servidor no se pudo obtener la lista de menus intente nuevamente'
                    ));
			}
		} 
	}

	public function events()
	{
		$user_events=$this->fb->getGraphEvents();
		if(!$user_events){
			return Redirect::to('/')->with('message','Objeto getGraphEvent vacio');
		}
		$events = $user_events->getProperty('data');
		$events = $events->asArray();
		return View::make('events',array('events'=>$events));
	}

	public function pages()
	{
		$user_pages=$this->fb->getGraphPages();
		if(!$user_pages){
			return Redirect::to('/')->with('message','Objeto getGraphPages vacio');
		}
		$pages = $user_pages->getProperty('data');
		$pages = $pages->asArray();
		return View::make('pages',array('pages'=>$pages));
	}
}
