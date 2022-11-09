<?php
ini_set('max_execution_time', 180);
include '../../includes/conn.php';

//*

$stmt = $conn->prepare("SELECT *  FROM tweet_factory WHERE automation<:time LIMIT 10");
$stmt->execute(['time' => time()]);
$data = $stmt->fetchAll();

foreach ($data as $row) {
    $next_automation = time() + floatval($row['execution']);
    $next_automation_id = $row['id'];
    
    $file_name = "../../process/client/tweet_factory/" . $row['file_path'];




    $data_c = json_decode(file_get_contents($file_name), true);
    if (isset($data_c['media'])) {
      $data_size = count($data_c) - 1;
    } else {
      $data_size = count($data_c);
    }
  
    $text = '';
    for ($a = 0; $a < $data_size; $a++) {
      $arr = $data_c[$a];
      $key = array_rand($arr);
      $text .= $arr[$key] . ' ';
    }
  
    echo $text . '<br/>';
  
    if (isset($data_c['media'])) {
  
      $arr2 = $data_c['media'];
      $key2 = array_rand($arr2);
  
      $media = $arr2[$key2];
      echo $media;
    } else {
        $media = '';
    }
    // unset($_SESSION['postgrammar_2']);






    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id' => $row['user_id']]);

    $client_load = $stmt->fetch();

    $auth_key = $_SESSION['access_token'] = array('oauth_token' => $client_load['access_token'], 'oauth_token_secret' => $client_load['access_secret']);

    $auth_code = json_encode($auth_key);


    $_GET = array('bot_id' => $client_load['id'], 'auth_key' => $auth_code);

    include '../../includes/session.php';
    require '../../vendor/autoload.php';
    include '../../includes/api_config.php';

   
    ///////////////////////////////////////////////TWEET


    $charge_points  =    $charge['tweet_charge'];
    if ($user['p_cipher'] == 0) {
        $init_points = $user['p_value'];
    } else {
        $init_points = safeDecrypt($user['p_value'], $user['p_key']);
    }

    if ($init_points < $charge_points) {
        $output =  'Gas points depleted or insufficient!';
        //header('location: ' . $parent_url . '/account/user');
        $mode = 'T0';
        $status = 0;
        $command = 'tweet';
    } else {
        $raw_points = floatval($init_points) - $charge_points;

        if ($user['p_cipher'] == 0) {
            $cipher_points = $raw_points;
        } else {
            $cipher_points = safeEncrypt($raw_points, $user['p_key']);
        }

        $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_cipher=:p_cipher WHERE id=:id");
        $stmt->execute(['id' => $user['id'], 'p_value' => $cipher_points, 'p_cipher' => $user['p_cipher']]);
        //////////////////////////////////////////////////////////////////////////////////////////////////

        if(is_array($media)){
            $media2 = implode(',', $media);
        }else{
            $media2 = $media;
        }
        

        $t_topic = '';


        $parameters = [
            'status' => $text . ' ' . $t_topic,
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
            $message = 'Tweet success!<br/><br/>';
        }
        $output =  $message;
    }


    $auth_user = $user['t_id'];

    engine_control($command, 1);
    twitter_log($user['email'], '', $status, $mode, $user['id'], $auth_user, $output);

    echo $output;


    //////////////////////////////////////////TWEET


    $stmt = $conn->prepare("UPDATE tweet_factory SET automation=:automation WHERE id=:id");
    $stmt->execute(['id' => $next_automation_id, 'automation' => $next_automation]);
}
