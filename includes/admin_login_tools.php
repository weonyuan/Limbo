<!--
This file contains PHP login helper functions.
Orginally created by Ron Coleman.
History:
Who	Date		Comment
RC	 7-Nov-13	Created.
JE	15-Nov-13   Modified File for admin login of Limbo.
-->
<?php
# Includes these helper functions
require( 'includes/helpers.php' ) ;

# Validates the username and password.
# Returns -1 if validate fails, and >= 0 if it succeeds
# which is the primary key id.
function validate($username = '', $password ='') {
  global $dbc;

  if(empty($username))
    return -1 ;

  # Make the query
  $query = "SELECT id, username FROM users WHERE username='" . $username . "'" ;
  show_query($query) ;

  # Execute the query
  $results = mysqli_query( $dbc, $query ) ;
  check_results($results);

  # If we get no rows, the loging
  if (mysqli_num_rows( $results ) == 0 )
    return -1 ;

  # We have at least one row, so get the frist one and return it
  $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

  $pid = $row [ 'id' ] ;

  return intval($pid) ;
}
?>