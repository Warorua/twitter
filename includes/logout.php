<?php
	session_start();
	session_destroy();

	header('location: https://tweetbot.site/auth/sign-in.php#');
?>