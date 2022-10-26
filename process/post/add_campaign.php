<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';
//*
if (isset($_POST['campaign'])) {
    try {

        $campaign = $_POST['campaign'];
        $frequency = $_POST['frequency'] * 60;

        if (!empty($_POST['budget'])) {
            $budget = $_POST['budget'];
        } elseif (!empty($_POST['budget_c'])) {
            $budget = $_POST['budget_c'];
        }
       
        $execution = time() + $frequency;

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM campaign_engine WHERE user_id=:user_id AND campaign=:campaign");
        $stmt->execute(['campaign' => $campaign, 'user_id' => $user['id']]);
        $auth_6 = $stmt->fetch();


        if($auth_6['numrows'] < 1){
            $_SESSION['error'] = 'Insufficient gas points to cover your budget!';
            charge($budget);

        $stmt = $conn->prepare("INSERT INTO campaign_engine (campaign, user_id, budget, execution, frequency) VALUES (:campaign, :user_id, :budget, :execution, :frequency)");
        $stmt->execute(['campaign' => $campaign, 'user_id' => $user['id'], 'budget' => $budget, 'execution' => $execution, 'frequency' => $frequency]);


        $_SESSION['success'] = 'Campaign successfully created!';
        }else{
            $_SESSION['error'] = 'Campaign already created!';
        }


    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }
} else {
    $_SESSION['error'] = 'Invalid request';
}


