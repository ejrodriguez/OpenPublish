<?php

class VideoController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Video Controller
	|--------------------------------------------------------------------------
	|
	| Youtube
	|
	*/

	public function showVideoAdmin() {
		return View::make('pages.video.viewadmin');
	}

	public function getVideoById() {
		if(Request::ajax())
		{
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
										'resultobt' => '<div class="col-xs-12 col-sm-3"><div class="box box-pricing"><div class="box-header"><div class="box-name"><span>'.$channel.'<br/></span></div><div class="no-move"></div></div><div class="box-content no-padding"><div class="row-fluid centered"><div class="col-sm-12">'.$emb.'</div><div class="col-sm-12"></div><div class="col-sm-12"></div><div class="col-sm-12">'.$titulo.'</div><div class="clearfix"></div></div><div class="row-fluid bg-default"><div class="col-sm-6"><b>'.$id.'</b><br/></div><div class="col-sm-6"><input type="checkbox" class="ajoomla"> OK</input></div><div class="clearfix"></div></div></div></div></div>'
										// 'resultobt' => $video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'}

					                    ));

			
		}
	}


	public function getPopularVideos() {
		if(Request::ajax())
		{
			try {
				
				$videoList = Youtube::getPopularVideos(Input::get('cod'), Input::get('categ'), Input::get('max'));

				$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></thead><tbody>';
				foreach ($videoList as $video) {
					$emb1 = $video->{'player'}->{'embedHtml'};
					$emb2 = str_replace(640, 160, $emb1);
					$emb = str_replace(360, 100, $emb2);
					// $encontrados=$encontrados.'<div class="col-sm-6 col-md-3"><div class="thumbnail">'.$video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'}.'<div class="caption"><h3>'.$video->{'snippet'}->{'channelTitle'}.'</h3><p>'.$video->{'snippet'}->{'localized'}->{'title'}.'</p><p>Video ID: '.$video->{'id'}.'</p><input type="checkbox" class="ajoomla"> OK</input></p></div></div></div></div>';
					// $encontrados=$encontrados.'<div style="with=20%" ><a href="#" class="thumbnail"><p class="small">'.$video->{'snippet'}->{'localized'}->{'title'}.'</p>'.$emb.'</a></div>';
					$encontrados=$encontrados.'<tr><td><input class="ajoomla" type="checkbox" name="elemento1" value="'.$video->{'id'}.'"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb">'.$emb.'</td><td id="video_id">'.$video->{'id'}.'</td><td id="video_title">'.$video->{'snippet'}->{'title'}.'</td><td id="video_desc">'.$video->{'snippet'}->{'description'}.'</td></tr>'; 
					

				}

				$encontrados=$encontrados.'</tbody><tfoot><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></tfoot></table>';
				return Response::json(array(
											'success' => 'true',
											'resultobt' => $encontrados
											
						                    ));
			} catch (Exception $e) {

				return Response::json(array(
											'success' => 'false',
											'resultobt' => 'La categoria no esta habilitada en el pais seleccionado'
											
						                    ));
			}
			
		}
	}

	//categorias
	public function getVideoCategories() {
		$videoList = Youtube::getVideosCategory();

		$encontrados='<select class="populate placeholder" name="rcategoria" id="rcategoria" ><option  value="">-- Seleccione una categoria --</option>';
		$encontradosq='<select class="populate placeholder" name="qcategoria" id="qcategoria" ><option  value="">-- Seleccione una categoria --</option>';
		foreach ($videoList as $categoria)
		{
			$encontrados=$encontrados.'<option  value="'.$categoria->{'id'}.'">'.$categoria->{'snippet'}->{'title'}.'</option>';
			$encontradosq=$encontradosq.'<option  value="'.$categoria->{'id'}.'">'.$categoria->{'snippet'}->{'title'}.'</option>';
		}
		$encontrados=$encontrados.'</select>';
		$encontradosq=$encontradosq.'</select>';

		return Response::json(array(
										'success' => true,
										'list' => $encontrados,
										'listq' => $encontradosq

										
					                    ));
	}

	//mas vistos
	public function getMostViewed() {
		$videoList = Youtube::getMostViewed(Input::get('order'),Input::get('max'));

		$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></thead><tbody>';
				foreach ($videoList as $video) {
					$emb = "<iframe type='text/html' src='http://www.youtube.com/embed/".$video->{'id'}->{'videoId'}."' width='160' height='100' frameborder='0' allowfullscreen='true' />";
					// $encontrados=$encontrados.'<div class="col-sm-6 col-md-3"><div class="thumbnail">'.$video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'}.'<div class="caption"><h3>'.$video->{'snippet'}->{'channelTitle'}.'</h3><p>'.$video->{'snippet'}->{'localized'}->{'title'}.'</p><p>Video ID: '.$video->{'id'}.'</p><input type="checkbox" class="ajoomla"> OK</input></p></div></div></div></div>';
					// $encontrados=$encontrados.'<div style="with=20%" ><a href="#" class="thumbnail"><p class="small">'.$video->{'snippet'}->{'localized'}->{'title'}.'</p>'.$emb.'</a></div>';
					$encontrados=$encontrados.'<tr><td><input class="ajoomla" type="checkbox" name="elemento1" value="'.$video->{'id'}->{'videoId'}.'"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb">'.$emb.'</td><td id="video_id">'.$video->{'id'}->{'videoId'}.'</td><td id="video_title">'.$video->{'snippet'}->{'title'}.'</td><td id="video_desc">'.$video->{'snippet'}->{'description'}.'</td></tr>'; 
				}




			// $encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th><th>Editar</th></tr></thead><tbody>';
			// $encontrados=$encontrados.'<tr><td><input class="ajoomla" type="checkbox" name="elemento1" value="'.'1'.'"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb">'.'$emb'.'</td><td id="video_id">'.'1'.'</td><td id="video_title">'.'todo para ti'.'</td><td id="video_desc">'.'a la mala'.'</td></tr>'; 
			// $encontrados=$encontrados.'<tr><td><input class="ajoomla" type="checkbox" name="elemento1" value="'.'2'.'"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb">'.'$emb2'.'</td><td id="video_id">'.'2'.'</td><td id="video_title">'.'siempre tu'.'</td><td id="video_desc">'.'carito flores'.'</td></tr>'; 
			// $encontrados=$encontrados.'<tr><td><input class="ajoomla" type="checkbox" name="elemento1" value="'.'3'.'"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb">'.'$emb2'.'</td><td id="video_id">'.'3'.'</td><td id="video_title">'.'sue;o de ti'.'</td><td id="video_desc">'.'coba'.'</td></tr>'; 
			$encontrados=$encontrados.'</tbody><tfoot><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></tfoot></table>';


		return Response::json(array(
										'success' => true,
										'list' => $encontrados

										
					                    ));
	}


	public function searchVideos() {
		
		if(Input::get('despues')!=null)
		{
			$despues=str_replace(" ","T",Input::get('despues'));
			$despues2=$despues.':00Z';
		}
		else
		{
			$despues2=null;
		}
		if(Input::get('antes')!=null)
		{
			$antes=str_replace(" ","T",Input::get('antes'));
			$antes2=$antes.':00Z';
		}
		else
		{
			$antes2=null;
		}
		

		$videoList = Youtube::searchVideos(Input::get('q'),Input::get('max'),Input::get('evento'),Input::get('restri'),Input::get('sub'),Input::get('cat'),Input::get('def'),Input::get('dim'),Input::get('dur'),Input::get('emb'),Input::get('lic'),Input::get('syn'),Input::get('tipo'),Input::get('order'),$despues2,$antes2);

		$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Sel</th><th>Edit</th><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th></tr></thead><tbody>';
				foreach ($videoList as $video) {
					$emb = "<iframe type='text/html' src='http://www.youtube.com/embed/".$video->{'id'}->{'videoId'}."' width='160' height='100' frameborder='0' allowfullscreen='true' />";
					// $encontrados=$encontrados.'<div class="col-sm-6 col-md-3"><div class="thumbnail">'.$video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'}.'<div class="caption"><h3>'.$video->{'snippet'}->{'channelTitle'}.'</h3><p>'.$video->{'snippet'}->{'localized'}->{'title'}.'</p><p>Video ID: '.$video->{'id'}.'</p><input type="checkbox" class="ajoomla"> OK</input></p></div></div></div></div>';
					// $encontrados=$encontrados.'<div style="with=20%" ><a href="#" class="thumbnail"><p class="small">'.$video->{'snippet'}->{'localized'}->{'title'}.'</p>'.$emb.'</a></div>';
					// $encontrados=$encontrados.'<tr><td id="video_emb">'.$emb.'</td><td id="video_id">'.$video->{'id'}->{'videoId'}.'</td><td id="video_title">'.$video->{'snippet'}->{'title'}.'</td><td id="video_desc">'.$video->{'snippet'}->{'description'}.'</td><td><input type="checkbox" class="ajoomla"> OK</input></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span> Editar</a></td></tr>'; 
					$encontrados=$encontrados.'<tr><td><input class="ajoomla" type="checkbox" name="elemento1" value="'.$video->{'id'}->{'videoId'}.'"/></td><td><a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-primary btn-large"><span class="fa fa-edit" aria-hidden="true"></span></a></td><td id="video_emb">'.$emb.'</td><td id="video_id">'.$video->{'id'}->{'videoId'}.'</td><td id="video_title">'.$video->{'snippet'}->{'title'}.'</td><td id="video_desc">'.$video->{'snippet'}->{'description'}.'</td></tr>'; 
				}

			$encontrados=$encontrados.'</tbody><tfoot><tr><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th><th>Seleccionar</th><th>Editar</th></tr></tfoot></table>';

		return Response::json(array(
										'success' => true,
										'list' => $encontrados

										
					                    ));
	}

	//listar videos de alavista
	public function LoadVideo(){

		return View::make('pages.video.listvideo');
	}

	public function ListVideo(){
		$videos = Video::all();

		$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Video</th><th>Titulo</th><th>Descripcion</th><th>Share</th></tr></thead><tbody>';
				foreach ($videos as $video) {
					$title = "'".$video->title."'";
					$imagen = "'".$video->thumburl."'";
					$encontrados=$encontrados.'<tr><td id="video_emb"><img src="'.$video->thumburl.'" width="160" height="100"/></td><td id="video_title">'.$video->title.'</td><td id="video_desc">'.$video->seotitle.'</td>
					<td>
					<button onclick="showModalProfile('.$video->rate.','.$video->id.','.$title.','.$imagen.')" type="button" class="btn btn-default" aria-label="Left Align">
	                <span class="fa fa-user txt-primary" aria-hidden="true">Perfil</span>
	                <button onclick="showModalGroup('.$video->rate.','.$video->id.','.$title.','.$imagen.')" type="button" class="btn btn-default" aria-label="Left Align">
	                <span class="fa fa-group  txt-primary" aria-hidden="true">Grupo</span>
	                <button onclick="showModalPage('.$video->rate.','.$video->id.','.$title.','.$imagen.')" type="button" class="btn btn-default" aria-label="Left Align">
	                <span class="fa fa-group  txt-primary" aria-hidden="true">Fan Page</span>
	                <button onclick="showModalEvent('.$video->rate.','.$video->id.','.$title.','.$imagen.')" type="button" class="btn btn-default" aria-label="Left Align">
	                <span class="fa fa-group  txt-primary" aria-hidden="true">Events</span>
					</td></tr>';
				}
		$encontrados=$encontrados.'</tbody><tfoot><tr><th>Video</th><th>Titulo</th><th>Descripcion</th><th>Seleccionar</th></tr></tfoot></table>';
		return Response::json(array(
			'success' => true,
			'list' => $encontrados
            )); 
	}


	public function CategoryAlavista(){
		$cats = Category::all();
		$encontrados='<select class="populate placeholder" name="categoriaalavista" id="categoriaalavista" ><option  value="">-- Seleccione una categoria --</option>';
		foreach ($cats as $categoria)
		{
			$encontrados=$encontrados.'<option  value="'.$categoria->id.'">'.$categoria->category.'</option>';
			
		}
		$encontrados=$encontrados.'</select>';
		// json_encode($cat);
		return Response::json(array(
			'success' => true,
			'list' => $encontrados
            )); 
	}


	public function SaveAlavista(){
		// $a='';
		// foreach (Input::get('videos') as  $value) {
		// 	$a=$a.$value->items[0]->titulo;
		// }
		DB::beginTransaction();
		try {
			foreach(Input::get('videos') as $datos)
		 	{
		 		// $a=$a.$datos[1]['titulo'];
		 		foreach ($datos as  $value) {
		 			# code...
		 			
		 			if ($value['sel']=='true') {
		 				# code...
		 				// $a=$a.$value['titulo'];

		 				$video = Youtube::getVideoInfo($value['ide']);
		 				
									// $id = $video->{'id'};

									$thum= $video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'};
									$thumh= $video->{'snippet'}->{'thumbnails'}->{'high'}->{'url'};
						date_default_timezone_set('America/Guayaquil');
						$seo = str_replace(" ", "-",$value['titulo']);
		 				$DataVideo = array(
					        
					        // 'id',
					        'memberid' => 42,
					        'published' => 1,
					        'title' => $value['titulo'], 
					        'seotitle' => $seo, 
					        'featured' => 1,
					        'type' => 0,
					        'rate' => 2, 
					        'rateduser' => '', 
					        'ratecount' => 0 ,
					        'times_viewed' => 1, 
					        'videos' => '' , 
					        'filepath' => 'Youtube',
					        'videourl' => 'https://www.youtube.com/watch?v='.$value['ide'], 
					        'thumburl' => $thum,
					        'previewurl' => $thumh, 
					        // 'videos' , 
					        'hdurl' => '',
					        'home' => 0,
					        'playlistid' => 8,
					        'duration' => '',
					        'ordering' => 0,
					        'streamerpath' => '',
					        'streameroption' => 'None',
					        'postrollads' => 0,
					        'prerollads' => 0,
					        'midrollads' => 0,
					        'description' => $value['descr'],
					        'targeturl' => '',
					        'download' => 0,
					        'prerollid' => 0,
					        'postrollid' => 0,
					        'created_date' => date("Y-m-d H:i:s"),
					        'addedon' => date("Y-m-d H:i:s"),
					        'usergroupid' => '8',
					        'tags' => '',
					        'useraccess' => 0,
					        'islive' => 0,
					        'imaads' => 0,
					        'embedcode' => '',
					        'subtitle1' => '',
					        'subtitle2' => '',
					        'subtile_lang2' => '',
					        'subtile_lang1' => '',
					        'amazons3' => 0,
					       );
						Video::create($DataVideo);

		 			}

		 		}
		 	}
		 	DB::commit();
		 	return Response::json(array(
			'success' => true,
			'list' => 'se inserto correctamente'
            ));
			
		} catch (ValidationException $e) {
			DB::rollback();
			return Response::json(array(
			'success' => false,
			'list' =>  $e->getErrors()
            ));
		}
		 


		

		
            
		
		
	}


	

}

