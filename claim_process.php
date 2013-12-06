<?php
  # Connect to MySQL server and the database
  require('/includes/connect_limbo_db.php');
  require('/includes/helpers.php');
  require('/includes/update_tools.php');
  
  # This will set the item's status to "Claimed", based
  # on the ID it receives, before redirecting user.
  if ($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
    if (isset($_GET['id'])) {
      claim_item($dbc, $_GET['id']);
      load('admin-1.php?updated=true');
    }
    else {
      load('admin-1.php');
    }
  }
?>