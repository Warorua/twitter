<?php
include '../../includes/conn.php';
include '../../includes/session.php';

if(isset($_POST['auth'])){
    $conn = $pdo->open();
    $stmt = $conn->prepare("UPDATE users SET t_id=:t_id WHERE id=:id");
    $stmt->execute(['t_id'=>'', 'id'=>$user['id']]);
    $_SESSION['success'] = 'Twitter successfully disconnected!';
}else{
    $_SESSION['error'] = 'Request forbidden!';
}
?>