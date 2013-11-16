<html>
	<head>
		<title> Add Ticket </title>
	</head>
	<div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
	</div>
	
	<div>
	<p><a href="limbo.php"> Home</a>  > <a href="admin.php"> Admin Login</a> > <a href="admin-1.php"> Admin Options</a> > Add ticket</p>
	</div>
	<h1>Limbo - Add Ticket</h1>
	<body>
	
	<?php
	//connect to limbo_db
	require( '/includes/connect_limbo_db.php' ) ;
	?>
	
	<form action="form_process.php" method="post" name="add_ticket_form">
		<p>
		Description:
		<input name="description" type="text" />
		</p>
		
		<p>
		Room:
		<input name="room" type="text" />
		</p>
		
		<p>
		Room:
		<select name="location">
			<option value="1">Byrne House</option>
			<option value="2">James A. Cannavino Library</option>
			<option value="3">Champagnat Hall</option>
			<option value="4">Our Lady Seat Of Wisdom Chapel</option>
			<option value="5">Cornell Boathouse</option>
			<option value="6">Donnelly Hall</option>
			<option value="7">Dyson Center</option>
			<option value="8">Fern Tor</option>
			<option value="9">Fontaine Hall</option>
			<option value="10">Gartland Apartments</option>
			<option value="11">Greystone Hall</option>
			<option value="12">Kieran Gatehouse</option>
			<option value="13">Kirk House</option>
			<option value="14">Leo Hall</option>
			<option value="15">Longview Park</option>
			<option value="16">Lowell Thomas Communcations</option>
			<option value="17">Lower Townhouses</option>
			<option value="18">Marist Boathouse</option>
			<option value="19">McCann Recreational Center</option>
			<option value="20">Midrise Hall</option>
			<option value="21">St. Ann's Hermitage</option>
			<option value="22">St. Peter's</option>
			<option value="23">Sheahan Hall</option>
			<option value="24">Steel Plant Studios and Gallery</option>
			<option value="25">Student</option>
			<option value="26">Foy Townhouses</option>
			<option value="27">Lower West Cedar Townhouses</option>
			<option value="28">Upper West Cedar Townhouses</option>
			<option value="29">Fulton Street Towenhouses</option>
			<option value="30">Lower Fulton Townhouses</option>
			<option value="31">Hancock Center</option>
		</select>
		
		<p>
		Owner (If Applies):
		<input name="owner" type="text" />
		</p>
		
		<p>
		Finder (If Applies):
		<input name="finder" type="text" />
		</p>
		
		<p>
		Item Status:
		<input name="item_status" type="text" />
		</p>
	
	<input type="submit" name="submit" id="submit" value="Submit" />
	<input type="reset" name="reset" id="reset" value="Reset" />
	</form>
	
	<body>
</html>