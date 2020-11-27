<!DOCTYPE html>
<html>

<head>
	<title>Insert User</title>
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
	<form method="post" action="ViewSystemUsers.php?create=yes" id="form1" name="form1" enctype="multipart/form-data">

		<p class="p1"><label for="username"> Username: <input type="text" required="required" name="username" id="username" placeholder="Enter a username" />
			</label></p>

		<p class="p1"><label for="role"> Role: <select name="role" id="role" class="role">
					<option value="maintainer">Mantainer</option>
					<option value="planner">Planner</option>
					<option value="system administrator">System Administrator</option>

				</select>
			</label></p>


		<p class="p1"><label for="password">Password: <input type="password" required="required" name="password" id="password" placeholder="Enter a  password" />
			</label></p>

		<p class="p1"><label for="repassword"> Conferma password: <input type="password" required="required" name="repassword" id="repassword" placeholder="Confirm password" />
			</label></p>


		<br><input type="submit" class="button" name="registered" value="Insert a new user"> </input>
	</form>
</div>
	<?php


	back(); ?>





</body>

</html>