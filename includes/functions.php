<?php
 
 function charge($charge_points)
 {
   global $user;
   global $pdo;
   global $parent_url;
   $conn = $pdo->open();
 
   if ($user['p_cipher'] == 0) {
     $init_points = $user['p_value'];
   } else {
     $init_points = safeDecrypt($user['p_value'], $user['p_key']);
   }
 
   if ($init_points < $charge_points) {
     echo 'Gas points depleted or insufficient!';
     //header('location: ' . $parent_url . '/account/overview.php');
     return exit();
   } else {
     $raw_points = floatval($init_points) - $charge_points;
 
     if ($user['p_cipher'] == 0) {
       $cipher_points = $raw_points;
     } else {
       $cipher_points = safeEncrypt($raw_points, $user['p_key']);
     }
 
 
 
     $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_cipher=:p_cipher WHERE id=:id");
     $stmt->execute(['id' => $user['id'], 'p_value' => $cipher_points, 'p_cipher' => $user['p_cipher']]);
   }
 }
 
 function init_charge($charge_points){
   global $user;
   if ($user['p_cipher'] == 0) {
     $init_points = $user['p_value'];
   } else {
     $init_points = safeDecrypt($user['p_value'], $user['p_key']);
   }
  $value = $init_points/$charge_points;
 
  return $value;
 
 }
 
 function user_tweets($username, int $number)
 {
   global $bird_elephant;
   $user = $bird_elephant->user($username);
   $params = [
     'max_results' => $number,
   ];
   $tweet = $user->tweets($params);
   $val_1 = json_encode($tweet, TRUE);
   $val_2 = json_decode($val_1, TRUE);
 
   return $val_2;
 }
 
 function number_format_short($n, $precision = 1)
 {
   if ($n < 900) {
     // 0 - 900
     $n_format = number_format($n, $precision);
     $suffix = '';
   } else if ($n < 900000) {
     // 0.9k-850k
     $n_format = number_format($n / 1000, $precision);
     $suffix = 'K';
   } else if ($n < 900000000) {
     // 0.9m-850m
     $n_format = number_format($n / 1000000, $precision);
     $suffix = 'M';
   } else if ($n < 900000000000) {
     // 0.9b-850b
     $n_format = number_format($n / 1000000000, $precision);
     $suffix = 'B';
   } else {
     // 0.9t+
     $n_format = number_format($n / 1000000000000, $precision);
     $suffix = 'T';
   }
   // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
   // Intentionally does not affect partials, eg "1.50" -> "1.50"
   if ($precision > 0) {
     $dotzero = '.' . str_repeat('0', $precision);
     $n_format = str_replace($dotzero, '', $n_format);
   }
   return $n_format . $suffix;
 }
 
 function tweet($id)
 {
   global $abraham_client;
   $abraham_client->setApiVersion('2');
   $data = $abraham_client->get('tweets', [
     'ids' => $id,
     'expansions' => 'attachments.media_keys',
     'media.fields' => 'preview_image_url',
     'media.fields' => 'url',
 
   ]);
   $val_1 = json_encode($data, TRUE);
   $val_2 = json_decode($val_1, TRUE);
 
   return $val_2;
 }
 
 function tweet_2($id)
 {
   global $abraham_client;
   $abraham_client->setApiVersion('2');
   $data = $abraham_client->get('tweets', [
     'ids' => $id,
     'expansions' => 'attachments.media_keys',
     'media.fields' => 'preview_image_url',
     'media.fields' => 'url',
 
   ]);
   $val_1 = json_encode($data, TRUE);
   $val_2 = json_decode($val_1, TRUE);
 
   return $val_2;
 }
 
 function tweet_video($id)
 {
   global $abraham_client;
   $abraham_client->setApiVersion('2');
   $data = $abraham_client->get('tweets', [
     'ids' => $id,
     'expansions' => 'attachments.media_keys',
     'media.fields' => 'variants',
 
   ]);
   $val_1 = json_encode($data, TRUE);
   $val_2 = json_decode($val_1, TRUE);
 
   return $val_2;
 }
 
 function user_followers($username, $number)
 {
   global $bird_elephant;
   $followers = $bird_elephant->user($username)->following([
     'max_results' => $number,
     'user.fields' => 'profile_image_url'
   ]);
   $val_1 = json_encode($followers, TRUE);
   $val_2 = json_decode($val_1, TRUE);
 
   return $val_2;
 }
 
 function user_following($username, $number)
 {
   global $bird_elephant;
   $following = $bird_elephant->user($username)->following([
     'max_results' => $number,
     'user.fields' => 'profile_image_url'
   ]);
   $val_1 = json_encode($following, TRUE);
   $val_2 = json_decode($val_1, TRUE);
 
   return $val_2;
 }
 
 function array_convert($array)
 {
   $val_1 = json_encode($array, TRUE);
   $val_2 = json_decode($val_1, TRUE);
 
   return $val_2;
 }
 
 function liking_users($id)
 {
   global $tweet_client;
   $likers = $tweet_client->getLikingUsers($id);
 
   $data = array_convert($likers);
 
   return $data;
 }
 
 function retweeting_users($id)
 {
   global $tweet_client;
   $retweeting = $tweet_client->getRetweetedByUsers($id);
 
   $data = array_convert($retweeting);
 
   return $data;
 }
 
 function get_followers($id)
 {
   global $user_client;
   $followers = $user_client->getFollowers($id);
 
   $data = array_convert($followers);
 
   return $data;
 }
 
 function get_following($id)
 {
   global $user_client;
   $following = $user_client->getFollowing($id);
 
   $data = array_convert($following);
 
   return $data;
 }
 
 function where_quoted($id)
 {
   global $tweet_client;
   $where_quoted = $tweet_client->getQuoteTweets($id);
 
   $data = array_convert($where_quoted);
 
   return $data;
 }
 
 function liked_tweets($id)
 {
   global $user_client;
   $liked_tweets = $user_client->getLikedTweets($id)->all();
 
   $data = array_convert($liked_tweets);
 
   return $data;
 }
 
 function user_mention($id)
 {
   global $noweh_client;
   $return = $noweh_client->timeline()->findRecentMentioningForUserId($id)->performRequest();
 
   $data = array_convert($return);
 
   return $data;
 }
 
 function main_tweet($id)
 {
   global $tweet_client;
   $tweet = array_convert($tweet_client->getTweet($id));
 
   $twt = $tweet['data']['referenced_tweets'][0]['id'];
 
   return $twt;
 }
 
 function user_metrics($id)
 {
   global $user_client;
   $user_metrics = array_convert($user_client->getUserById($id));
 
   return $user_metrics;
 }
 
 function pic_fix($img)
 {
   $ext = pathinfo($img, PATHINFO_EXTENSION);
   $variable = substr($img, 0, strpos($img, "normal." . $ext));
   $img = $variable . '400x400.' . $ext;
   return $img;
 }
 
 function like_tweet($auth_user, $tweet_id)
 {
   global $tweet_client;
   $statues = $tweet_client->likeTweet($auth_user, $tweet_id);
   $res = array_convert($statues);
 
   return $res;
 }
 
 function unlike_tweet($auth_user, $tweet_id)
 {
   global $tweet_client;
   global $charge;
   $statues = $tweet_client->unlikeTweet($auth_user, $tweet_id);
   charge($charge['like_charge']);
   $res = array_convert($statues);
 
   return $res;
 }
 
 function tweet_reply_liker($auth_user, $tweet_with_replies, $limit)
 {
   global $abraham_client;
   global $charge;
   $abraham_client->setApiVersion('2');
   $data = $abraham_client->get('tweets/search/recent', [
     "query" => 'in_reply_to_status_id:' . $tweet_with_replies,
     "max_results" => $limit,
     'tweet.fields' => 'conversation_id',
 
   ]);
   $dt_2 = array_convert($data);
   $response = '';
 
   $limit = init_charge($charge['like_charge']);
   $charge_pts = 0;
 
   foreach ($dt_2['data'] as $id=> $row) {
     $response .= like_tweet($auth_user, $row['id']);
 
     $charge_pts += $charge['like_charge'];
     if($id >= $limit){
       break;
     }
 
   }
 
   charge($charge_pts);
 
   return json_encode($response);
 }
 
 
 function engine_control($command, $count)
 {
   global $pdo;
   global $user;
   $conn = $pdo->open();
   $stmt = $conn->prepare("INSERT INTO engine_monitor (user, command, count) VALUES (:user, :command, :count)");
   $stmt->execute(['user'=>$user['t_id'], 'command' => $command, 'count' => $count]);
 }
 
 function time_sub($date, $unit)
 {
   $a = date_create($date);
   $b = date_create(date('Y-m-d H:i:s'));
   $interval = date_diff($b, $a);
   $hrs = 0;
   if($interval->format("%d") != '0'){
     $hrs = $interval->format("%d") * 24;
   }
   $mmm = $unit;
   return $interval->format("%H")+$hrs;
 }
 
 
 function tweet_reply_retweeter($auth_user, $tweet_with_replies, $limit)
 {
   global $abraham_client;
   global $tweet_client;
   global $charge;
   $abraham_client->setApiVersion('2');
   $data = $abraham_client->get('tweets/search/recent', [
     "query" => 'in_reply_to_status_id:' . $tweet_with_replies,
     "max_results" => $limit,
     'tweet.fields' => 'conversation_id',
 
   ]);
   $dt_2 = array_convert($data);
   $response = '';
   
   $limit = init_charge($charge['tweet_charge']);
   $charge_pts = 0;
   
   foreach ($dt_2['data'] as $id=> $row) {
      $response .= $tweet_client->retweet($auth_user, $row['id']);
 
     $charge_pts += $charge['tweet_charge'];
     if($id >= $limit){
       break;
     }
   }
   charge($charge_pts);
   return json_encode($response);
 }
 
 
 function follow($account_id_to_follow)
 {
   global $user_client;
   global $user;
   $data = $user_client->follow($user['t_id'], $account_id_to_follow);
   return array_convert($data);
 }

 function unfollow($account_id_to_unfollow)
 {
   global $user_client;
   global $user;
   $data = $user_client->unfollow($user['t_id'], $account_id_to_unfollow);
   return array_convert($data);
 }
 
 function tweet_reply_follower($tweet_with_replies, $limit)
 {
   global $abraham_client;
   global $charge;
   $abraham_client->setApiVersion('2');
   $data = $abraham_client->get('tweets/search/recent', [
     "query" => 'in_reply_to_status_id:' . $tweet_with_replies,
     "max_results" => $limit,
     'tweet.fields' => 'author_id',
 
   ]);
   $dt_2 = array_convert($data);
   $response = '';
   
   $limit = init_charge($charge['follow_charge']);
   $charge_pts = 0;
 
   if (isset($dt_2['data'])) {
     if (count($dt_2['data']) > 1) {
       foreach ($dt_2['data'] as $id => $row) {
         $id_of_user = $row['author_id'];
         follow($id_of_user);
 
         $charge_pts += $charge['follow_charge'];
         if ($id >= $limit) {
           break;
         }
       }
       charge($charge_pts);
     }
     $response = '1';
   } else {
     $response = '0';
   }
   return json_encode($response);
 }
 
 function httpPost($url, $data)
 {
     try {
         $ch = curl_init($url);
         if ($ch === false) {
             throw new Exception('failed to initialize');
         }
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $response = curl_exec($ch);
         if ($response === false) {
             throw new Exception(curl_error($ch), curl_errno($ch));
         }
     } catch (Exception $e) {
 
         trigger_error(
             sprintf(
                 'Curl failed with error #%d: %s',
                 $e->getCode(),
                 $e->getMessage()
             ),
             E_USER_ERROR
         );
     } finally {
         // Close curl handle unless it failed to initialize
         if (is_resource($ch)) {
             curl_close($ch);
         }
     }
 
     return $response;
 }
 
 
 
 function queueLoad()
 {
   global $pdo;
   global $user;
   global $api_app;
   $conn = $pdo->open();
 
   $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM twitter_logs WHERE user_id=:id");
   $stmt->execute(['id' => $user['id']]);
   $ct_data = $stmt->fetch();
 
   if ($ct_data['numrows'] > 0) {
     $stmt = $conn->prepare("SELECT * FROM twitter_logs WHERE user_id=:id ORDER BY id DESC LIMIT 1");
     $stmt->execute(['id' => $user['id']]);
     $data = $stmt->fetch();
 
     if ((time() - strtotime($data['time'])) < 900) {
 
       $method = $_SERVER['REQUEST_METHOD'];
       if ($method == 'POST') {
         $js_obj =  json_encode($_POST);
       } else {
         $js_obj =  json_encode($_GET);
       }
 
       $stmt = $conn->prepare("SELECT * FROM process_engine WHERE user_id=:id ORDER BY id DESC LIMIT 1");
       $stmt->execute(['id' => $user['id']]);
       $data_2 = $stmt->fetch();
 
       if($data_2){
         $exec_time = $data_2['execution'] + 900;
       }else{
         $exec_time = strtotime($data['time']) + 900;
       }
 
       $page = $_SERVER['PHP_SELF'];
       $method = $_SERVER['REQUEST_METHOD'];
       
       $stmt = $conn->prepare("INSERT INTO process_engine (request_method,page,object,access_token,access_secret, execution, user_id) VALUES (:req, :page, :object, :access_token, :access_secret, :execution, :user_id)");
       $stmt->execute(['req' => $method, 'page' => $page, 'object' => $js_obj, 'access_token' => $api_app['access_token'], 'access_secret' => $api_app['access_secret'], 'execution' => $exec_time, 'user_id' => $user['id']]);
      return exit('Operation added to queue');
     }
   }
 }
 
 
 function tweet_reply_printer($tweet_with_replies, $limit)
 {
   global $abraham_client;
   $abraham_client->setApiVersion('2');
   $data = $abraham_client->get('tweets/search/recent', [
     "query" => 'in_reply_to_status_id:' . $tweet_with_replies,
     "max_results" => $limit,
     'tweet.fields' => 'author_id',
 
   ]);
   $dt_2 = array_convert($data);
   return $dt_2;
 }
     
 function safeEncrypt(string $message, string $key): string
 {
     if (mb_strlen($key, '8bit') !== SODIUM_CRYPTO_SECRETBOX_KEYBYTES) {
         throw new RangeException('Key is not the correct size (must be 32 bytes).');
     }
     $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
     
     $cipher = base64_encode(
         $nonce.
         sodium_crypto_secretbox(
             $message,
             $nonce,
             $key
         )
     );
     sodium_memzero($message);
     sodium_memzero($key);
     return $cipher;
 }
 
 function safeDecrypt(string $encrypted, string $key): string
 {   
     $decoded = base64_decode($encrypted);
     $nonce = mb_substr($decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
     $ciphertext = mb_substr($decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');
     
     $plain = sodium_crypto_secretbox_open(
         $ciphertext,
         $nonce,
         $key
     );
     if (!is_string($plain)) {
         throw new Exception('Invalid MAC');
     }
     sodium_memzero($ciphertext);
     sodium_memzero($key);
     return $plain;
 }
 
 
 function base64_to_jpeg($base64_string, $output_file)
 {
   // open the output file for writing
   $ifp = fopen($output_file, 'wb');
 
   // split the string on commas
   // $data[ 0 ] == "data:image/png;base64"
   // $data[ 1 ] == <actual base64 string>
   $data = explode(',', $base64_string);
 
   // we could add validation here with ensuring count( $data ) > 1
   fwrite($ifp, base64_decode($data[1]));
 
   // clean up the file resource
   fclose($ifp);
 
   return $output_file;
 }
 
 

?>