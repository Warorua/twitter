<?php
include '../../includes/conn.php';
include '../../includes/session.php';

if(isset($_POST['phoneNo'])){
//generate code
$set='123456789';
$code=substr(str_shuffle($set), 0, 6);

$_SESSION['mail_authCode'] = $code;
$recipient = preg_replace('/[)(\@\.\;\_" "-]+/', '', $_POST['phoneNo']);
$len = strlen($recipient);
if($len < 12){
    echo 'Invalid '.$len.' digit phone number. Expected 12 digit';
    die();
}else{
    $message = 'Faraji%20Properties%202-Factor%20authentication%20code:%20'.$code;
file_get_contents('https://sms.movesms.co.ke/api/compose?username=Warorua&api_key=xuRR0BocoCM5Egxxqbxf2mrLUPbW7YicL4NXJExFNcBdtZHSkn&sender=SMARTLINK&to='.$recipient.'&message='.$message.'&msgtype=5&dlr=0');
}

}else{
    echo 'Request error!';
    die();
}

?>