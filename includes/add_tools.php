<?php
/*
This file contains PHP helper functions.
Orginally created by Ron Coleman.
History:
Who	Date		Comment
RC	 3-Oct-13	Created.
RC	30-Oct-13	Added show_record and show_link_records.
WY  14-Nov-13 Modified for Limbo. Added a link in item's description.
WY   6-Dec-13 Tweaked for adding items and admins.
*/

# Set this flag to false to disable debug diagnostics.
$debug = true;

# Shows the record before confirming deletion.
function insert_record($dbc, $description, $location, $room, $status, $owner, $finder) {
  # Create a query to insert an item using the parameters above.
	$query  = 'INSERT INTO stuff (location_id, description, create_date, update_date, room, owner, finder, item_status) ';
  $query .= 'VALUES (\'' . $location . '\', \'' . $description . '\', Now(), Now(), \'' . $room . '\', ';
  $query .= '\'' . $owner . '\', \'' . $finder . '\', \'' . $status . '\')';

	# Execute the query
	$results = mysqli_query($dbc, $query) ;
}

function insert_admin($dbc, $username, $password) {
  # Create a query to insert an admin using the parameters above.
	$query  = 'INSERT INTO users (username, password, reg_date) ';
  $query .= 'VALUES (\'' . $username . '\', \'' . $password . '\', Now())';

	# Execute the query
	$results = mysqli_query($dbc, $query) ;
}
?>