<?php
session_start();
include '../includes/conn.php';
//$_SESSION['error'] = "Test 001";
require_once '../vendor/autoload.php';
  
// init configuration
$clientID = '167208180500-p33dejrdqld6261j1inueg9p0sr9fqig.apps.googleusercontent.com';
$clientSecret = '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';
//$redirectUri = $parent_url.'/account/user';
$redirectUri = $parent_url.'/auth/redirect.php';
   
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
  
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
   
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
 // $name =  $google_account_info->name;
  $firstname = $google_account_info->givenName;
  $lastname = $google_account_info->familyName;
  $photo = $google_account_info->picture;
  $g_id = $google_account_info->id;
  $status = $google_account_info->verifiedEmail;
  $type = 1;
  $create_on = date('d-M-Y G:i:s');

 $conn = $pdo->open();

 // echo json_encode($google_account_info);
 

  //insert data into db
$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE g_id=:g_id");
$stmt->execute(['g_id'=>$g_id]);
$row = $stmt->fetch();
if($row['numrows'] > 0){
     echo 'User already registered';
     header('location:https://tweetbot.site/auth/redirect.php');
}else{
    $stmt = $conn->prepare("INSERT INTO users (email, firstname, lastname, photo, g_id, status, type, created_on) VALUES (:email, :firstname, :lastname, :photo, :g_id, :status, :type, :created_on)");
  $stmt->execute(['email'=>$email, 'firstname'=>$firstname, 'lastname'=>$lastname, 'photo'=>$photo, 'g_id'=>$g_id, 'status'=>$status, 'type'=>$type, 'created_on'=>$create_on]);
 $_SESSION['user_id'] = $conn->lastInsertId();
header('location:https://tweetbot.site/account/user');
}


  // now you can use this profile info to create account in your website and make user logged in.
} else {
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}
?>