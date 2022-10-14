<?php
include '../../includes/conn.php';


$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>4]);

$client = $stmt->fetch();

$auth_key = $_SESSION['access_token'] = array('oauth_token' => $client['access_token'], 'oauth_token_secret' => $client['access_secret']);

$auth_code = json_encode($auth_key);


$_GET = array('bot_id'=>$client['id'], 'auth_key'=>$auth_code);

include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';


//*
$media = [];




$url = $parent_url.'process/scrape/tuko_scrape.php';
$fields = array();


//echo httpPost($url, $fields);
$data = json_decode(httpPost($url, $fields), true);
echo $data['status'].'</br>';
//
//$abraham_client->setApiVersion('1.1');
//*


if ($data['status'] != 403) {
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
    $name = $data['text'];



    $media2 = implode(',', $media);
    //echo json_encode($media2);

    $t_topic = '';


    $parameters = [
        'status' => $name . ' ' . $t_topic,
        'media_ids' => $media2
    ];

    $mode = 'T0';
    $status = 1;
    $command = 'tweet';
    $result = $abraham_client->post('statuses/update', $parameters);

    $message = 'Tweet success!';
    $output =  $message;
    // $_SESSION['success'] = $message;

    $auth_user = $user['t_id'];
    engine_control($command, 1);
    twitter_log($user['email'], '', $status, $mode, $user['id'], $auth_user, $output);

    echo $message;
} else {
    echo 'Data already active!';
}
//*/