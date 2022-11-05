<?php
//redirect function

////////////
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY_2', $subcriber_consumer_key);
define('CONSUMER_SECRET_2', $subcriber_consumer_secret);
define('OAUTH_CALLBACK_2', $tw_url);
//define('oauth_token', '842987337353052160-LL8z2AHxYRP7lHo8iDaq8cLNzeSu8OP');
//define('oauth_token_secret', '6eZZno5qC6d8E5Gtc9jakmhEgvP07F3MfxOBwJ5ysLm8x');

//access token
if (isset($_REQUEST['oauth_verifier'], $_REQUEST['oauth_token']) && $_REQUEST['oauth_token'] == $_SESSION['oauth_token']) {			   //In project use this session to change login header after successful login 
	$request_token = [];
	$request_token['oauth_token'] = $_SESSION['oauth_token'];
	$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];
	$connection = new TwitterOAuth(CONSUMER_KEY_2, CONSUMER_SECRET_2, $request_token['oauth_token'], $request_token['oauth_token_secret']);
	$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
	$_SESSION['subscribe_token'] = $access_token;
	// redirect user back to index page
	//header("location:index.php");
}
//////////////////////////
if (!isset($_SESSION['subscribe_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY_2, CONSUMER_SECRET_2);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK_2));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$sub_url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
} else {
	$access_token = $_SESSION['subscribe_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY_2, CONSUMER_SECRET_2, $access_token['oauth_token'], $access_token['oauth_token_secret']);

 // echo json_encode($google_account_info);
  ////////////////////////////////////////////////////////////////////////////////////////
  //*
  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM client_api WHERE user_id=:user_id");
$stmt->execute(['user_id'=>$user['id']]);
$row = $stmt->fetch();
if($row['numrows'] < 6){

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM client_api WHERE user_id=:user_id AND status=:status");
        $stmt->execute(['user_id' => $user['id'], 'status' => 1]);
        $data = $stmt->fetch();
        if ($data['numrows'] > 0) {
            $stmt = $conn->prepare("UPDATE client_api SET status=:status WHERE id=:id");
            $stmt->execute(['id' => $data['id'], 'status' => 0]);
        }

        $stmt = $conn->prepare("INSERT INTO client_api (title, user_id, consumer_key, consumer_secret, bearer_token, access_token, access_secret, level, status) VALUES (:title, :user_id, :consumer_key, :consumer_secret, :bearer_token, :access_token, :access_secret, :level, :status)");
        $stmt->execute(['title' => $app['title'], 'user_id' => $user['id'], 'consumer_key' => $app['consumer_key'], 'consumer_secret' => $app['consumer_secret'], 'bearer_token' => $app['bearer_token'], 'access_token' => $access_token['oauth_token'], 'access_secret' => $access_token['oauth_token_secret'], 'level' => 1, 'status' => 1]);

        $_SESSION['success'] = 'Account successfully linked';
        unset($_SESSION['subscribe_token']);
        redirect($parent_url . '/account/settings');
  
  }else{
      $_SESSION['error'] = 'Max app subscriptions limit reached!';
      unset($_SESSION['subscribe_token']);
          redirect($parent_url.'/account/settings');
  }
  //*/
  ////////////////////////////////////////////////////////////////////////////////////////
  


}
?>