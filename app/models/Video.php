<?php

class Video extends \Eloquent {
	
	protected $connection = 'alavista';
	// protected $fillable = [];
	protected $table = 'jos_hdflv_upload';
	protected $primaryKey = 'id';
	 protected $fillable = array('id', 'memberid', 'published' ,'title' , 'seotitle' , 'featured','type','rate', 'rateduser', 'ratecount' ,'times_viewed' , 'videos' , 'filepath','videourl', 'thumburl' ,'previewurl' , 'hdurl','home','playlistid','duration','ordering','streamerpath','streameroption','postrollads','prerollads','midrollads','description','targeturl','download','prerollid','postrollid','created_date','addedon','usergroupid','tags','useraccess','islive','imaads','embedcode','subtitle1','subtitle2','subtile_lang2','subtile_lang1','amazons3');
	//protected $fillable = array('id', 'member_id','category','seo_category','parent_id','ordering','lft','rgt','published');
	public $timestamps=false;
	
}