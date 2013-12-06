
<?php
/*
This file contains PHP helper functions.
Orginally created by Ron Coleman.
History:
Who	Date		Comment
RC	 3-Oct-13	Created.
RC	30-Oct-13	Added show_record and show_link_records.
WY  14-Nov-13 Modified for Limbo. Added a link in item's description.
*/

# Set this flag to false to disable debug diagnostics.
$debug = true;

# Shows the record's information, based from the ID inputted.
function confirm_update($dbc, $id) {
  # Create a query to get the id, date, status, and description by date descending.
  $stringCreateDate = 'DATE_FORMAT(s.create_date, \'%b. %D%, %Y at %r\') as createDate, ';
  $stringUpdateDate = 'DATE_FORMAT(s.update_date, \'%b. %D%, %Y at %r\') as updateDate';
	$query = 'SELECT s.id, ' . $stringCreateDate . $stringUpdateDate . ', s.item_status, l.name, s.room, s.description ' .
           'FROM stuff s, locations l ' .
           'WHERE s.id = ' . $id . ' AND s.location_id = l.id';

	# Execute the query
	$results = mysqli_query( $dbc , $query );

  # Show results
  if( $results ) {
    # But...wait until we know the query succeeded before
    # rendering the table start.
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      echo '<H2>' . ucfirst($row['description']) . '</H2>';
      echo '<STRONG>Current item\'s information</STRONG>';
      echo '<TABLE border=\"2px solid black\">';
      
      echo '<TR>';
      echo '<TH ALIGN=center>ID</TH>';
      echo '<TD ALIGN=left>' . $row['id'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Item Status</TH>';
      echo '<TD ALIGN=left>' . ucfirst($row['item_status']) . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Reported Date/Time</TH>';
      echo '<TD ALIGN=left>' . $row['createDate'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Last Known Location</TH>';
      echo '<TD ALIGN=left>' . $row['name'] . ' ' . $row['room'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Description</TH>';
      echo '<TD ALIGN=left>' . ucfirst($row['description']) . '</TD>';
      echo '</TR>';
    }

    # End the table
    echo '</TABLE>';
    echo '<BR>';

    # Free up the results in memory
    mysqli_free_result( $results );
  }
  else {
    echo '<P>Invalid item ID.</P>';
    echo '<FORM ACTION="update_ticket.php" METHOD="POST">';
    echo '<INPUT TYPE="submit" NAME="Back" VALUE="Back" />';
    echo '</FORM>';
  }
}

# Shows the record's information, based from the ID inputted.
function show_updated_item($dbc, $id, $description, $location, $room, $owner, $finder) {
  # Create a query to get the id, date, status, and description by date descending.
  $stringCreateDate = 'DATE_FORMAT(s.create_date, \'%b. %D%, %Y at %r\') as createDate, ';
  $stringUpdateDate = 'DATE_FORMAT(s.update_date, \'%b. %D%, %Y at %r\') as updateDate';
	$query = 'SELECT s.id, ' . $stringCreateDate . $stringUpdateDate . ', s.item_status, l.name, s.room, s.description ' .
           'FROM stuff s, locations l ' .
           'WHERE s.id = ' . $id . ' AND s.location_id = l.id';

	# Execute the query
	$results = mysqli_query( $dbc , $query );

  # Show results
  if( $results ) {
    # But...wait until we know the query succeeded before
    # rendering the table start.
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      echo '<STRONG>Updated item\'s information</STRONG>';
      echo '<TABLE border=\"2px solid black\">';
      
      echo '<TR>';
      echo '<TH ALIGN=center>ID</TH>';
      echo '<TD ALIGN=left>' . $row['id'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Item Status</TH>';
      echo '<TD ALIGN=left>' . ucfirst($row['item_status']) . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Reported Date/Time</TH>';
      echo '<TD ALIGN=left>' . $row['createDate'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Last Known Location</TH>';
      echo '<TD ALIGN=left>' . $location . ' ' . $room . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Description</TH>';
      echo '<TD ALIGN=left>' . ucfirst($description) . '</TD>';
      echo '</TR>';
    }

    # End the table
    echo '</TABLE>';
    echo '<BR>';
    
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      echo '<H2>' . ucfirst($row['description']) . '</H2>';
      echo '<STRONG>Current item\'s information</STRONG>';
      echo '<TABLE border=\"2px solid black\">';
      
      echo '<TR>';
      echo '<TH ALIGN=center>ID</TH>';
      echo '<TD ALIGN=left>' . $row['id'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Item Status</TH>';
      echo '<TD ALIGN=left>' . ucfirst($row['item_status']) . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Reported Date/Time</TH>';
      echo '<TD ALIGN=left>' . $row['createDate'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Last Known Location</TH>';
      echo '<TD ALIGN=left>' . $row['name'] . ' ' . $row['room'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Description</TH>';
      echo '<TD ALIGN=left>' . ucfirst($row['description']) . '</TD>';
      echo '</TR>';
    }

    # End the table
    echo '</TABLE>';
    echo '<BR>';

    # Free up the results in memory
    mysqli_free_result( $results );
    
  }
  else {
    echo '<P>Invalid item ID.</P>';
    echo '<FORM ACTION="update_ticket.php" METHOD="POST">';
    echo '<INPUT TYPE="submit" NAME="Back" VALUE="Back" />';
    echo '</FORM>';
  }
}

function update_record($dbc, $description, $location, $room, $owner, $finder, $id) {
  $query  = 'UPDATE stuff SET description = \'' . $description . '\', ';
  $query .= 'location_id = \'' . $location . '\', ';
  $query .= 'update_date = Now(), ';
  $query .= 'room = \'' . $room . '\', ';
  $query .= 'owner = \'' . $owner . '\', ';
  $query .= 'finder = \'' . $finder . '\' ';
  $query .= 'WHERE id = ' . $id;
  
  $results = mysqli_query($dbc,$query);
}

function claim_item($dbc, $id) {
  $query  = 'UPDATE stuff SET item_status = \'claimed\', ';
  $query .= 'update_date = Now() ';
  $query .= 'WHERE id = ' . $id;
  
  $results = mysqli_query($dbc,$query);
}

function update_password($dbc, $username, $password) {
  $query  = 'UPDATE users SET password = \'' . $password . '\' ';
  $query .= 'WHERE username = \'' . $username . '\'';
  
  $results = mysqli_query($dbc,$query);
}

function update_username($dbc, $id, $username, $password) {
  $query  = 'UPDATE users SET username = \'' . $username . '\' ';
  $query .= 'WHERE id = ' . $id . ' ';
  $query .= 'AND password = \'' . $password . '\'';
  
  $results = mysqli_query($dbc,$query);
}
?>