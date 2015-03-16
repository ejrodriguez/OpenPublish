<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

//rutear a index
Route::get('/',array('as' => 'index', 'uses' => 'HomeController@showIndex'))->before("guest_user");

Route::get('/login',array('as' => 'login', 'uses' => 'HomeController@showLogin'))->before("guest_user");

Route::post('/login',array('before' => 'csrf','as' => 'makelogin', 'uses' => 'AuthController@makeLogin'));

Route::get('/logout',array( 'as' => 'makelogout', 'uses' => 'AuthController@makeLogout'));

Route::get('/welcome',array('as' => 'showwelcome', 'uses' => 'AuthController@showWelcome'))->before("auth_user");

//rutear a administracion

Route::get('/user/create',array('as' => 'createuser', 'uses' => 'UserController@showCreate'))->before("auth_user");

Route::post('/user/status',array('as' => 'liststatus', 'uses' => 'UserController@listStatus'))->before("auth_user");

Route::post('/user/rols',array('as' => 'listrols', 'uses' => 'UserController@listRols'))->before("auth_user");

Route::post('/rol/menus',array('as' => 'listmenus', 'uses' => 'UserController@listMenus'))->before("auth_user");

Route::post('/user/create',array('as' => 'usercreate', 'uses' => 'UserController@create'))->before("auth_user");

Route::get('/user/edit',array('as' => 'edituser', 'uses' => 'UserController@showEdit'))->before("auth_user");

Route::post('/user/edit',array('as' => 'useredit', 'uses' => 'UserController@update'))->before("auth_user");

Route::post('/user/delete',array('as' => 'userdel', 'uses' => 'UserController@destroy'))->before("auth_user");


//rutear a administracionvideos

Route::get('/video',array('as' => 'downloadxml', 'uses' => 'VideoController@showVideoAdmin'))->before("auth_user");

//rutear a administracion en youtube

Route::post('/video/youtube/videoid',array('as' => 'getvideoid', 'uses' => 'VideoController@getVideoById'))->before("auth_user");

Route::post('/video/youtube/popularvideos',array('as' => 'getpopularvideos', 'uses' => 'VideoController@getPopularVideos'))->before("auth_user");

Route::post('/video/youtube/videocategorias',array('as' => 'categoriesvideos', 'uses' => 'VideoController@getVideoCategories'))->before("auth_user");

Route::post('/video/youtube/masvistos',array('as' => 'videosmasvistos', 'uses' => 'VideoController@getMostViewed'))->before("auth_user");

Route::post('/video/youtube/busqueda',array('as' => 'busquedaavanzada', 'uses' => 'VideoController@searchVideos'))->before("auth_user");



//ejemplo con base joomla
//Route::get('/video/alavista',array('as' => 'alavista', 'uses' => 'AlavistaController@ListCategory'))->before("auth_user");



Route::get('/login/fb',array('as' => 'loginfb', 'uses' => 'FacebookController@login'))->before("auth_user");

Route::get('/facebook/callback',array('as' => 'callback', 'uses' => 'FacebookController@callback'))->before("auth_user");

Route::get('/redsocial',array('as' => 'sharefb', 'uses' => 'VideoController@LoadVideo'))->before("auth_user");

Route::post('/redsocial/alavista/list',array('as' => 'listvideos', 'uses' => 'VideoController@ListVideo'))->before("auth_user");

Route::post('/categorias/alavista',array('as' => 'categoryalavista', 'uses' => 'VideoController@CategoryAlavista'))->before("auth_user");

Route::post('/categorias/alavista/guardar',array('as' => 'savealavista', 'uses' => 'VideoController@SaveAlavista'))->before("auth_user");

Route::post('facebook/share/profile',array('as' => 'shareprofile', 'uses' => 'FacebookController@shareProfile'))->before("auth_user");

Route::post('/facebook/groups',array('as' => 'listgroups', 'uses' => 'FacebookController@listgroups'))->before("auth_user");

Route::post('facebook/share/groups',array('as' => 'sharegroups', 'uses' => 'FacebookController@shareGroups'))->before("auth_user");

Route::post('/facebook/pages',array('as' => 'listpages', 'uses' => 'FacebookController@listpages'))->before("auth_user");

Route::post('facebook/share/pages',array('as' => 'sharepages', 'uses' => 'FacebookController@sharePages'))->before("auth_user");

Route::post('/facebook/events',array('as' => 'listevents', 'uses' => 'FacebookController@listevents'))->before("auth_user");

Route::post('facebook/share/events',array('as' => 'shareevents', 'uses' => 'FacebookController@shareEvents'))->before("auth_user");
//rutear a errores
App::missing(function($exception)
{
	return Response::view('errors.error404',array(),404);
});

