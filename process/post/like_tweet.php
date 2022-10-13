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
    $action = $_POST['action'];
    $mode = 'T0';
    if ($action == 1) {
        $status = 1;

        engine_control($command, 1);
        like_tweet($auth_user, $tweet_id);

        $output .= 'SUCCESS: Tweet liked: ' . $tweet_id;
    } else {
        $status = 1;

        engine_control($command, 1);
        unlike_tweet($auth_user, $tweet_id);

        $output .= 'SUCCESS: Tweet unliked: ' . $tweet_id;
    }


    twitter_log($user['email'], '', $status, $mode, $user['id'], $auth_user, $output);
} else {
    $output .= 'oops! seems we don\'t know you';
}




echo $output;
