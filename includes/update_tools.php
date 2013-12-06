<?php
/*
This file contains functions used for updating data.
Created by Weon Yuan.
History:
Who	Date		Comment
WY   6-Dec-13 Created.
*/

# This will update the record with the given information in the inputted boxes.
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

# This will automatically set the item's status to "Claimed", based on its ID.
function claim_item($dbc, $id) {
  $query  = 'UPDATE stuff SET item_status = \'claimed\', ';
  $query .= 'update_date = Now() ';
  $query .= 'WHERE id = ' . $id;
  
  $results = mysqli_query($dbc,$query);
}

# This will update the user's password with the given information in the inputted boxes.
function update_password($dbc, $username, $password) {
  $query  = 'UPDATE users SET password = \'' . $password . '\' ';
  $query .= 'WHERE username = \'' . $username . '\'';
  
  $results = mysqli_query($dbc,$query);
}

# This will update the username with the given information in the inputted boxes.
function update_username($dbc, $id, $username, $password) {
  $query  = 'UPDATE users SET username = \'' . $username . '\' ';
  $query .= 'WHERE id = ' . $id . ' ';
  $query .= 'AND password = \'' . $password . '\'';
  
  $results = mysqli_query($dbc,$query);
}
?>