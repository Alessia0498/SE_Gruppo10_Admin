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
    generateHeader();

    session_start();

    ?>

    <div class="form">

        <form method="post" action="ViewSystemUsers.php?modify=yes&username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>" id="form2" name="form2" enctype="multipart/form-data">

            <p class="p1"><label for="username"> Username: <input type="text" required="required" name="username" id="username" value="<?php echo $_GET['username'] ?>" />
                </label></p>

            <p class="p1"><label for="role">
                    Role: <select name="role" id="role" class="role">
                        <?php if ($_GET['role'] == 'maintainer') { ?>
                            <option value="maintainer" selected>Maintainer</option>
                            <option value="planner">Planner</option>
                            <option value="system administrator">System Administrator</option>
                        <?php } ?>
                        <?php if ($_GET['role'] == 'planner') { ?>
                            <option value="maintainer">Maintainer</option>
                            <option value="planner" selected>Planner</option>
                            <option value="system administrator">System Administrator</option>
                        <?php } ?>
                        <?php if ($_GET['role'] == 'system administrator') { ?>
                            <option value="maintainer">Maintainer</option>
                            <option value="planner">Planner</option>
                            <option value="system administrator" selected>System Administrator</option>
                        <?php } ?>
                    </select>
                </label></p>


            <button type="submit" name="save" id="save" value="Save" class="button"> Save</button>
        </form>


        <?php
        back(); ?>

</body>

</html>