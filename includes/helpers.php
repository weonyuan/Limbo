<?php
/*
This file contains PHP helper functions.
Orginally created by Ron Coleman.
History:
Who	Date		Comment
RC	 3-Oct-13	Created.
RC	30-Oct-13	Added show_record and show_link_records.
WY  14-Nov-13 Modified for Limbo. Added a link in item's description.
JE   6-Dec-13 Added init and populate_db functions.
*/

# Set this flag to false to disable debug diagnostics.
$debug = false;

# Initializes the database
function init() {
    # The dabase we connect to
    $DB_NAME = 'limbo_db';

    # Connect to the database, create it if necessary
    $dbc = connect_db($DB_NAME);

    # Populate the database
    populate_db($dbc);

    return $dbc;
}

# Populates the database
function populate_db($dbc) {
    # Create prints table, if it doesnt exist
    $query  = 'CREATE TABLE IF NOT EXISTS users (';
    $query .= '  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ';
    $query .= '  username VARCHAR(60) NOT NULL,';
    $query .= '  password VARCHAR(40) NOT NULL,';
    $query .= '  reg_date DATETIME    NOT NULL';
    $query .= ')';
    
    $results = mysqli_query($dbc,$query);
    check_results( $results );
    
    $query  = 'CREATE TABLE IF NOT EXISTS stuff (';
    $query .= '  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ';
    $query .= '  location_id VARCHAR(60) NOT NULL,';
    $query .= '  description VARCHAR(60) NOT NULL,';
    $query .= '  create_date DATETIME    NOT NULL,';
    $query .= '  update_date DATETIME    NOT NULL,';
    $query .= '  room        TEXT,';
    $query .= '  owner       TEXT,';
    $query .= '  finder      TEXT,';
    $query .= '  item_status SET ("found", "lost", "claimed") NOT NULL';
    $query .= ')';
    
    $results = mysqli_query($dbc,$query);
    check_results( $results );
    
    $query  = 'CREATE TABLE IF NOT EXISTS locations (';
    $query .= '  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ';
    $query .= '  create_date DATETIME    NOT NULL,';
    $query .= '  update_date DATETIME    NOT NULL,';
    $query .= '  name        TEXT        NOT NULL';
    $query .= ')';

    $results = mysqli_query($dbc,$query);
    check_results( $results );

    # Check if table is already populated
    $query = 'SELECT COUNT(*) FROM stuff';

    $results = mysqli_query($dbc,$query);
    check_results( $results );

    if($results) {
        $row = mysqli_fetch_array($results, MYSQLI_NUM);

        if($row[0] > 0)
            return;
    }

    # If we get here, populate the users table
    $query = 'INSERT INTO users(username, password, reg_date) VALUES ("admin", "gaze11e", Now())';
	
	$results = mysqli_query($dbc,$query);
  check_results( $results );
	
	
	#Populate the Locations table
  $query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Byrne House")';
 
  $results = mysqli_query($dbc,$query);
  check_results( $results );

  $query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "James A. Cannavino Library")';
    
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Champagnat Hall")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "James A. Cannavino Library")';

	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Our Lady Seat of Wisdom Chapel")';

	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Cornell Boathouse")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Donnelly Hall")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Dyson Center")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Fern Tor")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Fontaine Hall")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );	
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Gartland Apartments")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Greystone Hall")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Kieran Gatehouse")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Kirk House")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Leo Hall")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Longview Park")';

	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Lowell Thomas Communications Center")';

	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Lower Townhouses")';

	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Marist Boathouse")';

	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "McCann Recreational Center")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Midrise Hall")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "St. Anns Hermitage")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "St. Peters")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Sheahan Hall")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Steel Plant Studios and Gallery")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Student Center")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Foy Townhouses")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Lower West Cedar Townhouses")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Upper West Cedar Townhouses")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Fulton Street Townhouses")';

	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Lower Fulton Townhouses")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO locations(create_date, update_date, name) VALUES (Now(), Now(), "Hancock Center")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	#Populate the Stuff table
    $query = 'INSERT INTO stuff(location_id, description, create_date, update_date, room, owner, finder, item_status)  VALUES (18, "Red Marist Crew backpack", "2012-12-04 12:43:32", "2012-12-10 15:24:16", "Downstairs", "Jack Daniels", "John Doe", "claimed")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO stuff(location_id, description, create_date, update_date, room, owner, finder, item_status)  VALUES (32, "4th Generation Silver iPad", "2013-09-12 09:23:12", "2013-11-03 14:54:34", "2020", "Joe Smith", "", "lost")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO stuff(location_id, description, create_date, update_date, room, owner, finder, item_status)  VALUES (9, "Red Marist planner", "2013-10-24 11:23:18", "2013-10-31 18:21:48", "105", "Sally White", "", "lost")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO stuff(location_id, description, create_date, update_date, room, owner, finder, item_status)  VALUES (14, "Mail and Room Key on a red Marist lanyard", "2013-04-16 017:20:41", "2013-04-20 20:14:44", "2nd Floor Hallway", "", "Kaitlyn Jobe", "found")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO stuff(location_id, description, create_date, update_date, room, owner, finder, item_status)  VALUES (16, "Brown leather wallet", "2013-10-08 08:39:11", "2013-10-10 16:34:19", "020", "", "Weon Yuan", "found")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
	
	$query = 'INSERT INTO stuff(location_id, description, create_date, update_date, room, owner, finder, item_status)  VALUES (23, "Macbook Pro with green sleeve", "2013-01-27 09:54:12", "2013-01-30 12:16:59", "Lounge", "", "Miles Welsh", "found")';
	
	$results = mysqli_query($dbc,$query);
    check_results( $results );
}

# Connects to the database and creates one, if necessary.
function connect_db ($dbname) {
    # Connect to the database, if we fail assume the DB doesnt exist
    $dbc = @mysqli_connect ( 'localhost', 'root', '', $dbname );

    if($dbc) {
        mysqli_set_charset( $dbc, 'utf8' );
        return $dbc;
    }

    # Create the database
    $dbc = @mysqli_connect ( 'localhost', 'root', '', '' );

    $query = 'CREATE DATABASE limbo_db';
    #show_query( $query );

    $results = mysqli_query($dbc, $query);
    check_results($results);

    # Close connection since we dont need it
    mysqli_close( $dbc );

    # Connect to the (newly created) database
    $dbc = @mysqli_connect ( 'localhost', 'root', '', $dbname )
        OR die ( mysqli_connect_error() );

    # Set encoding to match PHP script encoding.
    mysqli_set_charset( $dbc, 'utf8' );

    return $dbc;
}

# Shows the records in stuff
function show_link_records($dbc, $item, $reportedDate, $status) {
  $item = ' \'%' . $item . '%\' ';
  $stringDate = 'DATE_FORMAT(update_date, \'%b. %D%, %Y at %r\') as date';
  $reportedDate = 'DATE_SUB(Now(), INTERVAL ' . $reportedDate . ' DAY) ';
  $status = '\'' . $status . '\'';
  
  # Create a query to get the id, date, status, and description by date descending.
	$query = 'SELECT id, ' . $stringDate . ', item_status, description FROM stuff ' .
           'WHERE description LIKE' . $item . 'AND item_status = ' . $status .
           'AND update_date BETWEEN ' . $reportedDate . 'AND Now() ' .
           'ORDER BY update_date DESC';

	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
  
  # This will count the number of results in the table.
  $rowCount = mysqli_num_rows($results);
  
  if($rowCount > 0) {
    # Show results
    if( $results ) {
      # But...wait until we know the query succeeded before
      # rendering the table start.
      echo '<BR>';
      echo '<TABLE border=\"2px solid black\">';
      echo '<TR>';
      echo '<TH>ID</TH>';
      echo '<TH>Update Date</TH>';
      echo '<TH>Item Status</TH>';
      echo '<TH>Description</TH>';
      echo '</TR>';

      # For each row result, generate a table row
      while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
        $alink = '<A HREF=stuff.php?id=' . $row['id'] . '>' .
                 $row['id'] . '</A>';
        $alinkDesc = '<A HREF=stuff.php?id=' . $row['id'] . '>' .
                 ucfirst($row['description']) . '</A>';
        echo '<TR>';
        echo '<TD ALIGN=right>' . $alink . '</TD>';
        echo '<TD ALIGN=left>' . $row['date'] . '</TD>';
        echo '<TD ALIGN=left>' . ucfirst($row['item_status']) . '</TD>';
        echo '<TD ALIGN=left>' . $alinkDesc . '</TD>';
        echo '</TR>';
      }

      # End the table
      echo '</TABLE>';

      # Free up the results in memory
      mysqli_free_result( $results );
    }
  }
  else {
    echo '<P>No results found.</P>';
  }
}

# Shows the selected record in quick link.
function show_record($dbc, $id) {
  # Create a query to get the id, date, status, and description by date descending.
  $stringDate = 'DATE_FORMAT(update_date, \'%b. %D%, %Y at %r\') as date';
	$query = 'SELECT id, ' . $stringDate . ', item_status, description FROM stuff ' .
           'WHERE id=' . $id;

	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
  
  # This will count the number of results in the table.
  $rowCount = mysqli_num_rows($results);

  # Show results
  if( $results ) {
    # But...wait until we know the query succeeded before
    # rendering the table start.
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      echo '<P>';
      echo '<A HREF=limbo.php>Limbo</A> > ';
      echo '<A HREF=' . $row['item_status'] . '.php>' .
            ucfirst($row['item_status']) . ' something</A> > ';
      echo ucfirst($row['description']);
      
      echo '<H1>' . ucfirst($row['description']) . '</H1>';
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
      echo '<TH ALIGN=center>Update Date/Time</TH>';
      echo '<TD ALIGN=left>' . $row['date'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Description</TH>';
      echo '<TD ALIGN=left>' . ucfirst($row['description']) . '</TD>';
      echo '</TR>';
    }

    # End the table
    echo '</TABLE>';
    
    echo '<P><A HREF=stuff.php?id=' . $row['id'] . '&full=true>' .
         'Click here for full description</A></P>';
    
    # Free up the results in memory
    mysqli_free_result( $results );
  }
}

# Shows the selected record in complete info.
function show_full_record($dbc, $id) {
  # Create a query to get the id, date, status, and description by date descending.
  $stringCreateDate = 'DATE_FORMAT(s.create_date, \'%b. %D%, %Y at %r\') as createDate, ';
  $stringUpdateDate = 'DATE_FORMAT(s.update_date, \'%b. %D%, %Y at %r\') as updateDate';
	$query = 'SELECT s.id, ' . $stringCreateDate . $stringUpdateDate . ', s.item_status, l.name, s.room, s.owner, s.finder, s.description ' .
           'FROM stuff s, locations l ' .
           'WHERE s.id = ' . $id . ' AND s.location_id = l.id';

	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);

  # Show results
  if( $results ) {
    # But...wait until we know the query succeeded before
    # rendering the table start.
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      echo '<P>';
      echo '<A HREF=limbo.php>Limbo</A> > ';
      echo '<A HREF=' . $row['item_status'] . '.php>' .
            ucfirst($row['item_status']) . ' something</A> > ';
      echo ucfirst($row['description']);
      
      echo '<H1>' . ucfirst($row['description']) . '</H1>';
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
      echo '<TH ALIGN=center>Update Date/Time</TH>';
      echo '<TD ALIGN=left>' . $row['updateDate'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Last Known Location</TH>';
      echo '<TD ALIGN=left>' . $row['name'] . ' ' . $row['room'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Owner</TH>';
      echo '<TD ALIGN=left>' . $row['owner'] . '</TD>';
      echo '</TR>';
      
      echo '<TR>';
      echo '<TH ALIGN=center>Finder</TH>';
      echo '<TD ALIGN=left>' . $row['finder'] . '</TD>';
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
}

# Displays the admins through a table.
function show_admins($dbc) {
  $stringRegDate = 'DATE_FORMAT(reg_date, \'%b. %D%, %Y at %r\') as regDate';
  
  # Create a query to get the id, update date, item status, description sorted by update date
  $query = 'SELECT id, ' . $stringRegDate . ', username ' .
           'FROM users ORDER BY id DESC';
  
  # Execute the query
  $results = mysqli_query( $dbc , $query );
  
  # This will count the number of results in the table.
  $rowCount = mysqli_num_rows($results);
  
  if($rowCount > 0) {
    # Show results
    if( $results ) {
      # But...wait until we know the query succeeded before
      # starting the table.
      echo '<TABLE border=\"2px solid black\">';
      echo '<TR>';
      echo '<TH>ID</TH>';
      echo '<TH>Registered Date</TH>';
      echo '<TH>Username</TH>';
      echo '</TR>';

      # For each row result, generate a table row
      while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
        echo '<TR>';
        echo '<TD ALIGN=right>' . $row['id'] . '</TD>';
        echo '<TD ALIGN=left>' . $row['regDate'] . '</TD>';
        echo '<TD ALIGN=left>' . $row['username'] . '</TD>';
        echo '</TR>';
      }

      # End the table
      echo '</TABLE>';

      # Free up the results in memory
      mysqli_free_result( $results );
    }
    else {
      # If we get here, something has gone wrong
      echo '<p>' . mysqli_error( $dbc ) . '</p>' ;
    }
  }
  else {
    echo '<P>No results found.</P>';
  }
}

# Displays the title on top of the browser.
function show_title($dbc, $id) {
  # Create a query to get the id, date, status, and description by date descending.
	$query = 'SELECT id, description FROM stuff WHERE id=' . $id;

	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);

  # Show results
  if( $results ) {
    # But...wait until we know the query succeeded before
    # rendering the table start.
    if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
      echo '<TITLE>Limbo - ' . ucfirst($row['description']) . '</TITLE>';
    }
  }
  
  # Free up the results in memory
  mysqli_free_result( $results );
}

# Validates the item's number
function valid_number($number) {
  if (empty($number) || !is_numeric($number)) {
    return false;
  } else {
      $number = intval($number);
      if ($number <= 0) {
         return false;
      }
  }
  return true;
}

# Validates the item's name
function valid_name($name) {
  if (empty($name)) {
    return false;
  } else {
      return true;
  }
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug) {
    echo "<p>Query = $query</p>";
  }
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true) {
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>' ;
  }
}

# Loads a specified or default URL.
function load( $page = 'admin-1.php' ) {
  # Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] );

  # Remove trailing slashes then append page name to URL.
  $url = rtrim( $url, '/\\' );
  $url .= '/' . $page;

  # Execute redirect then quit.
  session_start( );

  header( "Location: $url" );

  exit();
}
?>