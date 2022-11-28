<?php
include '../../includes/conn.php';
include '../../includes/session.php';
//require '../../vendor/autoload.php';
//include '../../includes/api_config.php';
//use Abraham\TwitterOAuth\TwitterOAuth;
//*
$output = [];
if (isset($_POST['id']) && isset($_POST['user'])) {
    if ($_POST['user'] == $user['id']) {




        $stmt = $conn->prepare("SELECT * FROM client_api WHERE id=:id AND user_id=:user_id");
        $stmt->execute(['id' => $_POST['id'], 'user_id'=>$user['id']]);
        $data2 = $stmt->fetch();
        if (count($data2) > 0) {
            $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM client_api WHERE id=:id AND user_id=:user_id");
            $stmt->execute(['id' => $_POST['id'], 'user_id'=>$user['id']]);
            $data22 = $stmt->fetch();

            //*
            if ($data22['numrows'] > 1) {
                $stmt = $conn->prepare("DELETE FROM client_api WHERE user_id=:user_id AND id=:id");
                $stmt->execute(['user_id' => $user['id'], 'id'=>$_POST['id']]);
                $output = array('success', 'App successfully deleted!');
            } else {
                $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM automation_subs WHERE user_id=:user_id");
                $stmt->execute(['user_id' => $user['id']]);
                $data3 = $stmt->fetch();
                if ($data3['numrows'] > 0) {
                    $output = array('Your tweet factory is running. Remove active tweet automations from <br/><a href="' . $parent_url . '/v1/tweet_factory#kt_vtab_pane_5" class="btn btn-sm btn-info">Tweet factory</a><br/> to continue!');
                } else {
                    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM campaign_engine WHERE user_id=:user_id");
                    $stmt->execute(['user_id' => $user['id']]);
                    $data4 = $stmt->fetch();
                    if ($data4['numrows'] > 0) {
                        $output = array('You have an active campaign(s). Delete campaign from <br/><a href="' . $parent_url . '/account/statements" class="btn btn-sm btn-info">Campaigns</a><br/> to continue!');
                    } else {
                        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM process_engine WHERE user_id=:user_id");
                        $stmt->execute(['user_id' => $user['id']]);
                        $data5 = $stmt->fetch();
                        if ($data5['numrows'] > 0) {
                            $stmt = $conn->prepare("DELETE FROM process_engine WHERE user_id=:user_id");
                            $stmt->execute(['user_id' => $user['id']]);
                            $err_mes = $data5['numrows'] . ' process have been deleted from the queue!';
                        }
                        ///////////////////////////////////
                        if(isset($err_mes)){
                            $ad_mes = $err_mes;
                        }else{
                            $ad_mes = '';
                        }
                        $stmt = $conn->prepare("DELETE FROM client_api WHERE user_id=:user_id AND id=:id");
                        $stmt->execute(['user_id' => $user['id'], 'id'=>$_POST['id']]);
                        $output = array('success', '<b>'.$ad_mes.'</b> App successfully deleted!');
                
                        /////////////////////////////////////
                    }
                }
            }
    //*/
   // $output = array(0=>count($data2));
//$_SESSION['test_val_22'] = json_encode($data22['numrows']);
        

        } else {
            $output = array('App not found!');
        }


    } else {
        $output = array('Unauthorized user!');
    }
} else {
    $output = array('Unauthorized request!');
}

echo json_encode($output);
?>