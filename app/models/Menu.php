<?php

class Menu extends \Eloquent {
	protected $fillable = [];
	protected $table = 'menu';
	protected $primaryKey = 'MenuId';

	public function submenus() {
		return $this->hasMany('Submenu', 'MenuId');
	}

	public function users(){
        return $this->belongsToMany('User', 'usermenu', 'MenuId', 'UserId');
    }
}