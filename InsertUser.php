<!DOCTYPE html>
<html>

<head>
	<title>Nuovo Utente</title>
	<meta name="author" content="gruppo 10" />
	<link rel="stylesheet" type="text/css" href="Index.css" />
	<meta name="content" content="System User List View" />
	<meta charset="utf-8" />

</head>

<body>
	<?php

	require_once 'Library.php';
	generateHeader();


	?>

	<form method="post" action="UserList.php?create=yes" id="form1" name="form1" enctype="multipart/form-data">

		<p><label for="username"> Username: <input type="text" required="required" name="username" id="username" placeholder="Inserisci username" />
			</label></p>

		<p><label for="role"> Ruolo: <input type="text" required="required" name="role" id="role" placeholder="Inserisci ruolo utente" />
			</label></p>

		<p><label for="password">Password: <input type="password" required="required" name="password" id="password" placeholder="Inserisci password" />
			</label></p>

		<p><label for="repassword"> Conferma password: <input type="password" required="required" name="repassword" id="repassword" placeholder="Conferma password" />
			</label></p>


		<br><input type="submit" class="button" name="registered" value="Inserisci nuovo utente"> </input>
	</form>

	<?php back(); ?>





</body>

</html>