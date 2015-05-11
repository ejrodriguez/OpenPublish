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
            // array_push($var,array('iden' => 'id' , 'desc' => 'unita' ));
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
             $buscar=Input::get('buscar');
             $orden=Input::get('orden');
             $forma=Input::get('forma');
             $filtro=Input::get('filtro');
             $vefa=Input::get('vefa');
            if (!empty($buscar)) {
            $params['query'] = $buscar;
            }
            if (!empty($orden)) {
            $params['sort'] = $orden;
            }
            if (!empty($forma)) {
            $params['direction'] = $forma;
            }
            if (!empty($filtro)) {
            $params['filter'] = $filtro;
            }
            if (!empty($vefa)) {
            $params['filter_embeddable'] = $vefa;
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
        $buscar=Input::get('buscar');
        $orden=Input::get('orden');
        $forma=Input::get('forma');

    	if (!empty($buscar)) {
		$params['query'] = $buscar;
		}
		if (!empty($orden)) {
		$params['sort'] = $orden;
		}
		if (!empty($forma)) {
		$params['direction'] = $forma;
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
        $buscar=Input::get('buscar');
        $orden=Input::get('orden');
        $forma=Input::get('forma');
        $filtro=Input::get('filtro');
        
    	if (!empty($buscar)) {
		$params['query'] = $buscar;
		}
		if (!empty($orden)) {
		$params['sort'] = $orden;
		}
		if (!empty($forma)) {
		$params['direction'] = $forma;
		}
		if (!empty($filtro)) {
		$params['filter'] = $filtro;
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
    	$mensaje='';  
        $comprobar=0;
        $datosvideo=Input::get('videos');
        // $elem=count($datosvideo);
        $vacio=YouTubeController::EstaVacio($datosvideo);
        if($vacio!=0){
            foreach ($datosvideo as $key => $value) {
               $comprobar+=VimeoController::GuardarBD($value);
            }
            if ($comprobar==$vacio) {
                $mensaje.='Se inserto Correctamente';
            }
            else{
                $mensaje.='Se inserto Correctamente, ignorando los videos que ya se encuentran insertados';
            }
        }
        else{
            $mensaje.='Seleccione al Menos un Video';
        }

        // echo $mensaje;
        return Response::json(array(
            'success' => 'true',
            'list' => $mensaje
        ));
    }

    static public function EstaVacio($datos){
        $cont=0;
        foreach ($datos as $key => $value) {
               if (in_array('true', $value)) {
                $cont++;
               }
        }
        return $cont;
    }

    static public function GuardarBD($datos) {
        DB::beginTransaction();
        $mess = 0;


        try {

                if (in_array('true', $datos)) {
                    // var_dump($datos);
                    $id=$datos[0];
                    $titulo=$datos[1];
                    $descrip=$datos[2];
                    $img=$datos[3];
                    $categ=$datos[4];
                    $selec=$datos[5];
                    $tags=$datos[6];
                    $urltag=$datos[7];
                    $urlvi='https://vimeo.com/' . $id;
                    $vidav = Video::where('videourl', '=', 'https://vimeo.com/' . $id)->count();
                    $vidop = VideoOpenpub::where('VideoId', '=', $id)->count();

                    $seo=VimeoController::SeoTitulo($titulo);
                    // echo '<br>av '.$vidav.' y op'.$vidop;
                    if ($vidav == 0 && $vidop == 0 ) {
                        // if ($vidop === 0) {
                            if (strlen($titulo) > 1 || strlen($titulo) < 255) {
                                // echo $vidav.' av y op'.$vidop;
                                
                                //Guardar en hdflv_upload
                                $thum = $img;
                                $thumh = $img;
                                $tituav = str_replace(array('“', '”', '"', '\''), '' , $titulo);
                                $DataVideo = array('memberid' => 539, 'published' => 1, 'title' => $tituav, 'seotitle' => $seo, 'featured' => 1,'type' => 0, 'rate' => 2, 'rateduser' => '', 'ratecount' => 0, 'times_viewed' => 1, 'videos' => '', 'filepath' => 'Youtube', 'videourl' => $urlvi, 'thumburl' => $thum, 'previewurl' => $thumh, 'hdurl' => '', 'home' => 0, 'playlistid' => $categ, 'duration' => '', 'ordering' => 0, 'streamerpath' => '', 'streameroption' => '', 'postrollads' => 0, 'prerollads' => 0, 'midrollads' => 0, 'description' => $descrip, 'targeturl' => $urltag, 'download' => 0, 'prerollid' => 0, 'postrollid' => 0, 'created_date' => date("Y-m-d H:i:s"), 'addedon' => date("Y-m-d H:i:s"), 'usergroupid' => '8', 'tags' => $tags, 'useraccess' => 0, 'islive' => 0, 'imaads' => 0, 'embedcode' => '', 'subtitle1' => '', 'subtitle2' => '', 'subtile_lang2' => '', 'subtile_lang1' => '', 'amazons3' => 0 );

                                //Guardar en VideoCategoria
                                $newVideo = Video::create($DataVideo);
                                $VidCat = array('vid' => $newVideo->id, 'catid' => $categ);
                                VideoCategory::create($VidCat);

                                //Guardar en OP
                                $market = array('VideoId' => $id, 'UserId' => Auth::user()->get()->id, 'VideoTitle' => $titulo, 'VideoUrl' => $urlvi, 'VideoImage' => $img , 'VideoDate' => date("Y-m-d H:i:s"));
                                VideoOpenpub::create($market);

                                
                                $mess=1;
                            }
                        // }

                    }
                }
            DB::commit();
        } 
        catch (Exception $e) {
            DB::rollback();
            $mess=0;
            var_dump($e);
        }
        return $mess;

    }

    static public function SeoTitulo($seo){
        $seo = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $seo);
        $seo = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $seo);
        $seo = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $seo);
        $seo = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $seo);
        $seo = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $seo);
        $seo = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C'), $seo);

        $conservar = '0-9a-zA-Z'; // juego de caracteres a conservar
        $regex = sprintf('~[^%s]++~i', $conservar); // case insensitive
        $seo = preg_replace($regex, '-', $seo);

        $seo = strtolower($seo);

        return $seo;
    }



}