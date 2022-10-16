<?php
	include '../../includes/conn.php';
	include '../../includes/session.php';

	$conn = $pdo->open();
//$_POST = $_SESSION['post'];
	if(isset($_POST['edit'])){
	if (isset($_POST['website'])) {
		$company_site = $_POST['website'];
	} else {
		$company_site = '';
	}
	if (isset($_POST['country'])) {
		$country = $_POST['country'];
	} else {
		$country = '';
	}
	if (isset($_POST['language'])) {
		$language = $_POST['language'];
	} else {
		$language = '';
	}
	if (isset($_POST['timezone'])) {
		$time_zone = $_POST['timezone'];
	} else {
		$time_zone = '';
	}
	if (isset($_POST['currency'])) {
		$currency = $_POST['currency'];
	} else {
		$currency = '';
	}
	if (isset($_POST['email_comm'])) {
		$email_comm = $_POST['email_comm'];
	} else {
		$email_comm = '';
	}
	if (isset($_POST['phone_comm'])) {
		$phone_comm = $_POST['phone_comm'];
	} else {
		$phone_comm = '';
	}
	if (isset($_POST['marketing'])) {
		$marketing = $_POST['marketing'];
	} else {
		$marketing = '';
	}
	if (isset($_POST['fname'])) {
		$firstname = $_POST['fname'];
	} else {
		$firstname = '';
	}
	if (isset($_POST['lname'])) {
		$lastname = $_POST['lname'];
	} else {
		$lastname = '';
	}
	if (isset($_POST['phone'])) {
		$contact = $_POST['phone'];
	} else {
		$contact = '';
	}
	if (isset($_POST['company'])) {
		$company = $_POST['company'];
	} else {
		$company = '';
	}
	
	
	
	
	
	
		

		$_SESSION['post'] = $_POST;

	if (!empty($_FILES['avatar']['name'])) {
		$photo = $_FILES['avatar']['name'];
		$photo_path = realpath($_FILES['avatar']['name']);
		$pic_del = $parent_url . '/assets/media/profile/' . $user['photo'];
		//unlink($pic_del);
		$ext = pathinfo($photo, PATHINFO_EXTENSION);
		$slugg = md5('Faraji');
		$time_id = time();
		$the_id = sha1($time_id);
		$new_filename = $the_id . $slugg . '.' . $ext;
		move_uploaded_file($_FILES['avatar']['tmp_name'], '../../assets/media/profile/' . $new_filename);
		$filename = $parent_url . '/assets/media/profile/' . $new_filename;
	}
			else{
				$filename = $user['photo'];
			}
			try{	   
				user_history('profile'); 
				$stmt = $conn->prepare("UPDATE users SET 
				marketing=:marketing, 
				phone_comm=:phone_comm, 
				email_comm=:email_comm, 
				currency=:currency, 
				time_zone=:time_zone, 
				language=:language, 
				country=:country, 
				company_site=:company_site, 
				company=:company, 
				firstname=:firstname, 
				lastname=:lastname, 
				contact_info=:contact, 
				photo=:photo 
				WHERE 
				id=:id");
				$stmt->execute([
					'marketing'=>$marketing, 
					'phone_comm'=>$phone_comm, 
					'email_comm'=>$email_comm, 
					'currency'=>$currency, 
					'time_zone'=>$time_zone, 
					'language'=>$language, 
					'country'=>$country, 
					'company_site'=>$company_site, 
					'company'=>$company, 
					'firstname'=>$firstname, 
					'lastname'=>$lastname, 
					'contact'=>$contact, 
					'photo'=>$filename, 
					'id'=>$user['id']]);
				
				$_SESSION['success'] = $alert = 'Update successful';
			}
			catch(PDOException $e){
				$_SESSION['error'] =  $alert = $e->getMessage();
			}
			

	}
	else{
		$_SESSION['error'] =  $alert = 'Fill up edit form first';
	//	echo $_SESSION['error'];
	//	header('location: MyProfile');
	}

	$pdo->close();

	echo $alert;

?>