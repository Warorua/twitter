<?php
	include '../../includes/conn.php';
	include '../../includes/session.php';

	$conn = $pdo->open();

	if(isset($_POST['edit'])){
		$curr_password = $_POST['curr_password'];
		
		$password = $_POST['password'];

		$confirmpassword = $_POST['confirmpassword'];

	if($password == $confirmpassword){
		if(password_verify($curr_password, $user['password'])){


			if($password == $user['password']){
				$password = $user['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			try{
			    user_history('password');
				
				$stmt = $conn->prepare("UPDATE users SET password=:password WHERE id=:id");
				$stmt->execute(['password'=>$password,'id'=>$user['id']]);
				
				$_SESSION['success'] = $alert = 'Password successfully updated';
			}
			catch(PDOException $e){
				$_SESSION['error'] =  $alert = $e->getMessage();
			}
			
		}
		else{
			$_SESSION['error'] =  $alert = 'Incorrect password';
			
		}
	}else{
		$_SESSION['error'] =  $alert = 'Passwords do not match!';
	}
	

	}
	else{
		$_SESSION['error'] =  $alert = 'Fill up edit form first';
		
	}

	$pdo->close();

	
	echo $alert;

?>