<?php
include '../../includes/conn.php';
include '../../includes/session.php';

//*
try {
    if (isset($_POST['user']) && isset($_POST['id'])) {

        $user = $_POST['user'];
        $id = $_POST['id'];

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM automation_subs WHERE user_id=:user_id AND id=:id");
        $stmt->execute(['user_id' => $user, 'id' => $id]);
        $data = $stmt->fetch();
        if ($data['numrows'] > 0) {

            $stmt = $conn->prepare("DELETE FROM automation_subs WHERE id=:id");
            $stmt->execute(['id' => $id]);
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