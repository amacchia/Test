<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$token = $email = $newPassword = "";
	$allowPasswordReset = FALSE;
	$_SESSION['uid'] = $row['user_id'];
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
		$_SESSION['uid'] = $row['user_id'];
		
	} else {
		echo 'An Error Ocurred';
	}
} else {
	
	$newPassword = clean_input($_POST["pass"]);
	$hash = password_hash($newPassword, PASSWORD_DEFAULT);

	if(trim($_POST['pass'])=='' || trim($_POST['pass2'])=='') {
           echo('All fields are required!');
        }
	else if ($_POST['pass']!= $_POST['pass2']){
    		 echo("Password did not match! Try again. ");
	}else{
		//NOT WORKING
		$uid = 	$_SESSION['uid'];
		$sql = "UPDATE users SET pword = '$hash' WHERE user_id = '$uid'";
		$result = $GLOBALS['conn']->query($sql);
		if($result){
		echo("Password reset! Try logging in with your new credentials!");
		}else{
		 echo("Something went wrong with the result");
		}
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
<h1 id="new-password-title">Enter a New Password</h1>
<div id="sign-up-form">
    <form method="POST" action="./index.php?page=newPassword">

	<label for="pass" class="input-label">New Password</label>
        <input type="password" name="pass" class="form-input"><br>

	<label for="pass2" class="input-label">Confirm New Password</label>
        <input type="password" name="pass2" class="form-input"><br>

        <input type="submit" value="Confirm" id="sub-btn">
<p>Need to login? <a href="./index.php?page=login">Login</a></p>
    
</form>
</div>

<div class="errorMsg">
<?php
if ($errMsg != "") {
        echo 'Error: ' . $errMsg;
}
?>
</div>
</div>

