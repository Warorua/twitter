<?php
function redirect($url){
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
//$_SESSION['error'] = $status_info = "Test 001";
require_once '../vendor/autoload.php';
  
// init configuration
$clientID = '167208180500-p33dejrdqld6261j1inueg9p0sr9fqig.apps.googleusercontent.com';
$clientSecret = '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';
//$redirectUri = $parent_url.'/account/user';
$redirectUri = $parent_url.'/v2/login';
   
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

 $password = '';
$mode = 'G0';
$source_id = $g_id;
 $status = 0;
 $user_id = '';
 //check whether email is related to other account
 $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE g_id=:g_id");
$stmt->execute(['g_id'=>$g_id]);
$row = $stmt->fetch();
if($row['numrows'] > 0 && $row['source'] == 'G0'){
  $stmt = $conn->prepare("SELECT * FROM users WHERE g_id=:g_id");
  $stmt->execute(['g_id'=>$g_id]);
  $row = $stmt->fetch();  

  $status = 1;
  $status_info = 'Login Successful';
  $user_id = $row['id'];

  $_SESSION['user_id'] = $row['id'];
  $_SESSION['info'] = $row['g_id'];
  login_log($email, $password, $status, $mode, $user_id, $source_id, $status_info);
  redirect($parent_url.'/account/user');

}else{
    $_SESSION['error'] = $status_info = 'User not account not found! Sign up to login.';
        unset($_SESSION['access_token']);
        login_log($email, $password, $status, $mode, $user_id, $source_id, $status_info);
        redirect($parent_url.'/v2/login');
}
////////////////////////////////////////////////////////////////////////////////////////



  // now you can use this profile info to create account in your website and make user logged in.
}
?>