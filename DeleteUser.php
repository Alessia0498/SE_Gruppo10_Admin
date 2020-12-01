<!DOCTYPE html>
<html>

<head>
    <title>Delete User</title>
    <meta name="author" content="gruppo 10" />
    <link rel="stylesheet" type="text/css" href="Index.css" />
    <meta name="content" content="System User List View" />
    <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
    <meta charset="utf-8" />

</head>

<body>
    <?php

    require_once 'Library.php';
    include 'api.service.php';
    generateHeader();


    if (isset($_GET['delete']) && isset($_GET['username'])) {
        CallAPI("DELETE", "http://arma-se.ddns.net/user/" . $_GET["username"]);

        echo '<h3 style="text-align: center; color: green">User deleted!</h3>';
    }
    back();
    ?>


</body>

</html>