<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
	<meta name="author" content="gruppo 10"/>
	<link rel="stylesheet" type="text/css" href="Index.css"/>
	<meta name="content" content="System User List View"/>
	<meta charset="utf-8"/>

</head>
<body>

	<?php require_once 'Library.php'; generateHeader(); ?>


<div class="content">

<div class="tablein">
<?php

  $users= array(
    array("username" => "ale984" , "role" => "maintainer"),
    array("username" => "marc58" , "role" => "maintainer"),
    array("username" => "tony145" , "role" => "maintainer"),
    array("username" => "ale984" , "role" => "maintainer"),
    array("username" => "ale984" , "role" => "maintainer")
  );

 echo "<table class='table2' border='1'>";

echo "<tr>
      <th>Username</th>
      <th>Role</th>
      </tr>";

  foreach($users as $x => $user) {

   echo "<tr>
      <td width='35%' height='100%' align='center'>". $user["username"]. "</td>
      <td width='35%' height='100%' align='center'>" . $user["role"]."</td>  
    </tr>";

  
 
}
echo "</table>";

?>
</div>
</div>

  <?php generateFooter()?>

</body>
</html>
