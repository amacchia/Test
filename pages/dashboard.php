<div class="container">
<?php
	if (isset($_SESSION["currUserID"])) {
		$userID = $_SESSION["currUserID"];
		echo 'User ID: '.$userID;
	}

?>




</div>


<!-- Modal -->
<div class="modal fade" id="newWeekModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	</button>
      </div>
      <div class="modal-body">
        <h6> Enter work week info here </h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
