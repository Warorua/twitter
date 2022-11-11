<?php
require '../vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '817967362819734',
    'app_secret' => '66aaede563058530ba2bc9bf91a002db',
    'default_graph_version' => 'v3.2',
    ]);
  
  $helper = $fb->getRedirectLoginHelper();
  
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl($fb_url, $permissions);
  
//  echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>