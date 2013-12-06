<!DOCTYPE HTML>
<html>
	<head>
		<title>Limbo - Change Admin Username </title>
    
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
        <a href="admin-1.php">Admin Options</a> > Change Admin Username
      </p>
    </div>
    
    <h1>Change Admin Username</h1>
    
    <?php
      #connect to limbo_db
      require( '/includes/connect_limbo_db.php' ) ;
      require( '/includes/helpers.php' ) ;
      require( '/includes/update_tools.php' ) ;
      
      show_admins($dbc);
      
      if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (!valid_number($id)) {
          echo '<p style="color:red; font-size: 16px;">Please enter the valid ID.</p>';
        }
        else if (!valid_name($username) || !valid_name($password)) {
          echo '<p style="color:red; font-size: 16px;">Please enter the valid username and password.</p>';
        }
        else {
          update_username($dbc, $id, $username, $password);
          load('admin-1.php?updatedadmin=true');
        }
      }
      
      mysqli_close($dbc);
    ?>
    
    <p>Please enter the user's ID, the new username, and the user's password to change the username.</p>
    
    <!-- Form for updating an item -->
    <form action="updateadminusername.php" method="POST" name="username_update_form">
      <table>
        <tr>
          <td>ID:</td>
          <td><input name="id" type="text" /></td>
        </tr>
        <tr>
          <td>New Username:</td>
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