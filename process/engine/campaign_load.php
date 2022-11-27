<?php
ini_set('max_execution_time', 1800);
include '../../includes/conn.php';

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
            $to_follow_id = $data_3['data'][0]['id'];
        } else {
            $to_follow_id = $data_3['data'][$row['last_key']]['id'];
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

                $last_key = 0;

                fclose($file_data);
            }
        } elseif ($last_key < 100 && !isset($data_3['meta']['next_token']) && $arr_78['id'] == $to_follow_id) {
            $added_points = $row['budget'] - intval($row['spent_budget']);
            $raw_points = floatval($init_points) + $added_points;

            $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
            $cipher_points = safeEncrypt($raw_points, $key);

            $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
            $stmt->execute(['id' => $client_load['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);
            usageTrack('-' . $added_points, '');
            $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
            $stmt->execute(['id' => $row['id']]);

            
            $output = 'Campaign ended: Last traversal key less than 100, No next pagination token, Last data key reached.';
            twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
   

            unlink($file_name);
            die();
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
            $to_delete_id = $data_3[0]['id'];
        } else {
            $to_delete_id = $data_3[$row['last_key']]['id'];
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

                $last_key = 0;

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

                $last_key = 0;

                fclose($file_data);


                $output = 'Batch traversal done. Progressed to the next batch. Campaign ID: ' . $row['id'];
                twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
            }






            $file_surv = count(json_decode(file_get_contents($file_name), true));
            if ($arr_78['id'] == $to_delete_id && $file_surv == 0 || $file_surv == NULL || $file_surv == FALSE) {
                $added_points = $row['budget'] - intval($row['spent_budget']);
                $raw_points = floatval($init_points) + $added_points;

                $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
                $cipher_points = safeEncrypt($raw_points, $key);

                $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
                $stmt->execute(['id' => $client_load['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);
                usageTrack('-' . $added_points, '');
                $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
                $stmt->execute(['id' => $row['id']]);



                $output = 'Campaign ended: All tweets deleted, Last data key reached.';
                twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);


                unlink($file_name);
                die();
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
            $to_unfollow_id = $data_3['data'][0]['id'];
        } else {
            $to_unfollow_id = $data_3['data'][$row['last_key']]['id'];
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

                $last_key = 0;

                fclose($file_data);
            }
        } elseif ($last_key < 100 && !isset($data_3['meta']['next_token']) && $arr_78['id'] == $to_unfollow_id) {
            $added_points = $row['budget'] - intval($row['spent_budget']);
            $raw_points = floatval($init_points) + $added_points;

            $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
            $cipher_points = safeEncrypt($raw_points, $key);

            $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
            $stmt->execute(['id' => $client_load['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);
            usageTrack('-' . $added_points, '');
            $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
            $stmt->execute(['id' => $row['id']]);

            $output = 'Campaign ended: Last traversal key less than 100, No next pagination token, Last data key reached.';
            twitter_log($client_load['email'], '', $status, $mode, $client_load['id'], $auth_user, $output);
   

            unlink($file_name);
            die();
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
   
    }

    //////////////////////////////////////////////////////////////////////////GENERAL 
    /*
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $js_obj =  json_encode($_POST);
    } else {
        $js_obj =  json_encode($_GET);
    }

    $stmt = $conn->prepare("SELECT * FROM process_engine WHERE user_id=:id ORDER BY id DESC LIMIT 1");
    $stmt->execute(['id' => $client_load['id']]);
    $data_2 = $stmt->fetch();

    if ($data_2) {
        $exec_time = $data_2['execution'] + 900;
    } else {
        $exec_time = strtotime($data['time']) + 900;
    }

    $page = $_SERVER['PHP_SELF'];
    $method = $_SERVER['REQUEST_METHOD'];

    $stmt = $conn->prepare("INSERT INTO process_engine (request_method,page,object,access_token,access_secret, execution, user_id) VALUES (:req, :page, :object, :access_token, :access_secret, :execution, :user_id)");
    $stmt->execute(['req' => $method, 'page' => $page, 'object' => $js_obj, 'access_token' => $api_app['access_token'], 'access_secret' => $api_app['access_secret'], 'execution' => $exec_time, 'user_id' => $client_load['id']]);
//*/
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
    $stmt = $conn->prepare("UPDATE campaign_engine SET last_key=:last_key, pagination_token=:pagination_token, spent_budget=:spent_budget, execution=:execution WHERE id=:id");
    $stmt->execute(['id' => $row['id'], 'last_key' => $last_key, 'pagination_token' => $pagination_token, 'spent_budget' => $spent_budget, 'execution' => $execution]);


    if ($row['budget'] <= $row['spent_budget']) {
        $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
        $stmt->execute(['id' => $row['id']]);

        if (isset($file_name)) {
            unlink($file_name);
        }
    }
}
