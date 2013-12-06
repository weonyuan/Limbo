<?php
  # Connect to MySQL server and the database
  require('/includes/connect_limbo_db.php');
  require('/includes/helpers.php');
  require('/includes/update_tools.php');
  
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