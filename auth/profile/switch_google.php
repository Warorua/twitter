<?php
include '../../includes/conn.php';
include '../../includes/session.php';

if(isset($_POST['auth'])){
    $conn = $pdo->open();
    $stmt = $conn->prepare("UPDATE users SET g_id=:g_id WHERE id=:id");
    $stmt->execute(['g_id'=>'', 'id'=>$user['id']]);
    $_SESSION['success'] = 'Google successfully disconnected!';
}else{
    $_SESSION['error'] = 'Request forbidden!';
}
?>