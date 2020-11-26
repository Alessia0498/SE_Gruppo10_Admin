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
  session_start(); ?>

  <div class="tableFunctionsModify">
    <div class="tableFunctionsFloater"></div>
    <a href="ModifyUser.php?modify=yes"><img src="assets/modify.png" style="height:50px" title="Modify user"></a>
  </div>

  <div class="tableFunctionsDelete">
    <div class="tableFunctionsFloater"></div>
    <a href="DeleteUser.php?delete=yes"><img src="assets/delete.jpg" style="height:50px" title="Delete user"></a>
  </div>

  <?php
  if (isset($_GET['username']) && isset($_GET['role'])) {

    echo
      "<h2>User Information</h2>
       <p> Username: " . $_GET['username'] . "</p>";

    echo "<p>Role: " . $_GET['role'] . "</p>";
  }

  if (isset($_POST['registered']) && $_GET['create']) {



    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['repassword'] = $_POST['repassword'];
    $_SESSION['role'] = $_POST['role'];





    if ($_SESSION['password'] == $_SESSION['repassword']) {
      $message = "Successfully entered user!";
    } else {

      gotoPage("InsertUser.php");
      exit;
    }


    if (isset($message)) {
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';
    }






    $_SESSION['user'] = array(
      array("username" => "ale984", "role" => "maintainer"),
      array("username" => "marc58", "role" => "maintainer"),
      array("username" => "tony145", "role" => "maintainer"),
      array("username" => "ale984", "role" => "maintainer"),
      array("username" => "ale984", "role" => "maintainer")
    );


    $_SESSION['user1'] = array("username" => $_SESSION['username'], "role" => $_SESSION['role']);
    array_push($_SESSION['user'], $_SESSION['user1']);

    echo "<table class='table2' border='1'>";

    echo "<tr>
      <th>Username</th>
      <th>Role</th>
      </tr>";
    echo "<tr>
      <td width='35%' height='100%' align='center'>" . $_SESSION["username"] . "</td>
      <td width='35%' height='100%' align='center'>" . $_SESSION["role"] . "</td>  
    </tr>";

    echo "</table>";



    echo "<a href='UserList.php?username=" . $_SESSION['username'] . "&role=" . $_SESSION['role'] . "'>Indietro</a>";
  }

  ?>





</body>

</html>