<!DOCTYPE html>
<html>

<head>
  <title>Delete User</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="../index.css" />
  <meta name="content" content="Delete User Screen" />
  <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
  <meta charset="utf-8" />
</head>

<body>
  <?php
  require_once '../common/library.php';
  include '../services/api.service.php';

  generateHeader();
  if (isset($_GET['delete']) && isset($_GET['username'])) {
    API::delete_user($_GET["username"]);
    echo '<h3 style="text-align: center; color: green">User deleted!</h3>';
  }
  back();
  ?>
</body>

</html>