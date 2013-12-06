<?php
  # Connect to MySQL server and the database
  require('/includes/connect_limbo_db.php');
  require('/includes/update_tools.php');
  
  if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    update_record($dbc, $id, $room, $owner, $finder, $item_status);
    load('admin-1.php?updated=true');
  }
  else {
    load('admin-1.php');
  }
  
  mysqli_close( $dbc ) ;
?>