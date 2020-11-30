<!DOCTYPE html>
<html>

<head>
  <title>User List</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="Index.css" />
  <meta name="content" content="System User List View" />
  <link rel="icon" href="assets/service.jpg" type="image/jpg" />
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
      <a href="InsertUser.php?create=yes"><img src="assets/più.png" style="height:20px" title="Insert new user"></a>
    </div>


    <div class="tablein">
      <?php





      echo "<table class='table2' border='1'>";

      echo "<tr>
      <th width='35%' height='100%' align='center'>Username</th>
      <th width='35%' height='100%' align='center'>Role</th>
      </tr>";

      if (!isset($_SESSION['usersession'])) {
        $_SESSION['usersession'] = array(array('username' => '', 'role' => ''));
      }




      if (isset($_SESSION['usersession']) && !empty($_SESSION['usersession'])) {
        foreach ($_SESSION['usersession'] as $x => $user) {


          echo "<tr> 
      <td width='35%' height='100%' align='center'><a class=\"tableLink\" href='ViewSystemUsers.php?username=" . $user['username'] . "&role=" . $user['role'] . "'>" . $user["username"] . "</a></td>
      <td width='35%' height='100%' align='center'><a class=\"tableLink\" href='ViewSystemUsers.php?username=" . $user['username'] . "&role=" . $user['role'] . "'>" . $user['role'] . "</a></td>  
    </tr>";
        }
        echo "</table>";
      }

      ?>
    </div>
  </div>




  <?php generateFooter(); ?>

</body>

</html>