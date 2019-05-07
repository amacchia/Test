<form id="workWeekForm" action="./index.php?page=dashboard" method="post">
	<div class="form-group">
		<!--Monday -->
		<div class="row">
			<div class="col">
				<label for="monTips">Monday</label>
			</div>

			<div class="col">
				<input id="monTips" name="monTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<div class="form-group">
		<!--Tuesday-->
		<div class="row">
			<div class="col">
				<label for="tueTips">Tuesday</label>
			</div>

			<div class="col">
				<input id="tueTips" name="tueTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<!--Wednesday-->	
	<div class="form-group">
		<div class="row">
			<div class="col">
				<label for="wedTips">Wednesday</label>
			</div>

			<div class="col">
				<input id="wedTips" name="wedTips" class="form-control" type="number" step=".01"/>

			</div>
		</div>
	</div>

	<!--Thursday -->
	<div class="form-group">
		<div class="row">
			<div class="col">
				<label for="thrTips">Thursday</label>
			</div>

			<div class="col">
				<input id="thrTips" name="thrTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<!--Friday -->
	<div class="form-group">
		<div class="row">
			<div class="col">
				<label for="friTips">Friday</label>
			</div>

			<div class="col">
				<input id="friTips" name="friTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<!--Saturday -->

	<div class="form-group">
		<div class="row">
			<div class="col">
				<label for="satTips">Saturday</label>
			</div>
	
			<div class="col">
				<input id="satTips" name="satTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<!--Sunday -->
	<div class="form-group">
		<div class="row">
			<div class="col">
				<label for="sunTips">Sunday</label>
			</div>

			<div class="col">
				<input id="sunTips" name="sunTips" class="form-control" type="number" step=".01"/>
			</div>
		</div>
	</div>	

	<!-- Hours Worked -->
	<div class = "form-group">
		<div class="row">
			<div class="col">
				<label for="hours_worked">Hours Worked</label>
			</div>
			
			<div class="col">
				<input id="hours_worked" class="form-control" name="hours_worked" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<!-- Weekly Pay -->
	<div class = "form-group">
		<div class="row">
			<div class="col">
				<label for="weeklyPay">Weekly Pay</label>
			</div>
			
			<div class="col">
				<input id="weekly_pay" class="form-control" name="weekly_pay" type="number" step=".01"/>
			</div>
		</div>
	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<input form="workWeekForm" type="submit" class="btn btn-primary">
	</div>

</form>
