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
                        'resultobt' => '<div class="col-xs-12 col-sm-3"><div class="box box-pricing"><div class="box-header"><div class="box-name"><span>' . $channel . '<br/></span></div><div class="no-move"></div></div><div class="box-content no-padding"><div class="row-fluid centered"><div class="col-sm-12">' . $emb . '</div><div class="col-sm-12"></div><div class="col-sm-12"></div><div class="col-sm-12">' . $titulo . '</div><div class="clearfix"></div></div><div class="row-fluid bg-default"><div class="col-sm-6"><b>' . $id . '</b><br/></div><div class="col-sm-6"><input type="checkbox" class="ajoomla"> OK</input></div><div class="clearfix"></div></div></div></div></div>'
                            // 'resultobt' => $video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'}
                    ));
        }
    }

    public function getPopularVideos() {
        if (Request::ajax()) {
            // try {

            $videoList = Youtube::getPopularVideos(Input::get('cod'), Input::get('categ'), Input::get('max'));

            $encontrados = '<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></thead><tbody>';
            foreach ($videoList as $video) {

                $img = $video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'};
                // $encontrados=$encontrados.'<div class="col-sm-6 col-md-3"><div class="thumbnail">'.$video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'}.'<div class="caption"><h3>'.$video->{'snippet'}->{'channelTitle'}.'</h3><p>'.$video->{'snippet'}->{'localized'}->{'title'}.'</p><p>Video ID: '.$video->{'id'}.'</p><input type="checkbox" class="ajoomla"> OK</input></p></div></div></div></div>';
                // $encontrados=$encontrados.'<div style="with=20%" ><a href="#" class="thumbnail"><p class="small">'.$video->{'snippet'}->{'localized'}->{'title'}.'</p>'.$emb.'</a></div>';
                $encontrados = $encontrados . '<tr><td><input class="ajoomla" type="checkbox" name="elemento1" id="' . $video->{'id'} . '" value="' . $video->{'id'} . '"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb"><img src="' . $img . '" height="100" width="100"></td><td id="video_id">' . $video->{'id'} . '</td><td id="video_title">' . $video->{'snippet'}->{'title'} . '</td><td id="video_desc">' . $video->{'snippet'}->{'description'} . '</td></tr>';
            }

            $encontrados = $encontrados . '</tbody><tfoot><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></tfoot></table>';
            return Response::json(array(
                        'success' => 'true',
                        'resultobt' => $encontrados
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
                    'success' => true,
                    'list' => $encontrados,
                    'listq' => $encontradosq
                ));
    }

    //mas vistos
    public function getMostViewed() {
        $videoList = Youtube::getMostViewed(Input::get('order'), Input::get('max'));

        $encontrados = '<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></thead><tbody>';
        foreach ($videoList as $video) {

            $img = $video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'};

            $encontrados = $encontrados . '<tr><td><input class="ajoomla" type="checkbox" name="elemento1" id="' . $video->{'id'}->{'videoId'} . '" value="' . $video->{'id'}->{'videoId'} . '"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb"><img src="' . $img . '" height="100" width="100"></td><td id="video_id">' . $video->{'id'}->{'videoId'} . '</td><td id="video_title">' . $video->{'snippet'}->{'title'} . '</td><td id="video_desc">' . $video->{'snippet'}->{'description'} . '</td></tr>';
        }

        $encontrados = $encontrados . '</tbody><tfoot><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></tfoot></table>';

        return Response::json(array(
                    'success' => true,
                    'list' => $encontrados
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

        $encontrados = '<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></thead><tbody>';
        foreach ($videoList as $video) {
            // $emb = "<iframe type='text/html' src='http://www.youtube.com/embed/".$video->{'id'}->{'videoId'}."' width='160' height='100' frameborder='0' allowfullscreen='true' />";
            $img = $video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'};
            $encontrados = $encontrados . '<tr><td><input class="ajoomla" type="checkbox" name="elemento1" id="' . $video->{'id'}->{'videoId'} . '" value="' . $video->{'id'}->{'videoId'} . '"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb"><img src="' . $img . '" height="100" width="100"></td><td id="video_id">' . $video->{'id'}->{'videoId'} . '</td><td id="video_title">' . $video->{'snippet'}->{'title'} . '</td><td id="video_desc">' . $video->{'snippet'}->{'description'} . '</td></tr>';
        }

        $encontrados = $encontrados . '</tbody><tfoot><tr><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th><th>Seleccionar</th><th>Editar</th></tr></tfoot></table>';

        return Response::json(array(
                    'success' => true,
                    'list' => $encontrados
                ));
    }

    public function SaveAlavista(){
        DB::beginTransaction();
        $mes = 0;
        $res = '';
        try {
            foreach (Input::get('videos') as $datos) {
                foreach ($datos as $value) {
                    if ($value['sel'] == 'true') {
                        $count = Video::where('videourl', '=', 'https://www.youtube.com/watch?v=' . $value['ide'])->count();
                        $counta = VideoOpenpub::where('VideoId', '=', $value['ide'])->count();
                        if ($count == 0 && $counta == 0) {
                            if (strlen($value['titulo']) > 1 || strlen($value['titulo']) < 255) {
                                $market = array('VideoId' => $value['ide'], 'UserId' => Auth::user()->get()->id, 'VideoTitle' => $value['titulo'], 'VideoUrl' => 'https://www.youtube.com/watch?v=' . $value['ide'], 'VideoImage' => 'http://img.youtube.com/vi/' . $value['ide'] . '/mqdefault.jpg', 'VideoDate' => date("Y-m-d H:i:s"));
                                VideoOpenpub::create($market);
                                $thum = 'http://img.youtube.com/vi/' . $value['ide'] . '/mqdefault.jpg';
                                $thumh = 'https://i.ytimg.com/vi/' . $value['ide'] . '/maxresdefault.jpg';
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

                                $titu = $value['titulo'];
                                $titu = str_replace(array('“', '”', '"', '\''), '' , $titu);
                            
                                $DataVideo = array('memberid' => 539, 'published' => 1, 'title' => $titu, 'seotitle' => $seo, 'featured' => 1,'type' => 0, 'rate' => 2, 'rateduser' => '', 'ratecount' => 0, 'times_viewed' => 1, 'videos' => '', 'filepath' => 'Youtube', 'videourl' => 'https://www.youtube.com/watch?v='.$value['ide'], 'thumburl' => $thum, 'previewurl' => $thumh, 'hdurl' => '', 'home' => 0, 'playlistid' => $value['cat'], 'duration' => '', 'ordering' => 0, 'streamerpath' => '', 'streameroption' => '', 'postrollads' => 0, 'prerollads' => 0, 'midrollads' => 0, 'description' => $value['descr'], 'targeturl' => $value['turl'], 'download' => 0, 'prerollid' => 0, 'postrollid' => 0, 'created_date' => date("Y-m-d H:i:s"), 'addedon' => date("Y-m-d H:i:s"), 'usergroupid' => '8', 'tags' => $value['tag'], 'useraccess' => 0, 'islive' => 0, 'imaads' => 0, 'embedcode' => '', 'subtitle1' => '', 'subtitle2' => '', 'subtile_lang2' => '', 'subtile_lang1' => '', 'amazons3' => 0 );
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
            'success' => true,
            'list'    => $res
            ));
            
        } catch (ValidationException $e) {
            DB::rollback();
            return Response::json(array(
            'success' => false,
            'list' => $e->getErrors()
            ));
        }

    }


    public function Tags() {
        $string = Input::get('cad');
        $string = trim($string);
        $string = str_replace(array("\\", "‘", "_", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "`", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ":", ".", "●", "○", "☑", "↕", "☺", "☻", "♥", "♦", "♣", "♠", "•", "◘", "○", "◙", "♂", "♀", "♪", "♫", "☼", "►", "◄", "↕", "‼", "¶", "§", "▬", "↨", "↑", "↓", "→", "←", "∟", "↔", "▲", "▼", "❤", "❥", "웃", "유", "♋", "☮", "✌", "☏", "☢", "☠", "✔", "☑", "♚", "▲", "♪", "✈", "❞", "¿", "♥", "❣", "♂", "♀", "☿", "Ⓐ", "✍", "✉", "☣", "☤", "✘", "☒", "♛", "▼", "♫", "⌘", "❝", "¡", "ღ", "ツ", "☼", "☁", "❅", "♒", "✎", "©", "®", "™", "Σ", "✪", "✯", "☭", "➳", "卐", "✞", "°", "✿", "ϟ", "☃", "☂", "✄", "¢", "€", "£", "∞", "✫", "★", "½", "☯", "✡", "☪", "ß", "Γ", "π", "Σ", "σ", "µ", "τ", "Φ", "Θ", "Ω", "δ", "∞", "φ", "ε", "∩", "≡", "±", "≥", "≤", "⌠", "⌡", "÷", "≈", "°", "∙", "·", "√", "ⁿ", "²", "■", "░", "▒", "▓", "│", "┤", "╡", "╢", "╖", "╕", "╣", "║", "╗", "╝", "╜", "╛", "┐", "└", "┴", "┬", "├", "─", "┼", "╞", "╟", "╚", "╔", "╩", "╦", "╠", "═", "╬", "╧", "╨", "╤", "╥", "╙", "╘", "╒", "╓", "╫", "╪", "┘", "┌", "█", "▄", "▌", "▐", "▀", "α"), ',', $string);
        return Response::json(array(
                    'success' => true,
                    'list' => $string
                ));
    }

}

