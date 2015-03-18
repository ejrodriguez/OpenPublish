<?php

class VideoOpenpub extends \Eloquent {
	protected $connection = 'mysql';
	protected $table = 'video';
	protected $primaryKey = 'VideoId';
	 protected $fillable = array('VideoId','UserId','VideoTitle','VideoUrl','VideoImage','VideoDate');
	//protected $fillable = array('id', 'member_id','category','seo_category','parent_id','ordering','lft','rgt','published');
	public $timestamps=false;
	
}