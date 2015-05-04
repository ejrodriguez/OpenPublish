<?php
use Vinkla\Vimeo\Facades\Vimeo;
class VimeoController extends BaseController {


	/*
	|--------------------------------------------------------------------------
	| Vimeo Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	 */

    public function getCategorias() {
    		$response=Vimeo::request('/categories',array('fields' => 'name,uri' ),'GET');
    		$var = array( );
    		foreach ($response['body']['data'] as  $value) {
    			array_push($var,array('iden' => $value['uri'] , 'desc' => $value['name'] ));
    		}
            return Response::json(array(
                        'success' => 'true',
                        'list' => $var
                    ));
    }
	
    static public function GeneraTabla($datos) {
		$encontrados = '<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></thead><tbody>';
		foreach ($datos as $value) {
			$encontrados = $encontrados . '<tr><td><input class="ajoomla" type="checkbox" name="elemento1" id="' . $value['ide'] . '" value="' . $value['ide'] . '"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb"><img src="' . $value['ima'] . '" height="100" width="100"></td><td id="video_id">' . $value['ide'] . '</td><td id="video_title">' . $value['titl'] . '</td><td id="video_desc">' . $value['desc'] . '</td></tr>';
		}
		$encontrados = $encontrados . '</tbody><tfoot><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></tfoot></table>';
        return $encontrados; 
	}


    public function getVideos_Categorias() {

    		$params = array(
			'fields' => 'name,uri,description,pictures.sizes.link',
			'per_page' => Input::get('max'),
			);

    		if (!empty(Input::get('buscar'))) {
			$params['query'] = Input::get('buscar');
			}
			if (!empty(Input::get('orden'))) {
			$params['sort'] = Input::get('orden');
			}
			if (!empty(Input::get('forma'))) {
			$params['direction'] = Input::get('forma');
			}
			if (!empty(Input::get('filtro'))) {
			$params['filter'] = Input::get('filtro');
			}
			if (!empty(Input::get('vefa'))) {
			$params['filter_embeddable'] = Input::get('vefa');
			}


    		$response=Vimeo::request('/categories'.'/'.Input::get('cat').'/videos',$params,'GET');
    		 
    		$var = array( );
    		foreach ($response['body']['data'] as  $value) {
    			foreach ($value['pictures']['sizes'] as $clave => $pic) {
    				if ($clave==4) {
    					$value['uri'] = str_replace("/videos"."/", "", $value['uri']);
    					array_push($var,array('titl' => $value['name'] , 'desc' => $value['description'] , 'ima' => $pic['link'] , 'ide' => $value['uri']));	
    				}
    			}
    		}

    		$table=VimeoController::GeneraTabla($var); 
            return Response::json(array(
                        'success' => 'true',
                        'list' => $table
                    ));
    }


    public function getVideos_Tags()
    {
    	$params = array(
			'fields' => 'name,uri,description,pictures.sizes.link',
			'per_page' => Input::get('max'),
			);
    	if (!empty(Input::get('buscar'))) {
		$params['query'] = Input::get('buscar');
		}
		if (!empty(Input::get('orden'))) {
		$params['sort'] = Input::get('orden');
		}
		if (!empty(Input::get('forma'))) {
		$params['direction'] = Input::get('forma');
		}

		$response=Vimeo::request('/tags'.'/'.Input::get('tag').'/videos',$params,'GET');

		$var = array( );
		foreach ($response['body']['data'] as  $value) {
			foreach ($value['pictures']['sizes'] as $clave => $pic) {
				if ($clave==4) {
					$value['uri'] = str_replace("/videos"."/", "", $value['uri']);
					array_push($var,array('titl' => $value['name'] , 'desc' => $value['description'] , 'ima' => $pic['link'] , 'ide' => $value['uri']));	
				}
			}
		}

    	$table=VimeoController::GeneraTabla($var); 
        return Response::json(array(
                    'success' => 'true',
                    'list' => $table
                ));
    }

    public function getVideos_Search()
    {
    	$params = array(
			'fields' => 'name,uri,description,pictures.sizes.link',
			'per_page' => Input::get('max'),
			);
    	if (!empty(Input::get('buscar'))) {
		$params['query'] = Input::get('buscar');
		}
		if (!empty(Input::get('orden'))) {
		$params['sort'] = Input::get('orden');
		}
		if (!empty(Input::get('forma'))) {
		$params['direction'] = Input::get('forma');
		}
		if (!empty(Input::get('filtro'))) {
		$params['filter'] = Input::get('filtro');
		}

		$response=Vimeo::request('/videos',$params,'GET');

		$var = array( );
		foreach ($response['body']['data'] as  $value) {
			foreach ($value['pictures']['sizes'] as $clave => $pic) {
				if ($clave==4) {
					$value['uri'] = str_replace("/videos"."/", "", $value['uri']);
					array_push($var,array('titl' => $value['name'] , 'desc' => $value['description'] , 'ima' => $pic['link'] , 'ide' => $value['uri']));	
				}
			}
		}

    	$table=VimeoController::GeneraTabla($var); 
        return Response::json(array(
                    'success' => 'true',
                    'list' => $table
                ));
    }

    public function SaveAlavista()
    {
    	DB::beginTransaction();
        $mes = 0;
        $res = '';
        try {
            foreach (Input::get('videos') as $datos) {
                foreach ($datos as $value) {
                    if ($value['sel'] == 'true') {
                        $count = Video::where('videourl', '=', 'https://vimeo.com/' . $value['ide'])->count();
                        $counta = VideoOpenpub::where('VideoId', '=', $value['ide'])->count();
                        if ($count == 0 && $counta == 0) {
                            if (strlen($value['titulo']) > 1 || strlen($value['titulo']) < 255) {
                                $titlemarket=preg_replace('([^A-Za-zÁÉÍÓÚÑáéíóúñ0-9\s])','', $value['titulo']);
                                $market = array('VideoId' => $value['ide'], 'UserId' => Auth::user()->get()->id, 'VideoTitle' => $titlemarket, 'VideoUrl' => 'https://vimeo.com/' . $value['ide'], 'VideoImage' => $value['emb'], 'VideoDate' => date("Y-m-d H:i:s"));
                                VideoOpenpub::create($market);

                                $thum = $value['emb'];
                                $thumh = $value['emb'];
                                date_default_timezone_set('America/Guayaquil');

                                //eliminar car. especiales
                                $seo = $value['titulo'];
                                $seo = trim($seo);

                                $seo = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $seo);
                                $seo = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $seo);
                                $seo = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $seo);
                                $seo = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $seo);
                                $seo = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $seo);
                                $seo = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C'), $seo);
                                $seo = preg_replace('([^A-Za-z0-9[:space:]])','', $seo);
                                
                                $seo = str_replace(" ", "-", $seo);
                                $seo = strtolower($seo);

                                $titu = $titlemarket;
                                $titu = str_replace(array('“', '”', '"', '\''), '' , $titu);
                                // 42
                                $DataVideo = array('memberid' => 539, 'published' => 1, 'title' => $titu, 'seotitle' => $seo, 'featured' => 1,'type' => 0, 'rate' => 2, 'rateduser' => '', 'ratecount' => 0, 'times_viewed' => 1, 'videos' => '', 'filepath' => 'Youtube', 'videourl' => 'https://vimeo.com/'.$value['ide'], 'thumburl' => $thum, 'previewurl' => $thumh, 'hdurl' => '', 'home' => 0, 'playlistid' => $value['cat'], 'duration' => '', 'ordering' => 0, 'streamerpath' => '', 'streameroption' => '', 'postrollads' => 0, 'prerollads' => 0, 'midrollads' => 0, 'description' => $value['descr'], 'targeturl' => $value['turl'], 'download' => 0, 'prerollid' => 0, 'postrollid' => 0, 'created_date' => date("Y-m-d H:i:s"), 'addedon' => date("Y-m-d H:i:s"), 'usergroupid' => '8', 'tags' => $value['tag'], 'useraccess' => 0, 'islive' => 0, 'imaads' => 0, 'embedcode' => '', 'subtitle1' => '', 'subtitle2' => '', 'subtile_lang2' => '', 'subtile_lang1' => '', 'amazons3' => 0 );
                                $newVideo = Video::create($DataVideo);
                                $VidCat = array('vid' => $newVideo->id, 'catid' => $value['cat']);
                                VideoCategory::create($VidCat);

                                

                                DB::commit();
                                $res = 'Se inserto Correctamente';

                                
                            }

                        }
                        else{
                            $mes = 1;
                        }
                    }
                }
            }
            if ($mes == 1) {
                $res = 'Se inserto Correctamente, ignorando los videos que ya se encuentran en AlavistaTV';
            }
            if ($mes == 2) {
                $res = 'Seleccione al menos un video';
            }

            return Response::json(array(
            'success' => 'true',
            'list'    => $res
            ));
            
        } catch (ValidationException $e) {
            DB::rollback();
            return Response::json(array(
            'success' => 'false',
            'list' => $e->getErrors()
            ));
        }
    }

}