<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
//*
if (isset($_GET['id']) && isset($_GET['user'])) {
    if ($_GET['user'] == $user['id']) {

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM client_api WHERE id=:id AND user_id=:user_id AND level=:level");
        $stmt->execute(['id' => $_GET['id'], 'user_id' => $_GET['user'], 'level' => 0]);
        $data1 = $stmt->fetch();
        if ($data1['numrows'] > 0) {

            $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM client_api WHERE consumer_key=:consumer_key AND status=:status AND level=:level");
            $stmt->execute(['consumer_key' => $data1['consumer_key'], 'status' => 1, 'level' => 1]);
            $data3 = $stmt->fetch();
            if ($data3['numrows'] < 1) {

                $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM api_shop WHERE app_id=:app_id");
                $stmt->execute(['app_id' => $_GET['id']]);
                $data2 = $stmt->fetch();
                if ($data2['numrows'] > 0) {

                    $stmt = $conn->prepare("DELETE FROM api_shop WHERE app_id=:app_id");
                    $stmt->execute(['app_id' => $_GET['id']]);

                    $stmt = $conn->prepare("DELETE FROM client_api WHERE  consumer_key=:consumer_key AND level=:level");
                    $stmt->execute(['consumer_key' => $data1['consumer_key'], 'level' => 1]);

                    $_SESSION['success'] = 'App successfully unlisted from catalog!';
                    redirect($parent_url . '/account/settings');

                } else {
                    $_SESSION['error'] = 'App not found on listing!';
                    redirect($parent_url . '/account/user');
                }
            } else {
                $_SESSION['error'] = 'Forbidden. App has Active subcribers!';
                redirect($parent_url . '/account/user');
            }



        } else {
            $_SESSION['error'] = 'Unauthorized app owner!';
            redirect($parent_url . '/account/user');
        }
    } else {
        $_SESSION['error'] = 'Unauthorized user!';
        redirect($parent_url . '/account/user');
    }
} else {
    $_SESSION['error'] = 'Unauthorized request!';
    redirect($parent_url.'/account/user');
}
