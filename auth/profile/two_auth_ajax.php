<?php 
require '../../vendor/autoload.php';

	include '../../includes/conn.php';
	include '../../includes/session.php';

	$conn = $pdo->open();

$secret = $_SESSION['two_auth_secret'];
$code = $_POST['code'];

$totp = PedroSancao\OTP\TOTP::createRaw($secret);
if($totp->verify($code)){
//echo 'Good';
$stmt = $conn->prepare("UPDATE users SET two_auth=:two_auth, two_auth_secret=:two_auth_secret WHERE id=:id");
$stmt->execute(['id'=>$user['id'], 'two_auth'=>1, 'two_auth_secret'=>$secret]);

$_SESSION['success'] = $alert = 'Two-factor authentication successfully activated!';

}else{
 $_SESSION['error'] = $alert = 'Code verification error!';
}

    ?>