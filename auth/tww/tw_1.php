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
 
 //check whether email is related to other account
 $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE username=:username");
$stmt->execute(['username'=>$username]);
$row = $stmt->fetch();
if($row['numrows'] > 0){
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
    $stmt->execute(['username'=>$username]);
    $row = $stmt->fetch();  
    
    if($row['source'] == 'G0'){
     $_SESSION['error'] = 'User already registered with Google.';
     unset($_SESSION['access_token']);
     redirect($parent_url.'/v2/new');
    
    }elseif($row['source'] == 'F0'){
        $_SESSION['error'] = 'User already registered with Facebook.';
        unset($_SESSION['access_token']);
        redirect($parent_url.'/v2/new');
    }else{
        $_SESSION['error'] = 'User already registered. Login instead.';
        unset($_SESSION['access_token']);
        redirect($parent_url.'/v2/new');
    }
}
    ////////////////////////////////////////////////////////////////////////////////////////

    //insert data into db
    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE t_id=:t_id");
    $stmt->execute(['t_id' => $t_id]);
    $row = $stmt->fetch();
    if ($row['numrows'] > 0) {
        $_SESSION['error'] = 'User already registered. Login instead.';
        unset($_SESSION['access_token']);
        redirect($parent_url . '/v2/new');
    } elseif ($suspension == TRUE) {
        $_SESSION['error'] = 'This account has been banned and cannot be used!';
        unset($_SESSION['access_token']);
        redirect($parent_url . '/v2/new');
    } else {

        if (isset($_SESSION['refererId'])) {
            $referer_id = $_SESSION['refererId'];

            $stmt = $conn->prepare("SELECT * FROM user_earnings WHERE user_id=:user_id");
            $stmt->execute(['user_id' => $referer_id]);
            $ref_dt = $stmt->fetch();

            $refer_pts = (int)$ref_dt['refer'] + 100;

            $stmt = $conn->prepare("UPDATE user_earnings SET refer=:refer WHERE user_id=:user_id");
            $stmt->execute(['user_id' => $referer_id, 'refer' => $refer_pts]);
        } else {
            $referer_id = '';
        }

        if (isset($_SERVER['GEOIP_CITY_COUNTRY_NAME'])) {
            if ($_SERVER['GEOIP_CITY_COUNTRY_NAME'] != '' || !empty($_SERVER['GEOIP_CITY_COUNTRY_NAME'])) {
                $country = $_SERVER['GEOIP_CITY_COUNTRY_NAME'];
            } else {
                $country = '';
            }
        } else {
            $country = '';
        }
       

        $stmt = $conn->prepare("INSERT INTO users (country, username, address, verified, source, email, firstname, lastname, photo, t_id, status, type, created_on, p_value, referer_id) VALUES (:country, :username, :address, :verified, :source, :email, :firstname, :lastname, :photo, :t_id, :status, :type, :created_on, :p_value, :referer_id)");
        $stmt->execute(['country'=>$country, 'username' => $username, 'address' => $address, 'verified' => $verified, 'source' => $source, 'email' => $email, 'firstname' => $firstname, 'lastname' => $lastname, 'photo' => $photo, 't_id' => $t_id, 'status' => $status, 'type' => $type, 'created_on' => $create_on, 'p_value' => 500, 'referer_id'=>$referer_id]);
        $_SESSION['user_id'] = $conn->lastInsertId();
        $_SESSION['success'] =  'Welcome! Registration successful.';

        redirect('../account/user');
    }
}
?>