<?php
session_start();
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

class FacebookHelper
{
	private $helper;
	private $session;
	private $request;
	
	public function __construct()
	{
		FacebookSession::setDefaultApplication(Config::get('facebook.app_id'),Config::get('facebook.app_secret'));
		$this->helper = new FacebookRedirectLoginHelper(url('facebook/callback'));
	}

	public function getUrlLogin()
	{
		return $this->helper->getLoginUrl(Config::get('facebook.app_scopes'));
	}

	public function generateSessionFromRedirect()
	{
		$this->session = null;

		try {

			$this->session = $this->helper->getSessionFromRedirect();
		
		} catch(FacebookRequestException $ex) {
		  // When Facebook returns an error
			echo $ex->getMessage();
		} catch(\Exception $ex) {			
		  // When validation fails or other local issues
			echo $ex->getMessage();
		}
		
		return $this->session;
	}

	//generar session desde token.
	public function generateSessionFromToken($token)
	{
		$session = new FacebookSession($token);
		return $session;
	}

	//hacer cambio de token de corta duración a larga duración.
	public function getTokenLong($session)
	{
		if($session) {
  		try {
    			$access_token_response = (new FacebookRequest(
      			$session, 'GET', '/oauth/access_token', array(
		        'grant_type' => 'fb_exchange_token',
		        'client_id' => Config::get('facebook.app_id'),
		        'client_secret'=> Config::get('facebook.app_secret'),
		        'fb_exchange_token'=> $session->getToken())
    			))->execute()->getGraphObject();

    			return $access_token_response->getProperty('access_token');

  			}   catch(FacebookRequestException $e) {
   		 		return  "Exception occured, code: " . $e->getCode();
  			}   
		}
		else
			return "no a iniciado sesion";
	}


	public function getGraph()
	{
		try {
			$this->request = new FacebookRequest($this->session, 'GET', '/me');
			$response = $this->request->execute();
		
			return  $response->getGraphObject();
		
		} catch (FacebookRequestException $ex) {
  			echo $ex->getMessage();
		} catch (\Exception $ex) {
  			echo $ex->getMessage();
		}
	}

public function getGraphGroups($session)
	{
		try {
			$request = new FacebookRequest($session, 'GET','/me/groups');
			$response = $request->execute();
		return  $response->getGraphObject();
		
		} catch (FacebookRequestException $ex) {
  			echo $ex->getMessage();
		} catch (\Exception $ex) {
  			echo $ex->getMessage();
		}
	}

public function getGraphEvents($session)
	{
		try {
			$this->request = new FacebookRequest($session, 'GET','/me/events');
			$response = $this->request->execute();
		return  $response->getGraphObject();
		
		} catch (FacebookRequestException $ex) {
  			echo $ex->getMessage();
		} catch (\Exception $ex) {
  			echo $ex->getMessage();
		}
	}


public function getGraphPages($session)
	{
		try {
			$this->request = new FacebookRequest($session, 'GET','/me/accounts');
			$response = $this->request->execute();
		return  $response->getGraphObject();
		
		} catch (FacebookRequestException $ex) {
  			echo $ex->getMessage();
		} catch (\Exception $ex) {
  			echo $ex->getMessage();
		}
	}

	//pubilicar en facebook. 
	public function postaccount($id,$link,$message,$description,$session)
	{
		if($session) {
  		try {
    			$response = (new FacebookRequest(
      			$session, 'POST', '/'.$id.'/feed', array(
		        'link' => $link,
		        'message' => $message,
		        'description'=> $description)
    			))->execute()->getGraphObject();

    			return  "Posted with id: " . $response->getProperty('id');

  			}   catch(FacebookRequestException $e) {
   		 		return  "Exception occured, code: " . $e->getCode();
  			}   
		}
		else
			return "no a iniciado sesion";
	}

}
?>