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
 

$email =  $user->email;
 // $name =  $google_account_info->name;
  $firstname = '';
  $lastname = '';
  $username = $user->screen_name;
  $photo = $user->profile_image_url;
  $t_id = $user->id;  
  $status = 1;
  $type = 1;
  $create_on = date('d-M-Y G:i:s');
  $source = 'T0';

  $address = $user->location;
  $verified = $user->verified;



  $suspension = $user->suspended;

 $conn = $pdo->open();

 // echo json_encode($google_account_info);
 $password = '';
 $mode = 'T0';
 $source_id = $t_id;
  $status = 0;
  $user_id = '';
  ////////////////////////////////////////////////////////////////////////////////////////
  $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE t_id=:t_id");
  $stmt->execute(['t_id' => $t_id]);
  $row = $stmt->fetch();
  if ($row['numrows'] > 0 && $row['source'] == 'T0') {
    $stmt = $conn->prepare("SELECT * FROM users WHERE t_id=:t_id");
    $stmt->execute(['t_id' => $t_id]);
    $row = $stmt->fetch();

    $status = 1;
    $status_info = 'Login Successful';
    $user_id = $row['id'];

    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM client_api WHERE user_id=:user_id");
    $stmt->execute(['user_id' => $user_id]);
    $lg_auth = $stmt->fetch();
    /*
    if ($lg_auth['numrows'] > 0 && !isset($_COOKIE["consumer_key"])) {

      $_SESSION['consumer_key'] = $lg_auth['consumer_key'];
      $_SESSION['consumer_secret'] = $lg_auth['consumer_secret'];

      //setcookie("consumer_key", $lg_auth['consumer_key'], time()+60*60*24*30);

      // setcookie("consumer_secret", $lg_auth['consumer_secret'], time()+60*60*24*30);

      // session_start();
      // session_destroy();
       unset($_SESSION['access_token']);
      // session_start();

      $_SESSION['success'] = 'Configuration done. Kindly login again.';
      redirect($parent_url . '/v2/login');
      // setcookie("Auction_Item", "Luxury Car", time()+60*60*24*30);
    } else {
*/

    if ($row['two_auth'] != 0) {
      if ($row['two_auth'] == 1) {
        $_SESSION['id_twoAuth'] = $row['id'];
        $_SESSION['mode_twoAuth'] = 1;
      } else {
        $_SESSION['id_twoAuth'] = $row['id'];
        $_SESSION['mode_twoAuth'] = 2;
      }
      redirect($parent_url . '/v2/authentication');
    } else {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['info'] = 'Login successful';
      login_log($email, $password, $status, $mode, $user_id, $source_id, $status_info);

      redirect($parent_url . '/account/user');
    }

  
 //   }
 
  } else {
    $_SESSION['error'] = $status_info = 'User not account not found! Sign up to login.';
    unset($_SESSION['access_token']);
    login_log($email, $password, $status, $mode, $user_id, $source_id, $status_info);
    redirect($parent_url . '/v2/new');
  }



}
?>