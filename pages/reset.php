<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = "";

	if (!empty($_POST["email"])) {
		$email = clean_input($_POST["email"]);
	}
 	
	$sql = "SELECT user_id FROM users WHERE email = '$email'";
	$result = $GLOBALS['conn']->query($sql);
	if($result) {
		$row = mysqli_fetch_row($result);
		$uid = $row[0];

		$token = bin2hex(random_bytes(32));

		$insertToken = "UPDATE users SET token = '$token' WHERE user_id = '$uid'";
		$insertResult = $GLOBALS['conn']->query($insertToken);
		
		if ($insertResult) {
			$url = "http://elvis.rowan.edu/~macchiaa8/final/pages/index.php?page=newPassword&token=".$token."&email=".$email;

			$msg = "Click this link to reset your password: ".$url;

			$isSent = mail($email, "Reset your password for TipTracker", $msg);

			if ($isSent) {

				echo 'If your email address is linked to an account, you will recieve an email to reset your password.';
			} else {
				echo 'Error Sending Email';
			}
		}
	} else {
		echo 'An error occurred';
	}
}

function clean_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>



<div class="container">

	<form id="resetForm"  action="./index.php?page=passwordReset" method="post">

		<label for="email"><h4>Enter your email address</h4></label><br>	

		<input id="email" type="email" name="email" required >

		<input type="submit">
	</form>
	<br>
	<p>Return to <a href="./index.php?page=login">Login</a></p>	
</div>
