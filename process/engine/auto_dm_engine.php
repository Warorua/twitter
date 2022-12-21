<?php
ini_set('max_execution_time', 1800);

include '../../includes/conn.php';


$stmt = $conn->prepare("SELECT *  FROM auto_dm WHERE time<:time LIMIT 10");
$stmt->execute(['time' => time()]);
$data = $stmt->fetchAll();

foreach ($data as $row) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id' => $row['user_id']]);

    $client_load = $stmt->fetch();


    $auth_key = $_SESSION['access_token'] = array('oauth_token' => $client_load['access_token'], 'oauth_token_secret' => $client_load['access_secret']);

    $auth_code = json_encode($auth_key);


    $_GET = array('bot_id' => $client_load['id'], 'auth_key' => $auth_code);

    if (file_exists('../includes/functions.php')) {
        include_once '../includes/functions.php';
    } elseif (file_exists('../../includes/functions.php')) {
        include_once '../../includes/functions.php';
    } elseif (file_exists('../../../includes/functions.php')) {
        include_once '../../../includes/functions.php';
    }
    include '../../includes/session.php';
    require '../../vendor/autoload.php';

    $file_name = "../../process/client/auto_dm/" . $client_load['t_id'] . ".json";
    ///////////DELETE PENDING ACTIVE CAMPAIGNS
    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM auto_dm WHERE id=:id AND status=:status");
    $stmt->execute(['id' => $row['id'], 'status' => 1]);
    $data_cmp = $stmt->fetch();
    if ($data_cmp['numrows'] > 0) {


        $campaign_killer = TRUE;



        if (file_exists($file_name)) {
            unlink($file_name);
        }


        $stmt = $conn->prepare("DELETE FROM auto_dm WHERE id=:id");
        $stmt->execute(['id' => $data_cmp['id']]);

        $mode = 'T0';
        $status = 1;
        $output = 'The automation engine automatically terminated auto DM due to a processing error.';
        $output_1 = $output . ' You can recreate the auto DM again from your Kotnova dashboard.';
        $auth_user = $client_load['t_id'];
        twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
        system_mailer('Auto DM termination', $output_1, $client_load['email']);
        die();
    }
    ///////////SET CAMPAIGN AS ACTIVE
    $stmt = $conn->prepare("UPDATE auto_dm SET status=:status WHERE id=:id");
    $stmt->execute(['id' => $row['id'], 'status' => 1]);


    ////////////////////////////////////////////////////////////////////////////////////////////////// 




    include '../../includes/api_config.php';




    $obj = $file_name;
    $data = $user_b = $user_client->getFollowers($client_load['t_id']);

    $data_2 = array_convert($data);
    $data_3 = json_decode(file_get_contents($obj), true);
    $final1 = [];
    $final2 = [];
    //*
    foreach ($data_3['data'] as $row1) {
        for ($i = 0; $i < count($data_2['data']); $i++) {
            if (in_array($row1['id'], $data_2['data'][$i])) {
                // echo "found id:".$row1['id']." here:".$data_2['data'][$i]['id']."<br/>";
                $check = array_search($data_2['data'][$i]['id'], $final1, true);
                if ($check == '') {
                    array_push($final1, $data_2['data'][$i]['id']);
                }
            } else {
                // echo "not found id:".$row1['id']."  here:".$data_2['data'][$i]['id']."<br/>";
                $check = array_search($data_2['data'][$i]['id'], $final2, true);
                if ($check == '') {
                    array_push($final2, $data_2['data'][$i]['id']);
                }
            }
        }
    }

    $new_followers = array_diff($final2, $final1);

    $abraham_client->setApiVersion('1.1');

    echo json_encode($new_followers);
    //*
    foreach ($new_followers as $dm) {
        $obj = [
            'event' => [
                'type' => 'message_create',
                'message_create' => [
                    'target' => [
                        'recipient_id' => $dm
                    ],
                    'message_data' => ['text' => $row['message'],]
                ]
            ]
        ];
        engine_control('dm', 1);
        $data = $abraham_client->post('direct_messages/events/new', $obj, true);
        echo json_encode($data).'<br/><br/>';
    }


    if (file_exists($file_name)) {
        unlink($file_name);
    }
    $followers_data = json_encode($user_b);

    $file_data = fopen($file_name, "w");

    fwrite($file_data, $followers_data);

    fclose($file_data);

    // */
    $time = $row['time'] + 900;
    $stmt = $conn->prepare("UPDATE auto_dm SET time=:time, status=:status WHERE id=:id");
    $stmt->execute(['id' => $row['id'], 'time' => $time, 'status' => 0]);
}
