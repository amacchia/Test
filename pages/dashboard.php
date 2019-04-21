<div class="container">
<?php
	if (isset($_SESSION["currUserID"])) {
		$userID = $_SESSION["currUserID"];
		echo 'User ID: '.$userID;
	}

?>
</div>
