<?php

class Rol extends \Eloquent {
	protected $fillable = [];

	protected $table = 'rol';
	protected $primaryKey = 'RolId';

	public function users() {
		return $this->hasMany('User', 'RolId');
	}

	public function menuspivot(){
        return $this->belongsToMany('Menu', 'rolmenu', 'RolId', 'MenuId')->withPivot('Rolid');
    }

    public function menus(){
        return $this->belongsToMany('Menu', 'rolmenu', 'RolId', 'MenuId');
    }
}