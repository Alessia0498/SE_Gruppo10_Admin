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
  include 'api.service.php';
  generateHeader();
  session_start();




  ?>



  <?php
  if (isset($_GET['username']) && !isset($_POST['save'])) {
    $response = CallApi("GET", "http://arma-se.ddns.net/user/" . $_GET['username']);
    $data = json_decode($response, true);

  ?> <div class="tableFunctionsDelete">
      <div class="tableFunctionsFloater"></div>
      <a href="DeleteUser.php?delete=yes&username=<?php echo $data['username']; ?>"><img src="assets/iconBucket.jpg" style="height:50px" title="Delete user" onclick="return showMessage();"></a>
    </div>

    <div class="tableFunctionsModify">
      <div class="tableFunctionsFloater"></div>
      <a href="ModifyUser.php?modify=yes&username=<?php echo $data['username']; ?>"><img src="assets/modify.png" style="height:55px" title="Modify user"></a>
    </div>

  <?php
    echo
      "<h2 style='text-align:center'>User Information</h2> 
       <p style='text-align:center'> Username: " . $data['username'] . "</p>";

    echo "<p style='text-align:center'>Role: " . $data['role'] . "</p>";
  }

  if (isset($_POST['registered'])) {




    if ($_POST['password'] == $_POST['repassword']) {

      $new = array('username' => $_POST['username'], 'role' => $_POST['role'], 'password' => $_POST['password'],);
      $response = CallAPI("POST", "http://arma-se.ddns.net/user", $new);
      $data = json_decode($response, true);

      if (isset($data["message"])) {
        echo "<h3 class='error'>" . $data['message'] . "</h3>";
      } else {
        $message = "Successfully entered user!";
      }
    } else {

      gotoPage("InsertUser.php?error=yes");
    }


    if (isset($message)) {
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';
    }
  }



  if (isset($_GET['modify']) && isset($_POST['save']) && isset($_GET['username'])) {

    $new = array('username' => $_POST['username'], 'role' => $_POST['role']);
    $response = CallAPI("PUT", "http://arma-se.ddns.net/user/" . $_GET["username"], $new);
    $data = json_decode($response, true);

    if (isset($data["message"])) {
      echo "<h3 class='error'>" . $data['message'] . "</h3>";
    } else {
      $message = "User modified!";
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';

      echo
        "<h2 style='text-align:center'>User Information Modified In</h2> 
      <p style='text-align:center'> Username: " . $data['username'] . "</p>";




      echo "<p style='text-align:center'>Role: " . $data['role'] . "</p>";
    }
  }

  back();



  ?>
  <script type="text/javascript">
    function showMessage() {

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