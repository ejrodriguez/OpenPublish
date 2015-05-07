<?php

class Status extends \Eloquent {
	protected $connection = 'mysql';
	protected $fillable = [];

	protected $table = 'status';
	protected $primaryKey = 'StatusId';
}