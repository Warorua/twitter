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

        $t_tweets = array_convert($tweets->retweeters($tweet_id));




        if (isset($t_tweets['data'])) {
            if (count($t_tweets['data']) > 1) {
                $status = 1;
                queueLoad();
                $limit = init_charge($charge['follow_charge']);
                $charge_pts = 0;


                foreach ($t_tweets['data'] as $id => $row) {
                    follow($row['id']);
                    
                    $val = $id + 1;
                    $output = 'SUCCESS: You have followed ' . $val . ' accounts';

                    $charge_pts += $charge['follow_charge'];
                    if ($id >= $limit) {
                        break;
                    }
                    if ($id == 39) {
                        break;
                    }
                }
                charge($charge_pts);
            } else {
                queueLoad();
                follow($t_tweets['data'][0]['id']);
                $status = 1;
                $val = 1;
                $output = 'SUCCESS:  You have followed 1 account!';
            }
        } elseif (!isset($t_tweets['data'])) {
            $status = 0;
            $val = 0;
            $output = 'ERROR: Tweet has less no retweets!';
        }else{
            $status = 0;
            $val = 0;
            $output = 'ERROR: This tweet\'s retweets could not be read!';
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