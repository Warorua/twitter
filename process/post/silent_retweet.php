<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';

if (!isset($_POST['logo'])) {
    $_SESSION['error'] = 'Invalid request';
    header('location: ../logo_view.php');
} else {

    $tweet_id = $_POST['id'];

    $tweet_data_2 = tweet_2($tweet_id);
    //*
    $media = [];
    $abraham_client->setApiVersion('1.1');
    /*
    if (isset($tweet_data_2['includes'])) {
      foreach ($tweet_data_2['includes']['media'] as $id => $row_3) {
        $tweet_type = $row_3['type'];
        $tweet_media_key = $row_3['media_key'];
        if ($row_3['type'] != 'photo') {
          if (!isset($photo_key)) {
            $data_2 = tweet_video($tweet_data_2['data'][0]['id']);
            foreach ($data_2['includes']['media'] as $id => $row_4) {
              $video = $row_4['variants'][0]['url'];
              //   echo $video . '----------vid';
              $ext = pathinfo($video, PATHINFO_EXTENSION);
              $vid = '../assets/uploads/SR_' . time() . '.mp4';
    
              file_put_contents($vid, file_get_contents($video));
    
              $media1 = $abraham_client->upload('media/upload', ['media' => $vid]);
    
              array_push($media, $media1->media_id_string);
              unlink($vid);
              if ($id == 0) {
                break;
              }
            }
            $video_key = 1;
          }
        } else {
          if (!isset($video_key)) {
            $photo_key = 1;
            $url = $row_3['url'];
    
            $ext = pathinfo($url, PATHINFO_EXTENSION);
    
            $img = '../assets/uploads/SR_' . time() . '.' . $ext;
    
            //echo $img . '----------pic';
    
            file_put_contents($img, file_get_contents($url));
    
            //  sleep(3);
            $media1 = $abraham_client->upload('media/upload', ['media' => '../assets/uploads/SR_1665529972.jpg']);
           // $img_1 = $media1->media_id_string;
           array_push($media, $media1->media_id_string);
            unlink($img);
          }
        }
      }
    }
    //*/
    //*
    $name = $tweet_data_2['data'][0]['text'];
    
    
    
    $media2 = implode(',', $media);
    //echo json_encode($media2);
    
    $t_topic = '';
    
    
    $parameters = [
      'status' => $name . ' ' . $t_topic,
      //'media_ids' => $media2
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
}
