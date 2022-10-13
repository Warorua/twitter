<?php

//initialize facebook sdk
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

$permissions = ['email']; // optional

try {

if (isset($_SESSION['facebook_access_token'])) {

$accessToken = $_SESSION['facebook_access_token'];

} else {

  $accessToken = $helper->getAccessToken();

}

} catch(Facebook\Exceptions\facebookResponseException $e) {

// When Graph returns an error

echo 'Graph returned an error: ' . $e->getMessage();

  exit;

} catch(Facebook\Exceptions\FacebookSDKException $e) {

// When validation fails or other local issues

echo 'Facebook SDK returned an error: ' . $e->getMessage();

  exit;

}

$_SESSION['fb_email'] = $accessToken;

if (isset($accessToken)) {

if (isset($_SESSION['facebook_access_token'])) {

$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

} else {

// getting short-lived access token

$_SESSION['facebook_access_token'] = (string) $accessToken;

  // OAuth 2.0 client handler

$oAuth2Client = $fb->getOAuth2Client();

// Exchanges a short-lived access token for a long-lived one

$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

// setting default access token to be used in script

$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

}

// redirect the user to the profile page if it has "code" GET variable

if (isset($_GET['code'])) {
   // $_SESSION['fb_email'] = 'fbpic';
  
    redirect('http://localhost/twitter/account/overview.php');
//header('Location: profile.php');

}

// getting basic info about user

try {

$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');

$requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture

$picture = $requestPicture->getGraphUser();

$profile = $profile_request->getGraphUser();

$fbid = $profile->getProperty('id');           // To Get Facebook ID

$fbfullname = $profile->getProperty('name');   // To Get Facebook full name

$fbemail = $profile->getProperty('email');    //  To Get Facebook email

$fbpic = "<img src='".$picture['url']."' class='img-rounded'/>";

# save the user nformation in session variable

$_SESSION['fb_id'] = $fbid.'</br>';

$_SESSION['fb_name'] = $fbfullname.'</br>';

$_SESSION['fb_email'] = $fbemail.'</br>';

$_SESSION['fb_pic'] = $fbpic.'</br>';

$_SESSION['error'] = 'fbpic';

} catch(Facebook\Exceptions\FacebookResponseException $e) {

// When Graph returns an error

echo 'Graph returned an error: ' . $e->getMessage();

session_destroy();

// redirecting user back to app login page

//header("Location: ./");
redirect('http://localhost/twitter/auth/sign-up.php');

exit;

} catch(Facebook\Exceptions\FacebookSDKException $e) {

// When validation fails or other local issues

echo 'Facebook SDK returned an error: ' . $e->getMessage();

exit;

}

} 
$loginUrl = $helper->getLoginUrl('http://localhost/twitter/auth/facebook_sign.php', $permissions);


?>