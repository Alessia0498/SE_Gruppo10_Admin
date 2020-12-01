<!DOCTYPE html>
<html>

<head>
    <title>Modify User</title>
    <meta name="author" content="gruppo 10" />
    <link rel="stylesheet" type="text/css" href="Index.css" />
    <meta name="content" content="System User List View" />
    <link rel="icon" href="assets/service.jpg" type="image/jpg" />
    <meta charset="utf-8" />

</head>

<body>
    <?php

    require_once 'Library.php';
    include "api.service.php";
    generateHeader();
    session_start();

    $response = CallAPI("GET", "http://arma-se.ddns.net/user/" . $_GET['username']);
    $user = json_decode($response, true);
    ?>

    <div class="form">

        <form method="post" action="ViewSystemUsers.php?modify=yes&username=<?php echo $user['username']; ?>" id="form2" name="form2" enctype="multipart/form-data">

            <p class="p1"><label for="username"> Username: <input type="text" required="required" name="username" id="username" value="<?php echo $user['username'] ?>" />
                </label></p>

            <p class="p1"><label for="role">
                    Role: <select name="role" id="role" class="role">
                        <?php if ($user['role'] == 'maintainer') { ?>
                            <option value="maintainer" selected>Maintainer</option>
                            <option value="planner">Planner</option>
                            <option value="system administrator">System Administrator</option>
                        <?php } ?>
                        <?php if ($user['role'] == 'planner') { ?>
                            <option value="maintainer">Maintainer</option>
                            <option value="planner" selected>Planner</option>
                            <option value="system administrator">System Administrator</option>
                        <?php } ?>
                        <?php if ($user['role'] == 'admin') { ?>
                            <option value="maintainer">Maintainer</option>
                            <option value="planner">Planner</option>
                            <option value="admin" selected>System Administrator</option>
                        <?php } ?>
                    </select>
                </label></p>


            <button type="submit" name="save" id="save" value="Save" class="button"> Save</button>
        </form>


        <?php
        back(); ?>

</body>

</html>