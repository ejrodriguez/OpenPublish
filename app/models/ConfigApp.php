<?php

class ConfigApp extends \Eloquent {
	protected $connection = 'mysql';
	protected $table = 'config';
	protected $fillable = array('AppIdFacebook', 'AppSecretFacebook','ConsumerKeyTw','ConsumerSecretTw','YouTubeKey','VimeoClientId','VimeoClientSecret','VimeAccessToken','UserJoomla');
}