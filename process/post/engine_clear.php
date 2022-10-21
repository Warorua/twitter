<?php
include '../../includes/conn.php';
include '../../includes/session.php';
require '../../vendor/autoload.php';
include '../../includes/api_config.php';

if(!isset($_POST['user'])){
    $conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM engine_monitor");
$stmt->execute();
$data = $stmt->fetchAll();
foreach($data as $row){
    $tim = time_sub($row['time'], 'H');
//    echo $row['id'].'------'.$tim.' </br>';


    //echo $row['id'].'------'.$interval->format("%H").' </br>';
   
    if($tim >= 24){
       // $stmt = $conn->prepare("DELETE FROM engine_monitor WHERE id=:id");
      //  $stmt->execute(['id'=>$row['id']]);
        echo 'Yes<br/>';
    }
/*
    if($row['command'] != ''){
        echo $row['count'].' </br>';
    }*/
   
}
}else{
    $json = array('error'=>403, 'message'=>'unauthorised request');
    echo json_encode($json);
}

?>