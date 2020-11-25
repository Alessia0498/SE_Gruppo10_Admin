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


  <?php 

  require_once 'Library.php'; generateHeader(); ?>



<div class="content">

<a href="InsertUser.php"><img class="image1" src="più.png"  title="Insert new user"></a>

<div class="tablein">
<?php

if(!isset($_GET['create'])){

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
      <td width='35%' height='100%' align='center'><a href='ViewSystemUsers.php?username=".$user['username']."&role=".$user['role']."'>". $user["username"]. "</a></td>
      <td width='35%' height='100%' align='center'>" . $user["role"]."</td>  
    </tr>";

  
 
}
echo "</table>";
 
}

?>
</div>
</div>

 
 <?php 





if(isset($_POST['registered'])){

  session_start();

  $username= $_POST['username'];
  $password= $_POST['password'];
  $repassword= $_POST['repassword'];
  $role= $_POST['role'];


  


if($password==$repassword){
  $message="Succefully entered user!";
  
}else{
  
  die('<h3 style="text-align: center; color: red">Passwords don\'t match. Try again!</h3>');
     
}
}

if(isset($message)){
  echo '<h3 style="text-align: center; color: green">'.$message.'</h3>';
  }



  
  if(isset($_GET['create'])){

    $users= array(
      array("username" => "ale984" , "role" => "maintainer"),
      array("username" => "marc58" , "role" => "maintainer"),
      array("username" => "tony145" , "role" => "maintainer"),
      array("username" => "ale984" , "role" => "maintainer"),
      array("username" => "ale984" , "role" => "maintainer")
    );
      
    
    $user1= array("username" => "$username" , "role" => "$role" );
     array_push($users, $user1);

     echo "<table class='table2' border='1'>";

echo "<tr>
      <th>Username</th>
      <th>Role</th>
      </tr>";

     

  foreach($users as $x => $user) {
    

   echo "<tr>
      <td width='35%' height='100%' align='center'><a href='ViewSystemUsers.php?username=".$user['username']."&role=".$user['role']."'>". $user["username"]. "</a></td>
      <td width='35%' height='100%' align='center'>" . $user["role"]."</td>  
    </tr>";

  
 
}
echo "</table>";
  }
  
  generateFooter()?>

</body>
</html>
