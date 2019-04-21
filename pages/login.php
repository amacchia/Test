<?php
if (isset($_SESSION["currUserID"])) {
	$_SESSION["currUserID"] = -1;
}

// define variables and set to empty values
$email = $pword = $org = $errMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$email = clean_input($_POST["email"]);
	$pword = clean_input($_POST["pword"]);

	$userExists = loginUser($email, $pword);

	if ($userExists) {
		$_SESSION['userEmail'] = $email;

		$_SESSION['currUserEmail'] = $email; 
		header("Location: ./index1.php?page=dashboard");

	} else {
		$errMsg = 'User Not Found';
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
?>

<div class="container">
<h1 id="sign-up-form-title">Login</h1>
<div id="sign-up-form">
    <form method="POST" action="./index1.php?page=login">
	<label for="email" class="input-label">Email</label>
	<input type="email" name="email" class="form-input"><br>

	<label for="pword" class="input-label">Password</label>
	<input type="password" name="pword" class="form-input"><br>

	<input type="submit" value="Login" id="sub-btn">
	<p>Not a user? <a href="./index1.php?page=sign-up">Sign Up</a></p>
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
