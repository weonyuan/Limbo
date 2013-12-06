<html>
	<head>
		<title>Limbo - Change Admin Password </title>
    
    <style>
      td, th {
        padding: 5px;
      }
    </style>
	</head>
	
  <body>
    <div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
    </div>
    
    <div>
      <p>
        <a href="limbo.php">Home</a>  > 
        <a href="admin.php">Admin Login</a> > 
        <a href="admin-1.php">Admin Options</a> > Change Admin Password
      </p>
    </div>
    
    <h1>Change Admin Password</h1>
    
    <?php
      #connect to limbo_db
      require( '/includes/connect_limbo_db.php' ) ;
      require( '/includes/helpers.php' ) ;
      require( '/includes/update_tools.php' ) ;
      
      show_admins($dbc);
      
      if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (!valid_name($username) || !valid_name($password)) {
          echo '<p style="color:red; font-size: 16px;">Please enter a valid username and password.</p>';
        }
        else {
          update_password($dbc, $username, $password);
          load('admin-1.php?updatedadmin=true');
        }
      }
      
      mysqli_close($dbc);
    ?>
    
    <p>Please enter the username and password, in order to change the admin's password.</p>
    
    <!-- Form for updating an item -->
    <form action="updateadminpassword.php" method="POST" name="password_update_form">
      <table>
        <tr>
          <td>Username:</td>
          <td><input name="username" type="text" /></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input name="password" type="password" /></td>
        </tr>
      </table>
      
      <!-- Submit and reset buttons -->
      <input type="submit" name="submit" id="submit" value="Submit" />
      <input type="reset" name="reset" id="reset" value="Reset" />
    </form>
	</body>
</html>