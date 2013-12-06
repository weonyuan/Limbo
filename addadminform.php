<!DOCTYPE HTML>
<html>
	<head>
		<title>Limbo - Add New Admin</title>
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
        <a href="admin-1.php">Admin Options</a> > Add New Admin
      </p>
    </div>
    
    <h1>Add New Admin</h1>
    
    <?php
      #connect to limbo_db
      require( '/includes/connect_limbo_db.php' ) ;
      require( '/includes/helpers.php' ) ;
      require( '/includes/add_tools.php' ) ;
      
      if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (!valid_name($username)) {
          echo '<p style="color:red; font-size: 16px;">Please enter a valid username!</p>';
        }
        else if (!valid_name($password)) {
          echo '<p style="color:red; font-size: 16px;">Please enter a password!</p>';
        }
        else {
          insert_admin($dbc, $username, $password);
          load('admin-1.php?addedadmin=true');
        }
      }
    ?>
    
    <p>Please enter an username and password for the new admin.</p>
    
    <!-- Creates form to add new item to limbo_db -->
    <form action="addadminform.php" method="POST" name="add_admin_form">
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
	  
      <!-- Submit and Reset button -->
      <input type="submit" name="submit" id="submit" value="Submit" />
      <input type="reset" name="reset" id="reset" value="Reset" />
    </form>
	</body>
</html>