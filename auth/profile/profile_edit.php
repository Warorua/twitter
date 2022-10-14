<?php
	include '../../includes/conn.php';
	include '../../includes/session.php';

	$conn = $pdo->open();

	if(isset($_POST['edit'])){
		$company_site = $_POST['website'];
		$country = $_POST['country'];
		$language = $_POST['language'];
		$time_zone = $_POST['timezone'];
		$currency = $_POST['currency'];
		$email_comm = $_POST['email_comm'];
		$phone_comm = $_POST['phone_comm'];
		$marketing = $_POST['marketing'];

		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$contact = $_POST['phone'];	
		$company = $_POST['company'];
		$photo = $_FILES['avatar']['name'];
		$photo_path = realpath($_FILES['avatar']['name']);

			if(!empty($photo)){
			$pic_del = $parent_url.'/assets/media/profile/'.$user['photo'];
			//unlink($pic_del);
			$ext = pathinfo($photo, PATHINFO_EXTENSION);
			$slugg = md5('Faraji');
			$time_id = time();
			$the_id = sha1($time_id);
			$new_filename = $the_id.$slugg.'.'.$ext;
				move_uploaded_file($_FILES['avatar']['tmp_name'], '../../assets/media/profile/'.$new_filename);
				$filename = $parent_url.'/assets/media/profile/'.$new_filename;
				 	
			}
			else{
				$filename = $user['photo'];
			}
			try{	   
				user_history('profile'); 
				$stmt = $conn->prepare("UPDATE users SET marketing=:marketing, phone_comm=:phone_comm, email_comm=:email_comm, currency=:currency, time_zone=:time_zone, language=:language, country=:country, company_site=:company_site, company=:company, firstname=:firstname, lastname=:lastname, contact_info=:contact, photo=:photo WHERE id=:id");
				$stmt->execute(['marketing'=>$marketing, 'phone_comm'=>$phone_comm, 'email_comm'=>$email_comm, 'currency'=>$currency, 'time_zone'=>$time_zone, 'language'=>$language, 'country'=>$country, 'company_site'=>$company_site, 'company'=>$company, 'firstname'=>$firstname, 'lastname'=>$lastname, 'contact'=>$contact, 'photo'=>$filename, 'id'=>$user['id']]);
				
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