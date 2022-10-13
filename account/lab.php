<?php

namespace Noweh\TwitterApi\Test;

$start_time = microtime(true);
require '../vendor/autoload.php';



use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;
use Noweh\TwitterApi\Client;
use Noweh\TwitterApi\Enum\Modes;

include '../includes/conn.php';
include '../includes/session.php';

use Noweh\TwitterApi\Enum\Operators;
use Coderjerk\BirdElephant\BirdElephant;

use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'DU8WwngUfNBX5rMSObL8stCe4');
define('CONSUMER_SECRET', 'krTyx7HEoBViLv9UQXOvzkAy1nRv9OwIf342TvuWIIGQtOsWDp');
define('OAUTH_CALLBACK', 'http://localhost/twitter/auth/sign-in.php');

$settings = [
  'account_id' => $user['t_id'],
  'consumer_key' => 'DU8WwngUfNBX5rMSObL8stCe4',
  'consumer_secret' => 'krTyx7HEoBViLv9UQXOvzkAy1nRv9OwIf342TvuWIIGQtOsWDp',
  'bearer_token' => 'AAAAAAAAAAAAAAAAAAAAABAchwEAAAAAli5UGS%2BxFqbbuUFbw41JPTwNYDI%3DnQgG3ZT8yAi1wWGIoegX43gNMT2QZeh26YQR5m27Ef2vveCNvr',
  'access_token' => '1377367159253434374-D9ps3Z81KlO4SKNUxIIL7lI82P5znZ',
  'access_token_secret' => 'CeUSSoaxaJOzqLoWY86Yr2bXBcmU5YpAx8wuKbvU1tZJT'
];


$access_token = $_SESSION['access_token'];

$abraham_client = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);









$noweh_client = new Client($settings);

//your credentials, should be passed in via $_ENV or similar, don't hardcode.
$credentials_be = array(
  'consumer_key' => 'DU8WwngUfNBX5rMSObL8stCe4',
  'consumer_secret' => 'krTyx7HEoBViLv9UQXOvzkAy1nRv9OwIf342TvuWIIGQtOsWDp',
  'bearer_token' => 'AAAAAAAAAAAAAAAAAAAAABAchwEAAAAAli5UGS%2BxFqbbuUFbw41JPTwNYDI%3DnQgG3ZT8yAi1wWGIoegX43gNMT2QZeh26YQR5m27Ef2vveCNvr',
  // 'bearer_token' => '',
  // if using oAuth 2.0 with PKCE
  'auth_token' => $access_token['oauth_token'], // OAuth 2.0 auth token
  // 'auth_token' => '1377367159253434374-D9ps3Z81KlO4SKNUxIIL7lI82P5znZ', // OAuth 2.0 auth token
  //if using oAuth 1.0a
  'token_identifier' => '1486283642192252931-M114cW9xZ2KFUBfQp2dY3CVLy0CpR0',
  //'token_secret' => $access_token['oauth_token_secret'],
  'token_secret' => 'HFb4nuxNqthauOCJpq8BX4T9bXmViOwMs5CyuCPm5vkG0',
);

//instantiate the object
$bird_elephant = new BirdElephant($credentials_be);


///////////////////////////////////////////////////////////////////////////////////////////////////
use UtxoOne\TwitterUltimatePhp\Clients\TweetClient;
use UtxoOne\TwitterUltimatePhp\Clients\UserClient;

$tweet_client = new TweetClient(
  apiKey: 'DU8WwngUfNBX5rMSObL8stCe4',
  apiSecret: 'krTyx7HEoBViLv9UQXOvzkAy1nRv9OwIf342TvuWIIGQtOsWDp',
  accessToken: $access_token['oauth_token'],
  accessSecret: $access_token['oauth_token_secret'],
  bearerToken: 'AAAAAAAAAAAAAAAAAAAAABAchwEAAAAAli5UGS%2BxFqbbuUFbw41JPTwNYDI%3DnQgG3ZT8yAi1wWGIoegX43gNMT2QZeh26YQR5m27Ef2vveCNvr'

);

$user_client = new UserClient(
  apiKey: 'DU8WwngUfNBX5rMSObL8stCe4',
  apiSecret: 'krTyx7HEoBViLv9UQXOvzkAy1nRv9OwIf342TvuWIIGQtOsWDp',
  accessToken: $access_token['oauth_token'],
  accessSecret: $access_token['oauth_token_secret'],
  bearerToken: 'AAAAAAAAAAAAAAAAAAAAABAchwEAAAAAli5UGS%2BxFqbbuUFbw41JPTwNYDI%3DnQgG3ZT8yAi1wWGIoegX43gNMT2QZeh26YQR5m27Ef2vveCNvr'

);

//////////////////////////////////////////////////////////////////////////////////////////////////////
/*
/////////////////////////POST TWEET
$return = $tweet_client->tweet()->performRequest('POST', ['text' => 'This is a test....']);
*/





//*
//////////////////User mentioning
$return = $noweh_client->timeline()->findRecentMentioningForUserId('1577321598155096064')->performRequest();

$returnn = json_encode($return, TRUE);
$returne = json_decode($returnn, TRUE);

/*
foreach($returne['data'] as $row){
  echo '<b>edit_history_tweet_ids: </b>'.$row['edit_history_tweet_ids'][0].'<br/>';
  echo '<b>id: </b>'.$row['id'].'<br/>';
 echo $row['text'].'<br/><br/><br/>';
}
//*/




$tweet_id = '1574675585166630913';
/*
////////////////get tweet

$result = $tweet_client->tweet()->performRequest('GET', array( 'id' => $tweet_id));

echo json_encode($result);
*/



/*
///////////////////get a user's followers
$followers = $bird_elephant->user('coderjerk')->followers([
  'max_results' => 20,
  'user.fields' => 'profile_image_url'
]);
echo json_encode($followers);
*/



/*
/////////////////get tweet likers
$tweets = $bird_elephant->tweets();

$t_tweets = $tweets->likers($tweet_id);
echo json_encode($t_tweets);
*/


/*
/////////////////get tweet retweeters
$tweets = $bird_elephant->tweets();
$r_tweets = $tweets->retweeters($tweet_id);
echo json_encode($r_tweets);
*/



/*
/////UPLOADER WITH IMAGE/////////////////////
/////////////////////////////upload message and 2 images
$media1 = $abraham_client->upload('media/upload', ['media' => '../assets/media/avatars/300-1.jpg']);
$media2 = $abraham_client->upload('media/upload', ['media' => '../assets/media/avatars/300-2.jpg']);
$parameters = [
    'status' => 'Meow Meow Meow',
    'media_ids' => implode(',', [$media1->media_id_string, $media2->media_id_string])
];
$result = $abraham_client->post('statuses/update', $parameters);

/////////////////////////////upload message and 1 images
$media1 = $abraham_client->upload('media/upload', ['media' => '../assets/media/avatars/300-1.jpg']);
$parameters = [
    'status' => 'My ooh my',
    'media_ids' => implode(',', [$media1->media_id_string])
];
$result = $abraham_client->post('statuses/update', $parameters);
*/





/*
$users = $bird_elephant->users();


$me = $bird_elephant->me();
$params = [
  'expansions' => 'profile_image_url',
];

echo $me->myself($params);
*/




$tweet_id = '1577037297454718976';


/*
/////////////////lookup user
$users = $bird_elephant->users();
$usernames = ['coderjerk', 'kennyg', 'dril'];
$params = [
    'expansions' => 'pinned_tweet_id',
    'user.fields' =>  'created_at,description,entities,id,location'
];
$user_look = $users->lookup($usernames, $params);
echo json_encode($user_look);
*/





/*
////////////////get followers of a user
$params= [
  'max_results' => 20,
  'user.fields' => 'profile_image_url'
];
$user = $bird_elephant->user('coderjerk');
$me = $user->followers($params);
echo json_encode($me);
*/
function user_tweets($username, int $number)
{
  global $bird_elephant;
  $user = $bird_elephant->user($username);
  $params = [
    'max_results' => $number,
  ];
  $tweet = $user->tweets($params);
  $val_1 = json_encode($tweet, TRUE);
  $val_2 = json_decode($val_1, TRUE);

  return $val_2;
}

function number_format_short($n, $precision = 1)
{
  if ($n < 900) {
    // 0 - 900
    $n_format = number_format($n, $precision);
    $suffix = '';
  } else if ($n < 900000) {
    // 0.9k-850k
    $n_format = number_format($n / 1000, $precision);
    $suffix = 'K';
  } else if ($n < 900000000) {
    // 0.9m-850m
    $n_format = number_format($n / 1000000, $precision);
    $suffix = 'M';
  } else if ($n < 900000000000) {
    // 0.9b-850b
    $n_format = number_format($n / 1000000000, $precision);
    $suffix = 'B';
  } else {
    // 0.9t+
    $n_format = number_format($n / 1000000000000, $precision);
    $suffix = 'T';
  }
  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
  if ($precision > 0) {
    $dotzero = '.' . str_repeat('0', $precision);
    $n_format = str_replace($dotzero, '', $n_format);
  }
  return $n_format . $suffix;
}


function tweet($id)
{
  global $abraham_client;
  $abraham_client->setApiVersion('2');
  $data = $abraham_client->get('tweets', [
    'ids' => $id,
    'expansions' => 'attachments.media_keys',
    'media.fields' => 'preview_image_url',
    'media.fields' => 'url',

  ]);
  $val_1 = json_encode($data, TRUE);
  $val_2 = json_decode($val_1, TRUE);

  return $val_2;
}

function tweet_video($id)
{
  global $abraham_client;
  $abraham_client->setApiVersion('2');
  $data = $abraham_client->get('tweets', [
    'ids' => $id,
    'expansions' => 'attachments.media_keys',
    'media.fields' => 'variants',

  ]);
  $val_1 = json_encode($data, TRUE);
  $val_2 = json_decode($val_1, TRUE);

  return $val_2;
}

function user_followers($username, $number)
{
  global $bird_elephant;
  $followers = $bird_elephant->user($username)->following([
    'max_results' => $number,
    'user.fields' => 'profile_image_url'
  ]);
  $val_1 = json_encode($followers, TRUE);
  $val_2 = json_decode($val_1, TRUE);

  return $val_2;
}

function user_following($username, $number)
{
  global $bird_elephant;
  $following = $bird_elephant->user($username)->following([
    'max_results' => $number,
    'user.fields' => 'profile_image_url'
  ]);
  $val_1 = json_encode($following, TRUE);
  $val_2 = json_decode($val_1, TRUE);

  return $val_2;
}

function array_convert($array)
{
  $val_1 = json_encode($array, TRUE);
  $val_2 = json_decode($val_1, TRUE);

  return $val_2;
}

function liking_users($id){
  global $tweet_client;
  $likers = $tweet_client->getLikingUsers($id);

  $data = array_convert($likers);

  return $data;

}

function retweeting_users($id){
  global $tweet_client;
  $retweeting = $tweet_client->getRetweetedByUsers($id);

  $data = array_convert($retweeting);

  return $data;

}

function get_followers($id){
  global $user_client;
  $followers = $user_client->getFollowers($id);

  $data = array_convert($followers);

  return $data;

}

function get_following($id){
  global $user_client;
  $following = $user_client->getFollowing($id);

  $data = array_convert($following);

  return $data;

}

function where_quoted($id){
  global $tweet_client;
  $where_quoted = $tweet_client->getQuoteTweets($id);

  $data = array_convert($where_quoted);

  return $data;

}

function liked_tweets($id){
  global $user_client;
  $liked_tweets = $user_client->getLikedTweets($id)->all();

  $data = array_convert($liked_tweets);

  return $data;

}

function user_mention($id){
  global $noweh_client;
  $return = $noweh_client->timeline()->findRecentMentioningForUserId($id)->performRequest();

  $data = array_convert($return);

  return $data;

}

function main_tweet($id){
  global $tweet_client;
  $tweet = array_convert($tweet_client->getTweet($id));

  $twt = $tweet['data']['referenced_tweets'][0]['id'];

  return $twt;
}
///////////////////////////////////////////
function user_metrics($id)
{
  global $user_client;
  $user_metrics = array_convert($user_client->getUserById($id));

  return $user_metrics;
}

function pic_fix($img)
{
  $ext = pathinfo($img, PATHINFO_EXTENSION);
  $variable = substr($img, 0, strpos($img, "normal." . $ext));
  $img = $variable . '400x400.' . $ext;
  return $img;
}

//////////////////////////////////////////////////////
function like_tweet($auth_user, $tweet_id)
{
  global $tweet_client;
  $statues = $tweet_client->likeTweet($auth_user, $tweet_id);

  $res = array_convert($statues);

  return $res;
}

function unlike_tweet($auth_user, $tweet_id)
{
  global $tweet_client;
  $statues = $tweet_client->unlikeTweet($auth_user, $tweet_id);

  $res = array_convert($statues);

  return $res;
}

function tweet_reply_liker($auth_user, $tweet_with_replies, $limit)
{
  global $abraham_client;
  $abraham_client->setApiVersion('2');
  $data = $abraham_client->get('tweets/search/recent', [
    "query" => 'in_reply_to_status_id:' . $tweet_with_replies,
    "max_results" => $limit,
    'tweet.fields' => 'conversation_id',

  ]);
  $dt_2 = array_convert($data);
  $response = '';
  foreach ($dt_2['data'] as $row) {
    $response .= like_tweet($auth_user, $row['id']) . '</br>';
  }
  return json_encode($response);
}

function tweet_reply_retweeter($auth_user, $tweet_with_replies, $limit)
{
  global $abraham_client;
  global $tweet_client;
  $abraham_client->setApiVersion('2');
  $data = $abraham_client->get('tweets/search/recent', [
    "query" => 'in_reply_to_status_id:' . $tweet_with_replies,
    "max_results" => $limit,
    'tweet.fields' => 'conversation_id',

  ]);
  $dt_2 = array_convert($data);
  $response = '';
  foreach ($dt_2['data'] as $row) {
    //$response .= like_tweet($auth_user, $row['id']). '</br>';
    $response .= $tweet_client->retweet($auth_user, $row['id']);
  }
  return json_encode($response);
}

function follow($account_id_to_follow)
{
  global $user_client;
  global $user;
  $data = $user_client->follow($user['t_id'], $account_id_to_follow);

  return array_convert($data);
}

function tweet_2($id)
{
  global $abraham_client;
  $abraham_client->setApiVersion('2');
  $data = $abraham_client->get('tweets', [
    'ids' => $id,
    'expansions' => 'attachments.media_keys',
    'media.fields' => 'preview_image_url',
    'media.fields' => 'url',

  ]);
  $val_1 = json_encode($data, TRUE);
  $val_2 = json_decode($val_1, TRUE);

  return $val_2;
}

/*
////////////////get tweets of a user
$user = $bird_elephant->user('coderjerk');
$me = $user->tweets();
echo json_encode($me);
*/







/*
////////////replier UNAUTHENTICATED
//build a reply object with the id of the tweet to reply to
$reply = (new \Coderjerk\BirdElephant\Compose\Reply)->inReplyToTweetId('1559195105290076160');

$tweet = (new \Coderjerk\BirdElephant\Compose\Tweet)->text('Agreed, Bird Elephant is the best twitter API v2 php library.')
    ->reply($reply);
echo json_encode($tweet);
    */




/*
/////////////////////////////RETWEET
    $return = $tweet_client->retweet()->performRequest('POST', ['tweet_id' => '1576856912473243648']);
*/




/*
///////////////LIKE a TWEET
$abraham_client->setApiVersion('2');

$statues = $abraham_client->post("users/:id", ['id' => '1377367159253434374', 'users.tweet_id' => '1577074293438980097',]);
echo json_encode($statues);
*/
//
/*
$user = $user_client->getUserByUsername('jack');
$tweet = $user_client->follow($user->getId());
*/
//echo $url;


//$tweet = $tweet_client->likeTweet($user['t_id'], '1577308147190226944');



/*
$tweet = $tweet_client->tweet('Just in... Soma Label... #KenyanOnTwitter');
echo json_encode($tweet);
*/

//$data = user_followers('Kenyans');

//echo json_encode($data);

/*
foreach ($data['data'] as $row) {
  $user = $user_client->getUserByUsername($row['username']);
 
 // $tweets = user_tweets($row['username']);

  if ($user->getPinnedTweetId() != NULL
  ) {
    $tweet = $tweet_client->getTweet($user->getPinnedTweetId());

    echo '<b>User: </b>' . $row['username'] . '<br/>';
    echo '<b>CreatedAt: </b>' . $tweet->getCreatedAt() . '<br/>';
    echo '<b>Source: </b>' . $tweet->getSource() . '<br/>';
    echo '<b>Text: </b>' . $tweet->getText() . '<br/>';
    echo '<b>Id: </b>' . $tweet->getId() . '<br/><br/><br/><br/><br/>';
  }
}
*/

/*
echo '<link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
<link
  href="https://unpkg.com/@videojs/themes@1/dist/city/index.css"
  rel="stylesheet"
/>';
$tweets = user_tweets('kot__agent', 5);

foreach ($tweets['data'] as $row) {
$img_c = 0;
  $data = tweet($row['id']);


  $metr_1 = $tweet_client->getTweet($row['id']);
  $metr_2 = json_encode($metr_1, TRUE);
  $data2 = json_decode($metr_2, TRUE);


  foreach ($data['data'] as $row_2) {
    echo '<b>Text: </b>' . $row_2['text'] . '<br/>';
    echo '<b>Id: </b>' . $row_2['id'] . '<br/>';
  }

  if (isset($data['includes'])) {
    foreach ($data['includes']['media'] as $row_3) {
      echo '<b>Type: </b>' . $row_3['type'] . '<br/>';
      echo '<b>media key: </b>' . $row_3['media_key'] . '<br/>';
      if ($row_3['type'] != 'photo') {
        $data_2 = tweet_video($row['id']);
        foreach ($data_2['includes']['media'] as $row_4) {
        
        }
      } else {
        $img_c += 1;
        echo '<b>Image: </b><img src="' . $row_3['url'] . '" width="250px" /><br/>';
      }
    }
  }
  echo '<b>Likes: </b>' . $data2['data']['public_metrics']['like_count'] . '<br/>';
  echo '<b>Retweets: </b>' . $data2['data']['public_metrics']['retweet_count'] . '<br/>';
  echo '<b>Replies: </b>' . $data2['data']['public_metrics']['reply_count'] . '<br/>';
  echo '<b>Quote: </b>' . $data2['data']['public_metrics']['quote_count'] . '<br/>';
  echo '<b>Source: </b>' . $data2['data']['source'] . '<br/>';
  echo '<b>Created: </b>' . $data2['data']['created_at'] . '<br/>';
  echo $img_c;
  echo '<br/><br/><br/><br/><br/>';

}
//*/

//$data = user_tweets('Kenyans');

//$data = $tweet_client->getTweet('1577532163263791106');

/*
$user = $bird_elephant->tweets();
$params= [
//  'max_results' => 10,
 'tweet.fields' => 'attachments.media_keys',
 //'attachments.media_keys',
 //'tweet.fields' => 'includes',
 'media.fields' => 'includes',
  'media.fields' => 'preview_image_url',
  
];
$data = $user->get('1263145271946551300', $params);
*/


/*
$abraham_client->setApiVersion('2');
$data = $abraham_client->get('tweets', [
  'ids' => 1578713797329813505,
 // 'expansions' => 'attachments.media_keys',
 // 'media.fields' => 'preview_image_url',
 // 'media.fields' => 'url',
 // 'tweet.fields' => 'non_public_metrics',
  //'tweet.fields' => 'organic_metrics',
 // 'tweet.fields' => 'public_metrics',
  //'tweet.fields' => 'source',
  //'tweet.fields' => 'created_at',
 // 'media.fields' => 'public_metrics',
 // 'media.fields' => 'alt_text',
 //'media.fields' => 'variants',
  
]);


//*/



//$data = $tweet_client->getTweet('1578713797329813505');
/*
$val_1 = json_encode($data, TRUE);
$val_2 = json_decode($val_1, TRUE);
foreach($val_2['data'] as $row){
  echo json_encode($row);
}
*/

//$data = $tweet_client->getInReplyToUserId();
//$user_mention = user_mention('1577321598155096064');

//$main_tweet_id = main_tweet('1578138245128495104');
//$user = user_metrics('1577321598155096064');
//$user = $user_client->getUserById('1577321598155096064');

//$data_1 = $data['data'][0]['id'];

//$twt = $data['data']['referenced_tweets'][0]['id'];


//$likers = liking_users($twt);

//$retweeters = retweeting_users($twt);

//$user = $user_client->getUserByUsername('utxo_one');
//$user = user_followers('utxo_one', 100);
//$followers = get_followers('124550698');
//$following = get_following('1577321598155096064');
//$quoted = where_quoted('1578372018101264384');
//$likedTweets = liked_tweets('124550698');
//$blocks = $user_client->getBlocks('1577321598155096064');
for($i = 0; $i<=0; $i++){
 // echo json_encode($following['data'][$i]).'</br>';
}
//foreach($following['data'] as $row){
//echo json_encode($row['verified']).'</br>';
//}


/*
if (isset($_GET['user'])) {
  if (is_numeric($_GET['user'])) {
    $abraham_client->setApiVersion('2');
    $statues = array_convert($abraham_client->get("users", ["ids" => $_GET['user']]));

    if (!isset($statues['data'])) {
      $user = 'Invalid User';
    } else {
      $user = 'Valid User';
    }
  }else{
    $user = 'Invalid User';
  }
} else {
  $user = 'Normal mode';
}
*/


/*
$dt = $user_client->getUserById('15846407');
$tweets = user_tweets($dt->getUsername(), 5);

$user = user_metrics('15846407');
*/


/*
if(isset($_GET['user'])){
 //$user = 'dthy';
 try{ 
  $user = $user_client->getUserById('2');
  // code that may throw an exception
} catch(Exception $e){
  echo 'THIS:'.$e->getMessage();
}
}else{
  $user = 'Normal mode';
}
*/



/*
$encryption_iv = $_SESSION['encryption_iv'] = substr(str_shuffle('123456789'), 0, 16);
$encryption_key = $_SESSION['encryption_key'] = substr(str_shuffle('123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 22);

function str_encrypt($data){
  global $encryption_iv;
  global $encryption_key;
  openssl_cipher_iv_length("AES-128-CTR");
  $encryption = openssl_encrypt($data, "AES-128-CTR", $encryption_key, 0, $encryption_iv);

  return  $encryption;
}
*/

//$user = str_encrypt('Alex');

//echo count($following['data']);
$variable = "https://pbs.twimg.com/profile_images/1478120772044574724/v-dDUYb7_normal.jpg";
//$variable = substr($variable, 0, strpos($variable, "normal.jpg"));
$ext = pathinfo($variable, PATHINFO_EXTENSION);

//$statuses = $abraham_client->get("search/tweets", ["q" => "twitterapi"]);

//$statuses = $abraham_client->get("statuses/home_timeline", ["count" => 5000, "exclude_replies" => false]);






/*
  $data = $abraham_client->get('statuses/user_timeline', [
    "count" => 50,
    'id' => '15846407',
   // 'max_results' => 10,
    //'media.fields' => 'preview_image_url',
    //'media.fields' => 'url',

  ]);
  //*/



/*
$abraham_client->setApiVersion('2');
  $data = $abraham_client->get('tweets/search/recent', [
    "query" => 'in_reply_to_status_id:1576856912473243648',
    "max_results" => 10,
   // 'id' => '1578426390990704640',
  'tweet.fields' => 'author_id',
 // 'user.fields' => 'created_at',
    //'media.fields' => 'preview_image_url',
    //'media.fields' => 'url',

  ]);

$dt_2 = array_convert($data);
  foreach($dt_2['data'] as $row){
    //$statues = like_tweet('1577321598155096064', $row['id']);
    //echo json_encode($statues).'</br>';
    //echo json_encode($row['id']).'</br>';
  }
//*/


//$statues = $abraham_client->post("users/:id", ['id' => '1577321598155096064', 'users.tweet_id' => '1578565919097655297',]);


//$statues = like_tweet('1577321598155096064', '1578623145044738048');

//$statues = unlike_tweet('1577321598155096064', '1578565919097655297');

//$data = tweet_reply_liker('1577321598155096064', '1578073827489320961', '50');

//$data = array_convert($tweet_client->getTweet('1578073827489320961'));

//echo json_encode($data['data']['public_metrics']['reply_count']);

function time_sub($date)
{
  $a = date_create($date);
  $b = date_create(date('Y-m-d H:i:s'));
  $interval = date_diff($a, $b);

  return $interval->format("%H");
}


//$return = $tweet_client->retweet('1577321598155096064', '1577308147190226944');

//$data = array_convert($tweet_client->getTweet('1576856912473243648'));

for ($i = 0; $i < 50; $i++) {
};


/*
  $data = $abraham_client->get('statuses/user_timeline', [
    "count" => 50,
    'id' => '1577321598155096064',
   // 'max_results' => 10,
    //'media.fields' => 'preview_image_url',
    //'media.fields' => 'url',

  ]);
 
$rt1= array_convert($data);
foreach($rt1 as $row){
  echo json_encode($row['id']).'</br>';
}
 //*/

//echo $interval->format("%H");


/*
$tweets = $bird_elephant->tweets();

$t_tweets = array_convert($tweets->likers('1578860526251421696'));
//echo json_encode($t_tweets['data']);
//echo json_encode('RESULTS COUNT: -----> '.count($t_tweets['data']).' <br/>');
echo json_encode($t_tweets['data'][0]['id']).' -----> ID: 0<br/>';

foreach($t_tweets['data'] as $id=>$row){
  echo json_encode($row['id']).' -----> ID: '.$id.'<br/>';
  if($id == 10){
    break;
  }
}

//*/


/*
/////////////////get tweet retweeters
$tweets = $bird_elephant->tweets();
$t_tweets = array_convert($tweets->retweeters('1579094596310573057'));
if (isset($t_tweets['data'])) {
  if (count($t_tweets['data']) > 1) {
      $status = 1;
      foreach ($t_tweets['data'] as $id => $row) {
         // follow($row['id']);
          $val = $id + 1;
          $output = 'SUCCESS: You have followed ' . $val . ' accounts';
          if ($id == 9) {
              break;
          }
      }
  } else {
    //  follow($t_tweets['data'][0]['id']);
      $status = 1;
      $val = 1;
      $output = 'SUCCESS:  You have followed 1 account!';
  }
} elseif (!isset($t_tweets['data'])) {
  $status = 0;
  $val = 0;
  $output = 'ERROR: Tweet has less no retweets!';
}



$abraham_client->setApiVersion('2');
$data = $abraham_client->get('tweets/search/recent', [
  "query" => 'conversation_id:1575130846302027776',
  "max_results" =>10,
  'tweet.fields' => 'author_id',

]);
$dt_2 = array_convert($data);
//*/
$response = '';
/*
foreach ($dt_2['data'] as $row) {
 // $response .= follow($row['author_id']). '</br>';
 echo $row['author_id']. '</br>';
}
//*/
;
//echo json_encode(array_convert($tweet_client->getTweet('1575465606018654208')));

//$data = tweet('1578800389763260416');

//$abraham_client->setApiVersion('2');
/*
$data = $abraham_client->get('trends/place', [
  'id' => '23424863',
 // "query" => 'conversation_id:1575130846302027776',
 // "max_results" =>10,
 // 'tweet.fields' => 'author_id',

]);
$topic = array_convert($data);
 $topics = '';
foreach($topic[0]['trends'] as $id=>$row){
 
  $topics .= $row['name'].' ';
  if($id==20){
    break;
  }
}


//$data = $abraham_client->get('tweets/search/recent', ['query' => '1579221985326149632',]);
//$tweet = $user_client->getUserById('3177515983');

//$tweet = $tweet_client->getTweet('1579167494740537344');

$data = $abraham_client->get('statuses/user_timeline', [
  "count" => 7,
  'id' => 488631023,
   
  ]);
*/  


 // $data = tweet(1579167494740537344);

 function replier($id)
 {
   global $abraham_client;
   $abraham_client->setApiVersion('2');
   $data = $abraham_client->get('tweets', [
     'ids' => '1579729380892631040',
     'expansions' => 'referenced_tweets.id',
     'tweet.fields' => 'conversation_id',
     'tweet.fields' => 'referenced_tweets',
     'user.fields' => 'username',
 
 
   ]);
   $val_1 = json_encode($data, TRUE);
   $val_2 = json_decode($val_1, TRUE);
 
 
   $data2 = $abraham_client->get('search/recent', [
     'query' => 'conversation_id:'.$id, //.$val_2['data'][0]['conversation_id'],
     'tweet.fields' => 'in_reply_to_user_id',
     //'tweet.fields' => 'conversation_id',
     'tweet.fields' => 'referenced_tweets.id',
     //'media.fields' => 'url',
   ]);
 
 
   return  $val_2;
 }

 



 function tweet_reply_printer($tweet_with_replies, $limit)
{
  global $abraham_client;
  $abraham_client->setApiVersion('2');
  $data = $abraham_client->get('tweets/search/recent', [
    "query" => 'in_reply_to_status_id:' . $tweet_with_replies,
    "max_results" => $limit,
    'tweet.fields' => 'author_id',

  ]);
  $dt_2 = array_convert($data);
  $response = '';
  foreach ($dt_2['data'] as $row) {
    $response .= $row['text'] . '</br>';
  }
  return $dt_2;
}

//echo json_encode(tweet_reply_printer('1579685751713075201', 100));
//$user = $user_client->getUserById('1134540983956332544');

//$tweet = tweet('1565628118001455105');
//echo $tweet['data'][0]['id'];


//$data = $user_client->follow('1577321598155096064', '1134540983956332544');


//echo json_encode(tweet_reply_retweeter('1577321598155096064', '1576856912473243648', 10));
//echo json_encode(follow('1134540983956332544'));
//echo replier('1565628118001455105');
//https://twitter.com/Megrata_/status/1579031379752337408?s=20&t=uXVwBYJQ0aN3MwNgEyneUw

$followers = $bird_elephant->user('Kenyans')->following([
  'max_results' => 1000,
  'user.fields' => 'profile_image_url',
  'user.fields' => 'following',
  'pagination_token' => '26SFOO12P4U1GZZZ'
]);
echo json_encode($followers);


$end_time = microtime(true);
$execution_time = ($end_time - $start_time);

echo " <br/>Execution time of script = " . $execution_time . " sec";
?>
<script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>