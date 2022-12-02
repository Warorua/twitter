<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
//*
if (isset($_POST['top_up_amount'])) {
    try {

        $conversion_pts = $_POST['top_up_amount'];
        $conversion_type = $_POST['conversion'];
        $stmt = $conn->prepare("SELECT * FROM user_earnings WHERE user_id=:user_id");
        $stmt->execute(['user_id' => $user['id']]);
        $earnings = $stmt->fetch();

        $earnings_total = $earnings['refer'] + $earnings['app'];

        if ($conversion_pts <= $earnings_total) {
            $earnings_balance = $earnings_total - $conversion_pts;


            if ($conversion_pts < 100) {
                $_SESSION['error'] = 'Points too little for conversion!';
            } else {

                if ($conversion_type == 1) {
                    $_SESSION['info'] = 'Cash conversion is under maintenance. Please try again later!';
                } elseif ($conversion_type == 2) {

                    if ($user['p_cipher'] == 0) {
                        $init_points = $user['p_value'];
                    } else {
                        $init_points = safeDecrypt($user['p_value'], $user['p_key']);
                    }
                    $added_points = $conversion_pts;
                    $raw_points = floatval($init_points) + $added_points;

                    $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
                    $cipher_points = safeEncrypt($raw_points, $key);

                    $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
                    $stmt->execute(['id' => $user['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);

                    if ($earnings_balance > 0) {
                        $settle_amount = $earnings_balance / 2;
                    } else {
                        $settle_amount = 0;
                    }

                    $stmt = $conn->prepare("UPDATE user_earnings SET refer=:refer, app=:app WHERE user_id=:user_id");
                    $stmt->execute(['user_id' => $user['id'], 'refer' => $settle_amount, 'app'=>$settle_amount]);

                    $stmt = $conn->prepare("INSERT INTO pts_conversion (user_id, points, time) VALUES (:user_id, :points, :time)");
                    $stmt->execute(['user_id' => $user['id'], 'points' => $conversion_pts, 'time'=>time()]);

                    $_SESSION['success'] = 'Success: ' . $conversion_pts . ' points successfully settled to your wallet. New earnings balance is ' . $earnings_balance;
                }
            }
        }else{
            $_SESSION['error'] = 'Conversion requested is more than the available balance!';
        }

    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }
} else {
    $_SESSION['error'] = 'Invalid request';
}
