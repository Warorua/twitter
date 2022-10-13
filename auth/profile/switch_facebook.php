<?php
include '../../includes/conn.php';
include '../../includes/session.php';

if(isset($_POST['auth'])){
    $conn = $pdo->open();
    $stmt = $conn->prepare("UPDATE users SET f_id=:f_id WHERE id=:id");
    $stmt->execute(['f_id'=>'', 'id'=>$user['id']]);
    $_SESSION['success'] = 'Facebook successfully disconnected!';
}else{
    $_SESSION['error'] = 'Request forbidden!';
}
?>