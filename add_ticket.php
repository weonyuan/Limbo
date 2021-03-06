<!DOCTYPE HTML>
<html>
	<head>
		<title>Limbo - Add Ticket</title>
	</head>
	
	<body>
    <!-- Navigation Bar -->
    <div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
    </div>
    
    <!-- Breadcrumbing -->
    <div>
      <p>
        <a href="limbo.php">Home</a> > 
        <a href="admin.php">Admin Login</a> > 
        <a href="admin-1.php">Admin Options</a> > Add ticket
      </p>
    </div>
    
    <h1>Add Ticket</h1>
    
    <?php
      #connect to limbo_db
      require( '/includes/connect_limbo_db.php' ) ;
      require( '/includes/helpers.php' ) ;
      require( '/includes/add_tools.php' ) ;
      
      if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        $description = $_POST['description'];
        $location = $_POST['location'];
        $room = $_POST['room'];
        $status = $_POST['status'];
        $owner = $_POST['owner'];
        $finder = $_POST['finder'];
        
        if (!valid_name($description)) {
          echo '<p style="color:red; font-size: 16px;">Please enter a valid description!</p>';
        }
        else if (!valid_number($location)) {
          echo '<p style="color:red; font-size: 16px;">Please enter a location!</p>';
        }
        else if (!valid_name($room)) {
          echo '<p style="color:red; font-size: 16px;">Please enter the location\'s area or room number!</p>';
        }
        else if (!valid_name($status)) {
          echo '<p style="color:red; font-size: 16px;">Please select the item\'s status!</p>';
        }
        else if (!valid_name($owner) && !valid_name($finder)) {
          echo '<p style="color:red; font-size: 16px;">Please enter the owner/finder name!</p>';
        }
        else {
          insert_record($dbc, $description, $location, $room, $status, $owner, $finder);
          load('admin-1.php?added=true');
        }
      }
      
      mysqli_close($dbc);
    ?>
    
    <p>Please enter the fields below.</p>
    
    <!-- Creates form to add new item to limbo_db -->
    <form action="add_ticket.php" method="POST" name="add_ticket_form">
      <table>
        <tr>
          <td>Description:</td>
          <td><input name="description" type="text" /></td>
        </tr>
        <tr>
          <td>Location:</td>
          <td>
            <select name="location">
              <option>Select a Location</option>
              <option value="1">Byrne House</option>
              <option value="3">Champagnat Hall</option>
              <option value="5">Cornell Boathouse</option>
              <option value="6">Donnelly Hall</option>
              <option value="7">Dyson Center</option>
              <option value="8">Fern Tor</option>
              <option value="9">Fontaine Hall</option>
              <option value="26">Foy Townhouses</option>
              <option value="29">Fulton Street Townhouses</option>
              <option value="10">Gartland Apartments</option>
              <option value="11">Greystone Hall</option>
              <option value="31">Hancock Center</option>
              <option value="2">James A. Cannavino Library</option>
              <option value="12">Kieran Gatehouse</option>
              <option value="13">Kirk House</option>
              <option value="14">Leo Hall</option>
              <option value="15">Longview Park</option>
              <option value="16">Lowell Thomas Communications</option>
              <option value="30">Lower Fulton Townhouses</option>
              <option value="17">Lower New Townhouses</option>
              <option value="27">Lower West Cedar Townhouses</option>
              <option value="18">Marist Boathouse</option>
              <option value="19">McCann Recreational Center</option>
              <option value="20">Midrise Hall</option>
              <option value="4">Our Lady Seat Of Wisdom Chapel</option>
              <option value="23">Sheahan Hall</option>
              <option value="21">St. Ann's Hermitage</option>
              <option value="22">St. Peter's</option>
              <option value="24">Steel Plant Studios and Gallery</option>
              <option value="25">Student Center</option>
              <option value="28">Upper West Cedar Townhouses</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Room:</td>
          <td><input name="room" type="text" /></td>
        </tr>
        <tr>
          <td>Status:</td>
          <td>
            <select name="status">
              <option>Select a Status</option>
              <option value="lost">Lost</option>
              <option value="found">Found</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Owner (for "Lost" items):</td>
          <td><input name="owner" type="text" /></td>
        </tr>
        <tr>
          <td>Finder (for "Found" items):</td>
          <td><input name="finder" type="text" /></td>
        </tr>
      </table>
      <!-- Submit and Reset button -->
      <input type="submit" name="submit" id="submit" value="Submit" />
      <input type="reset" name="reset" id="reset" value="Reset" />
    </form>
	</body>
</html>