<?php

function startPage() {
	session_start();
	// whatever other code you want to run at the start of every page
	@$_SESSION['byao'] = $_POST["username"]; 
}

function connectDB() {
	include 'link.php';
	$link = mysqli_connect($host, $user, $pwd, $db, $port);
	if (!$link) {
		printf("connect failed: %s\n" , mysqli_connect_error());
		exit();
	}
	return $link;
}

function checkUserSession() {
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
	// last request was more than 30 minutes ago
	session_unset();     // unset $_SESSION variable for the run-time 
	session_destroy();   // destroy session data in storage
	echo "<script>url=\"logout.php\";window.location.href=url;</script>";
	}
	$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
}

?>