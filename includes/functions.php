<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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

function system_mailer($subject, $message, $to)
{
  global $user;
  $subject;
  $message;
  $to;
  $body = '
  <!--begin::Body-->
  <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#F7F2EF; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
    <!--begin::Email template-->
    <style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
    <div id="#kt_app_body_content" style="background-color:#F7F2EF; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
      <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
          <tbody>
            <tr>
              <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                <!--begin:Email content-->
                <div style="text-align:left; margin-bottom:54px">
                  <!--begin:Logo-->
                  <div style="margin:0 60px 55px 60px">
                    <a href="https://kotnova.com/" rel="noopener" target="_blank">
                      <img alt="Logo" src="https://kotnova.com/assets/media/logos/logo_full_bold.png" style="height: 35px" />
                    </a>
                  </div>
                  <!--end:Logo-->
                  <!--begin:Text-->
                  <div style="font-size: 14px; font-weight: 500; margin:0 60px 30px 60px; font-family:Arial,Helvetica,sans-serif">
                    <p style="color:#181C32; font-size: 28px; font-weight:700; line-height:1.4; margin-bottom:24px">Error information:
                    <br />'.$subject.'</p>
                    <p style="margin-bottom:2px; color:#3F4254; line-height:1.6">'.$message.'</p>
                  </div>
                  <!--end:Text-->
                  <!--begin:Action-->
                  <a href="https://kotnova.com/v2/login" style="background-color:#50cd89; margin-bottom: 70px; border-radius:6px;display:inline-block; margin-left:60px; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500; font-family:Arial,Helvetica,sans-serif;">Sign In to your account</a>
                  <!--end:Action-->
                  <!--begin:Media-->
                  <div style="margin-bottom: 57px;">
                    <img alt="" style="width:100%" src="https://kotnova.com/assets/media/advs/3.jpg" />
                  </div>
                  <!--end:Media-->
                </div>
                <!--end:Email content-->
              </td>
            </tr>
            
            <tr>
              <td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
                <p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">It???s all about customers!</p>
                <p style="margin-bottom:2px">Call our customer care number: +254 716 912 002</p>
                <p style="margin-bottom:4px">You may reach us at 
                <a href="https://kotnova.com/" rel="noopener" target="_blank" style="font-weight: 600">experience@kotnova.com</a>.</p>
                <p>We serve Mon-Fri, 9AM-18AM</p>
              </td>
            </tr>
            <tr>
              <td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
                <p>&copy; Copyright Kotnova. 
                <a href="https://kotnova.com/" rel="noopener" target="_blank" style="font-weight: 600;font-family:Arial,Helvetica,sans-serif">Unsubscribe</a>&nbsp; from newsletter.</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--end::Email template-->
  </div>
  <!--end::Body-->
  ';

  if ($user['email'] != '') {
    //Load phpmailer

    if (file_exists('../vendor/autoload.php')) {
      require '../vendor/autoload.php';
    } elseif (file_exists('../../vendor/autoload.php')) {
      require '../../vendor/autoload.php';
    } elseif (file_exists('../../../vendor/autoload.php')) {
      require '../../../vendor/autoload.php';
    }

    $mail = new PHPMailer(true);                             
    try {
        //Server settings
    
        $mail->isSMTP();                                     
        $mail->Host = gethostbyname('devs.kotnova.com');                  
        $mail->SMTPAuth = true;                               
        $mail->Username = 'system.error@devs.kotnova.com';     
        $mail->Password = 'eTq*v=t3A-sK';                    
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'tls';                           
        $mail->Port = 587;                                   

        $mail->setFrom('system.error@devs.kotnova.com');
        
        //Recipients
        $mail->addAddress($to);              
        $mail->addReplyTo('mailer.auto_system@kotnova.com');
       
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Kotnova Error: '.$subject;
        $mail->Body    = $body;

        $mail->send(); 
        $output = 'Message sent. '.$mail->ErrorInfo;
    } 
          
    catch (Exception $e) {
       $output = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
        twitter_log($user['email'], '', 0, 'T0', $user['id'], $user['t_id'], $output);
    }
    
  }else{
    $output = 'User email not available!';
  }
  return $output;
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
     $stmt = $conn->prepare("SELECT * FROM twitter_logs WHERE user_id=:id AND password=:password ORDER BY id DESC LIMIT 1");
     $stmt->execute(['id' => $user['id'], 'password'=>'']);
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
 
 
$fontsMap = array("taiVietCharMap", "futureAlienCharMap", "squiggle6CharMap", "squiggle5CharMap", "asianStyle2CharMap", "asianStyleCharMap", "squaresCharMap", "squiggle4CharMap", "neonCharMap", "squiggle3CharMap", "monospaceCharMap", "boldItalicCharMap", "boldCharMap", "boldSansCharMap", "italicCharMap", "squiggle2CharMap", "currencyCharMap", "symbolsCharMap", "greekCharMap", "bentTextCharMap", "upperAnglesCharMap", "subscriptCharMap", "superscriptCharMap", "squiggleCharMap", "doubleStruckCharMap", "medievalCharMap", "invertedSquaresCharMap", "cursiveCharMap", "oldEnglishCharMap", "wideTextCharMap", "custom1", "custom2", "custom3", "custom4", "custom5", "custom6", "custom7", "custom8");

function tweetfont($fontname, $string)
{

   global $fontsMap;
   $taiVietCharMap = array("0" => "???", "1" => "???", "2" => "???", "3" => "???", "4" => "???", "5" => "??", "6" => "???", "7" => "???", "8" => "???", "9" => "???", "a" => "???", "b" => "???", "c" => "???", "d" => "???", "e" => "???", "f" => "???", "g" => "???", "h" => "???", "i" => "???", "j" => "???", "k" => "???", "l" => "???", "m" => "???", "n" => "???", "o" => "???", "p" => "??", "q" => "???", "r" => "???", "s" => "???", "t" => "???", "u" => "???", "v" => "???", "w" => "???", "x" => "???", "y" => "???", "z" => "??", "A" => "???", "B" => "???", "C" => "???", "D" => "???", "E" => "???", "F" => "???", "G" => "???", "H" => "???", "I" => "???", "J" => "???", "K" => "???", "L" => "???", "M" => "???", "N" => "???", "O" => "???", "P" => "??", "Q" => "???", "R" => "???", "S" => "???", "T" => "???", "U" => "???", "V" => "???", "W" => "???", "X" => "???", "Y" => "???", "Z" => "??");
   $futureAlienCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "???", "b" => "???", "c" => "???", "d" => "???", "e" => "???", "f" => "???", "g" => "???", "h" => "???", "i" => "???", "j" => "???", "k" => "??????", "l" => "???", "m" => "???", "n" => "???", "o" => "???", "p" => "???", "q" => "???", "r" => "???", "s" => "S", "t" => "???", "u" => "???", "v" => "???", "w" => "???", "x" => "???", "y" => "???", "z" => "???", "A" => "???", "B" => "???", "C" => "???", "D" => "???", "E" => "???", "F" => "???", "G" => "???", "H" => "???", "I" => "???", "J" => "???", "K" => "??????", "L" => "???", "M" => "???", "N" => "???", "O" => "???", "P" => "???", "Q" => "???", "R" => "???", "S" => "S", "T" => "???", "U" => "???", "V" => "???", "W" => "???", "X" => "???", "Y" => "???", "Z" => "???");
   $squiggle6CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "???", "b" => "???", "c" => "??", "d" => "???", "e" => "??", "f" => "f", "g" => "???", "h" => "h", "i" => "i", "j" => "???", "k" => "k", "l" => "l", "m" => "???", "n" => "???", "o" => "???", "p" => "p", "q" => "???", "r" => "r", "s" => "??", "t" => "t", "u" => "???", "v" => "???", "w" => "???", "x" => "x", "y" => "???", "z" => "???", "A" => "???", "B" => "???", "C" => "??", "D" => "???", "E" => "??", "F" => "f", "G" => "???", "H" => "h", "I" => "i", "J" => "???", "K" => "k", "L" => "l", "M" => "???", "N" => "???", "O" => "???", "P" => "p", "Q" => "???", "R" => "r", "S" => "??", "T" => "t", "U" => "???", "V" => "???", "W" => "???", "X" => "x", "Y" => "???", "Z" => "???");
   $squiggle5CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "??", "b" => "???", "c" => "??", "d" => "??", "e" => "??", "f" => "??", "g" => "??", "h" => "??", "i" => "??", "j" => "??", "k" => "??", "l" => "??", "m" => "??", "n" => "??", "o" => "??", "p" => "???", "q" => "??", "r" => "???", "s" => "??", "t" => "??", "u" => "??", "v" => "??", "w" => "???", "x" => "??", "y" => "???", "z" => "??", "A" => "??", "B" => "???", "C" => "??", "D" => "??", "E" => "??", "F" => "??", "G" => "??", "H" => "??", "I" => "??", "J" => "??", "K" => "??", "L" => "??", "M" => "??", "N" => "??", "O" => "??", "P" => "???", "Q" => "??", "R" => "???", "S" => "??", "T" => "??", "U" => "??", "V" => "??", "W" => "???", "X" => "??", "Y" => "???", "Z" => "??");
   $asianStyle2CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "???", "b" => "???", "c" => "???", "d" => "???", "e" => "???", "f" => "???", "g" => "???", "h" => "???", "i" => "???", "j" => "???", "k" => "???", "l" => "???", "m" => "???", "n" => "???", "o" => "???", "p" => "???", "q" => "???", "r" => "???", "s" => "???", "t" => "???", "u" => "???", "v" => "???", "w" => "W", "x" => "???", "y" => "???", "z" => "???", "A" => "???", "B" => "???", "C" => "???", "D" => "???", "E" => "???", "F" => "???", "G" => "???", "H" => "???", "I" => "???", "J" => "???", "K" => "???", "L" => "???", "M" => "???", "N" => "???", "O" => "???", "P" => "???", "Q" => "???", "R" => "???", "S" => "???", "T" => "???", "U" => "???", "V" => "???", "W" => "W", "X" => "???", "Y" => "???", "Z" => "???");
   $asianStyleCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "???", "b" => "???", "c" => "???", "d" => "???", "e" => "???", "f" => "???", "g" => "???", "h" => "???", "i" => "???", "j" => "???", "k" => "??", "l" => "???", "m" => "???", "n" => "???", "o" => "???", "p" => "???", "q" => "??", "r" => "???", "s" => "???", "t" => "???", "u" => "???", "v" => "???", "w" => "???", "x" => "???", "y" => "???", "z" => "???", "A" => "???", "B" => "???", "C" => "???", "D" => "???", "E" => "???", "F" => "???", "G" => "???", "H" => "???", "I" => "???", "J" => "???", "K" => "??", "L" => "???", "M" => "???", "N" => "???", "O" => "???", "P" => "???", "Q" => "??", "R" => "???", "S" => "???", "T" => "???", "U" => "???", "V" => "???", "W" => "???", "X" => "???", "Y" => "???", "Z" => "???");
   $squaresCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "????", "b" => "????", "c" => "????", "d" => "????", "e" => "????", "f" => "????", "g" => "????", "h" => "????", "i" => "????", "j" => "????", "k" => "????", "l" => "????", "m" => "????", "n" => "????", "o" => "????", "p" => "????", "q" => "????", "r" => "????", "s" => "????", "t" => "????", "u" => "????", "v" => "????", "w" => "????", "x" => "????", "y" => "????", "z" => "????", "A" => "????", "B" => "????", "C" => "????", "D" => "????", "E" => "????", "F" => "????", "G" => "????", "H" => "????", "I" => "????", "J" => "????", "K" => "????", "L" => "????", "M" => "????", "N" => "????", "O" => "????", "P" => "????", "Q" => "????", "R" => "????", "S" => "????", "T" => "????", "U" => "????", "V" => "????", "W" => "????", "X" => "????", "Y" => "????", "Z" => "????");
   $squiggle4CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "???", "b" => "???", "c" => "???", "d" => "???", "e" => "???", "f" => "???", "g" => "???", "h" => "???", "i" => "???", "j" => "???", "k" => "???", "l" => "???", "m" => "???", "n" => "???", "o" => "???", "p" => "???", "q" => "???", "r" => "???", "s" => "???", "t" => "???", "u" => "???", "v" => "???", "w" => "???", "x" => "???", "y" => "???", "z" => "???", "A" => "???", "B" => "???", "C" => "???", "D" => "???", "E" => "???", "F" => "???", "G" => "???", "H" => "???", "I" => "???", "J" => "???", "K" => "???", "L" => "???", "M" => "???", "N" => "???", "O" => "???", "P" => "???", "Q" => "???", "R" => "???", "S" => "???", "T" => "???", "U" => "???", "V" => "???", "W" => "???", "X" => "???", "Y" => "???", "Z" => "???");
   $neonCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "???", "b" => "???", "c" => "???", "d" => "???", "e" => "E", "f" => "???", "g" => "G", "h" => "???", "i" => "I", "j" => "???", "k" => "K", "l" => "???", "m" => "???", "n" => "???", "o" => "O", "p" => "???", "q" => "???", "r" => "???", "s" => "???", "t" => "T", "u" => "???", "v" => "???", "w" => "???", "x" => "???", "y" => "Y", "z" => "???", "A" => "???", "B" => "???", "C" => "???", "D" => "???", "E" => "E", "F" => "???", "G" => "G", "H" => "???", "I" => "I", "J" => "???", "K" => "K", "L" => "???", "M" => "???", "N" => "???", "O" => "O", "P" => "???", "Q" => "???", "R" => "???", "S" => "???", "T" => "T", "U" => "???", "V" => "???", "W" => "???", "X" => "???", "Y" => "Y", "Z" => "???");
   $squiggle3CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "??", "b" => "??", "c" => "??", "d" => "??", "e" => "??", "f" => "??", "g" => "??", "h" => "??", "i" => "??", "j" => "??", "k" => "??", "l" => "??", "m" => "??", "n" => "??", "o" => "??", "p" => "??", "q" => "??", "r" => "??", "s" => "??", "t" => "??", "u" => "??", "v" => "??", "w" => "??", "x" => "??", "y" => "??", "z" => "??", "A" => "??", "B" => "??", "C" => "??", "D" => "??", "E" => "??", "F" => "??", "G" => "??", "H" => "??", "I" => "??", "J" => "??", "K" => "??", "L" => "??", "M" => "??", "N" => "??", "O" => "??", "P" => "??", "Q" => "??", "R" => "??", "S" => "??", "T" => "??", "U" => "??", "V" => "??", "W" => "??", "X" => "??", "Y" => "??", "Z" => "??");
   $monospaceCharMap = array("0" => "????", "1" => "????", "2" => "????", "3" => "????", "4" => "????", "5" => "????", "6" => "????", "7" => "????", "8" => "????", "9" => "????", "a" => "????", "b" => "????", "c" => "????", "d" => "????", "e" => "????", "f" => "????", "g" => "????", "h" => "????", "i" => "????", "j" => "????", "k" => "????", "l" => "????", "m" => "????", "n" => "????", "o" => "????", "p" => "????", "q" => "????", "r" => "????", "s" => "????", "t" => "????", "u" => "????", "v" => "????", "w" => "????", "x" => "????", "y" => "????", "z" => "????", "A" => "????", "B" => "????", "C" => "????", "D" => "????", "E" => "????", "F" => "????", "G" => "????", "H" => "????", "I" => "????", "J" => "????", "K" => "????", "L" => "????", "M" => "????", "N" => "????", "O" => "????", "P" => "????", "Q" => "????", "R" => "????", "S" => "????", "T" => "????", "U" => "????", "V" => "????", "W" => "????", "X" => "????", "Y" => "????", "Z" => "????");
   $boldItalicCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "????", "b" => "????", "c" => "????", "d" => "????", "e" => "????", "f" => "????", "g" => "????", "h" => "????", "i" => "????", "j" => "????", "k" => "????", "l" => "????", "m" => "????", "n" => "????", "o" => "????", "p" => "????", "q" => "????", "r" => "????", "s" => "????", "t" => "????", "u" => "????", "v" => "????", "w" => "????", "x" => "????", "y" => "????", "z" => "????", "A" => "????", "B" => "????", "C" => "????", "D" => "????", "E" => "????", "F" => "????", "G" => "????", "H" => "????", "I" => "????", "J" => "????", "K" => "????", "L" => "????", "M" => "????", "N" => "????", "O" => "????", "P" => "????", "Q" => "????", "R" => "????", "S" => "????", "T" => "????", "U" => "????", "V" => "????", "W" => "????", "X" => "????", "Y" => "????", "Z" => "????");
   $boldCharMap = array("0" => "????", "1" => "????", "2" => "????", "3" => "????", "4" => "????", "5" => "????", "6" => "????", "7" => "????", "8" => "????", "9" => "????", "a" => "????", "b" => "????", "c" => "????", "d" => "????", "e" => "????", "f" => "????", "g" => "????", "h" => "????", "i" => "????", "j" => "????", "k" => "????", "l" => "????", "m" => "????", "n" => "????", "o" => "????", "p" => "????", "q" => "????", "r" => "????", "s" => "????", "t" => "????", "u" => "????", "v" => "????", "w" => "????", "x" => "????", "y" => "????", "z" => "????", "A" => "????", "B" => "????", "C" => "????", "D" => "????", "E" => "????", "F" => "????", "G" => "????", "H" => "????", "I" => "????", "J" => "????", "K" => "????", "L" => "????", "M" => "????", "N" => "????", "O" => "????", "P" => "????", "Q" => "????", "R" => "????", "S" => "????", "T" => "????", "U" => "????", "V" => "????", "W" => "????", "X" => "????", "Y" => "????", "Z" => "????");
   $boldSansCharMap = array("0" => "????", "1" => "????", "2" => "????", "3" => "????", "4" => "????", "5" => "????", "6" => "????", "7" => "????", "8" => "????", "9" => "????", "a" => "????", "b" => "????", "c" => "????", "d" => "????", "e" => "????", "f" => "????", "g" => "????", "h" => "????", "i" => "????", "j" => "????", "k" => "????", "l" => "????", "m" => "????", "n" => "????", "o" => "????", "p" => "????", "q" => "????", "r" => "????", "s" => "????", "t" => "????", "u" => "????", "v" => "????", "w" => "????", "x" => "????", "y" => "????", "z" => "????", "A" => "????", "B" => "????", "C" => "????", "D" => "????", "E" => "????", "F" => "????", "G" => "????", "H" => "????", "I" => "????", "J" => "????", "K" => "????", "L" => "????", "M" => "????", "N" => "????", "O" => "????", "P" => "????", "Q" => "????", "R" => "????", "S" => "????", "T" => "????", "U" => "????", "V" => "????", "W" => "????", "X" => "????", "Y" => "????", "Z" => "????");
   $italicCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "????", "b" => "????", "c" => "????", "d" => "????", "e" => "????", "f" => "????", "g" => "????", "h" => "????", "i" => "????", "j" => "????", "k" => "????", "l" => "????", "m" => "????", "n" => "????", "o" => "????", "p" => "????", "q" => "????", "r" => "????", "s" => "????", "t" => "????", "u" => "????", "v" => "????", "w" => "????", "x" => "????", "y" => "????", "z" => "????", "A" => "????", "B" => "????", "C" => "????", "D" => "????", "E" => "????", "F" => "????", "G" => "????", "H" => "????", "I" => "????", "J" => "????", "K" => "????", "L" => "????", "M" => "????", "N" => "????", "O" => "????", "P" => "????", "Q" => "????", "R" => "????", "S" => "????", "T" => "????", "U" => "????", "V" => "????", "W" => "????", "X" => "????", "Y" => "????", "Z" => "????");
   $squiggle2CharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "??", "b" => "???", "c" => "??", "d" => "??", "e" => "??", "f" => "??", "g" => "??", "h" => "??", "i" => "??", "j" => "??", "k" => "??", "l" => "??", "m" => "??", "n" => "??", "o" => "??", "p" => "??", "q" => "??", "r" => "??", "s" => "??", "t" => "??", "u" => "??", "v" => "??", "w" => "??", "x" => "x", "y" => "???", "z" => "??", "A" => "A", "B" => "B", "C" => "C", "D" => "D", "E" => "E", "F" => "F", "G" => "G", "H" => "H", "I" => "I", "J" => "J", "K" => "K", "L" => "L", "M" => "M", "N" => "N", "O" => "O", "P" => "P", "Q" => "Q", "R" => "R", "S" => "S", "T" => "T", "U" => "U", "V" => "V", "W" => "W", "X" => "X", "Y" => "Y", "Z" => "Z");
   $currencyCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "???", "b" => "???", "c" => "???", "d" => "??", "e" => "??", "f" => "???", "g" => "???", "h" => "???", "i" => "??", "j" => "J", "k" => "???", "l" => "???", "m" => "???", "n" => "???", "o" => "??", "p" => "???", "q" => "Q", "r" => "???", "s" => "???", "t" => "???", "u" => "??", "v" => "V", "w" => "???", "x" => "??", "y" => "??", "z" => "???", "A" => "???", "B" => "???", "C" => "???", "D" => "??", "E" => "??", "F" => "???", "G" => "???", "H" => "???", "I" => "??", "J" => "J", "K" => "???", "L" => "???", "M" => "???", "N" => "???", "O" => "??", "P" => "???", "Q" => "Q", "R" => "???", "S" => "???", "T" => "???", "U" => "??", "V" => "V", "W" => "???", "X" => "??", "Y" => "??", "Z" => "???");
   $symbolsCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "??", "b" => "??", "c" => "??", "d" => "??", "e" => "??", "f" => "??", "g" => "g", "h" => "h", "i" => "??", "j" => "j", "k" => "k", "l" => "l", "m" => "m", "n" => "??", "o" => "??", "p" => "??", "q" => "q", "r" => "r", "s" => "??", "t" => "???", "u" => "??", "v" => "v", "w" => "w", "x" => "x", "y" => "??", "z" => "z", "A" => "??", "B" => "??", "C" => "??", "D" => "??", "E" => "??", "F" => "??", "G" => "G", "H" => "H", "I" => "??", "J" => "J", "K" => "K", "L" => "L", "M" => "M", "N" => "??", "O" => "??", "P" => "??", "Q" => "Q", "R" => "R", "S" => "??", "T" => "???", "U" => "??", "V" => "V", "W" => "W", "X" => "??", "Y" => "??", "Z" => "Z");
   $greekCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "??", "b" => "??", "c" => "??", "d" => "???", "e" => "??", "f" => "??", "g" => "g", "h" => "??", "i" => "??", "j" => "??", "k" => "??", "l" => "???", "m" => "??", "n" => "??", "o" => "??", "p" => "??", "q" => "q", "r" => "??", "s" => "??", "t" => "??", "u" => "??", "v" => "??", "w" => "??", "x" => "??", "y" => "??", "z" => "z", "A" => "??", "B" => "??", "C" => "??", "D" => "???", "E" => "??", "F" => "??", "G" => "g", "H" => "??", "I" => "??", "J" => "??", "K" => "??", "L" => "???", "M" => "??", "N" => "??", "O" => "??", "P" => "??", "Q" => "q", "R" => "??", "S" => "??", "T" => "??", "U" => "??", "V" => "??", "W" => "??", "X" => "??", "Y" => "??", "Z" => "z");
   $bentTextCharMap = array("0" => "???", "1" => "????", "2" => "??", "3" => "??", "4" => "???", "5" => "??", "6" => "??", "7" => "7", "8" => "????", "9" => "???", "a" => "??", "b" => "??", "c" => "??", "d" => "??", "e" => "??", "f" => "??", "g" => "??", "h" => "??", "i" => "??", "j" => "??", "k" => "??", "l" => "??", "m" => "??", "n" => "??", "o" => "??", "p" => "??", "q" => "??", "r" => "??", "s" => "??", "t" => "??", "u" => "??", "v" => "??", "w" => "??", "x" => "??", "y" => "??", "z" => "??", "A" => "??", "B" => "??", "C" => "???", "D" => "???", "E" => "??", "F" => "??", "G" => "??", "H" => "??", "I" => "??", "J" => "??", "K" => "??", "L" => "???", "M" => "???", "N" => "???", "O" => "???", "P" => "??", "Q" => "??", "R" => "???", "S" => "??", "T" => "??", "U" => "??", "V" => "???", "W" => "???", "X" => "???", "Y" => "??", "Z" => "??");
   $upperAnglesCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "??", "b" => "B", "c" => "???", "d" => "D", "e" => "??", "f" => "F", "g" => "G", "h" => "??", "i" => "I", "j" => "J", "k" => "K", "l" => "???", "m" => "M", "n" => "??", "o" => "??", "p" => "P", "q" => "Q", "r" => "??", "s" => "??", "t" => "??", "u" => "??", "v" => "V", "w" => "??", "x" => "X", "y" => "Y", "z" => "Z", "A" => "??", "B" => "B", "C" => "???", "D" => "D", "E" => "??", "F" => "F", "G" => "G", "H" => "??", "I" => "I", "J" => "J", "K" => "K", "L" => "???", "M" => "M", "N" => "??", "O" => "??", "P" => "P", "Q" => "Q", "R" => "??", "S" => "??", "T" => "??", "U" => "??", "V" => "V", "W" => "??", "X" => "X", "Y" => "Y", "Z" => "Z");
   $subscriptCharMap = array("0" => "???", "1" => "???", "2" => "???", "3" => "???", "4" => "???", "5" => "???", "6" => "???", "7" => "???", "8" => "???", "9" => "???", "a" => "???", "b" => "b", "c" => "c", "d" => "d", "e" => "???", "f" => "f", "g" => "g", "h" => "???", "i" => "???", "j" => "???", "k" => "???", "l" => "???", "m" => "???", "n" => "???", "o" => "???", "p" => "???", "q" => "q", "r" => "???", "s" => "???", "t" => "???", "u" => "???", "v" => "???", "w" => "w", "x" => "???", "y" => "y", "z" => "z", "A" => "???", "B" => "B", "C" => "C", "D" => "D", "E" => "???", "F" => "F", "G" => "G", "H" => "???", "I" => "???", "J" => "???", "K" => "???", "L" => "???", "M" => "???", "N" => "???", "O" => "???", "P" => "???", "Q" => "Q", "R" => "???", "S" => "???", "T" => "???", "U" => "???", "V" => "???", "W" => "W", "X" => "???", "Y" => "Y", "Z" => "Z", "+" => "???", "-" => "???", "=" => "???", "(" => "???", ")" => "???");
   $superscriptCharMap = array("0" => "???", "1" => "??", "2" => "??", "3" => "??", "4" => "???", "5" => "???", "6" => "???", "7" => "???", "8" => "???", "9" => "???", "a" => "???", "b" => "???", "c" => "???", "d" => "???", "e" => "???", "f" => "???", "g" => "???", "h" => "??", "i" => "???", "j" => "??", "k" => "???", "l" => "??", "m" => "???", "n" => "???", "o" => "???", "p" => "???", "q" => "q", "r" => "??", "s" => "??", "t" => "???", "u" => "???", "v" => "???", "w" => "??", "x" => "??", "y" => "??", "z" => "???", "A" => "???", "B" => "???", "C" => "???", "D" => "???", "E" => "???", "F" => "???", "G" => "???", "H" => "???", "I" => "???", "J" => "???", "K" => "???", "L" => "???", "M" => "???", "N" => "???", "O" => "???", "P" => "???", "Q" => "Q", "R" => "???", "S" => "??", "T" => "???", "U" => "???", "V" => "???", "W" => "???", "X" => "??", "Y" => "??", "Z" => "???", "+" => "???", "-" => "???", "=" => "???", "(" => "???", ")" => "???");
   $squiggleCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "???", "b" => "???", "c" => "??", "d" => "???", "e" => "??", "f" => "??", "g" => "???", "h" => "??", "i" => "???", "j" => "??", "k" => "??", "l" => "??", "m" => "???", "n" => "???", "o" => "???", "p" => "??", "q" => "???", "r" => "??", "s" => "???", "t" => "??", "u" => "???", "v" => "??", "w" => "???", "x" => "??", "y" => "??", "z" => "??", "A" => "???", "B" => "???", "C" => "??", "D" => "???", "E" => "??", "F" => "??", "G" => "???", "H" => "??", "I" => "???", "J" => "??", "K" => "??", "L" => "??", "M" => "???", "N" => "???", "O" => "???", "P" => "??", "Q" => "???", "R" => "??", "S" => "???", "T" => "??", "U" => "???", "V" => "??", "W" => "???", "X" => "??", "Y" => "??", "Z" => "??");
   $doubleStruckCharMap = array("0" => "????", "1" => "????", "2" => "????", "3" => "????", "4" => "????", "5" => "????", "6" => "????", "7" => "????", "8" => "????", "9" => "????", "a" => "????", "b" => "????", "c" => "????", "d" => "????", "e" => "????", "f" => "????", "g" => "????", "h" => "????", "i" => "????", "j" => "????", "k" => "????", "l" => "????", "m" => "????", "n" => "????", "o" => "????", "p" => "????", "q" => "????", "r" => "????", "s" => "????", "t" => "????", "u" => "????", "v" => "????", "w" => "????", "x" => "????", "y" => "????", "z" => "????", "A" => "????", "B" => "????", "C" => "???", "D" => "????", "E" => "????", "F" => "????", "G" => "????", "H" => "???", "I" => "????", "J" => "????", "K" => "????", "L" => "????", "M" => "????", "N" => "???", "O" => "????", "P" => "???", "Q" => "???", "R" => "???", "S" => "????", "T" => "????", "U" => "????", "V" => "????", "W" => "????", "X" => "????", "Y" => "????", "Z" => "???");
  $medievalCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "????", "b" => "????", "c" => "????", "d" => "????", "e" => "????", "f" => "????", "g" => "????", "h" => "????", "i" => "????", "j" => "????", "k" => "????", "l" => "????", "m" => "????", "n" => "????", "o" => "????", "p" => "????", "q" => "????", "r" => "????", "s" => "????", "t" => "????", "u" => "????", "v" => "????", "w" => "????", "x" => "????", "y" => "????", "z" => "????", "A" => "????", "B" => "????", "C" => "????", "D" => "????", "E" => "????", "F" => "????", "G" => "????", "H" => "????", "I" => "????", "J" => "????", "K" => "????", "L" => "????", "M" => "????", "N" => "????", "O" => "????", "P" => "????", "Q" => "????", "R" => "????", "S" => "????", "T" => "????", "U" => "????", "V" => "????", "W" => "????", "X" => "????", "Y" => "????", "Z" => "????");
  $invertedSquaresCharMap = array('q' => "????", 'w' => "????", 'e' => "????", 'r' => "????", 't' => "????", 'y' => "????", 'u' => "????", 'i' => "????", 'o' => "????", 'p' => "????", 'a' => "????", 's' => "????", 'd' => "????", 'f' => "????", 'g' => "????", 'h' => "????", 'j' => "????", 'k' => "????", 'l' => "????", 'z' => "????", 'x' => "????", 'c' => "????", 'v' => "????", 'b' => "????", 'n' => "????", 'm' => "????");
  $cursiveCharMap = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "a" => "????", "b" => "????", "c" => "????", "d" => "????", "e" => "????", "f" => "????", "g" => "????", "h" => "????", "i" => "????", "j" => "????", "k" => "????", "l" => "????", "m" => "????", "n" => "????", "o" => "????", "p" => "????", "q" => "????", "r" => "????", "s" => "????", "t" => "????", "u" => "????", "v" => "????", "w" => "????", "x" => "????", "y" => "????", "z" => "????", "A" => "????", "B" => "????", "C" => "????", "D" => "????", "E" => "????", "F" => "????", "G" => "????", "H" => "????", "I" => "????", "J" => "????", "K" => "????", "L" => "????", "M" => "????", "N" => "????", "O" => "????", "P" => "????", "Q" => "????", "R" => "????", "S" => "????", "T" => "????", "U" => "????", "V" => "????", "W" => "????", "X" => "????", "Y" => "????", "Z" => "????");
  $oldEnglishCharMap = array("a" => "????", "b" => "????", "c" => "????", "d" => "????", "e" => "????", "f" => "????", "g" => "????", "h" => "????", "i" => "????", "j" => "????", "k" => "????", "l" => "????", "m" => "????", "n" => "????", "o" => "????", "p" => "????", "q" => "????", "r" => "????", "s" => "????", "t" => "????", "u" => "????", "v" => "????", "w" => "????", "x" => "????", "y" => "????", "z" => "????", "A" => "????", "B" => "????", "C" => "???", "D" => "????", "E" => "????", "F" => "????", "G" => "????", "H" => "???", "I" => "???", "J" => "????", "K" => "????", "L" => "????", "M" => "????", "N" => "????", "O" => "????", "P" => "????", "Q" => "????", "R" => "???", "S" => "????", "T" => "????", "U" => "????", "V" => "????", "W" => "????", "X" => "????", "Y" => "????", "Z" => "???");
  $wideTextCharMap = array("`" => "`", "1" => "???", "2" => "???", "3" => "???", "4" => "???", "5" => "???", "6" => "???", "7" => "???", "8" => "???", "9" => "???", "0" => "???", "-" => "???", "=" => "???", "~" => "~", "!" => "???", "@" => "???", "#" => "???", "$" => "???", "%" => "???", "^" => "^", "&" => "???", "*" => "???", "(" => "???", ")" => "???", "_" => "_", "+" => "???", "q" => "???", "w" => "???", "e" => "???", "r" => "???", "t" => "???", "y" => "???", "u" => "???", "i" => "???", "o" => "???", "p" => "???", "(" => "(", "]" => "]", "\\" => "\\", "Q" => "???", "W" => "???", "E" => "???", "R" => "???", "T" => "???", "Y" => "???", "U" => "???", "I" => "???", "O" => "???", "P" => "???", "array(" => "array(", ")" => ")", "|" => "|", "a" => "???", "s" => "???", "d" => "???", "f" => "???", "g" => "???", "h" => "???", "j" => "???", "k" => "???", "l" => "???", ";" => "???", "'" => "???", "A" => "???", "S" => "???", "D" => "???", "F" => "???", "G" => "???", "H" => "???", "J" => "???", "K" => "???", "L" => "???", "=>" => "???", "\"" => "\"", "z" => "???", "x" => "???", "c" => "???", "v" => "???", "b" => "???", "n" => "???", "m" => "???", "," => "???", "." => "???", "/" => "???", "Z" => "???", "X" => "???", "C" => "???", "V" => "???", "B" => "???", "N" => "???", "M" => "???", "<" => "<", ">" => ">", "?" => "???");

  $custom1 = json_decode('{"0":"0\u0335\u033d\u0304\u0311\u0307\u033d\u035d\u0344\u0310\u0327\u0320\u034d\u0347\u032c\u034e\u0339\u0359","1":"\u0338\u031a\u0303\u031a\u0352\u033e\u0343\u0358\u0303\u0319\u0348\u032d1\u0335\u0307\u032b\u032a\u0323\u0359\u033b","2":"\u0337\u030b\u0350\u030c\u0341\u0310\u033d\u0343\u030a\u0357\u030c\u032d\u0355\u0319\u03312\u0337\u0308\u030a\u0357\u0341\u0300\u0311\u0310\u0360\u030d\u0316","3":"\u0336\u033f\u0358\u0352\u035d\u0359\u035c3\u0335\u0304\u030e\u0356\u035a\u0325\u0320","4":"\u0337\u0344\u0346\u030f\u0309\u0301\u0316\u03224\u0337\u035b\u030a\u035d\u0352\u0343\u035d\u0305\u0348","5":"\u0334\u030a\u0341\u032c\u032c\u0317\u03195\u0334\u0301\u0348\u031f\u0322\u0356","6":"\u0334\u0303\u0306\u0351\u0330\u032b\u03206\u0338\u034a\u030d\u035d\u0343\u0343\u0302\u0309\u034e\u035a\u031f\u032c\u0349\u032c\u0316","7":"\u0338\u031b\u0346\u030b\u0357\u0309\u034b\u030b\u0309\u03277\u0334\u0305\u0346\u0353\u0332\u0317\u0317\u033b\u033c\u033b","8":"\u0334\u0313\u033d\u0315\u03598\u0334\u0314\u0313\u030e\u0305\u0349\u0329\u0329\u0319\u032b","9":"\u0335\u0300\u0351\u0310\u0344\u030c\u0300\u0344\u0360\u0331\u0325\u0354\u0333\u033a\u0318\u032a\u035a\u03199\u0335\u030b\u0304\u033e\u030a\u0342\u0313\u0360\u030b\u030b\u033c\u0329\u032c\u0331\u031d\u0325\u0328","a":"\u0336\u0310\u0315\u0313\u0300\u0358\u0360\u033f\u0311\u0352\u030b\u0329\u0339\u0329a\u0334\u0315\u0342\u0309\u034a\u0360\u0306\u035a\u0353\u0324\u0332\u033b\u0348\u032f\u0324\u0347","b":"\u0338\u0360\u0345\u0322b\u0336\u0314\u030b\u030a\u0303\u030b\u0307\u0312\u0360\u030a\u0358\u0316\u031e\u0319\u032d\u0321\u0355\u0322","c":"\u0338\u031b\u030c\u033e\u0352\u035d\u030c\u0303\u034a\u035d\u0305\u032e\u033c\u0318\u0333\u0359\u0345\u0333\u0333\u034dc\u0335\u030a\u0307\u0303\u0356\u0349\u033c\u031d","d":"\u0335\u0344\u0313\u0304\u034e\u031c\u0328\u0359\u0355\u0332\u0348\u0319\u0324\u0319d\u0334\u034b\u035b\u0305\u032b\u0316\u0318\u0321\u0355\u0354\u035a\u0321\u0321","e":"\u0335\u031b\u034c\u030b\u0346\u0358\u030b\u034c\u030b\u0352\u033b\u032e\u031d\u0354\u033a\u0326\u032ae\u0334\u0341\u0360\u033e\u034c\u031b\u033d\u0342\u030a\u0318\u0321\u0324","f":"\u0335\u0300\u0355\u0320\u0332f\u0337\u0304\u0304\u0352\u0311\u033e\u0301\u0306\u0331\u0322\u0328\u0321","g":"\u0337\u0315\u0323\u0333\u0318\u0339\u033c\u034e\u0349g\u0334\u0309\u030b\u0303\u030d\u0360\u0350\u033e\u0357\u0346\u0310\u0339\u0323\u0327\u0347\u0319\u0323\u032b","h":"\u0335\u0308\u0300\u0342\u0341\u033d\u0302\u0312\u030b\u0324\u0325h\u0338\u0305\u034a\u0304\u033e\u0309\u0313\u030e\u0342\u0313\u031c","i":"\u0337\u0308\u0304\u030e\u0341\u0301\u0340\u033f\u0325\u0353\u033bi\u0335\u0360\u0350\u0341\u0315\u0315\u0305\u0357\u0340\u0321\u0329\u0319\u0331\u0321\u034d\u031d\u0333","j":"\u0335\u033d\u0351\u033d\u0306\u0316\u031e\u031f\u0345\u031c\u033a\u0324j\u0336\u035d\u033f\u0343\u0314\u0312\u0307\u0352\u0317\u035c","k":"\u0334\u0351\u031f\u032c\u0317\u0348\u0333\u0322\u0317\u0345\u0325k\u0335\u0344\u0314\u0341\u0304\u031d","l":"\u0334\u0300\u0315\u0344\u0329\u0319\u0330\u0318\u034e\u0331\u031d\u0319l\u0335\u0340\u031b\u0302\u0358\u0358\u030b\u0360\u030d\u035d\u035d\u0326\u0326","m":"\u0335\u0360\u035a\u0328\u0321m\u0336\u031a\u030e\u0307\u0344\u0308\u031e","n":"\u0334\u0301\u034a\u0343\u033d\u0341\u030c\u033d\u0340\u035b\u0345\u0319\u032d\u0322\u033a\u0345\u0329\u035a\u0332n\u0334\u0309\u034a\u0357\u0350\u033f\u034d\u0353","o":"\u0337\u034c\u0357\u0305\u0333\u032a\u0328\u032d\u031do\u0336\u030b\u035d\u033d\u035b\u0309\u0357\u0313\u0327\u033b\u032a\u0331\u0326\u0333","p":"\u0336\u0315\u035b\u0359\u0354\u0323\u0322\u0316\u032a\u032ep\u0338\u0344\u0354\u031f\u0355\u0324\u0326\u033b\u032b\u031e\u035c","q":"\u0336\u034a\u030e\u0344\u0312\u0346\u034a\u0314\u0304\u034b\u0302\u0353\u0324\u0325\u034d\u0326\u0317\u0353\u034d\u0349q\u0338\u0343\u030b\u0314\u0350\u0340\u0327\u0316\u032c\u032d\u0353","r":"\u0337\u0350\u0343\u0360\u0327\u0323\u0354\u0345r\u0335\u0307\u0350\u0306\u035d\u035d\u031b\u031a\u0308\u032a\u032a\u035a\u0332\u0329\u032b\u031c","s":"\u0334\u031b\u0302\u0310\u0317\u0325\u0320s\u0335\u030d\u0352\u0351\u0300\u0341\u0312\u0352\u030d\u0303\u0315\u0325\u032b\u033a\u035a\u0333\u0316","t":"\u0334\u0357\u0331\u0353\u0317t\u0334\u0303\u0322\u0323","u":"\u0334\u031b\u0348\u035a\u0330\u032d\u035a\u031e\u0330\u0329u\u0335\u035d\u031a\u0308\u0357\u032c\u0354\u032e\u032f\u0355\u0353","v":"\u0336\u0311\u0344\u0358\u035d\u0300\u0306\u0304\u0355\u0322\u031c\u0319\u0345v\u0338\u0351\u034a\u031b\u032d\u0354\u0347\u0324\u0359\u032f","w":"\u0336\u030d\u0357\u033e\u0303\u030b\u031a\u0314\u0310\u0327\u0324\u0356\u0322\u0356\u0329\u0322w\u0337\u030d\u034a\u0333\u0356\u0356\u0359\u031c\u031c\u031e","x":"\u0335\u0312\u0357\u034c\u0358\u030f\u031b\u032b\u0348\u0359\u034d\u035c\u032e\u0347\u032fx\u0337\u0301\u0326\u0349\u0325\u0327\u035a\u0321\u0330\u032f","y":"\u0337\u033f\u0306\u030c\u030a\u0305\u030b\u034b\u0350\u0323\u0354\u033a\u032b\u0348\u0326\u033a\u0331\u0323\u034ey\u0335\u0341\u0306\u032c\u0326\u032c","z":"\u0336\u0358\u0306\u0311\u0312\u033e\u0310\u0310\u035b\u0305\u033e\u0317\u0316\u034e\u0317z\u0337\u0350\u030e\u034c\u0340\u0302\u034b\u030b\u0341\u0327\u0354\u035a\u0325\u0316\u032a\u0327","A":"\u0337\u035d\u0344\u0344\u0342\u0343\u030d\u0322\u031e\u0320\u0320\u0324\u0353\u0329\u032bA\u0334\u030a\u0313\u0344\u0303\u0315\u0360\u0300\u0306\u0316\u0355\u0330\u0317\u0321\u0319\u0323\u031f","B":"\u0337\u0315\u0346\u0304\u0309\u0320\u0332B\u0337\u0340\u030c\u033c\u0318\u0333\u031d\u0317\u0328\u0327\u0317\u0319\u0355","C":"\u0334\u0315\u030f\u0342\u030c\u030d\u033d\u0342\u0303\u030a\u0316\u0323\u0326\u0355\u033a\u035aC\u0336\u030e\u0309\u0312\u0312\u0344\u0322\u031f\u032c\u031c","D":"\u0334\u0344\u030f\u0343\u033e\u031a\u0343\u030f\u035a\u032e\u0330D\u0338\u035d\u0344\u030f\u0352\u030e\u0307\u0318\u0330\u0339\u033a\u034e","E":"\u0338\u034c\u0304\u0325\u0317\u031dE\u0337\u0350\u0305\u030b\u0311\u0308\u0358\u0360\u030d\u0301\u033c\u0349","F":"\u0337\u0352\u035d\u0344\u0333\u0326\u032e\u033aF\u0334\u0360\u031a\u0305\u0348\u0339\u0331\u0323\u033c\u0347\u032e","G":"\u0337\u0306\u031a\u034b\u0311\u0319\u0325\u0319\u031d\u034e\u0316\u0329G\u0335\u030c\u034b\u0360\u0350\u0342\u035b\u0325\u0318\u032f\u0332","H":"\u0335\u0350\u030c\u0360\u0342\u0360\u0345\u035a\u0349H\u0336\u0344\u0344\u030f\u0306\u0344\u0346\u034b\u0310\u0305\u0303\u0324\u0359\u0319","I":"\u0335\u0300\u0352\u0340\u0309\u032aI\u0337\u034c\u033e\u0355\u031d\u032f\u032c\u033b\u0339\u031e\u0327","J":"\u0336\u0360\u0306\u0341\u0346\u034a\u0320\u0319\u0331J\u0336\u0351\u031b\u0311\u0314\u0314\u0341\u0307\u030a\u0307\u031a\u0321\u0356\u033b\u031e\u0354\u031d\u0333\u033b\u032d","K":"\u0338\u030f\u0312\u0357\u033b\u034e\u0326\u0359\u0345\u0331K\u0334\u0350\u035d\u0319\u0324\u0325\u0331\u0347\u0353\u0356\u0328\u0327\u0347","L":"\u0338\u031a\u0317\u032a\u033c\u0356\u0332\u0320\u033c\u034e\u0322\u0319L\u0335\u0308\u0301\u0310\u0300\u034b\u0351\u033e\u033d\u031f\u0321\u0359\u0318\u0330","M":"\u0338\u035d\u030a\u034b\u0303\u031c\u0349\u0327\u0320\u0355\u0320M\u0335\u0302\u030c\u0346\u0307\u0346\u031a\u0346\u0316\u032f\u0321\u0359\u0323","N":"\u0335\u030c\u0303\u034d\u031f\u031e\u033c\u0326\u032d\u0348\u032d\u0324N\u0337\u0302\u033f\u0303\u032d\u0327\u034e\u0345\u0330\u0320","O":"\u0338\u0360\u0343\u0346\u0344\u030f\u033d\u0347\u0355\u033b\u0329\u031d\u0324\u0330\u033a\u031fO\u0338\u035d\u0341\u030d\u035b\u0308\u0329\u031f\u032c\u0324\u032a\u0349\u0359\u0323","P":"\u0335\u0350\u031a\u033b\u0330\u0327\u033b\u032a\u031e\u0348P\u0338\u0342\u0357\u033d\u033a\u0359\u0330\u0321","Q":"\u0338\u0300\u033f\u0358\u035b\u0357\u0308\u0312\u032b\u0316\u0316\u0316\u0345\u0319Q\u0334\u0302\u0304\u030a\u032f\u0329\u0356\u0345\u0356\u0316","R":"\u0336\u030a\u0315\u0312\u0309\u034b\u0309\u033bR\u0334\u034b\u0352\u030d\u0345\u0349\u0317\u0328\u0359\u032c\u0349\u0321\u0332\u0326","S":"\u0336\u035d\u0358\u034c\u0360\u031a\u0315\u0312\u0352\u030e\u0340\u0347S\u0337\u0306\u031a\u0310\u0305\u034d\u0347\u034e\u031f\u0322","T":"\u0338\u0358\u0309\u0305\u0317\u0317\u0355T\u0334\u0311\u0342\u0343\u0341\u0343\u030e\u034a\u034b\u0351\u0309\u032e\u035c\u035c\u033b\u0348\u0332\u033b","U":"\u0336\u0307\u030c\u035d\u030e\u031d\u0354\u0347\u0320\u032c\u0322\u0339\u0333\u0329\u031eU\u0336\u034c\u035d\u030a\u0310\u034b\u0329\u0325\u033b\u032c\u033c","V":"\u0337\u0310\u0308\u0306\u0302\u031a\u0312\u0350\u031e\u032c\u031cV\u0336\u033d\u0345\u035c\u0325\u0348\u0324\u035a","W":"\u0336\u0305\u0342\u0342\u033e\u0351\u0309\u0340\u0346\u0324\u0359\u035a\u0327\u0322\u0319\u0320\u0327W\u0335\u0344\u0345\u0332\u0322","X":"\u0334\u0346\u030c\u032f\u034dX\u0337\u033f\u034a\u030c\u0312\u0302\u0342\u0307\u034a\u033b\u0359\u0349\u0316\u033c\u0320\u0327\u0322\u0326","Y":"\u0337\u0315\u0342\u030e\u0351\u034a\u0305\u035b\u0351\u030d\u0325\u0331\u0328\u0317\u0331\u0347\u032a\u0339Y\u0334\u030b\u031b\u0327\u0327\u033a\u0348\u0355\u032e\u031d\u0326\u031d\u0356","Z":"\u0335\u035d\u0302\u0301\u035d\u0310\u0306\u031b\u030d\u0345\u035c\u031e\u0354\u0359\u032e\u033a\u033b\u034dZ\u0337\u0307\u0304\u030d\u0302\u033f\u0340\u0341\u0315\u0322","||||":"\u0338\u0351\u033f\u0304\u033f\u0302\u0314\u0304\u0344\u0359\u032e\u034e\u0317\u0348\u034e\u032e\u034d\u0359|\u0338\u0308\u0340\u0324\u0339\u0325\u0326\u032b\u0359\u034e\u0333|\u0336\u0340\u0358\u035d\u0352\u030e\u035c\u0331\u0323\u033a\u0330\u032a\u0317\u032c|\u0334\u034b\u0301\u0309\u0344\u0309\u030f\u0356\u0354\u031c\u032f\u0354\u0327\u0325\u032d|\u0336\u0346\u0341\u0315\u0350\u0352\u0309\u030e\u0310\u0347\u0320\u0331\u0316\u035a\u0356\u034e\u0319\u0348\u031e"} ', true);
  $custom2 = json_decode('{"0":"\u24ea","1":"\u2460","2":"\u2461","3":"\u2462","4":"\u2463","5":"\u2464","6":"\u2465","7":"\u2466","8":"\u2467","9":"\u2468","a":"\u24d0","b":"\u24d1","c":"\u24d2","d":"\u24d3","e":"\u24d4","f":"\u24d5","g":"\u24d6","h":"\u24d7","i":"\u24d8","j":"\u24d9","k":"\u24da","l":"\u24db","m":"\u24dc","n":"\u24dd","o":"\u24de","p":"\u24df","q":"\u24e0","r":"\u24e1","s":"\u24e2","t":"\u24e3","u":"\u24e4","v":"\u24e5","w":"\u24e6","x":"\u24e7","y":"\u24e8","z":"\u24e9","A":"\u24b6","B":"\u24b7","C":"\u24b8","D":"\u24b9","E":"\u24ba","F":"\u24bb","G":"\u24bc","H":"\u24bd","I":"\u24be","J":"\u24bf","K":"\u24c0","L":"\u24c1","M":"\u24c2","N":"\u24c3","O":"\u24c4","P":"\u24c5","Q":"\u24c6","R":"\u24c7","S":"\u24c8","T":"\u24c9","U":"\u24ca","V":"\u24cb","W":"\u24cc","X":"\u24cd","Y":"\u24ce","Z":"\u24cf"} ', true);
  $custom3 = json_decode('{"0":"\u30100\u3011","1":"\u30101\u3011","2":"\u30102\u3011","3":"\u30103\u3011","4":"\u30104\u3011","5":"\u30105\u3011","6":"\u30106\u3011","7":"\u30107\u3011","8":"\u30108\u3011","9":"\u30109\u3011","a":"\u3010a\u3011","b":"\u3010b\u3011","c":"\u3010c\u3011","d":"\u3010d\u3011","e":"\u3010e\u3011","f":"\u3010f\u3011","g":"\u3010g\u3011","h":"\u3010h\u3011","i":"\u3010i\u3011","j":"\u3010j\u3011","k":"\u3010k\u3011","l":"\u3010l\u3011","m":"\u3010m\u3011","n":"\u3010n\u3011","o":"\u3010o\u3011","p":"\u3010p\u3011","q":"\u3010q\u3011","r":"\u3010r\u3011","s":"\u3010s\u3011","t":"\u3010t\u3011","u":"\u3010u\u3011","v":"\u3010v\u3011","w":"\u3010w\u3011","x":"\u3010x\u3011","y":"\u3010y\u3011","z":"\u3010z\u3011","A":"\u3010A\u3011","B":"\u3010B\u3011","C":"\u3010C\u3011","D":"\u3010D\u3011","E":"\u3010E\u3011","F":"\u3010F\u3011","G":"\u3010G\u3011","H":"\u3010H\u3011","I":"\u3010I\u3011","J":"\u3010J\u3011","K":"\u3010K\u3011","L":"\u3010L\u3011","M":"\u3010M\u3011","N":"\u3010N\u3011","O":"\u3010O\u3011","P":"\u3010P\u3011","Q":"\u3010Q\u3011","R":"\u3010R\u3011","S":"\u3010S\u3011","T":"\u3010T\u3011","U":"\u3010U\u3011","V":"\u3010V\u3011","W":"\u3010W\u3011","X":"\u3010X\u3011","Y":"\u3010Y\u3011","Z":"\u3010Z\u3011"} ', true);
  $custom3 = json_decode('{"0":"\u300e0\u300f","1":"\u300e1\u300f","2":"\u300e2\u300f","3":"\u300e3\u300f","4":"\u300e4\u300f","5":"\u300e5\u300f","6":"\u300e6\u300f","7":"\u300e7\u300f","8":"\u300e8\u300f","9":"\u300e9\u300f","a":"\u300ea\u300f","b":"\u300eb\u300f","c":"\u300ec\u300f","d":"\u300ed\u300f","e":"\u300ee\u300f","f":"\u300ef\u300f","g":"\u300eg\u300f","h":"\u300eh\u300f","i":"\u300ei\u300f","j":"\u300ej\u300f","k":"\u300ek\u300f","l":"\u300el\u300f","m":"\u300em\u300f","n":"\u300en\u300f","o":"\u300eo\u300f","p":"\u300ep\u300f","q":"\u300eq\u300f","r":"\u300er\u300f","s":"\u300es\u300f","t":"\u300et\u300f","u":"\u300eu\u300f","v":"\u300ev\u300f","w":"\u300ew\u300f","x":"\u300ex\u300f","y":"\u300ey\u300f","z":"\u300ez\u300f","A":"\u300eA\u300f","B":"\u300eB\u300f","C":"\u300eC\u300f","D":"\u300eD\u300f","E":"\u300eE\u300f","F":"\u300eF\u300f","G":"\u300eG\u300f","H":"\u300eH\u300f","I":"\u300eI\u300f","J":"\u300eJ\u300f","K":"\u300eK\u300f","L":"\u300eL\u300f","M":"\u300eM\u300f","N":"\u300eN\u300f","O":"\u300eO\u300f","P":"\u300eP\u300f","Q":"\u300eQ\u300f","R":"\u300eR\u300f","S":"\u300eS\u300f","T":"\u300eT\u300f","U":"\u300eU\u300f","V":"\u300eV\u300f","W":"\u300eW\u300f","X":"\u300eX\u300f","Y":"\u300eY\u300f","Z":"\u300eZ\u300f"} ', true);
  $custom4 = json_decode('{"0":"\u224b0\u224b","1":"\u224b1\u224b","2":"\u224b2\u224b","3":"\u224b3\u224b","4":"\u224b4\u224b","5":"\u224b5\u224b","6":"\u224b6\u224b","7":"\u224b7\u224b","8":"\u224b8\u224b","9":"\u224b9\u224b","a":"\u224ba\u224b","b":"\u224bb\u224b","c":"\u224bc\u224b","d":"\u224bd\u224b","e":"\u224be\u224b","f":"\u224bf\u224b","g":"\u224bg\u224b","h":"\u224bh\u224b","i":"\u224bi\u224b","j":"\u224bj\u224b","k":"\u224bk\u224b","l":"\u224bl\u224b","m":"\u224bm\u224b","n":"\u224bn\u224b","o":"\u224bo\u224b","p":"\u224bp\u224b","q":"\u224bq\u224b","r":"\u224br\u224b","s":"\u224bs\u224b","t":"\u224bt\u224b","u":"\u224bu\u224b","v":"\u224bv\u224b","w":"\u224bw\u224b","x":"\u224bx\u224b","y":"\u224by\u224b","z":"\u224bz\u224b","A":"\u224bA\u224b","B":"\u224bB\u224b","C":"\u224bC\u224b","D":"\u224bD\u224b","E":"\u224bE\u224b","F":"\u224bF\u224b","G":"\u224bG\u224b","H":"\u224bH\u224b","I":"\u224bI\u224b","J":"\u224bJ\u224b","K":"\u224bK\u224b","L":"\u224bL\u224b","M":"\u224bM\u224b","N":"\u224bN\u224b","O":"\u224bO\u224b","P":"\u224bP\u224b","Q":"\u224bQ\u224b","R":"\u224bR\u224b","S":"\u224bS\u224b","T":"\u224bT\u224b","U":"\u224bU\u224b","V":"\u224bV\u224b","W":"\u224bW\u224b","X":"\u224bX\u224b","Y":"\u224bY\u224b","Z":"\u224bZ\u224b"} ', true);
  $custom5 = json_decode('{"0":"\u25910\u2591","1":"\u25911\u2591","2":"\u25912\u2591","3":"\u25913\u2591","4":"\u25914\u2591","5":"\u25915\u2591","6":"\u25916\u2591","7":"\u25917\u2591","8":"\u25918\u2591","9":"\u25919\u2591","a":"\u2591a\u2591","b":"\u2591b\u2591","c":"\u2591c\u2591","d":"\u2591d\u2591","e":"\u2591e\u2591","f":"\u2591f\u2591","g":"\u2591g\u2591","h":"\u2591h\u2591","i":"\u2591i\u2591","j":"\u2591j\u2591","k":"\u2591k\u2591","l":"\u2591l\u2591","m":"\u2591m\u2591","n":"\u2591n\u2591","o":"\u2591o\u2591","p":"\u2591p\u2591","q":"\u2591q\u2591","r":"\u2591r\u2591","s":"\u2591s\u2591","t":"\u2591t\u2591","u":"\u2591u\u2591","v":"\u2591v\u2591","w":"\u2591w\u2591","x":"\u2591x\u2591","y":"\u2591y\u2591","z":"\u2591z\u2591","A":"\u2591A\u2591","B":"\u2591B\u2591","C":"\u2591C\u2591","D":"\u2591D\u2591","E":"\u2591E\u2591","F":"\u2591F\u2591","G":"\u2591G\u2591","H":"\u2591H\u2591","I":"\u2591I\u2591","J":"\u2591J\u2591","K":"\u2591K\u2591","L":"\u2591L\u2591","M":"\u2591M\u2591","N":"\u2591N\u2591","O":"\u2591O\u2591","P":"\u2591P\u2591","Q":"\u2591Q\u2591","R":"\u2591R\u2591","S":"\u2591S\u2591","T":"\u2591T\u2591","U":"\u2591U\u2591","V":"\u2591V\u2591","W":"\u2591W\u2591","X":"\u2591X\u2591","Y":"\u2591Y\u2591","Z":"\u2591Z\u2591"} ', true);
  $custom6 = json_decode('{"0":"0\u0489","1":"\u04891\u0489","2":"\u04892\u0489","3":"\u04893\u0489","4":"\u04894\u0489","5":"\u04895\u0489","6":"\u04896\u0489","7":"\u04897\u0489","8":"\u04898\u0489","9":"\u04899\u0489","a":"\u0489a\u0489","b":"\u0489b\u0489","c":"\u0489c\u0489","d":"\u0489d\u0489","e":"\u0489e\u0489","f":"\u0489f\u0489","g":"\u0489g\u0489","h":"\u0489h\u0489","i":"\u0489i\u0489","j":"\u0489j\u0489","k":"\u0489k\u0489","l":"\u0489l\u0489","m":"\u0489m\u0489","n":"\u0489n\u0489","o":"\u0489o\u0489","p":"\u0489p\u0489","q":"\u0489q\u0489","r":"\u0489r\u0489","s":"\u0489s\u0489","t":"\u0489t\u0489","u":"\u0489u\u0489","v":"\u0489v\u0489","w":"\u0489w\u0489","x":"\u0489x\u0489","y":"\u0489y\u0489","z":"\u0489z\u0489","A":"\u0489A\u0489","B":"\u0489B\u0489","C":"\u0489C\u0489","D":"\u0489D\u0489","E":"\u0489E\u0489","F":"\u0489F\u0489","G":"\u0489G\u0489","H":"\u0489H\u0489","I":"\u0489I\u0489","J":"\u0489J\u0489","K":"\u0489K\u0489","L":"\u0489L\u0489","M":"\u0489M\u0489","N":"\u0489N\u0489","O":"\u0489O\u0489","P":"\u0489P\u0489","Q":"\u0489Q\u0489","R":"\u0489R\u0489","S":"\u0489S\u0489","T":"\u0489T\u0489","U":"\u0489U\u0489","V":"\u0489V\u0489","W":"\u0489W\u0489","X":"\u0489X\u0489","Y":"\u0489Y\u0489","Z":"\u0489Z\u0489\r\n"}', true);
  $custom7 = json_decode('{"0":"0\u033d\u0353","1":"\u033d\u03531\u033d\u0353","2":"\u033d\u03532\u033d\u0353","3":"\u033d\u03533\u033d\u0353","4":"\u033d\u03534\u033d\u0353","5":"\u033d\u03535\u033d\u0353","6":"\u033d\u03536\u033d\u0353","7":"\u033d\u03537\u033d\u0353","8":"\u033d\u03538\u033d\u0353","9":"\u033d\u03539\u033d\u0353","a":"\u033d\u0353a\u033d\u0353","b":"\u033d\u0353b\u033d\u0353","c":"\u033d\u0353c\u033d\u0353","d":"\u033d\u0353d\u033d\u0353","e":"\u033d\u0353e\u033d\u0353","f":"\u033d\u0353f\u033d\u0353","g":"\u033d\u0353g\u033d\u0353","h":"\u033d\u0353h\u033d\u0353","i":"\u033d\u0353i\u033d\u0353","j":"\u033d\u0353j\u033d\u0353","k":"\u033d\u0353k\u033d\u0353","l":"\u033d\u0353l\u033d\u0353","m":"\u033d\u0353m\u033d\u0353","n":"\u033d\u0353n\u033d\u0353","o":"\u033d\u0353o\u033d\u0353","p":"\u033d\u0353p\u033d\u0353","q":"\u033d\u0353q\u033d\u0353","r":"\u033d\u0353r\u033d\u0353","s":"\u033d\u0353s\u033d\u0353","t":"\u033d\u0353t\u033d\u0353","u":"\u033d\u0353u\u033d\u0353","v":"\u033d\u0353v\u033d\u0353","w":"\u033d\u0353w\u033d\u0353","x":"\u033d\u0353x\u033d\u0353","y":"\u033d\u0353y\u033d\u0353","z":"\u033d\u0353z\u033d\u0353","A":"\u033d\u0353A\u033d\u0353","B":"\u033d\u0353B\u033d\u0353","C":"\u033d\u0353C\u033d\u0353","D":"\u033d\u0353D\u033d\u0353","E":"\u033d\u0353E\u033d\u0353","F":"\u033d\u0353F\u033d\u0353","G":"\u033d\u0353G\u033d\u0353","H":"\u033d\u0353H\u033d\u0353","I":"\u033d\u0353I\u033d\u0353","J":"\u033d\u0353J\u033d\u0353","K":"\u033d\u0353K\u033d\u0353","L":"\u033d\u0353L\u033d\u0353","M":"\u033d\u0353M\u033d\u0353","N":"\u033d\u0353N\u033d\u0353","O":"\u033d\u0353O\u033d\u0353","P":"\u033d\u0353P\u033d\u0353","Q":"\u033d\u0353Q\u033d\u0353","R":"\u033d\u0353R\u033d\u0353","S":"\u033d\u0353S\u033d\u0353","T":"\u033d\u0353T\u033d\u0353","U":"\u033d\u0353U\u033d\u0353","V":"\u033d\u0353V\u033d\u0353","W":"\u033d\u0353W\u033d\u0353","X":"\u033d\u0353X\u033d\u0353","Y":"\u033d\u0353Y\u033d\u0353","Z":"\u033d\u0353Z\u033d\u0353"}', true);
  $custom8 = json_decode('{"0":"0\u033e","1":"\u033e1\u033e","2":"\u033e2\u033e","3":"\u033e3\u033e","4":"\u033e4\u033e","5":"\u033e5\u033e","6":"\u033e6\u033e","7":"\u033e7\u033e","8":"\u033e8\u033e","9":"\u033e9\u033e","a":"\u033ea\u033e","b":"\u033eb\u033e","c":"\u033ec\u033e","d":"\u033ed\u033e","e":"\u033ee\u033e","f":"\u033ef\u033e","g":"\u033eg\u033e","h":"\u033eh\u033e","i":"\u033ei\u033e","j":"\u033ej\u033e","k":"\u033ek\u033e","l":"\u033el\u033e","m":"\u033em\u033e","n":"\u033en\u033e","o":"\u033eo\u033e","p":"\u033ep\u033e","q":"\u033eq\u033e","r":"\u033er\u033e","s":"\u033es\u033e","t":"\u033et\u033e","u":"\u033eu\u033e","v":"\u033ev\u033e","w":"\u033ew\u033e","x":"\u033ex\u033e","y":"\u033ey\u033e","z":"\u033ez\u033e","A":"\u033eA\u033e","B":"\u033eB\u033e","C":"\u033eC\u033e","D":"\u033eD\u033e","E":"\u033eE\u033e","F":"\u033eF\u033e","G":"\u033eG\u033e","H":"\u033eH\u033e","I":"\u033eI\u033e","J":"\u033eJ\u033e","K":"\u033eK\u033e","L":"\u033eL\u033e","M":"\u033eM\u033e","N":"\u033eN\u033e","O":"\u033eO\u033e","P":"\u033eP\u033e","Q":"\u033eQ\u033e","R":"\u033eR\u033e","S":"\u033eS\u033e","T":"\u033eT\u033e","U":"\u033eU\u033e","V":"\u033eV\u033e","W":"\u033eW\u033e","X":"\u033eX\u033e","Y":"\u033eY\u033e","Z":"\u033eZ\u033e"} ', true);

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