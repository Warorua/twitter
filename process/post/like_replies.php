<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';

$output = '';
if (isset($_SESSION['access_token'])) {
    $auth_user = $_POST['user'];
    $tweet_id = $_POST['id'];
    $command = 'like';

    $data = array_convert($tweet_client->getTweet($tweet_id));
    $rep_count = $data['data']['public_metrics']['reply_count'];
    $mode = 'T0';
    if ($rep_count == 0) {
        $status = 0;
        $output .= 'ERROR: Tweet: ' . $tweet_id . ' has 0 replies!';
    } elseif ($rep_count < 10) {
        $status = 0;
        $output .= 'ERROR: Tweet: ' . $tweet_id . ' has less than 10 replies!';
    } elseif ($rep_count < 100) {
        $status = 1;
        queueLoad();
        engine_control($command, $rep_count);
        //tweet_reply_liker($auth_user, $tweet_id, '100');

        $output .= 'SUCCESS: ' . $rep_count . ' likes for tweet: ' . $tweet_id;
    } else {
        $status = 1;
        queueLoad();
        engine_control($command, 100);
        //tweet_reply_liker($auth_user, $tweet_id, '100');

        $output .= 'SUCCESS: 100 likes for tweet: ' . $tweet_id;
    }

    twitter_log($user['email'], '', $status, $mode, $user['id'], $auth_user, $output);
} else {
    $output .= 'oops! seems we don\'t know you';
}




echo $output;
