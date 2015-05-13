<?php

class UserJoomla extends \Eloquent {
	
	protected $connection = 'alavista';

	protected $table = 'users';
	protected $primaryKey = 'id';
	// protected $fillable = array('userid', 'name', 'username' ,'email');
	public $timestamps=false;
	
}