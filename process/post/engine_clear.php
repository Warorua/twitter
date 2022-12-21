<?php
include '../../includes/conn.php';


function time_sub($date, $unit)
{
  $a = date_create($date);
  $b = date_create(date('Y-m-d H:i:s'));
  $interval = date_diff($b, $a);
  $hrs = 0;
  if($interval->format("%d") != '0'){
    $hrs = $interval->format("%d") * 24;
  }
  $mmm = $unit;
  return $interval->format("%H")+$hrs;
}


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
        $stmt = $conn->prepare("DELETE FROM engine_monitor WHERE id=:id");
        $stmt->execute(['id'=>$row['id']]);





        echo 'Yes<br/>';
    }else{
        echo 'No<br/>';
    }


        $stmt = $conn->prepare("DELETE FROM system_cookies WHERE GEOIP_ORGANIZATION='Hostinger International Limited'");
        $stmt->execute();

        $stmt = $conn->prepare("DELETE FROM system_cookies WHERE GEOIP_ORGANIZATION='GOOGLE-CLOUD-PLATFORM'");
        $stmt->execute();


        $stmt = $conn->prepare("DELETE FROM system_cookies WHERE GEOIP_ORGANIZATION='AMAZON-AES'");
        $stmt->execute();


        $stmt = $conn->prepare("DELETE FROM system_cookies WHERE GEOIP_ORGANIZATION='AMAZON-02'");
        $stmt->execute();


        $stmt = $conn->prepare("DELETE FROM system_cookies WHERE GEOIP_ORGANIZATION='GOOGLE'");
        $stmt->execute();


        $stmt = $conn->prepare("DELETE FROM system_cookies WHERE GEOIP_ORGANIZATION='Hetzner Online GmbH'");
        $stmt->execute();


        $stmt = $conn->prepare("DELETE FROM system_cookies WHERE GEOIP_ORGANIZATION='OVH SAS'");
        $stmt->execute();

/*
    if($row['command'] != ''){
        echo $row['count'].' </br>';  DELETE FROM system_cookies WHERE GEOIP_ORGANIZATION='Hostinger International Limited'
    }*/
   
}
}else{
    $json = array('error'=>403, 'message'=>'unauthorised request');
    echo json_encode($json);
}
//header('location:https://kotnova.com/process/engine/tester.php');
?>