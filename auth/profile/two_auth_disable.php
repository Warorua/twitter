<?php
include '../../includes/conn.php';
include '../../includes/session.php';

if(isset($_POST['auth'])){
    $conn = $pdo->open();
    $stmt = $conn->prepare("UPDATE users SET two_auth=:two_auth, two_auth_secret=:two_auth_secret WHERE id=:id");
    $stmt->execute(['two_auth'=>0, 'two_auth_secret'=>'', 'id'=>$user['id']]);
    $_SESSION['success'] = '2-factor successfully disabled!';
}else{
    $_SESSION['error'] = 'Request forbidden!';
}
?>