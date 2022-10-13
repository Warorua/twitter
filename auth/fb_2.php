<?php
include '../includes/conn.php';


require '../vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '1046688512658392',
    'app_secret' => '9b71ef99b6b55b352f3eab582b1c8cf3',
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
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exception\SDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  
  if (! isset($accessToken)) {
    if ($helper->getError()) {
      header('HTTP/1.0 401 Unauthorized');
      echo "Error: " . $helper->getError() . "\n";
      echo "Error Code: " . $helper->getErrorCode() . "\n";
      echo "Error Reason: " . $helper->getErrorReason() . "\n";
      echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
      header('HTTP/1.0 400 Bad Request');
      echo 'Bad request';
    }
    exit;
  }
  
  // Logged in
 // echo '<h3>Access Token</h3>';
 // var_dump($accessToken->getValue());
  
  // The OAuth 2.0 client handler helps us manage access tokens
  $oAuth2Client = $fb->getOAuth2Client();
  
  // Get the access token metadata from /debug_token
  $tokenMetadata = $oAuth2Client->debugToken($accessToken);
 // echo '<h3>Metadata</h3>';
 // var_dump($tokenMetadata);
 
  //echo '<h3>Metadata JSON</h3>';

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
      echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
      exit;
    }
  
    //echo '<h3>Long-lived</h3>';
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

 // echo json_encode($google_account_info);

  //check whether email is related to other account
  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
  $stmt->execute(['email'=>$email]);
  $row = $stmt->fetch();
  if($row['numrows'] > 0){
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->execute(['email'=>$email]);
    $row = $stmt->fetch();  

      if($row['source'] == 'G0'){
       $_SESSION['error'] = 'User already registered with Google.';
       unset($_SESSION['access_token']);
       redirect('https://tweetbot.site/auth/sign-up.php');
      
      }elseif($row['source'] == 'T0'){
          $_SESSION['error'] = 'User already registered with Twitter.';
          unset($_SESSION['access_token']);
          redirect('https://tweetbot.site/auth/sign-up.php');
      }else{
          $_SESSION['error'] = 'User already registered. Login instead.';
          unset($_SESSION['access_token']);
          redirect('https://tweetbot.site/auth/sign-up.php');
      }
  }
  ////////////////////////////////////////////////////////////////////////////////////////

  //insert data into db
$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE f_id=:f_id");
$stmt->execute(['f_id'=>$f_id]);
$row = $stmt->fetch();
if($row['numrows'] > 0){
     $_SESSION['error'] = 'User already registered. Login instead.';
     header('location:https://tweetbot.site/auth/sign-up.php');
}else{
    $stmt = $conn->prepare("INSERT INTO users (source, email, firstname, lastname, photo, f_id, status, type, created_on) VALUES (:source, :email, :firstname, :lastname, :photo, :f_id, :status, :type, :created_on)");
  $stmt->execute(['source'=>$source, 'email'=>$email, 'firstname'=>$firstname, 'lastname'=>$lastname, 'photo'=>$photo, 'f_id'=>$f_id, 'status'=>$status, 'type'=>$type, 'created_on'=>$create_on]);
 $_SESSION['user_id'] = $conn->lastInsertId();
 $_SESSION['error'] = $fbfullname;

 header('location:../account/overview.php');
}



//echo $fbpic;
  // User is logged in with a long-lived access token.
  // You can redirect them to a members-only page.
  //header('Location: https://example.com/members.php');
?>