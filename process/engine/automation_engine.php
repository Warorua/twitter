<?php
ini_set('max_execution_time', 180);
include '../../includes/conn.php';


$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM automation_scripts WHERE automation<:automation");
$stmt->execute(['automation' => time()]);
$data = $stmt->fetchAll();

foreach ($data as $row) {
    $stmt = $conn->prepare("SELECT * FROM automation_subs WHERE script_id=:script_id");
    $stmt->execute(['script_id' => $row['id']]);
    $data_1 = $stmt->fetchAll();
    $next_automation = time() + floatval($row['execution']);
    $next_automation_id = $row['id'];

    $url = $parent_url . $row['file_path'];
    $fields = array();
    include_once '../../includes/functions.php';
    $data = json_decode(httpPost($url, $fields), true);

    foreach ($data_1 as $row_1) {

        $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(['id' => $row_1['user_id']]);
        $client = $stmt->fetch();
        $auth_key = $_SESSION['access_token'] = array('oauth_token' => $client['access_token'], 'oauth_token_secret' => $client['access_secret']);
        $auth_code = json_encode($auth_key);
        $_GET = array('bot_id' => $client['id'], 'auth_key' => $auth_code);

        include '../../includes/session.php';
        require '../../vendor/autoload.php';
        include '../../includes/api_config.php';

        //*
        $media = [];

        echo $data['status'] . '</br>';


        if (isset($data['text'])) {
            $data_text_length = strlen($data['text']);
        } else {
            $data_text_length = 1000;
        }



        if ($data['status'] != 403) {
            if ($data_text_length < 281) {
                $name = $data['text'];
            } else {
                $name = $data['short_text'];
            }
            foreach ($data['media'] as $row) {
                $photo_key = 1;
                $url = $row;

                $ext = pathinfo($url, PATHINFO_EXTENSION);

                $img = '../../assets/uploads/SR_' . time() . '.jpg';

                // echo $img . '----------pic';

                file_put_contents($img, file_get_contents($url));

                //  sleep(3);
                $media1 = $abraham_client->upload('media/upload', ['media' => $img]);
                // $img_1 = $media1->media_id_string;
                array_push($media, $media1->media_id_string);
                unlink($img);
            }

            //*
            // $name = 'Test data';

            charge($charge['tweet_charge']);

            $media2 = implode(',', $media);

            $t_topic = '';


            $parameters = [
                'status' => $name . ' ' . $t_topic,
                'media_ids' => $media2
            ];

            $mode = 'T0';
            $status = 1;
            $command = 'tweet';
            $result = $abraham_client->post('statuses/update', $parameters);

            //        
            $out_sys = array_convert($result);
            if (isset($out_sys['error'])) {
                $message = $out_sys['error'];
            } elseif (isset($out_sys['errors'])) {
                $message = $out_sys['errors'][0]['message'];
            } else {
                $message = 'Tweet success!';
            }
            $output =  $message;

            $auth_user = $user['t_id'];

            engine_control($command, 1);
            twitter_log($user['email'], '', $status, $mode, $user['id'], $auth_user, $output);

            echo $message;
        } else {
            echo 'Data already active!';
        }
    }
    $stmt = $conn->prepare("UPDATE automation_scripts SET automation=:automation WHERE id=:id");
    $stmt->execute(['id' => $next_automation_id, 'automation' => $next_automation]);
}

//*/

//file_get_contents('../post/engine_clear.php');