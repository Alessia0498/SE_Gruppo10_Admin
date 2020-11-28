<!DOCTYPE html>
<html>

<head>
    <title>Delete User</title>
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

    $a = $_SESSION['usersession'];

    if (isset($_GET['delete']) && isset($_GET['username']) && isset($_GET['role'])) {
        $username22 = $_GET['username'];
        foreach ($a as $k => $v) {
            if ($v['username'] == $username22)
                unset($a[$k]);
        }

        $_SESSION['usersession'] = $a;
    }

    echo '<h3 style="text-align: center; color: green">User deleted!</h3>';
    back();
    ?>


</body>

</html>