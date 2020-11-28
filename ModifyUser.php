<!DOCTYPE html>
<html>

<head>
    <title>Modify User</title>
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

?>

<div class="form">

<form method="post" action="ViewSystemUsers.php?modify=yes&username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>" id="form2" name="form2" enctype="multipart/form-data" >

<p class="p1"><label for="username"> Username: <input type="text" required="required" name="username" id="username" value="<?php echo $_GET['username']?>"/>
	</label></p>

    <p class="p1"><label for="role"> Role: <select name="role" id="role" class="role">
    <?php if ($_GET['role']=='maintainer'){ ?>
    <option value="$_GET['role']" selected = "select">Maintainer</option>
    <?php } ?>
    <?php if ($_GET['role']=='planner'){?>
    <option value="planner" selected="select">Planner</option>
   <?php } ?>
   <?php if ($_GET['role']=='system administrator')?>
<option value="system administrator"selected="select">System Administrator</option>
<? php } ?>
					</select>
				</label></p>
    

    <input type="submit" name="save" id="save" value="Save" class= "button"></input>
</form>


<?php
 back();?>

  </body>
</html>