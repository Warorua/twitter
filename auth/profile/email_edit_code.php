<?php
require '../../vendor/autoload.php';

include '../../includes/conn.php';
include '../../includes/session.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_POST['mail'] != '') {
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
    $stmt->execute(['email' => $_POST['mail']]);
    $row = $stmt->fetch();
    if ($row['numrows'] < 1) {
        $set = '1234567890';
        $code = substr(str_shuffle($set), 0, 6);

        $_SESSION['mail_secCode'] = $code;
        $message = '
    <style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
    <div id="#kt_app_body_content" style="background-color:#F7F2EF; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
        <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
                <tbody>
                    <tr>
                        <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                            <!--begin:Email content-->
                            <div style="text-align:center; margin:0 60px 34px 60px">
                                <!--begin:Logo-->
                                <div style="margin-bottom: 10px">
                                    <a href="https://kotnova.com/" rel="noopener" target="_blank">
                                        <img alt="Logo" src="https://kotnova.com/assets/media/logos/logo_full_bold.png" style="height: 75px" />
                                    </a>
                                </div>
                                <!--end:Logo-->
                                <!--begin:Media-->
                                <div style="margin-bottom: 15px">
                                    <img alt="Logo" src="https://kotnova.com/mail_media/sigma/png/question.png" style="height: 185px" />
                                </div>
                                <!--end:Media-->
                                <!--begin:Text-->
                                <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                    <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Your security code is:</p>
    
                                    <a target="_blank" style="background-color:#50cd89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500; font-family:Arial,Helvetica,sans-serif;">'.$code.'</a>
                               
                                    <p style="margin-bottom:2px; color:#7E8299">Have you requested to update</p>
                                    <p style="margin-bottom:2px; color:#7E8299"> your email address to this email?</p>
                                    <p style="margin-bottom:10px; color:#7E8299">If not kindly ignore this mail :)</p>
                                   
                                </div>
                                <!--end:Text-->
                                <!--begin:Action-->
                                 <!--end:Action-->
                            </div>
                            <!--end:Email content-->
                        </td>
                    </tr>
                
                    <tr>
                        <td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
                            <p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">Its all about customers!</p>
                            <p style="margin-bottom:2px">Call our customer care number: +254 716 912 002</p>
                            <p style="margin-bottom:4px">You may reach us at 
                            <a href="https://kotnova.com/" rel="noopener" target="_blank" style="font-weight: 600">support@kotnova.com</a>.</p>
                            <p>We serve Mon-Fri, 9AM-18AM</p>
                        </td>
                    </tr>
                
                    <tr>
                        <td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
                            <p>&copy; Copyright Kotnova. 
                            <a href="https://kotnova.com/" rel="noopener" target="_blank" style="font-weight: 600;font-family:Arial,Helvetica,sans-serif">Unsubscribe</a>&nbsp; from newsletter.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
                    ';
                    $mail = new PHPMailer(true);                             
                    try {
                        //Server settings
                    
                        $mail->isSMTP();                                     
                        $mail->Host = gethostbyname('mail.kotnova.com');                  
                        $mail->SMTPAuth = true;                               
                        $mail->Username = 'kotnova.mailer@kotnova.com';     
                        $mail->Password = 's8{*p2(kUu6?';                    
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                            )
                        );                          
                        $mail->SMTPSecure = 'tls';                           
                        $mail->Port = 587;                                   
    
                        $mail->setFrom('kotnova.mailer@kotnova.com');
                        
                        //Recipients
                        $mail->addAddress($_POST['mail']);              
                        $mail->addReplyTo('mailer.auto_system@kotnova.com');
                       
                        //Content
                        $mail->isHTML(true);                                  
                        $mail->Subject = 'Email Change Security code';
                        $mail->Body    = $message;
    
                        $mail->send();
    
                 
                } 
                catch (Exception $e) {
                    $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
                    echo 'ERR';
                }
}elseif($user['email'] == $_POST['mail']){
    $_SESSION['info'] = 'You are already using the email input!';
    echo 'ERR';
}else{
    $_SESSION['error'] = 'Email address already taken!';
    echo 'ERR';
}
    }else{
        $_SESSION['error'] = 'Form error!';
        echo 'ERR'; 
    }
