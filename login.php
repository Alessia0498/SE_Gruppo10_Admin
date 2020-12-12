<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="author" content="gruppo 10" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta name="content" content="Login" />
    <link rel="icon" href="assets/service.jpg" type="image/jpg" />
    <meta charset="utf-8" />



</head>

<body>
    <?php
    session_start();
    require_once './common/library.php';
    include './services/api.service.php';
    ?>

    <h2 style="text-align:center;">Welcome to the maintenance system! Log in to continue! </h2>



    <div id="form" class="form">

        <form class="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method=" post">
            <div class="imgcontainer">
                <img src="./assets/avatar.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" id="username" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="passsword" id="password" required>

                <div style="text-align:center;">
                    <button type="submit" id="login" name="login" value="yes">Login</button>
                </div>

            </div>

            <div style="text-align:center;" style="background-color:#f1f1f1">
                <button type="reset" name="cancel" id="cancel" class="cancelbtn">Cancel</button>

            </div>
        </form>
    </div>



    <?php
    if (isset($_GET['login'])) {

        $response = Api::get_user($_GET['username']);
        $data = json_decode($response, true);


        if (isset($data["message"])) {
            echo "<h3 class='error'>" . $data['message'] . "</h3>";
            exit;
        }




        switch ($data['role']) {
            case 'maintainer':
                go_to_page("./screens/list-users.screen.php");
                break;
            case 'planner':
                go_to_page("../SE_Gruppo10_Planner/screens/list-maintenance-activity.screen.php");
                break;
            case 'admin':
                go_to_page("./screens/list-users.screen.php");
                break;
        }


        $message = "Incorrect username or password! Try again";
        go_to_page("login.php?error=yes");

        echo '<h3 style="text-align: center; color: red">' . $message . '</h3>';
    }

    ?>

</body>

</html>