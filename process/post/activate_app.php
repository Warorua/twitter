<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
//*
if (isset($_POST['id']) && isset($_POST['user'])) {
    if ($_POST['user'] == $user['id']) {


        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM client_api WHERE user_id=:user_id AND status=:status");
        $stmt->execute(['user_id' => $user['id'], 'status' => 1]);
        $data = $stmt->fetch();
        if ($data['numrows'] > 0) {
            $stmt = $conn->prepare("UPDATE client_api SET status=:status WHERE id=:id");
            $stmt->execute(['id' => $data['id'], 'status' => 0]);
        }


        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM client_api WHERE id=:id");
        $stmt->execute(['id' => $_POST['id']]);
        $data2 = $stmt->fetch();
        if ($data2['numrows'] > 0) {
            $stmt = $conn->prepare("UPDATE client_api SET status=:status WHERE id=:id");
            $stmt->execute(['id' => $_POST['id'], 'status' => 1]);
            $_SESSION['success'] = 'App successfully activated!';
        } else {
            $_SESSION['error'] = 'App not found!';
        }

    } else {
        $_SESSION['error'] = 'Unauthorized user!';
    }
} else {
    $_SESSION['error'] = 'Unauthorized request!';
}



?>