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
        $a = array_values($a);
    }
    ?>
    <div class="content">

        <div class="tableFunctions">
            <div class="tableFunctionsFloater"></div>

        </div>

        <div class="tablein">

            <?php
            echo "<table class='table2' border='1'>";
            echo "<h3 style='text-align: center; color: green'>User deleted!</h3>";
            echo "<tr>
      <th>Username</th>
      <th>Role</th>
      </tr>";

            foreach ($a as $x => $user) {


                echo "<tr> 
      <td width='35%' height='100%' align='center'><a class=\"tableLink\" href='ViewSystemUsers.php?username=" . $user['username'] . "&role=" . $user['role'] . "'>" . $user["username"] . "</a></td>
      <td width='35%' height='100%' align='center'><a class=\"tableLink\" href='ViewSystemUsers.php?username=" . $user['username'] . "&role=" . $user['role'] . "'>" . $user['role'] . "</a></td>  
    </tr>";
            }
            echo "</table>";
            echo "<br>";

            back();
            ?>
        </div>
    </div>


</body>

</html>