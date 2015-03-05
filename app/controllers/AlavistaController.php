<?php

class AlavistaController extends BaseController {

	
	public function ListCategory()
	{
		//ejemplo con base joomla
		// return View::make('pages.welcome');
		
		$input = array(
						'member_id' => 0,
						'category' => 'Deportes',
						'seo_category' => 'Deportes',
						'parent_id' => 0,
						'ordering' => 16,
						'lft' => 2,
						'rgt' => 2,
						'published' => 1,
					   );
		Category::create($input);

		$list = Category::all();
		return Response::json(array(
										'success' => 'true',
										'resp' => $list

					                    ));
	}

}