<!DOCTYPE HTML>
<html>
  <head>
    <title>Limbo - Change Admin Username Process</title>
  </head>
  
  <!-- Navigation Bar -->
  <body>
    <div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
    </div>
	
	<!-- Breadcrumbing -->
    <p>
      <a href="limbo.php"> Home</a> > 
      <a href="admin.php">Admin Login</a> > 
      <a href="admin-1.php">Admin Options</a> > 
      <a href="form_update.php">Change Admin Password</a> > Username Changed </p>
	
			<?php
        #connect to limbo
        define('DB_NAME', 'limbo_db');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');
        define('DB_HOST', 'localhost');

        $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

        #error check
        if (!$link) {
          die('Could not connect: ' . mysql_error());
        }

        #select database
        $db_selected = mysql_select_db(DB_NAME, $link);

        if (!$db_selected) {
          die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
        }

        #create variables for form
		$id = $_GET['id'];
        $username = $_GET['username'];
        $password = $_GET['password'];

        #update data in table
        $sql = "UPDATE users SET username = '$username' WHERE id = $id AND password = '$password'";

        mysql_query($sql, $link);

        #error check
        if (!mysql_query($sql)) {
          die('Error: ' . mysql_error());
        }
        echo '<h1>Username Successfully Changed</h1>';	
        mysql_close();
			?>
	</body>
</html>