<?php

$config = ConfigApp::First()->get();
return [

	/*
	|--------------------------------------------------------------------------
	| Client Identifier
	|--------------------------------------------------------------------------
	|
	| Your applications client identifier. Used when generating authentication
	| tokens and to receive your authorization code. The client identifier
	|
	*/

	'client_id' => $config[0]["VimeoClientId"],

	/*
	|--------------------------------------------------------------------------
	| Client Secret
	|--------------------------------------------------------------------------
	|
	| Your applications client secret. Used when generating authentication
	| tokens and to receive your authorization code.
	|
	*/

	'client_secret' => $config[0]["VimeoClientSecret"],

	/*
	|--------------------------------------------------------------------------
	| Access Token
	|--------------------------------------------------------------------------
	| 
	| Your applications access token. Can be found on developer.vimeo.com/apps
	| or generated using OAuth 2.
	*/

	'access_token' => $config[0]["VimeAccessToken"],

];
