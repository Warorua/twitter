<?php
include '../../vendor/autoload.php';
use UtxoOne\TwitterUltimatePhp\Clients\UserClient;
use Abraham\TwitterOAuth\TwitterOAuth;

/* Essential access
$consumer_key = 'YRTcVlyLV1g72sQlKDlNbwSAI';
$consumer_secret = 'WSxtDMCiVh8GetLznc8hVO9DbBPLzDzhSFIgA5Ik7m6eM0MZbo';
$access_token = '1377367159253434374-9wtJ5EtQXA4lUm8bIohYkGZrh8P1Dq';
$access_token_secret = 'OP5SOclkQRzJbUw6aSdzbE2Fr79xxiphpygBhKydGGsRj';
$bearer_token = 'AAAAAAAAAAAAAAAAAAAAAAXdiAEAAAAAB8jzgRp%2BDMRFGQ%2FLehUeoX8Y05U%3DKG3BXbZ7qrxEz8ACaHEDOeSIcUFGgY5shIlOm8sdzpM8ZajYty';
//*/


/* Elevated access
$consumer_key = 'nsLZN64t31iUV39nqPgioyzsd';
$consumer_secret = 'U5SSjztJsfXq89v1RWF6pRik1xCxibvnoDNQP6f6HaZzmYnDy8';
$access_token = '1377367159253434374-cXjJiUp2jC2kHJFYRpNBt5h2BslxYf';
$access_token_secret = '05Z6A9RLpnOHcQLiVzu6OAqh10B3FS3KT8fLBsQ2V34ap';
$bearer_token = 'AAAAAAAAAAAAAAAAAAAAAKzqhAEAAAAAPWvo1WjNaX%2FkP3airEoAwrNgX38%3DaTP7AtoOb2PGI7eeZEKjmqhaNLIy3z0Pd1O3UMH21Wmfr5fB0R';

//*/

//* client access
$consumer_key = $_POST['consumer_key'];
$consumer_secret = $_POST['consumer_secret'];
$access_token = $_POST['access_token'];
$access_token_secret = $_POST['access_secret'];
$bearer_token = $_POST['bearer_token'];

//*/

// $api_consumer_key = $_POST['consumer_key'];
// $api_consumer_secret = $_POST['consumer_secret'];
// $api_bearer_token = $_POST['bearer_token'];
// $api_access_token = $_POST['access_token'];
// $api_access_secret = $_POST['access_secret'];


try{
    $user_client = new UserClient(
        apiKey: $consumer_key,
        apiSecret: $consumer_secret,
        accessToken: $access_token,
        accessSecret: $access_token_secret,
        bearerToken: $bearer_token
    );
    $t_user = $user_client->getUserById('719871667275702272');

    $connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
    $content = $connection->get("account/verify_credentials");

    $arr1 = json_encode($content);
    $arr2 = json_decode($arr1, true);
    if (isset($arr2['errors'][0]['code'])) {
        echo $arr2['errors'][0]['message'];
    } else {
        echo '400';
    }

}
catch (Exception $e) {
   //echo 'The error is '.$e->getMessage();
   echo 'Your Twitter API v2 does not have Elevated access to the Twitter API!';
}
