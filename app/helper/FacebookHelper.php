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

	public function generateSessionFromToken($token)
	{
		$this->session = new FacebookSession($token);
		return $this->session;
	}

	public function getToken()
	{
		return $this->session->getToken(); 
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

public function getGraphGroups()
	{
		$session = Session::get('session');
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

public function getGraphEvents()
	{
		$session = Session::get('session');
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


public function getGraphPages()
	{
		$session = Session::get('session');
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

	public function postProfile($link,$message,$description)
	{
		$session = Session::get('session');
		if($session) {
  		try {
    			$response = (new FacebookRequest(
      			$session, 'POST', '/me/feed', array(
		        'link' => $link,
		        'message' => $message,
		        'description'=> $description)
    			))->execute()->getGraphObject();

    			return   "Posted with id: " . $response->getProperty('id');

  			}   catch(FacebookRequestException $e) {
   		 		return  "Exception occured, code: " . $e->getCode();
  			}   
		}
		else
			{
				Session::forget('session');
				return "no a iniciado sesion";
			}
	}

	public function postGroups($group_id, $link,$message,$description)
	{
		$session = Session::get('session');
		if($session) {
  		try {
    			$response = (new FacebookRequest(
      			$session, 'POST', '/'.$group_id.'/feed', array(
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
		{
			Session::forget('session');
			return  "no a iniciado sesion";
		}
	}

	public function postPages($page_id, $link,$message,$description)
		{
			$session = Session::get('session');
			if($session) {
	  		try {
	    			$response = (new FacebookRequest(
	      			$session, 'POST', '/'.$page_id.'/feed', array(
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
			{
				Session::forget('session');
				return  "no a iniciado sesion";
			}
		}

	public function postEvents($event_id, $link,$message,$description)
			{
				$session = Session::get('session');
				if($session) {
		  		try {
		    			$response = (new FacebookRequest(
		      			$session, 'POST', '/'.$event_id.'/feed', array(
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
				{
					Session::forget('session');
					return  "no a iniciado sesion";
				}
			}

}
?>