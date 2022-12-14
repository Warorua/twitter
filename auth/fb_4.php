<?php
include '../includes/conn.php';


require '../vendor/autoload.php';
$output = '';
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
if(isset($_GET['error_message'])){
  redirect($parent_url.'/v2/overheat?error='.$_GET['error_message']);
}

$fb = new Facebook\Facebook([
  'app_id' => '817967362819734',
  'app_secret' => '66aaede563058530ba2bc9bf91a002db',
  'default_graph_version' => 'v3.2',
]);

$helper = $fb->getRedirectLoginHelper();

if (isset($_GET['state'])) {
  $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}

  try {
    $accessToken = $helper->getAccessToken();
  } catch(Facebook\Exception\ResponseException $e) {
    // When Graph returns an error
    $output .= 'Graph returned an error: ' . $e->getMessage();
    //exit;
  } catch(Facebook\Exception\SDKException $e) {
    // When validation fails or other local issues
    $output .= 'Facebook SDK returned an error: ' . $e->getMessage();
    //exit;
  }
  
  if (! isset($accessToken)) {
    if ($helper->getError()) {
      header('HTTP/1.0 401 Unauthorized');
      $output .= "Error: " . $helper->getError() . "\n";
      $output .= "Error Code: " . $helper->getErrorCode() . "\n";
      $output .= "Error Reason: " . $helper->getErrorReason() . "\n";
      $output .= "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
      header('HTTP/1.0 400 Bad Request');
      $output .= 'Bad request';
    }
    //exit;
  }
  
  // Logged in
 // $output .= '<h3>Access Token</h3>';
 // var_dump($accessToken->getValue());
  
  // The OAuth 2.0 client handler helps us manage access tokens
  $oAuth2Client = $fb->getOAuth2Client();
  
  // Get the access token metadata from /debug_token
  $tokenMetadata = $oAuth2Client->debugToken($accessToken);
 // $output .= '<h3>Metadata</h3>';
 // var_dump($tokenMetadata);
 
  //$output .= '<h3>Metadata JSON</h3>';

  // Validation (these will throw FacebookSDKException's when they fail)
  //$tokenMetadata->validateAppId($config['app_id']);
  // If you know the user ID this access token belongs to, you can validate it here
  //$tokenMetadata->validateUserId('123');
  $tokenMetadata->validateExpiration();
  
  if (! $accessToken->isLongLived()) {
    // Exchanges a short-lived access token for a long-lived one
    try {
      $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    } catch (Facebook\Exception\SDKException $e) {
      $output .= "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
      //exit;
    }



  if (isset($_GET['error_message'])) {
    redirect($parent_url . 'v2/overheat?error=' . $_GET['error_message']);
    exit;
  }
  if ($output != '') {
    redirect($parent_url . 'v2/overheat?error=' . $output);
    exit;
  }

  
    //$output .= '<h3>Long-lived</h3>';
   // var_dump($accessToken->getValue());
  }
  
  $_SESSION['fb_access_token'] = (string) $accessToken;

  $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['fb_access_token']);

$_SESSION['fb_access_token'] = (string) $longLivedAccessToken;

  $fb->setDefaultAccessToken($_SESSION['fb_access_token']);
  
  $profile_request = $fb->get('/me?fields=id,name,first_name,last_name,email');

$requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture

$picture = $requestPicture->getGraphUser();

$profile = $profile_request->getGraphUser();

$fbid = $profile->getProperty('id');           // To Get Facebook ID

$fbfullname = $profile->getProperty('name');   // To Get Facebook full name

$fbemail = $profile->getProperty('email');    //  To Get Facebook email

$fbpic = "<img src='".$picture['url']."' class='img-rounded'/>";

//insertion to db process

$email =  $fbemail;
 // $name =  $google_account_info->name;
  $firstname = $profile->getProperty('first_name');
  $lastname = $profile->getProperty('last_name');
  $photo = $picture['url'];
  $f_id = $profile->getProperty('id');  
  $status = 1;
  $type = 1;
  $create_on = date('d-M-Y G:i:s');
  $source = 'F0';

 $conn = $pdo->open();

// $output .= json_encode($google_account_info);
$email = '';
$password = '';
$mode = 'F0';
$source_id = $f_id;
$status = 0;
$user_id = '';
////////////////////////////////////////////////////////////////////////////////////////
$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE f_id=:f_id");
$stmt->execute(['f_id' => $f_id]);
$row = $stmt->fetch();
if ($row['numrows'] < 1) {
  $stmt = $conn->prepare("UPDATE users SET f_id=:f_id WHERE id=:id");
  $stmt->execute(['f_id' => $f_id, 'id' => $user['id']]);
  $_SESSION['success'] = 'Account successfully linked';
  redirect($parent_url . '/account/settings');
} else {
  $_SESSION['error'] = 'This user is linked to another account.';
  unset($_SESSION['access_token']);
  redirect($parent_url . '/account/settings');
}
  ////////////////////////////////////////////////////////////////////////////////////////
  

//$output .= $fbpic;
  // User is logged in with a long-lived access token.
  // You can redirect them to a members-only page.
  //header('Location: https://example.com/members.php');
