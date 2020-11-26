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

	<form method="post" action="ViewSystemUsers.php?create=yes" id="form1" name="form1" enctype="multipart/form-data">

		<p><label for="username"> Username: <input type="text" required="required" name="username" id="username" placeholder="Inserisci username" />
			</label></p>

		<p><label for="role"> Ruolo: <select name="role" id="role" class="role">
					<option value="maintainer">Mantainer</option>
					<option value="planner">Planner</option>
					<option value="system administrator">System Administrator</option>

				</select>
			</label></p>


		<p><label for="password">Password: <input type="password" required="required" name="password" id="password" placeholder="Inserisci password" />
			</label></p>

		<p><label for="repassword"> Conferma password: <input type="password" required="required" name="repassword" id="repassword" placeholder="Conferma password" />
			</label></p>


		<br><input type="submit" class="button" name="registered" value="Inserisci nuovo utente"> </input>
	</form>

	<?php


	back(); ?>





</body>

</html>