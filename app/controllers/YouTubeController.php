<?php

class YouTubeController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Youtube Controller
      |--------------------------------------------------------------------------
      |
      |
      |
     */

    public function getVideoById() {
        if (Request::ajax()) {
            $video = Youtube::getVideoInfo(Input::get('id'));

            // $datos = array(
            $id = $video->{'id'};
            $channel = $video->{'snippet'}->{'channelTitle'};
            $descrip = $video->{'snippet'}->{'localized'}->{'description'};
            $titulo = $video->{'snippet'}->{'title'};
            $emb1 = $video->{'player'}->{'embedHtml'};

            $emb2 = str_replace(640, 213, $emb1);

            $emb = str_replace(360, 120, $emb2);
            // );

            return Response::json(array(
                        'success' => 'true',
                        'list' => '<div class="col-xs-12 col-sm-3"><div class="box box-pricing"><div class="box-header"><div class="box-name"><span>' . $channel . '<br/></span></div><div class="no-move"></div></div><div class="box-content no-padding"><div class="row-fluid centered"><div class="col-sm-12">' . $emb . '</div><div class="col-sm-12"></div><div class="col-sm-12"></div><div class="col-sm-12">' . $titulo . '</div><div class="clearfix"></div></div><div class="row-fluid bg-default"><div class="col-sm-6"><b>' . $id . '</b><br/></div><div class="col-sm-6"><input type="checkbox" class="ajoomla"> OK</input></div><div class="clearfix"></div></div></div></div></div>'
                            // 'resultobt' => $video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'}
                    ));
        }
    }

    static public function GeneraTabla($datos) {
        $encontrados = '<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></thead><tbody>';
        foreach ($datos as $value) {
            $encontrados = $encontrados . '<tr><td><input class="ajoomla" type="checkbox" name="elemento1" id="' . $value['ide'] . '" value="' . $value['ide'] . '"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb"><img src="' . $value['ima'] . '" height="100" width="100"></td><td id="video_id">' . $value['ide'] . '</td><td id="video_title">' . $value['titl'] . '</td><td id="video_desc">' . $value['desc'] . '</td></tr>';
        }
        $encontrados = $encontrados . '</tbody><tfoot><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></tfoot></table>';
        return $encontrados; 
    }

    public function getPopularVideos() {
        if (Request::ajax()) {

            $videoList = Youtube::getPopularVideos(Input::get('cod'), Input::get('categ'), Input::get('max'));

            $var = array( );
            foreach ($videoList as  $video) {
                        array_push($var,array('titl' => $video->{'snippet'}->{'title'} , 'desc' => $video->{'snippet'}->{'description'} , 'ima' => $video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'} , 'ide' => $video->{'id'}));    
            }
            $table=YouTubeController::GeneraTabla($var);

            return Response::json(array(
                        'success' => 'true',
                        'list' => $table
                    ));

        }
    }
    //categorias
    public function getVideoCategories() {
        $videoList = Youtube::getVideosCategory();

        $encontrados = '<select class="populate placeholder" name="rcategoria" id="rcategoria" ><option  value="">-- Seleccione una categoria --</option>';
        $encontradosq = '<select class="populate placeholder" name="qcategoria" id="qcategoria" ><option  value="">-- Seleccione una categoria --</option>';
        foreach ($videoList as $categoria) {
            $encontrados = $encontrados . '<option  value="' . $categoria->{'id'} . '">' . $categoria->{'snippet'}->{'title'} . '</option>';
            $encontradosq = $encontradosq . '<option  value="' . $categoria->{'id'} . '">' . $categoria->{'snippet'}->{'title'} . '</option>';
        }
        $encontrados = $encontrados . '</select>';
        $encontradosq = $encontradosq . '</select>';

        return Response::json(array(
                    'success' => 'true',
                    'list' => $encontrados,
                    'listq' => $encontradosq
                ));
    }

    //mas vistos
    public function getMostViewed() {
        $videoList = Youtube::getMostViewed(Input::get('order'), Input::get('max'));

        $var = array( );
        foreach ($videoList as  $video) {
                    array_push($var,array('titl' => $video->{'snippet'}->{'title'} , 'desc' => $video->{'snippet'}->{'description'} , 'ima' => $video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'} , 'ide' => $video->{'id'}->{'videoId'}));    
        }

        $table=YouTubeController::GeneraTabla($var);

        return Response::json(array(
                    'success' => 'true',
                    'list' => $table
                ));
    }

    public function searchVideos() {

        if (Input::get('despues') != null) {
            $despues = str_replace(" ", "T", Input::get('despues'));
            $despues2 = $despues . ':00Z';
        } else {
            $despues2 = null;
        }
        if (Input::get('antes') != null) {
            $antes = str_replace(" ", "T", Input::get('antes'));
            $antes2 = $antes . ':00Z';
        } else {
            $antes2 = null;
        }

        $videoList = Youtube::searchVideos(Input::get('q'), Input::get('max'), Input::get('evento'), Input::get('restri'), Input::get('sub'), Input::get('cat'), Input::get('def'), Input::get('dim'), Input::get('dur'), Input::get('emb'), Input::get('lic'), Input::get('syn'), Input::get('tipo'), Input::get('order'), $despues2, $antes2);

        $var = array( );
        foreach ($videoList as  $video) {
                    array_push($var,array('titl' => $video->{'snippet'}->{'title'} , 'desc' => $video->{'snippet'}->{'description'} , 'ima' => $video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'} , 'ide' => $video->{'id'}->{'videoId'}));    
        }
        
        $table=YouTubeController::GeneraTabla($var);

        return Response::json(array(
                    'success' => 'true',
                    'list' => $table
                ));
    }

    public function SaveAlavista(){

        $mensaje='';  
        $comprobar=0;
        $datosvideo=Input::get('videos');
        // $elem=count($datosvideo);
        $vacio=YouTubeController::EstaVacio($datosvideo);
        if($vacio!=0){
            foreach ($datosvideo as $key => $value) {
               $comprobar+=YouTubeController::GuardarBD($value);
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
                    $urlvi='https://www.youtube.com/watch?v=' . $id;
                    $vidav = Video::where('videourl', '=', 'https://www.youtube.com/watch?v=' . $id)->count();
                    $vidop = VideoOpenpub::where('VideoId', '=', $id)->count();
                    $config = ConfigApp::First()->get();
                    $seo=YouTubeController::SeoTitulo($titulo);
                    // echo '<br>av '.$vidav.' y op'.$vidop;
                    if ($vidav == 0 && $vidop == 0 ) {
                        // if ($vidop === 0) {
                            if (strlen($titulo) > 1 || strlen($titulo) < 255) {
                                // echo $vidav.' av y op'.$vidop;
                                
                                //Guardar en hdflv_upload
                                $thum = 'http://img.youtube.com/vi/' . $id . '/mqdefault.jpg';
                                $thumh = 'https://i.ytimg.com/vi/' . $id . '/maxresdefault.jpg';
                                $tituav = str_replace(array('“', '”', '"', '\''), '' , $titulo);

                                $DataVideo = array('memberid' => $config[0]["UserJoomla"], 'published' => 1, 'title' => $tituav, 'seotitle' => $seo, 'featured' => 1,'type' => 0, 'rate' => 2, 'rateduser' => '', 'ratecount' => 0, 'times_viewed' => 1, 'videos' => '', 'filepath' => 'Youtube', 'videourl' => $urlvi, 'thumburl' => $thum, 'previewurl' => $thumh, 'hdurl' => '', 'home' => 0, 'playlistid' => $categ, 'duration' => '', 'ordering' => 0, 'streamerpath' => '', 'streameroption' => '', 'postrollads' => 0, 'prerollads' => 0, 'midrollads' => 0, 'description' => $descrip, 'targeturl' => $urltag, 'download' => 0, 'prerollid' => 0, 'postrollid' => 0, 'created_date' => date("Y-m-d H:i:s"), 'addedon' => date("Y-m-d H:i:s"), 'usergroupid' => '8', 'tags' => $tags, 'useraccess' => 0, 'islive' => 0, 'imaads' => 0, 'embedcode' => '', 'subtitle1' => '', 'subtitle2' => '', 'subtile_lang2' => '', 'subtile_lang1' => '', 'amazons3' => 0 );

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

    public function Tags() {
        $string = Input::get('cad');
        $string = trim($string);
        $string = trim($string);
        $string = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string);
        $string = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string);
        $string = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string);
        $string = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string);
        $string = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string);
        $string = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C'), $string);
        $string = str_replace(array(',',')'), array( '',''), $string);
        $conservar = '0-9a-zA-Z[:space:]'; // juego de caracteres a conservar
        $regex = sprintf('~[^%s]++~i', $conservar); // case insensitive
        $string = preg_replace($regex, ',', $string);

        // $string = str_replace(array("\\", "‘", "_", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "`", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ":", ".", "●", "○", "☑", "↕", "☺", "☻", "♥", "♦", "♣", "♠", "•", "◘", "○", "◙", "♂", "♀", "♪", "♫", "☼", "►", "◄", "↕", "‼", "¶", "§", "▬", "↨", "↑", "↓", "→", "←", "∟", "↔", "▲", "▼", "❤", "❥", "웃", "유", "♋", "☮", "✌", "☏", "☢", "☠", "✔", "☑", "♚", "▲", "♪", "✈", "❞", "¿", "♥", "❣", "♂", "♀", "☿", "Ⓐ", "✍", "✉", "☣", "☤", "✘", "☒", "♛", "▼", "♫", "⌘", "❝", "¡", "ღ", "ツ", "☼", "☁", "❅", "♒", "✎", "©", "®", "™", "Σ", "✪", "✯", "☭", "➳", "卐", "✞", "°", "✿", "ϟ", "☃", "☂", "✄", "¢", "€", "£", "∞", "✫", "★", "½", "☯", "✡", "☪", "ß", "Γ", "π", "Σ", "σ", "µ", "τ", "Φ", "Θ", "Ω", "δ", "∞", "φ", "ε", "∩", "≡", "±", "≥", "≤", "⌠", "⌡", "÷", "≈", "°", "∙", "·", "√", "ⁿ", "²", "■", "░", "▒", "▓", "│", "┤", "╡", "╢", "╖", "╕", "╣", "║", "╗", "╝", "╜", "╛", "┐", "└", "┴", "┬", "├", "─", "┼", "╞", "╟", "╚", "╔", "╩", "╦", "╠", "═", "╬", "╧", "╨", "╤", "╥", "╙", "╘", "╒", "╓", "╫", "╪", "┘", "┌", "█", "▄", "▌", "▐", "▀", "α"), ',', $string);
        return Response::json(array(
                    'success' => 'true',
                    'list' => $string
                ));
    }

}

