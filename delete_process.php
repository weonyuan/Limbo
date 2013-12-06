<?php
  # Connect to MySQL server and the database
  require('/includes/connect_limbo_db.php');
  require('/includes/helpers.php');
  require('/includes/delete_tools.php');
  
  if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset($_POST['Yes'])) {
    delete_record($dbc, $_POST['id']);
    load('admin-1.php?deleted=true');
  }
  else {
    load('admin-1.php');
  }
?>