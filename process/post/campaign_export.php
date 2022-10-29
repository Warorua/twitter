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
            $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM campaign_engine WHERE user_id=:user_id AND campaign=:campaign");
            $stmt->execute(['user_id' => $user_id, 'campaign' => $id]);
            $data = $stmt->fetch();
            if ($data['numrows'] > 0) {

                if($id == 1){
                    $file_path = 'followers';
                }elseif($id == 3){
                    $file_path = 'tweets';
                }else{
                    $file_path = 'following';
                }

                $file_name = "../../process/client/".$file_path."/" . $user['t_id'] . ".json";

                if (file_exists($file_name)) {
                    $data_3 = json_decode(file_get_contents($file_name), true);
                    $file_export = $parent_url."/process/client/".$file_path."/" . $user['t_id'] . ".json";
                     $output = array('success', $file_export, $file_path);
                } else {
                    $output = array('Campaign not found!');
                }
            } else {
                $output = array('You have not activated this campaign!');
            }
        }else{
            $output = array('You are not authorized to make this request!');
        }
    } else {
        $output = array('error');
    }
} catch (Exception $e) {
    $output = array($e->getMessage());
   // $output = 'error';
}

echo json_encode($output);
