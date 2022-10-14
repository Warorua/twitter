<?php
function redirect($url)
{
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
//$_SESSION['error'] = "Test 001";
require_once '../vendor/autoload.php';
  
// init configuration
$clientID = '167208180500-p33dejrdqld6261j1inueg9p0sr9fqig.apps.googleusercontent.com';
$clientSecret = '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';
//$redirectUri = $parent_url.'/account/overview.php';
$redirectUri = $parent_url.'/auth/sign-up.php';
   
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
 $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
$stmt->execute(['email'=>$email]);
$row = $stmt->fetch();
if($row['numrows'] > 0){
  $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");
  $stmt->execute(['email'=>$email]);
  $row = $stmt->fetch();  

    if($row['source'] == 'T0'){
     $_SESSION['error'] = 'User already registered with Twitter.';
     unset($_SESSION['access_token']);
     redirect($parent_url.'/auth/sign-up.php');
    
    }elseif($row['source'] == 'F0'){
        $_SESSION['error'] = 'User already registered with Facebook.';
        unset($_SESSION['access_token']);
        redirect($parent_url.'/auth/sign-up.php');
    }else{
        $_SESSION['error'] = 'User already registered. Login instead.';
        unset($_SESSION['access_token']);
        redirect($parent_url.'/auth/sign-up.php');
    }
}
////////////////////////////////////////////////////////////////////////////////////////

  //insert data into db
$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE g_id=:g_id");
$stmt->execute(['g_id'=>$g_id]);
$row = $stmt->fetch();
if($row['numrows'] > 0){
     $_SESSION['error'] = 'User already registered';
     redirect($parent_url.'/auth/sign-up.php');
}else{
    $stmt = $conn->prepare("INSERT INTO users (source, email, firstname, lastname, photo, g_id, status, type, created_on) VALUES (:source, :email, :firstname, :lastname, :photo, :g_id, :status, :type, :created_on)");
  $stmt->execute(['source'=>$source, 'email'=>$email, 'firstname'=>$firstname, 'lastname'=>$lastname, 'photo'=>$photo, 'g_id'=>$g_id, 'status'=>$status, 'type'=>$type, 'created_on'=>$create_on]);
 $_SESSION['user_id'] = $conn->lastInsertId();
 $_SESSION['error'] = $email;

 redirect($parent_url.'/account/overview.php');
}


  // now you can use this profile info to create account in your website and make user logged in.
}
?>