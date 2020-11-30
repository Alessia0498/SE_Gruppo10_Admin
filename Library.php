<?php
function generateHeader()
{
	echo "<div id=\"header\" class=\"topnav\">
  <a class=\"lineeMenu\" onclick=\"openNav()\" href=\"#home\">☰ User List</a>
  <img class=\"image\" src=\"assets\login2.png\">
  </div>";


	echo "

	<div id=\"mySidenav\" class=\"sidenav\">
	  <a href=\"javascript:void(0)\" class=\"closebtn\" onclick=\"closeNav()\">&times;</a>
	  
	  <div id=\"list\">
	  <a href=\"#\">Users</a>
	  <a href=\"#\">Workspace notes</a>
	  </div>
	</div> ";


	echo "
	<script>
	function openNav() {
	  document.getElementById(\"mySidenav\").style.width = \"20%\";
	}

	function closeNav() {
	  document.getElementById(\"mySidenav\").style.width = \"0\";
	}
	</script> ";
}


function generateFooter()
{
	echo "
  <div class=\"footer\">
    <div data-role=\"footer\" class=\"ui-bar\">
	<a  class=\"tableLink\" href=\"#\" data-role=\"button\">Next Page</a>
	

</div>";
}

function back()
{
	echo "
	<div class=\"footer\">
	  <div data-role=\"footer\" class=\"ui-bar\">
	  <a class=\"tableLink\" href=\"UserList.php\" data-role=\"button\">Back</a>
	  
  
  </div>";
}

function gotopage($indirizzo = "")
{

	echo 	'<script language="javascript">
	 		self.location="' . $indirizzo . '"</script>';
}
