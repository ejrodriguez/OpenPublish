<?php

class Submenu extends \Eloquent {
	protected $connection = 'mysql';
	protected $fillable = array('SubmenuId', 'MenuId', 'SubmenuDescrip');

	protected $table = 'submenu';
	protected $primaryKey = 'SubmenuId';


}