<?php

class Account extends \Eloquent {
	
	protected $connection = 'mysql';
	protected $table = 'fbaccounts';
	protected $primaryKey = 'id';
	protected $fillable = array('id', 'name','id_account','access_token_fb','usuario_id');
	
}