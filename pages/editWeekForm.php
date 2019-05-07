<form id="editWeekForm" action="./index.php?page=dashboard" method="post">
	<div class="form-group">
		<!--Monday -->
		<div class="row">
			<div class="col">
				<label for="editMonTips">Monday</label>
			</div>

			<div class="col">
				<input id="editMonTips" name="monTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<div class="form-group">
		<!--Tuesday-->
		<div class="row">
			<div class="col">
				<label for="editTueTips">Tuesday</label>
			</div>

			<div class="col">
				<input id="editTueTips" name="tueTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<!--Wednesday-->	
	<div class="form-group">
		<div class="row">
			<div class="col">
				<label for="editWedTips">Wednesday</label>
			</div>

			<div class="col">
				<input id="editWedTips" name="wedTips" class="form-control" type="number" step=".01"/>

			</div>
		</div>
	</div>

	<!--Thursday -->
	<div class="form-group">
		<div class="row">
			<div class="col">
				<label for="editThrTips">Thursday</label>
			</div>

			<div class="col">
				<input id="editThrTips" name="thrTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<!--Friday -->
	<div class="form-group">
		<div class="row">
			<div class="col">
				<label for="editFriTips">Friday</label>
			</div>

			<div class="col">
				<input id="editFriTips" name="friTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<!--Saturday -->
	<div class="form-group">
		<div class="row">
			<div class="col">
				<label for="editSatTips">Saturday</label>
			</div>
	
			<div class="col">
				<input id="editSatTips" name="satTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<!--Sunday -->
	<div class="form-group">
		<div class="row">
			<div class="col">
				<label for="editSunTips">Sunday</label>
			</div>

			<div class="col">
				<input id="editSunTips" name="sunTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>	

	<!-- Hours Worked -->
	<div class = "form-group">
		<div class="row">
			<div class="col">
				<label for="eidtHoursWorked">Hours Worked</label>
			</div>
			
			<div class="col">
				<input id="editHoursWorked" class="form-control" name="hours_worked" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<!-- Weekly Pay -->
	<div class = "form-group">
		<div class="row">
			<div class="col">
				<label for="editWeeklyPay">Weekly Pay</label>
			</div>
			
			<div class="col">
				<input id="editWeeklyPay" class="form-control" name="weekly_pay" type="number" step=".01"/>
			</div>
		</div>
	</div>


	<input id="editWeekID" id="week_id" name="week_id" hidden>

	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<input form="editWeekForm" type="submit" class="btn btn-primary">
	</div>


</form>
