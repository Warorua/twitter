<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include '../includes/conn.php';

    function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
        $contact_info = '';
        $source = 'C0';
		
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;	
		$_SESSION['contact_info'] = $contact_info;
	

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: https://tweetbot.site/auth/sign-up.php#');
		}
		
		else{
			$conn = $pdo->open();

			 //check whether email is related to other account
 $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
 $stmt->execute(['email'=>$email]);
 $row = $stmt->fetch();
 if($row['numrows'] > 0){
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->execute(['email'=>$email]);
    $row = $stmt->fetch();  

     if($row['source'] == 'G0'){
      $_SESSION['error'] = 'User already registered with Google.';
      unset($_SESSION['access_token']);
      redirect($parent_url.'/auth/sign-up.php');
     
     }elseif($row['source'] == 'F0'){
         $_SESSION['error'] = 'User already registered with Facebook.';
         unset($_SESSION['access_token']);
         redirect($parent_url.'/auth/sign-up.php');
     }elseif($row['source'] == 'T0'){
        $_SESSION['error'] = 'User already registered with Twitter.';
        unset($_SESSION['access_token']);
        redirect($parent_url.'/auth/sign-up.php');
    }else{
         $_SESSION['error'] = 'User already registered.';
         unset($_SESSION['access_token']);
         redirect($parent_url.'/auth/sign-up.php');
     }
 }
 ////////////////////////////////////////////////////////////////////////////////////////
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

                

				try{
					$stmt = $conn->prepare("INSERT INTO users (source, email, contact_info, password, firstname, lastname, activate_code, created_on) VALUES (:source, :email, :contact_info, :password, :firstname, :lastname, :code, :now)");
					$stmt->execute(['source'=>$source, 'email'=>$email, 'contact_info'=>$contact_info, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now]);
					$userid = $conn->lastInsertId();

					$message = '
                    <!--begin::Email template-->
 <style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
 <div id="#kt_app_body_content" style="background-color:#F7F2EF; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
     <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
         <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
             <tbody>
                 <tr>
                     <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                         <!--begin:Email content-->
                         <div style="text-align:center; margin:0 15px 34px 15px">
                             <!--begin:Logo-->
                             <div style="margin-bottom: 10px">
                                 <a href="https://farajiproperties.co/" rel="noopener" target="_blank">
                                     <img alt="Logo" src="https://farajiproperties.co/mail_media/logo.png" style="height: 55px" />
                                 </a>
                             </div>
                             <!--end:Logo-->
                             <!--begin:Media-->
                             <div style="margin-bottom: 15px">
                                 <img alt="Logo" src="https://farajiproperties.co/mail_media/media/email/icon-positive-vote-1.png" />
                             </div>
                             <!--end:Media-->
                             <!--begin:Text-->
                             <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                 <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hey '.$firstname.', thanks for signing up!</p>
                                 <p style="margin-bottom:2px; color:#7E8299">Lots of people make mistakes while creating</p>
                                 <p style="margin-bottom:2px; color:#7E8299">paragraphs. Some writers just put whitespace in</p>
                                 <p style="margin-bottom:2px; color:#7E8299">their text in random places</p>
                             </div>
                             <!--end:Text-->
                             <!--begin:Action-->
                             <a href="https://tweetbot.site/auth/activate.php?code='.$code.'&user='.$userid.'" target="_blank" style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Activate Account</a>
                             <!--begin:Action-->
                         </div>
                         <!--end:Email content-->
                     </td>
                 </tr>
                 <tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
                     <td align="start" valign="start" style="padding-bottom: 10px;">
                         <p style="color:#181C32; font-size: 18px; font-weight: 600; margin-bottom:13px">What’s next?</p>
                         <!--begin::Wrapper-->
                         <div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
                             <!--begin::Item-->
                             <div style="display:flex">
                                 <!--begin::Media-->
                                 <div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
                                     <img alt="Logo" src="https://farajiproperties.co/mail_media/media/email/icon-polygon.png" />
                                     <span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">1</span>
                                 </div>
                                 <!--end::Media-->
                                 <!--begin::Block-->
                                 <div>
                                     <!--begin::Content-->
                                     <div>
                                         <!--begin::Title-->
                                         <a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Complete your account</a>
                                         <!--end::Title-->
                                         <!--begin::Desc-->
                                         <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Lots of people make mistakes while creating paragraphs Some writers just put whitespace in their text</p>
                                         <!--end::Desc-->
                                     </div>
                                     <!--end::Content-->
                                     <!--begin::Separator-->
                                     <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                                     <!--end::Separator-->
                                 </div>
                                 <!--end::Block-->
                             </div>
                             <!--end::Item-->
                             <!--begin::Item-->
                             <div style="display:flex">
                                 <!--begin::Media-->
                                 <div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
                                     <img alt="Logo" src="https://farajiproperties.co/mail_media/media/email/icon-polygon.png" />
                                     <span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">2</span>
                                 </div>
                                 <!--end::Media-->
                                 <!--begin::Block-->
                                 <div>
                                     <!--begin::Content-->
                                     <div>
                                         <!--begin::Title-->
                                         <a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Communication Tool</a>
                                         <!--end::Title-->
                                         <!--begin::Desc-->
                                         <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Craft a headline that is both informative and will capture readers’ improtant attentions</p>
                                         <!--end::Desc-->
                                     </div>
                                     <!--end::Content-->
                                     <!--begin::Separator-->
                                     <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                                     <!--end::Separator-->
                                 </div>
                                 <!--end::Block-->
                             </div>
                             <!--end::Item-->
                             <!--begin::Item-->
                             <div style="display:flex">
                                 <!--begin::Media-->
                                 <div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
                                     <img alt="Logo" src="https://farajiproperties.co/mail_media/media/email/icon-polygon.png" />
                                     <span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">3</span>
                                 </div>
                                 <!--end::Media-->
                                 <!--begin::Block-->
                                 <div>
                                     <!--begin::Content-->
                                     <div>
                                         <!--begin::Title-->
                                         <a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Task Planner</a>
                                         <!--end::Title-->
                                         <!--begin::Desc-->
                                         <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Use images to enhance your post, improve its flow, add humor, and explain complex topics</p>
                                         <!--end::Desc-->
                                     </div>
                                     <!--end::Content-->
                                 </div>
                                 <!--end::Block-->
                             </div>
                             <!--end::Item-->
                         </div>
                         <!--end::Wrapper-->
                     </td>
                 </tr>
                 <tr>
                     <td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
                         <p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">It’s all about customers!</p>
                         <p style="margin-bottom:2px">Call our customer care number: +31 6 3344 55 56</p>
                         <p style="margin-bottom:4px">You may reach us at 
                         <a href="https://farajiproperties.co/" rel="noopener" target="_blank" style="font-weight: 600">support@farajiproperties.co</a>.</p>
                         <p>We serve Mon-Fri, 9AM-18AM</p>
                     </td>
                 </tr>
                 <tr>
                     <td align="center" valign="center" style="text-align:center; padding-bottom: 20px;">
                         <a href="#" style="margin-right:10px">
                             <img alt="Logo" src="https://farajiproperties.co/mail_media/media/email/icon-linkedin.png" />
                         </a>
                         <a href="#" style="margin-right:10px">
                             <img alt="Logo" src="https://farajiproperties.co/mail_media/media/email/icon-dribbble.png" />
                         </a>
                         <a href="#" style="margin-right:10px">
                             <img alt="Logo" src="https://farajiproperties.co/mail_media/media/email/icon-facebook.png" />
                         </a>
                         <a href="#">
                             <img alt="Logo" src="https://farajiproperties.co/mail_media/media/email/icon-twitter.png" />
                         </a>
                     </td>
                 </tr>
                 <tr>
                     <td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
                         <p>&copy; Copyright FarajiProperties. 
                         <a href="https://farajiproperties.co/" rel="noopener" target="_blank" style="font-weight: 600;font-family:Arial,Helvetica,sans-serif">Unsubscribe</a>&nbsp; from newsletter.</p>
                     </td>
                 </tr>
             </tbody>
         </table>
     </div>
 </div>
					';

					//Load phpmailer
		    		require '../vendor/autoload.php';

		    		$mail = new PHPMailer(true);                             
				    try {
				        //Server settings
						
				        $mail->isSMTP();                                     
				        $mail->Host = gethostbyname('mail.farajiproperties.co');                  
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'noreply@farajiproperties.co';     
				        $mail->Password = '30mH8Wp5ZK7*';                    
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'tls';                           
				        $mail->Port = 587;                                   

				        $mail->setFrom('noreply@farajiproperties.co');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('mailer.auto_system@farajiproperties.co');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'Faraji Properties.';
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

				        {$_SESSION['success'] = 'Account created. Check your email to activate.';
				        header('location: https://tweetbot.site/auth/sign-up.php#');}

				    } 
									
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location: https://tweetbot.site/auth/sign-up.php#');
				    }

				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Complete filling the signup form first';
		header('location: https://tweetbot.site/auth/sign-up.php#');
	}