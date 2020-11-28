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


  $xxxx = $_SESSION['usersession'];

  ?>



  <?php
  if (isset($_GET['username']) && isset($_GET['role'])) {

  ?> <div class="tableFunctionsDelete">
      <div class="tableFunctionsFloater"></div>
      <a href="DeleteUser.php?delete=yes&username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>"><img src="assets/iconBucket.jpg" style="height:50px" title="Delete user" onclick="return mostraMessaggio();"></a>
    </div>

    <div class="tableFunctionsModify">
      <div class="tableFunctionsFloater"></div>
      <a href="ModifyUser.php?modify=yes&username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>"><img src="assets/modify.png" style="height:55px" title="Modify user"></a>
    </div>

  <?php
    echo
      "<h2 style='text-align:center'>User Information</h2> 
       <p> Username: " . $_GET['username'] . "</p>";

    echo "<p>Role: " . $_GET['role'] . "</p>";
  }

  if (isset($_POST['registered']) && $_GET['create']) {



    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['repassword'] = $_POST['repassword'];
    $_SESSION['role'] = $_POST['role'];

    if ($_SESSION['password'] == $_SESSION['repassword']) {

      $new = array('username' => $_SESSION['username'], 'role' => $_SESSION['role']);
      $xxxx[] = $new;
      $_SESSION['usersession'] = $xxxx;



      $message = "Successfully entered user!";
    } else {

      gotoPage("InsertUser.php?error=yes");
    }


    if (isset($message)) {
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';
    }




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
  }



  if (isset($_GET['modify']) && isset($_GET['username']) && isset($_GET['role']) && isset($_POST['save'])) {
    $newusername = $_GET['username'];
    $newrole = $_GET['role'];

    $new = array('username' => $_POST['username'], 'role' => $_POST['role']);


    foreach ($xxxx as $k => $v) {
      if ($v['username'] == $newusername && $v['role'] == $newrole) {
        unset($xxxx[$k]);
        $xxxx[] = $new;
      }
    }


    $_SESSION['usersession'] = $xxxx;

    echo
      "<h2 style='text-align:center'>User Information Modified In</h2> 
       <p> Username: " . $_POST['username'] . "</p>";

    echo "<p>Role: " . $_POST['role'] . "</p>";
  }

  back();



  ?>
  <script type="text/javascript">
    function mostraMessaggio() {

      if (confirm("Are you sure you want to cancel?")) {

        return true;

      } else {
        self.location = 'UserList.php';
        return false;

      }

    }
  </script>





</body>

</html>