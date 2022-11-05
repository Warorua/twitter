<?php


use UtxoOne\TwitterUltimatePhp\Clients\TweetClient;
use UtxoOne\TwitterUltimatePhp\Clients\UserClient;
use UtxoOne\TwitterUltimatePhp\Clients\ListClient;
use UtxoOne\TwitterUltimatePhp\Clients\SpaceClient;
use Coderjerk\BirdElephant\BirdElephant;
use Abraham\TwitterOAuth\TwitterOAuth;
use Noweh\TwitterApi\Client;
use Noweh\TwitterApi\Enum\Modes;

$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM client_api WHERE user_id=:user_id AND status=:status");
$stmt->execute(['user_id' => $user['id'], 'status'=>1]);
$api_app = $stmt->fetch();
if ($api_app['numrows'] < 1) {
  if (isset($_SESSION['access_token'])) {

    define('CONSUMER_KEY', $system['consumer_key']);
    define('CONSUMER_SECRET', $system['consumer_secret']);
    $access_token = $_SESSION['access_token'];
  
    $client = new TweetClient(bearerToken: $system['bearer_token']);
  
  
    $credentials_be = array(
      'consumer_key' => $system['consumer_key'],
      'consumer_secret' => $system['consumer_secret'],
      'bearer_token' => $system['bearer_token'],
      'auth_token' => '', // OAuth 2.0 auth token
      'token_identifier' => $access_token['oauth_token'],
      'token_secret' => $access_token['oauth_token_secret'],
    );
  
    $tweet_client = new TweetClient(
      apiKey: $system['consumer_key'],
      apiSecret: $system['consumer_secret'],
      accessToken: $access_token['oauth_token'],
      accessSecret: $access_token['oauth_token_secret'],
      bearerToken: $system['bearer_token']
    );
  
  
    $user_client = new UserClient(
      apiKey: $system['consumer_key'],
      apiSecret: $system['consumer_secret'],
      accessToken: $access_token['oauth_token'],
      accessSecret: $access_token['oauth_token_secret'],
      bearerToken: $system['bearer_token']
    );
  
    $list_client = new ListClient(
      apiKey: $system['consumer_key'],
      apiSecret: $system['consumer_secret'],
      accessToken: $access_token['oauth_token'],
      accessSecret: $access_token['oauth_token_secret'],
      bearerToken: $system['bearer_token']
    );
  
    $space_client = new SpaceClient(
      apiKey: $system['consumer_key'],
      apiSecret: $system['consumer_secret'],
      accessToken: $access_token['oauth_token'],
      accessSecret: $access_token['oauth_token_secret'],
      bearerToken: $system['bearer_token']
    );
  
  
    $abraham_client = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
    $bird_elephant = new BirdElephant($credentials_be);
  
    $settings = [
      'account_id' => $user['t_id'],
      'consumer_key' => $system['consumer_key'],
      'consumer_secret' => $system['consumer_secret'],
      'bearer_token' => $system['bearer_token'],
      'access_token' => $access_token['oauth_token'],
      'access_token_secret' => $access_token['oauth_token_secret']
    ];
    $noweh_client = new Client($settings);
  
  
    $t_user = $user_client->getUserById($user['t_id']);
  }
  
} else {
  $api_consumer_key = $api_app['consumer_key'];
  $api_consumer_secret = $api_app['consumer_secret'];
  $api_bearer_token = $api_app['bearer_token'];
  $api_access_token = $api_app['access_token'];
  $api_access_secret = $api_app['access_secret'];
  $api_app_status = $api_app['status'];
  $api_app_level = $api_app['level'];
  
   // define('CONSUMER_KEY', $api_consumer_key);
   // define('CONSUMER_SECRET', $api_consumer_secret);
   // $access_token = $_SESSION['access_token'];
  
    $client = new TweetClient(bearerToken:  $api_bearer_token);
  
  
    $credentials_be = array(
      'consumer_key' => $api_consumer_key,
      'consumer_secret' => $api_consumer_secret,
      'bearer_token' =>  $api_bearer_token,
      'auth_token' => '', // OAuth 2.0 auth token
      'token_identifier' => $api_access_token,
      'token_secret' => $api_access_secret,
    );
  
    $tweet_client = new TweetClient(
      apiKey: $api_consumer_key,
      apiSecret: $api_consumer_secret,
      accessToken: $api_access_token,
      accessSecret: $api_access_secret,
      bearerToken:  $api_bearer_token
    );
  
  
    $user_client = new UserClient(
      apiKey: $api_consumer_key,
      apiSecret: $api_consumer_secret,
      accessToken: $api_access_token,
      accessSecret: $api_access_secret,
      bearerToken:  $api_bearer_token
    );

    // $user_client = new UserClient(
    //   apiKey: 'nsLZN64t31iUV39nqPgioyzsd',
    //   apiSecret: 'U5SSjztJsfXq89v1RWF6pRik1xCxibvnoDNQP6f6HaZzmYnDy8',
    //   accessToken: '1377367159253434374-cXjJiUp2jC2kHJFYRpNBt5h2BslxYf',
    //   accessSecret: '05Z6A9RLpnOHcQLiVzu6OAqh10B3FS3KT8fLBsQ2V34ap',
    //   bearerToken:  'AAAAAAAAAAAAAAAAAAAAAKzqhAEAAAAAPWvo1WjNaX%2FkP3airEoAwrNgX38%3DaTP7AtoOb2PGI7eeZEKjmqhaNLIy3z0Pd1O3UMH21Wmfr5fB0R'
    // );
  
    $list_client = new ListClient(
      apiKey: $api_consumer_key,
      apiSecret: $api_consumer_secret,
      accessToken: $api_access_token,
      accessSecret: $api_access_secret,
      bearerToken:  $api_bearer_token
    );
  
    $space_client = new SpaceClient(
      apiKey: $api_consumer_key,
      apiSecret: $api_consumer_secret,
      accessToken: $api_access_token,
      accessSecret: $api_access_secret,
      bearerToken:  $api_bearer_token
    );
  
  
    $abraham_client = new TwitterOAuth($api_consumer_key, $api_consumer_secret, $api_access_token, $api_access_secret);
    $bird_elephant = new BirdElephant($credentials_be);
  
    $settings = [
      'account_id' => $user['t_id'],
      'consumer_key' => $api_consumer_key,
      'consumer_secret' => $api_consumer_secret,
      'bearer_token' =>  $api_bearer_token,
      'access_token' => $api_access_token,
      'access_token_secret' => $api_access_secret
    ];
    $noweh_client = new Client($settings);
  
  if($api_app_level == 1){
    $stmt = $conn->prepare("SELECT * FROM api_shop LEFT JOIN client_api ON api_shop.app_id=client_api.id WHERE consumer_key=:consumer_key");
    $stmt->execute(['consumer_key'=>$api_consumer_key]);
    $new_charge = $stmt->fetch();
    $charge = array('tweet_charge'=>$new_charge['tweet_charge'], 'follow_charge'=>$new_charge['follow_charge'], 'like_charge'=>$new_charge['like_charge']);
  }
   
  
}

$t_user = $user_client->getUserById($user['t_id']);

if (file_exists('../includes/functions.php')) {
  include_once '../includes/functions.php';
} elseif (file_exists('../../includes/functions.php')) {
  include_once '../../includes/functions.php';
} elseif (file_exists('../../../includes/functions.php')) {
  include_once '../../../includes/functions.php';
}



if (!isset($_GET['bot_id'])) {
  $user_metrics = user_metrics($user['t_id']);
  //Warning: Array to string conversion in C:\xamppp\htdocs\twitter\includes\api_config.php on line 395

  if (isset($access_token['oauth_token'])) {
    if ($user['access_token'] == '') {
      $conn = $pdo->open();
      $stmt = $conn->prepare("UPDATE users SET access_token=:access_token, access_secret=:access_secret WHERE id=:id");
      $stmt->execute(['access_token' => $access_token['oauth_token'], 'access_secret' => $access_token['oauth_token_secret'], 'id' => $user['id']]);
    }
  }



  if ($user['p_cipher'] == 0) {
    $user_points = floatval($user['p_value']);
  } else {
    $user_points = floatval(safeDecrypt($user['p_value'], $user['p_key']));
  }
}

?>
