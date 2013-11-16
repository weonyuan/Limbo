<!DOCTYPE HTML>
<html>
  <head>
    <?php
      # Connect to MySQL server and the database
      require( 'includes/connect_limbo_db.php' ) ;

      # Connect to MySQL server and the database
      require( 'includes/helpers.php' );
      
      show_title($dbc, $_GET['id']);
    ?>
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
    
    <?php
      if ($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
        if (isset($_GET['full'], $_GET['id'])) {
          show_full_record($dbc, $_GET['id']) ;
        }
        else if (isset($_GET['id'])) {
          show_record($dbc, $_GET['id']) ;
        }
      }
      # Close the connection
      mysqli_close( $dbc );
    ?>
    
    <table border="1px solid black" style="width: 500px;">
      <tr>
        <th style="text-align: left">
          Contact Marist Security if this is your item at
          845-575-3000 x2282. Please have the ID number of
          the item ready.
        </th>
      </tr>
    </table>
  </body>
</html>