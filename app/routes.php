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

Route::get('/profile',array('as' => 'showprofile', 'uses' => 'UserController@showProfile'))->before("auth_user");

Route::post('/profile/data',array('as' => 'dataprofile', 'uses' => 'UserController@showDataProfile'))->before("auth_user");

Route::post('/profile/edit',array('as' => 'editprofile', 'uses' => 'UserController@EditProfile'))->before("auth_user");

//rutear a administracion

Route::get('/user/create',array('as' => 'createuser', 'uses' => 'UserController@showCreate'))->before("auth_user");

Route::post('/user/status',array('as' => 'liststatus', 'uses' => 'UserController@listStatus'))->before("auth_user");

Route::post('/user/rols',array('as' => 'listrols', 'uses' => 'UserController@listRols'))->before("auth_user");

Route::post('/rol/menus',array('as' => 'listmenus', 'uses' => 'UserController@listMenus'))->before("auth_user");

Route::post('/user/create',array('as' => 'usercreate', 'uses' => 'UserController@create'))->before("auth_user");

Route::get('/user/edit',array('as' => 'edituser', 'uses' => 'UserController@showEdit'))->before("auth_user");

Route::post('/user/edit',array('as' => 'useredit', 'uses' => 'UserController@update'))->before("auth_user");

Route::post('/user/delete',array('as' => 'userdel', 'uses' => 'UserController@destroy'))->before("auth_user");

Route::get('/admin/config',array('as' => 'config', 'uses' => 'ConfigController@ViewConfig'))->before("auth_user");

Route::post('/admin/save/youtube',array('as' => 'saveyoutube', 'uses' => 'ConfigController@SaveYoutube'))->before("auth_user");

Route::post('/admin/save/vimeo',array('as' => 'savevimeo', 'uses' => 'ConfigController@SaveVimeo'))->before("auth_user");

Route::post('/admin/save/facebook',array('as' => 'savefacebook', 'uses' => 'ConfigController@SaveFacebook'))->before("auth_user");

Route::post('/admin/save/twitter',array('as' => 'savetwitter', 'uses' => 'ConfigController@SaveTwitter'))->before("auth_user");

Route::post('/admin/save/joomlauser',array('as' => 'saveuserjoomla', 'uses' => 'ConfigController@SaveUserJoomla'))->before("auth_user");

Route::post('/admin/save/idsave',array('as' => 'idsave', 'uses' => 'ConfigController@IdSaveOP'))->before("auth_user");

//rutear a administracionvideos

Route::get('/video',array('as' => 'downloadxml', 'uses' => 'VideoController@showVideoAdmin'))->before("auth_user");

//rutear a administracion en youtube

Route::post('/video/youtube/videoid',array('as' => 'getvideoid', 'uses' => 'YouTubeController@getVideoById'))->before("auth_user");

Route::post('/video/youtube/popularvideos',array('as' => 'getpopularvideos', 'uses' => 'YouTubeController@getPopularVideos'))->before("auth_user");

Route::post('/video/youtube/videocategorias',array('as' => 'categoriesvideos', 'uses' => 'YouTubeController@getVideoCategories'))->before("auth_user");

Route::post('/video/youtube/masvistos',array('as' => 'videosmasvistos', 'uses' => 'YouTubeController@getMostViewed'))->before("auth_user");

Route::post('/video/youtube/busqueda',array('as' => 'busquedaavanzada', 'uses' => 'YouTubeController@searchVideos'))->before("auth_user");


Route::post('/categorias/alavista',array('as' => 'categoryalavista', 'uses' => 'VideoController@CategoryAlavista'))->before("auth_user");

Route::post('/categorias/alavista/guardar',array('as' => 'savealavista', 'uses' => 'YouTubeController@SaveAlavista'))->before("auth_user");

Route::post('/video/tags/seo',array('as' => 'tagsalavista', 'uses' => 'YouTubeController@Tags'))->before("auth_user");

Route::post('/video/tags/vererror',array('as' => 'vererror', 'uses' => 'YouTubeController@Probar'))->before("auth_user");



// Vimeo Videos

Route::post('/video/vimeo/categoriasv',array('as' => 'categoriasvimeo', 'uses' => 'VimeoController@getCategorias'))->before("auth_user");

Route::post('/video/vimeo/videos_categoria',array('as' => 'categoria_videos', 'uses' => 'VimeoController@getVideos_Categorias'))->before("auth_user");

Route::post('/video/vimeo/videos_tag',array('as' => 'tag_videos', 'uses' => 'VimeoController@getVideos_Tags'))->before("auth_user");

Route::post('/video/vimeo/videos_search',array('as' => 'search_videos', 'uses' => 'VimeoController@getVideos_Search'))->before("auth_user");

Route::post('/video/vimeo/videossave',array('as' => 'savevimeo_videos', 'uses' => 'VimeoController@SaveAlavista'))->before("auth_user");
//ejemplo con base joomla
//Route::get('/video/alavista',array('as' => 'alavista', 'uses' => 'AlavistaController@ListCategory'))->before("auth_user");


//---- FACEBOOK--------------
Route::get('/login/fb',array('as' => 'loginfb', 'uses' => 'FacebookController@login'))->before("auth_user");
//redireccion luego de obtener sesion en facebook
Route::get('/facebook/callback',array('as' => 'callback', 'uses' => 'FacebookController@callback'))->before("auth_user");
//listr videos
Route::post('/redsocial/alavista/list',array('as' => 'listvideos', 'uses' => 'VideoController@ListVideo'))->before("auth_user");
//listar ventana para presentar los videos
Route::get('/redsocial',array('as' => 'sharefb', 'uses' => 'VideoController@LoadVideo'))->before("auth_user");
//cargar cuentas
Route::get('/facebook/account',array('as' => 'accounts', 'uses' => 'FacebookController@Listaccounts'))->before("auth_user");
Route::get('/facebook/account2',array('as' => 'accounts2', 'uses' => 'FacebookController@Listaccounts2'))->before("auth_user");
//Route::post('/redsocial/alavista/list',array('as' => 'listvideos', 'uses' => 'VideoController@ListVideo'))->before("auth_user");
Route::post('/facebook/share',array('as' => 'share', 'uses' => 'FacebookController@share'))->before("auth_user");
//listar cuentas de facebok,crear vista
Route::get('/facebook/administrar',array('as' => 'AdmFb', 'uses' => 'FacebookController@AdmFacebook'))->before("auth_user");
//listar cuentas para administrar
Route::post('/facebook/accounts',array('as' => 'listaccount', 'uses' => 'FacebookController@ListAccount'))->before("auth_user");
//actualizar token
Route::post('/facebook/gettoken',array('as' => 'gettoken', 'uses' => 'FacebookController@GetToken'))->before("auth_user");
//eliminar cuenta
Route::post('/facebook/account/delete',array('as' => 'accountdel', 'uses' => 'FacebookController@destroy'))->before("auth_user");

// ---- Twitter ----------
//listar cuentas de facebok,crear vista
Route::get('/twitter/administrar',array('as' => 'AdmTw', 'uses' => 'TwitterController@AdmTwitter'))->before("auth_user");
//listar cuentas para administrar
Route::post('/twitter/accounts',array('as' => 'listaccounttw', 'uses' => 'TwitterController@ListAccount'))->before("auth_user");
//login twitter
Route::get('/login/tw',array('as' => 'logintw', 'uses' => 'TwitterController@login'))->before("auth_user");
//redireccion luego de obtener sesion en facebook
Route::get('/twitter/callback',array('as' => 'callbacktw', 'uses' => 'TwitterController@callback'))->before("auth_user");
//eliminar cuenta
Route::post('/twitter/account/delete',array('as' => 'accountdeltw', 'uses' => 'TwitterController@destroy'))->before("auth_user");
//listar videos
//Route::post('/twitter/alavista/list',array('as' => 'listvideostw', 'uses' => 'VideoController@ListVideoTw'))->before("auth_user");
//listar ventana para presentar los videos
Route::get('/twitter',array('as' => 'sharetw', 'uses' => 'VideoController@LoadVideoTw'))->before("auth_user");
// listar cuentas twiiter
Route::get('/twitter/account',array('as' => 'accountstw', 'uses' => 'TwitterController@ListAccounttw'))->before("auth_user");
Route::get('/twitter/account2',array('as' => 'accountstw2', 'uses' => 'TwitterController@ListAccounttw2'))->before("auth_user");
// twittear 
Route::post('/twitter/twittear',array('as' => 'twittear', 'uses' => 'TwitterController@Twittear'))->before("auth_user");
//listar videos
//Route::get('datatables', array('as'=>'datatables', 'uses'=>'VideoController@Datatable'))->before("auth_user");
//listar ventana para presentar los videos
Route::get('/twitter',array('as' => 'sharetw', 'uses' => 'VideoController@LoadVideoTw'))->before("auth_user");
// listar cuentas twiiter
Route::get('/twitter/account',array('as' => 'accountstw', 'uses' => 'TwitterController@ListAccounttw'))->before("auth_user");
// twittear 
Route::post('/twitter/twittear',array('as' => 'twittear', 'uses' => 'TwitterController@Twittear'))->before("auth_user");
//listar videos
Route::get('datatables', array('as'=>'datatables', 'uses'=>'VideoController@Datatable'))->before("auth_user");
//listar treanding
Route::get('/twitter/trending',array('as' => 'trending', 'uses' => 'TwitterController@Trending'))->before("auth_user");
Route::get('/twitter/trending2',array('as' => 'trending2', 'uses' => 'TwitterController@Trending2'))->before("auth_user");

// Galeria

Route::get('/galery/simple',array('as' => 'viewgalery', 'uses' => 'GaleryController@showGalery'))->before("auth_user");

Route::get('/galery/items/ajax', array('as' => 'itemstype','uses' => 'GaleryController@PaginacionVideos'))->before("auth_user");

Route::get('/galery/simple',array('as' => 'viewgalery', 'uses' => 'GaleryController@showGalery'))->before("auth_user");

Route::get('/video/infor', array('as'=>'showinformacion', 'uses'=>'VideoController@ShowListaInfor'))->before("auth_user");

Route::get('/galery/items/popular', array('as' => 'itemspopulares','uses' => 'VideoController@PaginacionPopulares'))->before("auth_user");

Route::get('/video/momento', array('as'=>'showinmomento', 'uses'=>'VideoController@ShowListaMomento'))->before("auth_user");

Route::get('/galery/items/momento', array('as' => 'itemsmomento','uses' => 'VideoController@PaginacionMomento'))->before("auth_user");

// Administracion Eliminar Videos

Route::get('/video/delete',array('as' => 'delvideo', 'uses' => 'VideoController@showVideoDelete'))->before("auth_user");

Route::get('/video/delete/datatable', array('as'=>'datatabledel', 'uses'=>'VideoController@DatatableDelete'))->before("auth_user");


//rutear a errores
App::missing(function($exception)
{
	return Response::view('errors.error404',array(),404);
});

