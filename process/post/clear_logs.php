<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
use Abraham\TwitterOAuth\TwitterOAuth;
//*
$output = [];
if (isset($_POST['owner'])) {
    if ($_POST['owner'] == $user['id']) {




        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM twitter_logs WHERE user_id=:user_id");
        $stmt->execute(['user_id' => $user['id']]);
        $data22 = $stmt->fetch();
            //*
            if ($data22['numrows'] > 10000) {
                $log_count = 0;
                $stmt = $conn->prepare("SELECT * FROM twitter_logs WHERE user_id=:user_id");
                $stmt->execute(['user_id' => $user['id']]);
                $data_2 = $stmt->fetchAll();
                foreach ($data_2 as $rows) {
                    $stmt = $conn->prepare("DELETE FROM twitter_logs WHERE user_id=:user_id AND id=:id");
                    $stmt->execute(['user_id' => $user['id'], 'id' => $rows['id']]);
                    $log_count += 1;
                }
                $output = array('success', $log_count.' logs successfully deleted!');

            } else {
                $output = array('Your logs count is '.number_format($data22['numrows']).'.<br/> Log count not enough to process deleting!');
            }
    //*/
   // $output = array(0=>count($data2));
//$_SESSION['test_val_22'] = json_encode($data22['numrows']);
        


    } else {
        $output = array('Unauthorized user!');
    }
} else {
    $output = array('Unauthorized request!');
}

echo json_encode($output);
?>