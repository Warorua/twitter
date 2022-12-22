<?php
//*
  include '../includes/conn.php';

  include '../includes/session.php';

 require '../vendor/autoload.php';

 //include '../includes/api_config.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 $mail = new PHPMailer(true);                             
 try {
     //Server settings
 
     $mail->isSMTP();                                     
     $mail->Host = gethostbyname('mail.kotnova.com');                  
     $mail->SMTPAuth = true;                               
     $mail->Username = 'kotnova.mailer@kotnova.com';     
     $mail->Password = '9ATYY4s-SoxV';                    
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
     $mail->addAddress('waroruaalex640@gmail.com');              
     $mail->addReplyTo('mailer.auto_system@kotnova.com');
    
     //Content
     $mail->isHTML(true);                                  
     $mail->Subject = 'Email Change Security code';
     $mail->Body    = 'A good message';

     $mail->send();


} 
catch (Exception $e) {
 $output = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
 echo $output;
}
?>







