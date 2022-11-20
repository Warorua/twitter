<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
//*
try{
if (isset($_POST['app']) && isset($_POST['owner']) && isset($_POST['user'])) {
    if ($_POST['owner'] == $user['id']) {

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM client_api WHERE consumer_key=:consumer_key AND user_id=:user_id AND level=:level");
        $stmt->execute(['consumer_key' => $_POST['app'], 'user_id' => $_POST['owner'], 'level' => 0]);
        $data1 = $stmt->fetch();
        if ($data1['numrows'] > 0) {


            $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM client_api WHERE consumer_key=:consumer_key AND user_id=:user_id AND level=:level");
            $stmt->execute(['consumer_key' => $_POST['app'], 'user_id' => $_POST['user'], 'level' => 1]);
            $data2 = $stmt->fetch();
                if ($data2['numrows'] > 0) {
                    if ($data2['status'] == 1) {
                        ////////////////////////return pts balance
                        $stmt = $conn->prepare("SELECT * FROM client_api WHERE user_id=:user_id AND status=:status");
                        $stmt->execute(['user_id' => $_POST['user'], 'status'=>1]);
                        $client_load_app = $stmt->fetch();

                        $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
                        $stmt->execute(['id' => $_POST['user']]);
                        $client_load = $stmt->fetch();
                        $init_points = safeDecrypt($client_load['p_value'], $client_load['p_key']);

                        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM campaign_engine WHERE user_id=:user_id");
                        $stmt->execute(['user_id' => $_POST['user']]);
                        $cmpg_1 = $stmt->fetch();
                        if ($cmpg_1['numrows' > 0]) {

                            $stmt = $conn->prepare("SELECT * FROM campaign_engine WHERE user_id=:user_id");
                            $stmt->execute(['user_id' => $_POST['user']]);
                            $cmpg = $stmt->fetchAll();
                            $added_points = 0;
                            foreach ($cmpg as $row) {
                                $added_points += $row['budget'] - intval($row['spent_budget']);
                            }
                            $raw_points = floatval($init_points) + $added_points;

                            $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
                            $cipher_points = safeEncrypt($raw_points, $key);

                            $stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
                            $stmt->execute(['id' => $client_load['id'], 'p_value' => $cipher_points, 'p_key' => $key, 'p_cipher' => 1]);

                            $stmt = $conn->prepare("INSERT INTO usage_track (time, points, user_id, action, consumer_key, level) VALUES (:time, :points, :user_id, :action, :consumer_key, :level)");
                            $stmt->execute(['time' => time(), 'points' => '-' . $added_points, 'user_id' => $_POST['user'], 'action' => 'NULL', 'consumer_key' => $client_load_app['consumer_key'], 'level' => $client_load_app['level']]);


                            //////////////////////////////delete active campaigns
                            $stmt = $conn->prepare("DELETE FROM campaign_engine WHERE user_id=:user_id");
                            $stmt->execute(['user_id' => $_POST['user']]);
                        }


                        ///////////////////////////send message
                        $message = 'Your active app at Kotnova has been deactivated. If you had active campaigns they have been deactivated and the POINTS balance recharged back to your POINTS wallet but you can always re-build them. You can reactivate the App from your Kotnova dashboard.';
                        $subject = 'Active App Deactivation';
                        system_mailer($subject, $message, $client_load['email']);
                        /////////////////////////////////////////////

                        $stmt = $conn->prepare("UPDATE client_api SET status=:status WHERE consumer_key=:consumer_key AND level=:level AND user_id=:user_id");
                        $stmt->execute(['consumer_key' => $_POST['app'], 'level' => 1, 'user_id' => $_POST['user'], 'status' => 0]);
                       




                        $output = array('success');
                } else {
                    $output = array('This user is not active!');
                }
            } else {
                $output = array('User has not subscribed to app!');
            }
            



        } else {
            $output = array('Unauthorized app owner!');
            
        }
    } else {
        $output = array('Unauthorized user!');
        
    }
} else {
    $output = array('Unauthorized request!');
    
}
}catch(Exception $e){
$output = $e->getMessage();
}


echo json_encode($output);
