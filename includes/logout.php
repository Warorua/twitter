<?php
	include './conn.php';
	session_destroy();

	header('location:  '.$parent_url.'/auth/sign-in.php#');
?>