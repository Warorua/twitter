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



echo json_encode($_SESSION['tweetMedia']);
unset($_SESSION['tweetMedia']);
//echo $data .'<br/><br/><br/>';

//echo $_SESSION['mypic'].'<br/><br/><br/>';

//echo $good_pic  .'<br/><br/><br/>';

//echo $good_pic2  .'<br/><br/><br/>';
//$myfile = base64_to_jpeg($base_file, 'tmp.jpg');



/*
if (!isset($_POST['logo'])) {
    $_SESSION['error'] = 'Invalid request';
    header('location: ../logo_view.php');
  } else {
    $name = $_POST['text'];
  
  
    if ($_FILES['image']['name'] != '') {
      $photo = $_FILES['image']['name'];
      $photo_path = realpath($_FILES['image']['name']);
      $ext = pathinfo($photo, PATHINFO_EXTENSION);
      $time_id = time();
      $the_id = sha1($time_id);
      $new_filename = $the_id . '.' . $ext;
      move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/uploads/' . $new_filename);
      $filename = $new_filename;
      $media1 = $abraham_client->upload('media/upload', ['media' => '../../assets/uploads/' . $new_filename]);
    }
  
  
    if ($_FILES['image_2']['name'] != '') {
      $photo2 = $_FILES['image_2']['name'];
      $photo_path2 = realpath($_FILES['image_2']['name']);
      $ext2 = pathinfo($photo, PATHINFO_EXTENSION);
      $time_id2 = time();
      $the_id2 = sha1($time_id2);
      $new_filename2 = $the_id2 . '.' . $ext2;
      move_uploaded_file($_FILES['image_2']['tmp_name'], '../../assets/uploads/' . $new_filename2);
      $filename2 = $new_filename2;
      $media2 = $abraham_client->upload('media/upload', ['media' => '../../assets/uploads/' . $new_filename2]);
    }
  
    if (isset($media1)) {
      $img_1 = $media1->media_id_string;
    } else {
      $img_1 = '';
    }
  
    if (isset($media2)) {
      $img_2 = $media2->media_id_string;
    } else {
      $img_2 = '';
    }
  
    if (isset($media1) || isset($media2)) {
      $media = implode(',', [$img_1, $img_2]);
    } else {
      $media = '';
    }
  
  
  
    if ($_POST['t_topic'] == 1) {
      $data = $abraham_client->get('trends/place', [
        'id' => '23424863',
      ]);
      $topic = array_convert($data);
      $t_topic = '';
      foreach ($topic[0]['trends'] as $id => $row) {
        $t_topic .= $row['name'] . ' ';
        if ($id == 20) {
          break;
        }
      }
    } else {
      $t_topic = '';
    }
  
    $parameters = [
      'status' => $name . ' ' . $t_topic,
      'media_ids' => $media
    ];
  
    $mode = 'T0';
    $status = 1;
    $command = 'tweet';
    $result = $abraham_client->post('statuses/update', $parameters);
  
    $message = 'You just tweeted successfully!';
    $output =  $message;
    $_SESSION['success'] = $message;
  
    $auth_user = $user['t_id'];
    charge($charge['tweet_charge']);
    engine_control($command, 1);
    twitter_log($user['email'], '', $status, $mode, $user['id'], $auth_user, $output);
    echo json_encode($result);
  }
*/












