<?php
include '../../includes/conn.php';
include '../../includes/session.php';

if(isset($_POST['auth'])){
    $conn = $pdo->open();
    user_history('profile_deactivate');
    $stmt = $conn->prepare("UPDATE users SET source=:source WHERE id=:id");
    $stmt->execute(['source'=>'', 'id'=>$user['id']]);

    session_start();
	session_destroy();
    $_SESSION['success'] = 'Account successfully deactivated!';

}else{
    $_SESSION['error'] = 'Request forbidden!';
}
?>