<?php
include '../../includes/conn.php';
include '../../includes/session.php';

//*
try {
    if (isset($_POST['user']) && isset($_POST['script'])) {

        $user = $_POST['user'];
        $script = $_POST['script'];

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM automation_subs WHERE user_id=:user_id");
        $stmt->execute(['user_id' => $user]);
        $data_1 = $stmt->fetch();
        if($data_1['numrows'] >= 5){
            die('You have reached the maximum tweet automation limit!');
        }

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM automation_subs WHERE user_id=:user_id AND script_id=:script_id");
        $stmt->execute(['user_id' => $user, 'script_id' => $script]);
        $data = $stmt->fetch();
        if ($data['numrows'] < 1) {

            $stmt = $conn->prepare("INSERT INTO automation_subs (user_id, script_id) VALUES (:user_id, :script_id)");
            $stmt->execute(['user_id' => $user, 'script_id' => $script]);
            echo 'success';
        } else {
            echo 'info';
        }
    } else {
        echo 'error';
    }
} catch (Exception $e) {
    echo $e->getMessage();
   // echo 'error';
}


?>