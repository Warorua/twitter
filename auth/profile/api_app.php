<?php
include '../../includes/conn.php';
include '../../includes/session.php';

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


if ($_POST['consumer_key'] != '' && $_POST['consumer_secret'] != '' && $_POST['bearer_token'] != '' && $_POST['access_token'] != '' && $_POST['access_secret'] != '') {

    $url = $parent_url . '/process/engine/app_authenticator.php';
    $fields = array(
        'consumer_key' => $_POST['consumer_key'],
        'consumer_secret' => $_POST['consumer_secret'],
        'bearer_token' => $_POST['bearer_token'],
        'access_token' =>  $_POST['access_token'],
        'access_secret' => $_POST['access_secret']
    );


    $data = httpPost($url, $fields);
    if ($data == 400) {
        $conn = $pdo->open();
        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM client_api WHERE user_id=:user_id");
        $stmt->execute(['user_id' => $user['id']]);
        $api_app = $stmt->fetch();

        if ($api_app['numrows'] < 1) {
            if ($_POST['consumer_key'] != '' && $_POST['consumer_secret'] != '' && $_POST['bearer_token'] != '' && $_POST['access_token'] != '' && $_POST['access_secret'] != '') {
                $api_consumer_key = $_POST['consumer_key'];
                $api_consumer_secret = $_POST['consumer_secret'];
                $api_bearer_token = $_POST['bearer_token'];
                $api_access_token = $_POST['access_token'];
                $api_access_secret = $_POST['access_secret'];

                $stmt = $conn->prepare("INSERT INTO client_api (user_id, consumer_key, consumer_secret, bearer_token, access_token, access_secret) VALUES (:user_id, :consumer_key, :consumer_secret, :bearer_token, :access_token, :access_secret)");

                $stmt->execute(['user_id' => $user['id'], 'consumer_key' => $api_consumer_key, 'consumer_secret' => $api_consumer_secret, 'bearer_token' => $api_bearer_token, 'access_token' => $api_access_token, 'access_secret' => $api_access_secret]);
                user_history('api_app');
                $_SESSION['success'] = $alert = 'Congraturations! API app successfully added.';
            } else {
                $_SESSION['error'] =  $alert = 'Fill all the fields to process your request!';
            }
        } else {
            if ($_POST['consumer_key'] != '' && $_POST['consumer_secret'] != '' && $_POST['bearer_token'] != '' && $_POST['access_token'] != '' && $_POST['access_secret'] != '') {
                $api_consumer_key = $_POST['consumer_key'];
                $api_consumer_secret = $_POST['consumer_secret'];
                $api_bearer_token = $_POST['bearer_token'];
                $api_access_token = $_POST['access_token'];
                $api_access_secret = $_POST['access_secret'];

                $stmt = $conn->prepare("UPDATE client_api SET consumer_key=:consumer_key, consumer_secret=:consumer_secret, bearer_token=:bearer_token, access_token=:access_token, access_secret=:access_secret WHERE user_id=:user_id");

                $stmt->execute(['user_id' => $user['id'], 'consumer_key' => $api_consumer_key, 'consumer_secret' => $api_consumer_secret, 'bearer_token' => $api_bearer_token, 'access_token' => $api_access_token, 'access_secret' => $api_access_secret]);
                user_history('api_app');
                $_SESSION['success'] = $alert = 'API app successfully updated.';
            } else {
                $_SESSION['error'] =  $alert = 'Fill all the fields to process your request!';
            }

            //header('location: MyProfile');
        }
    } else {
        $_SESSION['error'] =  $alert = $data;
    }
} else {
    $_SESSION['error'] =  $alert = 'Fill all the fields to process your request!';
}

$pdo->close();


echo $alert;
