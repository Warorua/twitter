<?php
require '../vendor/autoload.php';
include '../includes/conn.php';
include '../includes/session.php';
include '../includes/api_config.php';

/*
$abraham_client->setApiVersion('1.1');
$data = $abraham_client->get('statuses/mentions_timeline', [
    "id" => 12,
    "count" => 800,
    //'id' => '1581999085875331076'
]);
*/



//echo json_encode($_SESSION['tweetMedia']);
//unset($_SESSION['tweetMedia']);
//echo $data .'<br/><br/><br/>';

//echo $_SESSION['mypic'].'<br/><br/><br/>';

//echo $good_pic  .'<br/><br/><br/>';

//echo $good_pic2  .'<br/><br/><br/>';
//$myfile = base64_to_jpeg($base_file, 'tmp.jpg');


$tim = time_sub('2022-10-14 20:20:28', 'H');



echo $tim;






