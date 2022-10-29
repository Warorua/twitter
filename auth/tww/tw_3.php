<?php
//redirect function

////////////
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY', $system['consumer_key']);
define('CONSUMER_SECRET', $system['consumer_secret']);
define('OAUTH_CALLBACK', $tw_url);
//define('oauth_token', '842987337353052160-LL8z2AHxYRP7lHo8iDaq8cLNzeSu8OP');
//define('oauth_token_secret', '6eZZno5qC6d8E5Gtc9jakmhEgvP07F3MfxOBwJ5ysLm8x');

//access token
if (isset($_REQUEST['oauth_verifier'], $_REQUEST['oauth_token']) && $_REQUEST['oauth_token'] == $_SESSION['oauth_token']) {			   //In project use this session to change login header after successful login 
	$request_token = [];
	$request_token['oauth_token'] = $_SESSION['oauth_token'];
	$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
	$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
	$_SESSION['access_token'] = $access_token;
	// redirect user back to index page
	//header("location:index.php");
}
//////////////////////////
if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$user = $connection->get("account/verify_credentials", ['include_email' => 'true']);
    
//insertion to db process

$email =  $user->email;
  $username = $user->screen_name;
  $photo = $user->profile_image_url;
  $t_id = $user->id;  
  $address = $user->location;
  $verified = $user->verified;
  $suspension = $user->suspended;
 $conn = $pdo->open();
 // echo json_encode($google_account_info);
  ////////////////////////////////////////////////////////////////////////////////////////
  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE t_id=:t_id");
$stmt->execute(['t_id'=>$t_id]);
$row = $stmt->fetch();
if($row['numrows'] < 1){
    $stmt = $conn->prepare("UPDATE users SET t_id=:t_id WHERE id=:id");
    $stmt->execute(['t_id'=>$t_id, 'id'=>$_SESSION['user_id']]);
    $_SESSION['success'] = 'Account successfully linked';
    unset($_SESSION['access_token']);
    redirect($parent_url.'/account/settings');
  
  }else{
      $_SESSION['error'] = 'This user is linked to another account.';
          unset($_SESSION['access_token']);
          redirect($parent_url.'/account/settings');
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  


}
?>