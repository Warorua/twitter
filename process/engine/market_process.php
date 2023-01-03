<?php
require '../../vendor/autoload.php';
include '../../includes/conn.php';
$_SESSION['user_id'] = 2;
include '../../includes/session.php';
include '../../includes/api_config.php';

//*
//$abraham_client->setApiVersion('1.1');
$stmt = $conn->prepare("SELECT * FROM market WHERE id=1");
$stmt->execute();
$auth = $stmt->fetch();

if($auth['token'] == ''){
$ffl = [
    'max_results' => 1000,
    'user.fields' => 'location,created_at,public_metrics,url,profile_image_url,verified',
];
}else{
    $ffl = [
        'max_results' => 1000,
        'user.fields' => 'location,created_at,public_metrics,url,profile_image_url,verified',
        'pagination_token' => $auth['token'],
    ];
}


$followers = $bird_elephant->user('AtwoliYaa')->followers($ffl);
//*/

$data = array_convert($followers);
foreach ($data['data'] as $row) {
    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM market WHERE t_id=:t_id");
    $stmt->execute(['t_id' => $row['id']]);
    $st = $stmt->fetch();
    if ($st['numrows'] < 1) {
        $stmt = $conn->prepare("INSERT INTO market (username, name, t_id) VALUES (:username, :name, :t_id)");
        $stmt->execute(['username' => $row['username'], 'name' => $row['name'], 't_id' => $row['id']]);
    }
}
if (isset($data['meta']['next_token'])) {
    $stmt = $conn->prepare("UPDATE market SET token=:token WHERE id=1");
    $stmt->execute(['token' => $data['meta']['next_token']]);
}else{
    $stmt = $conn->prepare("UPDATE market SET token=:token WHERE id=1");
    $stmt->execute(['token' => '']);
}



echo 'done<br/>';
echo json_encode($followers);
//unset($_SESSION['tweetMedia']);
//echo $data .'<br/><br/><br/>';

//echo $_SESSION['mypic'].'<br/><br/><br/>';

//echo $good_pic  .'<br/><br/><br/>';

//echo $good_pic2  .'<br/><br/><br/>';
//$myfile = base64_to_jpeg($base_file, 'tmp.jpg');






