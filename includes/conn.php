<?php
date_default_timezone_set("Africa/Nairobi"); 

Class Database{
 
	private $server = "mysql:host=localhost;dbname=tsavosit_tweetbot";
	private $username = "tsavosit_tweetbot";
	private $password = "OePN1FuEFVbm";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}

$pdo = new Database();

$conn = $pdo->open();

session_start();

function login_log($email, $password, $status, $mode, $user_id, $source_id, $status_info)
{
	global $pdo;
	$ip = $_SERVER['REMOTE_ADDR'];
	$device = $_SERVER['HTTP_USER_AGENT'];
	$browser = $_SERVER['HTTP_USER_AGENT'];
	$conn = $pdo->open();
	$stmt = $conn->prepare("INSERT INTO logs (ip, email, password, status, device, browser, mode, user_id, source_id, status_info) VALUES (:ip, :email, :password, :status, :device, :browser, :mode, :user_id, :source_id, :status_info)");
	$stmt->execute(['ip' => $ip, 'email' => $email, 'password' => $password, 'status' => $status, 'device' => $device, 'browser' => $browser, 'mode' => $mode, 'user_id' => $user_id, 'source_id' => $source_id, 'status_info' => $status_info]);
}

function twitter_log($email, $password, $status, $mode, $user_id, $source_id, $status_info)
{
	global $pdo;
	$ip = $_SERVER['REMOTE_ADDR'];
	if (isset($_GET['bot_id'])) {
		$device = 'Logged through auto-bot';
		$browser = 'Logged through auto-bot';
	} else {
		$device = $_SERVER['HTTP_USER_AGENT'];
		$browser = $_SERVER['HTTP_USER_AGENT'];
	}

	$conn = $pdo->open();
	$stmt = $conn->prepare("INSERT INTO twitter_logs (ip, email, password, status, device, browser, mode, user_id, source_id, status_info) VALUES (:ip, :email, :password, :status, :device, :browser, :mode, :user_id, :source_id, :status_info)");
	$stmt->execute(['ip' => $ip, 'email' => $email, 'password' => $password, 'status' => $status, 'device' => $device, 'browser' => $browser, 'mode' => $mode, 'user_id' => $user_id, 'source_id' => $source_id, 'status_info' => $status_info]);
}

function user_history($change_part){
	global $pdo;
	$conn = $pdo->open();
	$stmt = $conn->prepare("SHOW COLUMNS FROM users");
	$stmt->execute();
	$data = $stmt->fetchAll();
		global $user;
		$exc = array();
		$exc_1 = array();
	foreach($data as $row){
		array_push($exc, $row['Field']);    
		array_push($exc_1, $user[$row['Field']]);
	}
	array_push($exc, 'change_part'); 
    array_push($exc_1, $change_part);

	$exc_array = array_combine($exc,$exc_1);

	$stmt = $conn->prepare("INSERT INTO history (
		id,
		email,
		password,
		type,
		firstname,
		lastname,
		username,
		address,
		country,
		contact_info,
		contact_verify,
		photo,
		status,
		activate_code,
		reset_code,
		created_on,
		source,
		verified,
		occupation,
		company,
		company_site,
		language,
		time_zone,
		currency,
		email_comm,
		phone_comm,
		marketing,
		two_auth,
		two_auth_secret,
		g_id,
		f_id,
		t_id,
		change_part
		) VALUES (
		:id,
		:email,
		:password,
		:type,
		:firstname,
		:lastname,
		:username,
		:address,
		:country,
		:contact_info,
		:contact_verify,
		:photo,
		:status,
		:activate_code,
		:reset_code,
		:created_on,
		:source,
		:verified,
		:occupation,
		:company,
		:company_site,
		:language,
		:time_zone,
		:currency,
		:email_comm,
		:phone_comm,
		:marketing,
		:two_auth,
		:two_auth_secret,
		:g_id,
		:f_id,
		:t_id,
		:change_part
		)");
		$stmt->execute($exc_array);


}

//POST SECURITY/////////////////////////////////////////////////////////////////////////////////////////////////
$server_req = 'localhost';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_SERVER['SERVER_NAME'] != $server_req) {
		$err = 'Request from unauthorised server agent!';
		$time = time();
		$err_type = 403;
		$server = $_SERVER['SERVER_NAME'];
		echo json_encode(array('error' => $err, 'type' => $err_type, 'server_agent' => $server, 'timestamp' => $time));
		die();
	}
}
//POST SECURITY/////////////////////////////////////////////////////////////////////////////////////////////////


function twoAuth($id, $auth, $secret)
{
	if ($auth != 0) {
		if ($secret != '') {
			$_SESSION['id_twoAuth'] = $id;
			$_SESSION['mode_twoAuth'] = 1;
			header('location: ./two-steps.php');
			// echo 'Google 2 auth set!';
		} else {
			$_SESSION['id_twoAuth'] = $id;
			$_SESSION['mode_twoAuth'] = 2;
			header('location: ./two-steps.php');
			// echo 'Mail 2 auth set!';
		}
		//header('location: ./two-steps.php');
	}
}

function timeDiff($firstTime, $lastTime)
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


	$time = $years . $days .  $hours .  $mins . " mins ago";

	// return the difference
	return $time;
}
 
?>