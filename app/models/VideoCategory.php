<?php

class VideoCategory extends \Eloquent {
	
	protected $connection = 'alavista';
	// protected $fillable = [];
	protected $table = 'av_hdflv_video_category';
	// protected $primaryKey = 'id';
	 protected $fillable = array('vid', 'catid');
	
	public $timestamps=false;
	
}