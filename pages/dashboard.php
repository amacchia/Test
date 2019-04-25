<div class="container">
<?php
if (isset($_SESSION["currUserID"])) {
	$userID = $_SESSION["currUserID"];
	echo 'User ID: '.$userID;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$monTips = $tueTips = $wedTips = $thrTips = $friTips = $satTips = $sunTips = $weekly_pay= 0;

	if (!empty($_POST['monTips'])) {
		$monTips = $_POST['monTips'];
	}

	if (!empty($_POST['tueTips'])) {
		$tueTips = $_POST['tueTips'];
	}

	if (!empty($_POST['wedTips'])) {
		$wedTips = $_POST['wedTips'];
	}

	if (!empty($_POST['thrTips'])) {
		$thrTips = $_POST['thrTips'];
	}

	if (!empty($_POST['friTips'])) {
		$friTips = $_POST['friTips'];
	}

	if (!empty($_POST['satTips'])) {
		$satTips = $_POST['satTips'];
	}

	if (!empty($_POST['sunTips'])) {
		$sunTips = $_POST['sunTips'];
	}

	if (!empty($_POST['weekly_pay'])) {
		$weekly_pay = $_POST['weekly_pay'];
	}

	echo '<br>'.$monTips.'<br>';
	echo $tueTips.'<br>';
	echo $wedTips.'<br>';
	echo $thrTips.'<br>';
	echo $friTips.'<br>';
	echo $satTips.'<br>';
	echo $sunTips.'<br>';

	$weekDate = date("Y-m-d");
	$insertNewWeekSQL = "INSERT INTO `work_weeks` (uid, mon, tue, wed, thr, fri, sat, sun, weekly_pay, week_date) VALUES ('$userID' ,'$monTips', '$tueTips', '$wedTips', '$thrTips', '$friTips', '$satTips', '$sunTips', '$weekly_pay', '$weekDate')";

	$newWeekResult = $GLOBALS['conn']->query($insertNewWeekSQL);

	if ($newWeekResult) {
		echo 'New week Inserted';
	} else {
		echo 'Error inserting new week: '.$GLOBALS['conn']->connect_error;
	}	
}

?>
</div>


<!-- Modal -->
<div class="modal fade" id="newWeekModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">Create Week</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	</button>
      </div>
      <div class="modal-body">
<?php include "workWeekForm.php"; ?>
      </div>
      <div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<input form="workWeekForm" type="submit" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>
