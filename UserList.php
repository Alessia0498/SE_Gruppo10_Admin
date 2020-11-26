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
  generateHeader();
  session_start();
  ?>

  <div class="content">

    <div class="tableFunctions">
      <div class="tableFunctionsFloater"></div>
      <a href="InsertUser.php?create=yes"><img src="più.png" style="height:20px" title="Insert new user"></a>
    </div>


    <div class="tablein">
      <?php



      $users = array(
        array("username" => "ale984", "role" => "maintainer"),
        array("username" => "marc58", "role" => "maintainer"),
        array("username" => "tony145", "role" => "maintainer"),
        array("username" => "ale984", "role" => "maintainer"),
        array("username" => "ale984", "role" => "maintainer")
      );

      echo "<table class='table2' border='1'>";

      echo "<tr>
      <th>Username</th>
      <th>Role</th>
      </tr>";


      $users = $_SESSION['usersession'];

      if (isset($_GET['username']) && $_GET['role']) {

        $new = array('username' => $_GET['username'], 'role' => $_GET['role']);

        array_push($_SESSION['usersession'], $new);
      }



      foreach ($_SESSION['usersession'] as $x => $user) {


        echo "<tr>
      <td width='35%' height='100%' align='center'><a href='ViewSystemUsers.php?username=" . $user['username'] . "&role=" . $user['role'] . "'>" . $user["username"] . "</a></td>
      <td width='35%' height='100%' align='center'>" . $user['role'] . "</td>  
    </tr>";
      }
      echo "</table>";

      ?>
    </div>
  </div>


  <?php







  generateFooter() ?>

</body>

</html>