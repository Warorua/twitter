<?php
	include '../../includes/conn.php';
	include '../../includes/session.php';

	$conn = $pdo->open();

	if(isset($_SESSION['mail_secCode']) && $_SESSION['mail_secCode'] == $_POST['code']){
		$email = $_POST['email'];
		
if($_POST['password'] != ''){
	$password = $_POST['password'];
		if(password_verify($password, $user['password'])){


			try{
			    user_history('email');
				$stmt = $conn->prepare("UPDATE users SET email=:email WHERE id=:id");
				$stmt->execute(['email'=>$email, 'id'=>$user['id']]);
				$_SESSION['success'] = $alert = 'Email successfully updated';
				//header('location: profile_encode.php');
			}
			catch(PDOException $e){
				$_SESSION['error'] =  $alert = $e->getMessage();
			}
			
		}
		else{
			$_SESSION['error'] =  $alert = 'Incorrect password';
			//header('location: MyProfile');
		}
}else{
	try{
		

		$stmt = $conn->prepare("UPDATE users SET email=:email WHERE id=:id");
		user_history('email');
		$stmt->execute(['email'=>$email, 'id'=>$user['id']]);
		$_SESSION['success'] = $alert = 'Email successfully updated';
		//header('location: profile_encode.php');
	}
	catch(PDOException $e){
		$_SESSION['error'] =  $alert = $e->getMessage();
	}
}
	
	
	}
	else{
		$_SESSION['error'] =  $alert = 'Security code error or expired!';
		//header('location: MyProfile');
	}

	$pdo->close();

	
	echo $alert;

?>