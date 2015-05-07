<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'mysql';
	protected $fillable = array('id', 'StatusId', 'RolId' ,'UserName' , 'email' , 'password','encrip');
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function cartasnopivot(){
        return $this->belongsToMany('Menu', 'usermenu', 'UserId', 'MenuId');
    }

    public function cartas(){
        return $this->belongsToMany('Menu', 'usermenu', 'UserId', 'MenuId')->withPivot('UserId','MenuId','ViewStatus');
    }

}
