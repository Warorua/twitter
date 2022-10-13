<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';


if (isset($_SESSION['access_token'])) {
    if (isset($_POST['user'])) {
        $auth_user = $_POST['user'];
        $tweet_id = $_POST['id'];
        $command = 'follow';
        $mode = 'T0';
        
$output = '';
        $tweets = $bird_elephant->tweets();

        $t_tweets = array_convert($tweets->likers($tweet_id));




        if (isset($t_tweets['data'])) {
            if (count($t_tweets['data']) > 1) {
                $status = 1;
                foreach ($t_tweets['data'] as $id => $row) {
                    follow($row['id']);
                    $val = $id + 1;
                    $output = 'SUCCESS: You have followed ' . $val . ' accounts';
                    if ($id == 39) {
                        break;
                    }
                }
            } else {
                follow($t_tweets['data'][0]['id']);
                $status = 1;
                $val = 1;
                $output = 'SUCCESS:  You have followed 1 account!';
            }
        } elseif (isset($t_tweets['meta'])) {
            $status = 0;
            $val = 0;
            $output = 'ERROR: Tweet has less no likes!';
        }








          engine_control($command, $val);
          twitter_log($user['email'], '', $status, $mode, $user['id'], $auth_user, $output);
    }else{
        $status = 0;
        $output = 'unauthorised request!';
    }
    
} else {
    $output = 'oops! seems we don\'t know you';
}



echo $output;

?>