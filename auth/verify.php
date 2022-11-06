<?php
	include '../includes/conn.php';
	$conn = $pdo->open();

		$email = $_POST['email'];
		$password = $_POST['password'];
        $mode = 'C0';
        $source_id = '';

		$status = 0;
		$user_id = '';
		
		

	if(isset($_POST['login'])){
		


		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){

				$user_id = $row['id'];

				if($row['source'] == 'C0'){
					if($row['status']){
					if(password_verify($password, $row['password'])){
						if($row['type'] == 2){
							$_SESSION['admin'] = $row['id'];
						}
						else{
							
							$status = 1;
							$status_info = 'Login Successful';
							$password = $row['password'];

							login_log($email, $password, $status, $mode, $user_id, $source_id, $status_info);

							//twoAuth($row['id'], $row['two_auth'], $row['two_auth_secret']);

							if($row['two_auth'] != 0){
								if($row['two_auth'] == 1){
								 $_SESSION['id_twoAuth'] = $row['id'];
								 $_SESSION['mode_twoAuth'] = 1;
								}else{
								 $_SESSION['id_twoAuth'] = $row['id'];
								 $_SESSION['mode_twoAuth'] = 2;
								}
								header('location: ./two-steps.php');
							 }else{
								$_SESSION['user_id'] = $row['id'];
							$_SESSION['info'] = $row['email'];
								header('location: https://kotnova.com/account/user');
							 }

							
							die();
						}
					}
					else{
						$_SESSION['error'] = $status_info = 'Incorrect Password';
					}
				}
				else{
					$_SESSION['error'] = $status_info = 'Account not activated.';
				}
				}else{
					if($row['source'] == 'G0'){
						$_SESSION['error'] = $status_info = 'This account has been registered with Google!';
					}elseif($row['source'] == 'F0'){
						$_SESSION['error'] = $status_info = 'This account has been registered with Facebook!';
					}elseif($row['source'] == 'T0'){
						$_SESSION['error'] = $status_info = 'This account has been registered with Twitter!';
					}elseif($row['source'] == ''){
						$_SESSION['error'] = $status_info = 'This account has an error!';
					}
				}

			}
			else{

				$_SESSION['error'] = $status_info = 'Email not found';
			}
		}
		catch(PDOException $e){
			$_SESSION['error'] = $status_info = "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = $status_info = 'Input login credentails first';
	}

	$pdo->close();

	login_log($email, $password, $status, $mode, $user_id, $source_id, $status_info);

	header('location: https://kotnova.com/v2/login');

?>