<?php
if (isset($_SESSION["currUserID"])) {
	session_unset();
}

// define variables and set to empty values
$email = $pword = $org = $errMsg = $emailErrMsg =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$email = clean_input($_POST["email"]);
	$pword = clean_input($_POST["pword"]);

	$userExists = loginUser($email, $pword);

	if (empty($_POST["email"])) {
		$emailErrMsg = "Please enter an email.";
	}
	else{
		$email = clean_input($_POST["email"]);
		validateEmail($email);
	}

	if ($userExists) {
		$_SESSION['userEmail'] = $email;

		$_SESSION['currUserEmail'] = $email; 
		header("Location: ./index.php?page=dashboard");

	} else {
		$errMsg = 'Invalid Credentials';
	}
	$GLOBALS['conn']->close(); 
}

function loginUser($email, $pword)
{
	$sql = "SELECT pword, user_id FROM users WHERE email = '$email'";

	$result = $GLOBALS['conn']->query($sql);
	if($result) {
		$row = mysqli_fetch_row($result);
		$hash = $row[0];
		$_SESSION['currUserID'] = $row[1];
		return password_verify($pword, $hash);
	}
	return false;
}

function clean_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function validateEmail($email) {
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		global $emailErrMsg;
		$emailErrMsg = "Invalid email format.";
	}
}
?>

<div class="container">
<h1 id="sign-up-form-title">Login</h1>
<div id="sign-up-form">
    <form method="POST" action="./index.php?page=login">
	<h6 class="input-label">Email</h6>
	<input type="email" id="email" name="email" class="form-input">
	&nbsp; <span id="email-valid" hidden></span>
	<span id="email-invalid"  hidden></span>
	<span id="email-err-msg" hidden></span>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($emailErrMsg != "") {
			echo '<span id="server-email-msg">'.$emailErrMsg.'</span>';
		}
	}
	?>
	<br><br>

	<h6 class="input-label">Password</h6>
	<input type="password" name="pword" class="form-input"><br><br>

	<input type="submit" value="Login" id="sub-btn" disabled>
	<p>Not a user? <a href="./index.php?page=sign-up">Sign Up</a></p>
	<a href="./index.php?page=passwordReset">Forgot Password?</a>
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
<script src="./login.js"></script>
