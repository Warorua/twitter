<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
use Abraham\TwitterOAuth\TwitterOAuth;
//*
$output = [];
if (isset($_POST['id']) && isset($_POST['user'])) {
    if ($_POST['user'] == $user['id']) {




        $stmt = $conn->prepare("SELECT * FROM client_api WHERE id=:id AND user_id=:user_id");
        $stmt->execute(['id' => $_POST['id'], 'user_id'=>$user['id']]);
        $data2 = $stmt->fetch();
        if (count($data2) > 0) {

            $cons_key_verif = $data2['consumer_key'];
            $cons_secret_verif = $data2['consumer_secret'];
            $cons_callback_verif = $parent_url . '/v3/subscribe';


            try {

                $connection = new TwitterOAuth($cons_key_verif, $cons_secret_verif);
                $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => $cons_callback_verif));


                $stmt = $conn->prepare("INSERT INTO api_shop (like_charge, follow_charge, tweet_charge, max_user, app_id) VALUES (:like_charge, :follow_charge, :tweet_charge, :max_user, :app_id)");
                $stmt->execute(['like_charge' => $charge['like_charge'], 'tweet_charge' => $charge['tweet_charge'], 'follow_charge' => $charge['follow_charge'], 'max_user' => 5, 'app_id' => $_POST['id']]);
                $output = array('success');
            } catch (Exception $e) {
                $output = array('Callback URL not approved for this application. Add URL </br><div class="badge badge-light-info">' . $cons_callback_verif . '</div></br> to your approved callback URLs on your Twitter Developer Dashboard to proceed!');
            }

        } else {
            $output = array('App not found!');
        }


    } else {
        $output = array('Unauthorized user!');
    }
} else {
    $output = array('Unauthorized request!');
}

echo json_encode($output);
?>