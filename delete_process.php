<?php
  # Connect to MySQL server and the database
  require('/includes/connect_limbo_db.php');
  require('/includes/helpers.php');
  require('/includes/delete_tools.php');
  
  # If user confirms delete, it will delete the confirmed item and
  # redirect the user back to Admin Options page.
  if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset($_POST['Yes'])) {
    delete_record($dbc, $_POST['id']);
    load('admin-1.php?deleted=true');
  }
  # Otherwise, if user cancels delete, user will be redirected back
  # to Admin Options page.
  else {
    load('admin-1.php');
  }
?>