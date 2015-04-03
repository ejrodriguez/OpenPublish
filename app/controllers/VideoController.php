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





	//listar videos de alavista
	public function LoadVideo(){

		return View::make('pages.video.listvideo');
	}

	public function ListVideo(){
		$videos = Video::all();
		$encontrados='<table  id="datatable-1" class="display responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Video</th><th>Titulo</th><th>Descripcion</th><th>Publicar</th></tr></thead><tbody>';
				foreach ($videos as $video) {
					
					if ($video->published == 1)
					{
						$title = "'".$video->title."'";
						$imagen = "'".$video->thumburl."'";
						$seo = "'".$video->seotitle."'";
						$descripcion = "'".$video->description."'";
						$idvideo = $video->id;
						
						$idcategory = VideoCategory::where('vid', '=',$idvideo)->get(array('catid'));
						foreach ($idcategory as $cat) {
							$idcategory = $cat->catid;
						}
						$namecategory =Category::where('id','=',$idcategory)->get(array('seo_category'));
						foreach ($namecategory as $namec) {
							$namecategory = "'".$namec->seo_category."'";
						}
						$encontrados=$encontrados.'<tr><td id="video_emb"><img src="'.$video->thumburl.'" width="160" height="100"/></td><td id="video_title">'.$video->title.'</td><td id="video_desc">'.$video->description.'</td>
						<td>
						<button onclick="showModal('.$seo.','.$namecategory.','.$title.','.$imagen.')" type="button" class="btn btn-default" aria-label="Left Align">
		                <span class="fa fa-group" aria-hidden="true">Cuentas</span>
		                </td></tr>';
					}
				}
		$encontrados=$encontrados.'</tbody><tfoot><tr><th>Video</th><th>Titulo</th><th>Descripcion</th><th>Seleccionar</th></tr></tfoot></table>';
		return Response::json(array(
			'success' => true,
			'list' => $encontrados	
            )); 
	}


	public function CategoryAlavista(){
		$cats = Category::all();
		$var = array( );
		$encontrados='<select class="populate placeholder" name="categoriaalavista" id="categoriaalavista" ><option  value="">-- Seleccione una categoria --</option>';
		foreach ($cats as $categoria)
		{
			if($categoria->published != 0)
			{
				if($categoria->parent_id != 0)
				{
					array_push($var,array('iden' => $categoria->id , 'desc' => ' -- '.$categoria->category ));
				}
				else
				{
					array_push($var,array('iden' => $categoria->id , 'desc' => $categoria->category ));
				}
			}
			

		}
		$encontrados=$encontrados.'</select>';

		return Response::json(array(
			'success' => true,
			'list' => $var
            )); 
	}




	

}

