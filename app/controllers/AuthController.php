<?php

class AuthController extends BaseController {


	public function makeLogin()
	{
		if(Request::ajax())
		{
			$rules = array(
				            'email'         => 'required|email|between:10,30',
				            'clave'         => 'required|between:6,30',
        				  );
			$infomesaje=array(



			                'email.required' => 'El campo Email es requerido',
			                'email.email' => 'El formato de Email es incorrecto',
			                'email.between' => 'Debe contener entre 10 y 30 caracteres',


			                'clave.required' => 'El campo Clave es requerido',
			                'clave.between' => 'Debe contener entre 6 y 30 caracteres',
							);


			$validar=Validator::make(Input::All(),$rules,$infomesaje);

			if($validar->passes())
			{

				$user=array(
					        'email'=>Input::get('email'),
					        'password'=>(Input::get('clave')),
					        'StatusId' => 1
							);
				$remember=Input::get('remenber');

				if( Auth::user()->attempt($user,$remember ))
			    {
			        return Response::json(array(
                    'success'         =>     true,
                    'message'         =>     "welcome",
                    ));
                    
			    }
			    else
			    {
			    	return Response::json(array(
                    'success'         =>     "falselog",
                    'message'         =>     "<div class='has-error has-feedback'><center><label class='control-label'><center>Las credenciales son Incorrectas</center></label></center></div>",
                    'errors'         =>     array('email' => '' , 'clave' => '')
                    ));
			    }

				
			}
			else
			{
				return Response::json(array(
	                    'success'         =>     false,
	                    'message'         =>     "no log ",
	                    'errors'         =>     $validar->getMessageBag()->toArray()
	                    ));
			}

	

		}

		
	}

	public function makeLogout()
	{
		 Auth::user()->logout();
		 return Redirect::route("index");
	}

	public function showWelcome()
	{
		return View::make('pages.welcome');
	}

}