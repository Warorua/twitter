<?php
include '../../includes/conn.php';

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM process_engine LIMIT 1");
$stmt->execute();

$client = $stmt->fetch();

$obj = json_decode($client['object'], true);

$client_id = $client['user_id'];

$_SESSION['bot_id'] = $client_id;


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

$stmt = $conn->prepare("SELECT *, users.id AS usid FROM users LEFT JOIN client_api ON users.id = client_api.user_id WHERE users.id=:usid LIMIT 1");
$stmt->execute(['usid' => $client_id]);
$data = $stmt->fetch();


$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id' => $client_id]);
$user = $stmt->fetch();


if (time() > $client['execution']) {

    $auth_key = $_SESSION['access_token'] = array('oauth_token' => $client['access_token'], 'oauth_token_secret' => $client['access_secret']);

    $auth_code = json_encode($auth_key);

    $url = 'http://localhost' . $client['page'] . '?bot_id=' . $client_id . '&auth_key=' . $auth_code;

    //$url = 'https://tweetbot.site/account/lab4.php';

    $fields = $obj;


    echo  httpPost($url, $fields);

    $stmt = $conn->prepare("DELETE FROM process_engine WHERE id=:id");
    $stmt->execute(['id'=>$client['id']]);

    //echo json_encode($auth_key);
}else{
    echo 'Not yet time!';
}
