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



  <div class="content">

    <a href="InsertUser.php?create=yes"><img class="image1" src="più.png" title="Insert new user"></a>

    <div class="tablein">
      <?php

      if (!isset($_POST['registered'])) {

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



        foreach ($users as $x => $user) {


          echo "<tr>
      <td width='35%' height='100%' align='center'><a href='ViewSystemUsers.php?username=" . $user['username'] . "&role=" . $user['role'] . "'>" . $user["username"] . "</a></td>
      <td width='35%' height='100%' align='center'>" . $user["role"] . "</td>  
    </tr>";
        }
        echo "</table>";
      }

      ?>
    </div>
  </div>


  <?php





  if (isset($_POST['registered']) && $_GET['create']) {

    session_start();

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['repassword'] = $_POST['repassword'];
    $_SESSION['role'] = $_POST['role'];





    if ($_SESSION['password'] == $_SESSION['repassword']) {
      $message = "Succefully entered user!";
    } else {

      die('<h3 style="text-align: center; color: red">Passwords don\'t match. Try again!</h3>');
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



    foreach ($_SESSION['user'] as $key => $val) {


      print_r($val['username']);
      echo "<br>";
      print_r($val['role']);
      echo "<br>";
    }
    echo "</table>";
  }

  generateFooter() ?>

</body>

</html>