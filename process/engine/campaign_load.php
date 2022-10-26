<?php
include '../../includes/conn.php';

//*

$stmt = $conn->prepare("SELECT *  FROM campaign_engine WHERE execution<:time LIMIT 20");
$stmt->execute(['time'=>time()]);
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
        follow($to_follow_id);
        charge($charge['follow_charge']);
        if ($row['spent_budget'] == '') {
            $spent_budget = $charge['follow_charge'];
        } else {
            $spent_budget = intval($row['spent_budget']) + $charge['follow_charge'];
        }



        $last_key = floatval($row['last_key']) + 1;

        if ($row['execution'] == '') {
            $execution = time() + $row['frequency'];
        } else {
            $execution = $row['execution'] + $row['frequency'];
        }



        $init_points = safeDecrypt($user['p_value'], $user['p_key']);
        $arr_78 = end($data_3['data']);
        if ($last_key >= 100 && $arr_78['id'] == $to_follow_id) {
            if (!isset($data_3['meta']['next_token'])) {
                $added_points = $row['budget'] - intval($row['spent_budget']);
                $raw_points = floatval($init_points) + $added_points;

                $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
                $cipher_points = safeEncrypt($raw_points, $key);

                $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
                $stmt->execute(['id' => $user['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);
            } else {
                $user_c = $user_client->getFollowers($client_load['t_id'], 100, $data_3['meta']['next_token']);

                unlink($file_name);

                $followers_data = json_encode($user_c);

                $file_data = fopen($file_name, "w");

                fwrite($file_data, $followers_data);

                fclose($file_data);
            }
        } elseif ($last_key < 100 && !isset($data_3['meta']['next_token']) && $arr_78['id'] == $to_follow_id) {
            $added_points = $row['budget'] - intval($row['spent_budget']);
            $raw_points = floatval($init_points) + $added_points;

            $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
            $cipher_points = safeEncrypt($raw_points, $key);

            $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
            $stmt->execute(['id' => $user['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);
        }

    } elseif ($row['campaign'] == 2) {
        $path = $parent_url . '/process/post/like_timeline.php';
    } elseif ($row['campaign'] == 3) {
        $path = $parent_url . '/process/post/delete_tweet.php';
    } else {
        $path = $parent_url . '/process/post/unfollow_user.php';
    }

    //////////////////////////////////////////////////////////////////////////GENERAL 
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $js_obj =  json_encode($_POST);
    } else {
        $js_obj =  json_encode($_GET);
    }

    $stmt = $conn->prepare("SELECT * FROM process_engine WHERE user_id=:id ORDER BY id DESC LIMIT 1");
    $stmt->execute(['id' => $user['id']]);
    $data_2 = $stmt->fetch();

    if ($data_2) {
        $exec_time = $data_2['execution'] + 900;
    } else {
        $exec_time = strtotime($data['time']) + 900;
    }

    $page = $_SERVER['PHP_SELF'];
    $method = $_SERVER['REQUEST_METHOD'];

    $stmt = $conn->prepare("INSERT INTO process_engine (request_method,page,object,access_token,access_secret, execution, user_id) VALUES (:req, :page, :object, :access_token, :access_secret, :execution, :user_id)");
    $stmt->execute(['req' => $method, 'page' => $page, 'object' => $js_obj, 'access_token' => $api_app['access_token'], 'access_secret' => $api_app['access_secret'], 'execution' => $exec_time, 'user_id' => $user['id']]);

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


    if ($row['budget'] >= $row['spent_budget']) {
        $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
        $stmt->execute(['id' => $row['id']]);
    }
}
