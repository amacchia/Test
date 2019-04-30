<div class="container">
<?php
if (isset($_SESSION["currUserID"])) {
	$userID = $_SESSION["currUserID"];
	//echo 'User ID: '.$userID;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$monTips = $tueTips = $wedTips = $thrTips = $friTips = $satTips = $sunTips = $weekly_pay = $hoursWorked = 0;

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

	if (!empty($_POST['hours_worked'])) {
		$hoursWorked = $_POST['hours_worked'];
	}

	if (empty($_POST['week_id'])) {
		$newWeek = TRUE;
	} else {
		$weekID = $_POST['week_id'];
		$newWeek = FALSE;
	}

	if ($newWeek) {
		$weekDate = date("Y-m-d");
		$insertNewWeekSQL = "INSERT INTO `work_weeks` (uid, mon, tue, wed, thr, fri, sat, sun, weekly_pay, hours_worked, week_date) VALUES ('$userID' ,'$monTips', '$tueTips', '$wedTips', '$thrTips', '$friTips', '$satTips', '$sunTips', '$weekly_pay', '$hoursWorked', '$weekDate')";

		$newWeekResult = $GLOBALS['conn']->query($insertNewWeekSQL);

		if ($newWeekResult) {
			//echo 'New week Inserted';
		} else {
			echo 'Error inserting new week: '.$GLOBALS['conn']->connect_error;
		}	
	} else {
		$getWeekSQL = "SELECT uid FROM `work_weeks` WHERE week_id = '$weekID'";	
		$getWeekResult = $GLOBALS['conn']->query($getWeekSQL);
		if ($getWeekResult) {
			$row = $getWeekResult->fetch_assoc();
			if ($userID === $row["uid"]) {
				$updateSQL = "UPDATE work_weeks SET mon = '$monTips', tue = '$tueTips', wed = '$wedTips', thr = '$thrTips', fri = '$friTips', sat = '$satTips', sun = '$sunTips', hours_worked = '$hoursWorked', weekly_pay = '$weekly_pay' WHERE week_id = '$weekID';";
				$updateResult = $GLOBALS['conn']->query($updateSQL);
				if ($updateResult) {
					//echo 'Week updated';
				} else {
					echo 'Error updating work week';
				}
			} else {
				echo "You cannont edit another user's work week";
			}
		} else {
			echo 'Error verifying user';
		}

	}
}


// Get the user's work weeks
$workWeekSQL = "SELECT * FROM work_weeks WHERE uid = '$userID' ORDER BY week_date DESC;";
$weekResult = $GLOBALS['conn']->query($workWeekSQL);
if ($weekResult) {
	$data = array();
	while ($row = $weekResult->fetch_assoc()) {
		$data[] = $row;
	}

	$total = 0.0;
	$workWeeks = count($data);
	foreach ($data as $week) {
		$total += $week['mon'] + $week['tue'] + $week['wed'] + $week['thr'] + $week['fri'] + $week['sat'] + $week['sun'];
	}
	$weeklyAvg = $total / $workWeeks;
} else {
	echo 'Error retrieving work weeks'.$GLOBALS['conn']->connect_error;
}	
?>
<h6>
<?php
	$avg = number_format((float)$weeklyAvg, 2, '.', '');
	
	if (is_nan($avg)) {
		$avg = 0.00;
	}
?>
	Weekly Average Tips: <?php echo '$'.$avg.'<br><br>'; ?>
</h6>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Week Of</th>
			<th scope="col">Monday</th>
			<th scope="col">Tuesday</th>
			<th scope="col">Wednesday</th>
			<th scope="col">Thursday</th>
			<th scope="col">Friday</th>
			<th scope="col">Saturday</th>
			<th scope="col">Sunday</th>
			<th scope="col">Hours Worked</th>
			<th scope="col">Weekly Pay</th>
			<th scope="col">Total Tips</th>	    
		</tr>
	</thead>
	<tbody>
<?php
if ($weekResult) {

	foreach($data as $week) {
		$total = $week['mon'] + $week['tue'] + $week['wed'] + $week['thr'] + $week['fri'] + $week['sat'] + $week['sun'];
		echo "<tr id=row".$week['week_id']." data-toggle=\"modal\" data-target=\"#editWeekModal\" onclick=\"rowClicked(row".$week['week_id'].");\">".PHP_EOL;
		echo '<td id="week_date">'.$week['week_date'].'</td>'.PHP_EOL;
		echo '<td id="mon">'.$week['mon'].'</td>'.PHP_EOL;
		echo '<td id="tue">'.$week['tue'].'</td>'.PHP_EOL;
		echo '<td id="wed">'.$week['wed'].'</td>'.PHP_EOL;
		echo '<td id="thr">'.$week['thr'].'</td>'.PHP_EOL;
		echo '<td id="fri">'.$week['fri'].'</td>'.PHP_EOL;
		echo '<td id="sat">'.$week['sat'].'</td>'.PHP_EOL;
		echo '<td id="sun">'.$week['sun'].'</td>'.PHP_EOL;
		echo '<td id="hoursWorked">'.$week['hours_worked'].'</td>'.PHP_EOL;
		echo '<td id="weeklyPay">'.$week['weekly_pay'].'</td>'.PHP_EOL;
		echo '<td id="total">'.$total.'</td>'.PHP_EOL;
		echo '</tr>'.PHP_EOL;
	}	
}

?>
	</tbody>
</table>
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
    </div>
  </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editWeekModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">Edit Week</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	</button>
      </div>
      <div class="modal-body">
<?php include "editWeekForm.php"; ?>
      </div> 
    </div>
  </div>
</div>
