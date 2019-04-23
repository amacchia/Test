<nav id="header" class="navbar navbar-dark" id="header">
  <a class="navbar-brand">TipTracker</a>
  <div class="nav-actions justify-content-end">
  <?php
    if (isset($_GET["page"])) {
        $pg = $_GET["page"];

        if ($pg === 'dashboard') {
            //echo '<a href="#"  class="btn btn-secondary btn-lg active" role="button">Create New Work Week</a> &nbsp;';
	    echo '<button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#newWeekModal">Create New Work Week</button> &nbsp;';
	    echo '<a href="./index1.php?page=login" class="btn btn-secondary btn-lg" role="button">Sign-Out</a>';
        }
    }
  ?>
  </div>
</nav>
