<!DOCTYPE HTML>
<html>
	<head>
		<title>Limbo - Delete Admin</title>
    
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
        <a href="admin-1.php">Admin Options</a> > Delete Admin
      </p>
    </div>
    
    <h1>Delete Admin</h1>
    
    <?php
      #connect to limbo_db
      require( '/includes/connect_limbo_db.php' ) ;
      require( '/includes/helpers.php' ) ;
      require( '/includes/delete_tools.php' ) ;
      
      show_admins($dbc);
      
      if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        $username = $_POST['username'];
        $id = $_POST['id'];
        
        if (!valid_name($username) || !valid_number($id)) {
          echo '<p style="color:red; font-size: 16px;">Please enter a valid username and ID.</p>';
        }
        else {
          delete_admin($dbc, $username, $id);
          load('admin-1.php?deletedadmin=true');
        }
      }
      
      mysqli_close($dbc);
    ?>
    
    <p>Please enter the admin's username and ID you wish to delete.</p>
    
    <form action="deleteadmin.php" method="POST" name="add_admin_form">
      <table>
        <tr>
          <td>ID:</td>
          <td><input name="id" type="text" /></td>
        </tr>
        <tr>
          <td>Username:</td>
          <td><input name="username" type="text" /></td>
        </tr>
      </table>
	  
      <!-- Submit and Reset button -->
      <input type="submit" name="submit" id="submit" value="Submit" />
      <input type="reset" name="reset" id="reset" value="Reset" />
    </form>  
	</body>
</html>