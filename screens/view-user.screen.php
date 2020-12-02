<!DOCTYPE html>
<html>

<head>
  <title>User List</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="../index.css" />
  <meta name="content" content="View User Screen" />
  <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
  <meta charset="utf-8" />

  <script type="text/javascript">
    function show_message() {
      if (confirm("Are you sure you want to cancel?")) {
        return true;
      }
      self.location = 'list-users.screen.php';
      return false;
    }
  </script>
</head>

<body>
  <?php
  require_once '../common/library.php';
  include '../services/api.service.php';

  generate_header();
  session_start();
  ?>

  <?php
  if (isset($_GET['username']) && !isset($_POST['save'])) {
    $response = Api::get_user($_GET['username']);
    $data = json_decode($response, true);

  ?>
    <div class="tableFunctionsDelete">
      <div class="tableFunctionsFloater"></div>
      <a href="delete-user.screen.php?delete=yes&username=<?php echo $data['username']; ?>">
        <img src="../assets/iconBucket.jpg" style="height:50px" title="Delete user" onclick="return show_message();">
      </a>
    </div>

    <div class="tableFunctionsModify">
      <div class="tableFunctionsFloater"></div>
      <a href="modify-user.screen.php?modify=yes&username=<?php echo $data['username']; ?>">
        <img src="../assets/modify.png" style="height:55px" title="Modify user">
      </a>
    </div>
  <?php

    echo "
        <h2 style='text-align:center'> User Information </h2> 
        <p style='text-align:center'> Username: " . $data['username'] . "</p>";
    echo "<p style='text-align:center'> Role: " . $data['role'] . "</p>";
  }

  if (isset($_POST['registered'])) {
    if ($_POST['password'] == $_POST['repassword']) {
      $new_user = array('username' => $_POST['username'], 'role' => $_POST['role'], 'password' => $_POST['password'],);
      $response = Api::post_user($new_user);
      $data = json_decode($response, true);

      if (isset($data["message"])) {
        echo "<h3 class='error'>" . $data['message'] . "</h3>";
      } else {
        $message = "Successfully entered user!";
      }
    } else {
      go_to_page("insert-user.screen.php?error=yes");
    }

    if (isset($message)) {
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';
    }
  }



  if (isset($_GET['modify']) && isset($_POST['save']) && isset($_GET['username'])) {

    $new_user = array('username' => $_POST['username'], 'role' => $_POST['role']);
    $response = Api::put_user($_GET["username"], $new_user);
    $data = json_decode($response, true);

    if (isset($data["message"])) {
      echo "<h3 class='error'>" . $data['message'] . "</h3>";
    } else {
      $message = "User modified!";
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';

      echo "
      <h2 style='text-align:center'>User Information Modified In</h2> 
      <p style='text-align:center'> Username: " . $data['username'] . "</p>";
      echo "<p style='text-align:center'>Role: " . $data['role'] . "</p>";
    }
  }
  back();

  ?>

</body>

</html>