<?php
//*
include '../includes/conn.php';

include '../includes/session.php';

require '../vendor/autoload.php';

include '../includes/api_config.php';

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT *, users.id AS usid FROM users LEFT JOIN client_api ON users.id = client_api.user_id");
$stmt->execute();
$data = $stmt->fetchAll();

//echo json_encode($data);

//echo json_encode($_GET);
//*/

//echo 'Yuuup';


// Do this once then store it somehow:
$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
$message = 'We are all living in a yellow submarine';

//$ciphertext = safeEncrypt($message, $key);
//$ciphertext = safeEncrypt($user['p_value'], $user['p_key']);
//$ciphertext = safeEncrypt($user['p_value'], '�o�z��O�{�Q7:�m��]���d}��G��w');
$plaintext = safeDecrypt($user['p_value'], $user['p_key']);

//var_dump($ciphertext);
//echo $plaintext;

echo json_encode($_SESSION['post']);
?>

Fatal error: Uncaught TypeError: UtxoOne\TwitterUltimatePhp\Models\TwitterPostResponse::__construct(): Argument #1 ($response) must be of type object, null given, called in C:\xamppp\htdocs\twitter\vendor\utxo-one\twitter-ultimate-php\src\Clients\BaseClient.php on line 216 and defined in C:\xamppp\htdocs\twitter\vendor\utxo-one\twitter-ultimate-php\src\Models\TwitterPostResponse.php:7
Stack trace:
#0 C:\xamppp\htdocs\twitter\vendor\utxo-one\twitter-ultimate-php\src\Clients\BaseClient.php(216): UtxoOne\TwitterUltimatePhp\Models\TwitterPostResponse->__construct(NULL)
#1 C:\xamppp\htdocs\twitter\vendor\utxo-one\twitter-ultimate-php\src\Clients\TweetClient.php(121): UtxoOne\TwitterUltimatePhp\Clients\BaseClient->post('users/157732159...', Array)
#2 C:\xamppp\htdocs\twitter\includes\api_config.php(420): UtxoOne\TwitterUltimatePhp\Clients\TweetClient->likeTweet('157732159815509...', '158098017253407...')
#3 C:\xamppp\htdocs\twitter\includes\api_config.php(451): like_tweet('157732159815509...', '158098017253407...')
#4 C:\xamppp\htdocs\twitter\process\post\like_replies.php(25): tweet_reply_liker('157732159815509...', '158022177537946...', '100')
#5 {main}
thrown in C:\xamppp\htdocs\twitter\vendor\utxo-one\twitter-ultimate-php\src\Models\TwitterPostResponse.php on line 7



Fatal error: Uncaught TypeError: UtxoOne\TwitterUltimatePhp\Models\TwitterPostResponse::__construct(): Argument #1 ($response) must be of type object, null given, called in C:\xamppp\htdocs\twitter\vendor\utxo-one\twitter-ultimate-php\src\Clients\BaseClient.php on line 216 and defined in C:\xamppp\htdocs\twitter\vendor\utxo-one\twitter-ultimate-php\src\Models\TwitterPostResponse.php:7
Stack trace:
#0 C:\xamppp\htdocs\twitter\vendor\utxo-one\twitter-ultimate-php\src\Clients\BaseClient.php(216): UtxoOne\TwitterUltimatePhp\Models\TwitterPostResponse->__construct(NULL)
#1 C:\xamppp\htdocs\twitter\vendor\utxo-one\twitter-ultimate-php\src\Clients\TweetClient.php(121): UtxoOne\TwitterUltimatePhp\Clients\BaseClient->post('users/157732159...', Array)
#2 C:\xamppp\htdocs\twitter\includes\api_config.php(420): UtxoOne\TwitterUltimatePhp\Clients\TweetClient->likeTweet('157732159815509...', '158032675250459...')
#3 C:\xamppp\htdocs\twitter\process\post\like_tweet.php(17): like_tweet('157732159815509...', '158032675250459...')
#4 {main}
thrown in C:\xamppp\htdocs\twitter\vendor\utxo-one\twitter-ultimate-php\src\Models\TwitterPostResponse.php on line 7








