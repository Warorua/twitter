<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
$output = '';
if (isset($_SESSION['access_token'])) {
    $auth_user = $_POST['user'];
    $tweet_id = $_POST['id'];
    $command = 'follow';
    $status = 0;
    $data = array_convert($tweet_client->getTweet($tweet_id));
    $rep_count = $data['data']['public_metrics']['reply_count'];
    $mode = 'T0';
 if(tweet_reply_follower($tweet_id, '5') == 1){
        if ($rep_count == 0) {
            $status = 0;
            $output .= 'ERROR: Tweet: ' . $tweet_id . ' has 0 replies!';
        } elseif ($rep_count < 10) {
            $status = 0;
            $output .= 'ERROR: Tweet: ' . $tweet_id . ' has less than 10 replies!';
        } elseif ($rep_count < 40) {
            $status = 1;
            engine_control($command, $rep_count);
            tweet_reply_follower($tweet_id, '40');
            $output .= 'SUCCESS:  You have followed ' . $rep_count . ' accounts';
        } else {
            $status = 1;

            engine_control($command, 40);
            tweet_reply_follower($tweet_id, '40');

            $output .= 'SUCCESS:  You have followed 40 accounts';
        }
}else{
    $status = 0;
    $output .= 'ERROR:  Error liking this tweet\'s replies';
}

twitter_log($user['email'], '', $status, $mode, $user['id'], $auth_user, $output);

} else {
     $output .= 'oops! seems we don\'t know you';
}




echo $output;




