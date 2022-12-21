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
   header('location:https://kotnova.com/v2/login ');
}else{
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->execute(['id'=>$_SESSION['user_id']]);
	$user = $stmt->fetch();

	if($user['photo'] == ''){
		$opt_img = array(
		 $parent_url.'/assets/media/stock/600x600/img-47.jpg',
		 $parent_url.'/assets/media/stock/600x600/img-49.jpg',
		 $parent_url.'/assets/media/stock/600x600/img-48.jpg',
		 $parent_url.'/assets/media/stock/600x600/img-45.jpg'
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

	function timeDiff_2($firstTime, $lastTime)
	{
		// convert to unix timestamps
		$firstTime = strtotime($firstTime);
		$lastTime = strtotime($lastTime);
	
		// perform subtraction to get the difference (in seconds) between times
		$timeDiff = $lastTime - $firstTime;
		$years = abs(floor($timeDiff / 31536000));
		$days = abs(floor(($timeDiff - ($years * 31536000)) / 86400));
		$hours = abs(floor(($timeDiff - ($years * 31536000) - ($days * 86400)) / 3600));
		$mins = abs(floor(($timeDiff - ($years * 31536000) - ($days * 86400) - ($hours * 3600)) / 60)); #floor($timeDiff / 60);
		$secs = abs(floor(($timeDiff - ($years * 31536000) - ($days * 86400) - ($hours * 3600)) / 60)) * 60;
	
		if ($years == 0) {
			$years = '';
		} else {
			$years = $years . " yrs, ";
		}
	
		if ($days == 0) {
			$days = '';
		} elseif ($days == 1) {
			$days = $days . " day, ";
		} else {
			$days = $days . " days, ";
		}
	
		if ($hours == 0) {
			$hours = '';
		} elseif ($hours == 1) {
			$hours = $hours . " hr, ";
		} else {
			$hours = $hours . " hrs, ";
		}
	
	  if ($secs == 0) {
			$secs = '';
		} elseif ($secs == 1) {
			$secs = $secs . " sec";
		} else {
			$secs = $secs . " secs";
		}
	
	
		$time = $secs;
	
		// return the difference
		return $time;
	}

}
