<?php
include '../../includes/conn.php';
include '../../includes/session.php';

//*
try {
    if (isset($_POST['user']) && isset($_POST['id'])) {

        $user = $_POST['user'];
        $id = $_POST['id'];
        $rule = $_POST['rule'];

        if ($rule == 1) {
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
        } elseif ($rule == 0) {
           
            $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tweet_factory WHERE user_id=:user_id AND id=:id");
            $stmt->execute(['user_id' => $user, 'id' => $id]);
            $data = $stmt->fetch();
            if ($data['numrows'] > 0) {

                $file = $data['file_path'];
                $file_name = "../../process/client/tweet_factory/" . $file;
                unlink($file_name);

                $stmt = $conn->prepare("DELETE FROM tweet_factory WHERE id=:id");
                $stmt->execute(['id' => $id]);
                echo 'success';

            } else {
                echo 'info';
            }
        }else{
            echo 'Invalid automation selected.';
        }
    


    } else {
        echo 'error';
    }
} catch (Exception $e) {
    echo $e->getMessage();
   // echo 'error';
}


?>