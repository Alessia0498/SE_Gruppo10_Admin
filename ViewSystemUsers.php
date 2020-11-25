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
     
     require_once 'Library.php'; generateHeader(); 
     
    

     if(isset($_GET['username'])){
      
        echo 
        "<h2>User Information</h2>
        Username: ".$_GET['username']."<br>";
       
      }

      if(isset($_GET['role'])){
      
        echo "Role: ".$_GET['role']."<br>";
       
      }

      
     ?>
    
    

    <?php back()?>

</body>
</html>