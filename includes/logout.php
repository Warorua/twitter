<?php
	include './conn.php';
	session_destroy();

	header('location:  '.$parent_url.'/v2/login#');
?>