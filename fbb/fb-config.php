<?php
session_start();
include_once('php-graph-sdk-5.x/src/Facebook/autoload.php');
$fb = new Facebook\Facebook(array(
	'app_id' => '473668188012962', // Replace with your app id
	'app_secret' => 'c9e20bfb7c8a3f8f0f52c8f6ec415108',  // Replace with your app secret
	'default_graph_version' => 'v3.2',
));

$helper = $fb->getRedirectLoginHelper();
?>