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
                if ($data2['status'] != 1) {
                    $stmt = $conn->prepare("DELETE FROM client_api WHERE consumer_key=:consumer_key AND level=:level AND user_id=:user_id");
                    $stmt->execute(['consumer_key' => $_POST['app'], 'level' => 1, 'user_id' => $_POST['user']]);

                    $output = array('success');
                } else {
                    $output = array('Cannot unsubscribe. User is active!');
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
