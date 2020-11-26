<!DOCTYPE html>
<html>

<head>
  <title>User List</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="Index.css" />
  <meta name="content" content="System User List View" />
  <meta charset="utf-8" />

</head>

<body>
  <?php

  require_once 'Library.php';
  generateHeader(); ?>
   
   <div class="tableFunctionsModify">
  <div class="tableFunctionsFloater"></div>
  <a href="ModifyUser.php?modify=yes"><img src="modify.png" style="height:50px" title="Modify user"></a>
  </div>

  <div class="tableFunctionsDelete">
  <div class="tableFunctionsFloater"></div>
  <a href="DeleteUser.php?delete=yes"><img src="delete.jpg" style="height:50px" title="Delete user"></a>
  </div>

  <?php
  if (isset($_GET['username'])) {

    echo
      "<h2>User Information</h2>
       <p> Username: " . $_GET['username'] . "</p>";
  }

  if (isset($_GET['role'])) {

    echo "<p>Role: " . $_GET['role'] . "</p>";
  }


  ?>



  <?php back() ?>

</body>

</html>