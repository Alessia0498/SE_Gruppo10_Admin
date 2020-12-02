<!DOCTYPE html>
<html>

<head>
  <title>Modify User</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="../index.css" />
  <meta name="content" content="Modify User Screen" />
  <link rel="icon" href="assets/service.jpg" type="image/jpg" />
  <meta charset="utf-8" />
</head>

<body>
  <?php

  require_once '../common/library.php';
  include "../api.service.php";
  generate_header();
  session_start();

  $response = Api::get_user($_GET['username']);
  $data = json_decode($response, true);
  ?>

  <div class="form">

    <form method="post" action="view-user.screen.php?modify=yes&username=<?php echo $data['username']; ?>" id="form2" name="form2" enctype="multipart/form-data">

      <p class="p1">
        <label for="username"> Username: <input type="text" required="required" name="username" id="username" value="<?php echo $data['username'] ?>" /></label>
      </p>

      <p class="p1"><label for="role">
          Role: <select name="role" id="role" class="role">
            <?php if ($data['role'] == 'maintainer') { ?>
              <option value="maintainer" selected>Maintainer</option>
              <option value="planner">Planner</option>
              <option value="admin">System Administrator</option>
            <?php } ?>
            <?php if ($data['role'] == 'planner') { ?>
              <option value="maintainer">Maintainer</option>
              <option value="planner" selected>Planner</option>
              <option value="admin">System Administrator</option>
            <?php } ?>
            <?php if ($data['role'] == 'admin') { ?>
              <option value="maintainer">Maintainer</option>
              <option value="planner">Planner</option>
              <option value="admin" selected>System Administrator</option>
            <?php } ?>
          </select>
        </label></p>


      <button type="submit" name="save" id="save" value="Save" class="button"> Save</button>
    </form>

    <?php back(); ?>

</body>

</html>