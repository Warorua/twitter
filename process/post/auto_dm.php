<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
//*
if (isset($_POST['activate']) && isset($_POST['message']) && isset($user)) {
    $activate = $_POST['activate'];
    $message = $_POST['message'];
    $file_name = "../../process/client/auto_dm/" . $user['t_id'] . ".json";
    if ($activate == 0) {
        $time = time();
        $stmt = $conn->prepare("INSERT INTO auto_dm (user_id, message, time) VALUES (:user_id, :message, :time)");
        $stmt->execute(['user_id' => $user['id'], 'message' => $message, 'time' => $time]);

        $data = $user_b = $user_client->getFollowers($user['t_id']);
        $followers_data = json_encode($user_b);

        $file_data = fopen($file_name, "w");

        fwrite($file_data, $followers_data);

        fclose($file_data);

        $_SESSION['success'] = 'Auto DM was successfully activated';
    } elseif ($activate == 1) {



        if (file_exists($file_name)) {
            unlink($file_name);
        }

        $stmt = $conn->prepare("DELETE FROM auto_dm WHERE user_id=:user_id");
        $stmt->execute(['user_id' => $user['id']]);
        $_SESSION['success'] = 'Auto DM was successfully disabled';
    } else {
        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM auto_dm WHERE user_id=:user_id");
        $stmt->execute(['user_id' => $user['id']]);
        $af = $stmt->fetch();
        if ($af['numrows'] > 0) {
            $stmt = $conn->prepare("UPDATE auto_dm SET message=:message WHERE user_id=:user_id");
            $stmt->execute(['user_id' => $user['id'], 'message' => $message]);
            $_SESSION['success'] = 'Auto DM was successfully updated';
        } else {
            $_SESSION['error'] = 'Error in request. Try again';
        }
    }
} else {
    $_SESSION['error'] = 'Unauthorized request!';
}
