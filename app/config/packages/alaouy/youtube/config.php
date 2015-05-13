<?php 


// You can find the keys here : https://console.developers.google.com
// "alaouy/youtube": "dev-master",
$config = ConfigApp::First()->get();
return array(
	'KEY' => $config[0]["YouTubeKey"]
);