<?php
	include '../../includes/conn.php';
	include '../../includes/session.php';

	$conn = $pdo->open();
    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM client_api WHERE user_id=:user_id");
    $stmt->execute(['user_id' => $user['id']]);
    $api_app = $stmt->fetch();

if ($api_app['numrows'] < 1) {
    if ($_POST['consumer_key'] != '' && $_POST['consumer_secret'] != '' && $_POST['bearer_token'] != '') {
        $api_consumer_key = $_POST['consumer_key'];
        $api_consumer_secret = $_POST['consumer_secret'];
        $api_bearer_token = $_POST['bearer_token'];

        $stmt = $conn->prepare("INSERT INTO client_api (user_id, consumer_key, consumer_secret, bearer_token) VALUES (:user_id, :consumer_key, :consumer_secret, :bearer_token)");
       
        $stmt->execute(['user_id' => $user['id'], 'consumer_key'=> $api_consumer_key, 'consumer_secret'=>$api_consumer_secret, 'bearer_token'=>$api_bearer_token]);
 user_history('api_app');
        $_SESSION['success'] = $alert = 'Congraturations! API app successfully added.';

    } else {
        $_SESSION['error'] =  $alert = 'Fill all the fields to process your request!';
    }
}
	else{
        if($_POST['consumer_key'] != '' && $_POST['consumer_secret'] != '' && $_POST['bearer_token'] != ''){
            $stmt = $conn->prepare("UPDATE users SET email=:email WHERE id=:id");
           
            $stmt->execute(['email' => $email, 'id' => $user['id']]);
             user_history('api_app');
            $_SESSION['success'] = $alert = 'API app credentials successfully updated';
        }else{
            $_SESSION['error'] =  $alert = 'Fill all the fields to process your request!';
        }
		
		//header('location: MyProfile');
	}

	$pdo->close();

	
	echo $alert;
