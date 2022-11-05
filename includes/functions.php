<?php
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

function usageTrack($points, $action)
{
  global $user;
  global $pdo;
  global $api_consumer_key;
  global $system;
  global $api_app_level;
  $conn = $pdo->open();
  $time = time();
  if (isset($api_consumer_key)) {
    $con_key = $api_consumer_key;
  } else {
    $con_key = $system['consumer_key'];
  }

  if (isset($api_app_level)) {
    $con_level = $api_app_level;
  } else {
    $con_level = 2;
  }

  $stmt = $conn->prepare("INSERT INTO usage_track (time, points, user_id, action, consumer_key, level) VALUES (:time, :points, :user_id, :action, :consumer_key, :level)");
  $stmt->execute(['time' => $time, 'points' => $points, 'user_id' => $user['id'], 'action' => $action, 'consumer_key' => $con_key, 'level' => $con_level]);
}

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
     //header('location: ' . $parent_url . '/account/user');
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

    usageTrack($charge_points, '');
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
 
 
$fontsMap = array("taiVietCharMap", "futureAlienCharMap", "squiggle6CharMap", "squiggle5CharMap", "asianStyle2CharMap", "asianStyleCharMap", "squaresCharMap", "squiggle4CharMap", "neonCharMap", "squiggle3CharMap", "monospaceCharMap", "boldItalicCharMap", "boldCharMap", "boldSansCharMap", "italicCharMap", "squiggle2CharMap", "currencyCharMap", "symbolsCharMap", "greekCharMap", "bentTextCharMap", "upperAnglesCharMap", "subscriptCharMap", "superscriptCharMap", "squiggleCharMap", "doubleStruckCharMap", "medievalCharMap", "invertedSquaresCharMap", "cursiveCharMap", "oldEnglishCharMap", "wideTextCharMap",);

function tweetfont($fontname, $string)
{

   global $fontsMap;
   $taiVietCharMap = array("0" => "ᦲ", "1" => "᧒", "2" => "ᒿ", "3" => "ᗱ", "4" => "ᔰ", "5" => "Ƽ", "6" => "ᦆ", "7" => "ᒣ", "8" => "Ზ", "9" => "ၦ", "a" => "ꪖ", "b" => "᥇", "c" => "ᥴ", "d" => "ᦔ", "e" => "ꫀ", "f" => "ᠻ", "g" => "ᧁ", "h" => "ꫝ", "i" => "꠸", "j" => "꠹", "k" => "ᛕ", "l" => "ꪶ", "m" => "ꪑ", "n" => "ꪀ", "o" => "ꪮ", "p" => "ρ", "q" => "ꪇ", "r" => "᥅", "s" => "ᦓ", "t" => "ꪻ", "u" => "ꪊ", "v" => "ꪜ", "w" => "᭙", "x" => "᥊", "y" => "ꪗ", "z" => "ƺ", "A" => "ꪖ", "B" => "᥇", "C" => "ᥴ", "D" => "ᦔ", "E" => "ꫀ", "F" => "ᠻ", "G" => "ᧁ", "H" => "ꫝ", "I" => "꠸", "J" => "꠹", "K" => "ᛕ", "L" => "ꪶ", "M" => "ꪑ", "N" => "ꪀ", "O" => "ꪮ", "P" => "ρ", "Q" => "ꪇ", "R" => "᥅", "S" => "ᦓ", "T" => "ꪻ", "U" => "ꪊ", "V" => "ꪜ", "W" => "᭙", "X" => "᥊", "Y" => "ꪗ", "Z" => "ƺ");
   $futureAlienCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "ᗩ", "b" => "ᗷ", "c" => "ᑢ", "d" => "ᕲ", "e" => "ᘿ", "f" => "ᖴ", "g" => "ᘜ", "h" => "ᕼ", "i" => "ᓰ", "j" => "ᒚ", "k" => "ᖽᐸ", "l" => "ᒪ", "m" => "ᘻ", "n" => "ᘉ", "o" => "ᓍ", "p" => "ᕵ", "q" => "ᕴ", "r" => "ᖇ", "s" => "S", "t" => "ᖶ", "u" => "ᑘ", "v" => "ᐺ", "w" => "ᘺ", "x" => "᙭", "y" => "ᖻ", "z" => "ᗱ", "A" => "ᗩ", "B" => "ᗷ", "C" => "ᑢ", "D" => "ᕲ", "E" => "ᘿ", "F" => "ᖴ", "G" => "ᘜ", "H" => "ᕼ", "I" => "ᓰ", "J" => "ᒚ", "K" => "ᖽᐸ", "L" => "ᒪ", "M" => "ᘻ", "N" => "ᘉ", "O" => "ᓍ", "P" => "ᕵ", "Q" => "ᕴ", "R" => "ᖇ", "S" => "S", "T" => "ᖶ", "U" => "ᑘ", "V" => "ᐺ", "W" => "ᘺ", "X" => "᙭", "Y" => "ᖻ", "Z" => "ᗱ");
   $squiggle6CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "ค", "b" => "๖", "c" => "¢", "d" => "໓", "e" => "ē", "f" => "f", "g" => "ງ", "h" => "h", "i" => "i", "j" => "ว", "k" => "k", "l" => "l", "m" => "๓", "n" => "ຖ", "o" => "໐", "p" => "p", "q" => "๑", "r" => "r", "s" => "Ş", "t" => "t", "u" => "น", "v" => "ง", "w" => "ຟ", "x" => "x", "y" => "ฯ", "z" => "ຊ", "A" => "ค", "B" => "๖", "C" => "¢", "D" => "໓", "E" => "ē", "F" => "f", "G" => "ງ", "H" => "h", "I" => "i", "J" => "ว", "K" => "k", "L" => "l", "M" => "๓", "N" => "ຖ", "O" => "໐", "P" => "p", "Q" => "๑", "R" => "r", "S" => "Ş", "T" => "t", "U" => "น", "V" => "ง", "W" => "ຟ", "X" => "x", "Y" => "ฯ", "Z" => "ຊ");
   $squiggle5CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "ą", "b" => "ც", "c" => "ƈ", "d" => "ɖ", "e" => "ɛ", "f" => "ʄ", "g" => "ɠ", "h" => "ɧ", "i" => "ı", "j" => "ʝ", "k" => "ƙ", "l" => "Ɩ", "m" => "ɱ", "n" => "ŋ", "o" => "ơ", "p" => "℘", "q" => "զ", "r" => "ཞ", "s" => "ʂ", "t" => "ɬ", "u" => "ų", "v" => "۷", "w" => "ῳ", "x" => "ҳ", "y" => "ყ", "z" => "ʑ", "A" => "ą", "B" => "ც", "C" => "ƈ", "D" => "ɖ", "E" => "ɛ", "F" => "ʄ", "G" => "ɠ", "H" => "ɧ", "I" => "ı", "J" => "ʝ", "K" => "ƙ", "L" => "Ɩ", "M" => "ɱ", "N" => "ŋ", "O" => "ơ", "P" => "℘", "Q" => "զ", "R" => "ཞ", "S" => "ʂ", "T" => "ɬ", "U" => "ų", "V" => "۷", "W" => "ῳ", "X" => "ҳ", "Y" => "ყ", "Z" => "ʑ");
   $asianStyle2CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "ﾑ", "b" => "乃", "c" => "ᄃ", "d" => "り", "e" => "乇", "f" => "ｷ", "g" => "ム", "h" => "ん", "i" => "ﾉ", "j" => "ﾌ", "k" => "ズ", "l" => "ﾚ", "m" => "ﾶ", "n" => "刀", "o" => "の", "p" => "ｱ", "q" => "ゐ", "r" => "尺", "s" => "丂", "t" => "ｲ", "u" => "ひ", "v" => "√", "w" => "W", "x" => "ﾒ", "y" => "ﾘ", "z" => "乙", "A" => "ﾑ", "B" => "乃", "C" => "ᄃ", "D" => "り", "E" => "乇", "F" => "ｷ", "G" => "ム", "H" => "ん", "I" => "ﾉ", "J" => "ﾌ", "K" => "ズ", "L" => "ﾚ", "M" => "ﾶ", "N" => "刀", "O" => "の", "P" => "ｱ", "Q" => "ゐ", "R" => "尺", "S" => "丂", "T" => "ｲ", "U" => "ひ", "V" => "√", "W" => "W", "X" => "ﾒ", "Y" => "ﾘ", "Z" => "乙");
   $asianStyleCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "卂", "b" => "乃", "c" => "匚", "d" => "ᗪ", "e" => "乇", "f" => "千", "g" => "Ꮆ", "h" => "卄", "i" => "丨", "j" => "ﾌ", "k" => "Ҝ", "l" => "ㄥ", "m" => "爪", "n" => "几", "o" => "ㄖ", "p" => "卩", "q" => "Ɋ", "r" => "尺", "s" => "丂", "t" => "ㄒ", "u" => "ㄩ", "v" => "ᐯ", "w" => "山", "x" => "乂", "y" => "ㄚ", "z" => "乙", "A" => "卂", "B" => "乃", "C" => "匚", "D" => "ᗪ", "E" => "乇", "F" => "千", "G" => "Ꮆ", "H" => "卄", "I" => "丨", "J" => "ﾌ", "K" => "Ҝ", "L" => "ㄥ", "M" => "爪", "N" => "几", "O" => "ㄖ", "P" => "卩", "Q" => "Ɋ", "R" => "尺", "S" => "丂", "T" => "ㄒ", "U" => "ㄩ", "V" => "ᐯ", "W" => "山", "X" => "乂", "Y" => "ㄚ", "Z" => "乙");
   $squaresCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "🄰", "b" => "🄱", "c" => "🄲", "d" => "🄳", "e" => "🄴", "f" => "🄵", "g" => "🄶", "h" => "🄷", "i" => "🄸", "j" => "🄹", "k" => "🄺", "l" => "🄻", "m" => "🄼", "n" => "🄽", "o" => "🄾", "p" => "🄿", "q" => "🅀", "r" => "🅁", "s" => "🅂", "t" => "🅃", "u" => "🅄", "v" => "🅅", "w" => "🅆", "x" => "🅇", "y" => "🅈", "z" => "🅉", "A" => "🄰", "B" => "🄱", "C" => "🄲", "D" => "🄳", "E" => "🄴", "F" => "🄵", "G" => "🄶", "H" => "🄷", "I" => "🄸", "J" => "🄹", "K" => "🄺", "L" => "🄻", "M" => "🄼", "N" => "🄽", "O" => "🄾", "P" => "🄿", "Q" => "🅀", "R" => "🅁", "S" => "🅂", "T" => "🅃", "U" => "🅄", "V" => "🅅", "W" => "🅆", "X" => "🅇", "Y" => "🅈", "Z" => "🅉");
   $squiggle4CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "Ꮧ", "b" => "Ᏸ", "c" => "ፈ", "d" => "Ꮄ", "e" => "Ꮛ", "f" => "Ꭶ", "g" => "Ꮆ", "h" => "Ꮒ", "i" => "Ꭵ", "j" => "Ꮰ", "k" => "Ꮶ", "l" => "Ꮭ", "m" => "Ꮇ", "n" => "Ꮑ", "o" => "Ꭷ", "p" => "Ꭾ", "q" => "Ꭴ", "r" => "Ꮢ", "s" => "Ꮥ", "t" => "Ꮦ", "u" => "Ꮼ", "v" => "Ꮙ", "w" => "Ꮗ", "x" => "ጀ", "y" => "Ꭹ", "z" => "ፚ", "A" => "Ꮧ", "B" => "Ᏸ", "C" => "ፈ", "D" => "Ꮄ", "E" => "Ꮛ", "F" => "Ꭶ", "G" => "Ꮆ", "H" => "Ꮒ", "I" => "Ꭵ", "J" => "Ꮰ", "K" => "Ꮶ", "L" => "Ꮭ", "M" => "Ꮇ", "N" => "Ꮑ", "O" => "Ꭷ", "P" => "Ꭾ", "Q" => "Ꭴ", "R" => "Ꮢ", "S" => "Ꮥ", "T" => "Ꮦ", "U" => "Ꮼ", "V" => "Ꮙ", "W" => "Ꮗ", "X" => "ጀ", "Y" => "Ꭹ", "Z" => "ፚ");
   $neonCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "ᗩ", "b" => "ᗷ", "c" => "ᑕ", "d" => "ᗪ", "e" => "E", "f" => "ᖴ", "g" => "G", "h" => "ᕼ", "i" => "I", "j" => "ᒍ", "k" => "K", "l" => "ᒪ", "m" => "ᗰ", "n" => "ᑎ", "o" => "O", "p" => "ᑭ", "q" => "ᑫ", "r" => "ᖇ", "s" => "ᔕ", "t" => "T", "u" => "ᑌ", "v" => "ᐯ", "w" => "ᗯ", "x" => "᙭", "y" => "Y", "z" => "ᘔ", "A" => "ᗩ", "B" => "ᗷ", "C" => "ᑕ", "D" => "ᗪ", "E" => "E", "F" => "ᖴ", "G" => "G", "H" => "ᕼ", "I" => "I", "J" => "ᒍ", "K" => "K", "L" => "ᒪ", "M" => "ᗰ", "N" => "ᑎ", "O" => "O", "P" => "ᑭ", "Q" => "ᑫ", "R" => "ᖇ", "S" => "ᔕ", "T" => "T", "U" => "ᑌ", "V" => "ᐯ", "W" => "ᗯ", "X" => "᙭", "Y" => "Y", "Z" => "ᘔ");
   $squiggle3CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "ǟ", "b" => "ɮ", "c" => "ƈ", "d" => "ɖ", "e" => "ɛ", "f" => "ʄ", "g" => "ɢ", "h" => "ɦ", "i" => "ɨ", "j" => "ʝ", "k" => "ӄ", "l" => "ʟ", "m" => "ʍ", "n" => "ռ", "o" => "օ", "p" => "ք", "q" => "զ", "r" => "ʀ", "s" => "ֆ", "t" => "ȶ", "u" => "ʊ", "v" => "ʋ", "w" => "ա", "x" => "Ӽ", "y" => "ʏ", "z" => "ʐ", "A" => "ǟ", "B" => "ɮ", "C" => "ƈ", "D" => "ɖ", "E" => "ɛ", "F" => "ʄ", "G" => "ɢ", "H" => "ɦ", "I" => "ɨ", "J" => "ʝ", "K" => "ӄ", "L" => "ʟ", "M" => "ʍ", "N" => "ռ", "O" => "օ", "P" => "ք", "Q" => "զ", "R" => "ʀ", "S" => "ֆ", "T" => "ȶ", "U" => "ʊ", "V" => "ʋ", "W" => "ա", "X" => "Ӽ", "Y" => "ʏ", "Z" => "ʐ");
   $monospaceCharMap = array("0" => "𝟶", "1" => "𝟷", "2" => "𝟸", "3" => "𝟹", "4" => "𝟺", "5" => "𝟻", "6" => "𝟼", "7" => "𝟽", "8" => "𝟾", "9" => "𝟿", "a" => "𝚊", "b" => "𝚋", "c" => "𝚌", "d" => "𝚍", "e" => "𝚎", "f" => "𝚏", "g" => "𝚐", "h" => "𝚑", "i" => "𝚒", "j" => "𝚓", "k" => "𝚔", "l" => "𝚕", "m" => "𝚖", "n" => "𝚗", "o" => "𝚘", "p" => "𝚙", "q" => "𝚚", "r" => "𝚛", "s" => "𝚜", "t" => "𝚝", "u" => "𝚞", "v" => "𝚟", "w" => "𝚠", "x" => "𝚡", "y" => "𝚢", "z" => "𝚣", "A" => "𝙰", "B" => "𝙱", "C" => "𝙲", "D" => "𝙳", "E" => "𝙴", "F" => "𝙵", "G" => "𝙶", "H" => "𝙷", "I" => "𝙸", "J" => "𝙹", "K" => "𝙺", "L" => "𝙻", "M" => "𝙼", "N" => "𝙽", "O" => "𝙾", "P" => "𝙿", "Q" => "𝚀", "R" => "𝚁", "S" => "𝚂", "T" => "𝚃", "U" => "𝚄", "V" => "𝚅", "W" => "𝚆", "X" => "𝚇", "Y" => "𝚈", "Z" => "𝚉");
   $boldItalicCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "𝙖", "b" => "𝙗", "c" => "𝙘", "d" => "𝙙", "e" => "𝙚", "f" => "𝙛", "g" => "𝙜", "h" => "𝙝", "i" => "𝙞", "j" => "𝙟", "k" => "𝙠", "l" => "𝙡", "m" => "𝙢", "n" => "𝙣", "o" => "𝙤", "p" => "𝙥", "q" => "𝙦", "r" => "𝙧", "s" => "𝙨", "t" => "𝙩", "u" => "𝙪", "v" => "𝙫", "w" => "𝙬", "x" => "𝙭", "y" => "𝙮", "z" => "𝙯", "A" => "𝘼", "B" => "𝘽", "C" => "𝘾", "D" => "𝘿", "E" => "𝙀", "F" => "𝙁", "G" => "𝙂", "H" => "𝙃", "I" => "𝙄", "J" => "𝙅", "K" => "𝙆", "L" => "𝙇", "M" => "𝙈", "N" => "𝙉", "O" => "𝙊", "P" => "𝙋", "Q" => "𝙌", "R" => "𝙍", "S" => "𝙎", "T" => "𝙏", "U" => "𝙐", "V" => "𝙑", "W" => "𝙒", "X" => "𝙓", "Y" => "𝙔", "Z" => "𝙕");
   $boldCharMap = array("0" => "𝟎", "1" => "𝟏", "2" => "𝟐", "3" => "𝟑", "4" => "𝟒", "5" => "𝟓", "6" => "𝟔", "7" => "𝟕", "8" => "𝟖", "9" => "𝟗", "a" => "𝐚", "b" => "𝐛", "c" => "𝐜", "d" => "𝐝", "e" => "𝐞", "f" => "𝐟", "g" => "𝐠", "h" => "𝐡", "i" => "𝐢", "j" => "𝐣", "k" => "𝐤", "l" => "𝐥", "m" => "𝐦", "n" => "𝐧", "o" => "𝐨", "p" => "𝐩", "q" => "𝐪", "r" => "𝐫", "s" => "𝐬", "t" => "𝐭", "u" => "𝐮", "v" => "𝐯", "w" => "𝐰", "x" => "𝐱", "y" => "𝐲", "z" => "𝐳", "A" => "𝐀", "B" => "𝐁", "C" => "𝐂", "D" => "𝐃", "E" => "𝐄", "F" => "𝐅", "G" => "𝐆", "H" => "𝐇", "I" => "𝐈", "J" => "𝐉", "K" => "𝐊", "L" => "𝐋", "M" => "𝐌", "N" => "𝐍", "O" => "𝐎", "P" => "𝐏", "Q" => "𝐐", "R" => "𝐑", "S" => "𝐒", "T" => "𝐓", "U" => "𝐔", "V" => "𝐕", "W" => "𝐖", "X" => "𝐗", "Y" => "𝐘", "Z" => "𝐙");
   $boldSansCharMap = array("0" => "𝟬", "1" => "𝟭", "2" => "𝟮", "3" => "𝟯", "4" => "𝟰", "5" => "𝟱", "6" => "𝟲", "7" => "𝟳", "8" => "𝟴", "9" => "𝟵", "a" => "𝗮", "b" => "𝗯", "c" => "𝗰", "d" => "𝗱", "e" => "𝗲", "f" => "𝗳", "g" => "𝗴", "h" => "𝗵", "i" => "𝗶", "j" => "𝗷", "k" => "𝗸", "l" => "𝗹", "m" => "𝗺", "n" => "𝗻", "o" => "𝗼", "p" => "𝗽", "q" => "𝗾", "r" => "𝗿", "s" => "𝘀", "t" => "𝘁", "u" => "𝘂", "v" => "𝘃", "w" => "𝘄", "x" => "𝘅", "y" => "𝘆", "z" => "𝘇", "A" => "𝗔", "B" => "𝗕", "C" => "𝗖", "D" => "𝗗", "E" => "𝗘", "F" => "𝗙", "G" => "𝗚", "H" => "𝗛", "I" => "𝗜", "J" => "𝗝", "K" => "𝗞", "L" => "𝗟", "M" => "𝗠", "N" => "𝗡", "O" => "𝗢", "P" => "𝗣", "Q" => "𝗤", "R" => "𝗥", "S" => "𝗦", "T" => "𝗧", "U" => "𝗨", "V" => "𝗩", "W" => "𝗪", "X" => "𝗫", "Y" => "𝗬", "Z" => "𝗭");
   $italicCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "𝘢", "b" => "𝘣", "c" => "𝘤", "d" => "𝘥", "e" => "𝘦", "f" => "𝘧", "g" => "𝘨", "h" => "𝘩", "i" => "𝘪", "j" => "𝘫", "k" => "𝘬", "l" => "𝘭", "m" => "𝘮", "n" => "𝘯", "o" => "𝘰", "p" => "𝘱", "q" => "𝘲", "r" => "𝘳", "s" => "𝘴", "t" => "𝘵", "u" => "𝘶", "v" => "𝘷", "w" => "𝘸", "x" => "𝘹", "y" => "𝘺", "z" => "𝘻", "A" => "𝘈", "B" => "𝘉", "C" => "𝘊", "D" => "𝘋", "E" => "𝘌", "F" => "𝘍", "G" => "𝘎", "H" => "𝘏", "I" => "𝘐", "J" => "𝘑", "K" => "𝘒", "L" => "𝘓", "M" => "𝘔", "N" => "𝘕", "O" => "𝘖", "P" => "𝘗", "Q" => "𝘘", "R" => "𝘙", "S" => "𝘚", "T" => "𝘛", "U" => "𝘜", "V" => "𝘝", "W" => "𝘞", "X" => "𝘟", "Y" => "𝘠", "Z" => "𝘡");
   $squiggle2CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "α", "b" => "Ⴆ", "c" => "ƈ", "d" => "ԃ", "e" => "ҽ", "f" => "ϝ", "g" => "ɠ", "h" => "ԋ", "i" => "ι", "j" => "ʝ", "k" => "ƙ", "l" => "ʅ", "m" => "ɱ", "n" => "ɳ", "o" => "σ", "p" => "ρ", "q" => "ϙ", "r" => "ɾ", "s" => "ʂ", "t" => "ƚ", "u" => "υ", "v" => "ʋ", "w" => "ɯ", "x" => "x", "y" => "ყ", "z" => "ȥ", "A" => "A", "B" => "B", "C" => "C", "D" => "D", "E" => "E", "F" => "F", "G" => "G", "H" => "H", "I" => "I", "J" => "J", "K" => "K", "L" => "L", "M" => "M", "N" => "N", "O" => "O", "P" => "P", "Q" => "Q", "R" => "R", "S" => "S", "T" => "T", "U" => "U", "V" => "V", "W" => "W", "X" => "X", "Y" => "Y", "Z" => "Z");
   $currencyCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "₳", "b" => "฿", "c" => "₵", "d" => "Đ", "e" => "Ɇ", "f" => "₣", "g" => "₲", "h" => "Ⱨ", "i" => "ł", "j" => "J", "k" => "₭", "l" => "Ⱡ", "m" => "₥", "n" => "₦", "o" => "Ø", "p" => "₱", "q" => "Q", "r" => "Ɽ", "s" => "₴", "t" => "₮", "u" => "Ʉ", "v" => "V", "w" => "₩", "x" => "Ӿ", "y" => "Ɏ", "z" => "Ⱬ", "A" => "₳", "B" => "฿", "C" => "₵", "D" => "Đ", "E" => "Ɇ", "F" => "₣", "G" => "₲", "H" => "Ⱨ", "I" => "ł", "J" => "J", "K" => "₭", "L" => "Ⱡ", "M" => "₥", "N" => "₦", "O" => "Ø", "P" => "₱", "Q" => "Q", "R" => "Ɽ", "S" => "₴", "T" => "₮", "U" => "Ʉ", "V" => "V", "W" => "₩", "X" => "Ӿ", "Y" => "Ɏ", "Z" => "Ⱬ");
   $symbolsCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "å", "b" => "ß", "c" => "¢", "d" => "Ð", "e" => "ê", "f" => "£", "g" => "g", "h" => "h", "i" => "ï", "j" => "j", "k" => "k", "l" => "l", "m" => "m", "n" => "ñ", "o" => "ð", "p" => "þ", "q" => "q", "r" => "r", "s" => "§", "t" => "†", "u" => "µ", "v" => "v", "w" => "w", "x" => "x", "y" => "¥", "z" => "z", "A" => "Ä", "B" => "ß", "C" => "Ç", "D" => "Ð", "E" => "È", "F" => "£", "G" => "G", "H" => "H", "I" => "Ì", "J" => "J", "K" => "K", "L" => "L", "M" => "M", "N" => "ñ", "O" => "Ö", "P" => "þ", "Q" => "Q", "R" => "R", "S" => "§", "T" => "†", "U" => "Ú", "V" => "V", "W" => "W", "X" => "×", "Y" => "¥", "Z" => "Z");
   $greekCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "α", "b" => "в", "c" => "¢", "d" => "∂", "e" => "є", "f" => "ƒ", "g" => "g", "h" => "н", "i" => "ι", "j" => "נ", "k" => "к", "l" => "ℓ", "m" => "м", "n" => "η", "o" => "σ", "p" => "ρ", "q" => "q", "r" => "я", "s" => "ѕ", "t" => "т", "u" => "υ", "v" => "ν", "w" => "ω", "x" => "χ", "y" => "у", "z" => "z", "A" => "α", "B" => "в", "C" => "¢", "D" => "∂", "E" => "є", "F" => "ƒ", "G" => "g", "H" => "н", "I" => "ι", "J" => "נ", "K" => "к", "L" => "ℓ", "M" => "м", "N" => "η", "O" => "σ", "P" => "ρ", "Q" => "q", "R" => "я", "S" => "ѕ", "T" => "т", "U" => "υ", "V" => "ν", "W" => "ω", "X" => "χ", "Y" => "у", "Z" => "z");
   $bentTextCharMap = array("0" => "⊘", "1" => "𝟙", "2" => "ϩ", "3" => "Ӡ", "4" => "५", "5" => "Ƽ", "6" => "Ϭ", "7" => "7", "8" => "𝟠", "9" => "९", "a" => "ą", "b" => "ҍ", "c" => "ç", "d" => "ժ", "e" => "ҽ", "f" => "ƒ", "g" => "ց", "h" => "հ", "i" => "ì", "j" => "ʝ", "k" => "ҟ", "l" => "Ӏ", "m" => "ʍ", "n" => "ղ", "o" => "օ", "p" => "ք", "q" => "զ", "r" => "ɾ", "s" => "ʂ", "t" => "է", "u" => "մ", "v" => "ѵ", "w" => "ա", "x" => "×", "y" => "վ", "z" => "Հ", "A" => "Ⱥ", "B" => "β", "C" => "↻", "D" => "Ꭰ", "E" => "Ɛ", "F" => "Ƒ", "G" => "Ɠ", "H" => "Ƕ", "I" => "į", "J" => "ل", "K" => "Ҡ", "L" => "Ꝉ", "M" => "Ɱ", "N" => "ហ", "O" => "ට", "P" => "φ", "Q" => "Ҩ", "R" => "འ", "S" => "Ϛ", "T" => "Ͳ", "U" => "Ա", "V" => "Ỽ", "W" => "చ", "X" => "ჯ", "Y" => "Ӌ", "Z" => "ɀ");
   $upperAnglesCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "Λ", "b" => "B", "c" => "ᄃ", "d" => "D", "e" => "Σ", "f" => "F", "g" => "G", "h" => "Ή", "i" => "I", "j" => "J", "k" => "K", "l" => "ᄂ", "m" => "M", "n" => "П", "o" => "Ө", "p" => "P", "q" => "Q", "r" => "Я", "s" => "Ƨ", "t" => "Ƭ", "u" => "Ц", "v" => "V", "w" => "Щ", "x" => "X", "y" => "Y", "z" => "Z", "A" => "Λ", "B" => "B", "C" => "ᄃ", "D" => "D", "E" => "Σ", "F" => "F", "G" => "G", "H" => "Ή", "I" => "I", "J" => "J", "K" => "K", "L" => "ᄂ", "M" => "M", "N" => "П", "O" => "Ө", "P" => "P", "Q" => "Q", "R" => "Я", "S" => "Ƨ", "T" => "Ƭ", "U" => "Ц", "V" => "V", "W" => "Щ", "X" => "X", "Y" => "Y", "Z" => "Z");
   $subscriptCharMap = array("0" => "₀", "1" => "₁", "2" => "₂", "3" => "₃", "4" => "₄", "5" => "₅", "6" => "₆", "7" => "₇", "8" => "₈", "9" => "₉", "a" => "ₐ", "b" => "b", "c" => "c", "d" => "d", "e" => "ₑ", "f" => "f", "g" => "g", "h" => "ₕ", "i" => "ᵢ", "j" => "ⱼ", "k" => "ₖ", "l" => "ₗ", "m" => "ₘ", "n" => "ₙ", "o" => "ₒ", "p" => "ₚ", "q" => "q", "r" => "ᵣ", "s" => "ₛ", "t" => "ₜ", "u" => "ᵤ", "v" => "ᵥ", "w" => "w", "x" => "ₓ", "y" => "y", "z" => "z", "A" => "ₐ", "B" => "B", "C" => "C", "D" => "D", "E" => "ₑ", "F" => "F", "G" => "G", "H" => "ₕ", "I" => "ᵢ", "J" => "ⱼ", "K" => "ₖ", "L" => "ₗ", "M" => "ₘ", "N" => "ₙ", "O" => "ₒ", "P" => "ₚ", "Q" => "Q", "R" => "ᵣ", "S" => "ₛ", "T" => "ₜ", "U" => "ᵤ", "V" => "ᵥ", "W" => "W", "X" => "ₓ", "Y" => "Y", "Z" => "Z", "+" => "₊", "-" => "₋", "=" => "₌", "(" => "₍", ")" => "₎");
   $superscriptCharMap = array("0" => "⁰", "1" => "¹", "2" => "²", "3" => "³", "4" => "⁴", "5" => "⁵", "6" => "⁶", "7" => "⁷", "8" => "⁸", "9" => "⁹", "a" => "ᵃ", "b" => "ᵇ", "c" => "ᶜ", "d" => "ᵈ", "e" => "ᵉ", "f" => "ᶠ", "g" => "ᵍ", "h" => "ʰ", "i" => "ⁱ", "j" => "ʲ", "k" => "ᵏ", "l" => "ˡ", "m" => "ᵐ", "n" => "ⁿ", "o" => "ᵒ", "p" => "ᵖ", "q" => "q", "r" => "ʳ", "s" => "ˢ", "t" => "ᵗ", "u" => "ᵘ", "v" => "ᵛ", "w" => "ʷ", "x" => "ˣ", "y" => "ʸ", "z" => "ᶻ", "A" => "ᴬ", "B" => "ᴮ", "C" => "ᶜ", "D" => "ᴰ", "E" => "ᴱ", "F" => "ᶠ", "G" => "ᴳ", "H" => "ᴴ", "I" => "ᴵ", "J" => "ᴶ", "K" => "ᴷ", "L" => "ᴸ", "M" => "ᴹ", "N" => "ᴺ", "O" => "ᴼ", "P" => "ᴾ", "Q" => "Q", "R" => "ᴿ", "S" => "ˢ", "T" => "ᵀ", "U" => "ᵁ", "V" => "ⱽ", "W" => "ᵂ", "X" => "ˣ", "Y" => "ʸ", "Z" => "ᶻ", "+" => "⁺", "-" => "⁻", "=" => "⁼", "(" => "⁽", ")" => "⁾");
   $squiggleCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "ค", "b" => "๒", "c" => "ς", "d" => "๔", "e" => "є", "f" => "Ŧ", "g" => "ﻮ", "h" => "ђ", "i" => "เ", "j" => "ן", "k" => "к", "l" => "ɭ", "m" => "๓", "n" => "ภ", "o" => "๏", "p" => "ק", "q" => "ợ", "r" => "г", "s" => "ร", "t" => "Շ", "u" => "ย", "v" => "ש", "w" => "ฬ", "x" => "א", "y" => "ץ", "z" => "չ", "A" => "ค", "B" => "๒", "C" => "ς", "D" => "๔", "E" => "є", "F" => "Ŧ", "G" => "ﻮ", "H" => "ђ", "I" => "เ", "J" => "ן", "K" => "к", "L" => "ɭ", "M" => "๓", "N" => "ภ", "O" => "๏", "P" => "ק", "Q" => "ợ", "R" => "г", "S" => "ร", "T" => "Շ", "U" => "ย", "V" => "ש", "W" => "ฬ", "X" => "א", "Y" => "ץ", "Z" => "չ");
   $doubleStruckCharMap = array("0" => "𝟘", "1" => "𝟙", "2" => "𝟚", "3" => "𝟛", "4" => "𝟜", "5" => "𝟝", "6" => "𝟞", "7" => "𝟟", "8" => "𝟠", "9" => "𝟡", "a" => "𝕒", "b" => "𝕓", "c" => "𝕔", "d" => "𝕕", "e" => "𝕖", "f" => "𝕗", "g" => "𝕘", "h" => "𝕙", "i" => "𝕚", "j" => "𝕛", "k" => "𝕜", "l" => "𝕝", "m" => "𝕞", "n" => "𝕟", "o" => "𝕠", "p" => "𝕡", "q" => "𝕢", "r" => "𝕣", "s" => "𝕤", "t" => "𝕥", "u" => "𝕦", "v" => "𝕧", "w" => "𝕨", "x" => "𝕩", "y" => "𝕪", "z" => "𝕫", "A" => "𝔸", "B" => "𝔹", "C" => "ℂ", "D" => "𝔻", "E" => "𝔼", "F" => "𝔽", "G" => "𝔾", "H" => "ℍ", "I" => "𝕀", "J" => "𝕁", "K" => "𝕂", "L" => "𝕃", "M" => "𝕄", "N" => "ℕ", "O" => "𝕆", "P" => "ℙ", "Q" => "ℚ", "R" => "ℝ", "S" => "𝕊", "T" => "𝕋", "U" => "𝕌", "V" => "𝕍", "W" => "𝕎", "X" => "𝕏", "Y" => "𝕐", "Z" => "ℤ");
   $medievalCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "𝖆", "b" => "𝖇", "c" => "𝖈", "d" => "𝖉", "e" => "𝖊", "f" => "𝖋", "g" => "𝖌", "h" => "𝖍", "i" => "𝖎", "j" => "𝖏", "k" => "𝖐", "l" => "𝖑", "m" => "𝖒", "n" => "𝖓", "o" => "𝖔", "p" => "𝖕", "q" => "𝖖", "r" => "𝖗", "s" => "𝖘", "t" => "𝖙", "u" => "𝖚", "v" => "𝖛", "w" => "𝖜", "x" => "𝖝", "y" => "𝖞", "z" => "𝖟", "A" => "𝕬", "B" => "𝕭", "C" => "𝕮", "D" => "𝕯", "E" => "𝕰", "F" => "𝕱", "G" => "𝕲", "H" => "𝕳", "I" => "𝕴", "J" => "𝕵", "K" => "𝕶", "L" => "𝕷", "M" => "𝕸", "N" => "𝕹", "O" => "𝕺", "P" => "𝕻", "Q" => "𝕼", "R" => "𝕽", "S" => "𝕾", "T" => "𝕿", "U" => "𝖀", "V" => "𝖁", "W" => "𝖂", "X" => "𝖃", "Y" => "𝖄", "Z" => "𝖅");
   $invertedSquaresCharMap = array('q' => "🆀", 'w' => "🆆", 'e' => "🅴", 'r' => "🆁", 't' => "🆃", 'y' => "🆈", 'u' => "🆄", 'i' => "🅸", 'o' => "🅾", 'p' => "🅿", 'a' => "🅰", 's' => "🆂", 'd' => "🅳", 'f' => "🅵", 'g' => "🅶", 'h' => "🅷", 'j' => "🅹", 'k' => "🅺", 'l' => "🅻", 'z' => "🆉", 'x' => "🆇", 'c' => "🅲", 'v' => "🆅", 'b' => "🅱", 'n' => "🅽", 'm' => "🅼");
   $cursiveCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "𝓪", "b" => "𝓫", "c" => "𝓬", "d" => "𝓭", "e" => "𝓮", "f" => "𝓯", "g" => "𝓰", "h" => "𝓱", "i" => "𝓲", "j" => "𝓳", "k" => "𝓴", "l" => "𝓵", "m" => "𝓶", "n" => "𝓷", "o" => "𝓸", "p" => "𝓹", "q" => "𝓺", "r" => "𝓻", "s" => "𝓼", "t" => "𝓽", "u" => "𝓾", "v" => "𝓿", "w" => "𝔀", "x" => "𝔁", "y" => "𝔂", "z" => "𝔃", "A" => "𝓐", "B" => "𝓑", "C" => "𝓒", "D" => "𝓓", "E" => "𝓔", "F" => "𝓕", "G" => "𝓖", "H" => "𝓗", "I" => "𝓘", "J" => "𝓙", "K" => "𝓚", "L" => "𝓛", "M" => "𝓜", "N" => "𝓝", "O" => "𝓞", "P" => "𝓟", "Q" => "𝓠", "R" => "𝓡", "S" => "𝓢", "T" => "𝓣", "U" => "𝓤", "V" => "𝓥", "W" => "𝓦", "X" => "𝓧", "Y" => "𝓨", "Z" => "𝓩");
   $oldEnglishCharMap = array("a" => "𝔞", "b" => "𝔟", "c" => "𝔠", "d" => "𝔡", "e" => "𝔢", "f" => "𝔣", "g" => "𝔤", "h" => "𝔥", "i" => "𝔦", "j" => "𝔧", "k" => "𝔨", "l" => "𝔩", "m" => "𝔪", "n" => "𝔫", "o" => "𝔬", "p" => "𝔭", "q" => "𝔮", "r" => "𝔯", "s" => "𝔰", "t" => "𝔱", "u" => "𝔲", "v" => "𝔳", "w" => "𝔴", "x" => "𝔵", "y" => "𝔶", "z" => "𝔷", "A" => "𝔄", "B" => "𝔅", "C" => "ℭ", "D" => "𝔇", "E" => "𝔈", "F" => "𝔉", "G" => "𝔊", "H" => "ℌ", "I" => "ℑ", "J" => "𝔍", "K" => "𝔎", "L" => "𝔏", "M" => "𝔐", "N" => "𝔑", "O" => "𝔒", "P" => "𝔓", "Q" => "𝔔", "R" => "ℜ", "S" => "𝔖", "T" => "𝔗", "U" => "𝔘", "V" => "𝔙", "W" => "𝔚", "X" => "𝔛", "Y" => "𝔜", "Z" => "ℨ");
   $wideTextCharMap = array("`" => "`", "1" => "１", "2" => "２", "3" => "３", "4" => "４", "5" => "５", "6" => "６", "7" => "７", "8" => "８", "9" => "９", "0" => "０", "-" => "－", "=" => "＝", "~" => "~", "!" => "！", "@" => "＠", "#" => "＃", "$" => "＄", "%" => "％", "^" => "^", "&" => "＆", "*" => "＊", "(" => "（", ")" => "）", "_" => "_", "+" => "＋", "q" => "ｑ", "w" => "ｗ", "e" => "ｅ", "r" => "ｒ", "t" => "ｔ", "y" => "ｙ", "u" => "ｕ", "i" => "ｉ", "o" => "ｏ", "p" => "ｐ", "(" => "(", "]" => "]", "\\" => "\\", "Q" => "Ｑ", "W" => "Ｗ", "E" => "Ｅ", "R" => "Ｒ", "T" => "Ｔ", "Y" => "Ｙ", "U" => "Ｕ", "I" => "Ｉ", "O" => "Ｏ", "P" => "Ｐ", "array(" => "array(", ")" => ")", "|" => "|", "a" => "ａ", "s" => "ｓ", "d" => "ｄ", "f" => "ｆ", "g" => "ｇ", "h" => "ｈ", "j" => "ｊ", "k" => "ｋ", "l" => "ｌ", ";" => "；", "'" => "＇", "A" => "Ａ", "S" => "Ｓ", "D" => "Ｄ", "F" => "Ｆ", "G" => "Ｇ", "H" => "Ｈ", "J" => "Ｊ", "K" => "Ｋ", "L" => "Ｌ", "=>" => "：", "\"" => "\"", "z" => "ｚ", "x" => "ｘ", "c" => "ｃ", "v" => "ｖ", "b" => "ｂ", "n" => "ｎ", "m" => "ｍ", "," => "，", "." => "．", "/" => "／", "Z" => "Ｚ", "X" => "Ｘ", "C" => "Ｃ", "V" => "Ｖ", "B" => "Ｂ", "N" => "Ｎ", "M" => "Ｍ", "<" => "<", ">" => ">", "?" => "？");


   $array = str_split($string);
   $fin_str = '';
   foreach ($array as $val) {
      //echo($val . " ");
      if (isset(${$fontname}[$val])) {
         $fin_str .= ${$fontname}[$val];
      } else {
         $fin_str .= $val;
      }
   }

   return $fin_str;
}


?>