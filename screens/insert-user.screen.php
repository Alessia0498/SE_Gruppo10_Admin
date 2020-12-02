<!DOCTYPE html>
<html>

<head>
	<title>Insert User</title>
	<meta name="author" content="gruppo 10" />
	<link rel="stylesheet" type="text/css" href="../index.css" />
	<meta name="content" content="Insert User Screen" />
	<link rel="icon" href="assets/service.jpg" type="image/jpg" />
	<meta charset="utf-8" />
</head>

<body>
	<?php
	require_once '../common/library.php';
	include '../services/api.service.php';

	generateHeader();
	session_start();
	if (isset($_GET['error'])) {
		$message = "Passwords don't match.Try again!";
		echo '<h3 style="text-align: center; color: red">' . $message . '</h3>';
	}



	?>
	<div class="form">
		<form method="post" action="view-user.screen.php" id="form1" name="form1" enctype="multipart/form-data">

			<label for="username"> Username:
				<input type="text" required="required" name="username" id="username" placeholder="Enter a username" title="Enter a username" />
			</label>

			<label for="role"> Role:
				<select name="role" id="role" title="Select role">
					<option value="maintainer">Mantainer</option>
					<option value="planner">Planner</option>
					<option value="admin">System Administrator</option>
				</select>
			</label>


			<label for="password">Password:
				<input type="password" required="required" name="password" id="password" placeholder="Enter a password" title="Enter a password" />
			</label>

			<label for="repassword"> Confirm password:
				<input type="password" required="required" name="repassword" id="repassword" placeholder="Confirm password" title="Confirm password" />
			</label>

			<br>

			<button type="submit" class="button" name="registered" value="Insert a new user">Insert a new user</button>
			<?php back(); ?>
		</form>
	</div>






</body>

</html>