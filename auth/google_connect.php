<?php
//$_SESSION['error'] = $status_info = "Test 001";
require_once '../vendor/autoload.php';
  
// init configuration
$clientID = '443937688346-lfidv45nreo118dnou1c2s2pd9ba1e5k.apps.googleusercontent.com';
$clientSecret = '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';
//$redirectUri = $parent_url.'/account/user';
$redirectUri = $parent_url.'/account/settings';
   
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
  $source = 'G0';

 $conn = $pdo->open();

 // echo json_encode($google_account_info);

 //check whether email is related to other account
 $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE g_id=:g_id");
$stmt->execute(['g_id'=>$g_id]);
$row = $stmt->fetch();
if($row['numrows'] < 1){
  $stmt = $conn->prepare("UPDATE users SET g_id=:g_id WHERE id=:id");
  $stmt->execute(['g_id'=>$g_id, 'id'=>$user['id']]);
  $_SESSION['success'] = 'Account successfully linked';
  redirect($parent_url.'/account/settings');

}else{
    $_SESSION['error'] = 'This user is linked to another account.';
        unset($_SESSION['access_token']);
        redirect($parent_url.'/account/settings');
}
////////////////////////////////////////////////////////////////////////////////////////



  // now you can use this profile info to create account in your website and make user logged in.
}
?>