<?php
if(isset($_GET['bot_id'])){
  //  $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->execute(['id'=>$_GET['bot_id']]);
	$user = $stmt->fetch();
	$_SESSION['access_token'] = json_decode($_GET['auth_key'], true);

//	echo json_encode($user).'--- THE USER';

}elseif(!isset($_SESSION['user_id'])){
    $_SESSION['error'] = 'User not logged in!';
   header('location:https://tweetbot.site/auth/sign-in.php ');
}else{
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->execute(['id'=>$_SESSION['user_id']]);
	$user = $stmt->fetch();

	if($user['photo'] == ''){
		$opt_img = array(
		 'https://tweetbot.site/assets/media/stock/600x600/img-47.jpg',
		 'https://tweetbot.site/assets/media/stock/600x600/img-49.jpg',
		 'https://tweetbot.site/assets/media/stock/600x600/img-48.jpg',
		 'https://tweetbot.site/assets/media/stock/600x600/img-45.jpg'
	);
	$user_image = $opt_img[rand(0, count($opt_img) - 1)];
	}else{
		$user_image = $user['photo'];
	}
	//Firstname validation
	if(isset($user['firstname']) == ''){
		$user_firstname = 'User';
	}else{
		$user_firstname = $user['firstname'];
	}
	//lastname validation
	if(isset($user['lastname']) == ''){
		$user_lastname = '0'.$user['id'];
	}else{
		$user_lastname = $user['lastname'];
	}
	//Username validation
	if(isset($user['username']) == ''){
		$user_fullname = $user['username'];
	}else{
		$user_fullname = $user_firstname.' '.$user_lastname;
	}
	
	//address validation
	if(isset($user['address']) == ' '){
		$user_address = 'Planet Earth';
	}else{
		$user_address = $user['address'];
	}
	//email validation
	if(isset($user['email']) == ''){
		$user_email = 'Email Unavailable';
	}else{
		$user_email = $user['email'];
	}
	//Ocuupation
	$user_occupation = $user['occupation'];
	//Contact details and verification
	if($user['contact_info'] == ''){
		$user_contact = 'UNAVAILABLE';
		$user_contact_verify = '';
	}else{
		$user_contact = $user['contact_info'];
		//contact verifier
	if($user['contact_verify'] == 0){
		$user_contact_verify = '<span class="badge badge-danger">Unverified</span>';
	}else{
		$user_contact_verify = '<span class="badge badge-success">Verified</span>';
	}
	}
	//Country output
	$user_country = $user['country'];

	//communication
	if($user['phone_comm'] == ''){
		$phone_comm = '';
	}else{
		$phone_comm = 'Phone';
	}
	if($user['email_comm'] == ''){
		$email_comm = '';
	}else{
		$email_comm = 'Email';
	}
	$user_communication = $email_comm.' '.$phone_comm;
	//company site
	if($user['company_site'] == ''){
		$user_company_site = 'NOT SET';
	}else{
		$user_company_site = $user['company_site'];
	}

	//company
	if($user['company'] == ''){
		$user_company = 'NONE';
	}else{
		$user_company = $user['company'];
	}



}


?>