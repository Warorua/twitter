<?php

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<HTML lang="en">
<head>
 <title>Login with Twitter demo for PHP websites</title> 
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body,html {height:100%; width:100%; margin:0; padding:0;}
#main {background-image:url("imgs/bg.jpeg"); background-size:cover;
height:780px; margin:0; top:0;
}
#second {background-color: aliceblue;
color:black;
margin:10px;
padding:10px;
border:1px solid gray;

}
#loginbtn {text-align : center;
margin-top:30px; }

</style>


</head>
<body>
<div id="main">
<div id="second">

<?php


require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY', $system['consumer_key']);
define('CONSUMER_SECRET', $system['consumer_secret']);
define('OAUTH_CALLBACK', $parent_url.'/auth/tww/index.php');
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
	//echo $url;
       echo "<div id='loginbtn'>";
      echo "<h2>Login with your Twitter account!</h2>";
	echo "<a href='$url'><img src='twitter-login-blue.png' style='margin-left:4%; margin-top: 4%' width:100px; height:30px'></a>";
        echo "</div>";
      //  $_SESSION['access_token'] = '';  
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	//$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_GET['oauth_token'], $_GET['oauth_verifier']);
     $user = $connection->get("account/verify_credentials", ['include_email' => 'true']);
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
      echo "<a href='logout.php'>Log out</a>";

      echo "<hr>";
       echo "<b>User profile property :</b><br>";
    //	print_r($user);	
    echo json_encode($user);
     session_destroy();						//These are the sets of data you will be getting from Twitter 												Database 
}
?>
</div>
</div>
</body>
</html>