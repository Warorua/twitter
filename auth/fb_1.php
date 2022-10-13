<?php
require '../vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '1046688512658392',
    'app_secret' => '9b71ef99b6b55b352f3eab582b1c8cf3',
    'default_graph_version' => 'v3.2',
    ]);
  
  $helper = $fb->getRedirectLoginHelper();
  
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl($fb_url, $permissions);
  
//  echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>