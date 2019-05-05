<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$token = $email = "";
	$allowPasswordReset = FALSE;

	if (!empty($_GET['token'])) {
		$token = clean_input($_GET['token']);
	}

	if (!empty($_GET['email'])) {
		$email = clean_input($_GET['email']);
	}

	$sql = "SELECT user_id FROM users WHERE email = '$email' AND token = '$token'";
	$result = $GLOBALS['conn']->query($sql);
	
	if ($result) {
		$row = $result->fetch_assoc();
		$uid = $row['user_id'];
		$allowPasswordReset = TRUE;
	} else {
		echo 'An Error Ocurred';
	}
} else {
	// POST REQUEST - Set the user's new password
}

function clean_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
