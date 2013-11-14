<!--
This PHP script front-ends linkypresidents.php with a login page.
Originally created By Ron Coleman.
Revision history:
Who	Date		Comment
RC  07-Nov-13   Created.
JE	07-Nov-13   Modified File for Presidents table.
-->
<!DOCTYPE html>
<html>
<div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
</div>
<div>
<p><a href="limbo.php"> Home</a>  >  Admin Login</p>
</div>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_limbo_db.php' ) ;

# Connect to MySQL server and the database
require( 'includes/admin_login_tools.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

	$name = $_POST['username'] ;

    $pid = validate($name) ;

    if($pid == -1)
      echo '<P style=color:red>Login failed please try again.</P>' ;

    else
      load('admin-1.php', $pid);
}
?>
<!-- Get inputs from the user. -->
<h1>Admin Login</h1>
<form action="admin.php" method="POST">
<table>
<tr>
<td>Username:</td><td><input type="text" name="username"></td>
</tr>
<tr>
<td>Password:</td><td><input type="text" name="password"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>