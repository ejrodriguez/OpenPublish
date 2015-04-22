<?php

use Abraham\TwitterOAuth\TwitterOAuth;
/*
| Class twitter. 
| Function.
| Author: Edison Rodriguez.
| Email: rodriguezjedison@hotmail.es
*/
class TwitterHelper
{
	private $twitter;
	private $twitter_tmp;
	private $oauth_token;
	private $oauth_token_secret;

	
	function __construct()
	{
		$this->twitter = new TwitterOAuth(Config::get('twitter.consumer_key'),Config::get('twitter.consumer_secret'));		       
	}

	public function getUrlLogin()
	{
		//twitter temporal. 
		$this->twitter_tmp = $this->twitter->oauth('oauth/request_token', array('oauth_callback' => Config::get('twitter.ouath_callback')));
		//variables de sessiones.
		Session::put('oauth_token', $this->twitter_tmp["oauth_token"]);
		Session::put('oauth_token_secret', $this->twitter_tmp["oauth_token_secret"]);
	    $url = $this->twitter->url('oauth/authorize', array('oauth_token' => $this->twitter_tmp["oauth_token"]));
		return $url;
	}

	public function generateSessionFromRedirect($oauth_verifier)
	{

		$connection = new TwitterOAuth(Config::get('twitter.consumer_key'),Config::get('twitter.consumer_secret'),Session::get('oauth_token'),Session::get('oauth_token_secret'));
		$content = $connection->get("account/verify_credentials");
		$twitter = $connection->oauth("oauth/access_token", array("oauth_verifier" => $oauth_verifier));
		//$new_oauth_token = $twitter['oauth_token'];
		//$new_oauth_token_secret = $twitter['oauth_token_secret'];

		//$new_twitter= new TwitterOAuth(Config::get('twitter.consumer_key'),Config::get('twitter.consumer_secret'),$new_oauth_token,$new_oauth_token_secret);
		//$content = $new_twitter->get("account/verify_credentials");
		return $twitter;
	}

	public function generateSession($oauth_token,$oauth_token_secret)
	{
		$new_twitter=NULL; 
		try {

			$new_twitter= new TwitterOAuth(Config::get('twitter.consumer_key'),Config::get('twitter.consumer_secret'),$oauth_token,$oauth_token_secret);
			return $new_twitter;			
			//var_dump($new_twitter);
				} catch (Exception $ex) {
					return $ex;
				}
			
	}

	public function PostTweet($session,$mensaje)
	{
		$statues = NULL; 
		try {
				$statues = $session->post("statuses/update", array("status" => $mensaje));
			    return $statues;
		} catch (Exception $e) {
			return $e;
		}
		
	}
}


?>