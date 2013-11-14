<html>
  <head>
    <title>Limbo - Home</title>
  </head>
  
  <body>
    <div>
      <a href="lost.php">Lost something</a>&nbsp;
      <a href="found.php">Found something</a>&nbsp;
      <a href="admin.php">Admins</a>
    </div>
    
    <p><a href="limbo.php"> Home</a> > Found Something</p>
    
    <h1>Found Something</h1>
    <div>
         If you have found something, search for it here!
    </div>
    
    <div>
      <form action = "found_search_form.asp">
        <input type="search"
        name="foundsearch"> <input type = "submit">
        Reported in last
        <select name="lastReported">
          <option value="7 days">7 days</option>
        </select>
      </form>
    </div>
    

  </body>
</html>