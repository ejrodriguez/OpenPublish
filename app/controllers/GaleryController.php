<?php

class GaleryController extends BaseController {

	/**
	 * [showGalery description: Mostrar Vista de Galeria 'simplegalery']
	 * @return [type] [View]
	 */
	public function showGalery()
	{
		return View::make('pages.video.simplegalery');
	}
	
	/**
	 * [PaginacionVideos description: Vista que carga la paginacion de video multimedia 'items']
	 * @return [type] [View]
	 */
	public function PaginacionVideos()
	{
		$items_per_page = Input::get('can');
		$ordenar_items = Input::get('orde');
		$forma_orden = Input::get('por');
		$campos = array('id', 'title', 'videourl','rate','times_viewed','thumburl');
        $config = ConfigApp::First()->get();
        
        $items = Video::where('published', '=', 1)->where('memberid', '=', $config[0]["UserJoomla"])->where('filepath', '!=', 'File')->orderBy($ordenar_items, $forma_orden)->select($campos)->paginate($items_per_page);
        if ($items->isEmpty()) {
		   echo '<div class="box-content"><legend id="uniq" class="alert alert-info">No hay videos para visualizar</legend></div>';
		   exit;
		}
		else
		{
			$view = View::make('pages.video.items')->with('items', $items);
		    echo $view;
		    exit;
		}
	}
}