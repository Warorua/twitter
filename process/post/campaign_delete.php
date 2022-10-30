<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';

//*
try {
    if (isset($_POST['user']) && isset($_POST['id'])) {

        $user_id = $_POST['user'];
        $id = $_POST['id'];
        if ($user_id == $user['id']) {
            $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM campaign_engine WHERE user_id=:user_id AND id=:id");
            $stmt->execute(['user_id' => $user_id, 'id' => $id]);
            $data = $stmt->fetch();
            if ($data['numrows'] > 0) {

                $user_points = safeDecrypt($user['p_value'], $user['p_key']);

                $added_points = $data['budget'] - intval($data['spent_budget']);
                $raw_points = floatval($user_points) + $added_points;

                $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
                $cipher_points = safeEncrypt($raw_points, $key);

                $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
                $stmt->execute(['id' => $user_id, 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);



                if($data['campaign'] == 1){
                    $file_path = 'followers';
                }elseif($data['campaign'] == 3){
                    $file_path = 'tweets';
                }else{
                    $file_path = 'following';
                }

                $file_name = "../../process/client/".$file_path."/" . $user['t_id'] . ".json";

                if (file_exists($file_name)) {
                    unlink($file_name);
                }


                $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE id=:id");
                $stmt->execute(['id' => $id]);

                echo 'success';
            } else {
                echo 'info';
            }
        }else{
            echo 'You are not authorized to make this request!';
        }
    } else {
        echo 'error';
    }
} catch (Exception $e) {
    echo $e->getMessage();
   // echo 'error';
}
