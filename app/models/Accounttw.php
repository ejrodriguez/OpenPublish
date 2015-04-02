<?php

class Accounttw extends \Eloquent {
	
	protected $connection = 'mysql';
	protected $table = 'twaccounts';
	protected $primaryKey = 'idtw';
	protected $fillable = array('idtw', 'name','id_account','oauth_token','oauth_token_secret','usuario_id');
	
}