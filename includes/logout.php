<?php
	session_start();
	session_destroy();

	header('location: http://localhost/twitter/auth/sign-in.php#');
?>