<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  $_SESSION['error'] = 'Invalid request';
  die($_SESSION['error']);
 // header('location: ../logo_view.php');
}




try {
  //if (isset($_FILES['file']['name'])) {

  if (isset($_SESSION['tweetMedia'])) {
    $_SESSION['tweetMedia'] = $_SESSION['tweetMedia'];
  } else {
    $_SESSION['tweetMedia'] = [];
  }

  $photo = $_FILES['file']['name'];
  $photo_path = realpath($_FILES['file']['name']);

  $ext = pathinfo($photo, PATHINFO_EXTENSION);
  $time_id = time();
  $the_id = sha1($time_id);
  $new_filename = $the_id . '.' . $ext;
  $file_path = '../../assets/uploads/' . $new_filename;

  move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
  $filename = $new_filename;

  $media1 = $abraham_client->upload('media/upload', ['media' => $file_path]);
  array_push($_SESSION['tweetMedia'], $media1->media_id_string);
  unlink($file_path);
  //}
} catch (Exception $e) {
  $_SESSION['error'] = $e->getMessage();
}









if(!isset($_FILES['file']['name'])) {

  if (isset($_POST['text'])) {
    if ($_POST['text'] != '') {
      $name = $_POST['text'];
    } else {
      $name = '';
    }
  } else {
    $name = 'Script test tweet';
  }

  if(isset($_POST['tweet_id'])){
    $rep_id = $_POST['tweet_id'];
  }else{
    $rep_id = '';
  }
  

if(isset($_SESSION['tweetMedia'])){
  $media = implode(',', $_SESSION['tweetMedia']);
 // unset($_SESSION['tweetMedia']);
}else{
  $media = '';
}
  

if($media == '' && $rep_id == '' && $name == ''){
  $_SESSION['error'] = 'Invalid: Empty tweet!';
  die();
}



if(isset($_POST['t_topic'])){
  
  if ($_POST['t_topic'] == 1) {
    $data = $abraham_client->get('trends/place', [
      'id' => '23424863',
    ]);
    $topic = array_convert($data);
    $t_topic = '';
    foreach ($topic[0]['trends'] as $id => $row) {
      $t_topic .= $row['name'] . ' ';
      if ($id == 15) {
        break;
      }
    }
  } else {
    $t_topic = '';
  }
  
}else{
  $t_topic = '';
}





  $parameters = [
    'status' => $name . ' ' . $t_topic,
    'media_ids' => $media,
    'in_reply_to_status_id'=> $rep_id,
  ];

  $mode = 'T0';
  $status = 1;
  $command = 'tweet';
  $result = $abraham_client->post('statuses/update', $parameters);

  $message = 'You just tweeted successfully!';
  $output =  $message;

  $out_sys = array_convert($result);
  if(isset($out_sys['error'])){
    $_SESSION['error'] = $out_sys['error'];
  }elseif(isset($out_sys['errors'])){
    $_SESSION['error'] = $out_sys['errors'][0]['message'];
  }else{
     $_SESSION['success'] = $message;
  }
 

  $auth_user = $user['t_id'];
  charge($charge['tweet_charge']);
  engine_control($command, 1);
  twitter_log($user['email'], '', $status, $mode, $user['id'], $auth_user, $output);
  
  echo json_encode($result);
 //echo $out_sys['errors'][0]['message'];
}
