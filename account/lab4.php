<?php
//*
  include '../includes/conn.php';

  include '../includes/session.php';

 require '../vendor/autoload.php';

 include '../includes/api_config.php';
 use Abraham\TwitterOAuth\TwitterOAuth;

/* Essential access
$consumer_key = 'YRTcVlyLV1g72sQlKDlNbwSAI';
//$consumer_key = 'g72sQlKDlNbwSAI';
$consumer_secret = 'WSxtDMCiVh8GetLznc8hVO9DbBPLzDzhSFIgA5Ik7m6eM0MZbo';
//$access_token = '1377367159253434374-9wtJ5EtQXA4lUm8bIohYkGZrh8P1Dq';
$access_token = 'tQXA4lUm8bIohYkGZrh8P1Dq';
$access_token_secret = 'OP5SOclkQRzJbUw6aSdzbE2Fr79xxiphpygBhKydGGsRj';
$bearer_token = 'AAAAAAAAAAAAAAAAAAAAAAXdiAEAAAAAB8jzgRp%2BDMRFGQ%2FLehUeoX8Y05U%3DKG3BXbZ7qrxEz8ACaHEDOeSIcUFGgY5shIlOm8sdzpM8ZajYty';
//*/


/* Elevated access
$consumer_key = 'nsLZN64t31iUV39nqPgioyzsd';
$consumer_secret = 'U5SSjztJsfXq89v1RWF6pRik1xCxibvnoDNQP6f6HaZzmYnDy8';
$access_token = '1377367159253434374-cXjJiUp2jC2kHJFYRpNBt5h2BslxYf';
$access_token_secret = '05Z6A9RLpnOHcQLiVzu6OAqh10B3FS3KT8fLBsQ2V34ap';
$bearer_token = 'AAAAAAAAAAAAAAAAAAAAAAXdiAEAAAAAB8jzgRp%2BDMRFGQ%2FLehUeoX8Y05U%3DKG3BXbZ7qrxEz8ACaHEDOeSIcUFGgY5shIlOm8sdzpM8ZajYty';

//*/

/*
$user_client = new UserClient(
    apiKey: 'nsLZN64t31iUV39nqPgioyzsd',
    apiSecret: 'U5SSjztJsfXq89v1RWF6pRik1xCxibvnoDNQP6f6HaZzmYnDy8',
    accessToken: '1377367159253434374-cXjJiUp2jC2kHJFYRpNBt5h2BslxYf',
    accessSecret: '05Z6A9RLpnOHcQLiVzu6OAqh10B3FS3KT8fLBsQ2V34ap',
    bearerToken:  'AAAAAAAAAAAAAAAAAAAAAKzqhAEAAAAAPWvo1WjNaX%2FkP3airEoAwrNgX38%3DaTP7AtoOb2PGI7eeZEKjmqhaNLIy3z0Pd1O3UMH21Wmfr5fB0R'
  );
//*/

 // $connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
 $abraham_client->setApiVersion('1.1');
 $data = $abraham_client->get('direct_messages/events/list', [
    "count" => 50,
    //'id' => 488631023,
     
    ]);

// $content = $connection->get("account/verify_credentials");

//$content = $abraham_client->get("account/verify_credentials");

//  include '../includes/api_config.php';

// $conn = $pdo->open();
// $stmt = $conn->prepare("SELECT *, users.id AS usid FROM users LEFT JOIN client_api ON users.id = client_api.user_id");
// $stmt->execute();
// $data = $stmt->fetchAll();

echo json_encode($data);

/*
$arr1 = json_encode($content);
$arr2 = json_decode($arr1, true);
//echo $arr2['errors'][0]['code'];
//*/

if(isset($arr2['errors'][0]['code'])){
   // echo 'ERROR';
}else{
   // echo 'SUCCESS';
}

?>







