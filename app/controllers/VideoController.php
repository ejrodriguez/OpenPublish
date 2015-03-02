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
							$titulo = $video->{'snippet'}->{'localized'}->{'title'};
							 $emb1 = $video->{'player'}->{'embedHtml'};

							 $emb2 = str_replace(640, 213, $emb1);

							 $emb = str_replace(360, 120, $emb2);
	                       // );

			return Response::json(array(
										'success' => 'true',
										'resultobt' => '<div class="col-xs-12 col-sm-3"><div class="box box-pricing"><div class="box-header"><div class="box-name"><span>'.$channel.'<br/></span></div><div class="no-move"></div></div><div class="box-content no-padding"><div class="row-fluid centered"><div class="col-sm-12">'.$emb.'</div><div class="col-sm-12"></div><div class="col-sm-12"></div><div class="col-sm-12">'.$titulo.'</div><div class="clearfix"></div></div><div class="row-fluid bg-default"><div class="col-sm-6"><b>'.$id.'</b><br/></div><div class="col-sm-6"><input type="checkbox" class="ajoomla"> OK</input></div><div class="clearfix"></div></div></div></div></div>'

					                    ));

			
		}
	}


	public function getPopularVideos() {
		if(Request::ajax())
		{
			try {
				
				$videoList = Youtube::getPopularVideos(Input::get('cod'), Input::get('categ'), Input::get('max'));

				$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th><th>Seleccionar</th></tr></thead><tbody>';
				foreach ($videoList as $video) {
					$emb1 = $video->{'player'}->{'embedHtml'};
					$emb2 = str_replace(640, 160, $emb1);
					$emb = str_replace(360, 100, $emb2);
					// $encontrados=$encontrados.'<div class="col-sm-6 col-md-3"><div class="thumbnail">'.$video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'}.'<div class="caption"><h3>'.$video->{'snippet'}->{'channelTitle'}.'</h3><p>'.$video->{'snippet'}->{'localized'}->{'title'}.'</p><p>Video ID: '.$video->{'id'}.'</p><input type="checkbox" class="ajoomla"> OK</input></p></div></div></div></div>';
					// $encontrados=$encontrados.'<div style="with=20%" ><a href="#" class="thumbnail"><p class="small">'.$video->{'snippet'}->{'localized'}->{'title'}.'</p>'.$emb.'</a></div>';
					$encontrados=$encontrados.'<tr><td id="video_emb">'.$emb.'</td><td id="video_id">'.$video->{'id'}.'</td><td id="video_title"><input type="text" value="'.$video->{'snippet'}->{'title'}.'" /> </td><td id="video_desc"><input type="text" value="'.$video->{'snippet'}->{'description'}.'" /></td><td><input type="checkbox" class="ajoomla"> OK</input></td></tr>'; 

				}

				$encontrados=$encontrados.'</tbody><tfoot><tr><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th><th>Seleccionar</th></tr></tfoot></table>';
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

		$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th><th>Seleccionar</th></tr></thead><tbody>';
				foreach ($videoList as $video) {
					$emb = "<iframe type='text/html' src='http://www.youtube.com/embed/".$video->{'id'}->{'videoId'}."' width='160' height='100' frameborder='0' allowfullscreen='true' />";
					// $encontrados=$encontrados.'<div class="col-sm-6 col-md-3"><div class="thumbnail">'.$video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'}.'<div class="caption"><h3>'.$video->{'snippet'}->{'channelTitle'}.'</h3><p>'.$video->{'snippet'}->{'localized'}->{'title'}.'</p><p>Video ID: '.$video->{'id'}.'</p><input type="checkbox" class="ajoomla"> OK</input></p></div></div></div></div>';
					// $encontrados=$encontrados.'<div style="with=20%" ><a href="#" class="thumbnail"><p class="small">'.$video->{'snippet'}->{'localized'}->{'title'}.'</p>'.$emb.'</a></div>';
					$encontrados=$encontrados.'<tr><td id="video_emb">'.$emb.'</td><td id="video_id">'.$video->{'id'}->{'videoId'}.'</td><td id="video_title"><input type="text" value="'.$video->{'snippet'}->{'title'}.'" /> </td><td id="video_desc"><input type="text" value="'.$video->{'snippet'}->{'description'}.'" /></td><td><input type="checkbox" class="ajoomla"> OK</input></td></tr>'; 
				}

			$encontrados=$encontrados.'</tbody><tfoot><tr><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th><th>Seleccionar</th></tr></tfoot></table>';


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

		$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th><th>Seleccionar</th></tr></thead><tbody>';
				foreach ($videoList as $video) {
					$emb = "<iframe type='text/html' src='http://www.youtube.com/embed/".$video->{'id'}->{'videoId'}."' width='160' height='100' frameborder='0' allowfullscreen='true' />";
					// $encontrados=$encontrados.'<div class="col-sm-6 col-md-3"><div class="thumbnail">'.$video->{'snippet'}->{'thumbnails'}->{'default'}->{'url'}.'<div class="caption"><h3>'.$video->{'snippet'}->{'channelTitle'}.'</h3><p>'.$video->{'snippet'}->{'localized'}->{'title'}.'</p><p>Video ID: '.$video->{'id'}.'</p><input type="checkbox" class="ajoomla"> OK</input></p></div></div></div></div>';
					// $encontrados=$encontrados.'<div style="with=20%" ><a href="#" class="thumbnail"><p class="small">'.$video->{'snippet'}->{'localized'}->{'title'}.'</p>'.$emb.'</a></div>';
					$encontrados=$encontrados.'<tr><td id="video_emb">'.$emb.'</td><td id="video_id">'.$video->{'id'}->{'videoId'}.'</td><td id="video_title"><input type="text" value="'.$video->{'snippet'}->{'title'}.'" /> </td><td id="video_desc"><input type="text" value="'.$video->{'snippet'}->{'description'}.'" /></td><td><input type="checkbox" class="ajoomla"> OK</input></td></tr>'; 
				}

			$encontrados=$encontrados.'</tbody><tfoot><tr><th>Video</th><th>Id</th><th>Titulo</th><th>Descripcion</th><th>Seleccionar</th></tr></tfoot></table>';






		return Response::json(array(
										'success' => true,
										'list' => $encontrados

										
					                    ));
	}


	

}

