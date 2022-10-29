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

    /*
//    $user1 = $connection->get("https://api.twitter.com/1.1/account/verify_credentials.json", ['include_email' => true]);
    echo "<img src='$user->profile_image_url'>";echo "<br>";		//profile image twitter link
    echo $user->name;echo "<br>";
    echo "<b>Location :</b>"; 									//Full Name
    echo $user->location;echo "<br>";
    echo "<b>Screen name :</b>";								//location
    echo $user->screen_name;echo "<br>";
    echo "<b>Followers : </b>" ;
     echo $user->followers_count; echo "<br>";

echo "<b>Following : </b>" ;
     echo $user->friends_count; echo "<br>";
echo "<b>Tweets : </b>" ;
     echo $user->statuses_count; echo "<br>";
    echo "<b>Account created on :</b>";									//username
    echo $user->created_at;echo "<br>";
    echo "<b>Account id :</b>";									//username
    echo $user->id;echo "<br>";
    echo "<b>Account email :</b>";									//username
    echo $user->email;echo "<br>";
    echo "<b>Account address :</b>";									//username
    echo $user->location;echo "<br>";
    echo "<b>Account verification :</b>";									//username
    echo $user->verified;echo "<br>";
    echo "<b>Account suspension :</b>";									//username
    echo $user->suspended;echo "<br>";
//    echo $user->profile_image_url;echo "<br>";
      echo "<a href='logout'>Log out</a>";

      echo "<hr>";
       echo "<b>User profile property :</b><br>";
    //	print_r($user);	
 //   echo json_encode($user);
   //  session_destroy();	
   //These are the sets of data you will be getting from Twitter 												Database 
*/
//insertion to db process

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
$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE t_id=:t_id");
$stmt->execute(['t_id'=>$t_id]);
$row = $stmt->fetch();
if($row['numrows'] > 0){
     $_SESSION['error'] = 'User already registered. Login instead.';
          unset($_SESSION['access_token']);
     redirect($parent_url.'/auth/sign-up.php');

}elseif($suspension == TRUE){
$_SESSION['error'] = 'This account has been banned and cannot be used!';
    unset($_SESSION['access_token']);
redirect($parent_url.'/auth/sign-up.php');
}else{
    $stmt = $conn->prepare("INSERT INTO users (username, address, verified, source, email, firstname, lastname, photo, t_id, status, type, created_on, p_value) VALUES (:username, :address, :verified, :source, :email, :firstname, :lastname, :photo, :t_id, :status, :type, :created_on, :p_value)");
  $stmt->execute(['username'=>$username, 'address'=>$address, 'verified'=>$verified, 'source'=>$source, 'email'=>$email, 'firstname'=>$firstname, 'lastname'=>$lastname, 'photo'=>$photo, 't_id'=>$t_id, 'status'=>$status, 'type'=>$type, 'created_on'=>$create_on, 'p_value'=>500]);
 $_SESSION['user_id'] = $conn->lastInsertId();
 $_SESSION['success'] =  'Welcome! Registration successful.';

 redirect('../account/user');

}
}
?>