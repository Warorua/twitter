<?php
require '../vendor/autoload.php';

include '../includes/conn.php';
include '../includes/session.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = $pdo->open();

if(isset($_POST['twoAuth'])){

    $code_1 = $_POST['code_1'];
    $code_2 = $_POST['code_2'];
    $code_3 = $_POST['code_3'];
    $code_4 = $_POST['code_4'];
    $code_5 = $_POST['code_5'];
    $code_6 = $_POST['code_6'];
    if($code_1 == '' || $code_2 == '' || $code_3 == '' || $code_4 == '' || $code_5 == '' || $code_6 == ''){
        $_SESSION['error'] = '6 digit code incomplete.';
        header('location: ./login');
        die();
    }
    $code = $code_1.$code_2.$code_3.$code_4.$code_5.$code_6;

    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id'=>$_SESSION['id_twoAuth']]);
    $row = $stmt->fetch();

    if($_SESSION['mode_twoAuth'] == 1){
$totp = PedroSancao\OTP\TOTP::createRaw($row['two_auth_secret']);
if($totp->verify($code)){
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['info'] = $row['email'];
    header('location: https://tweetbot.site/account/user');
}else{
    $_SESSION['error'] = 'Code invalid!';
    header('location: ./login');
}
    }elseif($_SESSION['mode_twoAuth'] == 2){
if($_SESSION['mail_authCode'] == $code){
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['info'] = $row['email'];
    header('location: https://tweetbot.site/account/user');
}else{
    $_SESSION['error'] = 'Code invalid or expired!';
    header('location: ./login');
}
    }else{
    $_SESSION['error'] = 'Session expired!';
    header('location: ./login');
    }


}else{
    $_SESSION['error'] = 'Unauthorized request!';
    header('location: ./login');
}

?>