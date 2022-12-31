<?php
require '../../vendor/autoload.php';
include '../../includes/conn.php';
$_SESSION['user_id'] = 14;
include '../../includes/session.php';
include '../../includes/api_config.php';

$stmt = $conn->prepare("SELECT * FROM market WHERE dm=:dm ORDER BY RAND() LIMIT 5");
$stmt->execute(['dm' => 0]);
$dt1 = $stmt->fetchAll();
foreach ($dt1 as $row) {
    echo $row['username'] . '<br/>';
    $message = "
Hello " . $row['name'] . ",
Have you tried Kotnova AI😀?. Kotnova AI helps Twitter users manage and grow their Twitter accounts using Artificial Intelligence Technology. Our platform offers the following services:
~ Auto follow those who follow you.
~ Auto-unfollow those you have followed and have not followed you back.
~ Auto-delete old tweets from your account.
~ Auto-like tweets on your timeline.
~ Mass-like replies on a tweet.
~Mass follow tweet repliers.
~Mass follow tweet retweeters.
~Mass retweet replies
~Silent retweeting tweets(Tweets won't show they have been retweeted).
~Advanced tweet searching.
~Advanced tweet stats viewing.
~ Auto-send welcome DMs to your new followers.
~ Tweet in over 50 different font types.
~AND MUCH MUCH MORE😊😊😊😊

On signing up you get:
~ 10,000 FREE Kotnova Gas Points


Try Kotnova today at https://kotnova.com/v2/new 😉

Follow and DM @Kotnovaa for any inquiries.
";
    $abraham_client->setApiVersion('1.1');
    $obj = [
        'event' => [
            'type' => 'message_create',
            'message_create' => [
                'target' => [
                    'recipient_id' => $row['t_id']
                ],
                'message_data' => ['text' => $message,]
            ]
        ]
    ];

    engine_control('dm', 1);
    $data = $abraham_client->post('direct_messages/events/new', $obj, true);


    $dt2 = array_convert($data);

    if (isset($dt2['errors'])) {
        $stmt = $conn->prepare("UPDATE market SET dm=:dm WHERE id=:id");
        $stmt->execute(['id' => $row['id'], 'dm' => 403]);
    } elseif($dt2 == '' || $dt2 == NULL) {
        $stmt = $conn->prepare("UPDATE market SET dm=:dm WHERE id=:id");
        $stmt->execute(['id' => $row['id'], 'dm' => 403]);
    }else {
        $stmt = $conn->prepare("UPDATE market SET dm=:dm WHERE id=:id");
        $stmt->execute(['id' => $row['id'], 'dm' => 1]);
    }
    

    echo json_encode($data) . '<br/><br/>';
}
