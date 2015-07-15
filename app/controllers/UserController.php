<?php

class UserController extends \BaseController {



	public function showCreate()
	{
		return View::make('pages.createuser');
	}

	public function showProfile()
	{
		return View::make('pages.profile');
	}

	public function showDataProfile()
	{
		$rol=Rol::find(Auth::user()->get()->RolId);
		$nombrerol=$rol->RolDescrip;
        return Response::json(array(
            'success' => 'true',
            'cod' =>	Auth::user()->get()->id,
            'nombre' => Auth::user()->get()->UserName,
            'email' => Auth::user()->get()->email,
            'creado' =>	Auth::user()->get()->created_at,
            'ultima' =>	Auth::user()->get()->updated_at,
            'rol'	=>	$nombrerol,
        ));

	}

	public function EditProfile()
	{
		$user=User::find(Auth::user()->get()->id);

		$user->password=Hash::make(Input::get('clave'));
		$user->save();
	     return Response::json(array(
	        'success'         =>     'true',
	        'list'         =>      'La clave ha sido actualizada'
	        ));			
	}

	public function create()
	{
		if(Request::ajax())
		{
			if (Input::get('nombre')!='' && Input::get('email')!='' && Input::get('clave')!='' && Input::get('reclave')!='' && Input::get('estado')!='' && Input::get('rol')!='' && Input::get('menu')!='') 
			{
				
				if(Input::get('clave')==Input::get('reclave'))
				{

					$Rules=array(
			                'email' => 'unique:user|required|email|min:10|max:30',
			                'clave' => 'required|min:6|max:30',
			                'reclave' => 'required|min:6|max:30|same:clave',
			                'nombre' => 'required|min:6|max:80|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',
			                'estado' => 'required',
			                'rol' => 'required',
			                'menu' => 'required',

			 				);
					$Infomesaje=array(
							'required' => 'El campo :attribute es obligatorio.',
							'unique' => 'El campo :attribute ya existe.',
							'email' => 'El campo :attribute ya no es un email.',
							'min' => 'El campo :attribute permite un :min de caracteres.',
							'max' => 'El campo :attribute  permite un :max de caracteres.',
							'same' => 'El campo :attribute no coincide.',
							'regex' => 'El campo :attribute no permite caracteres especiales',
						);

					$Validar=Validator::make(Input::All(),$Rules,$Infomesaje);

					if($Validar->passes())
					{
							$DataUser = array(
								        'StatusId' => Input::get('estado'),
								        'RolId' => Input::get('rol'),
								        'UserName' => Input::get('nombre'),
								        'email' => Input::get('email'),
								        'password' => Hash::make(Input::get('clave')),
								        // 'encrip' => Crypt::encrypt(Input::get('clave'))
								        
								       );
					
						// Start transaction!

						DB::beginTransaction();
						try {
							// Validate, then create if valid
						    $newUser = User::create($DataUser);
							
						} catch (ValidationException $e) {
							 // Rollback and send message
						    // back to form with errors
						    DB::rollback();

						     return Response::json(array(
			                    'success'         =>     'falserollb',
			                    'list'         =>      $e->getErrors()
			                    ));				
						}
						try {

							 // Validate, then create if valid
							$UserInsert=User::find($newUser->id);
							foreach (Input::get('menu') as $value) {
								
								$UserInsert->cartas()->attach($value, array('UserId' => $newUser->id, 'MenuId' => $value , 'ViewStatus' => 't'));
							}
						} catch (ValidationException $e) {

							 // Rollback and send message
						    // back to form with errors
						    DB::rollback();

						     return Response::json(array(
			                    'success'         =>     'falserollb',
			                    'list'         =>      $e->getErrors()
			                    ));	
							
						}


						// If we reach here, then
						// data is valid and working.
						// Commit the queries!
						DB::commit();
						return Response::json(array(
		                    'success'         =>     true,
		                    'list'         =>     'Insercion correcta'
		                    ));
					}

					else
					{
						return Response::json(array(
		                    'success'         =>     'falsevalidar',
		                    'erros'         =>     $Validar->getMessageBag()->toArray()
		                    ));
					}
						
				}

				else
				{
					return Response::json(array(
	                    'success'         =>     'falseclaves',
	                    'list'         =>     'Las claves no coinciden'
	                    ));
				}
				

			}
			else
			{
				return Response::json(array(
                    'success'         =>     'falseempty',
                    'list'         =>     'Existen campos vacios'
                    ));
				
			}
			
		}
		else
		{
			return Response::json(array(
                'success'         =>     'falseser',
                'msg'         =>     'Error en el servidor no se pudo guardar los datos intente nuevamente'
                ));
		}
	}

	public function listStatus()
	{
		if(Request::ajax())
		{
			if(Input::get('value'))
			{
				$ListStatus=Status::all();
				return Response::json(array(
                    'success'         =>     true,
                    'list'         =>     $ListStatus->toArray()
                    ));
			}
			else
			{
				return Response::json(array(
                    'success'         =>     false,
                    'list'         =>     'Error en el servidor no se pudo obtener la lista de estados intente nuevamente'
                    ));
			}
		}
	}

	public function listRols()
	{
		if(Request::ajax())
		{
			if(Input::get('value'))
			{
				$ListRols=Rol::all();
				return Response::json(array(
                    'success'         =>     true,
                    'list'         =>     $ListRols->toArray()
                    ));
			}
			else
			{
				return Response::json(array(
                    'success'         =>     false,
                    'list'         =>     'Error en el servidor no se pudo obtener la lista de roles intente nuevamente'
                    ));
			}
		}
	}

	public function listMenus()
	{
		if(Request::ajax())
		{
			if(Input::get('idrol')!='')
			{
				$ListMenus=Rol::find(Input::get('idrol'))->menus;
				return Response::json(array(
                    'success'         =>     true,
                    'list'         =>   $ListMenus  
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

	public function showEdit()
	{
		$DataUser = User::join('status','status.StatusId','=','user.StatusId')->join('rol','rol.RolId','=','user.RolId')->get([ 'user.id' , 'user.UserName' , 'user.email'  , 'status.StatusDescrip' , 'rol.RolDescrip' , 'user.updated_at' ]);
		
		return View::make('pages.edituser', array('usuarios' => $DataUser));
	}


	public function update()
	{
		if(Request::ajax())
		{
			if (Input::get('nombre')!='' && Input::get('email')!='' && Input::get('clave')!='' && Input::get('reclave')!='' && Input::get('estado')!='' && Input::get('rol')!='' && Input::get('menu')!='') 
			{
				if(Input::get('clave')==Input::get('reclave'))
				{
					$Rules=array(
			                'email' => 'required|email|min:10|max:30',
			                'clave' => 'required|min:6|max:30',
			                'reclave' => 'required|min:6|max:30|same:clave',
			                'nombre' => 'required|min:6|max:80|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',
			                'estado' => 'required',
			                'rol' => 'required',
			                'menu' => 'required',

			 				);
					$Infomesaje=array(
							'required' => 'El campo :attribute es obligatorio.',
							'unique' => 'El campo :attribute ya existe.',
							'email' => 'El campo :attribute ya no es un email.',
							'min' => 'El campo :attribute permite un :min de caracteres.',
							'max' => 'El campo :attribute  permite un :max de caracteres.',
							'same' => 'El campo :attribute no coincide.',
							'regex' => 'El campo :attribute no permite caracteres especiales',
						);
					$Validar=Validator::make(Input::All(),$Rules,$Infomesaje);

					if($Validar->passes())
					{
						DB::beginTransaction();
						try {
							//eliminar datos de tabla pivot
							User::find(Input::get('id'))->cartas()->detach();
							
						} catch (Exception $e) {

							 DB::rollback();

						     return Response::json(array(
			                    'success'         =>     'falserollb',
			                    'list'         =>      $e->getErrors()
			                    ));	
							
						}
						try {
							//editar datos
							  $UserEdit=User::find(Input::get('id'));
							  $UserEdit->UserName=Input::get('nombre');
							  $UserEdit->StatusId=Input::get('estado');
							  $UserEdit->RolId=Input::get('rol');
							  $UserEdit->password=Hash::make(Input::get('clave'));
							  $UserEdit->save();
							
						} catch (Exception $e) {
							DB::rollback();
							return Response::json(array(
			                    'success'         =>     'falserollb',
			                    'list'         =>      $e->getErrors()
			                    ));	
						}

						try {

							//insertar datos nuevos en tabla pivot
							$UserInsert=User::find(Input::get('id'));
							foreach (Input::get('menu') as $value) {
								
								$UserInsert->cartas()->attach($value, array('UserId' => Input::get('id'), 'MenuId' => $value , 'ViewStatus' => 't'));
							}
							
						} catch (Exception $e) {
							DB::rollback();
							return Response::json(array(
			                    'success'         =>     'falserollb',
			                    'list'         =>      $e->getErrors()
			                    ));	
							
						}
						

						DB::commit();

						return Response::json(array(
			                    'success'         =>     'true',
			                    'msg'         =>     'Los datos se actualizaron correctamente'
			                    ));
						//$UserEdit->email=Input::get('rol');
					}
					else
					{
						return Response::json(array(
		                    'success'         =>     'falsevalidar',
		                    'erros'         =>     $Validar->getMessageBag()->toArray()
		                    ));
					}

					
				}
				else
				{
					return Response::json(array(
			                    'success'         =>     'falsecla',
			                    'msg'         =>     'Las claves no coinciden'
			                    ));
				}
				
			}
			else
			{
				return Response::json(array(
			                    'success'         =>     'falseval',
			                    'msg'         =>     'Llene todos los campos'
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
				//eliminar datos de tabla pivot
				User::find(Input::get('id'))->cartas()->detach();
				
			} catch (Exception $e) {
				DB::rollback();
				return Response::json(array(
			                    'success'         =>     'falserollb',
			                    'list'         =>      $e->getErrors()
			                    ));	
			}

			try {
				$UserDel = User::find(Input::get('id'));
				$UserDel->delete();
				
			} catch (Exception $e) {
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