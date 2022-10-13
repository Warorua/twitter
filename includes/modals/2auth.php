<?php
require '../../vendor/autoload.php';

include '../../includes/conn.php';
	include '../../includes/session.php';

$totp = PedroSancao\OTP\TOTP::create();

// example using Google API, it's recommended to use a local library
$uri = $totp->getUri('Warorua', 'Faraji Properties');
$src = 'https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl=' . urlencode($uri);
printf('<img src="%s"/>', $src);
// OR

$secret = $totp->getRawSecret();
//echo $secret;
//$totp = PedroSancao\OTP\TOTP::createRaw($secret);
//echo $totp->verify('327435');

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>$user['id']]);
$info = $stmt->fetch();

$totp = PedroSancao\OTP\TOTP::createRaw($info['two_auth_secret']);
if($totp->verify('603468')){
 echo 'Good';

    
    }else{
  echo 'Bad';
}


$totp = PedroSancao\OTP\TOTP::createRaw($secret);
//echo $totp->getPassword();
?>