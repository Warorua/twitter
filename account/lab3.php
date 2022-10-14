<?php
require '../vendor/autoload.php';
include '../includes/conn.php';
include '../includes/session.php';

$fb = new Facebook\Facebook([
    'app_id' => '1046688512658392',
    'app_secret' => '9b71ef99b6b55b352f3eab582b1c8cf3',
    'default_graph_version' => 'v2.10',
    ]);
  
  try {
    // Returns a `Facebook\Response` object
    $response = $fb->get('/me?fields=id,name', '211864e7e9ffd39ee996f0acc26bc111');
  } catch(Facebook\Exception\ResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exception\SDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  
  $user = $response->getGraphUser();
  
  echo 'Name: ' . $user['name'];
  // OR
  // echo 'Name: ' . $user->getName();
?>