<?php

class GaleryController extends BaseController {

	
	public function showGalery()
	{
		return View::make('pages.video.simplegalery');
	}
	
	public function PaginacionVideos()
	{
		$items_per_page = Input::get('can');

        $items = Video::paginate($items_per_page);

	    $view = View::make('pages.video.items')->with('items', $items);
	    echo $view;
	    exit;
		
	}
}