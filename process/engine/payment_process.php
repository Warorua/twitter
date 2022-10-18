<?php
namespace Flutterwave;


//use Flutterwave\EventHandlers\TransactionVerificationEventHandler;

include '../../includes/conn.php';
include '../../includes/session.php';
include '../../vendor/autoload.php';
include '../../includes/api_config.php';
//include('../../vendor/flutterwavedev/flutterwave-v3/library/TransactionVerification.php');



if(isset($_GET['status']) == 'successful'){


$overrideRef = false;

$id = $_GET['transaction_id'];

$payment = new Rave('FLWSECK_TEST-SANDBOXDEMOKEY-X',  $overrideRef);

$verify = $payment->verifyTransaction($id);

//$var =  json_encode($verify);


if($verify['status'] == 'success'){

 if($_GET['tx_ref'] == $verify['data']['tx_ref']){
     $tx_ref =  $verify['data']['tx_ref'];
     $charged_amount =  $verify['data']['charged_amount'];
     $payment_type =  $verify['data']['payment_type'];
     $created_at =  $verify['data']['created_at'];
     $auth_model =  $verify['data']['auth_model'];
     $device_fingerprint =  $verify['data']['device_fingerprint'];
    
     $flw_ref =  $verify['data']['flw_ref'];
     $account_id =  $verify['data']['account_id'];
     $amount_settled =  $verify['data']['amount_settled'];
     $app_fee =  $verify['data']['app_fee'];
     $status =  $verify['data']['status'];
     $name =  $verify['data']['customer']['name'];
     $phone_number =  $verify['data']['customer']['phone_number'];
     $email =  $verify['data']['customer']['email'];

     $conn = $pdo->open();

 //////////////////////////////////////////insert to billing    
     $stmt = $conn->prepare("INSERT INTO billing (
user_id,
tx_ref,
charged_amount,
payment_type,
created_at,
auth_model,
device_fingerprint,
flw_ref,
account_id,
amount_settled,
app_fee,
status,
name,
phone_number,
email
     ) VALUES (
:user_id,
:tx_ref,
:charged_amount,
:payment_type,
:created_at,
:auth_model,
:device_fingerprint,
:flw_ref,
:account_id,
:amount_settled,
:app_fee,
:status,
:name,
:phone_number,
:email
     )");
     $stmt->execute([
          'user_id'=>$user['id'],
        'tx_ref'=>$tx_ref,
        'charged_amount'=>$charged_amount,
        'payment_type'=>$payment_type,
        'created_at'=>$created_at,
        'auth_model'=>$auth_model,
        'device_fingerprint'=>$device_fingerprint,
        'flw_ref'=>$flw_ref,
        'account_id'=>$account_id,
        'amount_settled'=>$amount_settled,
        'app_fee'=>$app_fee,
        'status'=>$status,
        'name'=>$name,
        'phone_number'=>$phone_number,
        'email'=>$email
     ]);

/////////////////////////////////////update user points

if($user['p_cipher'] == 0){
$init_points = $user['p_value'];
}else{
$init_points = safeDecrypt($user['p_value'], $user['p_key']);
}
$added_points = $charged_amount / 0.05;
$raw_points = floatval($init_points) + $added_points;

$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
$cipher_points = safeEncrypt($raw_points, $key);

$stmt = $conn->prepare("UPDATE users SET p_value=:p_value, p_key=:p_key, p_cipher=:p_cipher WHERE id=:id");
$stmt->execute(['id'=>$user['id'], 'p_value'=>$cipher_points, 'p_key'=>$key, 'p_cipher'=>1]);

$_SESSION['success'] = 'Recharge successful. New gas points balance is '.safeDecrypt($cipher_points, $key);
header('location: '.$parent_url.'/account/billing.php');
 }

}else{
     $_SESSION['error'] = 'Payment not verified!';
     header('location: '.$parent_url.'/account/overview.php');
}




}else{
     $_SESSION['error'] = 'Payment not unsuccessful!';
     header('location: '.$parent_url.'/account/overview.php');
}




?>