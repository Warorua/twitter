<?php
ini_set('max_execution_time', 1800);
include '../../includes/conn.php';

/////ENGINE FUNCTIONS
function campaign_4_killer($file_name, $error, $status)
{
    global $row;
    global $conn;
    global $client_load;
    $init_points = safeDecrypt($client_load['p_value'], $client_load['p_key']);
    $added_points = $row['budget'] - intval($row['spent_budget']);
    $raw_points = floatval($init_points) + $added_points;

    $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
    $cipher_points = safeEncrypt($raw_points, $key);

    $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
    $stmt->execute(['id' => $client_load['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);
    usageTrack('-' . $added_points, '');
    $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
    $stmt->execute(['id' => $row['id']]);

    $output = 'Campaign ended: '.$error.' ~ Generated from campaign '.$row['id'];
    twitter_log($client_load['email'], '', $status, 'T0', $client_load['id'], $client_load['id'], $output);


    unlink($file_name);
    die();
}
//*

$stmt = $conn->prepare("SELECT *  FROM campaign_engine WHERE execution<:time LIMIT 10");
$stmt->execute(['time' => time()]);
$data = $stmt->fetchAll();

foreach ($data as $row) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id' => $row['user_id']]);

    $client_load = $stmt->fetch();
  

    $auth_key = $_SESSION['access_token'] = array('oauth_token' => $client_load['access_token'], 'oauth_token_secret' => $client_load['access_secret']);

    $auth_code = json_encode($auth_key);


    $_GET = array('bot_id' => $client_load['id'], 'auth_key' => $auth_code);

    include '../../includes/session.php';
    require '../../vendor/autoload.php';
    include '../../includes/api_config.php';


    ///////////DELETE PENDING ACTIVE CAMPAIGNS
    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM campaign_engine WHERE user_id=:user_id AND status=:status");
    $stmt->execute(['user_id' => $row['user_id'], 'status' => 1]);
    $data = $stmt->fetch();
    if ($data['numrows'] > 0) {

        $user_points = safeDecrypt($client_load['p_value'], $client_load['p_key']);

        $added_points = $data['budget'] - intval($data['spent_budget']);
        $raw_points = floatval($user_points) + $added_points;

        $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
        $cipher_points = safeEncrypt($raw_points, $key);

        $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
        $stmt->execute(['id' => $client_load['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);

        usageTrack('-' . $added_points, '');

        if ($data['campaign'] == 1) {
            $file_path = 'followers';
        } elseif ($data['campaign'] == 3) {
            $file_path = 'tweets';
        } else {
            $file_path = 'following';
        }

        $file_name = "../../process/client/" . $file_path . "/" . $client_load['t_id'] . ".json";

        if (file_exists($file_name)) {
            unlink($file_name);
        }


        $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
        $stmt->execute(['id' => $data['id']]);

        $mode = 'T0';
        $status = 1;
        $output = 'The system automatically deleted an active campaign of id:' . $data['campaign'].' due to a processing error.';
        $auth_user = $client_load['t_id'];
        twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
        die();
    }
    ///////////SET CAMPAIGN AS ACTIVE
    $stmt = $conn->prepare("UPDATE campaign_engine SET status=:status WHERE id=:id");
    $stmt->execute(['id' => $row['id'], 'status' => 1]);


    //////////////////////////////////////////////////////////////////////////////////////////////////


    if ($row['campaign'] == 1) {
        $path = $parent_url . '/process/post/follow_user.php';


        $file_name = "../../process/client/followers/" . $client_load['t_id'] . ".json";
        if (file_exists($file_name)) {
            $data_3 = json_decode(file_get_contents($file_name), true);
        } else {
            $user_b = $user_client->getFollowers($client_load['t_id']);


            $followers_data = json_encode($user_b);

            $file_data = fopen($file_name, "w");

            fwrite($file_data, $followers_data);

            fclose($file_data);

            $data_3 = json_decode($followers_data, true);
        }
        if ($row['last_key'] == '') {

            if (isset($data_3['data'][0]['id'])) {
                $to_follow_id = $data_3['data'][0]['id'];
            } else {
                $error = 'Campaign batch is empty. No traversable data.';
                campaign_4_killer($file_name, $error, 2);
            }
        } else {
            if (isset($data_3['data'][$row['last_key']]['id'])) {
                $to_follow_id = $data_3['data'][$row['last_key']]['id'];
            } else {
                $error = 'Campaign last key is unavailable. No traversable data.';
                campaign_4_killer($file_name, $error, 2);
            }
        }

        $abraham_client->setApiVersion('1.1');
        $data = $abraham_client->get('friendships/lookup', [
            "user_id" => $to_follow_id,
            //'id' => $client_load['t_id'],

        ]);

        $arr_79 = array_convert($data);

        if ($arr_79[0]['connections'][0] != 'following') {
            follow($to_follow_id);
          //  charge($charge['follow_charge']);
            if ($row['spent_budget'] == '') {
                $spent_budget = $charge['follow_charge'];
            } else {
                $spent_budget = intval($row['spent_budget']) + $charge['follow_charge'];
            }
        } else {
            $spent_budget = $row['spent_budget'];
        }



        $last_key = floatval($row['last_key']) + 1;

        if ($row['execution'] == '') {
            $execution = time() + $row['frequency'];
        } else {
            $execution = $row['execution'] + $row['frequency'];
        }






        $mode = 'T0';
        $command = 'follow';
        $output = $command . ' automation success';
        $status = 1;
        $auth_user = $client_load['id'];
       
        $init_points = safeDecrypt($client_load['p_value'], $client_load['p_key']);
        $arr_78 = end($data_3['data']);
        if ($last_key >= 100 && $arr_78['id'] == $to_follow_id) {
            if (!isset($data_3['meta']['next_token'])) {
                $added_points = $row['budget'] - intval($row['spent_budget']);
                $raw_points = floatval($init_points) + $added_points;

                $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
                $cipher_points = safeEncrypt($raw_points, $key);

                $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
                $stmt->execute(['id' => $client_load['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);
                usageTrack('-' . $added_points, '');
                $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
                $stmt->execute(['id' => $row['id']]);

                
                $output = 'Campaign ended: Last traversal key equal or greater than 100, No next pagination token, Last data key reached.';
                twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
   

                unlink($file_name);
                die();
            } else {
                $user_c = $user_client->getFollowers($client_load['t_id'], 100, $data_3['meta']['next_token']);

                unlink($file_name);

                $followers_data = json_encode($user_c);

                $file_data = fopen($file_name, "w");

                fwrite($file_data, $followers_data);

                $last_key = '';

                fclose($file_data);
            }
        } elseif ($last_key < 100 && !isset($data_3['meta']['next_token']) && $arr_78['id'] == $to_follow_id) {
            $output = 'Last traversal key less than 100, No next pagination token, Last data key reached.';
            campaign_4_killer($file_name, $output, 1);
        }



        if ($row['budget'] <= $row['spent_budget']) {
            $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
            $stmt->execute(['id' => $row['id']]);
            unlink($file_name);

            $output = 'Campaign ended: Budget limit reached! Campaign ID: ' . $row['id'];
            twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
            die();
        }

        engine_control($command, 1);
        twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
   
    } elseif ($row['campaign'] == 2) {
        //$path = $parent_url . '/process/post/like_timeline.php';


        //*
        $data = $abraham_client->get('statuses/home_timeline', [
            "count" => 20,
            'id' => $client_load['t_id'],

        ]);
        $data_2 = array_convert($data);
        $agg_charge = 0;
        $agg_count = 0;
        foreach ($data_2 as $row2) {
            // charge($charge['']);
            if ($row2['favorited'] == FALSE) {
                like_tweet($client_load['t_id'], $row2['id'] );
                $agg_charge += $charge['like_charge'];
                $agg_count += 1;
            }
           
        }
        //*/

        if ($row['spent_budget'] == '') {
            $spent_budget = $agg_charge;
        } else {
            $spent_budget = intval($row['spent_budget']) + $agg_charge;
        }
        if ($row['execution'] == '') {
            $execution = time() + $row['frequency'];
        } else {
            $execution = $row['execution'] + $row['frequency'];
        }

        $mode = 'T0';
        $command = 'like';
        $output = $command . ' automation success';
        $status = 1;
        $auth_user = $client_load['id'];

        if ($row['budget'] <= $row['spent_budget']) {
            $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
            $stmt->execute(['id' => $row['id']]);
            
            $output = 'Campaign ended: Budget limit reached! Campaign ID: ' . $row['id'];
            twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
            die();
        }

        engine_control($command, $agg_count);
        twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
    
    } elseif ($row['campaign'] == 3) {
       
        $file_name = "../../process/client/tweets/" . $client_load['t_id'] . ".json";
        if (file_exists($file_name)) {
            $data_3 = json_decode(file_get_contents($file_name), true);
        } else {
            $abraham_client->setApiVersion('1.1');
            $user_b = $abraham_client->get('statuses/user_timeline', [
                "count" => 3200,
                'id' => $client_load['t_id'],

            ]);


            $followers_data = json_encode($user_b);

            $file_data = fopen($file_name, "w");

            fwrite($file_data, $followers_data);

            fclose($file_data);

            $data_3 = json_decode($followers_data, true);
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////
        
        if ($row['last_key'] == '') {

            if (isset($data_3[0]['id'])) {
                $to_delete_id = $data_3[0]['id'];
            } else {
                $error = 'Campaign batch is empty. No traversable data.';
                campaign_4_killer($file_name, $error, 2);
            }
        } else {
            if (isset($data_3[$row['last_key']]['id'])) {
                $to_delete_id = $data_3[$row['last_key']]['id'];
            } else {
                $error = 'Campaign last key is unavailable. No traversable data.';
                campaign_4_killer($file_name, $error, 2);
            }
        }

      //  for ($i = 0; $i <= $run_lap; $i++) {
        
              $tweet_client->deleteTweet($to_delete_id);
            //  $lab = $tweet_client->deleteTweet($to_delete_id);

            //  charge($charge['follow_charge']);
            if ($row['spent_budget'] == '') {
                $spent_budget = $charge['tweet_charge'];
            } else {
                $spent_budget = intval($row['spent_budget']) + $charge['tweet_charge'];
            }




            $last_key = floatval($row['last_key']) + 1;

            if ($row['execution'] == '') {
                $execution = time() + $row['frequency'];
            } else {
                $execution = $row['execution'] + $row['frequency'];
            }




            $mode = 'T0';
            $command = 'delete_tweet';
            $output = $command . ' automation success';
            $status = 1;
            $auth_user = $client_load['id'];

            $init_points = safeDecrypt($client_load['p_value'], $client_load['p_key']);
            $arr_78 = end($data_3);



            /*
           if ($arr_78['id'] == $to_delete_id) {
            if (!isset($data_3['meta']['next_token'])) {
                $added_points = $row['budget'] - intval($row['spent_budget']);
                $raw_points = floatval($init_points) + $added_points;

                $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
                $cipher_points = safeEncrypt($raw_points, $key);

                $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
                $stmt->execute(['id' => $client_load['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);
       usageTrack('-' . $added_points, '');
                $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
                $stmt->execute(['id' => $row['id']]);

                
            
            
            $output = 'Campaign ended: All tweets deletion status unknown, No next pagination token, Last data key reached.';
            twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
   

            unlink($file_name);
            die();
            } else {
                $abraham_client->setApiVersion('1.1');
                $user_c = $abraham_client->get('statuses/user_timeline', [
                    "count" => 3200,
                    'id' => $client_load['t_id'],
    
                ]);

                unlink($file_name);

                $followers_data = json_encode($user_c);

                $file_data = fopen($file_name, "w");

                fwrite($file_data, $followers_data);

                $last_key = '';

                fclose($file_data);
            }
           }
            */




            if ($arr_78['id'] == $to_delete_id) {
                $abraham_client->setApiVersion('1.1');
                $user_c = $abraham_client->get('statuses/user_timeline', [
                    "count" => 3200,
                    'id' => $client_load['t_id'],

                ]);

                unlink($file_name);

                $followers_data = json_encode($user_c);

                $file_data = fopen($file_name, "w");

                fwrite($file_data, $followers_data);

                $last_key = '';

                fclose($file_data);


                $output = 'Batch traversal done. Progressed to the next batch. Campaign ID: ' . $row['id'];
                twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
            }






            $file_surv = count(json_decode(file_get_contents($file_name), true));
            if ($arr_78['id'] == $to_delete_id && $file_surv == 0 || $file_surv == NULL || $file_surv == FALSE) {
                
                $output = 'All tweets deleted, Last data key reached.';
                campaign_4_killer($file_name, $output, 1);
            }



            if ($row['budget'] <= $row['spent_budget']) {
                $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
                $stmt->execute(['id' => $row['id']]);
                unlink($file_name);

                $output = 'Campaign ended: Budget limit reached! Campaign ID: ' . $row['id'];
                twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
                die();
            }

            engine_control($command, 1);
            twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
           
      //  }
     //echo json_encode($run_lap); 





    } elseif ($row['campaign'] == 4) {
        $mode = 'T0';
        $command = 'unfollow';
        $status = 2;
        $auth_user = $client_load['id'];
        try {

            $path = $parent_url . '/process/post/follow_user.php';


            $file_name = "../../process/client/following/" . $client_load['t_id'] . ".json";
            if (file_exists($file_name)) {
                $data_3 = json_decode(file_get_contents($file_name), true);
            } else {
                $user_b = $user_client->getFollowing($client_load['t_id']);


                $followers_data = json_encode($user_b);

                $file_data = fopen($file_name, "w");

                fwrite($file_data, $followers_data);

                fclose($file_data);

                $data_3 = json_decode($followers_data, true);
            }
            if ($row['last_key'] == '') {

                if (isset($data_3['data'][0]['id'])) {
                    $to_unfollow_id = $data_3['data'][0]['id'];
                } else {
                    $error = 'Campaign batch is empty. No traversable data.';
                    campaign_4_killer($file_name, $error, 2);
                }
            } else {
                if (isset($data_3['data'][$row['last_key']]['id'])) {
                    $to_unfollow_id = $data_3['data'][$row['last_key']]['id'];
                } else {
                    $error = 'Campaign last key is unavailable. No traversable data.';
                    campaign_4_killer($file_name, $error, 2);
                }
            }

            $abraham_client->setApiVersion('1.1');
            $data = $abraham_client->get('friendships/lookup', [
                "user_id" => $to_unfollow_id,
                //'id' => $client_load['t_id'],

            ]);

            $arr_79 = array_convert($data);

            if ($arr_79[0]['connections'][1] != 'followed_by') {
                unfollow($to_unfollow_id);
                //  charge($charge['follow_charge']);
                if ($row['spent_budget'] == '') {
                    $spent_budget = $charge['follow_charge'];
                } else {
                    $spent_budget = intval($row['spent_budget']) + $charge['follow_charge'];
                }
            } else {
                $spent_budget = $row['spent_budget'];
            }



            $last_key = floatval($row['last_key']) + 1;

            if ($row['execution'] == '') {
                $execution = time() + $row['frequency'];
            } else {
                $execution = $row['execution'] + $row['frequency'];
            }




            $mode = 'T0';
            $command = 'unfollow';
            $output = $command . ' automation success';
            $status = 1;
            $auth_user = $client_load['id'];


            $init_points = safeDecrypt($client_load['p_value'], $client_load['p_key']);
            $arr_78 = end($data_3['data']);
            if ($last_key >= 100 && $arr_78['id'] == $to_unfollow_id) {
                if (!isset($data_3['meta']['next_token'])) {
                    $added_points = $row['budget'] - intval($row['spent_budget']);
                    $raw_points = floatval($init_points) + $added_points;

                    $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
                    $cipher_points = safeEncrypt($raw_points, $key);

                    $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
                    $stmt->execute(['id' => $client_load['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);
                    usageTrack('-' . $added_points, '');
                    $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
                    $stmt->execute(['id' => $row['id']]);

                    $output = 'Campaign ended: Last traversal key equal or greater than 100, No next pagination token, Last data key reached.';
                    twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);


                    unlink($file_name);
                    die();
                } else {
                    $user_c = $user_client->getFollowers($client_load['t_id'], 100, $data_3['meta']['next_token']);

                    unlink($file_name);

                    $followers_data = json_encode($user_c);

                    $file_data = fopen($file_name, "w");

                    fwrite($file_data, $followers_data);

                    $last_key = '';

                    fclose($file_data);
                }
            } elseif ($last_key < 100 && !isset($data_3['meta']['next_token']) && $arr_78['id'] == $to_unfollow_id) {
                $output = 'Last traversal key less than 100, No next pagination token, Last data key reached.';
                campaign_4_killer($file_name, $output, 1);
            }



            if ($row['budget'] <= $row['spent_budget']) {
                $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
                $stmt->execute(['id' => $row['id']]);
                unlink($file_name);

                $output = 'Campaign ended: Budget limit reached! Campaign ID: ' . $row['id'];
                twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
                die();
            }

            engine_control($command, 1);
            twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
        } catch (Exception $e) {
            twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $e->getMessage());
        }

    }

        if (!isset($pagination_token)) {
            $pagination_token = '';
        }
        if (!isset($last_key)) {
            $last_key = '';
        }
        if (!isset($execution)) {
            $execution = '';
        }
        if (!isset($spent_budget)) {
            $spent_budget = '';
        }

        $stmt = $conn->prepare("UPDATE campaign_engine SET last_key=:last_key, pagination_token=:pagination_token, spent_budget=:spent_budget, execution=:execution, status=:status WHERE id=:id");
        $stmt->execute(['id' => $row['id'], 'last_key' => $last_key, 'pagination_token' => $pagination_token, 'spent_budget' => $spent_budget, 'execution' => $execution, 'status' => 0]);


        if ($row['budget'] <= $row['spent_budget']) {
            $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
            $stmt->execute(['id' => $row['id']]);

            if (isset($file_name)) {
                unlink($file_name);
            }
        }
    
}
