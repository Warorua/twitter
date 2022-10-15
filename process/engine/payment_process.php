<?php
namespace Flutterwave;


//use Flutterwave\EventHandlers\TransactionVerificationEventHandler;

include '../../includes/conn.php';

include '../../vendor/autoload.php';

//include('../../vendor/flutterwavedev/flutterwave-v3/library/TransactionVerification.php');



if(isset($_GET['status']) == 'successful'){

$overrideRef = false;

$id = $_GET['transaction_id'];

$payment = new Rave('FLWSECK_TEST-SANDBOXDEMOKEY-X',  $overrideRef);

$verify = $payment->verifyTransaction($id);

//echo json_encode($verify);


if($verify['status'] == 'success'){

 if($_GET['tx_ref'] == $verify['data']['tx_ref']){
     echo $verify['data']['tx_ref'].'</br>';
     echo $verify['data']['charged_amount'].'</br>';
     echo $verify['data']['payment_type'].'</br>';
     echo $verify['data']['created_at'].'</br>';
     echo $verify['data']['auth_model'].'</br>';
     echo $verify['data']['device_fingerprint'].'</br>';
     echo $verify['data']['charged_amount'].'</br>';
     echo $verify['data']['flw_ref'].'</br>';
     echo $verify['data']['account_id'].'</br>';
     echo $verify['data']['amount_settled'].'</br>';
     echo $verify['data']['status'].'</br>';
 }

}




}




?>