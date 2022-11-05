<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
//*
if (isset($_POST['id']) && isset($_POST['user'])) {
    if ($_POST['user'] == $user['id']) {

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM client_api WHERE id=:id AND user_id=:user_id AND level=:level");
        $stmt->execute(['id' => $_POST['id'], 'user_id' => $_POST['user'], 'level' => 0]);
        $data1 = $stmt->fetch();
        if ($data1['numrows'] > 0) {
            $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM api_shop WHERE app_id=:app_id");
            $stmt->execute(['app_id' => $_POST['id']]);
            $data2 = $stmt->fetch();
            if ($data2['numrows'] > 0) {

                if ($_POST['like_charge'] < $charge['like_charge']) {
                    $_SESSION['error'] = 'Like charge should be equal to or greater than the system\'s set default charge';
                } elseif ($_POST['follow_charge'] < $charge['follow_charge']) {
                    $_SESSION['error'] = 'Follow charge should be equal to or greater than the system\'s set default charge';
                } elseif ($_POST['tweet_charge'] < $charge['tweet_charge']) {
                    $_SESSION['error'] = 'Tweet charge should be equal to or greater than the system\'s set default charge';
                } elseif ($_POST['max_user'] < 2) {
                    $_SESSION['error'] = 'App users should be more than 1!';
                } else {

                    $stmt = $conn->prepare("SELECT * FROM client_api WHERE id=:id AND user_id=:user_id AND level=:level");
                    $stmt->execute(['id' => $_POST['id'], 'user_id' => $_POST['user'], 'level' => 0]);
                    $data3 = $stmt->fetch();
                    $stmt = $conn->prepare("DELETE FROM client_api WHERE  consumer_key=:consumer_key AND level=:level");
                    $stmt->execute(['consumer_key' => $data3['consumer_key'], 'level' => 1]);

                    $stmt = $conn->prepare("UPDATE api_shop SET like_charge=:like_charge, follow_charge=:follow_charge, tweet_charge=:tweet_charge, max_user=:max_user WHERE app_id=:app_id");
                    $stmt->execute(['app_id' => $_POST['id'], 'like_charge' => $_POST['like_charge'], 'follow_charge' => $_POST['follow_charge'], 'tweet_charge' => $_POST['tweet_charge'], 'max_user' => $_POST['max_user']]);

                    $_SESSION['success'] = 'App charges successfully updated!';
                }

            } else {
                $_SESSION['error'] = 'App not found!';
            }
        } else {
            $_SESSION['error'] = 'Unauthorized app owner!';
        }
    } else {
        $_SESSION['error'] = 'Unauthorized user!';
    }
} else {
    $_SESSION['error'] = 'Unauthorized request!';
}
