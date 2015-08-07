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

	public function showVideoDelete() {
		return View::make('pages.video.viewdelete');
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
//listar videos para publicar en tw. 
	public function LoadVideoTw(){

		return View::make('pages.video.listvideotw');
	}


	public function CategoryAlavista(){
		$cats = Category::all();
		$var = array( );
		$encontrados='<select class="populate placeholder" name="categoriaalavista" id="categoriaalavista" ><option  value="">-- Seleccione una categoria --</option>';
		foreach ($cats as $categoria)
		{
			if($categoria->published == 1)
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


	public function Datatable()
	{
		$tabla2= [];
		$ind = 0; 
		$campos = array('thumburl','seotitle','description','videourl','published','id','title');
	   
	    $tabla = Datatable::collection( Video::where('published', '=', 1)->get($campos) )
	    ->showColumns('thumburl', 'seotitle','description','videourl','published','id','title')
	    ->searchColumns('titulo','seotitle','description')
	    ->orderColumns('id', 'titulo','seotitle')
	    ->make();
	    //modifcar el objeto para presentar en la tabla con el formato requerido 
	    //para la integraión de la imagen y el boton para presentar el modal.
	    for ($i=0; $i < count($tabla['aaData']) ; $i++) { 

				$title = "'".$tabla['aaData'][$i][6]."'";
				$imagen ="'".$tabla['aaData'][$i][0]."'";
				$seo = "'".$tabla['aaData'][$i][1] ."'";
				$descripcion = "'".$tabla['aaData'][$i][2] ."'";
				$idvideo = $tabla['aaData'][$i][5];
				
				$idcategory = VideoCategory::where('vid', '=',$idvideo)->get(array('catid'));
				foreach ($idcategory as $cat) {
					$idcategory = $cat->catid;
				}
				$namecategory =Category::where('id','=',$idcategory)->get(array('seo_category'));
				foreach ($namecategory as $namec) {
					$namecategory = "'".$namec->seo_category."'";
				}
	    		$tabla2['aaData'][$ind][0] = '<img src="'.$tabla['aaData'][$i][0]. '" width="160" height="100">';
	    		$tabla2['aaData'][$ind][1] =  $tabla['aaData'][$i][1];
	    		$tabla2['aaData'][$ind][2] =  $tabla['aaData'][$i][2];
	    		$tabla2['aaData'][$ind][3] =  '<button onclick="showModal('.$seo.','.$namecategory.','.$title.','.$imagen.')" type="button" class="btn btn-default" aria-label="Left Align">
		                <span class="fa fa-group" aria-hidden="true">Cuentas</span>';

				$ind += 1; 

	    }
	    if (count($tabla['aaData']) == 0 )
	    	$tabla2['aaData'] = [];
	    $tabla2['iTotalDisplayRecords'] = $tabla['iTotalDisplayRecords'];
	    $tabla2['iTotalRecords'] = $tabla['iTotalRecords'];
	    $tabla2['sEcho'] = $tabla['sEcho'];

	    return $tabla2;
	}


public function DatatableDelete()
	{	
		$campos = array('id', 'title', 'videourl','rate','times_viewed','thumburl');
		$tabla2= [];
		$ind = 0; 
        $config = ConfigApp::First()->get();
	    $tabla = Datatable::collection( Video::where('published', '=', 1)->where('memberid', '=', $config[0]["UserJoomla"])->where('filepath', '!=', 'File')->get($campos) )
	    
	    ->showColumns('id', 'title', 'videourl','rate','times_viewed','thumburl')
	    ->searchColumns('title')
	    ->orderColumns('id', 'title')
	    ->orderColumns('id','title')
	    ->make();

	    //modifcar el objeto para presentar en la tabla con el formato requerido 
	    //para la integraión de la imagen y el boton para presentar el modal.
	    for ($i=0; $i < count($tabla['aaData']) ; $i++) { 

				$market = VideoOpenpub::where('VideoUrl', '=', $tabla['aaData'][$i][2])->count();
				$alavista = Video::where('videourl', '=', $tabla['aaData'][$i][2])->count();
				$enmark='';$enav='';

				if ($market>0) {$enmark='<center><i class="fa fa-check txt-success"></i></center>';} else{$enmark='<center><i class="fa fa-times txt-danger"></i></center>';}
				if ($alavista>0) {$enav='<center><i class="fa fa-check txt-success"></i></center>';} else{$enav='<center><i class="fa fa-times txt-danger"></i></center>';}
				
				$tabla2['aaData'][$ind][0] =  '';
	    		$tabla2['aaData'][$ind][1] = '<input class="ajoomla" type="checkbox" name="elemento'.$tabla['aaData'][$i][0].'" id="' . $tabla['aaData'][$i][0]. '" value="' . $tabla['aaData'][$i][0] . '"/>';
	    		$tabla2['aaData'][$ind][2] =  $enmark;
	    		$tabla2['aaData'][$ind][3] =  $enav;
	    		// $tabla2['aaData'][$ind][4] ='<a class="fancybox-media" href="'.$tabla['aaData'][$i][2].'" title="'.$tabla['aaData'][$i][1].'"><img src="'.$tabla['aaData'][$i][5].'" width="240px" height="137px" alt="" /></a>';
	    		$tabla2['aaData'][$ind][4] =  '<img src="'.$tabla['aaData'][$i][5]. '" width="160" height="100">';
	    		$tabla2['aaData'][$ind][5] =  $tabla['aaData'][$i][1];
	    		// $tabla2['aaData'][$ind][6] =  '<a id="callmodal" data-toggle="modal" href="#modaldataedit" class="btn btn-danger btn-large"><span class="fa fa-trash-o" aria-hidden="true"></span></a>';
	    		$tabla2['aaData'][$ind][6] =  '<center><b>'.$tabla['aaData'][$i][4].'</b></center>';
	    		$tabla2['aaData'][$ind][7] =  '<center><b>'.$tabla['aaData'][$i][3].'</b></center>';

				$ind += 1; 
	    }
	    if (count($tabla['aaData']) == 0 )
	    	$tabla2['aaData'] = [];
	    $tabla2['iTotalDisplayRecords'] = $tabla['iTotalDisplayRecords'];
	    $tabla2['iTotalRecords'] = $tabla['iTotalRecords'];
	    $tabla2['sEcho'] = $tabla['sEcho'];

	    return $tabla2;
	}

	public function EliminarVideos()
	{	
		$mensaje='';
		$idvideos=Input::get('videose');
		$campos = array('videourl');
		$elem=count($idvideos);
		$count=0;
		if ($elem!=0) {
			foreach ($idvideos as $value) {
				$url=Video::where('id', '=', $value)->get($campos);
				$url=$url->toArray();
				foreach ($url as  $viur) {
					
					$count+=VideoController::EliminarAlvista($viur["videourl"],$value);
					
				}

			}
			if ($elem==$count) {
				$mensaje.='Se eliminaron los videos seleccionados';
			}
			else{
				$mensaje.='Eliminados';
			}
		}
		else{
			$mensaje.='Seleccione al menos un Video';
		}

		return Response::json(array(
            'success' => 'true',
            'list' => $mensaje
        ));
	}

	static public function EliminarAlvista($str,$id){
		$vidave = Video::where('videourl', '=', $str)->where('id','=',$id)->count();
		$vidaop = VideoOpenpub::where('VideoUrl', '=', $str)->count();
		DB::beginTransaction();
        $mess = 0;
		try {
			if (($vidave==1 && $vidaop==0))  {
				$ViAv = Video::find( $id );
				$ViAv->delete();
				
				$vid=$id;
				$ne=VideoCategory::find($id);
				$ne->delete();
				// var_dump($ne);
				$mess=1;
				// echo  'eliminado';
			}
			if (($vidave==1 && $vidaop==1)){
				$ViAv = Video::find( $id );
				$ViAv->delete();
				
				$vid=$id;
				$ne=VideoCategory::find($id);
				$ne->delete();

				$idop=str_replace(array('https://www.youtube.com/watch?v=','https://vimeo.com/'), '' , $str);
				$opp=VideoOpenpub::find($idop);
				$opp->delete();
				// var_dump($ne);
				$mess=1;
				// echo  'eliminado';

			}
		DB::commit();			
		} catch (Exception $e) {
			DB::rollback();
            $mess=0;
            var_dump($e);
		}
		return $mess;
	}

	public function ShowListaInfor() {
		return View::make('pages.video.viewpopular');
	}

	public function PaginacionPopulares()
	{
		$items_per_page = Input::get('can');
		$ordenar_items = 'times_viewed';
		$forma_orden = 'desc';
		$campos = array('id', 'title', 'videourl','rate','times_viewed','thumburl');
        $config = ConfigApp::First()->get();
        
        $items = Video::where('published', '=', 1)->where('memberid', '=', $config[0]["UserJoomla"])->where('filepath', '!=', 'File')->orderBy($ordenar_items, $forma_orden)->select($campos)->paginate($items_per_page);
        if ($items->isEmpty()) {
		   echo '<div class="box-content"><legend id="uniq" class="alert alert-info">No hay videos para visualizar</legend></div>';
		   exit;
		}
		else
		{
			$view = View::make('pages.video.populares')->with('items', $items);
		    echo $view;
		    exit;
		}
	}

	public function ShowListaMomento() {
		return View::make('pages.video.viewmomento');
	}

	public function PaginacionMomento()
	{
		$items_per_page = Input::get('can');
		$ordenar_items = 'rate';
		$forma_orden = 'desc';
		$campos = array('id', 'title', 'videourl','rate','times_viewed','thumburl');
        $config = ConfigApp::First()->get();
        
        $items = Video::where('published', '=', 1)->where('memberid', '=', $config[0]["UserJoomla"])->where('filepath', '!=', 'File')->orderBy($ordenar_items, $forma_orden)->select($campos)->paginate($items_per_page);
        if ($items->isEmpty()) {
		   echo '<div class="box-content"><legend id="uniq" class="alert alert-info">No hay videos para visualizar</legend></div>';
		   exit;
		}
		else
		{
			$view = View::make('pages.video.momento')->with('items', $items);
		    echo $view;
		    exit;
		}
	}

}

