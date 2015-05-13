<?php
$config = ConfigApp::First()->get();
return  array(
	'consumer_key'=>$config[0]["ConsumerKeyTw"],
	'consumer_secret'=>$config[0]["ConsumerSecretTw"],
	'ouath_callback'=> url('twitter/callback')
	//'ouath_callback'=> 'oob'
)
?>