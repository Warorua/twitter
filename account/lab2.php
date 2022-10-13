<?php
require '../vendor/autoload.php';
include '../includes/conn.php';
include '../includes/session.php';

/*

use UtxoOne\TwitterUltimatePhp\Clients\TweetClient;
use UtxoOne\TwitterUltimatePhp\Clients\UserClient;
use UtxoOne\TwitterUltimatePhp\Clients\ListClient;
use UtxoOne\TwitterUltimatePhp\Clients\SpaceClient;

$client = new TweetClient(bearerToken: 'AAAAAAAAAAAAAAAAAAAAABAchwEAAAAAli5UGS%2BxFqbbuUFbw41JPTwNYDI%3DnQgG3ZT8yAi1wWGIoegX43gNMT2QZeh26YQR5m27Ef2vveCNvr');

//$tweet = $client->getTweet('1577074293438980097');


$tweet_client = new TweetClient(
    apiKey: 'DU8WwngUfNBX5rMSObL8stCe4', 
    apiSecret: 'krTyx7HEoBViLv9UQXOvzkAy1nRv9OwIf342TvuWIIGQtOsWDp', 
    accessToken: '1377367159253434374-D9ps3Z81KlO4SKNUxIIL7lI82P5znZ', 
    accessSecret: 'CeUSSoaxaJOzqLoWY86Yr2bXBcmU5YpAx8wuKbvU1tZJT',
    bearerToken: 'AAAAAAAAAAAAAAAAAAAAABAchwEAAAAAli5UGS%2BxFqbbuUFbw41JPTwNYDI%3DnQgG3ZT8yAi1wWGIoegX43gNMT2QZeh26YQR5m27Ef2vveCNvr'
);


$user_client = new UserClient(
    apiKey: 'DU8WwngUfNBX5rMSObL8stCe4', 
    apiSecret: 'krTyx7HEoBViLv9UQXOvzkAy1nRv9OwIf342TvuWIIGQtOsWDp', 
    accessToken: '1377367159253434374-D9ps3Z81KlO4SKNUxIIL7lI82P5znZ', 
    accessSecret: 'CeUSSoaxaJOzqLoWY86Yr2bXBcmU5YpAx8wuKbvU1tZJT',
    bearerToken: 'AAAAAAAAAAAAAAAAAAAAABAchwEAAAAAli5UGS%2BxFqbbuUFbw41JPTwNYDI%3DnQgG3ZT8yAi1wWGIoegX43gNMT2QZeh26YQR5m27Ef2vveCNvr'
);

$list_client = new ListClient(
    apiKey: 'DU8WwngUfNBX5rMSObL8stCe4', 
    apiSecret: 'krTyx7HEoBViLv9UQXOvzkAy1nRv9OwIf342TvuWIIGQtOsWDp', 
    accessToken: '1377367159253434374-D9ps3Z81KlO4SKNUxIIL7lI82P5znZ', 
    accessSecret: 'CeUSSoaxaJOzqLoWY86Yr2bXBcmU5YpAx8wuKbvU1tZJT',
    bearerToken: 'AAAAAAAAAAAAAAAAAAAAABAchwEAAAAAli5UGS%2BxFqbbuUFbw41JPTwNYDI%3DnQgG3ZT8yAi1wWGIoegX43gNMT2QZeh26YQR5m27Ef2vveCNvr'
);

$space_client = new SpaceClient(
    apiKey: 'DU8WwngUfNBX5rMSObL8stCe4', 
    apiSecret: 'krTyx7HEoBViLv9UQXOvzkAy1nRv9OwIf342TvuWIIGQtOsWDp', 
    accessToken: '1377367159253434374-D9ps3Z81KlO4SKNUxIIL7lI82P5znZ', 
    accessSecret: 'CeUSSoaxaJOzqLoWY86Yr2bXBcmU5YpAx8wuKbvU1tZJT',
    bearerToken: 'AAAAAAAAAAAAAAAAAAAAABAchwEAAAAAli5UGS%2BxFqbbuUFbw41JPTwNYDI%3DnQgG3ZT8yAi1wWGIoegX43gNMT2QZeh26YQR5m27Ef2vveCNvr'
);
//*/
//$tweet = $tweet_client->tweet('Hello World 2!');

///////////////like tweet
//$tweet = $tweet_client->likeTweet('1377367159253434374', '1577308147190226944');


////////////////////get multiple tweet's details
/*
$tweets = $client->getTweets(['1565628118001455105', '1565999511536914433'])->all();

foreach($tweets as $tweet) {
  $tweet->getId();
  // ...
}
*/








/*
$user = $user_client->getUserByUsername('KenyanTweet');

//$tweet = $user_client->follow('1377367159253434374', '12');

$tweet = $user->getId();

*/





/*
$tweet2 = $client->getTweet('1577192978396987393');
$tweet = $tweet2->getEntities();



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_SERVER['SERVER_NAME'] != $server_req){
        $err = 'Request from unauthorised server agent!';
        $time = time();
        $err_type = 403;
        $server = $_SERVER['SERVER_NAME'];
        echo json_encode(array('error'=>$err, 'type'=>$err_type, 'server_agent'=>$server, 'timestamp'=>$time));
        die();
    }
    }




$url = 'http://localhost/twitter/account/lab3.php';

$fields =
array(
    'page' => 'hjg',
    'var' => 'myvariable',
);

function httpPost($url, $data)
{
    try {
        $ch = curl_init($url);
        if ($ch === false) {
            throw new Exception('failed to initialize');
        }
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response === false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }
    } catch (Exception $e) {

        trigger_error(
            sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(),
                $e->getMessage()
            ),
            E_USER_ERROR
        );
    } finally {
        // Close curl handle unless it failed to initialize
        if (is_resource($ch)) {
            curl_close($ch);
        }
    }

    return $response;
}

//$auth_key = array('oauth_token'=>$user['access_token'], 'oauth_token_secret'=>$user['access_token']);

//echo $auth_key['oauth_token']
//$tweet = httpPost($url, $fields);


function queueLoad()
{
    global $pdo;
    global $user;
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM twitter_logs WHERE user_id=:id ORDER BY id DESC LIMIT 1");
    $stmt->execute(['id' => $user['id']]);
    $data = $stmt->fetch();

    if ((time() - strtotime($data['time'])) < 900) {

        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            $js_obj =  json_encode($_POST);
        } else {
            $js_obj =  json_encode($_GET);
        }
        $page = $_SERVER['PHP_SELF'];
        $method = $_SERVER['REQUEST_METHOD'];
        $stmt = $conn->prepare("INSERT INTO process_engine (request_method,page,object) VALUES (:req, :page, :object)");
        $stmt->execute(['req' => $method, 'page' => $page, 'object' => $js_obj]);
        die('Operation added to queue');
    }
}

//*/

 
$url = 
'https://pbs.twimg.com/media/FeyGpRiWIAIyWEL.jpg'; 
  
$ext = pathinfo($url, PATHINFO_EXTENSION);
$img = '../assets/uploads/SR_'.time().'.'.$ext; 

file_put_contents($img, file_get_contents($url));
  
echo "File downloaded! --- ".$ext


  //echo $given_dt2.'</br>';
  //echo strtotime($data['time']).'</br>';
 // echo time().'</br>';

//echo $tweet;
//echo $_SERVER['PHP_SELF'];
?>
