<?php

class Submenu extends \Eloquent {
	protected $fillable = array('SubmenuId', 'MenuId', 'SubmenuDescrip');

	protected $table = 'submenu';
	protected $primaryKey = 'SubmenuId';


}