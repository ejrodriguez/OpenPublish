<?php

class Category extends \Eloquent {
	protected $connection = 'alavista';
	// protected $fillable = [];
	protected $table = 'hdflv_category';
	protected $primaryKey = 'id';
	// protected $fillable = array('id', 'memberid', 'published' ,'title' , 'seotitle' , 'featured','type','rate', 'rateduser', 'ratecount' ,'times_viewed' , 'videos' , 'filepath','videourl', 'thumburl' ,'previewurl' , 'videos' , 'hdurl','home','playlistid','duration','ordering','streamerpath','streameroption','postrollads','prerollads','midrollads','description','targeturl','download','prerollid','postrollid','created_date','addedon','usergroupid','tags','useraccess','islive','imaads','embedcode','subtitle1','subtitle2','subtile_lang2','subtile_lang1','amazons3');
	protected $fillable = array('id', 'member_id','category','seo_category','parent_id','ordering','lft','rgt','published');
	public $timestamps=false;
	
}