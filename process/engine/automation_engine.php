<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';


//*
$media = [];




$url = 'http://localhost/twitter/process/scrape/tuko_scrape.php';
$fields = array();



$data = json_decode(httpPost($url, $fields), true);


//$abraham_client->setApiVersion('1.1');
//*

//echo json_encode($data);

foreach($data['media'] as $row) {
    $photo_key = 1;
    $url = $row;

    $ext = pathinfo($url, PATHINFO_EXTENSION);

    $img = '../../assets/uploads/SR_' . time() . '.' . $ext;

    //echo $img . '----------pic';

    file_put_contents($img, file_get_contents($url));

    //  sleep(3);
    $media1 = $abraham_client->upload('media/upload', ['media' => $img]);
    // $img_1 = $media1->media_id_string;
    array_push($media, $media1->media_id_string);
    //unlink($img);
}
//*/
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

$message = 'You just silent retweeted successfully!';
$output =  $message;
// $_SESSION['success'] = $message;

$auth_user = $user['t_id'];
engine_control($command, 1);
twitter_log($user['email'], '', $status, $mode, $user['id'], $auth_user, $output);

echo $message;
